<?php

namespace App\Livewire;

use App\Models\Project;
use Livewire\Component;
use Livewire\WithPagination;

class ProjectFilter extends Component
{
    use WithPagination;

    public $selectedStatus = 'all';
    public $searchTerm = '';
    public $startDate;
    public $endDate;

    public $totalProjects;
    public $pendingProjects;
    public $completedProjects;
    public $suspendedProjects;

    protected $paginationTheme = 'tailwind'; // or 'bootstrap' if needed

    public function mount()
    {
        // Load project counts
        $this->totalProjects = Project::count();
        $this->pendingProjects = Project::where('status', 'pending')->count();
        $this->completedProjects = Project::where('status', 'completed')->count();
        $this->suspendedProjects = Project::where('status', 'suspended')->count();
    }

    public function filterProjects()
    {
        $query = Project::with('projectIncharge');

        if ($this->selectedStatus !== 'all') {
            $query->where('status', $this->selectedStatus);
        }

        if ($this->startDate) {
            $query->whereDate('created_at', '>=', $this->startDate);
        }

        if ($this->endDate) {
            $query->whereDate('created_at', '<=', $this->endDate);
        }

        if ($this->searchTerm) {
            $query->where('title', 'like', '%' . $this->searchTerm . '%');
        }

        return $query->paginate(10); // Paginate results
    }

    public function updatingSearchTerm()
    {
        // Reset pagination when search term changes
        $this->resetPage();
    }

    public function render()
    {
        // Filter and paginate projects
        $projects = $this->filterProjects();

        return view('livewire.project-filter', compact('projects'));
    }
}

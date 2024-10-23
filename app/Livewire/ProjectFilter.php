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
        $this->loadProjectCounts();
    }

    /**
     * Load counts for different project statuses.
     */
    private function loadProjectCounts()
    {
        $this->totalProjects = Project::count();
        $this->pendingProjects = Project::where('status', 'pending')->count();
        $this->completedProjects = Project::where('status', 'completed')->count();
        $this->suspendedProjects = Project::where('status', 'suspended')->count();
    }

    /**
     * Filters the projects based on status, date range, and search term.
     */
    public function filterProjects()
    {
        $query = Project::with('projectIncharge');

        if ($this->selectedStatus !== 'all') {
            $query->where('status', $this->selectedStatus);
        }

        if ($this->startDate) {
            $query->whereDate('start_date', '>=', $this->startDate);
        }

        if ($this->endDate) {
            $query->whereDate('end_date', '<=', $this->endDate);
        }

        if ($this->searchTerm) {
            $query->where('title', 'like', '%' . $this->searchTerm . '%');
        }

        return $query->paginate(10); // Paginate results
    }

    /**
     * Handle search term updates to reset pagination.
     */
    public function updatingSearchTerm()
    {
        $this->resetPage(); // Reset pagination when search term changes
    }

    /**
     * Public method to handle project search triggered from the frontend.
     */
    public function searchProjects($term)
    {
        $this->searchTerm = $term;
        $this->resetPage(); // Reset to the first page after search
    }

    /**
     * Render the component with filtered and paginated projects.
     */
    public function render()
    {
        $projects = $this->filterProjects();
        return view('livewire.project-filter', compact('projects'));
    }
}

<?php

namespace App\Livewire;

use App\Models\Project;
use Livewire\Component;

class ProjectFilter extends Component
{
    public $projects;
    public $selectedStatus = 'all';
    public $startDate;
    public $endDate;

    public $totalProjects;

    public $pendingProjects;
    public $completedProjects;

    public function mount()
    {
        // Initial load of projects
        $this->projects = Project::all();
        $this->totalProjects = count($this->projects);
        $this->pendingProjects = Project::where('status', 'pending')->count();
        $this->completedProjects = Project::where('status', 'completed')->count();
    }

    public function filterProjects()
    {
        $query = Project::query();

        if ($this->selectedStatus !== 'all') {
            $query->where('status', $this->selectedStatus);
        }

        if ($this->startDate) {
            $query->whereDate('created_at', '>=', $this->startDate);
        }

        if ($this->endDate) {
            $query->whereDate('created_at', '<=', $this->endDate);
        }

        $this->projects = $query->get();
    }

    public function render()
    {
        return view('livewire.project-filter');
    }
}

<?php

namespace App\Livewire;

use App\Models\Pow;
use App\Models\User;
use Livewire\Component;

class AddPow extends Component
{
    public $projectId;
    public $reference_number;

    public $description;
    public $start_date;
    public $end_date;
    public $engineer_id;
    public $total_material_cost;
    public $total_labor_cost;
    public $engineers;

    protected $rules = [
        'reference_number' => 'required|string|max:255',
        'description' => 'required|string',
        'start_date' => 'required|date',
        'end_date' => 'required|date',
        'engineer_id' => 'required|numeric',
        'total_material_cost' => 'required|numeric',
        'total_labor_cost' => 'required|numeric',
    ];

    public function mount($projectId): void
    {
        $this->projectId = $projectId;
        $this->engineers = User::where('role', 'engineer')->get();
    }

    public function save()
    {
        $this->validate();

        // Dump the data before inserting
        $data = [
            'reference_number' => $this->reference_number,
            'description' => $this->description,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'engineer_id' => $this->engineer_id,
            'total_material_cost' => $this->total_material_cost,
            'total_labor_cost' => $this->total_labor_cost,
            'project_id' => $this->projectId,
        ];

        $pow = Pow::create($data);

        $this->dispatch('pow-added');
        $this->reset();

        return redirect()->route('view-project-pow', ['id' => $pow->project_id])->with('success', 'POW added successfully.');

    }


    public function render()
    {
        return view('livewire.add-pow');
    }
}

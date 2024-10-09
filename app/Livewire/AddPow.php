<?php

namespace App\Livewire;

use App\Imports\MaterialsImport;
use App\Models\Pow;
use App\Models\User;
use App\Services\LogService;
use Illuminate\Support\Facades\Log;
use Livewire\Component;
use Livewire\WithFileUploads;
use Maatwebsite\Excel\Facades\Excel;

class AddPow extends Component
{
    use WithFileUploads;

    public $projectId;
    public $reference_number;

    public $description;
    public $start_date;
    public $end_date;
    public $engineer_id;
    public $total_material_cost;
    public $total_labor_cost;
    public $engineers;
    public $materialsFile;

    public $isUploading = false;

    protected $rules = [
        'reference_number' => 'required|string|max:255',
        'description' => 'required|string',
        'start_date' => 'required|date',
        'end_date' => 'required|date',
        'engineer_id' => 'required|numeric',
        'total_material_cost' => 'required|numeric',
        'total_labor_cost' => 'required|numeric',
        'materialsFile' => 'required|file|mimes:xlsx,csv',
    ];


    public function mount($projectId): void
    {
        $this->projectId = $projectId;
        $this->engineers = User::where('role', 'engineer')->get();
    }


    public function save()
    {
        // Validate the form including the materials file
        $this->validate();

        // Set the uploading state to true
        $this->isUploading = true;

        // Create POW record
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

        // Upload materials file and import
        if ($this->materialsFile) {
            // The file is required, so this will always run if the validation passes
            $this->uploadMaterialsFile($this->materialsFile);

            try {
                Log::info('Starting materials import...');
                Excel::import(new MaterialsImport($pow->id), $this->materialsFile->getRealPath());
                Log::info('Materials import completed successfully.');
                session()->flash('message', 'Materials imported successfully!');
            } catch (\Exception $e) {
                Log::error('Materials import failed: ' . $e->getMessage());
                session()->flash('error', 'Failed to import materials. Please check the log for details.');
            }
        }

        LogService::logAction(
            'added POW',
            "Added POW with reference number: {$this->reference_number}",
            auth()->id()
        );

        // Reset the form and dispatch a success event
        $this->dispatch('pow-added');
        $this->reset();

        // After processing, set the uploading state to false
        $this->isUploading = false; // Reset the state

        // Redirect to view the POW
        return redirect()->route('view-project-pow', ['id' => $pow->project_id])
            ->with('success', 'POW added successfully.');
    }


    protected function uploadMaterialsFile($file)
    {
        $path = $file->store('materials', 'public'); // Store the materials file
        Log::info('Materials file uploaded successfully.', ['path' => $path]);
        return $path;
    }


    public function render(): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\View\View
    {
        return view('livewire.add-pow');
    }
}

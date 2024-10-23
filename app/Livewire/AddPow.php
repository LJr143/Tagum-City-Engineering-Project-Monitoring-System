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
//    public $start_date;
//    public $end_date;
    public $engineer_id;
    public $total_material_cost;
    public $total_labor_cost;
    public $engineers;
    public $materialsFile;

    public $isUploading = false;

    protected $rules = [
        'reference_number' => 'required|string|max:255',
        'description' => 'required|string',
//        'start_date' => 'required|date',
//        'end_date' => 'required|date',
//        'engineer_id' => 'required|numeric',
//        'total_material_cost' => 'required|numeric',
        'total_labor_cost' => 'required|numeric',
        'total_material_cost' => 'numeric',
        'materialsFile' => 'file|mimes:xlsx,csv',

    ];


    public function mount($projectId): void
    {
        $this->projectId = $projectId;
        $this->engineers = User::where('role', 'engineer')->get();
    }

    public function save()
    {
        // Validate the form without requiring the materials file
        $this->validate([
            'reference_number' => 'required|string|max:255',
            'description' => 'required|string',
            'total_material_cost' => 'nullable|numeric',
            'total_labor_cost' => 'required|numeric',
            'projectId' => 'required|exists:projects,id',
            'materialsFile' => 'nullable|file|mimes:xlsx,csv', // Optional file upload
        ]);

        // Set the uploading state to true
        $this->isUploading = true;

        // Create POW record
        $data = [
            'reference_number' => $this->reference_number,
            'description' => $this->description,
            'total_material_cost' => $this->total_material_cost,
            'total_labor_cost' => $this->total_labor_cost,
            'project_id' => $this->projectId,
        ];

        $pow = Pow::create($data);

        // Handle materials file upload if provided
        if ($this->materialsFile) {
            try {
                // Upload and import the materials file
                $this->uploadMaterialsFile($this->materialsFile);

                Log::info('Starting materials import...');
                $import = new MaterialsImport($pow->id);
                Excel::import($import, $this->materialsFile->getRealPath());
                Log::info('Materials import completed successfully.');
                // Get the total material cost from the import
                $totalMaterialCost = $import->getTotalCost();
                // Update the POW record with the total material cost
                $pow->total_material_cost = $totalMaterialCost;
                $pow->save();
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

        // Reset the form and dispatch success event
        $this->dispatch('pow-added');
        $this->reset();

        // Set the uploading state back to false
        $this->isUploading = false;

        // Redirect to view the POW
        return redirect()->route('view-project-pow', ['id' => $pow->project_id])
            ->with('success', 'POW added successfully.');
    }


    protected function uploadMaterialsFile($file)
    {
        $path = $file->store('materials', 'public');
        Log::info('Materials file uploaded successfully.', ['path' => $path]);
        return $path;
    }

    public function render(): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\View\View
    {
        return view('livewire.add-pow');
    }
}

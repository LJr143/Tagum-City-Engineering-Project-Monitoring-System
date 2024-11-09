<?php

namespace App\Livewire;

use App\Imports\MaterialsImport;
use App\Models\DirectCost;
use App\Models\Pow;
use App\Models\User;
use App\Services\LogService;
use Illuminate\Support\Facades\Log;
use Livewire\Component;
use Livewire\WithFileUploads;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\IndirectCost;

class AddPow extends Component
{
    use WithFileUploads;

    public $projectId;
    public $reference_number;
    public $source_of_funds;
    public $description;
    public $engineer_id;
    public $total_material_cost;
    public $total_labor_cost;
    public $engineers;
    public $materialsFile;
    public $isUploading = false;

    public $indirect_costs = [['description' => '', 'amount' => '']];
    public $direct_costs = [['description' => '', 'amount' => '']];

    protected $rules = [
        'reference_number' => 'required|string|max:255',
        'source_of_funds' => 'required|string|max:255',
        'description' => 'required|string',
        'total_material_cost' => 'nullable|numeric',
        'total_labor_cost' => 'required|numeric',
        'projectId' => 'required|exists:projects,id',
        'materialsFile' => 'nullable|file|mimes:xlsx,csv',
        'direct_costs.*.description' => 'string|max:255',
        'direct_costs.*.amount' => 'numeric|min:0',
        'indirect_costs.*.description' => 'string|max:255',
        'indirect_costs.*.amount' => 'numeric|min:0',
    ];

    protected $messages = [
        'reference_number.required' => 'The reference number is required.',
        'source_of_funds.required' => 'The source of fund is required.',
        'total_labor_cost.required' => 'The total labor cost is required.',
        'materialsFile.file' => 'The uploaded file must be a valid file.',
        'materialsFile.mimes' => 'The file must be a type of: xlsx, csv.',
        'direct_costs.*.description.required' => 'Description is required for each direct cost.',
        'direct_costs.*.amount.required' => 'Amount is required for each direct cost.',
        'indirect_costs.*.description.required' => 'Description is required for each indirect cost.',
        'indirect_costs.*.amount.required' => 'Amount is required for each indirect cost.',
    ];

    public function mount($projectId): void
    {
        $this->projectId = $projectId;
        $this->engineers = User::where('role', 'engineer')->get();
    }

    public function save()
    {
        // Validate the form without requiring the materials file
        $this->validate();

        // Set the uploading state to true
        $this->isUploading = true;

        // Create POW record
        $data = [
            'project_id' => $this->projectId,
            'reference_number' => $this->reference_number,
            'source_of_funds' => $this->source_of_funds,
            'description' => $this->description,
            'total_material_cost' => $this->total_material_cost,
            'total_labor_cost' => $this->total_labor_cost,
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

        // Save Direct costs if there are any
        if (!empty(array_filter($this->direct_costs))) {
            foreach ($this->direct_costs as $cost) {
                if (!empty($cost['description']) && !empty($cost['unit_cost'])) {
                    DirectCost::create([
                        'pow_id' => $pow->id,
                        'item_no' => $cost['item_no'],
                        'description' => $cost['description'],
                        '%_of_total' => $cost['%_of_total'],
                        'quantity' => $cost['quantity'],
                        'unit' => $cost['unit'],
                        'unit_cost' => $cost['unit_cost'],
                        'total_cost' => $cost['unit_cost'] * $cost['quantity'],
                        'remaining_cost' => $cost['unit_cost'] * $cost['quantity'],
                    ]);
                }
            }
        }

        // Save indirect costs if there are any
        if (!empty(array_filter($this->indirect_costs))) {
            foreach ($this->indirect_costs as $cost) {
                if (!empty($cost['description']) && !empty($cost['amount'])) {
                    IndirectCost::create([
                        'pow_id' => $pow->id,
                        'description' => $cost['description'],
                        'amount' => $cost['amount'],
                    ]);
                }
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

        // Reset indirect and direct costs
        $this->indirect_costs = [['description' => '', 'amount' => '']];
        $this->direct_costs = [['description' => '', 'amount' => '']];

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

    public function addCost($type)
    {
        if ($type === 'direct') {
            $this->direct_costs[] = ['description' => '', 'amount' => ''];
        } elseif ($type === 'indirect') {
            $this->indirect_costs[] = ['description' => '', 'amount' => ''];
        }
    }

    public function removeCost($type, $index)
    {
        if ($type === 'direct' && isset($this->direct_costs[$index])) {
            unset($this->direct_costs[$index]);
            $this->direct_costs = array_values($this->direct_costs); // Re-index array after removal
        } elseif ($type === 'indirect' && isset($this->indirect_costs[$index])) {
            unset($this->indirect_costs[$index]);
            $this->indirect_costs = array_values($this->indirect_costs); // Re-index array after removal
        }
    }


    public function render()
    {
        return view('livewire.add-pow');
    }
}

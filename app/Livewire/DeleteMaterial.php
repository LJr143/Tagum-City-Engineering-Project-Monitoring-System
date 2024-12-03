<?php

namespace App\Livewire;

use App\Models\Material;
use App\Models\User;
use App\Services\LogService;
use Livewire\Component;

class DeleteMaterial extends Component
{
    public $materialId;
    public $confirming = false;

    public function confirmDelete(): void
    {
        if ($this->materialId) {
            $material = Material::find($this->materialId);
            if ($material) {
                $material->delete();
                session()->flash('success', 'Material deleted successfully.');
            } else {
                session()->flash('error', 'Material not found.');
            }
        }
        $this->confirming = false;
        LogService::logAction(
            'deleted material',
            "deleted material with id: {$this->materialId}",
            auth()->id()
        );
        $this->dispatch('material-deleted');

    }
    public function render()
    {
        return view('livewire.delete-material');
    }
}

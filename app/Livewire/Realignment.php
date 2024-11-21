<?php

namespace App\Livewire;

use App\Models\DirectCost;
use App\Models\IndirectCost;
use Livewire\Component;

class Realignment extends Component
{
    public $pow_id;
    public $category_source;
    public $category_source_item;
    public $realign_amount;
    public $destination_category;
    public $destination_category_item;
    public $sourceItems = [];
    public $destinationItems = [];

    protected $rules = [
        'category_source' => 'required',
        'category_source_item' => 'required',
        'realign_amount' => 'required|numeric|min:0',
        'destination_category' => 'required',
        'destination_category_item' => 'required',
    ];

    public function mount($pow_id)
    {
        $this->pow_id = $pow_id;
    }

    public function updatedCategorySource(): void
    {
        \Log::info('Category Source Updated: ' . $this->category_source);
        \Log::info('Current pow_id: ' . $this->pow_id);

        if ($this->category_source === 'direct_cost') {
            $this->sourceItems = DirectCost::where('pow_id', $this->pow_id)->get();
            \Log::info('Fetched Direct Costs: ', $this->sourceItems->toArray());
        } elseif ($this->category_source === 'indirect_cost') {
            $this->sourceItems = IndirectCost::where('pow_id', $this->pow_id)->get();
            \Log::info('Fetched Indirect Costs: ', $this->sourceItems->toArray());
        } else {
            $this->sourceItems = [];
        }

        $this->category_source_item = null; // Reset the selected source item
    }

    public function updatedDestinationCategory(): void
    {
        // Similar logic for destination category
        if ($this->destination_category === 'direct_cost') {
            $this->destinationItems = DirectCost::where('pow_id', $this->pow_id)->get();
        } elseif ($this->destination_category === 'indirect_cost') {
            $this->destinationItems = IndirectCost::where('pow_id', $this->pow_id)->get();
        } else {
            $this->destinationItems = [];
        }

        $this->destination_category_item = null; // Reset the selected destination item
    }

    public function submitRealignment()
    {
        $this->validate();

        // Handle realignment logic here (e.g., realignment processing)

        session()->flash('message', 'Realignment successful!');
    }

    public function render()
    {
        return view('livewire.realignment');
    }
}

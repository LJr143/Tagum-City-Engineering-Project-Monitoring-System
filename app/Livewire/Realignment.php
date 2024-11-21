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
    public bool $isDirectCost = false;
    public $balance = 0; // Property to store the balance

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
        $this->sourceItems = $this->fetchItems($this->category_source);
        $this->category_source_item = null;
        $this->balance = 0;
    }

    public function updatedCategorySourceItem(): void
    {
        // Debug the selected source item
        \Log::info('Selected Source Item ID: ' . $this->category_source_item);

        // Fetch the source item and log it
        $sourceItem = $this->getSourceItem($this->category_source_item);
        \Log::info('Source Item: ', ['item' => $sourceItem]);

        // Update balance
        $this->balance = $this->getBalance($sourceItem);

        \Log::info('Balance :  ', ['balance' => $this->balance]);
    }


    public function updatedDestinationCategory(): void
    {
        $this->destinationItems = $this->fetchItems($this->destination_category);
        $this->destination_category_item = null; // Reset selected item
    }

    protected function fetchItems($category)
    {
        if ($category === 'direct_cost') {
            return DirectCost::where('pow_id', $this->pow_id)->get();
        } elseif ($category === 'indirect_cost') {
            return IndirectCost::where('pow_id', $this->pow_id)->get();
        }
        return [];
    }

    public function submitRealignment(): void
    {
        $this->validate();

        // Fetch source and destination items
        $sourceItem = $this->getSourceItem($this->category_source_item);
        $destinationItem = $this->getDestinationItem($this->destination_category_item);

        // Check existence and validate realignment
        if (!$sourceItem || !$destinationItem) {
            session()->flash('message', 'Source or destination item not found!');
            return;
        }

        $this->balance = $this->getBalance($sourceItem);

        if ($this->getBalance($sourceItem) < $this->realign_amount) {
            session()->flash('message', 'Insufficient balance in the source item!');
            \Log::info('Source Item Balance: ', ['balance' => $this->getBalance($sourceItem)]);
            return;
        }

        // Perform the realignment
        $this->adjustBalanceSource($sourceItem, $this->realign_amount);
        $this->adjustBalance($destinationItem, $this->realign_amount);

        // Save changes
        $sourceItem->save();
        $destinationItem->save();

        \App\Models\RealignmentHistory::create([
            'pow_id' => $this->pow_id,
            'source_item_id' => $this->category_source_item,
            'source_type' => $this->category_source,
            'destination_item_id' => $this->destination_category_item,
            'destination_type' => $this->destination_category,
            'amount' => $this->realign_amount,
            'realigned_by' => auth()->id(),
        ]);

        session()->flash('message', 'Realignment successful!');
    }

    protected function getSourceItem($itemId)
    {
        return $this->category_source === 'direct_cost'
            ? DirectCost::find($itemId)
            : IndirectCost::find($itemId);
    }

    protected function getDestinationItem($itemId)
    {
        return $this->destination_category === 'direct_cost'
            ? DirectCost::find($itemId)
            : IndirectCost::find($itemId);
    }

    protected function getBalance($item)
    {
        // Check for the correct balance field dynamically
        return $item ? ($item->remaining_cost ?? $item->amount ?? 0) : 0;
    }

    protected function adjustBalance($item, $amount): void
    {
        // Dynamically update the correct balance field
        if (isset($item->total_cost)) {
            $item->total_cost += $amount;
            $item->remaining_cost = $item->total_cost - $item->spent_cost;
        } elseif (isset($item->amount)) {
            $item->amount += $amount;
        }
    }

    protected function adjustBalanceSource($item, $amount): void
    {
        // Dynamically update the correct balance field
        if (isset($item->total_cost)) {
            $item->total_cost -= $amount;
            $item->remaining_cost = $item->total_cost - $item->spent_cost;
        } elseif (isset($item->amount)) {
            $item->amount -= $amount;
        }
    }

    public function render()
    {
        return view('livewire.realignment');
    }
}

<div>
    <button
        wire:click="$dispatch('openModal', {{ $purchaseOrder->id }})"
        class="text-white bg-blue-500 hover:bg-blue-700 px-4 py-2 rounded">
        View
    </button>

    <div>
        <livewire:view-po-materials :po_id = "$purchaseOrder"/>
    </div>
</div>

<div>
    <div class="mb-4">
        <h3 class="text-sm font-bold">Materials Information for Purchase Order: {{ $purchaseOrderNumber }}</h3>
        <ul>
            @forelse($materials as $material)
                <li class="text-sm">
                    <strong>Item No:</strong> {{ $material->item_no }},
                    <strong>Material Name:</strong> {{ $material->material->name }}, <!-- Assuming Material has a 'name' attribute -->
                    <strong>Quantity:</strong> {{ $material->quantity }},
                    <strong>Unit Cost:</strong> {{ $material->unit_cost }},
                    <strong>Total Cost:</strong> {{ $material->total_cost }}
                </li>
            @empty
                <p class="text-sm text-gray-500">No materials found for this purchase order.</p>
            @endforelse
        </ul>
    </div>
</div>

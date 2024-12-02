<div>
    <h3>Materials for Purchase Order: {{ $purchaseOrderNumber }}</h3>
    <ul>
        @forelse ($materials as $material)
            <li>
                <strong>Material:</strong> {{ $material->material->item_description ?? 'N/A' }} <br>
                <strong>Quantity:</strong> {{ $material->quantity }} <br>
                <strong>Unit Cost:</strong> {{ number_format($material->unit_cost, 2) }} <br>
                <strong>Total Cost:</strong> {{ number_format($material->total_cost, 2) }}
            </li>
        @empty
            <p>No materials found for this purchase order.</p>
        @endforelse
    </ul>
</div>

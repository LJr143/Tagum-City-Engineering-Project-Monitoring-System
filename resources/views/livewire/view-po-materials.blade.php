<div>
    <h3>Total P.O. Amount: {{ number_format($totalAmount, 2) }}</h3>

    @if ($materials->isEmpty())
        <p>No materials found for this purchase order.</p>
    @else
        <table style="width: 100%; border-collapse: collapse; margin-top: 20px;" border="1">
            <thead>
            <tr style="background-color: #f2f2f2;">
                <th style="padding: 10px; text-align: left;">Material</th>
                <th style="padding: 10px; text-align: right;">Quantity</th>
                <th style="padding: 10px; text-align: right;">Unit Cost</th>
                <th style="padding: 10px; text-align: right;">Total Cost</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($materials as $material)
                <tr>
                    <td style="padding: 10px;">{{ $material->material->item_description ?? 'N/A' }}</td>
                    <td style="padding: 10px; text-align: right;">{{ $material->quantity }}</td>
                    <td style="padding: 10px; text-align: right;">{{ number_format($material->unit_cost, 2) }}</td>
                    <td style="padding: 10px; text-align: right;">{{ number_format($material->total_cost, 2) }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @endif
</div>

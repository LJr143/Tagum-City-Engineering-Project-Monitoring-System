<div>
    <h3>Details for PO #{{ $purchaseOrder->purchase_order_number }}</h3>
    <p>Supplier: {{ $purchaseOrder->supplier }}</p>
    <p>Total Items: {{ $purchaseOrder->total_items }}</p>
    <p>Date Purchased: {{ $purchaseOrder->date_created_formatted }}</p>
    <!-- Add more fields as needed -->
</div>

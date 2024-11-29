<div>
    <!-- PowerGrid Table -->
    <div>
        {!! $this->render() !!}
    </div>

    <!-- Modal -->
    @if($modalVisible)
        <div class="fixed inset-0 flex items-center justify-center bg-gray-900 bg-opacity-50 z-50">
            <div class="bg-white rounded-lg shadow-lg w-1/2">
                <div class="p-4">
                    <h2 class="text-lg font-bold mb-4">Materials in PO #{{ $materials[0]->purchase_order_id ?? 'N/A' }}</h2>
                    <ul class="list-disc pl-5">
                        @forelse($materials as $material)
                            <li>{{ $material->name }} ({{ $material->quantity }})</li>
                        @empty
                            <li>No materials found.</li>
                        @endforelse
                    </ul>
                    <button
                        wire:click="closeModal"
                        class="mt-4 bg-red-500 text-white px-4 py-2 rounded">
                        Close
                    </button>
                </div>
            </div>
        </div>
    @endif
</div>

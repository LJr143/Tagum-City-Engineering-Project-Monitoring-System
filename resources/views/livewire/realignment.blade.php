<div>
    <form wire:submit.prevent="submitRealignment">
        @csrf
        <input type="hidden" wire:model="project_id">

        <!-- Source Category -->
        <label for="category_source" class="block text-xs font-medium text-gray-700">Select Source Category</label>
        <select wire:model.live="category_source" id="category_source" class="select2 w-full border border-gray-300 rounded-md px-2 py-1 text-xs mb-4" required>
            <option value="">Select a source category</option>
            <option value="direct_cost">Direct Cost</option>
            <option value="indirect_cost">Indirect Cost</option>
        </select>

        <!-- Source Category Item -->
            <label for="category_source_item" class="block text-xs font-medium text-gray-700">Select Source Category Item</label>
            <select wire:model.live="category_source_item" id="category_source_item" class="select2 w-full border border-gray-300 rounded-md px-2 py-1 text-xs mb-4" required>
                <option value="">Select a source item</option>
                @foreach($sourceItems as $item)
                    <option value="{{ $item->id }}">{{ $item->description }}</option>
                @endforeach
            </select>

        <p class="text-[11px] text-red-700 mb-2">Remaining Balance: {{ $balance }}</p>

        <!-- Realign Amount -->
        <label for="realign_amount" class="block text-xs font-medium text-gray-700">Amount to Realign</label>
        <input wire:model="realign_amount" type="number" id="realign_amount" step="0.01" min="0"
               class="w-full border border-gray-300 rounded-md px-2 py-1 text-xs mb-4" required>

        <!-- Destination Selection -->
        <label for="destination_category" class="block text-xs font-medium text-gray-700">Realign To</label>
        <select wire:model.live="destination_category" id="destination_category" class="select2 w-full border border-gray-300 rounded-md px-2 py-1 text-xs mb-4" required>
            <option value="">Select a destination category</option>
            <option value="direct_cost">Direct Cost</option>
            <option value="indirect_cost">Indirect Cost</option>
        </select>

        <label for="destination_category_item" class="block text-xs font-medium text-gray-700">Realign To</label>
        <select wire:model="destination_category_item" id="destination_category_item" class="select2 w-full border border-gray-300 rounded-md px-2 py-1 text-xs mb-4" required>
            <option value="">Select a destination category</option>
            @foreach($destinationItems as $item)
                <option value="{{ $item->id }}">{{ $item->description }}</option>
            @endforeach
        </select>

        <!-- Form Actions -->
        <div class="flex justify-end">
            <button type="button" onclick="closeRealignmentModal()" class="bg-white border border-gray-300 text-gray-700 rounded-md text-xs px-4 py-2 hover:bg-gray-400">
                Cancel
            </button>
            <button type="submit" class="bg-green-500 text-white rounded-md px-4 py-2 text-xs hover:bg-green-600 ml-2">
                Realign
            </button>
        </div>
    </form>

    <!-- Success Message -->
    @if (session()->has('message'))
        <div class="text-green-500 text-xs mt-4">
            {{ session('message') }}
        </div>
    @endif

    <script>
        document.addEventListener('livewire:load', function () {
            // Initialize Select2 for the select elements
            initializeSelect2();
        });

        document.addEventListener('livewire:update', function () {
            // Reinitialize Select2 after Livewire updates the DOM
            initializeSelect2();
        });

        function initializeSelect2() {
            $('#category_source, #category_source_item, #destination_category, #destination_category_item')
                .select2({
                    width: '100%',
                    placeholder: 'Select an option',
                })
                .on('change', function () {
                    let id = $(this).attr('id');
                    let value = $(this).val();
                    @this.set(id, value);
                });
        }

    </script>
</div>

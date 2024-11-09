<div x-data="{ makeMaterialReport: @entangle('makeMaterialReport') }" x-cloak @cost-added.window="makeMaterialReport = false">
    <div class="flex justify-end">
        <div class="relative ml-2">
            <button @click="makeMaterialReport = true"
                    class="bg-green-500 text-white text-xs px-4 py-2 rounded shadow-md hover:bg-green-600 focus:outline-none">
                Update Material
            </button>
        </div>
    </div>

    <!-- Modal -->
    <div
        x-show="makeMaterialReport"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50"
    >
        <!-- Modal Content -->
        <div
            x-show="makeMaterialReport"
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 transform scale-90"
            x-transition:enter-end="opacity-100 transform scale-100"
            x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="opacity-100 transform scale-100"
            x-transition:leave-end="opacity-0 transform scale-90"
            class="bg-white rounded-lg shadow-lg p-6 w-full max-w-2xl mx-4 overflow-y-auto max-h-[500px]"
        >
            <div class="flex justify-between items-center mb-4 border-b border-gray-300 pb-2">
                <h2 class="text-sm font-bold text-left w-full sm:w-auto">Material Status Update</h2>

                <!-- Close Button (X) -->
                <button @click="makeMaterialReport = false" class="text-gray-500 hover:text-gray-700">
                    <i class="fas fa-times"></i>
                </button>
            </div>

            <form wire:submit.prevent="saveMaterialUpdate" class="space-y-4 text-[12px]">

                <div class="w-full border border-black p-2 rounded-md">
                    <!-- Display Fields Dynamically -->
                    @foreach ($materials_update as $index => $po)
                        <div class="flex gap-2 items-center mb-2">
                            <input type="number" name="materials_update[{{ $index }}][item_no]"
                                   wire:model.defer="materials_update.{{ $index }}.item_no"
                                   placeholder="Item Number"
                                   class="w-1/2 p-1 border border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 text-xs"
                                   required>

                            <input type="number" name="materials_update[{{ $index }}][quantity]"
                                   wire:model.defer="materials_update.{{ $index }}.quantity"
                                   placeholder="Used Quantity"
                                   class="w-1/3 p-1 border border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 text-xs"
                                   required>


                            @if ($index > 0)
                                <!-- Remove Field Button -->
                                <button type="button" wire:click="removeMaterial({{ $index }})"
                                        class="text-red-500 hover:text-red-700">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M6 18L18 6M6 6l12 12"></path>
                                    </svg>
                                </button>
                            @endif
                        </div>
                    @endforeach
                </div>


                <!-- Add Field Button -->
                <button type="button" wire:click="addMaterial"
                        class="text-[12px] px-2 py-1 rounded  text-green-600 bg-green-100 hover:bg-green-200 p-2 mt-4">
                    + Add Field
                </button>


                <!-- Action Buttons -->
                <div class="mt-6 flex justify-end space-x-2">
                    <button @click="makeMaterialReport = false" type="button"
                            class="bg-gray-300 text-gray-700 text-[12px] h-7 px-4 py-1 rounded shadow-md hover:bg-gray-400 justify-center text-center">
                        Cancel
                    </button>
                    <button type="submit"
                            class="bg-green-500 text-white px-6 py-1 h-7 rounded shadow-md hover:bg-green-600 text-[12px] justify-center text-center">
                        Save
                    </button>
                </div>

            </form>
        </div>
    </div>
</div>

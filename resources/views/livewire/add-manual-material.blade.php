<div x-data="{ open: @entangle('open') }" x-cloak @material-added.window="open = false">
    <div class="flex justify-end">
        <div class="relative ml-2">
            <button @click="open = true"
                    class="bg-green-500 text-white text-xs px-4 py-2 rounded shadow-md hover:bg-green-600 focus:outline-none">
                Add Material
            </button>
        </div>
    </div>

    <!-- Modal -->
    <div
        x-show="open"
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
            x-show="open"
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 transform scale-90"
            x-transition:enter-end="opacity-100 transform scale-100"
            x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="opacity-100 transform scale-100"
            x-transition:leave-end="opacity-0 transform scale-90"
            class="bg-white p-4 md:p-6 rounded-lg shadow-lg w-full max-w-md md:max-w-[700px] overflow-y-auto max-h-full md:max-h-screen mx-4 sm:mx-8"
        >

            <div class="flex justify-between items-center mb-4 border-b border-gray-300 pb-2">
                <h2 class="text-sm font-bold text-left w-full sm:w-auto">Add Material</h2>

                <!-- Close Button (X) -->
                <button @click="open = false" class="text-gray-500 hover:text-gray-700">
                    <i class="fas fa-times"></i>
                </button>
            </div>

            <form wire:submit.prevent="submit" class="text-xs">
                <div class="grid gap-6">
                    <div class="hidden">
                        <label class="block text-xs font-medium mb-1">POW ID</label>
                        <input type="number" wire:model="pow_id"
                               class="w-full px-3 py-2 text-xs border border-gray-400 focus:ring-green-500 focus:border-green-500 rounded" required>
                        @error('pow_id') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    </div>
                    <div>
                        <label class="block text-xs font-medium mb-1">Item No</label>
                        <input type="number" wire:model="item_no"
                               class="w-full px-3 py-2 text-xs border border-gray-400 focus:ring-green-500 focus:border-green-500 rounded" required>
                        @error('item_no') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    </div>
                    <div>
                        <label class="block text-xs font-medium mb-1">Quantity</label>
                        <input type="number" wire:model="quantity"
                               class="w-full px-3 py-2 text-xs border border-gray-400 focus:ring-green-500 focus:border-green-500 rounded" required>
                        @error('quantity') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    </div>
                    <div>
                        <label class="block text-xs font-medium mb-1">Unit of Issue</label>
                        <input type="text" wire:model="unit_of_issue"
                               class="w-full px-3 py-2 text-xs border border-gray-400 focus:ring-green-500 focus:border-green-500 rounded" required>
                        @error('unit_of_issue') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    </div>
                    <div>
                        <label class="block text-xs font-medium mb-1">Item Description</label>
                        <textarea wire:model="item_description"
                                  class="w-full h-[50px] md:h-[80px] px-3 py-2 text-xs border border-gray-400 focus:ring-green-500 focus:border-green-500 rounded"
                                  style="resize: none;" required></textarea>
                        @error(' item_description') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    </div>
                    <div>
                        <label class="block text-xs font-medium mb-1">Estimated Unit Cost</label>
                        <input type="number" step="0.01" wire:model="estimated_unit_cost"
                               class="w-full px-3 py-2 text-xs border border-gray-400 focus:ring-green-500 focus:border-green-500 rounded" required>
                        @error('estimated_unit_cost') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="mt-6 flex justify-end space-x-2">
                    <button @click="open = false"
                            type="button"
                            class="bg-gray-200 text-gray-700 px-4 py-2 rounded shadow-md hover:bg-gray-400 text-xs w-1/2 focus:ring-2 focus:ring-green-500 focus:border-green-500">
                        Cancel
                    </button>

                    <button type="submit"
                            class="bg-green-500 text-white px-4 py-2 rounded shadow-md hover:bg-green-600 text-xs w-1/2 focus:ring-2 focus:ring-green-500 focus:border-green-500">
                        Add Material
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

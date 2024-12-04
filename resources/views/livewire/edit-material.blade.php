<div class="flex text-left" x-data="{ open: false }" x-cloak @open-edit-modal.window="open = true" @material-edited.window="open = false">
    <div class="flex justify-content-center align-items-center">
        <div class="relative">

            <button @click="open = true" class="flex text-white text-xs  rounded  focus:outline-none">

                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="ml-2">
                    <path d="M21 7L17 3L14 6L8 12V16H12L18 10L21 7Z" stroke="green" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M14 6L18 10" stroke="green" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M10 4H4V20H20V14" stroke="green" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>

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
                <h2 class="text-sm font-bold text-left w-full sm:w-auto">Edit Material</h2>

                <!-- Close Button (X) -->
                <button @click="open = false" class="text-gray-500 hover:text-gray-700">
                    <i class="fas fa-times"></i>
                </button>
            </div>


            <form wire:submit.prevent="submit" class="text-xs">
                <div class="grid gap-3">
                    <div>
                        <label for="item_description" class="block text-xs font-medium mb-1">Item Description</label>
                        <textarea id="item_description" wire:model="item_description"
                                  class="w-full h-[60px] md:h-auto  py-2 text-xs border border-gray-300 focus:ring-green-500 focus:border-green-500 rounded resize-none"
                                  style="vertical-align: top;" placeholder="Enter item description..."></textarea>
                        @error('item_description') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    </div>

                <div>
                    <label for="quantity" class="block text-xs font-medium mb-1">Quantity</label>
                    <input type="text" id="quantity" wire:model="quantity"
                           class="w-full px-3 py-2 text-xs border border-gray-300 focus:ring-green-500 focus:border-green-500 rounded">
                    @error('quantity') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label for="estimated_unit_cost" class="block text-xs font-medium mb-1">Unit Cost</label>
                    <input type="text" id="estimated_unit_Cost" wire:model="estimated_unit_cost"
                           class="w-full px-3  text-xs border border-gray-300 focus:ring-green-500 focus:border-green-500 rounded"
                           readonly>
                    @error('estimated_unit_cost') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label for="estimated_cost" class="block text-xs font-medium mb-1">Total Cost</label>
                    <input type="text" id="estimated_cost" wire:model="estimated_cost"
                           class="w-full px-3  text-xs border border-gray-300 focus:ring-green-500 focus:border-green-500 rounded" readonly>
                    @error('estimated_cost') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
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
                        Save Changes
                    </button>
                </div>



            </form>
        </div>
    </div>
</div>

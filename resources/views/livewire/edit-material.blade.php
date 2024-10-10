<div class="flex text-left" x-data="{ open: false }" x-cloak @open-edit-modal.window="open = true" @material-edited.window="open = false">
    <div class="flex justify-end">
        <div class="relative ml-2">
            <button @click="open = true" class="flex bg-green-500 text-white text-xs px-4 py-2 rounded shadow-md hover:bg-green-600 focus:outline-none">
                Edit

                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="ml-2">
                    <path d="M21 7L17 3L14 6L8 12V16H12L18 10L21 7Z" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M14 6L18 10" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M10 4H4V20H20V14" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
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
            class="bg-white w-full max-w-[700px] p-6 rounded-lg relative"
        >
            <!-- Close Button (X) -->
            <button @click="open = false" class="absolute top-2 right-2 text-gray-500 hover:text-gray-700">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>

            <h2 class="text-lg font-bold mb-4">Edit Project</h2>
            <form wire:submit.prevent="submit" class="text-xs">

                <div class="flex flex-col space-y-2">
                    <label for="item_description" class="block text-gray-700 text-xs">Item Description</label>
                    <input type="text" id="item_description" wire:model="item_description"
                           class="mt-1 block w-full p-1 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-xs"
                            readonly>
                    @error('item_description') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>

                <div class="flex flex-col space-y-1">
                    <label for="quantity" class="block text-gray-700 text-xs">Quantity</label>
                    <input type="text" id="quantity" wire:model="quantity"
                           class="mt-1 block w-full p-1 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-xs"
                           readonly>
                    @error('quantity') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>

                <div class="flex flex-col space-y-1">
                    <label for="estimated_unit_cost" class="block text-gray-700 text-xs">Unit Cost</label>
                    <input type="text" id="estimated_unit_Cost" wire:model="estimated_unit_cost"
                           class="mt-1 block w-full p-1 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-xs"
                           readonly>
                    @error('estimated_unit_cost') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>

                <div class="flex flex-col space-y-1">
                    <label for="estimated_cost" class="block text-gray-700 text-xs">Total Cost</label>
                    <input type="text" id="estimated_cost" wire:model="estimated_cost"
                           class="mt-1 block w-full p-1 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-xs"
                           readonly>
                    @error('estimated_cost') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>

                <div class="flex flex-col space-y-1">
                    <label for="quantity_use" class="block text-gray-700 text-xs">Enter Quantity Used</label>
                    <input type="text" id="quantity_use" wire:model="quantity_use"
                           class="mt-1 block w-full p-1 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-xs"
                           required>
                    @error('quantity_use') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>

                <div class="flex flex-col space-y-1">
                    <label for="spent_cost" class="block text-gray-700 text-xs">Total Spent</label>
                    <input type="text" id="spent_cost" wire:model="spent_cost"
                           class="mt-1 block w-full p-1 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-xs"
                           >
                    @error('spent_cost') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>


                <!-- Action Buttons -->
                <div class="flex justify-end space-x-2 mt-4">
                    <button type="button" @click="open = false" class="bg-gray-300 text-gray-700 rounded-md px-4 py-2 text-xs">Cancel</button>
                    <button type="submit" class="bg-green-700 text-white rounded-md px-4 py-2 text-xs hover:bg-green-800">Save Changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

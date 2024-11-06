<div x-data="{ directOpen: @entangle('directOpen') }" x-cloak @cost-added.window="directOpen = false">
    <div class="flex justify-end">
        <div class="relative ml-2">
            <button @click="directOpen = true"
                    class="bg-green-500 text-white text-xs px-4 py-2 rounded shadow-md hover:bg-blue-600 focus:outline-none">
                Add Direct Cost
            </button>
        </div>
    </div>

    <!-- Modal -->
    <div
        x-show="directOpen"
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
            x-show="directOpen"
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 transform scale-90"
            x-transition:enter-end="opacity-100 transform scale-100"
            x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="opacity-100 transform scale-100"
            x-transition:leave-end="opacity-0 transform scale-90"
            class="bg-white w-full max-w-[700px] p-6 rounded-lg relative"
        >
            <!-- Close Button (X) -->
            <button @click="directOpen = false" class="absolute top-2 right-2 text-gray-500 hover:text-gray-700">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                     stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>

            <h2 class="text-lg font-bold mb-4">Add Direct Costs</h2>

            <form wire:submit.prevent="saveDirectCosts" class="space-y-4 text-[12px]">
                <!-- Display Fields Dynamically -->
                @foreach ($direct_costs as $index => $cost)
                    <div class="flex gap-2 items-center">
                        <input type="text" name="direct_costs[{{ $index }}][description]"
                               wire:model.defer="direct_costs.{{ $index }}.description"
                               placeholder="Description"
                               class="w-1/2 p-1 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 text-xs"
                               required>

                        <input type="number" name="direct_costs[{{ $index }}][amount]"
                               wire:model.defer="direct_costs.{{ $index }}.amount"
                               placeholder="Amount"
                               class="w-1/3 p-1 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 text-xs"
                               required>

                        @if ($index > 0)
                            <!-- Remove Field Button -->
                            <button type="button" wire:click="removeCost({{ $index }})"
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

                <!-- Add Field Button -->
                <button type="button" wire:click="addCost"
                        class="bg-blue-500 text-white text-[12px] px-2 py-1 rounded hover:bg-blue-600">
                    + Add Field
                </button>

                <!-- Action Buttons -->
                <div class="mt-6 flex justify-end space-x-2">
                    <button @click="directOpen = false" type="button"
                            class="bg-gray-300 text-gray-700 text-[12px] px-4 py-2 rounded shadow-md hover:bg-gray-400 text-xs">
                        Cancel
                    </button>
                    <button type="submit"
                            class="bg-green-500 text-white px-6 py-2 rounded shadow-md hover:bg-green-600 text-[12px]">
                        Save
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

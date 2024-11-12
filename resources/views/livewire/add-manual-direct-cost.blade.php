<div x-data="{ directOpen: @entangle('directOpen') }" x-cloak @cost-added.window="directOpen = false">
    <div class="flex justify-end">
        <div class="relative ml-2">
            <button @click="directOpen = true"
                    class="bg-green-500 text-white text-xs px-4 py-2 rounded shadow-md hover:bg-green-600 focus:outline-none">
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
        class="fixed inset-0 bg-gray-800 bg-opacity-50 flex items-center justify-center z-50 p-4"
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
            class="bg-white p-6 rounded-lg shadow-md max-w-2xl w-full relative overflow-y-auto max-h-[90vh] sm:max-h-[90vh]"
        >
            <div class="flex justify-between items-center mb-4 border-b border-gray-300 pb-2">
                <h2 class="text-sm font-bold text-left w-full sm:w-auto">Add Direct Costs</h2>

                <!-- Close Button (X) -->
                <button @click="directOpen = false" class="text-gray-500 hover:text-gray-700">
                    <i class="fas fa-times"></i>
                </button>
            </div>

            <form wire:submit.prevent="saveDirectCosts" class="space-y-4 text-[12px]">
                <!-- Display Fields Dynamically -->
                @foreach ($direct_costs as $index => $cost)
                    <div class="flex flex-col sm:flex-row gap-2 items-center border-2 p-2 ">
                        <input type="text" name="direct_costs[{{ $index }}][item_no]"
                               wire:model.defer="direct_costs.{{ $index }}.item_no"
                               placeholder="Item no"
                               class="w-full sm:w-1/2 p-1 border border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 text-xs"
                        >
                        <input type="text" name="direct_costs[{{ $index }}][description]"
                               wire:model.defer="direct_costs.{{ $index }}.description"
                               placeholder="Description"
                               class="w-full sm:w-1/2 p-1 border border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 text-xs"
                        >

                        <input type="number" name="direct_costs[{{ $index }}][%_of_total]"
                               wire:model.defer="direct_costs.{{ $index }}.%_of_total"
                               placeholder="%_of_total"
                               class="w-full sm:w-1/2 p-1 border border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 text-xs"
                        >

                        <input type="number" name="direct_costs[{{ $index }}][quantity]"
                               wire:model.defer="direct_costs.{{ $index }}.quantity"
                               placeholder="quantity"
                               class="w-full sm:w-1/2 p-1 border border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 text-xs"
                        >

                        <input type="text" name="direct_costs[{{ $index }}][unit]"
                               wire:model.defer="direct_costs.{{ $index }}.unit"
                               placeholder="unit"
                               class="w-full sm:w-1/2 p-1 border border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 text-xs"
                        >

                        <input type="number" name="direct_costs[{{ $index }}][unit_cost]"
                               wire:model.defer="direct_costs.{{ $index }}.unit_cost"
                               placeholder="unit_cost"
                               class="w-full sm:w-1/2 p-1 border border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 text-xs"
                        >

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
                        class="text-[12px] px-2 py-1 rounded  text-green-600 bg-green-100 hover:bg-green-200 p-2 mt-4">
                    + Add Field
                </button>


                <!-- Action Buttons -->
                <div class="mt-6 flex justify-end space-x-2">
                    <button @click="directOpen = false" type="button"
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

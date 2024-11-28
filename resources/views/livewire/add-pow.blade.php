<div x-data="{ open: false, isUploading: @entangle('isUploading'), indirectOpen: false , directOpen: false}" x-cloak
     @pow-added.window="open = false"
>
    <div class="flex justify-end mb-4">
        <div class="relative ml-2">
            <button @click="open = true"
                    class="bg-green-500 text-white mr-2 text-xs px-4 py-2 rounded shadow-md hover:bg-green-600 focus:outline-none">
                Add Project Details
            </button>
        </div>
    </div>

    <!-- Modal Background -->
    <div x-show="open" class="fixed inset-0 bg-gray-800 bg-opacity-50 flex items-center justify-center z-50 p-4">
        <!-- Modal Content -->
        <div class="bg-white p-4 rounded-lg shadow-lg w-full max-w-2xl relative my-8 pt-4 pb-4 overflow-y-auto max-h-[90vh] sm:max-h-[90vh]">

            <div class="flex justify-between items-center mb-4 border-b border-gray-300 pb-2">
                <div class="flex items-center">

                    <h2 class="text-lg font-bold text-center sm:text-left w-full sm:w-auto">Add Project Details</h2>
                </div>

                <!-- Close Button (X) -->
                <button @click="open = false" class="text-gray-500 hover:text-gray-700">
                    <i class="fas fa-times"></i>
                </button>
            </div>

            <form wire:submit.prevent="save" class="space-y-2" enctype="multipart/form-data" x-data="{ isLoading: false }" @submit="isLoading = true; setTimeout(() => isLoading = false, 6000)">
                <div class="mb-1">
                    <label for="reference-number" class="block text-gray-700 text-xs">Reference Number</label>
                    <input type="text" id="reference-number" wire:model="reference_number"
                           class="mt-1 block w-full h-8 p-1 border border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-xs"
                           required>
                    <!-- Errorr message for reference_number -->
                    @error('reference_number')
                    <span class="text-red-500 ml-2 text-[10px]">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-1">
                    <label for="source-of-funds" class="block text-gray-700 text-xs">Source of Funds</label>
                    <input type="text" id="source-of-funds" wire:model="source_of_funds"
                           class="mt-1 block w-full h-8 p-1 border border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-xs"
                           required>
                    <!-- Error message for source_of_funds -->
                    @error('source_of_funds')
                    <span class="text-red-500 ml-2 text-[10px]">{{ $message }}</span>
                    @enderror
                </div>

                <div class="flex flex-col mb-5 ">
                    <label for="description" class="block text-gray-700 text-xs">Description</label>
                    <textarea id="description" wire:model="description" rows="4"
                              class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-xs p-2"
                              required></textarea>
                </div>

                <div class="flex gap-4">
                    <div class="w-full">
                        <h3 class="text-xs font-semibold mb-2 mt-2">Direct and Indirect Cost Importation</h3>

                        <!-- UPLOAD PR AND POW -->
                        <div class="text-[12px]">
                            <label for="materialsFile" class="block text-gray-700 text-xs mb-1">Upload Material (PR)</label>
                            <div class="relative group">
                                <!-- Hidden File Input -->
                                <input type="file" id="materialsFile" wire:model="materialsFile"
                                       class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10">

                                <!-- Custom Upload Button -->
                                <div class="flex items-center justify-between bg-green-100 border border-dashed border-green-700 rounded p-2 cursor-pointer hover:bg-green-400">
                                    <!-- Display File Name or Placeholder -->
                                    <span class="text-green-700 text-xs truncate">
                {{ $materialsFile ? $materialsFile->getClientOriginalName() : 'Choose a file...' }}
            </span>

                                    <!-- Loading Spinner -->
                                    <div wire:loading wire:target="materialsFile" class="ml-2 animate-spin">
                                        <svg class="w-6 h-6 text-green-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                            <circle
                                                class="opacity-25"
                                                cx="12"
                                                cy="12"
                                                r="10"
                                                stroke="currentColor"
                                                stroke-width="4">
                                            </circle>
                                            <path
                                                class="opacity-75"
                                                fill="currentColor"
                                                d="M4 12a8 8 0 018-8v8h8a8 8 0 11-16 0z">
                                            </path>
                                        </svg>
                                    </div>

                                </div>
                            </div>

                            <!-- Error Message -->
                            @error('materialsFile')
                            <span class="text-red-500 ml-2 text-[10px]">{{ $message }}</span>
                            @enderror
                        </div>


                        <div class="text-[12px] ">
                            <label for="powFile" class="block text-gray-700 text-xs mt-2 mb-1">Upload POW</label>
                            <div class="relative group">
                                <!-- Hidden File Input -->
                                <input type="file" id="powFile" wire:model="powFile"
                                       class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10">

                                <!-- Custom Upload Button -->
                                <div class="flex items-center justify-between bg-green-100 border border-dashed border-green-700 rounded p-2 cursor-pointer hover:bg-green-400">
                                    <!-- Display File Name or Placeholder -->
                                    <span class="text-green-700 text-xs truncate">
                {{ $powFile ? $powFile->getClientOriginalName() : 'Choose a file...' }}
            </span>

                                    <!-- Loading Spinner -->
                                    <div  wire:loading wire:target="powFile"  class="ml-2 animate-spin">
                                        <svg class="w-6 h-6 text-green-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                            <circle
                                                class="opacity-25"
                                                cx="12"
                                                cy="12"
                                                r="10"
                                                stroke="currentColor"
                                                stroke-width="4">
                                            </circle>
                                            <path
                                                class="opacity-75"
                                                fill="currentColor"
                                                d="M4 12a8 8 0 018-8v8h8a8 8 0 11-16 0z">
                                            </path>
                                        </svg>
                                    </div>


                                </div>
                            </div>

                            <!-- Error Message -->
                            @error('powFile')
                            <span class="text-red-500 ml-2 text-[10px]">{{ $message }}</span>
                            @enderror
                        </div>

                    </div>
                </div>

                <!-- Modal Direct Costs -->
                <div x-show="directOpen" class="fixed inset-0 bg-gray-800 bg-opacity-50 flex items-center justify-center z-50 p-4">
                    <div class="bg-white p-6 rounded-lg shadow-md max-w-2xl w-full relative overflow-y-auto max-h-[90vh] sm:max-h-[90vh]">

                        <div class="flex justify-between items-center mb-4 border-b border-gray-300 pb-2">
                            <h2 class="text-sm font-bold text-left w-full sm:w-auto">Add Direct Costs</h2>

                            <!-- Close Button (X) -->
                            <button @click="directOpen = false" class="text-gray-500 hover:text-gray-700">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>

                        <!-- Form -->
                        <div class="space-y-4">

                            <div>
                                <label for="powFile" class="block text-gray-700 text-xs">Upload POW</label>
                                <input type="file" id="powFile" wire:model="powFile"
                                       class="mt-1 block w-full p-1 border border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-xs">
                                <!-- Error message for materialsFile -->
                                @error('powFile')
                                <span class="text-red-500 ml-2 text-[10px]">{{ $message }}</span>
                                @enderror
                            </div>

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
                                        <button type="button" wire:click="removeCost('direct',{{ $index }})"
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
                            <button type="button" wire:click="addCost('direct')"
                                    class="text-[12px] px-2 py-1 rounded  text-green-600 bg-green-100 hover:bg-green-200 p-2 mt-4">
                                + Add Field
                            </button>

                            <!-- Action Buttons -->
                            <div class="mt-6 flex justify-end space-x-2">
                                <button @click="directOpen = false" type="button"
                                        class="bg-gray-200 text-gray-700 text-[12px] h-7 px-4 py-1 rounded shadow-md hover:bg-gray-400 justify-center text-center">
                                    Cancel
                                </button>
                                <!-- Submit Button -->
                                <button type="submit"
                                        class="bg-green-500 text-white px-6 py-1 h-7 rounded shadow-md hover:bg-green-600 text-[12px] justify-center text-center"
                                        @click="directOpen = false; ">
                                    Save
                                </button>
                            </div>


                        </div>
                    </div>
                </div>


                <!-- Modal Indirect Cost -->
                <div x-show="indirectOpen" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50">
                    <div class="bg-white rounded-lg shadow-lg p-6 w-full max-w-2xl mx-4 overflow-y-auto max-h-[300px]">

                        <div class="flex justify-between items-center mb-4 border-b border-gray-300 pb-2">
                            <h2 class="text-sm font-bold text-left w-full sm:w-auto">Add Indirect Cost</h2>

                            <!-- Close Button (X) -->
                            <button @click="indirectOpen = false" class="text-gray-500 hover:text-gray-700">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>



                        <!-- Form -->
                        <div class="space-y-4">
                            <!-- Display Fields Dynamically -->
                            @foreach ($indirect_costs as $index => $cost)
                                <div class="flex gap-2 items-center">
                                    <input type="text" name="indirect_costs[{{ $index }}][description]"
                                           wire:model.defer="indirect_costs.{{ $index }}.description"
                                           placeholder="Description"
                                           class="w-1/2 p-1 border border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 text-xs"
                                    >


                                    <input type="number" name="indirect_costs[{{ $index }}][amount]"
                                           wire:model.defer="indirect_costs.{{ $index }}.amount"
                                           placeholder="Amount"
                                           class="w-1/3 p-1 border border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 text-xs"
                                    >

                                    @if ($index > 0)
                                        <!-- Remove Field Button -->
                                        <button type="button" wire:click="removeCost('indirect', {{ $index }})"
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
                            <button type="button" wire:click="addCost('indirect')"
                                    class="text-[12px] px-2 py-1 rounded  text-green-600 bg-green-100 hover:bg-green-200 p-2 mt-4">
                                + Add Field
                            </button>

                            <!-- Action Buttons -->
                            <div class="mt-6 flex justify-end space-x-2">
                                <button @click="indirectOpen = false" type="button"
                                        class="bg-gray-300 text-gray-700 text-[12px] h-7 px-4 py-1 rounded shadow-md hover:bg-gray-400 justify-center text-center">
                                    Cancel
                                </button>
                                <!-- Submit Button -->
                                <button type="submit"
                                        class="bg-green-500 text-white px-6 py-1 h-7 rounded shadow-md hover:bg-green-600 text-[12px] justify-center text-center"
                                        @click="indirectOpen = false; ">
                                    Save
                                </button>
                            </div>


                        </div>
                    </div>
                </div>
                <br>

                <!-- Loading Spinner -->
                <div x-show="isLoading" class="flex justify-center items-center mt-4">
                    <svg class="animate-spin h-5 w-5 text-green-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8H4z"></path>
                    </svg>
                    <span class="ml-2 text-xs text-gray-700">Processing...</span>
                </div>


                <!-- Action Buttons -->
                <div class="flex justify-end space-x-2">
                    <button @click="open = false"
                            type="button"
                            class="bg-gray-200 text-gray-700 px-4 py-2 rounded shadow-md hover:bg-gray-400 text-xs w-1/2 focus:ring-2 focus:ring-green-500 focus:border-green-500"
                            :disabled="isLoading">
                        Cancel
                    </button>

                    <button type="submit"
                            class="bg-green-500 text-white px-4 py-2 rounded shadow-md hover:bg-green-600 text-xs w-1/2 focus:ring-2 focus:ring-green-500 focus:border-green-500">
                        Save
                    </button>
                </div>
            </form>
        </div>
    </div>



</div>

@script
<script>
    function selectEngineer(engineer) {
        @this.
        set('engineer_id', engineer.id);
        this.search = engineer.first_name;
        this.open = false;
    }


</script>
@endscript

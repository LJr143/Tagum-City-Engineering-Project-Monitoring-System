<div x-data="{ open: false, isUploading: @entangle('isUploading'), indirectOpen: false }" x-cloak
     @pow-added.window="open = false"
>
    <div class="flex justify-end mb-4">
        <div class="relative ml-2">
            <button @click="open = true"
                    class="bg-green-700 text-white mr-2 text-xs px-4 py-2 rounded shadow-md hover:bg-green-900 focus:outline-none">
                Add New POW
            </button>
        </div>
    </div>

    <!-- Modal Background -->
    <div x-show="open" class="fixed inset-0 bg-gray-800 bg-opacity-50 flex items-center justify-center z-50">
        <!-- Modal Content -->
        <div class="bg-white p-6 rounded-lg shadow-md max-w-2xl w-full relative z-60">
            <button @click="open = false" class="absolute top-2 right-2 text-gray-500 hover:text-gray-700">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                     xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>

            <h3 class="text-lg font-bold mb-2">Add New POW Card</h3>
            <form wire:submit.prevent="save" class="space-y-2" enctype="multipart/form-data">
                <div class="flex flex-col space-y-1">
                    <label for="reference-number" class="block text-gray-700 text-xs">Reference Number</label>
                    <input type="text" id="reference-number" wire:model="reference_number"
                           class="mt-1 block w-full h-8 p-1 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-xs"
                           required>
                    <!-- Error message for reference_number -->
                    @error('reference_number')
                    <span class="text-red-500 ml-2 text-[10px]">{{ $message }}</span>
                    @enderror
                </div>

                <div class="flex flex-col space-y-1">
                    <label for="description" class="block text-gray-700 text-xs">Description</label>
                    <textarea id="description" wire:model="description" rows="4"
                              class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-xs p-2"
                              required></textarea>
                </div>

                {{--                    <div class="flex space-x-4">--}}
                {{--                        <div class="flex-1">--}}
                {{--                            <label for="start-date" class="block text-xs font-small text-gray-700">Start Date</label>--}}
                {{--                            <input type="date" id="start-date" wire:model="start_date"--}}
                {{--                                   class="mt-1 block w-full p-1 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-xs">--}}
                {{--                        </div>--}}
                {{--                        <div class="flex-1">--}}
                {{--                            <label for="end-date" class="block text-xs font-small text-gray-700">End Date</label>--}}
                {{--                            <input type="date" id="end-date" wire:model="end_date"--}}
                {{--                                   class="mt-1 block w-full p-1 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-xs">--}}
                {{--                        </div>--}}
                {{--                    </div>--}}

                <h3 class="text-xs font-semibold mb-2 mt-5">Direct and Indirect Cost Information</h3>

                <!-- Engineer Select Field -->
                {{--                    <div x-data="{--}}
                {{--            open: true,--}}
                {{--            search: '',--}}
                {{--            filteredEngineers: [],--}}
                {{--            selectEngineer(engineer) {--}}
                {{--                @this.set('engineer_id', engineer.id);--}}
                {{--                this.search = `${engineer.first_name} ${engineer.middle_initial ? engineer.middle_initial + ' ' : ''}${engineer.last_name}`;--}}
                {{--                this.open = false;--}}
                {{--            }--}}
                {{--        }" class="relative">--}}
                {{--                        <label for="engineer_id" class="block text-gray-700 text-xs">Engineer</label>--}}
                {{--                        <input--}}
                {{--                            type="text"--}}
                {{--                            id="engineer_id"--}}
                {{--                            x-model="search"--}}
                {{--                            @focus="open = true"--}}
                {{--                            @input.debounce.300ms="filteredEngineers = @js($engineers).filter(engineer => {--}}
                {{--                const fullName = `${engineer.first_name} ${engineer.middle_initial ? engineer.middle_initial + ' ' : ''}${engineer.last_name}`;--}}
                {{--                return fullName.toLowerCase().includes(search.toLowerCase());--}}
                {{--            })"--}}
                {{--                            @keydown.escape.window="open = false"--}}
                {{--                            @click="open = true"--}}
                {{--                            class="mt-1 block w-full p-1 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-xs"--}}
                {{--                            placeholder="Search for an Engineer"--}}
                {{--                            autocomplete="off"--}}
                {{--                            required--}}
                {{--                        />--}}

                {{--                        <ul--}}
                {{--                            x-show="open && (filteredEngineers.length > 0 || search.length > 0)"--}}
                {{--                            @click.away="open = false"--}}
                {{--                            class="absolute z-10 mt-1 w-full bg-white border border-gray-300 rounded-md shadow-lg sm:text-xs"--}}
                {{--                            x-transition--}}
                {{--                        >--}}
                {{--                            <template x-for="engineer in filteredEngineers" :key="engineer.id">--}}
                {{--                                <li--}}
                {{--                                    @click.stop="selectEngineer(engineer)"--}}
                {{--                                    class="cursor-pointer hover:bg-indigo-500 hover:text-white p-2"--}}
                {{--                                >--}}
                {{--                                    <span x-text="`${engineer.first_name} ${engineer.middle_initial ? engineer.middle_initial + ' ' : ''}${engineer.last_name}`"></span>--}}
                {{--                                </li>--}}
                {{--                            </template>--}}
                {{--                            <li x-show="!filteredEngineers.length && search.length > 0" class="p-2 text-gray-500">No engineers found</li>--}}
                {{--                        </ul>--}}

                {{--                        @error('engineer_id') <span class="error">{{ $message }}</span> @enderror--}}
                {{--                    </div>--}}


                <div class="flex gap-4">
                    <div class="w-full">
                        <div class="flex flex-col space-y-1">
                            <label for="total_labor_cost" class="block text-gray-700 text-xs">Total Labor Cost</label>
                            <input type="text" id="total_labor_cost" wire:model="total_labor_cost"
                                   class="mt-1 block w-full p-1 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-xs"
                                   required>
                            <!-- Error message for total_labor_cost -->
                            @error('total_labor_cost')
                            <span class="text-red-500 ml-2 text-[10px]">{{ $message }}</span>
                            @enderror

                        </div>
                    </div>
                </div>
                <!-- Radio Button Toggle -->
                <div x-data="{ uploadFile: 'none' }" class="mb-4">
                    <div class="flex items-center space-x-4 mb-4">
                        <label class="flex items-center space-x-2">
                            <input type="radio" name="upload_option" x-model="uploadFile" value="upload"
                                   class="text-indigo-600">
                            <span class="text-gray-700 text-sm">Upload Excel File</span>
                        </label>
                        <label class="flex items-center space-x-2">
                            <input type="radio" name="upload_option" x-model="uploadFile" value="manual"
                                   class="text-indigo-600">
                            <span class="text-gray-700 text-sm">Enter Total Material Cost</span>
                        </label>
                    </div>

                    <!-- Upload Material Input -->
                    <div x-show="uploadFile === 'upload'" x-cloak>
                        <label for="materialsFile" class="block text-gray-700 text-xs">Upload Material (PR)</label>
                        <input type="file" id="materialsFile" wire:model="materialsFile"
                               class="mt-1 block w-full p-1 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-xs">
                        <!-- Error message for materialsFile -->
                        @error('materialsFile')
                        <span class="text-red-500 ml-2 text-[10px]">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Total Material Cost Input -->
                    <div x-show="uploadFile === 'manual'" x-cloak>
                        <label for="total_material_cost" class="block text-gray-700 text-xs">Total Material Cost</label>
                        <input type="text" id="total_material_cost" wire:model="total_material_cost"
                               class="mt-1 block w-full p-1 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-xs">
                        <!-- Error message for total_material_cost -->
                        @error('total_material_cost')
                        <span class="text-red-500 ml-2 text-[10px]">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="flex justify-end mt-4 w-full">
                        <button type="button" @click="indirectOpen = true"
                                class="bg-blue-700 text-white text-xs px-4 py-2 w-full rounded shadow-md hover:bg-blue-900">
                            Add Indirect Cost
                        </button>
                    </div>
                    <!-- Error message for indirect costs -->
                    @error('indirect_costs')
                    <div class="text-red-600 text-[10px] mt-1">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <!-- Modal -->
                <div x-show="indirectOpen" class="fixed inset-0 bg-gray-800 bg-opacity-50 flex items-center justify-center z-50">
                    <div class="bg-white p-6 rounded-lg shadow-md max-w-2xl w-full relative">
                        <!-- Close button -->
                        <button @click="indirectOpen = false" class="absolute top-2 right-2 text-gray-500 hover:text-gray-700">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </button>

                        <h3 class="text-lg font-bold mb-2">Add Indirect Costs</h3>

                        <!-- Form -->
                        <div class="space-y-4">
                            <!-- Display Fields Dynamically -->
                            @foreach ($indirect_costs as $index => $cost)
                                <div class="flex gap-2 items-center">
                                    <input type="text" name="indirect_costs[{{ $index }}][description]"
                                           wire:model.defer="indirect_costs.{{ $index }}.description"
                                           placeholder="Description"
                                           class="w-1/2 p-1 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 text-xs"
                                           required>

                                    <!-- Error Message for Description -->
                                    @error('indirect_costs.' . $index . '.description')
                                    <span class="text-red-500 text-[10px]">{{ $message }}</span>
                                    @enderror

                                    <input type="number" name="indirect_costs[{{ $index }}][amount]"
                                           wire:model.defer="indirect_costs.{{ $index }}.amount"
                                           placeholder="Amount"
                                           class="w-1/3 p-1 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 text-xs"
                                           required>

                                    <!-- Error Message for Amount -->
                                    @error('indirect_costs.' . $index . '.amount')
                                    <span class="text-red-500 text-[10px]">{{ $message }}</span>
                                    @enderror

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
                                    class="bg-blue-500 text-white text-[14px] px-2 py-1 rounded hover:bg-blue-600">
                                + Add Field
                            </button>

                            <!-- Submit Button -->
                            <button type="button"
                                    class="bg-green-500 text-white text-[14px] px-3 py-1 rounded shadow-md hover:bg-green-600"
                                    @click="indirectOpen = false; ">
                                Save
                            </button>
                        </div>
                    </div>
                </div>
                <br>
                <div class="flex justify-between mt-2">
                    <button type="button" @click="open = false"
                            class="border border-gray-300 text-gray-800 bg-white px-3 py-1 rounded hover:bg-gray-100 focus:outline-none text-xs flex-1 mr-2">
                        Cancel
                    </button>
                    <button type="submit"
                            class="bg-green-500 text-white px-3 py-1 rounded shadow-md hover:bg-green-600 focus:outline-none text-xs flex-1 ml-2"
                            :disabled="isUploading">
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

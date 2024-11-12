<div x-data="{ open: false }" x-cloak @project-edited.window="open = false" >
    <div class="flex justify-end">
        <div class="relative ml-2">
            <button @click="open = true"
                    class="flex bg-green-500 text-white text-[11px] px-3 py-2 rounded shadow-md hover:bg-green-600 focus:outline-none">
                Edit Project

                <svg width="15px" height="15px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"
                     class="ml-2">
                    <path d="M21 7L17 3L14 6L8 12V16H12L18 10L21 7Z" stroke="white" stroke-width="1.5"
                          stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M14 6L18 10" stroke="white" stroke-width="1.5" stroke-linecap="round"
                          stroke-linejoin="round"/>
                    <path d="M10 4H4V20H20V14" stroke="white" stroke-width="1.5" stroke-linecap="round"
                          stroke-linejoin="round"/>
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
        class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50 px-4"
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
            class="bg-white p-4 md:p-4 rounded-lg shadow-lg w-full max-w-md md:max-w-[600px] max-h-[90vh] sm:max-h-[50vh] md:max-h-none overflow-y-auto sm:overflow-visible"
        >
            <div class="flex justify-between items-center mb-4 border-b border-gray-300 pb-2">
                <div class="flex items-center">
                    <svg width="20px" height="20px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="ml-2">
                        <path d="M21 7L17 3L14 6L8 12V16H12L18 10L21 7Z" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M14 6L18 10" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M10 4H4V20H20V14" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    <h2 class="text-lg font-bold ml-2 text-center sm:text-left w-full sm:w-auto">Edit Project</h2>
                </div>

                <!-- Close Button (X) -->
                <button @click="open = false" class="text-gray-500 hover:text-gray-700">
                    <i class="fas fa-times"></i>
                </button>
            </div>





            <form wire:submit.prevent="updateProject" class="text-xs" >

                <div class="mb-3">
                    <label class="block text-xs font-medium mb-1">Project Title</label>
                    <input wire:model="title" type="text" placeholder="Enter Project Title" class="w-full border border-gray-400 px-3 py-2 rounded p-2 text-xs focus:ring-2 focus:ring-green-500 focus:border-green-500" required>
                </div>
                <div class="mb-1 border-gray-300 pb-1">
                    <label class="block text-xs font-medium mb-1">Project Address</label>
                    <div class="grid grid-cols-1 md:grid-cols-4 gap-2 mb-1 border-2 p-2 rounded">
                        <div>
                            <label class="block text-xs font-medium mb-1">Street</label>
                            <input wire:model="street" type="text" placeholder="Select Street" class="w-full border border-gray-400 px-3 py-2 text-xs rounded p-2 focus:ring-2 focus:ring-green-500 focus:border-green-500" required>
                        </div>
                        <div>
                            <label class="block text-xs font-medium mb-1">Barangay</label>
                            <input wire:model="baranggay" type="text" placeholder="Select Barangay" class="w-full border border-gray-400 px-3 py-2 text-xs rounded p-2 focus:ring-2 focus:ring-green-500 focus:border-green-500" required>
                        </div>
                        <div>
                            <label class="block text-xs font-medium mb-1">X-Axis</label>
                            <input wire:model="x_axis" type="text" placeholder="Must contain “axis”" class="w-full border border-gray-400 px-3 py-2 text-xs rounded p-2 focus:ring-2 focus:ring-green-500 focus:border-green-500" required>
                            @error('x_axis')
                            <span class="text-red-500 text-xs">{{ $message }}</span>
                            @enderror
                        </div>
                        <div>
                            <label class="block text-xs font-medium mb-1">Y-Axis</label>
                            <input wire:model="y_axis" type="text" placeholder="Must contain “axis”" class="w-full border border-gray-400 px-3 py-2 text-xs rounded p-2 focus:ring-2 focus:ring-green-500 focus:border-green-500" required>
                            @error('y_axis')
                            <span class="text-red-500 text-xs">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div x-data="{
                                open: false,
                                search: '{{ $currentProjectInchargeName ?? '' }}',  // Initialize with current name if available
                                filteredProjectIncharge: [],
                                selectProjectIncharge(projectIncharge) {
                                    @this.set('projectIncharge_id', projectIncharge.id);
                                    this.search = `${projectIncharge.first_name} ${projectIncharge.middle_initial ? projectIncharge.middle_initial + ' ' : ''}${projectIncharge.last_name}`;
                                    this.open = false;
                                }
                            }" class="relative">

                    <label for="projectIncharge_id" class="block text-xs font-medium mb-1">Project In-Charge</label>
                    <input
                        type="text"
                        id="projectIncharge_id"
                        x-model="search"
                        @focus="open = true"
                        @input.debounce.300ms="
                                                filteredProjectIncharge = @js($projectIncharge).filter(projectIncharge => {
                                                    const fullName = `${projectIncharge.first_name} ${projectIncharge.middle_initial ? projectIncharge.middle_initial + ' ' : ''}${projectIncharge.last_name}`;
                                                    return fullName.toLowerCase().includes(search.toLowerCase());
                                                })
                                            "
                                @keydown.escape.window="open = false"
                                @click="open = true"
                                class="w-full px-3 py-2 text-xs border border-gray-400 rounded focus:ring-green-500 focus:border-green-500"
                                placeholder="Search Project In-Charge"
                                autocomplete="off"
                                required
                            />

                            <ul
                                x-show="open && filteredProjectIncharge.length > 0"
                                @click.away="open = false"
                                class="absolute z-10 mt-1 w-full bg-white border border-gray-300 rounded-md shadow-lg sm:text-xs"
                                x-transition
                            >
                                <template x-for="projectIncharge in filteredProjectIncharge" :key="projectIncharge.id">
                                    <li
                                        @click.stop="selectProjectIncharge(projectIncharge)"
                                        class="cursor-pointer hover:bg-indigo-500 hover:text-white p-2"
                                    >
                                        <span
                                            x-text="`${projectIncharge.first_name} ${projectIncharge.middle_initial ? projectIncharge.middle_initial + ' ' : ''}${projectIncharge.last_name}`"></span>
                                    </li>
                                </template>

                                <li x-show="!filteredProjectIncharge.length && search.length > 0"
                                    class="p-2 text-gray-500">
                                    No result found
                                </li>
                            </ul>

                            @error('projectIncharge_id')
                            <span class="text-red-500 ml-2 text-[10px]">{{ $message }}</span>
                            @enderror
                </div>

                <!-- Target Completion Section (Scrollable) -->
                <div>
                    <label class="block text-xs font-medium mb-1 mt-3">Target Completion</label>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-2 border-2 p-2 rounded">
                        <div class="relative mb-3">
                            <label class="block text-xs font-medium mb-1">Start Date</label>
                            <input type="date" wire:model="start_date"
                                   class="w-full px-3 py-2 text-xs border border-gray-400 rounded focus:ring-2 focus:ring-green-500 focus:border-green-500" required>
                            <!-- Error message for start_date -->
                            @error('start_date')
                            <span class="text-red-500 ml-2 text-[10px]">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="relative">
                            <label class="block text-xs font-medium mb-1">End Date</label>
                            <input type="date" wire:model="end_date"
                                   class="w-full px-3 py-2 text-xs border border-gray-400 rounded focus:ring-2 focus:ring-green-500 focus:border-green-500" required>
                            @error('end_date')
                            <span class="text-red-500 text-xs">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Description -->
                <div class="mb-3 mt-3">
                    <label class="block text-xs font-medium mb-1">Description</label>
                    <textarea wire:model="description"
                              class="w-full h-[80px] px-3 py-2 text-xs border border-gray-400 rounded focus:ring-2 focus:ring-green-500 focus:border-green-500"
                              rows="2" style="resize: none;" required></textarea>
                </div>

                <!-- Action Buttons -->
                <div class="flex justify-end space-x-2">
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

    @script
    <script>
        function selectProjectIncharge(projectIncharge) {
        @this.
        set('projectIncharge_id', projectIncharge.id);
            this.search = projectIncharge.first_name;
            this.open = false;
        }
    </script>
    @endscript

    </div>

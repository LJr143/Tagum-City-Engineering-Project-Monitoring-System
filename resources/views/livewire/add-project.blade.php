<div x-data="{ open: false }" x-cloak @project-added.window="open = false">
    <div class="flex justify-end">
        <div class="relative ml-2">
            <button @click="open = true"
                    class="bg-green-500 text-white text-xs px-4 py-2 rounded shadow-md hover:bg-green-600 focus:outline-none">
                Create Project
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
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                     stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>

            <div class="flex">
                <svg width="26" height="26" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect width="24" height="24" transform="translate(1 1)" fill="white"/>
                    <path
                        d="M6.02222 8.14354C3.70959 11.4581 4.03205 16.0529 6.98959 19.0104C10.309 22.3299 15.691 22.3299 19.0104 19.0104C22.3299 15.691 22.3299 10.3091 19.0104 6.98959C16.0529 4.03205 11.4581 3.7096 8.14354 6.02222"
                        stroke="#1FBE11" stroke-linecap="round"/>
                    <path d="M13 9L13 17" stroke="#1FBE11" stroke-width="1.2" stroke-linecap="round"/>
                    <path d="M17 13L9 13" stroke="#1FBE11" stroke-width="1.2" stroke-linecap="round"/>
                </svg>
                <h2 class="text-lg font-bold mb-4 ml-2">Add Project</h2>
            </div>

            <form wire:submit.prevent="submit" class="text-xs" >
                <div class="grid  gap-6">
                    <!-- Left side (Project Info) -->
                    <div class="col-span-5 space-y-4">
                        <div>
                            <label class="block text-xs font-medium mb-1">Project Title</label>
                            <input type="text" wire:model="title"
                                   class="w-full px-3 py-2 text-xs border border-gray-400 rounded" required>
                        </div>
                        <div class="col-span-5 space-y-4">
                            <label class="block text-xs font-medium mb-1">Project Address</label>
                            <div class="flex gap-2 border-2 p-2 rounded">
                                <div class="w-2/6">
                                    <label class="block text-xs font-medium mb-1">Baranggay</label>
                                    <input type="text" wire:model="baranggay"
                                           class="w-full px-3 py-2 text-xs border border-gray-400 rounded" required>
                                </div>

                                <div class="w-2/6">
                                    <label class="block text-xs font-medium mb-1">Street</label>
                                    <input type="text" wire:model="street"
                                           class="w-full px-3 py-2 text-xs border border-gray-400 rounded" required>
                                </div>

                                <div class="w-2/4">
                                    <label class="block text-xs font-medium mb-1">X-Axis</label>
                                    <input type="text" wire:model="x_axis"
                                           class="w-full px-3 py-2 text-xs border border-gray-400 rounded" placeholder="Must contain 'axis'" required>
                                    @error('x_axis')
                                    <span class="text-red-500 text-xs">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="w-2/4">
                                    <label class="block text-xs font-medium mb-1">Y-Axis</label>
                                    <input type="text" wire:model="y_axis"
                                           class="w-full px-3 py-2 text-xs border border-gray-400 rounded" placeholder="Must contain 'axis'" required>
                                    @error('y_axis')
                                    <span class="text-red-500 text-xs">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div x-data="{
        open: true,
        search: '',
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
                                class="w-full px-3 py-2 text-xs border border-gray-400 rounded"
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
                                        <span x-text="`${projectIncharge.first_name} ${projectIncharge.middle_initial ? projectIncharge.middle_initial + ' ' : ''}${projectIncharge.last_name}`"></span>
                                    </li>
                                </template>

                                <li x-show="!filteredProjectIncharge.length && search.length > 0"
                                    class="p-2 text-gray-500">
                                    No result found
                                </li>
                            </ul>

                            @error('projectIncharge_id')
                            <span class="text-red-500 text-xs">{{ $message }}</span>
                            @enderror
                        </div>


                        <div>
                            <label class="block text-xs font-medium mb-1">Target Completion</label>
                            <div class="flex gap-2 border-2 p-2 rounded">
                                <div class="w-2/4">
                                    <label class="block text-xs font-medium mb-1">Start Date</label>
                                    <input type="date" wire:model="start_date"
                                           class="w-full px-3 py-2 text-xs border border-gray-400 rounded" required>
                                </div>

                                <div class="w-2/4">
                                    <label class="block text-xs font-medium mb-1">End Date</label>
                                    <input type="date" wire:model="end_date"
                                           class="w-full px-3 py-2 text-xs border border-gray-400 rounded" required>
                                    @error('end_date')
                                    <span class="text-red-500 text-xs">{{ $message }}</span>
                                    @enderror
                                </div>


                            </div>
                        </div>
                        <div>
                            <label class="block text-xs font-medium mb-1">Description</label>
                            <textarea wire:model="description"
                                      class="w-full h-[80px] px-3 py-2 text-xs border border-gray-400 rounded"
                                      style="resize: none;" required></textarea>
                        </div>
                    </div>
                </div>
                <!-- Action Buttons -->
                <div class="mt-6 flex justify-end space-x-2">
                    <button @click="open = false" type="button"
                            class="bg-gray-300 text-gray-700 px-4 py-2 rounded shadow-md hover:bg-gray-400 text-xs">
                        Cancel
                    </button>
                    <button type="submit"
                            class="bg-green-500 text-white px-6 py-2 rounded shadow-md hover:bg-green-600 text-xs">
                        Add Project
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

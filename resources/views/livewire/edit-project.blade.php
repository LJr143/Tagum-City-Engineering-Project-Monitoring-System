<div x-data="{ open: false }" x-cloak @project-edited.window="open = false">
    <div class="flex justify-end">
        <div class="relative ml-2">
            <button @click="open = true"
                    class="flex bg-green-500 text-white text-xs px-4 py-2 rounded shadow-md hover:bg-green-600 focus:outline-none">
                Edit Project
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="ml-2">
                    <path d="M21 7L17 3L14 6L8 12V16H12L18 10L21 7Z" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M14 6L18 10" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M10 4H4V20H20V14" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </button>
        </div>
    </div>

    <!-- Modal -->
    <div x-show="open" x-transition:enter="transition ease-out duration-300" x-transition:leave="transition ease-in duration-200" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50">
        <!-- Modal Content -->
        <div class="bg-white w-full max-w-md md:max-w-lg lg:max-w-xl p-4 md:p-6 rounded-lg relative overflow-y-auto mx-4" style="max-height: 90vh;">
            <!-- Close Button (X) -->
            <button @click="open = false" class="absolute top-2 right-2 text-gray-500 hover:text-gray-700">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>

            <h2 class="text-sm font-bold mb-4">Edit Project</h2>

            <div class="overflow-y-auto" style="max-height: 70vh;">
                <form wire:submit.prevent="updateProject" class="text-xs">
                    <div class="grid gap-4">
                        <!-- Project Title -->
                        <div>
                            <label class="block text-xs font-medium mb-1">Project Title</label>
                            <input type="text" wire:model="title" class="w-full px-3 py-2 text-xs border border-gray-400 rounded focus:ring-green-500 focus:border-green-500" required>
                        </div>

                        <!-- Project Address -->
                        <div class="space-y-4">
                            <label class="block text-xs font-medium mb-1">Project Address</label>
                            <div class="flex flex-col md:flex-row gap-2 border-2 p-2 rounded">
                                <div class="w-full md:w-2/6">
                                    <label class="block text-xs font-medium mb-1">Barangay</label>
                                    <input type="text" wire:model="baranggay" class="w-full px-3 py-2 text-xs border border-gray-400 rounded focus:ring-green-500 focus:border-green-500" required>
                                </div>
                                <div class="w-full md:w-2/6">
                                    <label class="block text-xs font-medium mb-1">Street</label>
                                    <input type="text" wire:model="street" class="w-full px-3 py-2 text-xs border border-gray-400 rounded focus:ring-green-500 focus:border-green-500" required>
                                </div>
                                <div class="w-full md:w-1/6">
                                    <label class="block text-xs font-medium mb-1">X-axis</label>
                                    <input type="text" wire:model="x_axis" class="w-full px-3 py-2 text-xs border border-gray-400 rounded focus:ring-green-500 focus:border-green-500" required>
                                    @error('x_axis') <span class="text-red-500 text-[9px]">{{ $message }}</span> @enderror
                                </div>
                                <div class="w-full md:w-1/6">
                                    <label class="block text-xs font-medium mb-1">Y-axis</label>
                                    <input type="text" wire:model="y_axis" class="w-full px-3 py-2 text-xs border border-gray-400 rounded focus:ring-green-500 focus:border-green-500" required>
                                    @error('y_axis') <span class="text-red-500 text-[9px]">{{ $message }}</span> @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Project In-Charge -->
                        <div x-data="{ open: false, search: '{{ $currentProjectInchargeName ?? '' }}', filteredProjectIncharge: [] }" class="relative">
                            <label for="projectIncharge_id" class="block text-xs font-medium mb-1">Project In-Charge</label>
                            <input type="text" id="projectIncharge_id" x-model="search" @focus="open = true" class="w-full px-3 py-2 text-xs border border-gray-400 rounded focus:ring-green-500 focus:border-green-500" placeholder="Search Project In-Charge" autocomplete="off" required>
                            <ul x-show="open && filteredProjectIncharge.length > 0" @click.away="open = false" class="absolute z-10 mt-1 w-full bg-white border border-gray-300 rounded-md shadow-lg sm:text-xs" x-transition>
                                <template x-for="projectIncharge in filteredProjectIncharge" :key="projectIncharge.id">
                                    <li @click.stop="selectProjectIncharge(projectIncharge)" class="cursor-pointer hover:bg-indigo-500 hover:text-white p-2">
                                        <span x-text="`${projectIncharge.first_name} ${projectIncharge.middle_initial ? projectIncharge.middle_initial + ' ' : ''}${projectIncharge.last_name}`"></span>
                                    </li>
                                </template>
                                <li x-show="!filteredProjectIncharge.length && search.length > 0" class="p-2 text-gray-500">
                                    No result found
                                </li>
                            </ul>
                        </div>

                        <!-- Target Completion -->
                        <div>
                            <label class="block text-xs font-medium mb-1">Target Completion</label>
                            <div class="flex flex-col md:flex-row gap-2 border-2 p-2 rounded">
                                <div class="w-full md:w-1/2">
                                    <label class="block text-xs font-medium mb-1">Start Date</label>
                                    <input type="date" wire:model="start_date" class="w-full px-3 py-2 text-xs border border-gray-400 rounded focus:ring-green-500 focus:border-green-500" required>
                                    @error('start_date') <span class="text-red-500 text-[10px]">{{ $message }}</span> @enderror
                                </div>
                                <div class="w-full md:w-1/2">
                                    <label class="block text-xs font-medium mb-1">End Date</label>
                                    <input type="date" wire:model="end_date" class="w-full px-3 py-2 text-xs border border-gray-400 rounded focus:ring-green-500 focus:border-green-500" required>
                                    @error('end_date') <span class="text-red-500 text-[10px]">{{ $message }}</span> @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Description -->
                        <div>
                            <label class="block text-xs font-medium mb-1">Description</label>
                            <textarea wire:model="description" class="w-full h-[80px] px-3 py-2 text-xs border border-gray-400 rounded resize-none focus:ring-green-500 focus:border-green-500" required></textarea>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="mt-4 flex justify-end space-x-2">
                        <button @click="open = false" type="button" class="bg-gray-300 text-gray-700 px-4 py-2 rounded shadow-md hover:bg-gray-400 text-xs">Cancel</button>
                        <button type="submit" class="bg-green-500 text-white px-6 py-2 rounded shadow-md hover:bg-green-600 text-xs">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function selectProjectIncharge(projectIncharge) {
        Livewire.emit('setProjectIncharge', projectIncharge.id);
        this.search = `${projectIncharge.first_name} ${projectIncharge.middle_initial ? projectIncharge.middle_initial + ' ' : ''}${projectIncharge.last_name}`;
        this.open = false;
    }
</script>

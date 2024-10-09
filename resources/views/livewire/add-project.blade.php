<div x-data="{ open: false }" x-cloak @project-added.window="open = false">
    <div class="flex justify-end">
        <div class="relative ml-2">
            <button @click="open = true" class="bg-green-500 text-white text-xs px-4 py-2 rounded shadow-md hover:bg-green-600 focus:outline-none">
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
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>

            <h2 class="text-lg font-bold mb-4">Add Project</h2>
            <form wire:submit.prevent="submit" class="text-xs">
                <div class="grid  gap-6">
                    <!-- Left side (Project Info) -->
                    <div class="col-span-5 space-y-4">
                        <div>
                            <label class="block text-xs font-medium mb-1">Project Title</label>
                            <input type="text" wire:model="title" class="w-full px-3 py-2 text-xs border border-gray-400 rounded" required>
                        </div>
                        <div>
                            <label class="block text-xs font-medium mb-1">Address</label>
                            <input type="text" wire:model="address" class="w-full px-3 py-2 text-xs border border-gray-400 rounded" required>
                        </div>
                        <div>
                            <label class="block text-xs font-medium mb-1">Total Project Cost</label>
                            <input type="text" wire:model="project_cost" class="w-full px-3 py-2 text-xs border border-gray-400 rounded" required>
                        </div>
                        <div>
                            <label class="block text-xs font-medium mb-1">Description</label>
                            <textarea wire:model="description" class="w-full h-[80px] px-3 py-2 text-xs border border-gray-400 rounded" style="resize: none;" required></textarea>
                        </div>
                    </div>
                </div>
                <!-- Action Buttons -->
                <div class="mt-6 flex justify-end space-x-2">
                    <button @click="open = false" type="button" class="bg-gray-300 text-gray-700 px-4 py-2 rounded shadow-md hover:bg-gray-400 text-xs">
                        Cancel
                    </button>
                    <button type="submit" class="bg-green-500 text-white px-6 py-2 rounded shadow-md hover:bg-green-600 text-xs">
                        Add Project
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

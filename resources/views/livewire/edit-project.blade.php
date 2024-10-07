<div x-data="{ open: false }" x-cloak @project-updated.window="open = false">
    <div class="flex justify-end">
        <div class="relative ml-2">
            <button @click="open = true" class="bg-green-500 text-white text-xs px-4 py-2 rounded shadow-md hover:bg-green-600 focus:outline-none">
                Edit
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
            class="bg-white w-full max-w-[850px] p-10 rounded-lg relative"
        >
            <!-- Close Button (X) -->
            <button @click="open = false" class="absolute top-2 right-2 text-gray-500 hover:text-gray-700">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>

            <h2 class="text-lg font-bold mb-2">Edit Project</h2>
            <form wire:submit.prevent="updateProject">
                <div class="mb-4">
                    <label class="block text-sm font-medium mb-1" for="title">Title</label>
                    <input wire:model="title" type="text" id="title" class="border rounded w-full px-2 py-1" required>
                    @error('title') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium mb-1" for="description">Description</label>
                    <textarea wire:model="description" id="description" class="border rounded w-full px-2 py-1" required></textarea>
                    @error('description') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium mb-1" for="address">Address</label>
                    <input wire:model="address" type="text" id="address" class="border rounded w-full px-2 py-1" required>
                    @error('address') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium mb-1" for="project_cost">Project Cost</label>
                    <input wire:model="project_cost" type="number" id="project_cost" class="border rounded w-full px-2 py-1" required>
                    @error('project_cost') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium mb-1" for="status">Status</label>
                    <input wire:model="status" type="text" id="status" class="border rounded w-full px-2 py-1" required>
                    @error('status') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>

                <div class="flex justify-end">
                    <button type="button" @click="open = false" class="bg-gray-300 text-gray-700 px-4 py-2 rounded shadow-md hover:bg-gray-400">
                        Cancel
                    </button>
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded shadow-md hover:bg-blue-600 ml-2">
                        Save Changes
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

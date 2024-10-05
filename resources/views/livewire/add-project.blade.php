<div x-data="{ open: false }" x-cloak @project-added.window="open = false">
    <div class="flex justify-end">
        <div class="relative ml-2">
            <button @click="open = true" class="bg-green-500 text-white px-3 py-1 rounded-lg text-sm">
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
            class="bg-white w-full max-w-[850px] p-10 rounded-lg relative"
        >
            <!-- Close Button (X) -->
            <button @click="open = false" class="absolute top-2 right-2 text-gray-500 hover:text-gray-700">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>

            <h2 class="text-lg font-bold mb-2">Create Project</h2>
            <form wire:submit.prevent="submit">
                <div class="grid grid-cols-2 gap-3">
                    <div>
                        <x-label class="text-[12px]">Title</x-label>
                        <x-input type="text" wire:model="title" class="w-full px-2 py-1 text-[11px] mb-3" />
                        @error('title') <span class="text-red-500">{{ $message }}</span> @enderror

                        <x-label class="text-[12px]">Address</x-label>
                        <x-input type="text" wire:model="address" class="w-full px-2 py-1 text-[11px] mb-3" />
                        @error('address') <span class="text-red-500">{{ $message }}</span> @enderror

                        <x-label class="text-[12px]">Project Cost</x-label>
                        <x-input type="number" wire:model="project_cost" class="w-full px-2 py-1 text-[11px] mb-3" />
                        @error('project_cost') <span class="text-red-500">{{ $message }}</span> @enderror

                        <x-label class="text-[12px]">Project Description</x-label>
                        <x-textarea wire:model="description" class="w-full h-[200px] px-2 py-1 text-[11px] mb-3" style="resize: none;"></x-textarea>
                        @error('description') <span class="text-red-500">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <img src="{{ asset('storage/pmsAssets/project_working.png') }}" alt="">
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="flex justify-end mt-4">
                    <button @click="open = false" type="button" class="bg-gray-200 text-gray-700 font-bold px-3 py-1 rounded-lg text-xs mr-2 w-[100px] h-[35px]">Cancel</button>
                    <button type="submit" class="bg-green-500 text-white font-bold px-3 py-1 rounded-lg text-xs w-[100px] h-[35px]">Add Project</button>
                </div>
            </form>
        </div>
    </div>


</div>

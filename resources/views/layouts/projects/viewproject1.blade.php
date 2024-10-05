<x-app-layout mainClass="flex" headerClass="shadow-[0px_1px_2px_-1px_rgba(0,0,0,0.1)] ">

    <x-slot name="sidebar">
        <x-sidebar></x-sidebar>
    </x-slot>

    <x-slot name="header">
        <x-header></x-header>
    </x-slot>

    <x-slot name="main">
        <div>
            <!-- Main content with buttons, image, and editable fields -->
            <div class="flex-1 p-5">
                <main>
                    <!-- Edit/Delete buttons and image (side by side buttons, image below) -->
                    <div class="flex justify-end mb-4">
                        <!-- Buttons and image on the right -->
                        <div class="flex flex-col items-end space-y-2 w-full">
                            <!-- Buttons side by side -->
                            <div class="flex space-x-2">
                                <button class="bg-blue-500 text-white text-xs px-4 py-2 rounded shadow-md hover:bg-blue-600 focus:outline-none">
                                    Edit
                                </button>
                                <button class="bg-red-500 text-white text-xs px-4 py-2 rounded shadow-md hover:bg-red-600 focus:outline-none">
                                    Delete
                                </button>
                            </div>

                            <div class="relative flex flex-col items-center space-y-2 mt-4 w-full">
                                <div class="w-full h-40 bg-gray-200 flex items-center justify-center overflow-hidden">
                                    <img src="{{ asset('storage/pmsAssets/pic1.jpg   ') }}" alt="Profile Image" id="editable-image-preview" class="object-contain w-full h-full">
                                    <input type="file" id="editable-image" class="absolute top-0 right-0 w-20 h-20 opacity-0 cursor-pointer" accept="image/*" onchange="previewImage(event)">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="ml-8 flex justify-between items-center">
                        <h2 class="text-m font-semibold mb-2">{{ $project->title }}</h2>
                        <span class="text-xs text-green-500 bg-green-100 px-2 py-1 rounded">{{ $project->status }}</span>
                    </div>
                    <p class="text-xs ml-8">{{ $project->address }}</p>
                    <p class="ml-8 text-xs text-green-700">Date created:<span class="ml-2 text-black">{{ $project->created_at }}</span></p>
                    <p class="ml-8 text-xs font-semibold">Project Cost: {{ $project->project_cost }} <span class="ml-4 font-semibold">Engineer: Jane Williams</span></p>

                    <div class="ml-8 mt-7 mb-10">
                        <h2 class="text-sm font-semibold mb-2">Description</h2>
                        <p class="text-xs">{{ $project->description }}</p>

                    </div>


                    <!-- Card containing Road Construction content -->
                    <div class="bg-white p-6 rounded-lg shadow-md">
                        <!-- Road Construction title -->
                        <h2 class="text-xl font-semibold mb-2">POW</h2>
                        <div class="flex flex-col space-y-4 mx-8">
                            <div x-data="{ open: false }" class="relative" x-cloak>

                                <div class="flex justify-end mb-4">
                                    <button @click="open = true" class="bg-green-700 text-white mr-2 text-xs px-4 py-2 rounded shadow-md hover:bg-green-900 focus:outline-none">Add New POW</button>
                                    <!-- Search input and button -->
                                    <div class="flex items-center space-x-2">
                                        <input type="text" placeholder="Search" id="search-input" class="h-8 px-3 border mr-2 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-xs" />
                                    </div>
                                </div>
                                <livewire:add-pow :project-id="$project->id"/>

                            </div>
                        <livewire:program-of-works :project-id="$project->id"/>


                        </div>
                    </div> <!-- End of Road Construction Card -->

                </main>
            </div>



            <script>
                // Preview uploaded image
                function previewImage(event) {
                    const file = event.target.files[0];
                    const preview = document.getElementById('editable-image-preview');
                    const reader = new FileReader();

                    reader.onload = function() {
                        preview.src = reader.result;
                    };

                    if (file) {
                        reader.readAsDataURL(file);
                    }
                }

                // Modal behavior (same as before)
                const addCardButton = document.getElementById('add-card-button');
                const modal = document.getElementById('add-card-modal');
                const closeModalButton = document.getElementById('close-modal');
                const cancelModalButton = document.getElementById('cancel-modal');

                addCardButton.addEventListener('click', () => {
                    modal.classList.remove('hidden');
                });

                closeModalButton.addEventListener('click', () => {
                    modal.classList.add('hidden');
                });

                cancelModalButton.addEventListener('click', () => {
                    modal.classList.add('hidden');
                });

                // Close modal if clicked outside of the content
                window.addEventListener('click', (event) => {
                    if (event.target === modal) {
                        modal.classList.add('hidden');
                    }
                });
            </script>
        </div>
    </x-slot>

</x-app-layout>

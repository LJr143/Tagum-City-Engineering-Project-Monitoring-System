<x-app-layout mainClass="flex" headerClass="shadow-[0px_1px_2px_-1px_rgba(0,0,0,0.1)] ">
    <x-slot name="sidebar">
        <x-sidebar></x-sidebar>
    </x-slot>

    <x-slot name="header">
        <x-header></x-header>
    </x-slot>

    <x-slot name="main">
        <div>
            <div class="flex-1 p-5">
                <div class="flex justify-end mb-4">
                    <div class="flex flex-col items-end space-y-2 w-full">
                        <div class="flex space-x-2">
                            @if (auth()->user()->isAdmin() || auth()->user()->isEncoder())
                                <livewire:edit-project :project="$project->id"/>

                                <!-- Delete Button -->
                                <button type="button" onclick="openDeleteModal()"
                                        class="flex bg-red-500 text-white text-xs px-4 py-2 rounded shadow-md hover:bg-red-600 focus:outline-none">
                                    Delete Project

                                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none"
                                         xmlns="http://www.w3.org/2000/svg" class="ml-2">
                                        <path d="M10 10V16" stroke="white" stroke-width="1.5" stroke-linecap="round"
                                              stroke-linejoin="round"/>
                                        <path d="M14 10V16" stroke="white" stroke-width="1.5" stroke-linecap="round"
                                              stroke-linejoin="round"/>
                                        <path d="M18 6V18C18 19.1046 17.1046 20 16 20H8C6.89543 20 6 19.1046 6 18V6"
                                              stroke="white" stroke-width="1.5" stroke-linecap="round"
                                              stroke-linejoin="round"/>
                                        <path d="M4 6H20" stroke="white" stroke-width="1.5" stroke-linecap="round"
                                              stroke-linejoin="round"/>
                                        <path d="M15 6V5C15 3.89543 14.1046 3 13 3H11C9.89543 3 9 3.89543 9 5V6"
                                              stroke="white" stroke-width="1.5" stroke-linecap="round"
                                              stroke-linejoin="round"/>
                                    </svg>

                                </button>
                            @endif

                        </div>
                        @if (auth()->user()->isAdmin() || auth()->user()->isEncoder())
                        <div>
                            <livewire:project-configuration-settings :projectId="$project->id"/>
                        </div>

                        @endif

                        <div class="relative flex flex-col items-center space-y-2 mt-4 w-full">
                            <div class="w-full h-40 bg-gray-200 flex items-center justify-center overflow-hidden">
                                <img src="{{ asset('storage/pmsAssets/pic1.jpg') }}" alt="Profile Image"
                                     id="editable-image-preview" class="object-contain w-full h-full">
                                <input type="file" id="editable-image"
                                       class="absolute top-0 right-0 w-20 h-20 opacity-0 cursor-pointer"
                                       accept="image/*" onchange="previewImage(event)">
                            </div>
                        </div>
                    </div>
                </div>

                <div class=" flex justify-between items-center">
                    <h2 class="text-m font-semibold mb-2 text-green-500">{{ $project->title }}</h2>
                    <span
                        class="text-xs text-green-500 bg-green-100 px-2 py-1 rounded {{ $project->status == 'suspended' ? 'text-red-500 bg-red-100' : '' }}">
                    {{ $project->status }}
                </span>

                </div>
                <p class="text-xs"><span
                        class="font-bold">Address : </span> {{ $project->baranggay }} {{$project->street}}</p>
                <p class="text-xs font-bold">Date created :<span
                        class="ml-2 text-black font-normal">{{ $project->created_at }}</span></p>
                <p class="text-xs"><span
                        class="font-bold">Project Incharge:</span> {{ $project->projectIncharge->first_name }} {{ $project->projectIncharge->last_name }}
                </p>
                <div class="mt-7 mb-10">
                    <h2 class="text-sm font-semibold mb-2">Description</h2>
                    <p class="text-xs">{{ $project->description }}</p>
                </div>

                <livewire:program-of-works :project-id="$project->id"/>
            </div>

            <livewire:delete-project :projectId="$project->id"/>
        </div>





        <script>
            function openDeleteModal() {
                document.getElementById('delete-modal').classList.remove('hidden');
            }

            function closeDeleteModal() {
                document.getElementById('delete-modal').classList.add('hidden');
            }
            function confirmDeleteAction() {
                closeDeleteModal();
            }
            // Preview uploaded image
            function previewImage(event) {
                const file = event.target.files[0];
                const preview = document.getElementById('editable-image-preview');
                const reader = new FileReader();

                reader.onload = function () {
                    preview.src = reader.result;
                };

                if (file) {
                    reader.readAsDataURL(file);
                }
            }
        </script>
    </x-slot>
</x-app-layout>

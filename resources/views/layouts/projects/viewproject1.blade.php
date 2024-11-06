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
                            @endif

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
                        </div>
                        <div>
                            <livewire:project-configuration-settings :projectId="$project->id"/>
                        </div>
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
                    <span class="text-xs text-green-500 bg-green-100 px-2 py-1 rounded">{{ $project->status }}</span>
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
        </div>

        <!-- Modal For Delete Confirmation -->
        <div id="delete-modal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden z-50">
            <div class="bg-white rounded-lg shadow-lg p-4 sm:p-6 w-full max-w-xs sm:max-w-md md:w-1/3 mx-2">
                <div class="flex items-center mb-2">
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg"
                         class="mr-2">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                              d="M8.4845 2.49512C9.15808 1.32845 10.842 1.32845 11.5156 2.49512L17.7943 13.3701C18.4678 14.5368 17.6259 15.9951 16.2787 15.9951H3.72136C2.37421 15.9951 1.53224 14.5368 2.20582 13.3701L8.4845 2.49512ZM10 5.00012C10.4142 5.00012 10.75 5.33591 10.75 5.75012V9.25012C10.75 9.66434 10.4142 10.0001 10 10.0001C9.58579 10.0001 9.25 9.66434 9.25 9.25012L9.25 5.75012C9.25 5.33591 9.58579 5.00012 10 5.00012ZM10 14.0001C10.5523 14.0001 11 13.5524 11 13.0001C11 12.4478 10.5523 12.0001 10 12.0001C9.44772 12.0001 9 12.4478 9 13.0001C9 13.5524 9.44772 14.0001 10 14.0001Z"
                              fill="#CA383A"/>
                    </svg>
                    <h2 class="text-sm font-semibold text-red-500">Delete Project</h2>
                </div>
                <p class="text-xs sm:text-sm mb-4">Are you sure you want to delete this project? This action cannot be undone.</p>
                <div class="flex justify-end">
                    <button id="delete-cancel-button" onclick="closeDeleteModal()"
                            class="bg-white border border-gray-300 text-gray-700 rounded-md text-xs sm:text-sm px-3 py-2 sm:px-4 hover:bg-gray-400">
                        Cancel
                    </button>
                    <form id="delete-form" action="{{ route('project.destroy', $project->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                                class="bg-red-500 text-white rounded-md px-3 py-2 sm:px-4 text-xs sm:text-sm hover:bg-red-600 ml-2">
                            Delete
                        </button>
                    </form>
                </div>
            </div>
        </div>



        <script>
            function openDeleteModal() {
                document.getElementById('delete-modal').classList.remove('hidden');
            }

            function closeDeleteModal() {
                document.getElementById('delete-modal').classList.add('hidden');
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

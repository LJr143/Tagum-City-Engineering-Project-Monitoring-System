<x-app-layout mainClass="flex" headerClass="shadow-[0px_1px_2px_-1px_rgba(0,0,0,0.1)] ">
    <x-slot name="sidebar">
        <x-sidebar></x-sidebar>
    </x-slot>

    <x-slot name="header">
        <x-header></x-header>
    </x-slot>

    <x-slot name="main">
        <div>
            <div class="flex-1 ">
                <div class="max-w-7xl mx-auto">
                    <div class="flex flex-col sm:flex-row items-center justify-between mb-4">
                        <div class="text-xl font-medium mb-6 sm:mb-0 sm:mr-auto text-left w-full sm:w-auto">
                            Project Information
                        </div>
                        <div class="flex space-x-4">
                            @if (auth()->user()->isAdmin() || auth()->user()->isEncoder())
                                <livewire:project-configuration-settings :projectId="$project->id"/>

                            @endif


                            @if (auth()->user()->isAdmin() || auth()->user()->isEncoder() && $project->status != 'completed')

                            <!-- Delete Button -->
                                <button onclick="openDeleteModal()" class="text-xs bg-red-500 hover:bg-red-600  text-white px-4 py-2 rounded flex items-center space-x-2">
                              <span>
                               Delete Project
                              </span>
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
                    </div>
                    <div class="flex flex-col sm:flex-row space-y-4 sm:space-y-0 sm:space-x-4 mb-8">
                        <div class="w-full sm:w-1/3 relative">
                            <!-- Default Image -->
                            <img src="{{ asset('storage/pmsAssets/pic1.jpg') }}" alt="Profile Image" id="editable-image-preview"
                                 class="rounded-lg shadow-lg w-full max-h-[250px]" />

                            <button class="absolute top-2 right-2 bg-white opacity-50 p-2 rounded-full shadow-lg" onclick="toggleImageEdit()">
                                <i class="fas fa-edit"></i>
                            </button>

                            <input accept="image/*" class="absolute top-0 right-0 w-20 h-20 opacity-0 cursor-pointer" id="editable-image" onchange="previewImage(event)" type="file"/>
                        </div>

                        <div class="bg-white shadow-md rounded-lg p-4 w-full">
                            <div class="flex justify-between items-center mb-4">
                              <span class="text-xs
                                    {{ $project->status == 'pending' ? 'text-yellow-500 bg-yellow-100' : '' }}
                                    {{ $project->status == 'suspended' ? 'text-red-500 bg-red-100' : 'text-green-500 bg-green-100' }}
                                    px-2 py-1 rounded">

                                  {{ $project->status }}
                                </span>
                                @if (auth()->user()->isAdmin() || auth()->user()->isEncoder())
                                    <livewire:edit-project :project="$project->id"/>

                                @endif
                            </div>
                            <div class="flex items-start mb-4">
                                <i class="far fa-bookmark text-gray-500 mr-3 mt-1"></i>

                                <div>
                                    <h2 class="text-xs sm:text-sm font-bold">{{ $project->title }}</h2>
                                    <p class="text-[10px] sm:text-xs text-gray-600">
                                        <span class="text-[10px] sm:text-xs  text-black font-semibold">Location:</span>
                                        {{ $project->baranggay }} {{$project->street}}
                                    </p>
                                    <p class="text-[10px] sm:text-xs  text-gray-600">
                                        <span class="text-[10px] sm:text-xs  text-black font-semibold">
                                         Date Created:
                                        </span>
                                        {{ $project->created_at }}
                                    </p>
                                    <p class="text-[10px] sm:text-xs  text-gray-600">
                                        <span class="text-[10px] sm:text-xs  text-black font-semibold">
                                         Project Incharge:
                                        </span>
                                        {{ $project->projectIncharge->first_name }} {{ $project->projectIncharge->last_name }}
                                    </p>
                                </div>
                            </div>
                            <div class="flex items-start">
                                <i class="far fa-file-alt text-gray-500 mr-3 mt-1"></i>
                                <div>
                                    <h3 class="text-xs sm:text-sm font-bold">
                                        Description
                                    </h3>
                                    <p class="text-xs text-gray-600">
                                        {{ $project->description }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>







                </div>
                <!-- Modal -->
                <div class="fixed inset-0 bg-gray-600 bg-opacity-50 flex items-center justify-center hidden" id="modal">
                    <div class="bg-white rounded-lg shadow-lg p-6 w-full max-w-md">
                        <h2 class="text-lg font-bold mb-4">
                            Edit Project
                        </h2>
                        <form>
                            <div class="mb-4">
                                <label class="block text-sm font-medium text-gray-700">
                                    Project Name
                                </label>
                                <input class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2" type="text" value="ROAD CONSTRUCTION"/>
                            </div>
                            <div class="mb-4">
                                <label class="block text-sm font-medium text-gray-700">
                                    Date Created
                                </label>
                                <input class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2" type="text" value="20/08/2022"/>
                            </div>
                            <div class="mb-4">
                                <label class="block text-sm font-medium text-gray-700">
                                    Project Incharge
                                </label>
                                <input class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2" type="text" value="Fname Ml. Lname"/>
                            </div>
                            <div class="flex justify-end">
                                <button class="bg-gray-500 text-white px-4 py-2 rounded mr-2" onclick="toggleModal()" type="button">
                                    Cancel
                                </button>
                                <button class="bg-blue-500 text-white px-4 py-2 rounded" type="submit">
                                    Save
                                </button>
                            </div>
                        </form>
                    </div>
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



            // Function to preview the uploaded image
            function previewImage(event) {
                const file = event.target.files[0];
                const preview = document.getElementById('editable-image-preview');

                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        preview.src = e.target.result; // Set the image source to the uploaded file
                    }
                    reader.readAsDataURL(file);
                } else {
                    // If no file is selected, keep the default image
                    preview.src = "{{ asset('storage/pmsAssets/pic1.jpg') }}"; // Default image path
                }
            }

            // Optional: Initialize the image to the default if no upload has occurred
            document.addEventListener('DOMContentLoaded', (event) => {
                const preview = document.getElementById('editable-image-preview');
                const input = document.getElementById('editable-image');

                // // If no image is uploaded, set the default image
                // if (!input.files.length) {
                //     preview.src = "https://storage.googleapis.com/a1aa/image/7sqyBEJMkfU9JCpW16NTsey92unWEdvgKQYDhdRtU8tRfNfOB.jpg"; // Default image path
                // }
            });






        </script>
    </x-slot>
</x-app-layout>

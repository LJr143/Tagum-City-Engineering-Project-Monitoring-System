<x-app-layout mainClass="flex" headerClass="shadow-[0px_1px_2px_-1px_rgba(0,0,0,0.1)] ">

    <x-slot name="sidebar">
        <x-sidebar2></x-sidebar2>
    </x-slot>


    <x-slot name="header">
        <x-header></x-header>
    </x-slot>

    <x-slot name="main">

        <div class="flex-1 p-5">
            <main>

                <div class="flex justify-end mb-4">
                    <!-- Buttons and image on the right -->
                    <div class="flex flex-col items-end space-y-2 w-full">
                        <div class="flex space-x-2">
                            <button id="edit-button" class="bg-green-600 text-white text-xs px-4 py-2 rounded shadow-md hover:bg-green-700 focus:outline-none flex items-center space-x-2">
                                <span>Edit</span>
                                <svg width="15" height="15" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M21 7L17 3L14 6L8 12V16H12L18 10L21 7Z" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M14 6L18 10" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M10 4H4V20H20V14" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </button>

                            <button id="delete-button" class="bg-red-500 text-white text-xs px-4 py-2 rounded shadow-md hover:bg-red-600 focus:outline-none flex items-center space-x-2">
                                <span>Delete</span>
                                <svg width="15" height="15" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M10 10V16" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M14 10V16" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M18 6V18C18 19.1046 17.1046 20 16 20H8C6.89543 20 6 19.1046 6 18V6" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M4 6H20" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M15 6V5C15 3.89543 14.1046 3 13 3H11C9.89543 3 9 3.89543 9 5V6" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </button>
                        </div>

                        <div class="relative flex flex-col items-center space-y-2 mt-4 w-full">
                            <div class="w-full h-40 bg-gray-200 flex items-center justify-center overflow-hidden">
                                <img src="{{ asset('images/pic1.jpg') }}" alt="Profile Image" id="editable-image-preview" class="object-cover w-full h-full">
                                <input type="file" id="editable-image" class="absolute top-0 right-0 w-20 h-20 opacity-0 cursor-pointer" accept="image/*" onchange="previewImage(event)">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="ml-8 flex justify-between items-center">
                    <h2 class="text-m font-semibold mb-2">Road Construction</h2>
                    <span class="text-xs text-green-500 bg-green-100 px-2 py-1 rounded">In Progress</span>
                </div>
                <p class="text-xs ml-8">Apokon, Tagum City, Philippines with Coordination</p>
                <p class="ml-8 text-xs text-green-700">Date created:<span class="ml-2 text-black">20/08/2022</span></p>
                <p class="ml-8 text-xs font-semibold">Project Cost: 1,0000 <span class="ml-4 font-semibold">Engineer: Jane Williams</span></p>

                <div class="ml-8 mt-7 mb-10">
                    <h2 class="text-sm font-semibold mb-2">Description</h2>
                    <p class="text-xs">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur risus diam, laoreet in venenatis eget, rhoncus eget nulla. Donec in gravida quam, a feugiat dolor. Curabitur nibh magna, iaculis vitae mauris id, pulvinar iaculis nisi. Nulla elementum eget mauris nec aliquam. Pellentesque maximus condimentum felis, id bibendum magna vestibulum nec.</p>

                </div>


                <!-- Card containing Road Construction content -->
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <!-- Road Construction title -->
                    <h2 class="text-xl font-semibold mb-2">POW</h2>

                    <!-- Cards Section -->
                    <div class="flex flex-col space-y-4 mx-8">
                        <div class="flex justify-end mb-4">
                            <button id="add-card-button" class="bg-green-700 text-white mr-2 text-xs px-4 py-2 rounded shadow-md hover:bg-green-900 focus:outline-none">
                                Add New POW
                            </button>
                            <!-- Search input and button -->
                            <div class="flex items-center space-x-2">
                                <input type="text" placeholder="Search" id="search-input" class="h-8 px-3 border mr-2 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-xs" />
                            </div>
                        </div>

                        <!-- Cards Display -->
                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                            @for ($i = 0; $i < 6; $i++)
                                <a href="{{ route('material-table-cost') }}" class="bg-white p-6 rounded-lg shadow-md block transform transition-transform duration-300 hover:scale-105 hover:shadow-lg">
                                    <div class="bg-green-600 text-white text-xs px-2 py-1 rounded w-max mb-2">Ref: 12345</div>
                                    <h3 class="text-lg font-bold text-black">POW 1</h3>
                                    <p class="mt-2 text-gray-600  text-xs">Amet minim mollit non deserunt ullamco est sit aliqua dolor do amet sint...</p>
                                    <p class="text-xs font-semibold text-black mt-2">Material Cost: 1,000,000</p>
                                    <p class="text-xs font-semibold text-black mt-2">Labor Cost: 1,000</p>
                                    <p class="text-xs font-semibold text-black mt-2">Balance: 1,000</p>

                                    <!-- Progress Bar Section -->
                                    <div class="w-full bg-gray-200 rounded-full h-2.5 mt-3">
                                        <div class="bg-yellow-600 h-2.5 rounded-full" style="width: 70%;"></div>
                                    </div>
                                    <p class="text-xs text-gray-500 mt-2">Progress: 70%</p>

                                    <br>
                                    <div class="mb-3 border-t border-gray-300"></div>
                                    <div class="flex items-center space-x-3">
                                        <div class="w-12 h-12 rounded-full bg-gray-200 flex items-center justify-center">
                                            <img src="{{ asset('images/pic1.jpg') }}" alt="Engineer Image" class="w-12 h-12 rounded-full object-cover">
                                        </div>
                                        <div>
                                            <p class="text-gray-500 text-xs">Senior Engineer</p>
                                            <p class="text-black">John Doe</p>
                                        </div>
                                    </div>
                                </a>
                            @endfor
                        </div>

                        <!-- Pagination -->
                        <div class="flex justify-between items-center mt-2">
                            <nav class="flex flex-col items-start justify-between p-2 space-y-2 md:flex-row md:items-center md:space-y-0 w-full" aria-label="Table navigation">
                                <!-- Showing X of Y on the left side -->
                                <span class="text-xs font-normal text-gray-500 dark:text-gray-400">
            Showing
            <span class="font-semibold text-black">1-10</span>
            of
            <span class="font-semibold text-black">1000</span>
        </span>
                                <!-- Pagination aligned to the right -->
                                <ul class="inline-flex items-stretch -space-x-px bg-white p-1 rounded-lg shadow-sm ml-auto">
                                    <li>
                                        <a href="#" class="flex items-center justify-center h-full py-1 px-2 ml-0 text-xs text-gray-500 bg-white rounded-l-lg hover:bg-gray-100 hover:text-gray-700">
                                            <span class="sr-only">Previous</span>
                                            <svg class="w-4 h-4" aria-hidden="true" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                                            </svg>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="flex items-center justify-center px-2 py-1 text-xs leading-tight text-gray-500 bg-white hover:bg-gray-100 hover:text-gray-700">1</a>
                                    </li>
                                    <li>
                                        <a href="#" class="flex items-center justify-center px-2 py-1 text-xs leading-tight text-gray-500 bg-white hover:bg-gray-100 hover:text-gray-700">2</a>
                                    </li>
                                    <li>
                                        <a href="#" aria-current="page" class="z-10 flex items-center justify-center px-2 py-1 text-xs leading-tight text-primary-600 bg-primary-50 hover:bg-primary-100 hover:text-primary-700">3</a>
                                    </li>
                                    <li>
                                        <a href="#" class="flex items-center justify-center px-2 py-1 text-xs leading-tight text-gray-500 bg-white hover:bg-gray-100 hover:text-gray-700">...</a>
                                    </li>
                                    <li>
                                        <a href="#" class="flex items-center justify-center px-2 py-1 text-xs leading-tight text-gray-500 bg-white hover:bg-gray-100 hover:text-gray-700">100</a>
                                    </li>
                                    <li>
                                        <a href="#" class="flex items-center justify-center h-full py-1 px-2 leading-tight text-xs text-gray-500 bg-white rounded-r-lg hover:bg-gray-100 hover:text-gray-700">
                                            <span class="sr-only">Next</span>
                                            <svg class="w-4 h-4" aria-hidden="true" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                                            </svg>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div>

                    </div>
                </div> <!-- End of Road Construction Card -->

            </main>
        </div>
        <!-- Modal -->
        <div id="delete-modal" class="fixed inset-0 bg-gray-800 bg-opacity-50 flex items-center justify-center z-50 hidden">
            <div class="bg-white rounded-lg shadow-lg p-6 w-1/3">
                <div class="flex items-center mb-2">
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg" class="mr-2">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M8.4845 2.49512C9.15808 1.32845 10.842 1.32845 11.5156 2.49512L17.7943 13.3701C18.4678 14.5368 17.6259 15.9951 16.2787 15.9951H3.72136C2.37421 15.9951 1.53224 14.5368 2.20582 13.3701L8.4845 2.49512ZM10 5.00012C10.4142 5.00012 10.75 5.33591 10.75 5.75012V9.25012C10.75 9.66434 10.4142 10.0001 10 10.0001C9.58579 10.0001 9.25 9.66434 9.25 9.25012L9.25 5.75012C9.25 5.33591 9.58579 5.00012 10 5.00012ZM10 14.0001C10.5523 14.0001 11 13.5524 11 13.0001C11 12.4478 10.5523 12.0001 10 12.0001C9.44772 12.0001 9 12.4478 9 13.0001C9 13.5524 9.44772 14.0001 10 14.0001Z" fill="#CA383A"/>
                    </svg>
                    <h2 class="text-sm font-semibold text-red-500">Delete Item</h2>
                </div>
                <p class="text-xs mb-4">Are you sure you want to remove this item? This process cannot be undone.</p>
                <div class="flex justify-end">
                    <button id="cancel-button" class="bg-white border border-gray-300 text-gray-700 rounded-md text-xs px-4 py-2 hover:bg-gray-400">
                        Cancel
                    </button>
                    <button class="bg-red-500 text-white rounded-md px-4 py-2 text-xs hover:bg-red-600 ml-2">
                        Delete
                    </button>
                </div>
            </div>
        </div>
        <!-- Edit Modal -->
        <div id="add-card-modal" class="fixed inset-0 bg-gray-800 bg-opacity-50 flex items-center justify-center hidden z-50">
            <div class="bg-white p-6 rounded-lg shadow-md max-w-2xl w-full relative z-60">
                <button id="close-modal" class="absolute top-2 right-2 text-gray-500 hover:text-gray-700">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>

                <h3 class="text-lg font-bold mb-2">Edit POW Card</h3>
                <form action="#" method="POST" class="space-y-2">
                    @csrf

                    <div class="flex flex-col space-y-1">
                        <label for="pow-id" class="block text-gray-700 text-xs">POW ID</label>
                        <input type="text" id="pow-id" name="pow_id" class="mt-1 block w-full h-8 p-1 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-xs" required readonly>
                    </div>

                    <div class="flex flex-col space-y-1">
                        <label for="reference-number" class="block text-gray-700 text-xs">Reference Number</label>
                        <input type="text" id="reference-number" name="reference_number" class="mt-1 block w-full h-8 p-1 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-xs" required>
                    </div>

                    <div class="flex flex-col space-y-1">
                        <label for="description" class="block text-gray-700 text-xs">Description</label>
                        <textarea id="description" name="description" rows="4" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-xs p-2" required></textarea>
                    </div>

                    <div class="flex space-x-4">
                        <div class="flex-1">
                            <label for="start-date" class="block text-xs font-small text-gray-700">Start Date</label>
                            <input type="date" id="start-date" class="mt-1 block w-full p-1 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-xs">
                        </div>
                        <div class="flex-1">
                            <label for="end-date" class="block text-xs font-small text-gray-700">End Date</label>
                            <input type="date" id="end-date" class="mt-1 block w-full p-1 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-xs">
                        </div>
                    </div>

                    <h3 class="text-xs font-semibold mb-2">Personnel and Other Information</h3>

                    <div class="flex flex-col space-y-1">
                        <label for="name" class="block text-gray-700 text-xs">Assigned Engineer</label>
                        <input type="text" id="name" name="name" class="mt-1 block w-full p-1 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-xs" required>
                    </div>
                    <div class="flex space-x-4">
                        <!-- Material Cost Input -->
                        <div class="w-1/2">
                            <label for="material_cost" class="block text-gray-700 text-xs">Material Cost</label>
                            <input type="text" id="material_cost" name="material_cost" class="mt-1 block w-full p-1 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-xs" required>
                        </div>

                        <!-- Labor Cost Input -->
                        <div class="w-1/2">
                            <label for="labor_cost" class="block text-gray-700 text-xs">Labor Cost</label>
                            <input type="text" id="labor_cost" name="labor_cost" class="mt-1 block w-full p-1 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-xs" required>
                        </div>
                    </div>

                    <br>
                    <div class="flex justify-between mt-4">
                        <button type="button" id="cancel-modal" class="border border-gray-300 text-gray-800 bg-white px-3 py-1 rounded hover:bg-gray-100 focus:outline-none text-xs flex-1 mr-2">Cancel</button>
                        <button type="submit" class="bg-green-500 text-white px-3 py-1 rounded shadow-md hover:bg-green-600 focus:outline-none text-xs flex-1 ml-2">Save</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- add pow modal -->
        <div id="add-card-modal" class="fixed inset-0 bg-gray-800 bg-opacity-50 flex items-center justify-center hidden z-50">
            <div class="bg-white p-6 rounded-lg shadow-md max-w-2xl w-full relative z-60">
                <button id="close-modal" class="absolute top-2 right-2 text-gray-500 hover:text-gray-700">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>

                <h3 class="text-lg font-bold mb-2">Add New POW Card</h3>
                <form action="#" method="POST" class="space-y-2">
                    @csrf

                    <div class="flex flex-col space-y-1">
                        <label for="reference-number" class="block text-gray-700 text-xs">Reference Number</label>
                        <input type="text" id="reference-number" name="reference_number" class="mt-1 block w-full h-8 p-1 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-xs" required>
                    </div>

                    <div class="flex flex-col space-y-1">
                        <label for="description" class="block text-gray-700 text-xs">Description</label>
                        <textarea id="description" name="description" rows="4" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-xs p-2" required></textarea>
                    </div>

                    <div class="flex space-x-4">
                        <div class="flex-1">
                            <label for="start-date" class="block text-xs font-small text-gray-700">Start Date</label>
                            <input type="date" id="start-date" class="mt-1 block w-full p-1 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-xs">
                        </div>
                        <div class="flex-1">
                            <label for="end-date" class="block text-xs font-small text-gray-700">End Date</label>
                            <input type="date" id="end-date" class="mt-1 block w-full p-1 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-xs">
                        </div>
                    </div>

                    <h3 class="text-xs font-semibold mb-2">Personnel and other Information</h3>

                    <div class="flex flex-col space-y-1">
                        <label for="name" class="block text-gray-700 text-xs">Assigned Engineer</label>
                        <input type="text" id="name" name="name" class="mt-1 block w-full p-1 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-xs" required>
                    </div>

                    <div class="flex flex-col w-1/2">
                        <label for="material_cost" class="block text-gray-700 text-xs">Material Cost</label>
                        <input type="text" id="material_cost" name="material_cost" class="mt-1 block w-full p-1 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-xs" required>
                    </div>

                    <!-- Labor Cost Input -->
                    <div class="flex flex-col w-1/2">
                        <label for="labor_cost" class="block text-gray-700 text-xs">Labor Cost</label>
                        <input type="text" id="labor_cost" name="labor_cost" class="mt-1 block w-full p-1 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-xs" required>
                    </div>
                    <br>
                    <div class="flex justify-between mt-4">
                        <button type="button" id="cancel-modal" class="border border-gray-300 text-gray-800 bg-white px-3 py-1 rounded hover:bg-gray-100 focus:outline-none text-xs flex-1 mr-2">Cancel</button>
                        <button type="submit" class="bg-green-500 text-white px-3 py-1 rounded shadow-md hover:bg-green-600 focus:outline-none text-xs flex-1 ml-2">Save</button>
                    </div>
                </form>
            </div>
        </div>

        <script>

            // Get the button and modal elements for deleting
            const deleteButton = document.getElementById('delete-button');
            const deleteModal = document.getElementById('delete-modal');
            const cancelDeleteButton = document.getElementById('cancel-button');

            // Show delete modal when delete button is clicked
            deleteButton.addEventListener('click', function() {
                deleteModal.classList.remove('hidden');
            });

            // Hide delete modal when cancel button is clicked
            cancelDeleteButton.addEventListener('click', function() {
                deleteModal.classList.add('hidden');
            });

            // Get modal elements for editing
            const editButton = document.getElementById('edit-button');
            const editModal = document.getElementById('add-card-modal');
            const closeEditModal = document.getElementById('close-modal');
            const cancelEditModal = document.getElementById('cancel-modal');

            // Show the edit modal when the edit button is clicked
            editButton.addEventListener('click', () => {
                editModal.classList.remove('hidden');
            });

            // Hide the edit modal when the close button or cancel button is clicked
            closeEditModal.addEventListener('click', () => {
                editModal.classList.add('hidden');
            });
            cancelEditModal.addEventListener('click', () => {
                editModal.classList.add('hidden');
            });


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



    </x-slot>

</x-app-layout>

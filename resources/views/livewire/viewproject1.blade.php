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
                                <p class="mt-2 text-gray-600 text-xs">Amet minim mollit non deserunt ullamco est sit aliqua dolor do amet sint...</p>
                                <br>
                                <div class="my-3 border-t border-gray-300"></div>
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
                            <ul class="inline-flex items-stretch -space-x-px bg-white p-1 rounded-lg shadow-sm border border-gray-300 ml-auto">
                                <li>
                                    <a href="#" class="flex items-center justify-center h-full py-1 px-2 ml-0 text-xs text-gray-500 bg-white rounded-l-lg border border-gray-300 hover:bg-gray-100 hover:text-gray-700">
                                        <span class="sr-only">Previous</span>
                                        <svg class="w-4 h-4" aria-hidden="true" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                                        </svg>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="flex items-center justify-center px-2 py-1 text-xs leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700">1</a>
                                </li>
                                <li>
                                    <a href="#" class="flex items-center justify-center px-2 py-1 text-xs leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700">2</a>
                                </li>
                                <li>
                                    <a href="#" aria-current="page" class="z-10 flex items-center justify-center px-2 py-1 text-xs leading-tight text-primary-600 bg-primary-50 border-primary-300 hover:bg-primary-100 hover:text-primary-700">3</a>
                                </li>
                                <li>
                                    <a href="#" class="flex items-center justify-center px-2 py-1 text-xs leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700">...</a>
                                </li>
                                <li>
                                    <a href="#" class="flex items-center justify-center px-2 py-1 text-xs leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700">100</a>
                                </li>
                                <li>
                                    <a href="#" class="flex items-center justify-center h-full py-1 px-2 leading-tight text-xs text-gray-500 bg-white rounded-r-lg border border-gray-300 hover:bg-gray-100 hover:text-gray-700">
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

    <!-- Modal Section (same as before) -->
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
                    <label for="name" class="block text-gray-700 text-xs">Name</label>
                    <input type="text" id="name" name="name" class="mt-1 block w-full p-1 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-xs" required>
                </div>

                <div class="flex flex-col space-y-1">
                    <label for="total_project_cost" class="block text-gray-700 text-xs">Total Project Cost</label>
                    <input type="text" id="total_project_cost" name="total_project_cost" class="mt-1 block w-full p-1 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-xs" required>
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

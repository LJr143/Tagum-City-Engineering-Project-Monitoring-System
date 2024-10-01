<div>

    <!-- Main content -->
    <div class="flex-1 p-2">
        <main>
            <h2 class="text-xl font-semibold mb-2">Road Construction</h2>

            <!-- Cards Section -->
            <div class="flex flex-col space-y-4 mx-8">
                <div class="flex justify-end mb-4">
                    <button id="add-card-button"
                            class="bg-green-700 text-white text-xs px-4 py-2 rounded shadow-md hover:bg-green-900 focus:outline-none">
                        Add New POW
                    </button>
                </div>
                <!-- Cards Display -->
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    <!-- Cards -->

                    @for ($i = 0; $i < 6; $i++)
                    <a href="{{ route('material-table-cost') }}"
                       class="bg-white p-6 rounded-lg shadow-md block transform transition-transform duration-300 hover:scale-105 hover:shadow-lg">
                        <div class="bg-green-600 text-white text-xs px-2 py-1 rounded w-max mb-2">Ref: 12345</div>
                        <h3 class="text-lg font-bold text-black">POW 1</h3>
                        <p class="mt-2  text-gray-600 text-xs">Amet minim mollit non deserunt ullamco est sit aliqua dolor do amet sint. Velit officia consequat duis enim velit mollit. Exercitation veniam consequat sunt nostrud amet.</p> <br>
                        <div class="my-3 border-t border-gray-300"></div>
                        <div class="flex items-center space-x-3">
                            <div class="w-12 h-12 rounded-full bg-gray-200 flex items-center justify-center">
                                <img src="{{ asset('images/pic1.jpg') }}" alt="Engineer Image"
                                     class="w-12 h-12 rounded-full object-cover">
                            </div>
                            <div>
                                <p class="text-gray-500 text-xs ">Senior Engineer</p>
                                <p class="text-black">John Doe</p>
                            </div>
                        </div>
                    </a>
                    @endfor
                </div>
            </div>
        </main>
    </div>

    <div id="add-card-modal"
         class="fixed inset-0 bg-gray-800 bg-opacity-50 flex items-center justify-center hidden z-50">

        <div class="bg-white p-6 rounded-lg shadow-md max-w-2xl w-full relative z-60"> <!-- Reduced padding -->
            <button id="close-modal" class="absolute top-2 right-2 text-gray-500 hover:text-gray-700">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                     xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>

            <h3 class="text-lg font-bold mb-2">Add New POW Card</h3> <!-- Reduced bottom margin -->

            <form action="#" method="POST" class="space-y-2"> <!-- Reduced spacing for better compactness -->
                @csrf

                <!-- REFERENCE NUMBER -->
                <div class="flex flex-col space-y-1">
                    <label for="reference-number" class="block text-gray-700 text-xs">Reference Number</label>
                    <input type="text" id="reference-number" name="reference_number"
                           class="mt-1 block w-full h-8 p-1 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-xs" required>
                </div>
                <!-- POW DESCRIPTION -->
                <div class="flex flex-col space-y-1"> <!-- Using flex-col for better stacking -->
                    <label for="description" class="block text-gray-700 text-xs">Description</label>
                    <textarea id="description" name="description" rows="4"
                              class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-xs p-2" required></textarea>
                </div>


                <!-- DATE FIELDS -->
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

                <!-- Name and Role Row -->
                <div class="flex flex-col space-y-1">
                    <label for="name" class="block text-gray-700 text-xs">Name</label>
                    <input type="text" id="name" name="name"
                           class="mt-1 block w-full p-1 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-xs" required>
                </div>

                <div class="flex flex-col space-y-1">
                    <label for="total_project_cost" class="block text-gray-700 text-xs">Total Project Cost</label>
                    <input type="text" id="total_project_cost" name="total_project_cost"
                           class="mt-1 block w-full p-1 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-xs" required>
                </div>
<br>
                <!-- Buttons Row -->
                <div class="flex justify-between mt-4">
                    <button type="button" id="cancel-modal"
                            class="border border-gray-300 text-gray-800 bg-white px-3 py-1 rounded hover:bg-gray-100 focus:outline-none text-xs flex-1 mr-2">
                        Cancel
                    </button>
                    <button type="submit"
                            class="bg-green-500 text-white px-3 py-1 rounded shadow-md hover:bg-green-600 focus:outline-none text-xs flex-1 ml-2">
                        Save
                    </button>
                </div>

            </form>
        </div>
    </div>


    <script>
    // Get modal and buttons
    const addCardButton = document.getElementById('add-card-button');
    const modal = document.getElementById('add-card-modal');
    const closeModalButton = document.getElementById('close-modal');
    const cancelModalButton = document.getElementById('cancel-modal');

    // Show modal
    addCardButton.addEventListener('click', () => {
        modal.classList.remove('hidden');
    });

    // Close modal
    closeModalButton.addEventListener('click', () => {
        modal.classList.add('hidden');
    });

    cancelModalButton.addEventListener('click', () => {
        modal.classList.add('hidden');
    });

    // Close modal when clicking outside of it
    window.addEventListener('click', (e) => {
        if (e.target === modal) {
            modal.classList.add('hidden');
        }
    });
    document.getElementById('submit-btn').addEventListener('click', function() {
        const startDate = document.getElementById('start-date').value;
        const endDate = document.getElementById('end-date').value;

        if (new Date(startDate) > new Date(endDate)) {
            alert("End Date must be greater than or equal to Start Date.");
        } else {
            // Proceed with form submission or any other action
            alert(`Start Date: ${startDate}\nEnd Date: ${endDate}`);
        }
    })
</script>

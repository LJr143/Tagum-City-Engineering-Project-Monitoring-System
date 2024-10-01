<div class="container mx-auto p-2">
    <!-- Project Header -->
    <h3 class="text-base pb-3 font-semibold leading-6 text-gray-900">POW 1</h3>
    <div class="flex justify-between items-center mb-6">
        <span class="bg-green-500 text-xs text-white py-1 px-4 rounded-full">#PRJ2023-03-19879</span>
    </div>

    <!-- Main Content Grid -->
    <div class="grid grid-cols-3 gap-6">

        <!-- Material Cost Section -->
        <div class="col-span-2">
            <div class="bg-white shadow-md rounded-lg p-4">
                <h3 class="text-sm font-semibold mb-2 text-center">Material Cost</h3>

                <!-- Filter, Search, Import Inside Card -->
                <div class="flex items-center justify-between mb-4 space-x-4">
                    <div class="flex items-center border border-gray-300 bg-white p-1 rounded-lg shadow-sm w-7">
                        <button class="p-0.5 flex items-center justify-center text-gray-500 hover:text-gray-700 text-xs">
                            <img src="{{ asset('images/img.png') }}" alt="Filter Icon" class="w-3 h-3 object-cover">
                        </button>
                    </div>
                    <div class="flex space-x-2 ml-auto">
                        <input type="text" placeholder="Search..." class="px-2 py-1 border border-gray-300 rounded-lg shadow-sm text-xs w-36">
                        <button class="importFileBtn bg-green-700 text-white rounded-lg px-2 py-1 shadow-md text-xs hover:bg-green-800 transition-colors duration-300">Import File</button>
                    </div>
                </div>

                <!-- Table for Material Costs -->
                <div class="inline-block min-w-full py-2 align-middle sm:px-0 lg:px-2"> <!-- Adjusted sm:px and lg:px -->
                    <div class="relative bg-white shadow rounded-lg">
                        <table class="min-w-full table-fixed divide-y divide-gray-300">
                            <thead>
                            <tr>
                                <th scope="col" class="relative px-7 sm:w-12 sm:px-6">
                                    <input type="checkbox" class="absolute left-4 top-1/2 -mt-2 h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-600">
                                </th>
                                <th scope="col" class="min-w-[4rem] py-3.5 pr-3 text-left text-sm font-semibold text-gray-900">Item No.</th>
                                <th scope="col" class="px-3 py-3.5 text-left text-xs font-semibold text-gray-900">Qty</th>
                                <th scope="col" class="px-3 py-3.5 text-left text-xs font-semibold text-gray-900">Unit of Issue</th>
                                <th scope="col" class="px-3 py-3.5 text-left text-xs font-semibold text-gray-900">Item Description</th>
                                <th scope="col" class="px-3 py-3.5 text-left text-xs font-semibold text-gray-900">Estimated Unit Cost</th>
                                <th scope="col" class="px-3 py-3.5 text-left text-xs font-semibold text-gray-900">Estimated Cost</th>
                                <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-3">
                                    <span class="sr-only">Status</span>
                                </th>
                                <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-3">
                                    <span class="sr-only">Action</span>
                                </th>
                            </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 bg-white">
                            <tr>
                                <td class="relative px-7 sm:w-12 sm:px-6">
                                    <input type="checkbox" class="absolute left-4 top-1/2 -mt-2 h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-600">
                                </td>
                                <td class="whitespace-nowrap py-4 pr-3 text-xs font-small text-gray-900">1</td>
                                <td class="whitespace-nowrap px-3 py-4 text-xs text-gray-500">50</td>
                                <td class="whitespace-nowrap px-3 py-4 text-xs text-gray-500">Bags</td>
                                <td class="whitespace-nowrap px-3 py-4 text-xs text-gray-500">Cement</td>
                                <td class="whitespace-nowrap px-3 py-4 text-xs text-gray-500">$100</td>
                                <td class="whitespace-nowrap px-3 py-4 text-xs text-gray-500">$5000</td>
                                <td class="whitespace-nowrap px-3 py-4">
                                    <!-- Status or additional data can go here -->
                                </td>
                                <td class="whitespace-nowrap px-2 py-4 flex space-x-2">
                                    <div class="flex flex-col space-y-1">
                                        <button class="px-2 py-1 bg-blue-500 text-white rounded hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-300 focus:ring-opacity-50 text-xs w-full">
                                            Edit
                                        </button>
                                        <button class="px-2 py-1 bg-red-500 text-white rounded hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-300 focus:ring-opacity-50 text-xs w-full">
                                            Delete
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <!-- Additional rows can be added here -->
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Pagination -->
                <div class="flex justify-between items-center mt-4">
                    <p class="text-xs">Showing 1 to 10 of 100 entries</p>
                    <div class="text-xs space-x-1">
                        <button class="px-3 py-1 bg-gray-300 rounded-md">1</button>
                        <button class="px-3 py-1 bg-gray-300 rounded-md">2</button>
                        <button class="px-3 py-1 bg-gray-300 rounded-md">3</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Side Panel -->
        <div class="bg-white text-xs shadow-md rounded-lg p-4">
            <h3 class="text-sm font-bold mb-4">Constructive and destructive waves</h3>
            <img src="{{ asset('images/pic1.jpg') }}" alt="Engineer Image" class="w-full h-24 object-cover rounded-lg">
            <p class="text-xs pb-2 text-gray-600 mt-2">This is a brief description of the project or engineer's role.</p>
            <p class="font-semibold">Project Cost: 1,000,000,000</p>
        </div>

        <!-- Labor Cost Section -->
        <div class="col-span-2 mt-6">
            <div class="bg-white shadow-md rounded-lg p-4">
                <h3 class="text-sm font-semibold mb-4 text-center">Labor Cost</h3>

                <!-- Filter, Search, Import Inside Card -->
                <div class="flex items-center justify-between mb-4 space-x-4">
                    <div class="flex items-center border border-gray-300 bg-white p-1 rounded-lg shadow-sm w-7">
                        <button class="p-0.5 flex items-center justify-center text-gray-500 hover:text-gray-700 text-xs">
                            <img src="{{ asset('images/img.png') }}" alt="Filter Icon" class="w-3 h-3 object-cover">
                        </button>
                    </div>
                    <div class="flex space-x-2 ml-auto">
                        <input type="text" placeholder="Search..." class="px-2 py-1 border border-gray-300 rounded-lg shadow-sm text-xs w-36">
                        <button class="importFileBtn bg-green-700 text-white rounded-lg px-2 py-1 shadow-md text-xs hover:bg-green-800 transition-colors duration-300">Import File</button>
                    </div>
                </div>

                <!-- Table for Labor Costs -->
                <!-- Table for Material Costs -->
                <div class="inline-block min-w-full py-2 align-middle sm:px-0 lg:px-2"> <!-- Adjusted sm:px and lg:px -->
                    <div class="relative bg-white shadow rounded-lg">
                        <table class="min-w-full table-fixed divide-y divide-gray-300">
                            <thead>
                            <tr>
                                <th scope="col" class="relative px-7 sm:w-12 sm:px-6">
                                    <input type="checkbox" class="absolute left-4 top-1/2 -mt-2 h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-600">
                                </th>
                                <th scope="col" class="min-w-[4rem] py-3.5 pr-3 text-left text-sm font-semibold text-gray-900">Item No.</th>
                                <th scope="col" class="px-3 py-3.5 text-left text-xs font-semibold text-gray-900">Qty</th>
                                <th scope="col" class="px-3 py-3.5 text-left text-xs font-semibold text-gray-900">Unit of Issue</th>
                                <th scope="col" class="px-3 py-3.5 text-left text-xs font-semibold text-gray-900">Item Description</th>
                                <th scope="col" class="px-3 py-3.5 text-left text-xs font-semibold text-gray-900">Estimated Unit Cost</th>
                                <th scope="col" class="px-3 py-3.5 text-left text-xs font-semibold text-gray-900">Estimated Cost</th>
                                <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-3">
                                    <span class="sr-only">Status</span>
                                </th>
                                <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-3">
                                    <span class="sr-only">Action</span>
                                </th>
                            </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 bg-white">
                            <tr>
                                <td class="relative px-7 sm:w-12 sm:px-6">
                                    <input type="checkbox" class="absolute left-4 top-1/2 -mt-2 h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-600">
                                </td>
                                <td class="whitespace-nowrap py-4 pr-3 text-xs font-small text-gray-900">1</td>
                                <td class="whitespace-nowrap px-3 py-4 text-xs text-gray-500">50</td>
                                <td class="whitespace-nowrap px-3 py-4 text-xs text-gray-500">Bags</td>
                                <td class="whitespace-nowrap px-3 py-4 text-xs text-gray-500">Cement</td>
                                <td class="whitespace-nowrap px-3 py-4 text-xs text-gray-500">$100</td>
                                <td class="whitespace-nowrap px-3 py-4 text-xs text-gray-500">$5000</td>
                                <td class="whitespace-nowrap px-3 py-4">
                                    <!-- Status or additional data can go here -->
                                </td>
                                <td class="whitespace-nowrap px-2 py-4 flex space-x-2">
                                    <div class="flex flex-col space-y-1">
                                        <button class="px-2 py-1 bg-blue-500 text-white rounded hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-300 focus:ring-opacity-50 text-xs w-full">
                                            Edit
                                        </button>
                                        <button class="px-2 py-1 bg-red-500 text-white rounded hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-300 focus:ring-opacity-50 text-xs w-full">
                                            Delete
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <!-- Additional rows can be added here -->
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Pagination -->
                <div class="flex justify-between items-center mt-4">
                    <p class="text-xs">Showing 1 to 10 of 100 entries</p>
                    <div class="text-xs space-x-1">
                        <button class="px-3 py-1 bg-gray-300 rounded-md">1</button>
                        <button class="px-3 py-1 bg-gray-300 rounded-md">2</button>
                        <button class="px-3 py-1 bg-gray-300 rounded-md">3</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Cost Modal -->
        <div class="bg-white shadow-md rounded-lg p-4 mt-4"> <!-- Keeping mt-4 for top margin -->
            <h3 class="text-sm font-bold mb-2">Cost Entry</h3> <!-- Reduced bottom margin to mb-2 -->
            <form>
                <div class="text-xs mb-2"> <!-- Reduced bottom margin to mb-2 -->
                    <label for="amount" class="block text-gray-700">Material Cost</label>
                    <input type="text" id="amount" class="w-full text-xs border border-gray-300 rounded-md px-3 py-2" placeholder="Enter Total Material Cost">
                </div>
                <div class="text-xs mb-2"> <!-- Reduced bottom margin to mb-2 -->
                    <label for="payroll" class="block text-gray-700">Payroll Amount</label>
                    <input type="text" id="payroll" class="w-full text-xs border border-gray-300 rounded-md px-3 py-2" placeholder="Enter Payroll Amount">
                </div>
                <div class="text-xs mb-2"> <!-- Reduced bottom margin to mb-2 -->
                    <label for="payroll" class="block text-gray-700">Payroll Amount</label>
                    <input type="text" id="payroll" class="w-full text-xs border border-gray-300 rounded-md px-3 py-2" placeholder="Enter Payroll Amount">
                </div>
                <div class="text-xs mb-2"> <!-- Reduced bottom margin to mb-2 -->
                    <label for="payroll" class="block text-gray-700">Payroll Amount</label>
                    <input type="text" id="payroll" class="w-full text-xs border border-gray-300 rounded-md px-3 py-2" placeholder="Enter Payroll Amount">
                </div>

                <!-- Save and Cancel Buttons -->
                <div class="flex justify-end space-x-2">
                    <button type="submit" class="bg-gray-300 px-4 py-1 rounded-md shadow-md text-xs hover:bg-gray-400">Cancel</button>
                    <button type="button" class="bg-green-700 text-white px-4 py-1 rounded-md shadow-md text-xs hover:bg-green-800">Save</button>
                </div>
            </form>
        </div>

        <!-- Modal for Import File -->
        <div id="importFileModal" class="fixed inset-0 bg-gray-900 bg-opacity-50 flex items-center justify-center hidden z-50">
            <div class="bg-white p-6 rounded-lg shadow-lg w-1/3 border-2 border-gray-500 z-60">
                <h2 class="text-center text-sm font-bold mb-4 text-green-700">Import File</h2>
                <form>
                    <!-- File Upload Area -->
                    <div class="flex flex-col items-center justify-center mb-4">
                        <label for="fileInput" class="w-full flex flex-col items-center px-4 py-6 bg-green-50 border-2 border-green-500 border-dashed rounded-lg cursor-pointer hover:bg-green-100">
                            <svg class="w-8 h-8 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16V4m0 0L3 8m4-4l4 4m6 12v-4m0 0l4 4m-4-4l-4 4"></path>
                            </svg>
                            <span class="mt-2 text-xs text-green-700">Click to upload or drag and drop</span>
                            <input type="file" id="fileInput" class="hidden" multiple>
                        </label>
                    </div>

                    <!-- Uploading Files Section -->
                    <div class="text-xs text-center text-gray-500">
                        <p>Your file here</p>
                        <p id="uploadStatus" class="mt-2 text-xs text-blue-500 hidden">Uploading files...</p>
                    </div>

                    <!-- Uploaded Files Section -->
                    <div id="uploadedFiles" class="mt-4 hidden">
                        <h3 class="text-sm font-bold text-green-700">Uploaded Files:</h3>
                        <ul class="w-full list-disc list-inside text-xs text-gray-600 mt-2" id="fileList" style="border: 2px solid green; padding: 10px;">
                        </ul>
                    </div>

                    <!-- Buttons -->
                    <div class="flex justify-end space-x-2 mt-4">
                        <button type="button" class="px-4 py-1 text-xs bg-red-500 text-white rounded-lg hover:bg-red-600" id="closeModalBtn">Cancel</button>
                        <button type="submit" class="px-4 py-1 text-xs bg-green-700 text-white rounded-lg hover:bg-green-800">Upload</button>
                    </div>
                </form>
            </div>
        </div>

        <!-- JavaScript to handle file upload and display status -->
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Select all import buttons
                const importFileButtons = document.querySelectorAll('.importFileBtn');

                importFileButtons.forEach(button => {
                    button.addEventListener('click', () => {
                        document.getElementById('importFileModal').classList.remove('hidden');
                    });
                });

                // Close modal on 'Cancel' button click
                document.getElementById('closeModalBtn').addEventListener('click', function() {
                    document.getElementById('importFileModal').classList.add('hidden');
                    resetModal();
                });

                // Handle file upload
                const fileInput = document.getElementById('fileInput');
                const uploadStatus = document.getElementById('uploadStatus');
                const uploadedFiles = document.getElementById('uploadedFiles');
                const fileList = document.getElementById('fileList');
                const importFileModal = document.getElementById('importFileModal');

                fileInput.addEventListener('change', function() {
                    if (fileInput.files.length > 0) {
                        // Show "Uploading files..." message
                        uploadStatus.classList.remove('hidden');
                        uploadStatus.textContent = 'Uploading files...';

                        // Simulate file upload delay
                        setTimeout(() => {
                            uploadStatus.classList.add('hidden'); // Hide upload status message

                            // Show uploaded files list
                            uploadedFiles.classList.remove('hidden');
                            fileList.innerHTML = ''; // Clear previous list
                            for (let i = 0; i < fileInput.files.length; i++) {
                                let li = document.createElement('li');
                                li.textContent = fileInput.files[i].name;
                                fileList.appendChild(li);
                            }
                        }, 1500); // Simulate delay for file upload
                    }
                });

                // Optional: Close modal on 'Esc' key press
                document.addEventListener('keydown', function(event) {
                    if (event.key === 'Escape') {
                        if (!importFileModal.classList.contains('hidden')) {
                            importFileModal.classList.add('hidden');
                            resetModal();
                        }
                    }
                });

                // Function to reset modal content
                function resetModal() {
                    fileInput.value = '';
                    uploadStatus.classList.add('hidden');
                    uploadedFiles.classList.add('hidden');
                    fileList.innerHTML = '';
                }
            });
        </script>

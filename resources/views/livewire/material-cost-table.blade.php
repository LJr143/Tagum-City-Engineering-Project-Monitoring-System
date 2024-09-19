<div class="container mx-auto p-4">
    <h2 class="text-xl font-semibold mb-2">POW 1</h2>
    <div class="flex space-x-4 mb-4">
        <!-- First Table Card: Material Costs -->
        <div class="w-3/4 space-y-4">
            <div class="bg-white p-4 rounded-lg shadow-md">
                <h1 class="text-xs font-bold text-center">Material Costs</h1><br>
                <!-- Filter, Search, Import Inside Table Card -->
                <div class="flex items-center justify-between mb-4 space-x-4">
                    <div class="flex items-center border border-gray-300 bg-white p-1 rounded-lg shadow-sm w-7">
                        <button class="p-0.5 flex items-center justify-center text-gray-500 hover:text-gray-700 text-xs">
                            <img src="{{ asset('images/img.png') }}" alt="Filter Icon" class="w-3 h-3 object-cover">
                        </button>
                    </div>
                    <div class="flex space-x-2 ml-auto">
                        <input type="text" placeholder="Search..." class="px-2 py-1 border border-gray-300 rounded-lg shadow-sm text-xs w-36">
                        <!-- Changed id to class -->
                        <button class="importFileBtn bg-green-700 text-white rounded-lg px-2 py-1 shadow-md text-xs hover:bg-green-800 transition-colors duration-300">Import File</button>
                    </div>
                </div>

                <!-- Table -->
                <div class="overflow-x-auto">
                    <table class="min-w-full bg-white border border-gray-300 rounded-lg shadow-md">
                        <thead>
                        <tr class="bg-gray-200 border-b border-gray-300 text-xs">
                            <th class="px-2 py-1 text-left text-gray-600">Material ID</th>
                            <th class="px-2 py-1 text-left text-gray-600">Material Name</th>
                            <th class="px-2 py-1 text-left text-gray-600">Quantity</th>
                            <th class="px-2 py-1 text-left text-gray-600">Unit Price</th>
                            <th class="px-2 py-1 text-left text-gray-600">Total Cost</th>
                            <th class="px-2 py-1 text-left text-gray-600">Action</th>
                        </tr>
                        </thead>
                        <tbody class="text-xs">
                        <tr class="border-b border-gray-300">
                            <td class="px-2 py-1 bg-white text-gray-700">001</td>
                            <td class="px-2 py-1 text-gray-700">Cement</td>
                            <td class="px-2 py-1 text-gray-700">50</td>
                            <td class="px-2 py-1 text-gray-700">$5.00</td>
                            <td class="px-2 py-1 text-gray-700">$250.00</td>
                            <td class="px-2 py-1 text-gray-700">
                                <button class="text-blue-500 hover:underline text-xs mr-2">Edit</button>
                                <button class="text-red-500 hover:underline text-xs">Delete</button>
                            </td>
                        </tr>
                        <!-- Add more rows as needed -->
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Second Table Card: Labor Costs -->
            <div class="bg-white p-4 rounded-lg shadow-md">
                <h1 class="text-xs font-bold text-center">Labor Costs</h1><br>
                <!-- Filter, Search, Import Inside Table Card -->
                <div class="flex items-center justify-between mb-4 space-x-4">
                    <div class="flex items-center border border-gray-300 bg-white p-1 rounded-lg shadow-sm w-7">
                        <button class="p-0.5 flex items-center justify-center text-gray-500 hover:text-gray-700 text-xs">
                            <img src="{{ asset('images/img.png') }}" alt="Filter Icon" class="w-3 h-3 object-cover">
                        </button>
                    </div>
                    <div class="flex space-x-2 ml-auto">
                        <input type="text" placeholder="Search..." class="px-2 py-1 border border-gray-300 rounded-lg shadow-sm text-xs w-36">
                        <!-- Changed id to class -->
                        <button class="importFileBtn bg-green-700 text-white rounded-lg px-2 py-1 shadow-md text-xs hover:bg-green-800 transition-colors duration-300">Import File</button>
                    </div>
                </div>
                <!-- Table -->
                <div class="overflow-x-auto">
                    <table class="min-w-full bg-white border border-gray-300 rounded-lg shadow-md">
                        <thead>
                        <tr class="bg-gray-200 border-b border-gray-300 text-xs">
                            <th class="px-2 py-1 text-left text-gray-600">Material ID</th>
                            <th class="px-2 py-1 text-left text-gray-600">Material Name</th>
                            <th class="px-2 py-1 text-left text-gray-600">Quantity</th>
                            <th class="px-2 py-1 text-left text-gray-600">Unit Price</th>
                            <th class="px-2 py-1 text-left text-gray-600">Total Cost</th>
                            <th class="px-2 py-1 text-left text-gray-600">Action</th>
                        </tr>
                        </thead>
                        <tbody class="text-xs">
                        <tr class="border-b border-gray-300">
                            <td class="px-2 py-1 bg-white text-gray-700">002</td>
                            <td class="px-2 py-1 text-gray-700">Sand</td>
                            <td class="px-2 py-1 text-gray-700">30</td>
                            <td class="px-2 py-1 text-gray-700">$2.00</td>
                            <td class="px-2 py-1 text-gray-700">$60.00</td>
                            <td class="px-2 py-1 text-gray-700">
                                <button class="text-blue-500 hover:underline text-xs mr-2">Edit</button>
                                <button class="text-red-500 hover:underline text-xs">Delete</button>
                            </td>
                        </tr>
                        <!-- Add more rows as needed -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Card with Image and Description -->
        <div class="w-1/4 p-4 h-full max-h-[400px]">
            <div class="bg-white p-4 rounded-lg shadow-md h-full">
                <img src="{{ asset('images/pic1.jpg') }}" alt="Engineer Image" class="w-24 h-24 object-cover mb-2"> <!-- Adjusted image size -->
                <p class="text-xs text-gray-600">Description text size xs</p>
            </div>
        </div>

        <!-- Additional Card with Form (Positioned Beside the Second Table Card) -->
        <div class="w-1/4 p-4">
            <div class="bg-white p-4 rounded-lg shadow-md">
                <h1 class="text-xs font-bold text-center mb-4">Labor Cost</h1>
                <form class="space-y-4">
                    <!-- Input Fields -->
                    <input type="text" placeholder="Input Date" class="w-full px-2 py-1 border border-gray-300 rounded-lg shadow-sm text-xs">
                    <input type="text" placeholder="Input Amount" class="w-full px-2 py-1 border border-gray-300 rounded-lg shadow-sm text-xs">
                    <input type="text" placeholder="Payroll Amount" class="w-full px-2 py-1 border border-gray-300 rounded-lg shadow-sm text-xs">
                    <input type="text" placeholder="Field 4" class="w-full px-2 py-1 border border-gray-300 rounded-lg shadow-sm text-xs">
                    <input type="text" placeholder="Field 5" class="w-full px-2 py-1 border border-gray-300 rounded-lg shadow-sm text-xs">
                    <!-- Buttons -->
                    <div class="flex space-x-2">
                        <button type="submit" class="bg-red-500 text-white px-4 py-1 rounded-lg shadow-md text-xs hover:bg-red-600">Delete</button>
                        <button type="button" class="bg-green-700 text-white px-4 py-1 rounded-lg shadow-md text-xs hover:bg-green-800">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal for Import File -->
    <div id="importFileModal" class="fixed inset-0 bg-gray-900 bg-opacity-50 flex items-center justify-center hidden">
        <div class="bg-white p-6 rounded-lg shadow-lg w-1/3 border-2 border-gray-500">
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

<div class="container mx-auto p-2">
    <!-- Project Header -->
    <h3 class="text-base pb-3 font-semibold leading-6 text-gray-900">POW 1</h3>
    <div class="flex justify-between items-center mb-6">
        <span class="bg-green-600 text-xs text-white py-1 px-4 rounded-full">#PRJ2023-03-19879</span>
    </div>
    <!-- Main Content Grid -->
    <div class="grid grid-cols-3 gap-6">

        <!-- Material Cost Section -->
        <div class="col-span-3">
            <div class="bg-white shadow-md rounded-lg p-4">
                <h3 class="text-sm font-semibold mb-2 text-center">Materials</h3>

                <!-- Filter, Search, Import Inside Card -->
                <div class="flex items-center justify-between mb-4 space-x-4">
                    <div class="relative">
                        <button id="filter-btn" class="bg-white border border-gray-200 p-1.5 rounded">
                            <img src="{{ asset('images/img.png') }}" alt="Filter Icon" class="w-3 h-3 object-cover">
                        </button>
                        <div id="filter-options" class="absolute left-0 mt-2 w-32 bg-white border rounded shadow-lg z-50 hidden">
                            <button class="block w-full text-left px-2 py-1 text-xs hover:bg-gray-100" data-role="all">All</button>
                            <button class="block w-full text-left px-2 py-1 text-xs hover:bg-gray-100" data-role="admin">Admin</button>
                            <button class="block w-full text-left px-2 py-1 text-xs hover:bg-gray-100" data-role="engineer">Engineer</button>
                            <button class="block w-full text-left px-2 py-1 text-xs hover:bg-gray-100" data-role="viewer">Viewer</button>
                        </div>
                    </div>

                    <div class="flex space-x-2 ml-auto">
                        <input type="text" placeholder="Search..." class="px-2 py-1 border border-gray-300 rounded-md shadow-sm text-xs w-64">
                    </div>
                </div>

                <!-- Table for Material Costs -->
                <div class="inline-block min-w-full py-2 align-middle sm:px-0 lg:px-2">
                    <div class="relative bg-white shadow rounded-lg">
                        <table class="min-w-full table-fixed divide-y divide-gray-300 w-full">
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
                                <th scope="col" class="px-3 py-3.5 text-left text-xs font-semibold text-gray-900">Action</th>
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
                                <td class="whitespace-nowrap px-2 py-4 flex space-x-2">
                                    <button onclick="openModal()" class="px-2 py-1 bg-blue-500 text-white rounded hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-300 focus:ring-opacity-50 text-xs">
                                        Edit
                                    </button>
                                    <button id="delete-button-1" class="bg-red-500 text-white rounded-md px-2 py-1 text-xs hover:bg-red-600 ml-2 delete-button" data-id="1">
                                        Delete
                                    </button>
                                </td>
                            </tr>
                            <!-- Additional rows can be added here -->
                            </tbody>
                        </table>
                    </div>
                </div>


        <!-- Modal Structure -->
                <div id="editModal" class="fixed inset-0 flex items-center justify-center hidden z-50">
                    <div class="bg-white rounded-lg shadow-lg p-6 w-96"> <!-- Adjusted width here -->
                        <h2 class="text-lg font-semibold mb-4">Edit Item</h2>
                        <div class="mb-4">
                            <label for="item-description" class="block text-xs font-medium text-gray-700">Item Description</label>
                            <input type="text" id="item-description" class="mt-1 px-2 py-2 border border-gray-300 rounded-md text-xs w-full" placeholder="Enter item description"> <!-- Increased padding -->
                        </div>
                        <div class="mb-4">
                            <label for="unit-cost" class="block text-xs font-medium text-gray-700">Estimated Unit Cost</label>
                            <input type="text" id="unit-cost" class="mt-1 px-2 py-2 border border-gray-300 rounded-md text-xs w-full" placeholder="Enter estimated unit cost"> <!-- Increased padding -->
                        </div>
                        <div class="mb-4">
                            <label for="estimated-cost" class="block text-xs font-medium text-gray-700">Estimated Cost</label>
                            <input type="text" id="estimated-cost" class="mt-1 px-2 py-2 border border-gray-300 rounded-md text-xs w-full" placeholder="Enter estimated cost"> <!-- Increased padding -->
                        </div>
                        <div class="flex justify-end">
                            <button onclick="closeModal()" class="px-4 py-1 bg-white border border-gray-300 rounded-md text-xs hover:bg-gray-300">Cancel</button>
                            <button class="ml-2 px-4 py-2 bg-green-600 text-white rounded-md hover:bg-green-700 text-xs">Save</button>
                        </div>
                    </div>
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
        </div>

        <!-- Labor Cost Section -->
        <div class="col-span-3">
            <div class="bg-white shadow-md rounded-lg p-4">
                <h3 class="text-sm font-semibold mb-2 text-center">Labor Cost</h3>

                <!-- Filter, Search, Import Inside Card -->
                <div class="flex items-center justify-between mb-4 space-x-4">
                    <div class="relative">
                        <button id="filter-btn" class="bg-white-200 border border-gray-200 p-1.5 rounded">
                            <img src="{{ asset('images/img.png') }}" alt="Filter Icon" class="w-3 h-3 object-cover">
                        </button>
                        <div id="filter-options" class="absolute left-0 mt-2 w-32 bg-white border rounded shadow-lg z-50 hidden">
                            <button class="block w-full text-left px-2 py-1 text-xs hover:bg-gray-100" data-role="all">All</button>
                            <button class="block w-full text-left px-2 py-1 text-xs hover:bg-gray-100" data-role="admin">Admin</button>
                            <button class="block w-full text-left px-2 py-1 text-xs hover:bg-gray-100" data-role="engineer">Engineer</button>
                            <button class="block w-full text-left px-2 py-1 text-xs hover:bg-gray-100" data-role="viewer">Viewer</button>
                        </div>
                    </div>

                    <div class="flex space-x-2 ml-auto">
                        <button id="open-modal" class="bg-green-700 text-white rounded-lg px-2 py-1 shadow-md text-xs hover:bg-green-800 transition-colors duration-300">Add Payroll</button>
                        <input type="text" placeholder="Search..." class="px-2 py-1 border border-gray-300 rounded-md shadow-sm text-xs w-64">
                    </div>
                </div>

                <!-- Table for Labor Cost-->
                <div class="inline-block min-w-full py-2 align-middle sm:px-0 lg:px-2"> <!-- Adjusted sm:px and lg:px -->
                    <div class="relative bg-white shadow rounded-lg">
                        <table class="min-w-full table-fixed divide-y divide-gray-300 w-full"> <!-- Added w-full class -->
                            <thead>
                            <tr>
                                <th scope="col" class="relative px-7 sm:w-12 sm:px-6">
                                    <input type="checkbox" class="absolute left-4 top-1/2 -mt-2 h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-600">
                                </th>
                                <th scope="col" class="min-w-[4rem] py-3.5 pr-3 text-left text-sm font-semibold text-gray-900">Payroll ID</th>
                                <th scope="col" class="px-3 py-3.5 text-left text-xs font-semibold text-gray-900">Payroll</th>
                                <th scope="col" class="px-3 py-3.5 text-left text-xs font-semibold text-gray-900">Amount</th>
                                <th scope="col" class="px-3 py-3.5 text-left text-xs font-semibold text-gray-900">Date</th>
                                <th scope="col" class="px-3 py-3.5 text-left text-xs font-semibold text-gray-900">Estimated Unit Cost</th>
                                <th scope="col" class="px-3 py-3.5 text-left text-xs font-semibold text-gray-900">Estimated Cost</th>
                                <th scope="col" class="px-3 py-3.5 text-left text-xs font-semibold text-gray-900">Action</th> <!-- Added Action Column -->
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
                                <td class="whitespace-nowrap px-2 py-4 flex space-x-2"> <!-- Added flex container for buttons -->
                                    <button onclick="openModal()" class="px-2 py-1 bg-blue-500 text-white rounded hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-300 focus:ring-opacity-50 text-xs">
                                        Edit
                                    </button>
                                    <button id="delete-button-2" class="bg-red-500 text-white rounded-md px-2 py-1 text-xs hover:bg-red-600 ml-2 delete-button" data-id="1">
                                        Delete
                                    </button>
                                </td>
                            </tr>
                            <!-- Additional rows can be added here -->
                            </tbody>
                        </table>
                    </div>
                </div>
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
                </div>
                <!-- Modal Structure for Labor Cost -->
                <div id="laborCostModal" class="fixed inset-0 flex items-center justify-center hidden z-50">
                    <div class="bg-white rounded-lg shadow-lg p-6 w-96"> <!-- Adjusted width here -->
                        <h2 class="text-lg font-semibold mb-4">Edit Labor Cost</h2>
                        <div class="mb-4">
                            <label for="labor-description" class="block text-xs font-medium text-gray-700">Labor Description</label>
                            <input type="text" id="labor-description" class="mt-1 px-2 py-2 border border-gray-300 rounded-md text-xs w-full" placeholder="Enter labor description"> <!-- Increased padding -->
                        </div>
                        <div class="mb-4">
                            <label for="labor-rate" class="block text-xs font-medium text-gray-700">Hourly Labor Rate</label>
                            <input type="text" id="labor-rate" class="mt-1 px-2 py-2 border border-gray-300 rounded-md text-xs w-full" placeholder="Enter hourly labor rate"> <!-- Increased padding -->
                        </div>
                        <div class="mb-4">
                            <label for="labor-hours" class="block text-xs font-medium text-gray-700">Estimated Labor Hours</label>
                            <input type="text" id="labor-hours" class="mt-1 px-2 py-2 border border-gray-300 rounded-md text-xs w-full" placeholder="Enter estimated labor hours"> <!-- Increased padding -->
                        </div>
                        <div class="flex justify-end">
                            <button onclick="closeModal()" class="px-4 py-1 bg-white border border-gray-300 rounded-md text-xs hover:bg-gray-300">Cancel</button>
                            <button class="ml-2 px-4 py-2 bg-green-600 text-white rounded-md hover:bg-green-700 text-xs">Save</button>


                        </div>
                    </div>
                </div>

            </div>
        </div>

        <!-- Modal for Adding Cost Entry -->
        <div id="cost-modal" class="fixed inset-0 bg-gray-800 bg-opacity-50 flex items-center justify-center z-50 hidden">
            <div class="bg-white rounded-md shadow-lg p-6 w-1/3">
                <!-- Payroll Title -->
                <h2 class="text-sm font-semibold mb-4">Add Payroll</h2>

                <!-- Payroll Title Field -->
                <label for="payroll-title" class="text-xs font-semibold mb-2 block">Payroll </label>
                <input id="payroll-title" type="text" placeholder="Payroll Amount" class="border border-gray-300 text-xs rounded-lg px-4 py-2 w-full mb-4">

                <!-- Amount and Date Fields -->
                <div class="flex space-x-2">
                    <!-- Amount Field -->
                    <div class="w-1/2">
                        <label for="amount" class="text-xs font-semibold mb-2 block">Amount</label>
                        <input id="amount" type="text" placeholder="Enter Amount" class="border border-gray-300 text-xs rounded-md px-4 py-2 w-full">
                    </div>

                    <!-- Date Field -->
                    <div class="w-1/2">
                        <label for="date" class="text-xs font-semibold mb-2 block">Date</label>
                        <input id="date" type="date" class="border border-gray-300 text-xs rounded-md px-4 py-2 w-full">
                    </div>
                </div>

                <!-- Buttons -->
                <div class="flex justify-end mt-4">
                    <button id="close-modal" class="bg-white border border-gray-300 text-gray-700 rounded-md text-xs px-4 py-2 hover:bg-gray-300">
                        Cancel
                    </button>
                    <button class="bg-green-700 text-white rounded-md px-4 py-2 text-xs hover:bg-green-800 ml-2">Add</button>
                </div>
            </div>
        </div>


    </div>



        <script>



            function openModal() {
                document.getElementById('editModal').classList.remove('hidden');
            }

            function closeModal() {
                document.getElementById('editModal').classList.add('hidden');
            }
            function openLaborCostModal() {
                document.getElementById("laborCostModal").classList.remove("hidden");
            }

            function closeModal() {
                document.getElementById("editModal").classList.add("hidden");
                document.getElementById("laborCostModal").classList.add("hidden");
            }
            document.addEventListener('DOMContentLoaded', function() {
                const filterBtn = document.getElementById('filter-btn');
                const filterOptions = document.getElementById('filter-options');
                const filterOptionButtons = document.querySelectorAll('.filter-option');
                const rows = document.querySelectorAll('tbody tr');

                // Show/Hide filter options
                filterBtn.addEventListener('click', function() {
                    filterOptions.classList.toggle('hidden');
                });

                // Filter table rows based on selected role
                filterOptionButtons.forEach(button => {
                    button.addEventListener('click', function() {
                        const role = this.getAttribute('data-role');
                        filterOptions.classList.add('hidden');

                        rows.forEach(row => {
                            if (role === 'all' || row.getAttribute('data-role') === role) {
                                row.classList.remove('hidden');
                            } else {
                                row.classList.add('hidden');
                            }
                        });
                    });
                });

                // Hide modal functionality
                const modal = document.getElementById('cost-modal');
                const openModalButton = document.getElementById('open-modal');
                const closeModalButton = document.getElementById('close-modal');

                openModalButton.addEventListener('click', function() {
                    modal.classList.remove('hidden');
                });

                closeModalButton.addEventListener('click', function() {
                    modal.classList.add('hidden');
                });
            });
            document.getElementById('open-modal').addEventListener('click', function() {
                document.getElementById('cost-modal').classList.remove('hidden');
            });

            document.getElementById('close-modal').addEventListener('click', function() {
                document.getElementById('cost-modal').classList.add('hidden');
            })
            // Get modal elements for deleting
            const deleteModal = document.getElementById('delete-modal');
            const cancelDeleteButton = document.getElementById('cancel-button');
            const confirmDeleteButton = document.getElementById('confirm-delete-button');
            let itemIdToDelete; // Variable to store the ID of the item to delete

            // Function to show delete modal
            function showDeleteModal(itemId) {
                itemIdToDelete = itemId; // Store the ID for confirmation
                deleteModal.classList.remove('hidden');
                document.getElementById('delete-message').textContent = `Are you sure you want to delete item ${itemId}?`;
            }

            // Attach event listeners to all delete buttons
            document.querySelectorAll('.delete-button').forEach(button => {
                button.addEventListener('click', function() {
                    const itemId = this.getAttribute('data-id');
                    showDeleteModal(itemId);
                });
            });

            // Hide delete modal when cancel button is clicked
            cancelDeleteButton.addEventListener('click', function() {
                deleteModal.classList.add('hidden');
            });

            // Handle confirm delete action
            confirmDeleteButton.addEventListener('click', function() {
                // Execute delete logic here, using itemIdToDelete
                alert(`Item ${itemIdToDelete} deleted!`); // Placeholder for delete action
                deleteModal.classList.add('hidden'); // Hide the modal after confirming deletion
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

        </script>
</div>

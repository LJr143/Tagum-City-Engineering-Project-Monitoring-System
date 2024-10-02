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
                                    <button class="px-2 py-1 bg-red-500 text-white rounded hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-300 focus:ring-opacity-50 text-xs">
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
                            <button onclick="closeModal()" class="px-4 py-1 bg-gray-300 rounded-md text-xs hover:bg-gray-400">Cancel</button>
                            <button class="ml-2 px-4 py-1 bg-green-600 text-white rounded-md hover:bg-green-700 text-xs">Save</button>
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

                                    <button class="px-2 py-1 bg-red-500 text-white rounded hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-300 focus:ring-opacity-50 text-xs">
                                        Delete
                                    </button>
                                </td>
                            </tr>
                            <!-- Additional rows can be added here -->
                            </tbody>
                        </table>
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
                            <button onclick="closeModal()" class="px-4 py-1 bg-gray-300 rounded-md text-xs hover:bg-gray-400">Cancel</button>
                            <button class="ml-2 px-4 py-1 bg-green-600 text-white rounded-md hover:bg-green-700 text-xs">Save</button>
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
        </div>

        <!-- Modal for Adding Cost Entry -->
        <div id="cost-modal" class="fixed inset-0 bg-gray-800 bg-opacity-50 flex items-center justify-center z-50 hidden">
            <div class="bg-white rounded-lg shadow-lg p-6 w-1/3">
                <h2 class="text-sm font-semibold mb-4">Add payroll</h2>
                <input type="text" placeholder="Enter Payroll" class="border border-gray-300 text-xs rounded-lg px-4 py-2 w-full mb-4">
                <div class="flex justify-end">
                    <button id="close-modal" class="bg-gray-300 text-gray-700 rounded-lg text-xs px-4 py-2 hover:bg-gray-400">Cancel</button>
                    <button class="bg-green-700 text-white rounded-lg px-4 py-2 text-xs hover:bg-green-800 ml-2">Add</button>
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

        </script>
</div>

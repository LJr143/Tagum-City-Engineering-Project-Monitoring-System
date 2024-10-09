<x-app-layout mainClass="flex" headerClass="shadow-[0px_1px_2px_-1px_rgba(0,0,0,0.1)] ">

    <x-slot name="sidebar">
        <x-sidebar></x-sidebar>
    </x-slot>

    <x-slot name="header">
        <x-header></x-header>
    </x-slot>

    <x-slot name="main">
        <div class="container mx-auto p-2">
            <div class="container mx-auto p-2">
                <div><span class="bg-green-600 text-white px-3 py-1 rounded text-xs ">
                   Ref: #12345
                  </span>
                </div>
                <h3 class="text-base pb-3 font-semibold leading-6 text-gray-900 mt-3 mb-5">POW 1</h3>

                <div>
                    <div class="sm:hidden">
                        <label for="tabs" class="sr-only">Select a tab</label>
                        <select id="tabs" name="tabs" onchange="changeTab(event)" class="block w-full rounded-md border-gray-300 py-2 pl-3 pr-10 text-base focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
                            <option value="materials">Materials</option>
                            <option value="labor-cost">Labor Cost</option>
                        </select>
                    </div>
                    <div class="hidden sm:block mb-4">
                        <div class="border-b border-gray-200">
                            <nav class="-mb-px flex space-x-8" aria-label="Tabs">
                                <a id="materials-tab" href="#" onclick="changeTabTo('materials')" class="border-green-600 text-green-600 whitespace-nowrap border-b-2 pb-1 px-1 text-xs font-medium" aria-current="page">Materials</a>
                                <a id="labor-cost-tab" href="#" onclick="changeTabTo('labor-cost')" class="text-gray-500 hover:border-green-600 hover:text-green-600 whitespace-nowrap border-b-2 pb-1 px-1 text-xs font-medium">Labor Cost</a>
                            </nav>
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-4 gap-6">
                    <!-- Material Cost Section -->
                    <div id="materials" class="col-span-3"> <!-- Adjusted to take 3/4 width -->
                        <div class="bg-white shadow-md rounded-lg p-4">
                            <h3 class="text-sm font-semibold mb-2 text-center">Materials</h3>

                            <!-- Filter, Search -->
                            <div class="flex items-center justify-between mb-4 space-x-4">
                                <!-- Filter-->
                                <div class="relative md:w-1/4 w-full">
                                    <button id="filter-btn" class="bg-white border border-gray-200 p-1.5 rounded h-8 ml-2">
                                        <img src="{{ asset('images/img.png') }}" alt="Filter Icon" class="w-3 h-3 object-cover">
                                    </button>
                                    <div id="filter-options" class="absolute left-0 mt-2 w-32 bg-white border rounded shadow-lg z-50 hidden">
                                        <button class="block w-full text-left px-2 py-1 text-xs hover:bg-gray-100" data-role="all">All</button>
                                        <button class="block w-full text-left px-2 py-1 text-xs hover:bg-gray-100" data-role="admin">Admin</button>
                                        <button class="block w-full text-left px-2 py-1 text-xs hover:bg-gray-100" data-role="engineer">Engineer</button>
                                        <button class="block w-full text-left px-2 py-1 text-xs hover:bg-gray-100" data-role="viewer">Viewer</button>
                                    </div>
                                </div>
                                <!-- Search bar -->
                                <div class="flex justify-start"> <!-- Changed from justify-end to justify-start -->
                                    <!-- Search input -->

                                    <div class="relative flex items-center space-x-2 w-full sm:w-2/4 lg:w-1/4"> <!-- Width adjusts based on screen size -->
                                        <input id="search-input" type="text" placeholder="Search" class="ml-2 pl-10 py-1 border border-gray-300 bg-white h-7 px-5 pr-7 rounded-md text-xs focus:ring-green-500 focus:border-green-500 w-full sm:w-auto">
                                        <svg class="h-10 w-4 text-gray-400 dark:text-gray-300 absolute left-3 top-1/2 transform -translate-y-1/2" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24">
                                            <path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                        </svg>
                                    </div>
                                </div>
                            </div>

                            <!-- Table for Material Costs -->
                            <div class="inline-block min-w-full py-2 align-middle sm:px-0 lg:px-2">
                                <div class="relative bg-white shadow rounded-lg w-full">
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
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <!-- Pagination -->
                            <div class="flex items-center justify-between w-full px-3 mt-4">
                                <!-- Dropdown -->
                                <div class="relative">
                                    <select class="text-xs block appearance-none w-full bg-white border border-gray-300 text-gray-700 py-2 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                                        <option>3</option>
                                        <option>6</option>
                                        <option>9</option>
                                    </select>
                                </div>
                                <!-- Pagination Info and Controls -->
                                <div class="flex items-center space-x-4 text-gray-600 text-xs">

                                <span class="text-xs font-normal text-gray-500 dark:text-gray-400">
                                    Showing
                                    <span class="font-semibold text-black">1-10</span>
                                    of
                                    <span class="font-semibold text-black">1000</span>
                                </span>

                                    <div class="flex items-center space-x-4 text-xs">
                                        <a href="#" class="hover:text-black">1</a>
                                        <a href="#" class="hover:text-black">2</a>
                                        <a href="#" class="hover:text-black">3</a>
                                        <a href="#" class="hover:text-black">
                                            <i class="fas fa-angle-right text-lg"></i>
                                        </a>
                                        <a href="#" class="hover:text-black">
                                            <i class="fas fa-angle-double-right text-lg"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <!-- End Pagination -->
                        </div>
                    </div>

                    <!-- Labor Cost Section -->
                    <div id="labor-cost" class="col-span-3 hidden">
                        <div class="bg-white shadow-md rounded-lg p-4 w-full">
                            <h3 class="text-sm font-semibold mb-2 text-center">Labor Cost</h3>

                            <!-- Filter, Search -->
                            <div class="flex items-center justify-between mb-4 space-x-4">
                                <!-- Filter-->
                                <div class="relative md:w-1/4 w-full">
                                    <button id="filter-btn" class="bg-white border border-gray-200 p-1.5 rounded h-8 ml-2">
                                        <img src="{{ asset('images/img.png') }}" alt="Filter Icon" class="w-3 h-3 object-cover">
                                    </button>
                                    <div id="filter-options" class="absolute left-0 mt-2 w-32 bg-white border rounded shadow-lg z-50 hidden">
                                        <button class="block w-full text-left px-2 py-1 text-xs hover:bg-gray-100" data-role="all">All</button>
                                        <button class="block w-full text-left px-2 py-1 text-xs hover:bg-gray-100" data-role="admin">Admin</button>
                                        <button class="block w-full text-left px-2 py-1 text-xs hover:bg-gray-100" data-role="engineer">Engineer</button>
                                        <button class="block w-full text-left px-2 py-1 text-xs hover:bg-gray-100" data-role="viewer">Viewer</button>
                                    </div>
                                </div>
                                <!-- Search bar -->
                                <div class="flex justify-start"> <!-- Changed from justify-end to justify-start -->
                                    <!-- Search input -->
                                    <div class="relative flex items-center space-x-2 w-full sm:w-2/4 lg:w-1/4"> <!-- Width adjusts based on screen size -->
                                        <input id="search-input" type="text" placeholder="Search" class="ml-2 pl-10 py-1 border border-gray-300 bg-white h-7 px-5 pr-7 rounded-md text-xs focus:ring-green-500 focus:border-green-500 w-full sm:w-auto">
                                        <svg class="h-10 w-4 text-gray-400 dark:text-gray-300 absolute left-3 top-1/2 transform -translate-y-1/2" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24">
                                            <path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                        </svg>
                                    </div>
                                </div>
                            </div>

                            <!-- Table for Labor Costs -->
                            <div class="inline-block min-w-full py-2 align-middle sm:px-0 lg:px-2">
                                <div class="relative bg-white shadow rounded-lg">
                                    <table class="min-w-full table-fixed divide-y divide-gray-300 w-full">
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
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <!-- Pagination -->
                            <div class="flex items-center justify-between w-full px-3 mt-4">
                                <!-- Dropdown -->
                                <div class="relative">
                                    <select class="text-xs block appearance-none w-full bg-white border border-gray-300 text-gray-700 py-2 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                                        <option>3</option>
                                        <option>6</option>
                                        <option>9</option>
                                    </select>
                                </div>
                                <!-- Pagination Info and Controls -->
                                <div class="flex items-center space-x-4 text-gray-600 text-xs">

                                <span class="text-xs font-normal text-gray-500 dark:text-gray-400">
                                    Showing
                                    <span class="font-semibold text-black">1-10</span>
                                    of
                                    <span class="font-semibold text-black">1000</span>
                                </span>
                                    <div class="flex items-center space-x-4 text-xs">
                                        <a href="#" class="hover:text-black">1</a>
                                        <a href="#" class="hover:text-black">2</a>
                                        <a href="#" class="hover:text-black">3</a>
                                        <a href="#" class="hover:text-black">
                                            <i class="fas fa-angle-right text-lg"></i>
                                        </a>
                                        <a href="#" class="hover:text-black">
                                            <i class="fas fa-angle-double-right text-lg"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Pagination -->

                    <!-- Progress Circle Bar Section -->
                    <div class="bg-white rounded-lg shadow-md p-6">
                        <h3 class="text-xs font-semibold text-gray-800 mb-6 text-center">PROGRESS INFORMATION</h3>
                        <div class="flex flex-col items-center mb-6 justify-center ">
                            <div class="relative w-20 h-20">
                                <!-- SVG Progress Circle -->
                                <svg class="absolute top-0 left-0 w-full h-full" viewBox="0 0 36 36">
                                    <!-- Background Circle (Gray) -->
                                    <path class="text-gray-200" d="M18 2.0845
                                        a 15.9155 15.9155 0 0 1 0 31.831
                                        a 15.9155 15.9155 0 0 1 0 -31.831"
                                          fill="none" stroke-width="4" stroke="currentColor">
                                    </path>
                                    <!-- Foreground Circle (Progress Bar) -->
                                    <path id="circular-progress-1" class="text-green-500" d="M18 2.0845
                                        a 15.9155 15.9155 0 0 1 0 31.831
                                        a 15.9155 15.9155 0 0 1 0 -31.831"
                                          fill="none" stroke-width="4" stroke-dasharray="0, 100" stroke="currentColor">
                                    </path>
                                </svg>

                                <!-- Centered Percentage Text -->
                                <div class="absolute inset-0 flex items-center justify-center">
                                    <span id="progress-text-1" class="text-lg font-semibold text-gray-800">0%</span>
                                </div>
                            </div>
                            <p class="text-xs text-gray-500 mt-2 text-center">Overall POW Progress</p>
                        </div>

                        <div class="flex flex-col items-center mb-6">
                            <div class="relative w-20 h-20">
                                <svg class="absolute top-0 left-0 w-full h-full" viewBox="0 0 36 36">
                                    <path class="text-gray-200" d="M18 2.0845
                                        a 15.9155 15.9155 0 0 1 0 31.831
                                        a 15.9155 15.9155 0 0 1 0 -31.831"
                                          fill="none" stroke-width="4" stroke="currentColor">
                                    </path>
                                    <path id="circular-progress-2" class="text-pink-500" d="M18 2.0845
                                        a 15.9155 15.9155 0 0 1 0 31.831
                                        a 15.9155 15.9155 0 0 1 0 -31.831"
                                          fill="none" stroke-width="4" stroke-dasharray="0, 100" stroke="currentColor">
                                    </path>
                                </svg>
                                <div class="absolute inset-0 flex items-center justify-center">
                                    <span id="progress-text-2" class="text-lg font-semibold text-gray-800">0%</span>
                                </div>
                            </div>
                            <p class="text-center text-xs text-gray-500 mt-2">Material Cost Progress</p>
                        </div>

                        <div class="flex flex-col items-center mb-6">
                            <div class="relative w-20 h-20">
                                <svg class="absolute top-0 left-0 w-full h-full" viewBox="0 0 36 36">
                                    <path class="text-gray-200" d="M18 2.0845
                                        a 15.9155 15.9155 0 0 1 0 31.831
                                        a 15.9155 15.9155 0 0 1 0 -31.831"
                                          fill="none" stroke-width="4" stroke="currentColor">
                                    </path>
                                    <path id="circular-progress-3" class="text-blue-500" d="M18 2.0845
                                        a 15.9155 15.9155 0 0 1 0 31.831
                                        a 15.9155 15.9155 0 0 1 0 -31.831"
                                          fill="none" stroke-width="4" stroke-dasharray="0, 100" stroke="currentColor">
                                    </path>
                                </svg>
                                <div class="absolute inset-0 flex items-center justify-center">
                                    <span id="progress-text-3" class="text-lg font-semibold text-gray-800">0%</span>
                                </div>
                            </div>
                            <p class="text-center text-xs text-gray-500 mt-2">Labor Cost Progress</p>
                        </div>
                    </div>
                </div>
            </div>

            <script>
                // Tab Change Function
                function changeTab(event) {
                    const selectedTab = event.target.value;
                    changeTabTo(selectedTab);
                }

                function changeTabTo(tab) {
                    document.getElementById('materials').style.display = tab === 'materials' ? 'block' : 'none';
                    document.getElementById('labor-cost').style.display = tab === 'labor-cost' ? 'block' : 'none';

                    // Highlight active tab
                    document.getElementById('materials-tab').classList.toggle('border-green-600', tab === 'materials');
                    document.getElementById('materials-tab').classList.toggle('text-green-600', tab === 'materials');
                    document.getElementById('labor-cost-tab').classList.toggle('border-green-600', tab === 'labor-cost');
                    document.getElementById('labor-cost-tab').classList.toggle('text-green-600', tab === 'labor-cost');
                }

                //CIRCULAR PROGRESS BAR
                function updateCircularProgress(id, value) {
                    const circle = document.getElementById(`circular-progress-${id}`);
                    const text = document.getElementById(`progress-text-${id}`);

                    // Calculate stroke-dasharray for the circular progress
                    const strokeValue = (value / 100) * 100;
                    circle.setAttribute('stroke-dasharray', `${strokeValue}, 100`);

                    // Update percentage inside the circle
                    text.textContent = `${value}%`;
                }

                // Update progress for each bar
                updateCircularProgress(1, 80); // Overall POW Progress
                updateCircularProgress(2, 50); // Material Cost Progress
                updateCircularProgress(3, 100); // Labor Cost Progress
            </script>
        </div>
    </x-slot>
</x-app-layout>

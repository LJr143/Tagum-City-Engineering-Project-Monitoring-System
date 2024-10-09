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

                <div class="container mx-auto p-2">
                    <div class="container mx-auto p-2">
                        <!-- Project Header -->
                        <div class="flex flex-col items-end space-y-2 w-full">
                            <div class="flex space-x-2">
                                <button onclick="openSaveModal()" class="bg-green-600 text-white text-xs px-4 py-2 rounded shadow-md hover:bg-green-700 focus:outline-none flex items-center space-x-2">
                                    <span>Save Changes</span>
                                    <svg width="15" height="15" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M21 7L17 3L14 6L8 12V16H12L18 10L21 7Z" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M14 6L18 10" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M10 4H4V20H20V14" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </button>

                            </div>
                        </div>
                        <div>
                            <span class="bg-green-600 text-white px-3 py-1 rounded text-xs ">
                                Ref: #12345
                            </span>

                        <h3 class="text-base pb-3 font-semibold leading-6 text-gray-900 mt-3 mb-5">POW 1</h3>
                    </div>
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
                                                        <button onclick="openEditModal()" class="px-1 py-0.5 bg-white border border-gray-300 rounded-md hover:bg-gray-300 text-xs">
                                                            <!-- Edit Icon -->
                                                            <svg width="20" height="20" viewBox="0 0 29 29" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <mask id="mask0_1085_11871" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="2" y="2" width="25" height="25">
                                                                    <rect x="2.5" y="2.5" width="24" height="24" fill="#D9D9D9" />
                                                                </mask>
                                                                <g mask="url(#mask0_1085_11871)">
                                                                    <path d="M7.49997 21.5H8.7615L18.9981 11.2634L17.7366 10.0019L7.49997 20.2385V21.5ZM6.90385 23C6.64777 23 6.43311 22.9133 6.25987 22.7401C6.08662 22.5668 6 22.3522 6 22.0961V20.3635C6 20.1196 6.0468 19.8871 6.1404 19.6661C6.23398 19.4451 6.36282 19.2526 6.52692 19.0885L19.1904 6.43078C19.3416 6.29343 19.5086 6.18729 19.6913 6.11237C19.874 6.03746 20.0656 6 20.2661 6C20.4666 6 20.6608 6.03558 20.8488 6.10675C21.0368 6.1779 21.2032 6.29103 21.348 6.44615L22.5692 7.68268C22.7243 7.82754 22.8349 7.99424 22.9009 8.18278C22.9669 8.37129 23 8.55981 23 8.74833C23 8.94941 22.9656 9.14131 22.8969 9.32403C22.8283 9.50676 22.719 9.67373 22.5692 9.82495L9.91147 22.473C9.74738 22.6371 9.55483 22.766 9.33383 22.8596C9.11281 22.9532 8.88037 23 8.6365 23H6.90385ZM18.3563 10.6437L17.7366 10.0019L18.9981 11.2634L18.3563 10.6437Z" fill="#35353A" />
                                                                </g>
                                                            </svg>
                                                        </button>
                                                        <button onclick="openDeleteModal()" class="px-1 py-0.5 bg-white border border-gray-300 rounded-md hover:bg-gray-300 text-xs">
                                                            <!-- Delete Icon -->
                                                            <svg width="20" height="20" viewBox="0 0 29 29" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <mask id="mask0_1085_11873" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="2" y="2" width="25" height="25">
                                                                    <rect x="2.5" y="2.5" width="24" height="24" fill="#D9D9D9" />
                                                                </mask>
                                                                <g mask="url(#mask0_1085_11873)">
                                                                    <path d="M9.8077 23C9.31058 23 8.88502 22.823 8.53102 22.469C8.17701 22.115 8 21.6894 8 21.1923V8.50005H7.75C7.5375 8.50005 7.35938 8.42814 7.21563 8.28433C7.07188 8.14053 7 7.96233 7 7.74973C7 7.53715 7.07188 7.35906 7.21563 7.21548C7.35938 7.07188 7.5375 7.00008 7.75 7.00008H11.5C11.5 6.75521 11.5862 6.54656 11.7586 6.37413C11.9311 6.2017 12.1397 6.11548 12.3846 6.11548H16.6154C16.8602 6.11548 17.0689 6.2017 17.2413 6.37413C17.4138 6.54656 17.5 6.75521 17.5 7.00008H21.25C21.4625 7.00008 21.6406 7.07199 21.7843 7.2158C21.9281 7.35962 22 7.53782 22 7.7504C22 7.963 21.9281 8.1411 21.7843 8.28468C21.6406 8.42826 21.4625 8.50005 21.25 8.50005H21V21.1923C21 21.6894 20.8229 22.115 20.4689 22.469C20.1149 22.823 19.6894 23 19.1922 23H9.8077ZM19.5 8.50005H9.49997V21.1923C9.49997 21.2821 9.52883 21.3558 9.58652 21.4135C9.64422 21.4712 9.71795 21.5001 9.8077 21.5001H19.1922C19.282 21.5001 19.3557 21.4712 19.4134 21.4135C19.4711 21.3558 19.5 21.2821 19.5 21.1923V8.50005ZM12.6542 19.5001C12.8668 19.5001 13.0448 19.4282 13.1884 19.2844C13.332 19.1407 13.4038 18.9626 13.4038 18.7501V11.25C13.4038 11.0375 13.3319 10.8594 13.1881 10.7157C13.0443 10.5719 12.8661 10.5001 12.6535 10.5001C12.4409 10.5001 12.2628 10.5719 12.1192 10.7157C11.9756 10.8594 11.9039 11.0375 11.9039 11.25V18.7501C11.9039 18.9626 11.9758 19.1407 12.1196 19.2844C12.2634 19.4282 12.4416 19.5001 12.6542 19.5001ZM16.3464 19.5001C16.559 19.5001 16.7371 19.4282 16.8807 19.2844C17.0243 19.1407 17.0961 18.9626 17.0961 18.7501V11.25C17.0961 11.0375 17.0242 10.8594 16.8804 10.7157C16.7366 10.5719 16.5584 10.5001 16.3458 10.5001C16.1332 10.5001 15.9552 10.5719 15.8116 10.7157C15.6679 10.8594 15.5961 11.0375 15.5961 11.25V18.7501C15.5961 18.9626 15.668 19.1407 15.8118 19.2844C15.9555 19.4282 16.1337 19.5001 16.3464 19.5001Z" fill="#35353A" />
                                                                </g>
                                                            </svg>
                                                        </button>
                                                    </td>
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
                                <div class="bg-white shadow-md rounded-lg p-4">
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
                                        <!-- Search bar and Button-->
                                        <div class="flex justify-start"> <!-- Changed from justify-end to justify-start -->
                                            <!-- Search input -->
                                            <button id="open-modal" class="bg-green-700 text-white rounded-lg px-2 py-1 shadow-md text-xs hover:bg-green-800 transition-colors duration-300">Add Payroll</button>
                                            <div class="relative flex items-center space-x-2 w-full sm:w-2/4 lg:w-1/4"> <!-- Width adjusts based on screen size -->
                                                <input id="search-input" type="text" placeholder="Search" class="ml-2 pl-10 py-1 border border-gray-300 bg-white h-7 px-5 pr-7 rounded-md text-xs focus:ring-green-500 focus:border-green-500 w-full sm:w-auto">
                                                <svg class="h-10 w-4 text-gray-400 dark:text-gray-300 absolute left-3 top-1/2 transform -translate-y-1/2" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24">
                                                    <path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                                </svg>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End of filter and search -->

                                    <!-- Table for Material Costs -->
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
                                                    <td class="whitespace-nowrap px-2 py-4 flex space-x-2">
                                                        <button onclick="openEditModal()" class="px-1 py-0.5 bg-white border border-gray-300 rounded-md hover:bg-gray-300 text-xs">
                                                            <!-- Edit Icon -->
                                                            <svg width="20" height="20" viewBox="0 0 29 29" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <mask id="mask0_1085_11871" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="2" y="2" width="25" height="25">
                                                                    <rect x="2.5" y="2.5" width="24" height="24" fill="#D9D9D9" />
                                                                </mask>
                                                                <g mask="url(#mask0_1085_11871)">
                                                                    <path d="M7.49997 21.5H8.7615L18.9981 11.2634L17.7366 10.0019L7.49997 20.2385V21.5ZM6.90385 23C6.64777 23 6.43311 22.9133 6.25987 22.7401C6.08662 22.5668 6 22.3522 6 22.0961V20.3635C6 20.1196 6.0468 19.8871 6.1404 19.6661C6.23398 19.4451 6.36282 19.2526 6.52692 19.0885L19.1904 6.43078C19.3416 6.29343 19.5086 6.18729 19.6913 6.11237C19.874 6.03746 20.0656 6 20.2661 6C20.4666 6 20.6608 6.03558 20.8488 6.10675C21.0368 6.1779 21.2032 6.29103 21.348 6.44615L22.5692 7.68268C22.7243 7.82754 22.8349 7.99424 22.9009 8.18278C22.9669 8.37129 23 8.55981 23 8.74833C23 8.94941 22.9656 9.14131 22.8969 9.32403C22.8283 9.50676 22.719 9.67373 22.5692 9.82495L9.91147 22.473C9.74738 22.6371 9.55483 22.766 9.33383 22.8596C9.11281 22.9532 8.88037 23 8.6365 23H6.90385ZM18.3563 10.6437L17.7366 10.0019L18.9981 11.2634L18.3563 10.6437Z" fill="#35353A" />
                                                                </g>
                                                            </svg>
                                                        </button>
                                                        <button onclick="openDeleteModal()" class="px-1 py-0.5 bg-white border border-gray-300 rounded-md hover:bg-gray-300 text-xs">
                                                            <!-- Delete Icon -->
                                                            <svg width="20" height="20" viewBox="0 0 29 29" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <mask id="mask0_1085_11873" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="2" y="2" width="25" height="25">
                                                                    <rect x="2.5" y="2.5" width="24" height="24" fill="#D9D9D9" />
                                                                </mask>
                                                                <g mask="url(#mask0_1085_11873)">
                                                                    <path d="M9.8077 23C9.31058 23 8.88502 22.823 8.53102 22.469C8.17701 22.115 8 21.6894 8 21.1923V8.50005H7.75C7.5375 8.50005 7.35938 8.42814 7.21563 8.28433C7.07188 8.14053 7 7.96233 7 7.74973C7 7.53715 7.07188 7.35906 7.21563 7.21548C7.35938 7.07188 7.5375 7.00008 7.75 7.00008H11.5C11.5 6.75521 11.5862 6.54656 11.7586 6.37413C11.9311 6.2017 12.1397 6.11548 12.3846 6.11548H16.6154C16.8602 6.11548 17.0689 6.2017 17.2413 6.37413C17.4138 6.54656 17.5 6.75521 17.5 7.00008H21.25C21.4625 7.00008 21.6406 7.07199 21.7843 7.2158C21.9281 7.35962 22 7.53782 22 7.7504C22 7.963 21.9281 8.1411 21.7843 8.28468C21.6406 8.42826 21.4625 8.50005 21.25 8.50005H21V21.1923C21 21.6894 20.8229 22.115 20.4689 22.469C20.1149 22.823 19.6894 23 19.1922 23H9.8077ZM19.5 8.50005H9.49997V21.1923C9.49997 21.2821 9.52883 21.3558 9.58652 21.4135C9.64422 21.4712 9.71795 21.5001 9.8077 21.5001H19.1922C19.282 21.5001 19.3557 21.4712 19.4134 21.4135C19.4711 21.3558 19.5 21.2821 19.5 21.1923V8.50005ZM12.6542 19.5001C12.8668 19.5001 13.0448 19.4282 13.1884 19.2844C13.332 19.1407 13.4038 18.9626 13.4038 18.7501V11.25C13.4038 11.0375 13.3319 10.8594 13.1881 10.7157C13.0443 10.5719 12.8661 10.5001 12.6535 10.5001C12.4409 10.5001 12.2628 10.5719 12.1192 10.7157C11.9756 10.8594 11.9039 11.0375 11.9039 11.25V18.7501C11.9039 18.9626 11.9758 19.1407 12.1196 19.2844C12.2634 19.4282 12.4416 19.5001 12.6542 19.5001ZM16.3464 19.5001C16.559 19.5001 16.7371 19.4282 16.8807 19.2844C17.0243 19.1407 17.0961 18.9626 17.0961 18.7501V11.25C17.0961 11.0375 17.0242 10.8594 16.8804 10.7157C16.7366 10.5719 16.5584 10.5001 16.3458 10.5001C16.1332 10.5001 15.9552 10.5719 15.8116 10.7157C15.6679 10.8594 15.5961 11.0375 15.5961 11.25V18.7501C15.5961 18.9626 15.668 19.1407 15.8118 19.2844C15.9555 19.4282 16.1337 19.5001 16.3464 19.5001Z" fill="#35353A" />
                                                                </g>
                                                            </svg>
                                                        </button>

                                                    </td>
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
                            <!-- End of Progress bar -->
                        </div>

                        <!-- Modal for Edit Item -->
                        <div id="edit-modal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden z-50">
                            <div class="bg-white rounded-lg shadow-lg p-6 w-96">
                                <h2 class="text-lg font-semibold mb-4" id="edit-modal-title">Edit Item</h2>
                                <div id="edit-modal-content">
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
                                </div>
                                <div class="flex justify-end mt-4">
                                    <button onclick="closeEditModal()" class="px-4 py-1 bg-white border border-gray-300 rounded-md text-xs hover:bg-gray-300">Cancel</button>
                                    <button id="edit-modal-confirm" onclick="confirmEditAction()" class="ml-2 px-4 py-2 bg-green-600 text-white rounded-md hover:bg-green-700 text-xs">Confirm</button>
                                </div>
                            </div>
                        </div>
                        <!-- Modal for Adding Payroll -->
                        <div id="modal" class="fixed inset-0 bg-gray-800 bg-opacity-50 flex items-center justify-center z-50 hidden">
                            <div class="bg-white rounded-md shadow-lg p-6 w-1/3">
                                <!-- Payroll Title -->
                                <h2 class="text-sm font-semibold mb-4">Add Payroll</h2>

                                <!-- Payroll Title Field -->
                                <label for="payroll-title" class="text-xs font-semibold mb-2 block">Payroll</label>
                                <input id="payroll-title" type="text" placeholder="Payroll Title" class="border border-gray-300 text-xs rounded-lg px-4 py-2 w-full mb-4">

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

                        <!-- Modal for Delete Item -->
                        <div id="delete-modal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden z-50">
                            <div class="bg-white rounded-lg shadow-lg p-6 w-1/3">
                                <div class="flex items-center mb-2">
                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg" class="mr-2">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M8.4845 2.49512C9.15808 1.32845 10.842 1.32845 11.5156 2.49512L17.7943 13.3701C18.4678 14.5368 17.6259 15.9951 16.2787 15.9951H3.72136C2.37421 15.9951 1.53224 14.5368 2.20582 13.3701L8.4845 2.49512ZM10 5.00012C10.4142 5.00012 10.75 5.33591 10.75 5.75012V9.25012C10.75 9.66434 10.4142 10.0001 10 10.0001C9.58579 10.0001 9.25 9.66434 9.25 9.25012L9.25 5.75012C9.25 5.33591 9.58579 5.00012 10 5.00012ZM10 14.0001C10.5523 14.0001 11 13.5524 11 13.0001C11 12.4478 10.5523 12.0001 10 12.0001C9.44772 12.0001 9 12.4478 9 13.0001C9 13.5524 9.44772 14.0001 10 14.0001Z" fill="#CA383A"/>
                                    </svg>
                                    <h2 class="text-sm font-semibold text-red-500">Delete Item</h2>
                                </div>
                                <p class="text-xs mb-4">Are you sure you want to remove this item? This process cannot be undone.</p>
                                <div class="flex justify-end">
                                    <button id="delete-cancel-button" onclick="closeDeleteModal()" class="bg-white border border-gray-300 text-gray-700 rounded-md text-xs px-4 py-2 hover:bg-gray-400">
                                        Cancel
                                    </button>
                                    <button id="delete-modal-confirm" onclick="confirmDeleteAction()" class="bg-red-500 text-white rounded-md px-4 py-2 text-xs hover:bg-red-600 ml-2">
                                        Delete
                                    </button>
                                </div>
                            </div>
                        </div>
                        <!-- Save Modal -->
                        <div id="save-modal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden z-50">
                            <div class="bg-white rounded-lg shadow-lg p-6 w-1/3">
                                <div class="flex items-center mb-2">
                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg" class="mr-2">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M3 3h14v14H3V3z" fill="#4F46E5"/>
                                    </svg>
                                    <h2 class="text-sm font-semibold text-gray-800">Save Changes</h2>
                                </div>
                                <p class="text-xs mb-4">Are you sure you want to save these changes? This action cannot be undone.</p>
                                <div class="flex justify-end">
                                    <button id="save-cancel-button" onclick="closeSaveModal()" class="bg-white border border-gray-300 text-gray-700 rounded-md text-xs px-4 py-2 hover:bg-gray-400">
                                        Cancel
                                    </button>
                                    <button id="save-modal-confirm" onclick="confirmSaveAction()" class="bg-green-600 text-white rounded-md px-4 py-2 text-xs hover:bg-green-700 ml-2">
                                        Save
                                    </button>
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

                        // Modal Management Functions
                        function openEditModal() {
                            document.getElementById('edit-modal').classList.remove('hidden');
                        }

                        function closeEditModal() {
                            document.getElementById('edit-modal').classList.add('hidden');
                        }

                        function confirmEditAction() {
                            // Handle edit confirmation logic here
                            closeEditModal();
                        }

                        function openDeleteModal() {
                            document.getElementById('delete-modal').classList.remove('hidden');
                        }

                        function closeDeleteModal() {
                            document.getElementById('delete-modal').classList.add('hidden');
                        }

                        function confirmDeleteAction() {
                            // Handle delete confirmation logic here
                            closeDeleteModal();
                        }

                        // Modal for Adding Payroll
                        const modal = document.getElementById('modal');
                        const openModalButton = document.getElementById('open-modal');
                        const closeModalButton = document.getElementById('close-modal');

                        // Function to open modal
                        openModalButton.onclick = function() {
                            modal.classList.remove('hidden'); // Show modal
                        };

                        // Function to close modal
                        closeModalButton.onclick = function() {
                            modal.classList.add('hidden'); // Hide modal
                        };

                        // Close modal when clicking outside of it
                        window.onclick = function(event) {
                            if (event.target === modal) {
                                modal.classList.add('hidden'); // Hide modal
                            }
                        };
                        // Function to open the Save modal
                        function openSaveModal() {
                            document.getElementById("save-modal").classList.remove("hidden");
                        }

                        // Function to close the Save modal
                        function closeSaveModal() {
                            document.getElementById("save-modal").classList.add("hidden");
                        }

                        // Function to confirm Save action
                        function confirmSaveAction() {
                            // Add your save logic here
                            closeSaveModal();
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
                        //End for progress bar

                    </script>
                </div>
            </main>
        </div>
    </x-slot>
</x-app-layout>

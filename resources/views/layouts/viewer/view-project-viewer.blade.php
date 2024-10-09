
<x-app-layout mainClass="flex" headerClass="shadow-[0px_1px_2px_-1px_rgba(0,0,0,0.1)] ">

    <x-slot name="sidebar">
        <x-sidebar></x-sidebar>
    </x-slot>

    <x-slot name="header">
        <x-header></x-header>
    </x-slot>

    <x-slot name="main">

            <h2 class="text-base font-semibold leading-6 text-gray-900 mb-5">
                PROJECTS
            </h2>

        <livewire:project-filter/>

      <!--   <div class="bg-white p-6 rounded-lg shadow-md"> -->
        <!-- Search bar -->
        <div class="flex justify-start mb-4"> <!-- Changed from justify-end to justify-start -->
            <!-- Search input and button -->
            <div class="relative flex items-center space-x-2 w-full sm:w-1/2 lg:w-1/3"> <!-- Width adjusts based on screen size -->
                <input id="search-input" type="text" placeholder="Search" class="ml-2 pl-10 py-1 border-2 border-gray-300 bg-white h-8 px-5 pr-16 rounded-lg text-xs focus:ring-green-500 focus:border-green-500 w-full sm:w-auto">
                <svg class="h-10 w-4 text-gray-400 dark:text-gray-300 absolute left-3 top-1/2 transform -translate-y-1/2" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24">
                    <path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                </svg>
            </div>
        </div>




        <div class="grid grid-cols-1 sm:grid-cols-1 lg:grid-cols-2 xl:grid-cols-3 gap-6 ml-2" id="projectGrid">

                <!-- Project Card for ON PROGRESS -->
             <div class="bg-white p-5 rounded-lg shadow project-card hover:-translate-y-1 transition-transform duration-300 ease-in-out hover:shadow-lg" data-created="2024-08-18">
                 <a href="{{ route('view-specific-project-viewer') }}">
                <div class="flex justify-between items-center mb-3">
                  <span class="bg-yellow-200 text-yellow-800 text-xs font-semibold px-2.5 py-0.5 rounded project-status">
                   On Progress
                  </span>

                </div>
                <img alt="Image of Pandapan Road Embankment" class="w-full h-40 object-cover rounded mb-4" height="400" src="https://storage.googleapis.com/a1aa/image/I9U6O4GmQ1ohP1E1KNpHAfHewtyPG0yxzxWCvzvpezPi8LInA.jpg" width="600"/>
                    <div>
                    <span class="bg-green-600 text-white px-3 py-1 rounded text-xs ">
                        Ref: #PRJ.2023-08-56789
                    </span>
                    </div>
                    <h3 class="text-lg font-semibold text-black project-title mt-2">
                        Road Construction
                    </h3>

                    <p class="text-xs font-semibold text-gray-500 mb-1">
                        <i class="fas fa-calendar-alt mr-1"></i>
                        Created on Aug 18, 2023
                    </p>
                    <p class="text-xs font-semibold text-gray-500 mb-2 project-address">
                        <i class="fas fa-map-marker-alt mr-1 "></i>
                        Rizal Street, Magugpo East, Tagum City
                    </p>
                    <p class="text-xs font-semibold text-gray-500 mb-2 mt-2 project-amount">
                        <i class="fas fa-coins mr-1"></i>
                        Project Cost: P 1,000,000.00
                    </p>
                    <!-- Progress Bar Section -->
                    <div class="w-full bg-gray-200 rounded-full h-2.5 mt-3">
                        <div class="bg-yellow-500 h-2.5 rounded-full" style="width: 25%"></div>
                    </div>
                    <p class="text-xs text-gray-500 mt-2 mb-4 project-percentage">Project Progress: 25%</p>

                    <div class="flex items-center justify-between mb-2">
                    <div class="flex items-center">
                        <img alt="Engineer" class="rounded-full mr-2" src="https://placehold.co/30x30"/>
                        <div>
                            <p class="text-sm font-medium project-engineer">
                                Jane Williams
                            </p>
                            <p class="text-xs text-gray-500">
                                Engineer
                            </p>
                        </div>
                    </div>
                </div>
                    </a>
             </div>

            <!-- Project Card for PENDING -->
            <div class="bg-white p-5 rounded-lg shadow project-card hover:-translate-y-1 transition-transform duration-300 ease-in-out hover:shadow-lg" data-created="2024-08-18">
                <a href="{{ route('view-specific-project-viewer') }}">
                    <div class="flex justify-between items-center mb-3">
                        <span class="bg-gray-200 text-gray-800 text-xs font-semibold px-2.5 py-0.5 rounded project-status">
                            Pending
                        </span>
                    </div>
                <img alt="Image of Pandapan Road Embankment" class="w-full h-40 object-cover rounded mb-4" height="400" src="https://storage.googleapis.com/a1aa/image/I9U6O4GmQ1ohP1E1KNpHAfHewtyPG0yxzxWCvzvpezPi8LInA.jpg" width="600"/>
                    <div>
                    <span class="bg-green-600 text-white px-3 py-1 rounded text-xs ">
                        Ref: #PRJ.2023-08-56789
                    </span>
                    </div>
                    <h3 class="text-lg font-semibold text-black project-title mt-2">
                        Road Construction
                    </h3>

                    <p class="text-xs font-semibold text-gray-500 mb-1">
                        <i class="fas fa-calendar-alt mr-1"></i>
                        Created on Aug 18, 2023
                    </p>
                    <p class="text-xs font-semibold text-gray-500 mb-2 project-address">
                        <i class="fas fa-map-marker-alt mr-1 "></i>
                        Rizal Street, Magugpo East, Tagum City
                    </p>

                    <p class="text-xs font-semibold text-gray-500 mb-2 mt-2 project-amount">
                        <i class="fas fa-coins mr-1"></i>
                        Project Cost: P 1,000,000.00
                    </p>
                    <!-- Progress Bar Section -->
                    <div class="w-full bg-gray-200 rounded-full h-2.5 mt-3">
                        <div class="bg-green-500 h-2.5 rounded-full" style="width: 0%"></div>
                    </div>
                    <p class="text-xs text-gray-500 mt-2 mb-4 project-percentage">Project Progress: 0%</p>

                <div class="flex items-center justify-between mb-2 ">
                    <div class="flex items-center ">
                        <img alt="Engineer" class="rounded-full mr-2" src="https://placehold.co/30x30"/>
                        <div>
                            <p class="text-sm font-medium project-engineer">
                                Jane Williams
                            </p>
                            <p class="text-xs text-gray-500">
                                Engineer
                            </p>
                        </div>
                    </div>
                </div>
                </a>
            </div>


            <!-- Project Card for COMPLETED -->
            <div class="bg-white p-5 rounded-lg shadow project-card hover:-translate-y-1 transition-transform duration-300 ease-in-out hover:shadow-lg" data-created="2024-07-18">
                <a href="{{ route('view-specific-project-viewer') }}">
                <div class="flex justify-between items-center mb-3">
                    <span class="bg-green-200 text-green-800 text-xs font-semibold px-2.5 py-0.5 rounded project-status">
                        Completed
                    </span>
                </div>
                    <img alt="Image of Pandapan Road Embankment" class="w-full h-40 object-cover rounded mb-4" height="400" src="https://storage.googleapis.com/a1aa/image/I9U6O4GmQ1ohP1E1KNpHAfHewtyPG0yxzxWCvzvpezPi8LInA.jpg" width="600"/>
                    <div>
                    <span class="bg-green-600 text-white px-3 py-1 rounded text-xs ">
                        Ref: #PRJ.2023-08-56789
                    </span>
                </div>
                <h3 class="text-lg font-semibold text-black project-title mt-2">
                    Road Construction
                </h3>

                <p class="text-xs font-semibold text-gray-500 mb-1">
                    <i class="fas fa-calendar-alt mr-1"></i>
                    Created on Aug 18, 2023
                </p>
                <p class="text-xs font-semibold text-gray-500 mb-2 project-address">
                    <i class="fas fa-map-marker-alt mr-1 "></i>
                    Rizal Street, Magugpo East, Tagum City
                </p>

                <p class="text-xs font-semibold text-gray-500 mb-2 mt-2 project-amount">
                    <i class="fas fa-coins mr-1"></i>
                    Project Cost: P 1,000,000.00
                </p>
                <!-- Progress Bar Section -->
                <div class="w-full bg-gray-200 rounded-full h-2.5 mt-3">
                    <div class="bg-green-500 h-2.5 rounded-full" style="width: 100%;"></div>
                </div>
                <p class="text-xs text-gray-500 mt-2 mb-4 project-percentage">Project Progress: 100%</p>


                <div class="flex items-center justify-between mb-2">
                    <div class="flex items-center">
                        <img alt="Engineer" class="rounded-full mr-2" src="https://placehold.co/30x30"/>
                        <div>
                            <p class="text-sm font-medium project-engineer">
                                Jane Williams
                            </p>
                            <p class="text-xs text-gray-500">
                                Engineer
                            </p>
                        </div>
                    </div>
                </div>
                </a>
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
                    <div>
                        Showing 1-10 of 30 items
                    </div>
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


        <!-- </div> -->

    </x-slot>
</x-app-layout>




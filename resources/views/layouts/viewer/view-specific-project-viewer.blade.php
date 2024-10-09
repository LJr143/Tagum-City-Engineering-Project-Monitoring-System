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
                <p class="ml-8 text-xs font-semibold">Address:
                    <span class="ml-2 text-black">Rizal Street, Barangay Magugpo East, Tagum City, Davao del Norte, Philippines</span>
                </p>
                <p class="ml-8 text-xs text-green-700">Date created:
                    <span class="ml-2 text-black">20/08/2022</span>
                </p>
                <p class="ml-8 text-xs font-semibold">Project Cost: 1,0000
                    <span class="ml-4 font-semibold">Engineer: Jane Williams</span>
                </p>
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
                            <!-- Search bar -->
                            <div class="flex justify-start"> <!-- Changed from justify-end to justify-start -->
                                <!-- Search input -->
                                <div class="relative flex items-center space-x-2 w-full sm:w-2/4 lg:w-1/4"> <!-- Width adjusts based on screen size -->
                                    <input id="search-input" type="text" placeholder="Search" class="ml-2 pl-10 py-1 border border-gray-300 bg-white h-8 px-5 pr-7 rounded-md text-xs focus:ring-green-500 focus:border-green-500 w-full sm:w-auto">
                                    <svg class="h-10 w-4 text-gray-400 dark:text-gray-300 absolute left-3 top-1/2 transform -translate-y-1/2" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24">
                                        <path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>

                        <!-- Cards Display -->
                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                            @for ($i = 0; $i < 6; $i++)
                                <a href="{{ route('view-pow-viewer') }}" class="bg-white p-6 rounded-lg shadow-md block transform transition-transform duration-300 hover:scale-105 hover:shadow-lg">
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
                        <div class="flex items-center justify-between w-full px-0 mt-4">
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
            </main>
        </div> <!-- End of Road Construction Card -->
    </x-slot>
</x-app-layout>

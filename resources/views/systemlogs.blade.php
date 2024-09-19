<x-app-layout mainClass="flex" headerClass="shadow-[0px_1px_2px_-1px_rgba(0,0,0,0.1)] ">
    {{-- SIDEBAR --}}
    <x-slot name="sidebar" class="w-64 bg-gray-200 min-h-screen">
        <x-sidebar></x-sidebar>

    </x-slot>
    {{-- HEADER --}}

    <x-slot name="header">
        <x-header></x-header>
    </x-slot>

    {{-- MAIN CONTENT --}}

    <x-slot name="main">
        <!-- component -->
        <h1 class="text-2xl text-gray-600">System Logs</h1>


        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <div class="flex flex-column sm:flex-row flex-wrap space-y-4 sm:space-y-0 items-center justify-between pb-4">
                <div class="mr-32 ">
                    <button wire:click="exportExcel" class="">
                        <svg width="55" height="44" viewBox="0 0 55 44" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g filter="url(#filter0_dd_356_13067)">
                                <rect x="1" y="1" width="53" height="41" rx="6" fill="white" />
                                <path d="M29.625 11.7695V15.9001C29.625 16.4601 29.625 16.7401 29.7408 16.9541C29.8427 17.1422 30.0052 17.2952 30.2051 17.3911C30.4324 17.5001 30.7299 17.5001 31.325 17.5001H35.7137M24.3125 24.5L27.5 27.5M27.5 27.5L30.6875 24.5M27.5 27.5L27.5 21.5M29.625 11.5H24.1C22.3148 11.5 21.4222 11.5 20.7404 11.827C20.1406 12.1146 19.653 12.5735 19.3474 13.138C19 13.7798 19 14.6198 19 16.3V26.7C19 28.3802 19 29.2202 19.3474 29.862C19.653 30.4265 20.1406 30.8854 20.7404 31.173C21.4222 31.5 22.3148 31.5 24.1 31.5H30.9C32.6852 31.5 33.5778 31.5 34.2596 31.173C34.8594 30.8854 35.347 30.4265 35.6526 29.862C36 29.2202 36 28.3802 36 26.7V17.5L29.625 11.5Z" stroke="#534D59" stroke-width="1.8625" stroke-linecap="round" stroke-linejoin="round" />
                            </g>
                            <defs>
                                <filter id="filter0_dd_356_13067" x="0" y="0" width="55" height="44" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                    <feFlood flood-opacity="0" result="BackgroundImageFix" />
                                    <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha" />
                                    <feMorphology radius="1" operator="dilate" in="SourceAlpha" result="effect1_dropShadow_356_13067" />
                                    <feOffset />
                                    <feColorMatrix type="matrix" values="0 0 0 0 0.27451 0 0 0 0 0.308497 0 0 0 0 0.376471 0 0 0 0.16 0" />
                                    <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_356_13067" />
                                    <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha" />
                                    <feOffset dy="1" />
                                    <feGaussianBlur stdDeviation="0.5" />
                                    <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.1 0" />
                                    <feBlend mode="normal" in2="effect1_dropShadow_356_13067" result="effect2_dropShadow_356_13067" />
                                    <feBlend mode="normal" in="SourceGraphic" in2="effect2_dropShadow_356_13067" result="shape" />
                                </filter>
                            </defs>
                        </svg>


                        <!-- <svg width=" 19" height="22" viewBox="0 0 19 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M11.625 1.26953V5.40007C11.625 5.96012 11.625 6.24015 11.7408 6.45406C11.8427 6.64222 12.0052 6.7952 12.2051 6.89108C12.4324 7.00007 12.7299 7.00007 13.325 7.00007H17.7137M6.3125 14L9.5 17M9.5 17L12.6875 14M9.5 17L9.5 11M11.625 1H6.1C4.31483 1 3.42225 1 2.74041 1.32698C2.14064 1.6146 1.65301 2.07354 1.34742 2.63803C1 3.27976 1 4.11984 1 5.8V16.2C1 17.8802 1 18.7202 1.34742 19.362C1.65301 19.9265 2.14064 20.3854 2.74041 20.673C3.42225 21 4.31483 21 6.1 21H12.9C14.6852 21 15.5778 21 16.2596 20.673C16.8594 20.3854 17.347 19.9265 17.6526 19.362C18 18.7202 18 17.8802 18 16.2V7L11.625 1Z" stroke="#534D59" stroke-width="1.8625" stroke-linecap="round" stroke-linejoin="round" />
                        </svg> -->
                    </button>
                    <button>
                        <svg width="55" height="44" viewBox="0 0 55 44" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g filter="url(#filter0_dd_356_13068)">
                                <rect x="1" y="1" width="53" height="41" rx="6" fill="white" />
                                <path d="M34.5 13.5H20.5C19.3954 13.5 18.5 14.3954 18.5 15.5V29.5C18.5 30.6046 19.3954 31.5 20.5 31.5H34.5C35.6046 31.5 36.5 30.6046 36.5 29.5V15.5C36.5 14.3954 35.6046 13.5 34.5 13.5Z" stroke="#534D59" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M31.5 11.5V15.5" stroke="#534D59" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M23.5 11.5V15.5" stroke="#534D59" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M18.5 19.5H36.5" stroke="#534D59" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </g>
                            <defs>
                                <filter id="filter0_dd_356_13068" x="0" y="0" width="55" height="44" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                    <feFlood flood-opacity="0" result="BackgroundImageFix" />
                                    <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha" />
                                    <feMorphology radius="1" operator="dilate" in="SourceAlpha" result="effect1_dropShadow_356_13068" />
                                    <feOffset />
                                    <feColorMatrix type="matrix" values="0 0 0 0 0.27451 0 0 0 0 0.308497 0 0 0 0 0.376471 0 0 0 0.16 0" />
                                    <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_356_13068" />
                                    <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha" />
                                    <feOffset dy="1" />
                                    <feGaussianBlur stdDeviation="0.5" />
                                    <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.1 0" />
                                    <feBlend mode="normal" in2="effect1_dropShadow_356_13068" result="effect2_dropShadow_356_13068" />
                                    <feBlend mode="normal" in="SourceGraphic" in2="effect2_dropShadow_356_13068" result="shape" />
                                </filter>
                            </defs>
                        </svg>

                        <!-- <svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M19.5 4.5H5.5C4.39543 4.5 3.5 5.39543 3.5 6.5V20.5C3.5 21.6046 4.39543 22.5 5.5 22.5H19.5C20.6046 22.5 21.5 21.6046 21.5 20.5V6.5C21.5 5.39543 20.6046 4.5 19.5 4.5Z" stroke="#534D59" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M16.5 2.5V6.5" stroke="#534D59" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M8.5 2.5V6.5" stroke="#534D59" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M3.5 10.5H21.5" stroke="#534D59" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg> -->
                    </button>


                    <!-- <button id="dropdownRadioButton" data-dropdown-toggle="dropdownRadio" class="inline-flex items-center text-gray-500 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-3 py-1.5   dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700" type="button">
                        <svg class="w-3 h-3 text-gray-500 dark:text-gray-400 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm3.982 13.982a1 1 0 0 1-1.414 0l-3.274-3.274A1.012 1.012 0 0 1 9 10V6a1 1 0 0 1 2 0v3.586l2.982 2.982a1 1 0 0 1 0 1.414Z" />
                        </svg>
                        Last 30 days
                        <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4" />
                        </svg>
                    </button> -->
                    <!-- Dropdown menu -->
                    <!-- <div id="dropdownRadio" class="z-10 hidden w-48 bg-white divide-y divide-gray-100 rounded-lg shadow  dark:divide-gray-600" data-popper-reference-hidden="" data-popper-escaped="" data-popper-placement="top" style="position: absolute; inset: auto auto 0px 0px; margin: 0px; transform: translate3d(522.5px, 3847.5px, 0px);">
                        <ul class="p-3 space-y-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownRadioButton">
                            <li>
                                <div class="flex items-center p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                                    <input id="filter-radio-example-1" type="radio" value="" name="filter-radio" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2  dark:border-gray-600">
                                    <label for="filter-radio-example-1" class="w-full ms-2 text-sm font-medium text-gray-900 rounded dark:text-gray-300">Last day</label>
                                </div>
                            </li>
                            <li>
                                <div class="flex items-center p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                                    <input checked="" id="filter-radio-example-2" type="radio" value="" name="filter-radio" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2  dark:border-gray-600">
                                    <label for="filter-radio-example-2" class="w-full ms-2 text-sm font-medium text-gray-900 rounded dark:text-gray-300">Last 7 days</label>
                                </div>
                            </li>
                            <li>
                                <div class="flex items-center p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                                    <input id="filter-radio-example-3" type="radio" value="" name="filter-radio" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2  dark:border-gray-600">
                                    <label for="filter-radio-example-3" class="w-full ms-2 text-sm font-medium text-gray-900 rounded dark:text-gray-300">Last 30 days</label>
                                </div>
                            </li>
                            <li>
                                <div class="flex items-center p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                                    <input id="filter-radio-example-4" type="radio" value="" name="filter-radio" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2  dark:border-gray-600">
                                    <label for="filter-radio-example-4" class="w-full ms-2 text-sm font-medium text-gray-900 rounded dark:text-gray-300">Last month</label>
                                </div>
                            </li>
                            <li>
                                <div class="flex items-center p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                                    <input id="filter-radio-example-5" type="radio" value="" name="filter-radio" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2  dark:border-gray-600">
                                    <label for="filter-radio-example-5" class="w-full ms-2 text-sm font-medium text-gray-900 rounded dark:text-gray-300">Last year</label>
                                </div>
                            </li>
                        </ul>
                    </div> -->
                </div>
                <label for="table-search" class="sr-only">Search</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 rtl:inset-r-0 rtl:right-0 flex items-center ps-3 pointer-events-none">
                        <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    <input type="text" id="table-search" class="block p-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500  dark:border-gray-600 dark:placeholder-gray-400  dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search for items">
                </div>
            </div>
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50  dark:text-gray-400">
                    <tr>
                        <th scope="col" class="p-4">
                            <div class="flex items-center">
                                <input id="checkbox-all-search" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2  dark:border-gray-600">
                                <label for="checkbox-all-search" class="sr-only">checkbox</label>
                            </div>
                        </th>
                        <th scope="col" class="px-6 py-3">
                            User ID
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Position
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Role
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Time
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Log
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="bg-white border-b  dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <td class="w-4 p-4">
                            <div class="flex items-center">
                                <input id="checkbox-table-search-1" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2  dark:border-gray-600">
                                <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                            </div>
                        </td>
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                            000
                        </th>
                        <td class="px-6 py-4">
                            Fname Lname
                        </td>
                        <td class="px-6 py-4">
                            Engineer
                        </td>
                        <td class="px-6 py-4">
                            Admin
                        </td>
                        <td class="px-6 py-4">
                            MM/DD/YYYY HH:MM:SS
                        </td>
                        <td class="px-6 py-4">
                            Activity
                        </td>
                    </tr>
                    <tr class="bg-white border-b  dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <td class="w-4 p-4">
                            <div class="flex items-center">
                                <input id="checkbox-table-search-2" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2  dark:border-gray-600">
                                <label for="checkbox-table-search-2" class="sr-only">checkbox</label>
                            </div>
                        </td>
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                            000
                        </th>
                        <td class="px-6 py-4">
                            Fname Lname
                        </td>
                        <td class="px-6 py-4">
                            Engineer
                        </td>
                        <td class="px-6 py-4">
                            Engineer
                        </td>
                        <td class="px-6 py-4">
                            MM/DD/YYYY HH:MM:SS
                        </td>
                        <td class="px-6 py-4">
                            Activity
                        </td>
                    </tr>
                    <tr class="bg-white border-b  dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <td class="w-4 p-4">
                            <div class="flex items-center">
                                <input id="checkbox-table-search-3" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2  dark:border-gray-600">
                                <label for="checkbox-table-search-3" class="sr-only">checkbox</label>
                            </div>
                        </td>
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                            000
                        </th>
                        <td class="px-6 py-4">
                            Fname Lname
                        </td>
                        <td class="px-6 py-4">
                            Engineer
                        </td>
                        <td class="px-6 py-4">
                            Engineer
                        </td>
                        <td class="px-6 py-4">
                            MM/DD/YYYY HH:MM:SS
                        </td>
                        <td class="px-6 py-4">
                            Activity
                        </td>
                    </tr>
                    <tr class="bg-white border-b  dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <td class="w-4 p-4">
                            <div class="flex items-center">
                                <input id="checkbox-table-3" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2  dark:border-gray-600">
                                <label for="checkbox-table-3" class="sr-only">checkbox</label>
                            </div>
                        </td>
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                            000
                        </th>
                        <td class="px-6 py-4">
                            Fname Lname
                        </td>
                        <td class="px-6 py-4">
                            Engineer
                        </td>
                        <td class="px-6 py-4">
                            Engineer
                        </td>
                        <td class="px-6 py-4">
                            MM/DD/YYYY HH:MM:SS
                        </td>
                        <td class="px-6 py-4">
                            Activity
                        </td>
                    </tr>
                    <tr class="bg-white border-b  dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <td class="w-4 p-4">
                            <div class="flex items-center">
                                <input id="checkbox-table-3" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2  dark:border-gray-600">
                                <label for="checkbox-table-3" class="sr-only">checkbox</label>
                            </div>
                        </td>
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                            000
                        </th>
                        <td class="px-6 py-4">
                            Fname Lname
                        </td>
                        <td class="px-6 py-4">
                            Engineer
                        </td>
                        <td class="px-6 py-4">
                            Viewer
                        </td>
                        <td class="px-6 py-4">
                            MM/DD/YYYY HH:MM:SS
                        </td>
                        <td class="px-6 py-4">
                            Activity
                        </td>
                    </tr>
                    <tr class="bg-white  hover:bg-gray-50 dark:hover:bg-gray-600">
                        <td class="w-4 p-4">
                            <div class="flex items-center">
                                <input id="checkbox-table-3" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2  dark:border-gray-600">
                                <label for="checkbox-table-3" class="sr-only">checkbox</label>
                            </div>
                        </td>
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                            000
                        </th>
                        <td class="px-6 py-4">
                            Fname Lname
                        </td>
                        <td class="px-6 py-4">
                            Engineer
                        </td>
                        <td class="px-6 py-4">
                            Veiwer
                        </td>
                        <td class="px-6 py-4">
                            MM/DD/YYYY HH:MM:SS
                        </td>
                        <td class="px-6 py-4">
                            Activity
                        </td>
                    </tr>
                </tbody>
            </table>
            <nav class="flex items-center flex-column flex-wrap md:flex-row justify-between pt-4" aria-label="Table navigation">
                <div class="text-sm font-normal text-gray-500 dark:text-gray-400 mb-4 md:mb-0 block w-full md:inline md:w-auto">
                    Showing
                    <!-- Dropdown for selecting number of items -->
                    <div class="relative inline-block text-left">
                        <button id="itemsPerPageButton" class="font-semibold text-gray-900 inline-flex items-center">
                            1-10
                            <svg class="-mr-1 ml-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06-.02L10 10.293l3.72-3.72a.75.75 0 011.08 1.04l-4.25 4.25a.75.75 0 01-1.06 0l-4.25-4.25a.75.75 0 01.02-1.06z" clip-rule="evenodd" />
                            </svg>
                        </button>

                        <!-- Dropdown menu for selecting range -->
                        <div id="itemsPerPageMenu" class="hidden origin-top-right absolute right-0 mt-2 w-24 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5">
                            <div class="py-1" role="menu" aria-orientation="vertical" aria-labelledby="itemsPerPageButton">
                                <button class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900" role="menuitem">1-10</button>
                                <button class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900" role="menuitem">11-20</button>
                                <button class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900" role="menuitem">21-30</button>
                                <button class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900" role="menuitem">31-40</button>
                            </div>
                        </div>
                    </div>

                    of
                    <span class="font-semibold text-gray-900">1000</span>
                </div>

                <script>
                    const itemsPerPageButton = document.getElementById('itemsPerPageButton');
                    const itemsPerPageMenu = document.getElementById('itemsPerPageMenu');

                    itemsPerPageButton.addEventListener('click', () => {
                        itemsPerPageMenu.classList.toggle('hidden');
                    });

                    document.addEventListener('click', (event) => {
                        if (!itemsPerPageButton.contains(event.target)) {
                            itemsPerPageMenu.classList.add('hidden');
                        }
                    });
                </script>

                <!-- <span class="text-sm font-normal text-gray-500 dark:text-gray-400 mb-4 md:mb-0 block w-full md:inline md:w-auto">Showing <span class="font-semibold text-gray-900">1-10</span> of <span class="font-semibold text-gray-900 ">1000</span></span> -->
                <ul class="inline-flex -space-x-px rtl:space-x-reverse text-sm h-8">
                    <li>
                        <a href="#" class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700  dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">1</a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700  dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">2</a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700  dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">3</a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700  dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">4</a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700  dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">5</a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700  dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white"> > </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 rounded-e-lg hover:bg-gray-100 hover:text-gray-700  dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white"> >> </a>
                    </li>
                </ul>
            </nav>
        </div>

    </x-slot>
</x-app-layout>
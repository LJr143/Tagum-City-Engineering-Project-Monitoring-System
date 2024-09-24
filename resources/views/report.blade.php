<x-app-layout mainClass="flex" headerClass="shadow-[0px_1px_2px_-1px_rgba(0,0,0,0.1)] ">
    {{-- SIDEBAR --}}
    <x-slot name="sidebar" class="w-64 bg-gray-200 min-h-screen">
        <x-sidebar></x-sidebar>

    </x-slot>
    {{-- HEADER --}}

    <x-slot name="header">
        <x-header></x-header>
    </x-slot>
    <x-slot name="main" class="">
        <h1>Report page</h1>
        <section class=" py-3 sm:py-5">
            <div class="px-4 mx-auto max-w-screen-2xl lg:px-12 ">
                <div class="relative overflow-hidden bg-white   sm:rounded-lg">
                    <div class="flex flex-col px-4 py-3 space-y-3 lg:flex-row lg:items-center lg:justify-between lg:space-y-0 lg:space-x-4">
                        <div class="flex items-center flex-1 space-x-4">
                            <div class="flex flex-row mb-1 sm:mb-0">
                                <div class="relative px-4 mx-2.5">
                                    <button>
                                        <svg width="47" height="44" viewBox="0 0 47 44" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <g filter="url(#filter0_dd_308_10138)">
                                                <rect x="1" y="1" width="45" height="41" rx="6" fill="white" />
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M18.5 14.5C17.3954 14.5 16.5 15.3954 16.5 16.5V26.5C16.5 27.6046 17.3954 28.5 18.5 28.5H28.5C29.6046 28.5 30.5 27.6046 30.5 26.5V16.5C30.5 15.3954 29.6046 14.5 28.5 14.5H18.5ZM20.5 20V23H18V20H20.5ZM18 24V26.5C18 26.7761 18.2239 27 18.5 27H20.5V24H18ZM21.5 24V27H24.5V24H21.5ZM25.5 24V27H28.5C28.7761 27 29 26.7761 29 26.5V24H25.5ZM25.5 23V20H29V23H25.5ZM24.5 20H21.5V23H24.5V20ZM19.75 18C20.1642 18 20.5 17.6642 20.5 17.25C20.5 16.8358 20.1642 16.5 19.75 16.5H18.75C18.3358 16.5 18 16.8358 18 17.25C18 17.6642 18.3358 18 18.75 18H19.75ZM23.75 18C24.1642 18 24.5 17.6642 24.5 17.25C24.5 16.8358 24.1642 16.5 23.75 16.5H22.25C21.8358 16.5 21.5 16.8358 21.5 17.25C21.5 17.6642 21.8358 18 22.25 18H23.75ZM29 17.25C29 17.6642 28.6642 18 28.25 18H26.25C25.8358 18 25.5 17.6642 25.5 17.25C25.5 16.8358 25.8358 16.5 26.25 16.5H28.25C28.6642 16.5 29 16.8358 29 17.25Z"
                                                    fill="#464F60" />
                                            </g>
                                            <defs>
                                                <filter id="filter0_dd_308_10138" x="0" y="0" width="47" height="44" filterUnits="userSpaceOnUse"
                                                    color-interpolation-filters="sRGB">
                                                    <feFlood flood-opacity="0" result="BackgroundImageFix" />
                                                    <feColorMatrix in="SourceAlpha" type="matrix"
                                                        values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha" />
                                                    <feMorphology radius="1" operator="dilate" in="SourceAlpha"
                                                        result="effect1_dropShadow_308_10138" />
                                                    <feOffset />
                                                    <feColorMatrix type="matrix"
                                                        values="0 0 0 0 0.27451 0 0 0 0 0.308497 0 0 0 0 0.376471 0 0 0 0.16 0" />
                                                    <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_308_10138" />
                                                    <feColorMatrix in="SourceAlpha" type="matrix"
                                                        values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha" />
                                                    <feOffset dy="1" />
                                                    <feGaussianBlur stdDeviation="0.5" />
                                                    <feColorMatrix type="matrix"
                                                        values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.1 0" />
                                                    <feBlend mode="normal" in2="effect1_dropShadow_308_10138"
                                                        result="effect2_dropShadow_308_10138" />
                                                    <feBlend mode="normal" in="SourceGraphic" in2="effect2_dropShadow_308_10138" result="shape" />
                                                </filter>
                                            </defs>
                                        </svg>
                                    </button>
                                </div>

                                <div class="relative inline-flex items-center">
                                    <div class="absolute inset-y-0 left-1 flex items-center px-2 text-gray-700">
                                        <svg width="12" height="15" viewBox="0 0 12 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M11.79 2.11564C12.3029 1.4591 11.8351 0.5 11.002 0.5H1.00186C0.168707 0.5 -0.299092 1.4591 0.213831 2.11564L5.03983 8.22867C5.1772 8.40449 5.25181 8.6212 5.25181 8.84432V14.2961C5.25181 14.4743 5.46724 14.5635 5.59323 14.4375L6.60536 13.4254C6.69913 13.3316 6.75181 13.2044 6.75181 13.0718V8.84432C6.75181 8.6212 6.82643 8.40449 6.96379 8.22867L11.79 2.11564Z"
                                                fill="#464F60" />
                                        </svg>
                                    </div>
                                    <select
                                        class="h-[41px] pl-10 pr-3 py-1.5 bg-white rounded-tl-md rounded-bl-md shadow justify-center items-center gap-2 inline-flex">
                                        <option>All</option>
                                        <option>ONGOING</option>
                                        <option>FINISHED</option>
                                    </select>
                                </div>
                            </div>

                            <div class="block relative flex-grow">
                                <span class="h-full absolute inset-y-0 left-0 flex items-center pl-2">
                                    <svg viewBox="0 0 24 24" class="h-4 w-4 fill-current text-gray-500">
                                        <path
                                            d="M10 4a6 6 0 100 12 6 6 0 000-12zm-8 6a8 8 0 1114.32 4.906l5.387 5.387a1 1 0 01-1.414 1.414l-5.387-5.387A8 8 0 012 10z">
                                        </path>
                                    </svg>
                                </span>
                                <input placeholder="Search"
                                    class="appearance-none rounded-r rounded-l sm:rounded-l-none border border-gray-400 border-b block pl-8 pr-6 py-2 w-full bg-white text-sm placeholder-gray-400 text-gray-700 focus:bg-white focus:placeholder-gray-600 focus:text-gray-700 focus:outline-none" />
                            </div>

                            <div class="flex justify-end ml-auto">
                                <button type="button"
                                    class="flex px-4 py-2 text-sm font-medium text-black rounded-lg bg-[#249000] justify-end" id="openModal">
                                    View Report
                                </button>
                            </div>
                            <!-- View Report modal -->
                            <div id="modal" class="fixed inset-0 flex items-center justify-center z-50 hidden">
                                <div class="bg-white rounded-lg shadow-lg p-5 w-11/12 max-w-lg">
                                    <div class="flex justify-between items-center mb-4">
                                        <h2 class="text-lg font-semibold text-black">Report</h2>
                                        <button id="closeModal" class="text-gray-500 hover:text-gray-700">
                                            &times; <!-- Close icon -->
                                        </button>
                                    </div>
                                    <div class="mb-4">
                                        <p>Your report content goes here...</p>
                                    </div>
                                    <div class="flex justify-end">
                                        <button id="closeModal" class="px-4 py-2 text-sm font-medium text-white bg-red-600 rounded-lg hover:bg-red-700">
                                            Close
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <!-- JavaScript to Handle Modal Toggle -->
                            <script>
                                const openModalButton = document.getElementById('openModal');
                                const modal = document.getElementById('modal');
                                const closeModalButtons = document.querySelectorAll('#closeModal');

                                // Open Modal
                                openModalButton.addEventListener('click', () => {
                                    modal.classList.remove('hidden');
                                });

                                // Close Modal
                                closeModalButtons.forEach(button => {
                                    button.addEventListener('click', () => {
                                        modal.classList.add('hidden');
                                    });
                                });
                            </script>
                        </div>


                    </div>

                </div>
                <div x-data="{ isModalOpen: false, isSecondModalOpen: false }" class="overflow-x-auto">
                    <table class="min-w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase  dark:text-gray-400">
                            <tr>
                                <th scope="col" class="p-4">
                                    <!-- Checkbox or any other content can go here -->
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Project name
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Date started
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Expected Finish
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Assigned personnel
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Budget
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Status
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    <!-- Action column -->
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="bg-white border-b ">
                                <td class="p-4 align-middle">
                                    <!-- Checkbox or any other content can go here -->
                                </td>
                                <th scope="row" class="px-6 py-4 font-medium  whitespace-nowrap align-middle">
                                    Project 1
                                </th>
                                <td class="px-6 py-4 align-middle">
                                    January 1, 2022
                                </td>
                                <td class="px-6 py-4 align-middle">
                                    March 14, 2025
                                </td>
                                <td class="px-6 py-4 align-middle">
                                    Engr. Batino
                                </td>
                                <td class="px-6 py-4 text-center align-middle">
                                    10 million
                                </td>
                                <!-- First Button in the First Table Cell to Open First Modal -->
                                <td class="px-6 py-4 text-center align-middle">
                                    <!-- Modal toggle -->
                                    <a href="#" @click.prevent="isModalOpen = true"
                                        class=" bg-[#FFC5C5] border border-[#DF0404] text-[#DF0404] flex justify-center items-center px-3 py-1 gap-2 h-[29px] w-[84px] rounded-md focus:outline-none focus:ring-2 focus:ring-[#DF0404] focus:ring-0">
                                        ONGOING
                                    </a>
                                </td>

                                <!-- Second Button in the Second Table Cell to Open Second Modal -->
                                <td class="px-6 py-4 text-center align-middle">
                                    <button type="button" @click="isSecondModalOpen = true"
                                        class="text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5">
                                        <svg width="12" height="12" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M16.06 0.588906L17.41 1.93891C18.2 2.71891 18.2 3.98891 17.41 4.76891L4.18 17.9989H0V13.8189L10.4 3.40891L13.23 0.588906C14.01 -0.191094 15.28 -0.191094 16.06 0.588906ZM2 15.9989L3.41 16.0589L13.23 6.22891L11.82 4.81891L2 14.6389V15.9989Z"
                                                fill="#6750A4" />
                                        </svg>
                                    </button>
                                </td>
                            </tr>


                        </tbody>
                    </table>


                    <!-- First Modal -->
                    <div x-show="isModalOpen" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50" @click.away="isModalOpen = false" x-cloak>
                        <div class="bg-white rounded-lg shadow-lg p-4 md:p-5 w-full max-w-md">
                            <form>
                                <div class="grid gap-4 mb-4 grid-cols-2">
                                    <div class="flex justify-between items-center">
                                        <!-- <h2 class="text-lg font-semibold">Modal Title</h2> -->
                                        <h1 class="w-[593.33px] h-[28px] font-semibold text-[18px] leading-[28px] text-[#101828]">
                                            Project Status
                                        </h1>
                                        <button @click="isModalOpen = false" class="text-gray-500 hover:text-gray-700">
                                            &times;
                                        </button>
                                    </div>
                                    <div class="col-span-2">
                                        <label for="name" class="block mb-2 text-sm font-medium text-black">Personnel In-charge</label>
                                        <input type="text" name="name" id="name"
                                            class="bg-gray-50 border border-gray-300  text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 text-black dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                            placeholder="Personnel name" required>
                                    </div>
                                    <div class="col-span-2">
                                        <label for="name" class="block mb-2 text-sm font-medium text-black">Project name</label>
                                        <input type="text" name="name" id="name"
                                            class="bg-gray-50 border border-gray-300  text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 text-black dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                            placeholder="Project name" required>
                                    </div>
                                    <div class="col-span-2 sm:col-span-1">
                                        <label for="price" class="block mb-2 text-sm font-medium  text-black">Budget</label>
                                        <input type="number" name="price" id="price"
                                            class="bg-gray-50 border border-gray-300  text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 text-black dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                            placeholder="10 million" required>
                                    </div>
                                    <div class="col-span-2 sm:col-span-1">
                                        <label for="date" class="block mb-2 text-sm font-medium text-black">Date</label>
                                        <input type="date" id="date"
                                            class="bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 text-black dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                            required>
                                    </div>
                                    <div class="col-span-2 sm:col-span-1">
                                        <label for="category" class="block mb-2 text-sm font-medium  text-black">Category</label>
                                        <select id="category"
                                            class="bg-gray-50 border border-gray-300  text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 text-black dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                            <option selected>ONGOING</option>
                                            <option value="TV">FINISHED</option>

                                        </select>
                                    </div>

                                    <div class="col-span-2 sm:col-span-1">
                                        <label for="percentage" class="block mb-2 text-sm font-medium text-black">Percentage</label>
                                        <input type="number" name="percentage" id="percentage"
                                            class="bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 text-black dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                            placeholder="Enter percentage" required min="0" max="100" step="0.01">
                                        <!-- <span class="text-gray-500 text-sm">%</span> -->
                                    </div>

                                    <!-- <div class="col-span-2">
                                        <label for="description" class="block mb-2 text-sm font-medium  text-black">Product Description</label>
                                        <textarea id="description" rows="4"
                                            class="block p-2.5 w-full text-sm  bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 text-black dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            placeholder="Write product description here"></textarea>
                                    </div> -->
                                </div>
                                <div class="flex justify-center space-x-4 mt-4">
                                    <button type="button" @click.prevent="isModalOpen = false" class="text-black bg-white hover:bg-red-700 focus:ring-4 focus:outline-1 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center border border-black">
                                        Cancel
                                    </button>
                                    <button type="submit"
                                        class="text-white inline-flex items-center bg-[#249000] hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                                        GENERATE
                                    </button>
                                </div>

                            </form>
                        </div>
                    </div>

                    <!-- Second Modal -->
                    <div x-show="isSecondModalOpen" id="edit-modal" class="fixed inset-0 flex items-center justify-center z-50 bg-black bg-opacity-50" @click.away="isSecondModalOpen = false" x-cloak>
                        <form action="">
                            <div class="bg-white rounded-lg shadow-lg w-full max-w-md p-6">

                                <div class="flex justify-between items-center">
                                    <!-- <h2 class="text-lg font-semibold">Modal Title</h2> -->
                                    <h1 class="w-[593.33px] h-[28px] font-semibold text-[18px] leading-[28px] text-[#101828]">
                                        Project Status
                                    </h1>
                                    <button @click="isSecondModalOpen = false" class="text-gray-500 hover:text-gray-700">
                                        &times;
                                    </button>
                                </div>
                                <div class="grid gap-4 mb-4 grid-cols-2">
                                    <div class="col-span-2">
                                        <label for="name" class="block mb-2 text-sm font-medium text-black">Personnel In-charge</label>
                                        <input type="text" name="name" id="name"
                                            class="bg-gray-50 border border-gray-300  text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 text-black dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                            placeholder="Personnel name" required>
                                    </div>
                                    <div class="col-span-2">
                                        <label for="name" class="block mb-2 text-sm font-medium text-black">Project name</label>
                                        <input type="text" name="name" id="name"
                                            class="bg-gray-50 border border-gray-300  text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 text-black dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                            placeholder="Project name" required>
                                    </div>
                                    <div class="col-span-2 sm:col-span-1">
                                        <label for="price" class="block mb-2 text-sm font-medium  text-black">Budget</label>
                                        <input type="number" name="price" id="price"
                                            class="bg-gray-50 border border-gray-300  text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 text-black dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                            placeholder="10 million" required>
                                    </div>
                                    <div class="col-span-2 sm:col-span-1">
                                        <label for="date" class="block mb-2 text-sm font-medium text-black">Date</label>
                                        <input type="date" id="date"
                                            class="bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 text-black dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                            required>
                                    </div>
                                    <div class="col-span-2 sm:col-span-1">
                                        <label for="category" class="block mb-2 text-sm font-medium  text-black">Category</label>
                                        <select id="category"
                                            class="bg-gray-50 border border-gray-300  text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 text-black dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                            <option selected>ONGOING</option>
                                            <option value="TV">FINISHED</option>

                                        </select>
                                    </div>

                                    <div class="col-span-2 sm:col-span-1">
                                        <label for="percentage" class="block mb-2 text-sm font-medium text-black">Percentage</label>
                                        <input type="number" name="percentage" id="percentage"
                                            class="bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 text-black dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                            placeholder="Enter percentage" required min="0" max="100" step="0.01">
                                        <!-- <span class="text-gray-500 text-sm">%</span> -->
                                    </div>

                                    <!-- <div class="col-span-2">
                                        <label for="description" class="block mb-2 text-sm font-medium  text-black">Product Description</label>
                                        <textarea id="description" rows="4"
                                            class="block p-2.5 w-full text-sm  bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 text-black dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            placeholder="Write product description here"></textarea>
                                    </div> -->
                                </div>

                                <div class="mt-6 flex justify-center">
                                    <button @click="isSecondModalOpen = false" class="text-black bg-white hover:bg-red-700 mr-2 focus:ring-4 focus:outline-1 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center border border-black">
                                        Cancel
                                    </button>
                                    <button class="px-4 py-2 bg-[#249000] text-white rounded-md hover:bg-blue-700">
                                        Save
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Alpine.js Script -->
                <script src="https://cdn.jsdelivr.net/npm/alpinejs" defer></script>


            </div>

            <nav class="flex flex-col items-start justify-between p-4 space-y-3 md:flex-row md:items-center md:space-y-0" aria-label="Table navigation">
                <span class="text-sm font-normal text-gray-500 dark:text-gray-400">
                    Showing
                    <span class="font-semibold  dark:text-black">1-10</span>
                    of
                    <span class="font-semibold  dark:text-black">1000</span>
                </span>
                <ul class="inline-flex items-stretch -space-x-px">
                    <li>
                        <a href="#" class="flex items-center justify-center h-full py-1.5 px-3 ml-0 text-gray-500 bg-white rounded-l-lg border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                            <span class="sr-only">Previous</span>
                            <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                            </svg>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center justify-center px-3 py-2 text-sm leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">1</a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center justify-center px-3 py-2 text-sm leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">2</a>
                    </li>
                    <li>
                        <a href="#" aria-current="page" class="z-10 flex items-center justify-center px-3 py-2 text-sm leading-tight border text-primary-600 bg-primary-50 border-primary-300 hover:bg-primary-100 hover:text-primary-700 dark:border-gray-700 dark:bg-gray-700 dark:text-black">3</a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center justify-center px-3 py-2 text-sm leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">...</a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center justify-center px-3 py-2 text-sm leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">100</a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center justify-center h-full py-1.5 px-3 leading-tight text-gray-500 bg-white rounded-r-lg border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                            <span class="sr-only">Next</span>
                            <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                            </svg>
                        </a>
                    </li>
                </ul>
            </nav>
            </div>
            </div>
        </section>


    </x-slot>

</x-app-layout>
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
        <h1>System Logs</h1>
        <div class="flex min-h-screen items-center justify-center">
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white shadow-md rounded-xl">
                    <thead>
                        <input id="vue-checkbox" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                        <tr class="bg-blue-gray-100 text-gray-700">
                            <th class="py-3 px-4 text-left">Stock Name</th>
                            <th class="py-3 px-4 text-left">Price</th>
                            <th class="py-3 px-4 text-left">Quantity</th>
                            <th class="py-3 px-4 text-left">Total</th>
                            <th class="py-3 px-4 text-left">Action</th>
                        </tr>
                    </thead>
                    <tbody class="text-blue-gray-900">
                        <tr class="border-b border-blue-gray-200">
                            <td class="py-3 px-4">Company A</td>
                            <td class="py-3 px-4">$50.25</td>
                            <td class="py-3 px-4">100</td>
                            <td class="py-3 px-4">$5025.00</td>
                            <td class="py-3 px-4">
                                <a href="#" class="font-medium text-blue-600 hover:text-blue-800">Edit</a>
                            </td>
                        </tr>
                        <tr class="border-b border-blue-gray-200">
                            <td class="py-3 px-4">Company B</td>
                            <td class="py-3 px-4">$75.60</td>
                            <td class="py-3 px-4">150</td>
                            <td class="py-3 px-4">$11340.00</td>
                            <td class="py-3 px-4">
                                <a href="#" class="font-medium text-blue-600 hover:text-blue-800">Edit</a>
                            </td>
                        </tr>
                        <tr class="border-b border-blue-gray-200">
                            <td class="py-3 px-4">Company C</td>
                            <td class="py-3 px-4">$30.80</td>
                            <td class="py-3 px-4">200</td>
                            <td class="py-3 px-4">$6160.00</td>
                            <td class="py-3 px-4">
                                <a href="#" class="font-medium text-blue-600 hover:text-blue-800">Edit</a>
                            </td>
                        </tr>
                        <!-- Add more rows as needed -->
                        <tr class="border-b border-blue-gray-200">
                            <td class="py-3 px-4 font-medium">Total Wallet Value</td>
                            <td class="py-3 px-4"></td>
                            <td class="py-3 px-4"></td>
                            <td class="py-3 px-4 font-medium">$22525.00</td>
                            <td class="py-3 px-4"></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </x-slot>
</x-app-layout>
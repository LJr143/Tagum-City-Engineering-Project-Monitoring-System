<x-app-layout mainClass="flex" headerClass="shadow-[0px_1px_2px_-1px_rgba(0,0,0,0.1)] ">


    {{-- SIDEBAR --}}
    <x-slot name="sidebar">
        <x-sidebar></x-sidebar>
    </x-slot>
    {{-- HEADER --}}

    <x-slot name="header">
        <x-header></x-header>
    </x-slot>

    {{-- MAIN CONTENT --}}
    @livewireStyles
    <x-slot name="main">
        <div class="container mx-auto p-6">
            <!-- Project Header -->
            <div class="flex justify-between items-center mb-6">
                <span class="bg-green-500 text-white py-1 px-4 rounded-full">#PRJ2023-03-19879</span>
                <h2 class="text-xl font-bold">POW 1</h2>
            </div>

            <!-- Main Content Grid -->
            <div class="grid grid-cols-3 gap-6">

                <!-- Material Cost Section -->
                <div class="col-span-2">
                    <div class="bg-white shadow-md rounded-lg p-4">
                        <h3 class="text-lg font-bold mb-4">Material Cost</h3>

                        <!-- Filter and File Upload -->
                        <div class="flex justify-between mb-4">
                            <div class="relative">
                                <select class="border border-gray-300 rounded-md px-3 py-2 focus:ring-green-500 focus:border-green-500">
                                    <option value="all">All</option>
                                    <option value="admin">Admin</option>
                                    <option value="engineer">Engineer</option>
                                    <option value="viewer">Viewer</option>
                                </select>
                            </div>
                            <div class="flex space-x-4">
                                <input type="file" class="hidden" id="material-upload">
                                <label for="material-upload" class="px-4 py-2 bg-yellow-500 text-white rounded-md cursor-pointer">Choose File</label>
                                <button class="px-4 py-2 bg-green-500 text-white rounded-md">Import Excel</button>
                            </div>
                        </div>

                        <!-- Table -->
                        <table class="w-full table-auto">
                            <thead>
                            <tr class="bg-gray-100 text-left">
                                <th class="p-2">User ID</th>
                                <th class="p-2">Name</th>
                                <th class="p-2">Position</th>
                                <th class="p-2">Email</th>
                                <th class="p-2">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            <!-- Example Row -->
                            <tr>
                                <td class="p-2">0000</td>
                                <td class="p-2">Frame M.L. Lianne</td>
                                <td class="p-2">Engineer</td>
                                <td class="p-2">framemail@example.com</td>
                                <td class="p-2">
                                    <button class="px-3 py-1 bg-blue-500 text-white rounded-md">Edit</button>
                                    <button class="px-3 py-1 bg-red-500 text-white rounded-md">Delete</button>
                                </td>
                            </tr>
                            <!-- Repeat Rows as necessary -->
                            </tbody>
                        </table>

                        <!-- Pagination -->
                        <div class="flex justify-between items-center mt-4">
                            <p class="text-sm">Showing 1 to 10 of 100 entries</p>
                            <div class="space-x-1">
                                <button class="px-3 py-1 bg-gray-300 rounded-md">1</button>
                                <button class="px-3 py-1 bg-gray-300 rounded-md">2</button>
                                <button class="px-3 py-1 bg-gray-300 rounded-md">3</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Side Panel -->
                <div class="bg-white shadow-md rounded-lg p-4">
                    <h3 class="text-lg font-bold mb-4">Constructive and destructive waves</h3>
                    <p>Project Cost: 1,000,000,000</p>
                </div>

                <!-- Labor Cost Section -->
                <div class="col-span-2 mt-6">
                    <div class="bg-white shadow-md rounded-lg p-4">
                        <h3 class="text-lg font-bold mb-4">Labor Cost</h3>

                        <!-- Table -->
                        <table class="w-full table-auto">
                            <thead>
                            <tr class="bg-gray-100 text-left">
                                <th class="p-2">User ID</th>
                                <th class="p-2">Name</th>
                                <th class="p-2">Position</th>
                                <th class="p-2">Email</th>
                                <th class="p-2">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            <!-- Example Row -->
                            <tr>
                                <td class="p-2">0000</td>
                                <td class="p-2">Frame M.L. Lianne</td>
                                <td class="p-2">Engineer</td>
                                <td class="p-2">framemail@example.com</td>
                                <td class="p-2">
                                    <button class="px-3 py-1 bg-blue-500 text-white rounded-md">Edit</button>
                                    <button class="px-3 py-1 bg-red-500 text-white rounded-md">Delete</button>
                                </td>
                            </tr>
                            </tbody>
                        </table>

                        <!-- Pagination -->
                        <div class="flex justify-between items-center mt-4">
                            <p class="text-sm">Showing 1 to 10 of 100 entries</p>
                            <div class="space-x-1">
                                <button class="px-3 py-1 bg-gray-300 rounded-md">1</button>
                                <button class="px-3 py-1 bg-gray-300 rounded-md">2</button>
                                <button class="px-3 py-1 bg-gray-300 rounded-md">3</button>
                            </div>
                        </div>

                        <!-- Save and Cancel Buttons -->
                        <div class="flex justify-end mt-6 space-x-4">
                            <button class="px-4 py-2 bg-gray-300 rounded-md">Cancel</button>
                            <button class="px-4 py-2 bg-green-500 text-white rounded-md">Save</button>
                        </div>
                    </div>
                </div>

                <!-- Labor Cost Modal -->
                <div class="bg-white shadow-md rounded-lg p-4 mt-6">
                    <h3 class="text-lg font-bold mb-4">Labor Cost Entry</h3>
                    <form>
                        <div class="mb-4">
                            <label for="quantity" class="block text-gray-700">Quantity</label>
                            <input type="number" id="quantity" class="w-full border border-gray-300 rounded-md px-3 py-2" placeholder="Enter Quantity">
                        </div>
                        <div class="mb-4">
                            <label for="amount" class="block text-gray-700">Amount</label>
                            <input type="text" id="amount" class="w-full border border-gray-300 rounded-md px-3 py-2" placeholder="Enter Amount">
                        </div>
                        <div class="mb-4">
                            <label for="payroll" class="block text-gray-700">Payroll Amount</label>
                            <input type="text" id="payroll" class="w-full border border-gray-300 rounded-md px-3 py-2" placeholder="Enter Payroll Amount">
                        </div>

                        <!-- Save and Cancel Buttons -->
                        <div class="flex justify-end space-x-4">
                            <button type="button" class="px-4 py-2 bg-gray-300 rounded-md">Cancel</button>
                            <button type="submit" class="px-4 py-2 bg-green-500 text-white rounded-md">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </x-slot>
    @livewireScripts
</x-app-layout>

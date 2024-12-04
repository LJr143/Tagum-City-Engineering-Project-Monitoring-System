<div x-data="{ open: false }" x-cloak @job-order-added.window="open = false">
    <!-- Trigger Button -->
    <button @click="open = true" class="bg-green-500 text-white text-xs px-4 py-2 rounded shadow-md hover:bg-green-600 focus:outline-none">
        Add Job Order
    </button>

    <!-- Modal -->
    <div
        x-show="open"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50"
    >
        <div
            x-show="open"
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 transform scale-90"
            x-transition:enter-end="opacity-100 transform scale-100"
            x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="opacity-100 transform scale-100"
            x-transition:leave-end="opacity-0 transform scale-90"
            class="bg-white p-6 rounded-lg shadow-md w-full max-w-md mx-4"
        >

            <div class="flex justify-between items-center mb-4 border-b border-gray-300 pb-2">
                <!-- Payroll Title -->
                <h2 class="text-sm font-bold text-left w-full sm:w-auto">Add Job Order</h2>

                <!-- Close Button (X) -->
                <button @click="open = false" class="text-gray-500 hover:text-gray-700">
                    <i class="fas fa-times"></i>
                </button>
            </div>




            <form wire:submit.prevent="submit" class="space-y-2">
                <!-- Payroll Title Field -->
                <div>
                    <label for="jo_name" class="text-xs font-semibold block mb-1">Name</label>
                    <input id="jo_name" type="text" placeholder="Edward Collins et. al." class="border border-gray-300 text-xs rounded-lg px-4 py-2 w-full mb-3" wire:model="jo_name">
                </div>
                <div>
                    <label for="jo_designation" class="text-xs font-semibold block mb-1">Designation</label>
                    <input id="jo_designation" type="text" placeholder="Edward Collins et. al." class="border border-gray-300 text-xs rounded-lg px-4 py-2 w-full mb-3" wire:model="jo_designation">
                </div>
                <div class="flex-1 mb-4 md:mb-0">
                    <label for="jo_rate_per_day" class="text-xs font-semibold block mb-1">Rate/Day</label>
                    <input id="jo_rate_per_day" type="text" placeholder="Enter Rate Per Day" class="border border-gray-300 text-xs rounded-md px-4 py-2 w-full" wire:model="jo_rate_per_day">
                </div>

                <!-- Amount and Date Fields -->
                <p class="text-[12px] font-medium">Job Order Period</p>
                <div class="flex flex-col md:flex-row md:space-x-4 mb-4 border border-gray-300 rounded-md p-4">
                    <!-- Start Date Input -->
                    <div class="flex-1">
                        <label for="jo_date_start" class="text-[10px] block mb-1">From</label>
                        <input
                            id="jo_date_start"
                            type="date"
                            class="border border-gray-300 text-xs rounded-md px-4 py-2 w-full focus:ring focus:ring-indigo-200 focus:outline-none"
                            wire:model="jo_date_start">
                    </div>

                    <!-- End Date Input -->
                    <div class="flex-1">
                        <label for="jo_date_end" class="text-[10px] block mb-1">To</label>
                        <input
                            id="jo_date_end"
                            type="date"
                            class="border border-gray-300 text-xs rounded-md px-4 py-2 w-full focus:ring focus:ring-indigo-200 focus:outline-none"
                            wire:model="jo_date_end">
                    </div>
                </div>

                <div class="flex-1 mb-4 md:mb-0">
                    <label for="jo_total_amount" class="text-xs font-semibold block mb-1">Total Amount</label>
                    <input id="jo_total_amount" type="text" placeholder="Enter Total Amount" class="border border-gray-300 text-xs rounded-md px-4 py-2 w-full" wire:model="jo_total_amount">
                </div>


                <!-- Action Buttons -->
                <div class="mt-6 pt-3 flex justify-end space-x-2  ">
                    <button @click="open = false"
                            type="button"
                            class="bg-gray-300 text-gray-700 text-[12px] h-7 px-4 py-1 rounded shadow-md hover:bg-gray-400 justify-center text-center">
                        Cancel
                    </button>
                    <button type="submit"
                            class="bg-green-500 text-white px-6 py-1 h-7 rounded shadow-md hover:bg-green-600 text-[12px] justify-center text-center">
                        Save
                    </button>
                </div>


            </form>
        </div>
    </div>
    <script>
        document.addEventListener('job-order-added', () => {
            document.querySelector('[x-data]').__x.$data.open = false;
        });

    </script>
</div>

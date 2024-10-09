<div x-data="{ open: false }" x-cloak @payroll-added.window="open = false">
    <!-- Trigger Button -->
    <button @click="open = true" class="bg-green-700 text-white rounded-md px-4 py-2 text-xs hover:bg-green-800">
        Add Payroll
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
        class="fixed inset-0 bg-gray-800 bg-opacity-50 flex items-center justify-center z-50"
    >
        <div
            x-show="open"
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 transform scale-90"
            x-transition:enter-end="opacity-100 transform scale-100"
            x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="opacity-100 transform scale-100"
            x-transition:leave-end="opacity-0 transform scale-90"
            class="bg-white rounded-md shadow-lg p-6 w-1/3"
        >
            <!-- Payroll Title -->
            <h2 class="text-sm font-semibold mb-4">Add Payroll</h2>

            <form wire:submit.prevent="submit" class="space-y-2">
                <!-- Payroll Title Field -->
                <label for="payroll-title" class="text-xs font-semibold mb-2 block">Payroll</label>
                <input id="payroll-title" type="text" placeholder="Payroll Title" class="border border-gray-300 text-xs rounded-lg px-4 py-2 w-full mb-4" wire:model="payroll_title">

                <!-- Amount and Date Fields -->
                <div class="flex space-x-2">
                    <!-- Amount Field -->
                    <div class="w-1/2">
                        <label for="amount" class="text-xs font-semibold mb-2 block">Amount</label>
                        <input id="amount" type="text" placeholder="Enter Amount" class="border border-gray-300 text-xs rounded-md px-4 py-2 w-full" wire:model="payroll_amount">
                    </div>

                    <!-- Date Field -->
                    <div class="w-1/2">
                        <label for="date" class="text-xs font-semibold mb-2 block">Date</label>
                        <input id="date" type="date" class="border border-gray-300 text-xs rounded-md px-4 py-2 w-full" wire:model="payroll_date">
                    </div>
                </div>

                <!-- Buttons -->
                <div class="flex justify-end mt-4">
                    <button @click="open = false" type="button" class="bg-white border border-gray-300 text-gray-700 rounded-md text-xs px-4 py-2 hover:bg-gray-300">
                        Cancel
                    </button>
                    <button type="submit" class="bg-green-700 text-white rounded-md px-4 py-2 text-xs hover:bg-green-800 ml-2">
                        Add
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

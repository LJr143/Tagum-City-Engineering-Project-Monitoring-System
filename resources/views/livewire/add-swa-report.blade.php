<div x-data="{ makeSwaReport: @entangle('makeSwaReport') }" x-cloak @swa-report-success.window="makeSwaReport = false">
    <div class="flex justify-end">
        <div class="relative ml-2">
            <button @click="makeSwaReport = true"
                    class="bg-green-500 text-white text-xs px-4 py-2 rounded shadow-md hover:bg-green-600 focus:outline-none">
                Add Report
            </button>
        </div>
    </div>

    <!-- Modal -->
    <div
        x-show="makeSwaReport"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50"
    >
        <!-- Modal Content -->
        <div
            x-show="makeSwaReport"
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 transform scale-90"
            x-transition:enter-end="opacity-100 transform scale-100"
            x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="opacity-100 transform scale-100"
            x-transition:leave-end="opacity-0 transform scale-90"
            class="bg-white rounded-lg shadow-lg p-6 w-full max-w-2xl mx-4 overflow-y-auto max-h-[500px]"
        >
            <div class="flex justify-between items-center mb-4 border-b border-gray-300 pb-2">
                <h2 class="text-sm font-bold text-left w-full sm:w-auto">Add Statement of Work Accomplishment {{ now() }}</h2>

                <!-- Close Button (X) -->
                <button @click="makeSwaReport = false" class="text-gray-500 hover:text-gray-700">
                    <i class="fas fa-times"></i>
                </button>
            </div>

            <form wire:submit.prevent="saveSwaReport" class="space-y-4 text-[12px]">

                <div class="w-full border border-black p-2 rounded-md">
                    <!-- Display Fields Dynamically -->
                    @foreach ($swa_report as $index => $po)
                        <div class="flex gap-2 items-center mb-2">

                            <div class="flex gap-2">
                                <div class="w-1/4">
                                    <div class="flex flex-col space-y-1">
                                        <label for="item_no" class="block text-gray-700 text-xs">Item No</label>
                                        <input type="text" id="item_no" name="swa_report[{{ $index }}][item_no]"
                                               wire:model.defer="swa_report.{{ $index }}.item_no"
                                               class="mt-1 block w-full p-1 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-xs"
                                               required>
                                        @error('item_no') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                                    </div>
                                </div>

                                <div class="w-1/4">
                                    <div class="flex flex-col space-y-1">
                                        <label for="to_date_qty" class="block text-gray-700 text-xs">Quantity</label>
                                        <input type="text" id="to_date_qty"
                                               name="swa_report[{{ $index }}][to_date_qty]"
                                               wire:model.defer="swa_report.{{ $index }}.to_date_qty"
                                               class="mt-1 block w-full p-1 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-xs"
                                               required>
                                        @error('to_date_qty') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="w-2/4">
                                    <div class="flex flex-col space-y-1">
                                        <label for="percent_accomplishment" class="block text-gray-700 text-xs">Percent Accomplishment</label>
                                        <input type="text" id="percent_accomplishment"  name="swa_report[{{ $index }}][percent_accomplishment]"
                                               wire:model.defer="swa_report.{{ $index }}.percent_accomplishment"
                                               class="mt-1 block w-full p-1 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-xs"
                                               required>
                                        @error('percent_accomplishment') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                            </div>


                            @if ($index > 0)
                                <!-- Remove Field Button -->
                                <button type="button" wire:click="removeSwa({{ $index }})"
                                        class="text-red-500 hover:text-red-700">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M6 18L18 6M6 6l12 12"></path>
                                    </svg>
                                </button>
                            @endif
                        </div>
                    @endforeach
                </div>


                <!-- Add Field Button -->
                <button type="button" wire:click="addSwa"
                        class="text-[12px] px-2 py-1 rounded  text-green-600 bg-green-100 hover:bg-green-200 p-2 mt-4">
                    + Add Field
                </button>


                <!-- Action Buttons -->
                <div class="mt-6 flex justify-end space-x-2">
                    <button @click="makeSwaReport = false" type="button"
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
        document.addEventListener('swa-report-success', () => {
            document.querySelector('[x-data]').__x.$data.makeSwaReport = false; // Close modal safely
        });
    </script>
</div>

<div x-data="{ markProjectCompleteOpen: @entangle('markProjectCompleteOpen') }" x-cloak>
    <div class="flex">
        <div class="relative sm:ml-2">
            <button @click="markProjectCompleteOpen = true"
                    class="bg-green-500 text-white text-xs px-4 py-2 rounded shadow-md hover:bg-green-600 focus:outline-none">
                Mark Complete
            </button>
        </div>
    </div>

    <!-- Modal -->
    <div
        x-show="markProjectCompleteOpen"
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
            x-show="markProjectCompleteOpen"
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 transform scale-90"
            x-transition:enter-end="opacity-100 transform scale-100"
            x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="opacity-100 transform scale-100"
            x-transition:leave-end="opacity-0 transform scale-90"
            class="bg-white rounded-lg shadow-lg p-6 w-full max-w-md mx-4 overflow-y-auto"
        >
            <div class="flex items-center mb-2">
                <svg width="20" height="20" class="mr-2 text-red-500">
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg" class="mr-2">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M8.4845 2.49512C9.15808 1.32845 10.842 1.32845 11.5156 2.49512L17.7943 13.3701C18.4678 14.5368 17.6259 15.9951 16.2787 15.9951H3.72136C2.37421 15.9951 1.53224 14.5368 2.20582 13.3701L8.4845 2.49512ZM10 5.00012C10.4142 5.00012 10.75 5.33591 10.75 5.75012V9.25012C10.75 9.66434 10.4142 10.0001 10 10.0001C9.58579 10.0001 9.25 9.66434 9.25 9.25012L9.25 5.75012C9.25 5.33591 9.58579 5.00012 10 5.00012ZM10 14.0001C10.5523 14.0001 11 13.5524 11 13.0001C11 12.4478 10.5523 12.0001 10 12.0001C9.44772 12.0001 9 12.4478 9 13.0001C9 13.5524 9.44772 14.0001 10 14.0001Z" fill="#4CAF50"/>
                    </svg>
                </svg>
                <h2 class="text-sm font-semibold text-green-500">Mark Project as Complete</h2>
            </div>
            <p class="text-xs mb-4">Administrative approval for project completion is needed. Admin will be notified for validation.</p>

            <!-- Form -->
            <form wire:submit.prevent="markComplete()">
                <div class="flex justify-end">
                    <button type="button" @click="markProjectCompleteOpen = false"
                            class="bg-white border border-gray-300 text-gray-700 rounded-md text-xs px-4 py-2 hover:bg-gray-400">
                        Cancel
                    </button>
                    <button type="submit"
                            class="bg-green-500 text-white rounded-md px-4 py-2 text-xs hover:bg-green-600 ml-2">
                        Mark Complete
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

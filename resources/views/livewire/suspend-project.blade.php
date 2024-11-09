<div id="suspend-modal"
     class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden z-50">
    <div class="bg-white rounded-lg shadow-lg p-6 w-full max-w-md mx-4 sm:mx-auto">
        <div class="flex items-center mb-2">
            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg"
                 class="mr-2">
                <path fill-rule="evenodd" clip-rule="evenodd"
                      d="M8.4845 2.49512C9.15808 1.32845 10.842 1.32845 11.5156 2.49512L17.7943 13.3701C18.4678 14.5368 17.6259 15.9951 16.2787 15.9951H3.72136C2.37421 15.9951 1.53224 14.5368 2.20582 13.3701L8.4845 2.49512ZM10 5.00012C10.4142 5.00012 10.75 5.33591 10.75 5.75012V9.25012C10.75 9.66434 10.4142 10.0001 10 10.0001C9.58579 10.0001 9.25 9.66434 9.25 9.25012L9.25 5.75012C9.25 5.33591 9.58579 5.00012 10 5.00012ZM10 14.0001C10.5523 14.0001 11 13.5524 11 13.0001C11 12.4478 10.5523 12.0001 10 12.0001C9.44772 12.0001 9 12.4478 9 13.0001C9 13.5524 9.44772 14.0001 10 14.0001Z"
                      fill="#CA383A"/>
            </svg>
            <h2 class="text-sm font-semibold text-red-500">Suspend Project</h2>
        </div>
        <p class="text-xs mb-4 ml-7">Are you sure you want to suspend this project?.</p>

        <!-- Suspend Form -->
        <form wire:submit.prevent="suspend">

            <!-- Buttons -->
            <div class="flex justify-end mt-4">
                <button type="button" @click="closeSuspendModal()" class="bg-white border border-gray-300 text-gray-700 rounded-md text-xs px-4 py-2 hover:bg-gray-400">
                    Cancel
                </button>
                <button type="submit" onclick="confirmSuspendAction()" class="bg-red-500 text-white rounded-md px-4 py-2 text-xs hover:bg-green-600 ml-2">
                    Suspend
                </button>
            </div>
        </form>


    </div>
</div>

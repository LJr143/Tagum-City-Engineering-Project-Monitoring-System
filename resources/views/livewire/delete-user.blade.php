<div>
    <!-- Trigger Button for Deletion -->
    <button type="button" wire:click="$set('confirming', true)"
            class="flex bg-red-500 text-white text-xs px-4 py-2 rounded shadow-md hover:bg-red-600 focus:outline-none">
        Delete User
        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="ml-2">
            <path d="M10 10V16" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
            <path d="M14 10V16" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
            <path d="M18 6V18C18 19.1046 17.1046 20 16 20H8C6.89543 20 6 19.1046 6 18V6" stroke="white"
                  stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
            <path d="M4 6H20" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
            <path d="M15 6V5C15 3.89543 14.1046 3 13 3H11C9.89543 3 9 3.89543 9 5V6" stroke="white" stroke-width="1.5"
                  stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
    </button>

    <!-- Confirmation Modal -->
    @if ($confirming)
        <div class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50">
            <div class="bg-white rounded-lg shadow-lg p-6 w-1/3">
                <div class="flex items-center mb-2">
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg" class="mr-2">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M8.4845 2.49512C9.15808 1.32845 10.842 1.32845 11.5156 2.49512L17.7943 13.3701C18.4678 14.5368 17.6259 15.9951 16.2787 15.9951H3.72136C2.37421 15.9951 1.53224 14.5368 2.20582 13.3701L8.4845 2.49512ZM10 5.00012C10.4142 5.00012 10.75 5.33591 10.75 5.75012V9.25012C10.75 9.66434 10.4142 10.0001 10 10.0001C9.58579 10.0001 9.25 9.66434 9.25 9.25012L9.25 5.75012C9.25 5.33591 9.58579 5.00012 10 5.00012ZM10 14.0001C10.5523 14.0001 11 13.5524 11 13.0001C11 12.4478 10.5523 12.0001 10 12.0001C9.44772 12.0001 9 12.4478 9 13.0001C9 13.5524 9.44772 14.0001 10 14.0001Z" fill="#CA383A"/>
                    </svg>
                    <h2 class="text-sm font-semibold text-red-500">Delete Project</h2>
                </div>
                <p class="text-xs mb-4">Are you sure you want to delete this user? This action cannot be undone.</p>

                <div class="flex justify-end">
                    <button type="button" wire:click="$set('confirming', false)"
                            class="bg-white border border-gray-300 text-gray-700 rounded-md text-xs px-4 py-2 hover:bg-gray-400">
                        Cancel
                    </button>
                    <button type="button" wire:click="confirmDelete"
                            class="bg-red-500 text-white rounded-md px-4 py-2 text-xs hover:bg-red-600 ml-2">
                        Delete
                    </button>
                </div>
            </div>
        </div>
    @endif
</div>

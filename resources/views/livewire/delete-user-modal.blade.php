<div>
    <!-- Button to trigger the modal -->
    <button wire:click="openModal" class="bg-red-600 text-white px-4 py-2 rounded-md hover:bg-red-700">
        Delete User
    </button>

    <!-- Modal -->
    @if($isOpen)
        <div class="fixed inset-0 z-50 bg-black bg-opacity-50 flex items-center justify-center p-4">
            <div class="bg-white p-6 rounded-lg shadow-lg w-full max-w-sm">
                <div class="flex justify-between items-center mb-4">
                    <div class="flex items-center text-red-600">

                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.29 3.86L1.82 18a1 1 0 000 1.14A1 1 0 002.72 20h18.56a1 1 0 00.9-1.14l-8.47-14.14a1 1 0 00-1.8 0zM12 9v4m0 4h.01"/>
                        </svg>
                        <h2 class="text-lg font-semibold">Delete User</h2>
                    </div>
                    <button wire:click="closeModal" class="text-gray-400 hover:text-gray-600">
                        <!-- Close (X) SVG Icon -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                </div>
                <p class="text-gray-700 ml-8 mb-6 text-left">
                    Are you sure you want to remove this user? This process cannot be undone.
                </p>
                <div class="flex justify-end space-x-2">
                    <button wire:click="closeModal" class="px-4 py-2 bg-white border border-gray-300 text-gray-700 rounded-md hover:bg-gray-100">
                        Cancel
                    </button>
                    <button wire:click="deleteUser" class="px-4 py-2 bg-red-600 text-white rounded-md hover:bg-red-700">
                        Delete
                    </button>
                </div>
            </div>
        </div>
    @endif
</div>

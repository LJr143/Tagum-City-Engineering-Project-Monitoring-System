<x-app-layout mainClass="flex" headerClass="shadow-[0px_1px_2px_-1px_rgba(0,0,0,0.1)] ">

    <x-slot name="sidebar">
        <x-sidebar></x-sidebar>
    </x-slot>

    <x-slot name="header">
        <x-header></x-header>
    </x-slot>

    <x-slot name="main">
        <div class="container mx-auto p-2">
            <div class="container mx-auto p-2">
                <!-- Project Header -->
                <div class="flex flex-col items-end space-y-2 w-full">
                    <div class="flex space-x-2">

                        @if (auth()->user()->isAdmin())
                        <button onclick="openDeleteModal()" class="bg-red-500 text-white text-xs px-4 py-2 rounded shadow-md hover:bg-red-600 focus:outline-none flex items-center space-x-2">
                            <span>Delete</span>
                            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M10 10V16" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M14 10V16" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M18 6V18C18 19.1046 17.1046 20 16 20H8C6.89543 20 6 19.1046 6 18V6" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M4 6H20" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M15 6V5C15 3.89543 14.1046 3 13 3H11C9.89543 3 9 3.89543 9 5V6" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </button>
                        @endif
                    </div>
                </div>


                <div>
                            <span class="bg-green-600 text-white px-3 py-1 rounded text-xs ">
                                Ref: #{{ $pow->reference_number }}
                            </span>

                    <h3 class="text-base pb-3 font-semibold leading-6 text-gray-900 mt-3 mb-5">POW {{ $index }}</h3>
                </div>
                <livewire:material-cost-table :pow_id="$pow->id" />

                <div>
                    <div class="sm:hidden">
                        <label for="tabs" class="sr-only">Select a tab</label>
                        <select id="tabs" name="tabs" onchange="changeTab(event)" class="block w-full rounded-md border-gray-300 py-2 pl-3 pr-10 text-base focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
                            <option value="materials">Materials</option>
                            <option value="labor-cost">Labor Cost</option>
                            <option value="indirect-cost">Indirect Cost</option>
                        </select>
                    </div>
                    <div class="hidden sm:block mb-4">
                        <div class="border-b border-gray-200">
                            <nav class="-mb-px flex space-x-8" aria-label="Tabs">
                                <a id="materials-tab" href="#" onclick="changeTabTo('materials')" class="border-green-600 text-green-600 whitespace-nowrap border-b-2 pb-1 px-1 text-xs font-medium" aria-current="page">Materials</a>
                                <a id="labor-cost-tab" href="#" onclick="changeTabTo('labor-cost')" class="text-gray-500 hover:border-green-600 hover:text-green-600 whitespace-nowrap border-b-2 pb-1 px-1 text-xs font-medium">Labor Cost</a>
                                <a id="indirect-cost-tab" href="#" onclick="changeTabTo('indirect-cost')" class="text-gray-500 hover:border-green-600 hover:text-green-600 whitespace-nowrap border-b-2 pb-1 px-1 text-xs font-medium">Indirect Cost</a>
                            </nav>
                        </div>
                    </div>
                </div>



                <div class="flex w-full">
                    <!-- Material Cost Section -->
                    <div id="materials" class="w-full">
                        <div class="bg-white shadow-md rounded-lg p-6">
                            <h3 class="text-sm font-semibold mb-4 text-center"> Materials</h3>
                                <div class="relative bg-white shadow rounded-lg overflow-hidden text-[12px] w-full">
                                <livewire:material-table :pow_id="$pow->id" />
                            </div>
                        </div>
                    </div>

                    <!-- Labor Cost Section -->
                    <div id="labor-cost" class="hidden w-full">
                        <div class="bg-white shadow-md rounded-lg p-6">
                            <h3 class="text-sm font-semibold mb-4 text-center">Labor Cost</h3>
                            <!-- Filter, Search, Import Inside Card -->
                            <div class="flex items-center justify-between mb-4 space-x-4">
                                <div class="flex space-x-2 ml-auto">
                                    @if (auth()->user()->isEncoder())
                                    <livewire:add-payroll :pow_id="$pow->id"/>
                                    @endif
                                    <input type="text" placeholder="Search..." class="px-2 py-1 border border-gray-300 rounded-md shadow-sm text-xs w-55">
                                </div>
                            </div>
                            <!-- Table for Material Costs -->
                            <div class="relative bg-white shadow rounded-lg overflow-hidden text-[12px] w-full">
                                <livewire:payroll-table :pow_id="$pow->id"/>
                            </div>
                        </div>
                    </div>

                    <!-- Material Cost Section -->
                    <div id="indirect-cost" class="hidden w-full">
                        <div class="bg-white shadow-md rounded-lg p-6">
                            <h3 class="text-sm font-semibold mb-4 text-center"> Indirect Cost</h3>
                            <div class="relative bg-white shadow rounded-lg overflow-hidden text-[12px] w-full">
                                <livewire:material-table :pow_id="$pow->id" />
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal for Edit Item -->
                <div id="edit-modal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden z-50">
                    <div class="bg-white rounded-lg shadow-lg p-6 w-96">
                        <h2 class="text-lg font-semibold mb-4" id="edit-modal-title">Edit Item</h2>
                        <div id="edit-modal-content">
                            <div class="mb-4">
                                <label for="labor-description" class="block text-xs font-medium text-gray-700">Labor Description</label>
                                <input type="text" id="labor-description" class="mt-1 px-2 py-2 border border-gray-300 rounded-md text-xs w-full" placeholder="Enter labor description"> <!-- Increased padding -->
                            </div>
                            <div class="mb-4">
                                <label for="labor-rate" class="block text-xs font-medium text-gray-700">Hourly Labor Rate</label>
                                <input type="text" id="labor-rate" class="mt-1 px-2 py-2 border border-gray-300 rounded-md text-xs w-full" placeholder="Enter hourly labor rate"> <!-- Increased padding -->
                            </div>
                            <div class="mb-4">
                                <label for="labor-hours" class="block text-xs font-medium text-gray-700">Estimated Labor Hours</label>
                                <input type="text" id="labor-hours" class="mt-1 px-2 py-2 border border-gray-300 rounded-md text-xs w-full" placeholder="Enter estimated labor hours"> <!-- Increased padding -->
                            </div>
                        </div>
                        <div class="flex justify-end mt-4">
                            <button onclick="closeEditModal()" class="px-4 py-1 bg-white border border-gray-300 rounded-md text-xs hover:bg-gray-300">Cancel</button>
                            <button id="edit-modal-confirm" onclick="confirmEditAction()" class="ml-2 px-4 py-2 bg-green-600 text-white rounded-md hover:bg-green-700 text-xs">Confirm</button>
                        </div>
                    </div>
                </div>
                <!-- Modal for Delete Item -->
                <div id="delete-modal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden z-50">
                    <div class="bg-white rounded-lg shadow-lg p-6 w-1/3">
                        <div class="flex items-center mb-2">
                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg" class="mr-2">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M8.4845 2.49512C9.15808 1.32845 10.842 1.32845 11.5156 2.49512L17.7943 13.3701C18.4678 14.5368 17.6259 15.9951 16.2787 15.9951H3.72136C2.37421 15.9951 1.53224 14.5368 2.20582 13.3701L8.4845 2.49512ZM10 5.00012C10.4142 5.00012 10.75 5.33591 10.75 5.75012V9.25012C10.75 9.66434 10.4142 10.0001 10 10.0001C9.58579 10.0001 9.25 9.66434 9.25 9.25012L9.25 5.75012C9.25 5.33591 9.58579 5.00012 10 5.00012ZM10 14.0001C10.5523 14.0001 11 13.5524 11 13.0001C11 12.4478 10.5523 12.0001 10 12.0001C9.44772 12.0001 9 12.4478 9 13.0001C9 13.5524 9.44772 14.0001 10 14.0001Z" fill="#CA383A"/>
                            </svg>
                            <h2 class="text-sm font-semibold text-red-500">Delete Item</h2>
                        </div>
                        <p class="text-xs mb-4">Are you sure you want to remove this item? This process cannot be undone.</p>

                        <!-- Delete Form -->
                        <form id="delete-form" action="{{ route('pow.destroy', $pow->id) }}" method="POST">
                            @csrf
                            @method('DELETE')

                            <input type="hidden" name="project_id" value="{{ $pow->project_id }}">

                            <div class="flex justify-end">
                                <button type="button" id="delete-cancel-button" onclick="closeDeleteModal()" class="bg-white border border-gray-300 text-gray-700 rounded-md text-xs px-4 py-2 hover:bg-gray-400">
                                    Cancel
                                </button>
                                <button type="submit" id="delete-modal-confirm" class="bg-red-500 text-white rounded-md px-4 py-2 text-xs hover:bg-red-600 ml-2">
                                    Delete
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- Save Modal -->
                <div id="save-modal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden z-50">
                    <div class="bg-white rounded-lg shadow-lg p-6 w-1/3">
                        <div class="flex items-center mb-2">
                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg" class="mr-2">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M3 3h14v14H3V3z" fill="#4F46E5"/>
                            </svg>
                            <h2 class="text-sm font-semibold text-gray-800">Save Changes</h2>
                        </div>
                        <p class="text-xs mb-4">Are you sure you want to save these changes? This action cannot be undone.</p>
                        <div class="flex justify-end">
                            <button id="save-cancel-button" onclick="closeSaveModal()" class="bg-white border border-gray-300 text-gray-700 rounded-md text-xs px-4 py-2 hover:bg-gray-400">
                                Cancel
                            </button>
                            <button id="save-modal-confirm" onclick="confirmSaveAction()" class="bg-green-600 text-white rounded-md px-4 py-2 text-xs hover:bg-green-700 ml-2">
                                Save
                            </button>
                        </div>
                    </div>
                </div>

            </div>


        </div>
    </x-slot>
    <script>
        // Tab Change Function
        function changeTab(event) {
            const selectedTab = event.target.value;
            changeTabTo(selectedTab);
        }

        function changeTabTo(tab) {
            document.getElementById('materials').style.display = tab === 'materials' ? 'block' : 'none';
            document.getElementById('labor-cost').style.display = tab === 'labor-cost' ? 'block' : 'none';
            document.getElementById('indirect-cost').style.display = tab === 'indirect-cost' ? 'block' : 'none';

            // Highlight active tab
            document.getElementById('materials-tab').classList.toggle('border-green-600', tab === 'materials');
            document.getElementById('materials-tab').classList.toggle('text-green-600', tab === 'materials');
            document.getElementById('labor-cost-tab').classList.toggle('border-green-600', tab === 'labor-cost');
            document.getElementById('labor-cost-tab').classList.toggle('text-green-600', tab === 'labor-cost');
            document.getElementById('indirect-cost-tab').classList.toggle('border-green-600', tab === 'indirect-cost');
            document.getElementById('indirect-cost-tab').classList.toggle('text-green-600', tab === 'indirect-cost');
        }

        // Modal Management Functions
        function openEditModal() {
            document.getElementById('edit-modal').classList.remove('hidden');
        }

        function closeEditModal() {
            document.getElementById('edit-modal').classList.add('hidden');
        }

        function confirmEditAction() {
            // Handle edit confirmation logic here
            closeEditModal();
        }

        function openDeleteModal() {
            document.getElementById('delete-modal').classList.remove('hidden');
        }

        function closeDeleteModal() {
            document.getElementById('delete-modal').classList.add('hidden');
        }

        function confirmDeleteAction() {
            // Handle delete confirmation logic here
            closeDeleteModal();
        }

        // Modal for Adding Payroll
        const modal = document.getElementById('modal');
        const openModalButton = document.getElementById('open-modal');
        const closeModalButton = document.getElementById('close-modal');

        // Function to open modal
        openModalButton.onclick = function() {
            modal.classList.remove('hidden'); // Show modal
        };

        // Function to close modal
        closeModalButton.onclick = function() {
            modal.classList.add('hidden'); // Hide modal
        };

        // Close modal when clicking outside of it
        window.onclick = function(event) {
            if (event.target === modal) {
                modal.classList.add('hidden'); // Hide modal
            }
        };
        // Function to open the Save modal
        function openSaveModal() {
            document.getElementById("save-modal").classList.remove("hidden");
        }

        // Function to close the Save modal
        function closeSaveModal() {
            document.getElementById("save-modal").classList.add("hidden");
        }

        // Function to confirm Save action
        function confirmSaveAction() {
            // Add your save logic here
            closeSaveModal();
        }

    </script>
</x-app-layout>

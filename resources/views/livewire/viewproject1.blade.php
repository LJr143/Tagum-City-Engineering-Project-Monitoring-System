<div>

    <!-- Main content -->
    <div class="flex-1 p-2">
        <main>
            <h2 class="text-xl font-semibold mb-2">Road Construction</h2>

            <!-- Cards Section -->
            <div class="flex flex-col space-y-4 mx-8">
                <div class="flex justify-end mb-4">
                    <button id="add-card-button"
                            class="bg-green-700 text-white text-xs px-4 py-2 rounded shadow-md hover:bg-green-900 focus:outline-none">
                        Add New POW
                    </button>
                </div>
                <!-- Cards Display -->
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    <!-- Cards -->

                    @for ($i = 0; $i < 6; $i++)
                    <a href="{{ route('project-cost') }}"
                       class="bg-white p-6 rounded-lg shadow-md block transform transition-transform duration-300 hover:scale-105 hover:shadow-lg">
                        <div class="bg-green-600 text-white text-xs px-2 py-1 rounded w-max mb-2">Ref: 12345</div>
                        <h3 class="text-lg font-bold text-black">POW 1</h3>
                        <p class="mt-2  text-gray-600 text-xs">Amet minim mollit non deserunt ullamco est sit aliqua dolor do amet sint. Velit officia consequat duis enim velit mollit. Exercitation veniam consequat sunt nostrud amet.</p> <br>
                        <div class="my-3 border-t border-gray-300"></div>
                        <div class="flex items-center space-x-3">
                            <div class="w-12 h-12 rounded-full bg-gray-200 flex items-center justify-center">
                                <img src="{{ asset('images/pic1.jpg') }}" alt="Engineer Image"
                                     class="w-12 h-12 rounded-full object-cover">
                            </div>
                            <div>
                                <p class="text-gray-500 text-xs ">Senior Engineer</p>
                                <p class="text-black">John Doe</p>
                            </div>
                        </div>
                    </a>
                    @endfor
                </div>
            </div>
        </main>
    </div>

    <div id="add-card-modal"
         class="fixed inset-0 bg-gray-800 bg-opacity-50 flex items-center justify-center hidden z-50">
        <div class="bg-white p-6 rounded-lg shadow-md w-96 max-w-lg relative z-60">
            <button id="close-modal" class="absolute top-2 right-2 text-gray-500 hover:text-gray-700">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                     xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
            <h3 class="text-lg font-bold mb-4">Add New POW Card</h3>

            <form action="#" method="POST" class="space-y-3">
                @csrf
                <!-- Date Row -->
                <div>
                    <label for="date" class="block text-gray-700 text-sm">Date</label>
                    <input type="date" id="date" name="date"
                           class="mt-1 p-2 w-full border rounded text-sm" required>
                </div>

                <!-- Name Row -->
                <div>
                    <label for="name" class="block text-gray-700 text-sm">Name</label>
                    <input type="text" id="name" name="name"
                           class="mt-1 p-2 w-full border rounded text-sm" required>
                </div>

                <!-- Lorem Fields Row -->
                <div class="flex space-x-2">
                    <div class="flex-1">
                        <label for="lorem1" class="block text-gray-700 text-sm">Lorem 1</label>
                        <input type="text" id="lorem1" name="lorem1"
                               class="mt-1 p-2 w-full border rounded text-sm">
                    </div>
                    <div class="flex-1">
                        <label for="lorem2" class="block text-gray-700 text-sm">Lorem 2</label>
                        <input type="text" id="lorem2" name="lorem2"
                               class="mt-1 p-2 w-full border rounded text-sm">
                    </div>
                </div>

                <!-- Role Row -->
                <div>
                    <label for="role" class="block text-gray-700 text-sm">Role</label>
                    <input type="text" id="role" name="role"
                           class="mt-1 p-2 w-full border rounded text-sm" required>
                </div>
<br>
                <!-- Buttons Row -->
                <div class="flex justify-between mt-4">
                    <button type="button" id="cancel-modal"
                            class="border border-gray-300 text-gray-800 bg-white px-3 py-1 rounded  hover:bg-gray-100 focus:outline-none text-sm flex-1 mr-2">
                        Cancel
                    </button>
                    <button type="submit"
                            class="bg-green-500 text-white px-3 py-1 rounded shadow-md hover:bg-green-600 focus:outline-none text-sm flex-1 ml-2">
                        Save
                    </button>
                </div>

            </form>
        </div>
    </div>

    <!-- Mobile Sidebar -->
    <div id="mobile-sidebar"
         class="fixed inset-0 bg-gray-800 text-white transform -translate-x-full transition-transform md:hidden">
        <div class="flex flex-col w-64 space-y-6 p-4">
            <button id="sidebar-close" class="text-white mb-4">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                     xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
            <nav>
                <ul>
                    <li><a href="#" class="block p-2 hover:bg-gray-700 rounded">Home</a></li>
                    <li><a href="#" class="block p-2 hover:bg-gray-700 rounded">About</a></li>
                    <li><a href="#" class="block p-2 hover:bg-gray-700 rounded">Services</a></li>
                    <li><a href="#" class="block p-2 hover:bg-gray-700 rounded">Contact</a></li>
                </ul>
            </nav>
        </div>
    </div>
</div>
<script>
    // Get modal and buttons
    const addCardButton = document.getElementById('add-card-button');
    const modal = document.getElementById('add-card-modal');
    const closeModalButton = document.getElementById('close-modal');
    const cancelModalButton = document.getElementById('cancel-modal');

    // Show modal
    addCardButton.addEventListener('click', () => {
        modal.classList.remove('hidden');
    });

    // Close modal
    closeModalButton.addEventListener('click', () => {
        modal.classList.add('hidden');
    });

    cancelModalButton.addEventListener('click', () => {
        modal.classList.add('hidden');
    });

    // Close modal when clicking outside of it
    window.addEventListener('click', (e) => {
        if (e.target === modal) {
            modal.classList.add('hidden');
        }
    });
</script>

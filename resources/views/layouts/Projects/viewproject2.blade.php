<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Sidebar and Header with Tables</title>
    @vite(['resources/css/app.css'])
</head>

<body class="font-sans antialiased bg-white">

    <!-- Sidebar -->
    <div class="flex h-screen bg-white text-gray-800">
        <!-- Sidebar for Desktop -->
        <div class="hidden md:flex flex-col w-64 space-y-6 p-4 bg-white-800 text-black">
            <h1 class="text-2xl font-bold">Sidebar</h1>
            <nav>
                <ul>
                    <li><a href="#" class="block p-2 hover:bg-white-700 rounded">Home</a></li>
                    <li><a href="#" class="block p-2 hover:bg-white-700 rounded">About</a></li>
                    <li><a href="#" class="block p-2 hover:bg-white-700 rounded">Services</a></li>
                    <li><a href="#" class="block p-2 hover:bg-white-700 rounded">Contact</a></li>
                </ul>
            </nav>
        </div>

        <!-- Responsive for mobile -->
        <div class="md:hidden flex items-center p-4 bg-gray-800 text-white">
            <button id="sidebar-toggle" class="focus:outline-none">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                </svg>
            </button>
            <h1 class="ml-4 text-xl font-bold">Header</h1>
        </div>

        <!-- Main Content -->
        <div class="flex-1 p-4">
            <header class="hidden md:block bg-white shadow p-4 mb-4">
                <h1 class="text-2xl font-bold">Header</h1>
            </header>
            <main>
                <h2 class="text-xl font-semibold mb-4">Road Construction</h2>

                <!-- First Table -->
                <div class="overflow-x-auto">
                    <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow-md">
                        <thead>
                            <tr>
                                <th class="p-4 border-b-2">Dish Name</th>
                                <th class="p-4 border-b-2">Category</th>
                                <th class="p-4 border-b-2">Price</th>
                                <th class="p-4 border-b-2">In Stock</th>
                                <th class="p-4 border-b-2">Created At</th>
                                <th class="p-4 border-b-2">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="p-4">Dish 1</td>
                                <td class="p-4">Category 1</td>
                                <td class="p-4">€12</td>
                                <td class="p-4">Yes</td>
                                <td class="p-4">01/01/2023</td>
                                <td class="p-4">
                                    <button class="text-red-500 hover:text-red-700">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                        </svg>
                                    </button>
                                </td>
                            </tr>
                            <!-- More rows as needed -->
                        </tbody>
                    </table>
                </div>

                <!-- Second Table -->
                <div class="mt-8 overflow-x-auto">
                    <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow-md">
                        <thead>
                            <tr>
                                <th class="p-4 border-b-2">Dish Name</th>
                                <th class="p-4 border-b-2">Category</th>
                                <th class="p-4 border-b-2">Price</th>
                                <th class="p-4 border-b-2">In Stock</th>
                                <th class="p-4 border-b-2">Created At</th>
                                <th class="p-4 border-b-2">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="p-4">Dish 2</td>
                                <td class="p-4">Category 2</td>
                                <td class="p-4">€15</td>
                                <td class="p-4">No</td>
                                <td class="p-4">02/02/2023</td>
                                <td class="p-4">
                                    <button class="text-red-500 hover:text-red-700">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                        </svg>
                                    </button>
                                </td>
                            </tr>
                            <!-- More rows as needed -->
                        </tbody>
                    </table>
                </div>
            </main>
        </div>

        <!-- Mobile Sidebar -->
        <div id="mobile-sidebar" class="fixed inset-0 bg-gray-800 text-white transform -translate-x-full transition-transform md:hidden">
            <div class="flex flex-col w-64 space-y-6 p-4">
                <button id="sidebar-close" class="text-white mb-4">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
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
        document.addEventListener('DOMContentLoaded', () => {
            const sidebarToggle = document.getElementById('sidebar-toggle');
            const mobileSidebar = document.getElementById('mobile-sidebar');
            const sidebarClose = document.getElementById('sidebar-close');

            sidebarToggle.addEventListener('click', () => {
                mobileSidebar.classList.toggle('translate-x-0');
            });

            sidebarClose.addEventListener('click', () => {
                mobileSidebar.classList.add('-translate-x-full');
            });
        });
    </script>
</body>

</html>
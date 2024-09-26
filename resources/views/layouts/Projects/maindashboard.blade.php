<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <title>Responsive Sidebar and Header with Project Card</title>
    @vite(['resources/css/app.css'])
</head>

<body class="font-sans antialiased bg-white">

<!-- Sidebar -->
<div class="flex h-screen bg-white text-gray-800">
    <!-- Sidebar for Desktop -->
    <div class="hidden md:flex flex-col w-64 space-y-6 p-4 bg-gray-800 text-white">
        <h1 class="text-2xl font-bold">Sidebar</h1>
        <nav>
            <ul>
                <li><a href="#" class="block p-2 hover:bg-gray-700 rounded">Home</a></li>
                <li><a href="#" class="block p-2 hover:bg-gray-700 rounded">About</a></li>
                <li><a href="#" class="block p-2 hover:bg-gray-700 rounded">Services</a></li>
                <li><a href="#" class="block p-2 hover:bg-gray-700 rounded">Contact</a></li>
            </ul>
        </nav>
    </div>

    <!-- Main Content -->
    <div class="flex-1 p-4">
        <h3 class="text-base font-semibold leading-6 text-gray-900">Dashboard</h3>

        <dl class="mt-5 grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-3">
            <!-- Card Component -->
            <div class="relative overflow-hidden rounded-lg bg-white px-2 pb-8 pt-5 shadow sm:px-6 sm:pt-6">
                <dt>
                    <div class="absolute rounded-md p-3 bg-green-700 bg-opacity-70">
                        <svg class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" />
                        </svg>
                    </div>
                    <p class="ml-16 text-xl font-semibold text-gray-900">71,897</p>
                    <p class="ml-16 truncate text-sm font-normal text-gray-500">Total Project</p>
                </dt>
                <dd class="ml-16 flex items-center pb-4 sm:pb-5">
                    <p class="flex items-center text-xs font-small text-green-600">
                        <svg class="h-5 w-5 flex-shrink-0 text-green-500" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd" d="M10 17a.75.75 0 01-.75-.75V5.612L5.29 9.77a.75.75 0 01-1.08-1.04l5.25-5.5a.75.75 0 011.08 0l5.25 5.5a.75.75 0 11-1.08 1.04l-3.96-4.158V16.25A.75.75 0 0110 17z" clip-rule="evenodd" />
                        </svg>
                        <span class="sr-only">Increased by </span>
                        122% (30 days)
                    </p>
                </dd>
            </div>
            <div class="relative overflow-hidden rounded-lg bg-white px-2 pb-8 pt-5 shadow sm:px-6 sm:pt-6">
                <dt>
                    <div class="absolute rounded-md p-3 bg-green-700 bg-opacity-70">
                        <svg class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" />
                        </svg>
                    </div>
                    <p class="ml-16 text-xl font-semibold text-gray-900">71,897</p>
                    <p class="ml-16 truncate text-sm font-normal text-gray-500">Total Project</p>
                </dt>
                <dd class="ml-16 flex items-center pb-4 sm:pb-5">
                    <p class="flex items-center text-xs font-small text-green-600">
                        <svg class="h-5 w-5 flex-shrink-0 text-green-500" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd" d="M10 17a.75.75 0 01-.75-.75V5.612L5.29 9.77a.75.75 0 01-1.08-1.04l5.25-5.5a.75.75 0 011.08 0l5.25 5.5a.75.75 0 11-1.08 1.04l-3.96-4.158V16.25A.75.75 0 0110 17z" clip-rule="evenodd" />
                        </svg>
                        <span class="sr-only">Increased by </span>
                        122% (30 days)
                    </p>
                </dd>
            </div>
            <div class="relative overflow-hidden rounded-lg bg-white px-2 pb-8 pt-5 shadow sm:px-6 sm:pt-6">
                <dt>
                    <div class="absolute rounded-md p-3 bg-green-700 bg-opacity-70">
                        <svg class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" />
                        </svg>
                    </div>
                    <p class="ml-16 text-xl font-semibold text-gray-900">71,897</p>
                    <p class="ml-16 truncate text-sm font-normal text-gray-500">Total Project</p>
                </dt>
                <dd class="ml-16 flex items-center pb-4 sm:pb-5">
                    <p class="flex items-center text-xs font-small text-green-600">
                        <svg class="h-5 w-5 flex-shrink-0 text-green-500" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd" d="M10 17a.75.75 0 01-.75-.75V5.612L5.29 9.77a.75.75 0 01-1.08-1.04l5.25-5.5a.75.75 0 011.08 0l5.25 5.5a.75.75 0 11-1.08 1.04l-3.96-4.158V16.25A.75.75 0 0110 17z" clip-rule="evenodd" />
                        </svg>
                        <span class="sr-only">Increased by </span>
                        122% (30 days)
                    </p>
                </dd>
            </div>
        </dl>

        <!-- Project Card Section -->
        <div class="mt-8">
            <div class="relative overflow-hidden rounded-lg bg-white px-4 pb-8 pt-5 shadow sm:px-6 sm:pt-6">
                <h1 class="text-lg font-semibold text-gray-900">Projects</h1>
                <p class="mt-2 text-sm text-gray-700">A list of all the projects, including their name, the person in charge, cost, and progress status.</p>
                <div class="mt-4 flex justify-end">
                    <button type="button" class="block rounded-md bg-green-600 px-3 py-1 text-center text-xs font-small text-white shadow-sm hover:bg-green-800 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-green-600">View All</button>
                </div>

                <!-- Projects Table -->
                <div class="mt-8 flow-root">
                    <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                            <div class="relative bg-white shadow rounded-lg">
                                <table class="min-w-full table-fixed divide-y divide-gray-300">
                                    <thead>
                                    <tr>
                                        <th scope="col" class="relative px-7 sm:w-12 sm:px-6">
                                            <input type="checkbox" class="absolute left-4 top-1/2 -mt-2 h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-600">
                                        </th>
                                        <th scope="col" class="min-w-[12rem] py-3.5 pr-3 text-left text-sm font-semibold text-gray-900">Project Name</th>
                                        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Name of Person</th>
                                        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Project Cost</th>
                                        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Progress</th>
                                        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Status</th>
                                        <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-3">
                                            <span class="sr-only">Status</span>
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody class="divide-y divide-gray-200 bg-white">
                                    <tr>
                                        <td class="relative px-7 sm:w-12 sm:px-6">
                                            <input type="checkbox" class="absolute left-4 top-1/2 -mt-2 h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-600">
                                        </td>
                                        <td class="whitespace-nowrap py-4 pr-3 text-sm font-medium text-gray-900">Project Alpha</td>
                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">John Doe</td>
                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">$10,000</td>
                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                            <div class="flex items-center">
                                                <div class="relative">
                                                    <svg class="w-10 h-10" viewBox="0 0 36 36">
                                                        <path
                                                            class="text-gray-300"
                                                            stroke-width="3"
                                                            stroke="currentColor"
                                                            fill="none"
                                                            d="M18 2.0845a15.9155 15.9155 0 0 1 0 31.831"
                                                        />
                                                        <path
                                                            class="text-green-600"
                                                            stroke-width="3"
                                                            stroke-linecap="round"
                                                            stroke="currentColor"
                                                            fill="none"
                                                            d="M18 2.0845a15.9155 15.9155 0 0 1 0 31.831"
                                                            stroke-dasharray="75 100"
                                                        />
                                                    </svg>
                                                    <span class="absolute left-0 top-0 w-full h-full flex items-center justify-center text-sm text-gray-900">75%</span>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                            <span class="inline-flex rounded-full px-2 text-xs font-semibold leading-5 text-green-800 bg-green-100">Completed</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="relative px-7 sm:w-12 sm:px-6">
                                            <input type="checkbox" class="absolute left-4 top-1/2 -mt-2 h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-600">
                                        </td>
                                        <td class="whitespace-nowrap py-4 pr-3 text-sm font-medium text-gray-900">Project Beta</td>
                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">Jane Smith</td>
                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">$15,000</td>
                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                            <div class="flex items-center">
                                                <div class="relative">
                                                    <svg class="w-10 h-10" viewBox="0 0 36 36">
                                                        <path
                                                            class="text-gray-300"
                                                            stroke-width="3"
                                                            stroke="currentColor"
                                                            fill="none"
                                                            d="M18 2.0845a15.9155 15.9155 0 0 1 0 31.831"
                                                        />
                                                        <path
                                                            class="text-yellow-600"
                                                            stroke-width="3"
                                                            stroke-linecap="round"
                                                            stroke="currentColor"
                                                            fill="none"
                                                            d="M18 2.0845a15.9155 15.9155 0 0 1 0 31.831"
                                                            stroke-dasharray="50 100"
                                                        />
                                                    </svg>
                                                    <span class="absolute left-0 top-0 w-full h-full flex items-center justify-center text-sm text-gray-900">50%</span>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                            <span class="inline-flex rounded-full px-2 text-xs font-semibold leading-5 text-yellow-800 bg-yellow-100">In Progress</span>
                                        </td>
                                    </tr>
                                    <!-- Additional rows... -->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>

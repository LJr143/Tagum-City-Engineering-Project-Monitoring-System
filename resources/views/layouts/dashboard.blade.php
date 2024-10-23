<x-app-layout mainClass="flex" headerClass="shadow-[0px_1px_2px_-1px_rgba(0,0,0,0.1)] ">


    <x-slot name="sidebar">
        <x-sidebar></x-sidebar>
    </x-slot>


    <x-slot name="header">
        <x-header></x-header>
    </x-slot>

    <x-slot name="main">

        <div class="flex h-screen text-gray-800">

            <!-- Main Content -->
            <div class="flex-1 p-4">
                <h3 class="text-base font-semibold leading-6 text-gray-900">Dashboard</h3>

                <dl class="mt-5 grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-4"> <!-- Increased gap to 4 -->

                    <div
                        class="relative overflow-hidden rounded-lg bg-white px-3 pb-4 pt-4 shadow sm:px-3 sm:pt-4 lg:w-49">
                        <dt>
                            <div
                                class=" ml-7 absolute rounded-full p-2 bg-green-700 bg-opacity-70 w-10 h-10 flex items-center justify-center">
                                <svg class="h-5 w-5 text-white" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                     stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z"/>
                                </svg>
                            </div>
                            <p class="ml-20 text-lg font-semibold text-gray-900">{{ $totalProjects }}</p>
                            <p class="ml-20 truncate text-xs font-normal text-gray-500">Total Projects</p>
                        </dt>
                    </div>

                    <div
                        class="relative overflow-hidden rounded-lg bg-white px-3 pb-4 pt-4 shadow sm:px-3 sm:pt-4 lg:w-49">
                        <dt>
                            <div
                                class=" ml-7 absolute rounded-full p-2 bg-green-700 bg-opacity-70 w-10 h-10 flex items-center justify-center">
                                <svg class="h-5 w-5 text-white" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                     stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z"/>
                                </svg>
                            </div>
                            <p class="ml-20 text-lg font-semibold text-gray-900">{{$pendingProjects}}</p>
                            <p class="ml-20 truncate text-xs font-normal text-gray-500">Pending Projects</p>
                        </dt>
                    </div>

                    <div
                        class="relative overflow-hidden rounded-lg bg-white px-3 pb-4 pt-4 shadow sm:px-3 sm:pt-4 lg:w-49">
                        <dt>
                            <div
                                class=" ml-7 absolute rounded-full p-2 bg-green-700 bg-opacity-70 w-10 h-10 flex items-center justify-center">
                                <svg class="h-5 w-5 text-white" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                     stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z"/>
                                </svg>
                            </div>
                            <p class="ml-20 text-lg font-semibold text-gray-900">{{ $completedProjects }}</p>
                            <p class="ml-20 truncate text-xs font-normal text-gray-500">Completed Projects</p>
                        </dt>
                    </div>

                    <div
                        class="relative overflow-hidden rounded-lg bg-white px-3 pb-4 pt-4 shadow sm:px-3 sm:pt-4 lg:w-49">
                        <dt>
                            <div
                                class=" ml-7 absolute rounded-full p-2 bg-green-700 bg-opacity-70 w-10 h-10 flex items-center justify-center">
                                <svg class="h-5 w-5 text-white" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                     stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z"/>
                                </svg>
                            </div>
                            <p class="ml-20 text-lg font-semibold text-gray-900">{{ $suspendedProjects }}</p>
                            <p class="ml-20 truncate text-xs font-normal text-gray-500">Suspended Projects</p>
                        </dt>
                    </div>
                </dl>

                <!-- Project Card Section -->
                <div class="mt-8">
                    <div class="relative overflow-hidden rounded-lg bg-white px-4 pb-8 pt-5 shadow sm:px-6 sm:pt-6">
                        <h1 class="text-base font-semibold leading-6 text-gray-900">Projects</h1>
                        <p class="mt-2 text-xs text-gray-700">A list of all the projects, including their name, the
                            person in charge, cost, and progress status.</p>
                        <div class="mt-4 flex justify-end">
                            <a href="{{ route('project-main') }}"
                               class="block rounded-md bg-green-600 px-3 py-1 text-center text-xs font-small text-white shadow-sm hover:bg-green-800 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-green-600">
                                View All
                            </a>
                        </div>

                        <!-- projects Table -->
                        <div class="mt-8 flow-root">
                            <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                                <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                                    <div class="relative bg-white shadow rounded-lg">
                                        <table class="min-w-full table-fixed divide-y divide-gray-300">
                                            <thead>
                                            <tr class="">
                                                <th scope="col"
                                                    class="min-w-[12rem] py-3.5 px-4 pr-3 text-left text-sm font-semibold text-gray-900">
                                                    Project Name
                                                </th>
                                                <th scope="col"
                                                    class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                                    Project Cost
                                                </th>
                                                <th scope="col"
                                                    class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                                    Progress
                                                </th>
                                                <th scope="col"
                                                    class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                                    Status
                                                </th>
                                                <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-3">
                                                    <span class="sr-only">Status</span>
                                                </th>
                                            </tr>
                                            </thead>
                                            <tbody class="divide-y divide-gray-200 bg-white">

                                            @foreach($projects as $project)
                                                <tr>
                                                    <td class="whitespace-nowrap py-1 px-4 pr-3 text-xs font-small text-gray-900">{{ $project->title }}</td>
                                                    <td class="whitespace-nowrap px-3 py-1 text-xs text-gray-500">
                                                        Php {{$project->project_cost}}</td>
                                                    <td class="whitespace-nowrap px-3 py-1 text-xs text-gray-500">
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
                                                                        stroke-dasharray="0 100"
                                                                    />
                                                                </svg>
                                                                <span
                                                                    class="absolute left-0 top-0 w-full h-full flex items-center justify-center text-sm text-gray-900">0%</span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="whitespace-nowrap text-sm text-gray-500 text-center">
                                                     <span class="flex items-center justify-center text-center rounded-[5px] capitalize p-2 w-[150px] text-xs font-semibold leading-5
                                                            @if($project->status == 'pending')
                                                                text-yellow-800 bg-yellow-100
                                                            @elseif($project->status == 'completed')
                                                                text-green-800 bg-green-100
                                                            @else
                                                                text-red-800 bg-red-100
                                                            @endif">
                                                            {{ $project->status }}
                                                        </span>

                                                    </td>

                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>

                                        @if ($projects->isEmpty())
                                            <!-- No pagination if no cards -->
                                        @else
                                            {{-- Pagination Links --}}
                                            <div class="w-full py-5 flex justify-center items-center">
                                                {{ $projects->links('livewire.pagination.tailwind-pagination') }} <!-- Render pagination links -->
                                            </div>
                                        @endif

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </x-slot>


</x-app-layout>

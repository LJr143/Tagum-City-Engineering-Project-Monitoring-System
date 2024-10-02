<x-app-layout mainClass="flex" headerClass="shadow-[0px_1px_2px_-1px_rgba(0,0,0,0.1)] ">

    <x-slot name="sidebar">
        <x-sidebar></x-sidebar>
    </x-slot>


    <x-slot name="header">
        <x-header></x-header>
    </x-slot>

    <x-slot name="main">

        <div>
            <!-- Header -->
            <header class="flex justify-between items-center">
                <h1 class="text-xl font-bold">Projects</h1>

            </header>

            <!-- Modal -->
            <livewire:add-project/>

            <!-- Project Filter -->
            <div x-data="{ selected: 'all' }" class="flex mb-6 bg-gray-200 p-1.5 rounded-full max-w-xl justify-between">
                <!-- All projects Button -->
                <button
                    :class="selected === 'all' ? 'bg-white text-black' : 'bg-gray-100 text-gray-600 hover:text-black'"
                    class="flex-grow px-3 py-1 rounded-full mx-1 font-semibold text-xs"
                    @click="selected = 'all'">
                    <span :class="selected === 'all' ? 'text-green-500' : 'text-gray-600'">{{$projects->count()}}</span> All Projects
                </button>

                <!-- Pending Button -->
                <button
                    :class="selected === 'pending' ? 'bg-white text-black' : 'bg-gray-100 text-gray-600 hover:text-black'"
                    class="flex-grow px-3 py-1 rounded-full mx-1 font-semibold text-xs"
                    @click="selected = 'pending'">
                    <span :class="selected === 'pending' ? 'text-green-500' : 'text-gray-600'">{{$pendingProjects}}</span> Pending
                </button>

                <!-- Closed Button -->
                <button
                    :class="selected === 'closed' ? 'bg-white text-black' : 'bg-gray-100 text-gray-600 hover:text-black'"
                    class="flex-grow px-3 py-1 rounded-full mx-1 font-semibold text-xs"
                    @click="selected = 'closed'">
                    <span :class="selected === 'closed' ? 'text-green-500' : 'text-gray-600'">{{$completedProjects}}</span> Completed
                </button>
            </div>

            @foreach($projects as $project)
                <div class="grid gap-4 p-3">
                    <a href="{{ route('view-project-pow') }}" class="flex w-full">
                        <div class="bg-white rounded-lg shadow-md flex items-center w-full">
                            <!-- Left-aligned SVG -->
                            <svg width="63" height="119" viewBox="0 0 63 119" fill="none" xmlns="http://www.w3.org/2000/svg" class="mr-4 object-cover" preserveAspectRatio="none">
                                <path d="M26.9539 0.472583L17.9658 0.300643C12.6069 0.198131 8.17957 4.45924 8.07705 9.8181L6.20058 107.911C6.09807 113.27 10.3592 117.697 15.718 117.8L43.3974 118.329L26.5367 98.4638C23.2948 94.6443 23.4931 88.9849 26.9942 85.4016L38.3323 73.7973C41.1975 70.8648 41.9109 66.4482 40.1145 62.7629L34.158 50.5422C33.8177 49.844 33.5624 49.1074 33.3977 48.3483L31.0298 37.4374C30.1842 33.5412 31.8076 29.5243 35.1227 27.3095L55.5443 13.6661C59.0865 11.2996 59.6827 6.33106 56.8009 3.19371V3.19371C55.5169 1.79593 53.7168 0.984545 51.8192 0.948245L26.9539 0.472583Z" fill="#249000" fill-opacity="0.78"/>
                                <path d="M20.9422 0.358569L11.954 0.18663C6.59517 0.0841172 2.16785 4.34523 2.06533 9.70409L0.188865 107.797C0.0863528 113.156 4.34747 117.583 9.70633 117.686L37.3857 118.215L20.525 98.3498C17.2831 94.5303 17.4813 88.8709 20.9825 85.2875L32.3206 73.6833C35.1858 70.7508 35.8991 66.3342 34.1028 62.6489L28.1463 50.4282C27.8059 49.73 27.5507 48.9934 27.3859 48.2343L25.0181 37.3234C24.1725 33.4272 25.7958 29.4103 29.1109 27.1955L49.5325 13.5521C53.0748 11.1856 53.671 6.21705 50.7892 3.0797V3.0797C49.5052 1.68192 47.7051 0.870532 45.8075 0.834231L20.9422 0.358569Z" fill="#75E450"/>
                            </svg>

                            <!-- Project Details -->
                            <div class="flex flex-col w-1/4">
                                <div class="text-green-500 text-xs font-bold mb-2 truncate"># {{ $project->id }}</div>
                                <h2 class="text-lg font-semibold truncate" title="{{ $project->title }}">{{ $project->title }}</h2>
                                <div class="flex items-center mt-1">
                                    <p class="text-gray-500 text-xs font-semibold truncate">{{ $project->created_at }}</p>
                                </div>
                            </div>

                            <!-- Project Cost with SVG aligned -->
                            <div class="flex items-center w-1/5">
                                <div class="text-left truncate">
                                    <p class="text-gray-500 text-xs font-bold">Project Cost</p>
                                    <p class="text-lg font-semibold truncate">Php {{ $project->project_cost }}</p>
                                </div>
                            </div>

                            <!-- Cost percentage Section -->
                            <div class="flex items-center w-1/4 flex-col mt-2">
                                <span class="text-black text-xs mb-1">Cost Percentage</span>
                                <div class="relative w-48 h-3 bg-gray-200 rounded-full overflow-hidden">
                                    <div class="bg-green-500 h-full" style="width: 60%;"></div>
                                </div>
                                <span class="ml-2 text-black text-xs">60%</span>
                            </div>

                            <!-- Project percentage Section -->
                            <div class="flex items-center w-1/4 flex-col mt-2">
                                <span class="text-black text-xs mb-1">Project Percentage</span>
                                <div class="relative w-48 h-3 bg-gray-200 rounded-full overflow-hidden">
                                    <div class="bg-yellow-500 h-full" style="width: 70%;"></div>
                                </div>
                                <span class="ml-2 text-black text-xs">70%</span>
                            </div>

                            <!-- Dropdown with buttons and "Pending" button aligned -->
                            <div class="flex items-center justify-end space-x-1" x-data="{ open: false, viewModal: false, editModal: false, deleteModal: false }">
                                <span class="bg-green-500 text-white px-4 py-1 rounded-3xl text-xs">Pending</span>
                            </div>

                            <!-- Right-aligned SVG -->
                            <svg width="64" height="119" viewBox="0 0 61 119" fill="none" xmlns="http://www.w3.org/2000/svg" class="ml-4 object-cover" preserveAspectRatio="none">
                                <path d="M36.3039 0.472338L45.2921 0.300399C50.6509 0.197887 55.0782 4.459 55.1808 9.81786L57.0572 107.911C57.1597 113.269 52.8986 117.697 47.5398 117.799L19.8604 118.329L36.7211 98.4636C39.963 94.6441 39.7647 88.9847 36.2636 85.4013L24.9255 73.797C22.0603 70.8646 21.347 66.448 23.1433 62.7626L29.0998 50.542C29.4401 49.8438 29.6954 49.1072 29.8602 48.3481L32.228 37.4371C33.0736 33.541 31.4503 29.524 28.1352 27.3093L7.71355 13.6659C4.17131 11.2994 3.57512 6.33081 6.45694 3.19347V3.19347C7.74088 1.79568 9.54096 0.984301 11.4386 0.948L36.3039 0.472338Z" fill="#249000" fill-opacity="0.78"/>
                                <path d="M42.3156 0.358325L51.3038 0.186386C56.6626 0.0838731 61.09 4.34499 61.1925 9.70385L63.0689 107.797C63.1715 113.155 58.9103 117.583 53.5515 117.685L25.8721 118.215L42.7328 98.3496C45.9747 94.5301 45.7765 88.8706 42.2753 85.2873L30.9372 73.683C28.072 70.7506 27.3587 66.334 29.155 62.6487L35.1115 50.428C35.4519 49.7298 35.7071 48.9932 35.8719 48.2341L38.2397 37.3232C39.0853 33.427 37.462 29.4101 34.1469 27.1954L13.7253 13.552C10.1831 11.1855 9.5869 6.21694 12.4687 3.0796V3.0796C13.7527 1.68182 15.5528 0.870434 17.4504 0.834133L42.3156 0.358325Z" fill="#75E450"/>
                            </svg>
                        </div>
                    </a>
                </div>
            @endforeach


        </div>


    </x-slot>

</x-app-layout>

<div class="w-full">
    <!-- Project Filter -->
    <div x-data="{ selected: @entangle('selectedStatus') }"
         class="flex mb-4 bg-gray-200 p-1.5 rounded-full max-w-xl justify-between">

        <!-- All projects Button -->
        <button
            :class="selected === 'all' ? 'bg-white text-black' : 'text-gray-600 hover:text-black'"
            class="flex-grow px-3 py-1 rounded-full mx-1 font-semibold text-xs"
            @click="selected = 'all'; $wire.filterProjects()">
            <span :class="selected === 'all' ? 'text-green-500' : 'text-gray-600'">{{ $totalProjects  }}</span> All
            Projects
        </button>

        <!-- Pending Button -->
        <button
            :class="selected === 'pending' ? 'bg-white text-black' : 'text-gray-600 hover:text-black'"
            class="flex-grow px-3 py-1 rounded-full mx-1 font-semibold text-xs"
            @click="selected = 'pending'; $wire.filterProjects()">
            <span :class="selected === 'pending' ? 'text-green-500' : 'text-gray-600'">{{ $pendingProjects }}</span>
            Pending
        </button>

        <!-- Completed Button -->
        <button
            :class="selected === 'completed' ? 'bg-white text-black' : 'text-gray-600 hover:text-black'"
            class="flex-grow px-3 py-1 rounded-full mx-1 font-semibold text-xs"
            @click="selected = 'completed'; $wire.filterProjects()">
            <span :class="selected === 'completed' ? 'text-green-500' : 'text-gray-600'">{{ $completedProjects }}</span>
            Completed
        </button>

        <!-- Suspended Button -->
        <button
            :class="selected === 'suspended' ? 'bg-white text-black' : 'text-gray-600 hover:text-black'"
            class="flex-grow px-3 py-1 rounded-full mx-1 font-semibold text-xs"
            @click="selected = 'suspended'; $wire.filterProjects()">
            <span :class="selected === 'suspended' ? 'text-green-500' : 'text-gray-600'">{{ $suspendedProjects }}</span>
            Suspended
        </button>
    </div>

    <!-- Date Range Filter Section -->
    <div x-data="{ startDate: @entangle('startDate'), endDate: @entangle('endDate') }" class="p-2">
        <div class="flex space-x-4 mb-4">
            <!-- Start Date -->
            <div>
                <label for="start-date" class="block text-xs text-gray-700">Start Date</label>
                <input
                    type="date"
                    id="start-date"
                    x-model="startDate"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-xs"
                    @change="$wire.filterProjects()">
            </div>

            <!-- End Date -->
            <div>
                <label for="end-date" class="block text-xs text-gray-700">End Date</label>
                <input
                    type="date"
                    id="end-date"
                    x-model="endDate"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-xs"
                    @change="$wire.filterProjects()">
            </div>

            <!-- Filter Button -->
            <div class="flex items-end">
                <button
                    @click="$wire.filterProjects()"
                    class="text-xs px-4 py-2 bg-green-500 text-white rounded-md shadow hover:bg-green-600">
                    Filter
                </button>
            </div>
        </div>

        <!-- Search Input -->
        <div class="flex-grow">
            <input
                type="text"
                placeholder="Search Projects..."
                x-model="searchTerm"
                @input="$wire.searchProjects(searchTerm)"
                class="w-1/3 border border-gray-300 rounded px-3 py-1 text-xs focus:ring-green-500 focus:border-green-500"/>
        </div>

        <div>
        </div>
    </div>
    @foreach($projects as $project)
        <div class="grid gap-2 p-2">
            <a href="{{ route('view-project-pow', ['id' => $project->id]) }}" class="flex w-full">
                <div class="w-full bg-white h-[100px] flex rounded shadow-md items-center p-5 zoom-container overflow-hidden">
                    <div class="flex">
                        <div class="flex items-center">
                            <div class="w-12 h-12 overflow-hidden rounded-full border-2 border-black">
                                <img src="{{ asset('storage/pmsAssets/pic1.jpg') }}" alt="Engineer Image"
                                     class="w-12 h-10 rounded-full object-cover">
                            </div>
                        </div>
                        <div class="flex items-center">
                            <div class="ml-5 block item-center">
                                <p class="font-bold text-[8px] text-green-500">Project Id: {{$project->id}}</p>
                                <p class="font-bold truncate" title="{{ $project->title }}" style="max-width: 150px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                                    {{ $project->title }}
                                </p>
                                <p class="text-[8px]" style="max-width: 200px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                                    <span class="font-bold">Location :</span> {{ $project->baranggay }} {{ $project->street }} {{ $project->x_axis }} {{ $project->y_axis }}
                                </p>
                                <p class="text-[8px]"><span class="font-bold">Start Date :</span> {{$project->start_date}} &nbsp; <span class="font-bold">End Date :</span> {{$project->end_date}}</p>
                                <p class="text-[8px] text-green-500"><span class="font-bold">Project Incharge : </span> {{$project->projectIncharge->first_name}} {{$project->projectIncharge->last_name}}</p>
                            </div>
                        </div>
                        <div class="ml-5 flex items-center">
                            <div class="ml-5">
                                <div class="progress-bar-container text-[12px] w-1/2 ">
                                    <label class="text-[10px] font-bold">Overall Project Progress:</label>
                                    <div class="progress-bar" style="height: 8px">
                                        <div class="target-progress" style="width: 10%;"></div>
                                        <div class="progress" style="width: 20%;"></div>
                                    </div>
                                </div>
                            </div>

                            <div class="ml-5">
                                <div class="progress-bar-container text-[12px] w-1/2">
                                    <label class="text-[10px] font-bold">Material Cost Percentage:</label>
                                    <div class="progress-bar" style="height: 8px">
                                        <div class="target-progress" style="width: 10%;"></div>
                                        <div class="progress" style="width: 20%;"></div>
                                    </div>
                                </div>
                            </div>

                            <div class="ml-5">
                                <div class="progress-bar-container text-[12px] w-1/2">
                                    <label class="text-[10px] font-bold">Labor Cost Percentage:</label>
                                    <div class="progress-bar" style="height: 8px">
                                        <div class="target-progress" style="width: 10%;"></div>
                                        <div class="progress" style="width: 20%;"></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="flex ml-10">
                            <div class="flex items-center">
                                <div class="ml-5 flex item-center justify-content-center">
                                    <div>
                                        <p class="text-[10px]"><span class="font-bold">Total Project Cost : Php </span> {{$project->formatted_total_project_cost }}</p>
                                        <p class="text-[10px]"><span class="font-bold">Total Material Cost : Php </span> {{$project->formatted_total_material_cost}}</p>
                                        <p class="text-[10px]"><span class="font-bold">Total Labor Cost : Php </span> {{$project->formatted_total_labor_cost}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="flex ml-10">
                            <div class="flex items-center">
                                <div class="ml-5 flex item-center justify-content-center">
                                    <div>
                                        <div class="status-div text-[10px] font-bold rounded-2xl px-3 py-2 w-32 text-center
                                    @if($project->status === 'completed') bg-green-500 text-white
                                    @elseif($project->status === 'pending') bg-yellow-500 text-white
                                    @elseif($project->status === 'suspended') bg-red-500 text-white
                                    @endif">
                                            {{ $project->status }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </a>
        </div>
    @endforeach



@if ($projects->isEmpty())
    @else
        {{-- Pagination Links --}}
        <div class="w-full py-5 flex justify-center items-center">
            {{ $projects->links('livewire.pagination.tailwind-pagination') }} <!-- Render pagination links -->
        </div>
    @endif
</div>

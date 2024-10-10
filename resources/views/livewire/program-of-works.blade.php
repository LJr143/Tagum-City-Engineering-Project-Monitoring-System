<div>
    <!-- Card containing Road Construction content -->
    <div class="bg-white p-6 rounded-lg shadow-md">
        <!-- Road Construction title -->
        <h2 class="text-xl font-semibold mb-2">POW</h2>
        <div class="flex flex-col space-y-4 mx-8">
{{--            <div x-data="{ open: false }" class="relative" x-cloak>--}}
{{--                <div class="flex justify-end mb-4">--}}
{{--                    <button @click="open = true"--}}
{{--                            class="bg-green-700 text-white mr-2 text-xs px-4 py-2 rounded shadow-md hover:bg-green-900 focus:outline-none">--}}
{{--                        Add New POW--}}
{{--                    </button>--}}
{{--                  --}}
{{--                </div>--}}
            @if (auth()->user()->isAdmin())
                <livewire:add-pow :project-id="$projectId"/>
            @endif


{{--            <!-- Search input and button -->--}}
{{--            <div class="flex items-center space-x-2">--}}
{{--                <input type="text" placeholder="Search" id="search-input"--}}
{{--                       wire:model="search"--}}
{{--                       class="h-8 px-3 border mr-2 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-xs" />--}}
{{--            </div>--}}

            <!-- Cards Display -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @if ($cards->isEmpty())
                    <div class="text-center text-gray-500">
                        No program of work for this project.
                    </div>
                @else
                    @foreach ($cards as $index => $card)
                        <!-- Using $index to get the incremental value -->
                        <a href="{{ route('material-table-cost', ['pow_id' => $card->id, 'index' => $index + 1]) }}"  class="bg-white p-6 rounded-lg shadow-md block transform transition-transform duration-300 hover:scale-105 hover:shadow-lg">

                            <div class="bg-green-600 text-white text-xs px-2 py-1 rounded w-max mb-2">
                                Ref: {{ $card->reference_number }}</div>
                            <h3 class="text-lg font-bold text-black">POW {{ $index + 1 }}</h3>
                            <!-- Incremental value -->
                            <p class="mt-2 text-gray-600 text-xs">{{ $card->description }}</p>
                            <p class="text-xs font-semibold text-black mt-2">Material Cost: {{ $card->total_material_cost }}</p>
                            <p class="text-xs font-semibold text-black mt-2">Labor Cost: {{ $card->total_labor_cost }}</p>
                            <p class="text-xs font-semibold text-black mt-2">Balance: 1,000</p>
                            <br>
                            <div class="my-3 border-t border-gray-300"></div>
                            <div class="flex items-center space-x-3">
                                <div class="w-12 h-12 rounded-full bg-gray-200 flex items-center justify-center">
                                    <img src="{{ asset('images/pic1.jpg') }}" alt="Engineer Image"
                                         class="w-12 h-12 rounded-full object-cover">
                                </div>
                                <div>
                                    <p class="text-gray-500 text-xs">{{ $card->engineer->position }}</p>
                                    <p class="text-black">{{ $card->engineer->first_name }} {{ $card->engineer->last_name }}</p>
                                </div>
                            </div>
                        </a>
                    @endforeach
                @endif
            </div>

            @if ($cards->isEmpty())
                <!-- No pagination if no cards -->
            @else
                {{-- Pagination Links --}}
                <div class="w-full py-5 flex justify-center items-center">
                    {{ $cards->links('livewire.pagination.tailwind-pagination') }} <!-- Render pagination links -->
                </div>
            @endif
        </div> <!-- End of Road Construction Card -->
    </div>
</div>

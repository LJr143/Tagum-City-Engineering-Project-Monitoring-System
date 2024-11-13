<div>
    <!-- Card containing Road Construction content -->
    <!-- <div class="bg-white p-6 rounded-lg shadow-md"> -->
       <!-- Road Construction title -->


        <div class="flex flex-col space-y-2">
            <div class="flex flex-row justify-between items-center mb-2">
                <h2 class="text-base font-semibold text-gray-900">Program of Work</h2>
                <div class="relative w-full md:w-auto">
                    @if (auth()->user()->isAdmin() || auth()->user()->isEncoder())
                        <livewire:add-pow :project-id="$projectId"/>
                    @endif
                </div>
            </div>

            <div class="space-y-4">
            <!-- Cards Display -->

                @if ($cards->isEmpty())
                    <div class="text-center text-gray-500 text-[12px]">
                        No program of work for this project.
                    </div>
                @else
                    @foreach ($cards as $index => $card)
                        <!-- Using $index to get the incremental value -->
                        <a href="{{ route('material-table-cost', ['pow_id' => $card->id, 'index' => $index + 1]) }}"  class="bg-white p-4 rounded-lg shadow-md flex flex-col md:flex-row items-center zoom-container overflow-hidden">
                            <div class="flex-1 mb-4 md:mb-0">
                                <div class="bg-green-600 text-white text-[10px] px-2 py-1 rounded w-max mb-1">
                                    Ref: {{ $card->reference_number }}
                                </div>
                                <p class="font-bold ">POW {{ $index + 1 }}</p>
                                <!-- Incremental value -->
                                <p class="text-[10px] text-gray-500 md:truncate w-full md:w-48">{{ $card->description }}</p>
                            </div>
                            <div class="flex-1 text-center md:text-left mb-4 md:mb-0">
                                <p class="text-[12px] font-bold {{ $totalMaterialCost != $card->total_material_cost ? 'text-red-500' : '' }}" >Php {{ number_format($card->total_material_cost, 2 )}}</p>
                                <p class="text-gray-600 text-[10px]">Material Cost</p>
                            </div>
                            <div class="flex-1 text-center md:text-left mb-4 md:mb-0">
                                <p class="text-[12px] font-bold">Php {{ number_format($card->total_labor_cost, 2) }}</p>
                                <p class="text-gray-600 text-[10px]">Labor Cost</p>
                            </div>
                            <div class="flex-1 text-center md:text-left mb-4 md:mb-0">
                                <p class="text-[12px] font-bold">Php {{ number_format($totalIndirectCost, 2) }}</p>
                                <p class="text-gray-600 text-[10px]">Total Indirect Cost</p>
                            </div>

                            <div class="flex-1 text-center md:text-left mb-4 md:mb-0">
                                <p class="text-[12px] font-bold">Php {{ number_format($totalDirectCost, 2) }}</p>
                                <p class="text-gray-600 text-[10px]">Total Direct Cost</p>
                            </div>

                            <div class="flex-1 text-center md:text-left mb-4 md:mb-0 ">
                                <p class="text-[12px] font-bold">Php {{ number_format($totalIndirectCost + $totalDirectCost), 2 }}</p>
                                <p class="text-gray-600 text-[10px]">Total Project Cost</p>
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

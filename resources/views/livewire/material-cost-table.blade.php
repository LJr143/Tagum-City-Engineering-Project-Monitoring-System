<div >
    <style>
        /* Styles remain the same */
        .modal {
            display: flex;
            justify-content: center;
            align-items: center;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.4);
            opacity: 0;
            transition: opacity 0.5s ease;
        }

        .close {
            color: #721c24;
            float: right;
            font-size: 28px;
            font-weight: bold;
            cursor: pointer;
        }

        .modal.show {
            display: flex;
            opacity: 1;
        }
    </style>

    {{-- Modal Warning --}}
    @if ($showWarning && auth()->user()->isProjectIncharge())
        <div id="warningModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-modal z-50">
            <div class="modal-content bg-white rounded-lg shadow-lg p-6 w-full max-w-md mx-4 sm:mx-6 md:mx-8 lg:mx-10 xl:mx-12">
                <div class="flex items-center mb-2">
                    <h2 class="text-sm font-semibold text-red-500">{{ $pow->project->status === 'terminated' ? 'Termination Notice' : 'Warning!' }}</h2>
                </div>

                <p class="text-xs mb-4">{{ $warningMessage }}</p>

                <div class="flex justify-end">
                    <button wire:click="closeWarning" class="bg-white border border-gray-300 text-gray-700 rounded-md text-xs px-4 py-2 hover:bg-gray-200">
                        Okay
                    </button>
                </div>
            </div>
        </div>
    @endif
@if ($totalMaterialCost == 0 && auth()->user()->isProjectIncharge())
        <div id="warningModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-modal z-50">
            <div class="modal-content bg-white rounded-lg shadow-lg p-6 w-full max-w-md mx-4 sm:mx-6 md:mx-8 lg:mx-10 xl:mx-12">
                <div class="flex items-center mb-2">
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg" class="mr-2">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M8.4845 2.49512C9.15808 1.32845 10.842 1.32845 11.5156 2.49512L17.7943 13.3701C18.4678 14.5368 17.6259 15.9951 16.2787 15.9951H3.72136C2.37421 15.9951 1.53224 14.5368 2.20582 13.3701L8.4845 2.49512ZM10 5.00012C10.4142 5.00012 10.75 5.33591 10.75 5.75012V9.25012C10.75 9.66434 10.4142 10.0001 10 10.0001C9.58579 10.0001 9.25 9.66434 9.25 9.25012L9.25 5.75012C9.25 5.33591 9.58579 5.00012 10 5.00012ZM10 14.0001C10.5523 14.0001 11 13.5524 11 13.0001C11 12.4478 10.5523 12.0001 10 12.0001C9.44772 12.0001 9 12.4478 9 13.0001C9 13.5524 9.44772 14.0001 10 14.0001Z" fill="#CA383A"/>
                    </svg>
                    <h2 class="text-sm font-semibold text-red-500">Warning!</h2>
                </div>
                <p class="text-xs mb-4 ml-7">Please add the Information of Materials for monitoring and updating.</p>
                <div class="flex justify-end">
                    <button id="delete-cancel-button" onclick="closeModal()" class="bg-white border border-gray-300 text-gray-700 rounded-md text-xs px-4 py-2 hover:bg-gray-200">
                        Okay
                    </button>
                </div>
            </div>
        </div>

@elseif ($totalDirectCost == 0 && auth()->user()->isProjectIncharge())
        <div id="warningModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-modal z-50">
            <div class="modal-content bg-white rounded-lg shadow-lg p-6 w-full max-w-md mx-4 sm:mx-6 md:mx-8 lg:mx-10 xl:mx-12">
                <div class="flex items-center mb-2">
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg" class="mr-2">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M8.4845 2.49512C9.15808 1.32845 10.842 1.32845 11.5156 2.49512L17.7943 13.3701C18.4678 14.5368 17.6259 15.9951 16.2787 15.9951H3.72136C2.37421 15.9951 1.53224 14.5368 2.20582 13.3701L8.4845 2.49512ZM10 5.00012C10.4142 5.00012 10.75 5.33591 10.75 5.75012V9.25012C10.75 9.66434 10.4142 10.0001 10 10.0001C9.58579 10.0001 9.25 9.66434 9.25 9.25012L9.25 5.75012C9.25 5.33591 9.58579 5.00012 10 5.00012ZM10 14.0001C10.5523 14.0001 11 13.5524 11 13.0001C11 12.4478 10.5523 12.0001 10 12.0001C9.44772 12.0001 9 12.4478 9 13.0001C9 13.5524 9.44772 14.0001 10 14.0001Z" fill="#CA383A"/>
                    </svg>
                    <h2 class="text-sm font-semibold text-red-500">Warning!</h2>
                </div>
                <p class="text-xs mb-4 ml-7">Please add the Information of Direct Cost for monitoring and updating.</p>
                <div class="flex justify-end">
                    <button id="delete-cancel-button" onclick="closeModal()" class="bg-white border border-gray-300 text-gray-700 rounded-md text-xs px-4 py-2 hover:bg-gray-200">
                        Okay
                    </button>
                </div>
            </div>
        </div>

    @elseif($totalMaterialCost != $pow->total_material_cost && auth()->user()->isProjectIncharge())

        @if($totalMaterialCost > $pow->total_material_cost && auth()->user()->isProjectIncharge())
        <div id="warningModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-modal z-50">
            <div class="modal-content bg-white rounded-lg shadow-lg p-6 w-full max-w-md mx-4 sm:mx-6 md:mx-8 lg:mx-10 xl:mx-12">
                <div class="flex items-center mb-2">
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg" class="mr-2">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M8.4845 2.49512C9.15808 1.32845 10.842 1.32845 11.5156 2.49512L17.7943 13.3701C18.4678 14.5368 17.6259 15.9951 16.2787 15.9951H3.72136C2.37421 15.9951 1.53224 14.5368 2.20582 13.3701L8.4845 2.49512ZM10 5.00012C10.4142 5.00012 10.75 5.33591 10.75 5.75012V9.25012C10.75 9.66434 10.4142 10.0001 10 10.0001C9.58579 10.0001 9.25 9.66434 9.25 9.25012L9.25 5.75012C9.25 5.33591 9.58579 5.00012 10 5.00012ZM10 14.0001C10.5523 14.0001 11 13.5524 11 13.0001C11 12.4478 10.5523 12.0001 10 12.0001C9.44772 12.0001 9 12.4478 9 13.0001C9 13.5524 9.44772 14.0001 10 14.0001Z" fill="#CA383A"/>
                    </svg>
                    <h2 class="text-sm font-semibold text-red-500">Warning!</h2>
                </div>
                <p class="text-xs mb-4">Total Material Cost Exceeds the Inputted Amount. Please Fix Immediately to Avoid Miscalculation and Incorrect Data.</p>
                <div class="flex justify-end">
                    <button id="delete-cancel-button" onclick="closeModal()" class="bg-white border border-gray-300 text-gray-700 rounded-md text-xs px-4 py-2 hover:bg-gray-200">
                        Okay
                    </button>
                </div>
            </div>
        </div>

        @else
            <div id="warningModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-modal z-50">
                <div class="modal-content bg-white rounded-lg shadow-lg p-6 w-full max-w-md mx-4 sm:mx-6 md:mx-8 lg:mx-10 xl:mx-12">
                    <div class="flex items-center mb-2">
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg" class="mr-2">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M8.4845 2.49512C9.15808 1.32845 10.842 1.32845 11.5156 2.49512L17.7943 13.3701C18.4678 14.5368 17.6259 15.9951 16.2787 15.9951H3.72136C2.37421 15.9951 1.53224 14.5368 2.20582 13.3701L8.4845 2.49512ZM10 5.00012C10.4142 5.00012 10.75 5.33591 10.75 5.75012V9.25012C10.75 9.66434 10.4142 10.0001 10 10.0001C9.58579 10.0001 9.25 9.66434 9.25 9.25012L9.25 5.75012C9.25 5.33591 9.58579 5.00012 10 5.00012ZM10 14.0001C10.5523 14.0001 11 13.5524 11 13.0001C11 12.4478 10.5523 12.0001 10 12.0001C9.44772 12.0001 9 12.4478 9 13.0001C9 13.5524 9.44772 14.0001 10 14.0001Z" fill="#CA383A"/>
                        </svg>
                        <h2 class="text-sm font-semibold text-red-500">Warning!</h2>
                    </div>
                    <p class="text-xs mb-4">Inputted Material Cost is not equal to the current total material cost. Please Fix Immediately to Avoid Miscalculation and Incorrect Data.</p>
                    <div class="flex justify-end">
                        <button id="delete-cancel-button" onclick="closeModal()" class="bg-white border border-gray-300 text-gray-700 rounded-md text-xs px-4 py-2 hover:bg-gray-200">
                            Okay
                        </button>
                    </div>
                </div>
            </div>
    @endif

    @elseif(($totalMaterialCost + $totalLaborCost) != $totalDirectCost && auth()->user()->isProjectIncharge())

        <div id="warningModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-modal z-50">
            <div class="modal-content bg-white rounded-lg shadow-lg p-6 w-full max-w-md mx-4 sm:mx-6 md:mx-8 lg:mx-10 xl:mx-12">
                <div class="flex items-center mb-2">
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg" class="mr-2">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M8.4845 2.49512C9.15808 1.32845 10.842 1.32845 11.5156 2.49512L17.7943 13.3701C18.4678 14.5368 17.6259 15.9951 16.2787 15.9951H3.72136C2.37421 15.9951 1.53224 14.5368 2.20582 13.3701L8.4845 2.49512ZM10 5.00012C10.4142 5.00012 10.75 5.33591 10.75 5.75012V9.25012C10.75 9.66434 10.4142 10.0001 10 10.0001C9.58579 10.0001 9.25 9.66434 9.25 9.25012L9.25 5.75012C9.25 5.33591 9.58579 5.00012 10 5.00012ZM10 14.0001C10.5523 14.0001 11 13.5524 11 13.0001C11 12.4478 10.5523 12.0001 10 12.0001C9.44772 12.0001 9 12.4478 9 13.0001C9 13.5524 9.44772 14.0001 10 14.0001Z" fill="#CA383A"/>
                    </svg>
                    <h2 class="text-sm font-semibold text-red-500">Warning!</h2>
                </div>
                <p class="text-xs mb-4">Total Material and Labor Cost Should Matched the total Direct Cost. Please Fix Immediately to Avoid Miscalculation and Incorrect Data.</p>
                <div class="flex justify-end">
                    <button id="delete-cancel-button" onclick="closeModal()" class="bg-white border border-gray-300 text-gray-700 rounded-md text-xs px-4 py-2 hover:bg-gray-200">
                        Okay
                    </button>
                </div>
            </div>
        </div>
    @endif

    @if($pow->project->status == 'completed')
        <div id="warningModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-modal z-50">
            <div class="modal-content bg-white rounded-lg shadow-lg p-6 w-full max-w-md mx-4 sm:mx-6 md:mx-8 lg:mx-10 xl:mx-12">
                <div class="flex items-center mb-2">
                    <svg class="mr-2" fill="#4cd411" height="25px" width="25px" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 490.05 490.05" xml:space="preserve" stroke="#4cd411"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <g> <path d="M418.275,418.275c95.7-95.7,95.7-250.8,0-346.5s-250.8-95.7-346.5,0s-95.7,250.8,0,346.5S322.675,513.975,418.275,418.275 z M157.175,207.575l55.1,55.1l120.7-120.6l42.7,42.7l-120.6,120.6l-42.8,42.7l-42.7-42.7l-55.1-55.1L157.175,207.575z"></path> </g> </g> </g></svg>
                    <h2 class="text-sm font-semibold text-green-500">Project Completed!</h2>
                </div>
                <p class="text-xs mb-4">This Program of Work is marked as completed. No further actions are available.</p>
                <div class="flex justify-end">
                    <button id="delete-cancel-button" onclick="closeModal()" class="bg-white border border-gray-300 text-gray-700 rounded-md text-xs px-4 py-2 hover:bg-gray-200">
                        Okay
                    </button>
                </div>
            </div>
        </div>

    @endif


    <div class="bg-white p-4 rounded shadow mb-4">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
            <div class="flex flex-col sm:flex-row items-center">
                <div class="relative w-20 h-20 mb-4 sm:mb-0 sm:mr-4">
                    <!-- SVG Progress Circle -->
                    <svg class="absolute top-0 left-0 w-full h-full" viewBox="0 0 36 36">
                        <!-- Background Circle (Gray) -->
                        <path class="text-gray-200" d="M18 2.0845
                                    a 15.9155 15.9155 0 0 1 0 31.831
                                    a 15.9155 15.9155 0 0 1 0 -31.831"
                              fill="none" stroke-width="4" stroke="currentColor"></path>
                        <!-- Foreground Circle (Progress Bar) -->
                        <path id="circular-progress-2" class="text-yellow-500" d="M18 2.0845
                                    a 15.9155 15.9155 0 0 1 0 31.831
                                    a 15.9155 15.9155 0 0 1 0 -31.831"
                              fill="none" stroke-width="4" stroke-dasharray="100, 100"
                              stroke-dashoffset="{{ 100 - min(max($usedPercentage, 0), 100) }}" stroke="currentColor"></path>
                    </svg>
                    <div class="absolute inset-0 flex items-center justify-center">
                        <span class="text-xs font-semibold text-gray-800">{{number_format($usedPercentage,2)}}%</span>
                    </div>
                </div>
                <div class="text-center sm:text-left">
                    <p class="text-[10px] text-gray-500">Total Material Cost</p>
                    <p class="text-[10px] font-bold text-gray-500 mb-2 {{ $totalMaterialCost != $pow->total_material_cost ? 'text-red-500' : '' }}">
                        Php {{ number_format($pow->total_material_cost, 2) }}
                    </p>
                    <p class="text-[10px] text-gray-500">Project Progress Materials </p>
                    <p class="text-[10px] text-gray-500">Used Amount</p>
                    <p class="text-[10px] font-bold text-gray-500 ">{{ number_format($totalMaterialCost - $remainingMaterialCost, 2) }}</p>
                    <div class="flex items-center w-full mb-3">
                        <div class=" progress-bar w-full bg-gray-200 h-2 rounded" style="height: 8px">
                            <div class="target-progress bg-green-500 h-2 rounded" style="width: {{$usedPercentage}}%;"></div>
                        </div>
                        <!-- <span class="text-green-500 font-semibold ml-4">{{$usedPercentage}}%</span> -->
                    </div>


                    <p class="text-[10px] text-gray-500">Material Used Percentage</p>
                    <p class="text-[10px] font-bold text-gray-500 mb-1">{{number_format($usedPercentage,2)}}%</p>
                </div>


            </div>
            <div class="flex flex-col sm:flex-row items-center">
                <div class="relative w-20 h-20 mb-4 sm:mb-0 sm:mr-4">
                    <!-- SVG Progress Circle -->
                    <svg class="absolute top-0 left-0 w-full h-full" viewBox="0 0 36 36">
                        <!-- Background Circle (Gray) -->
                        <path class="text-gray-200" d="M18 2.0845
                                    a 15.9155 15.9155 0 0 1 0 31.831
                                    a 15.9155 15.9155 0 0 1 0 -31.831"
                              fill="none" stroke-width="4" stroke="currentColor"></path>
                        <!-- Foreground Circle (Progress Bar) -->
                        <path id="circular-progress-3" class="text-purple-500" d="M18 2.0845
                                    a 15.9155 15.9155 0 0 1 0 31.831
                                    a 15.9155 15.9155 0 0 1 0 -31.831"
                              fill="none" stroke-width="4" stroke-dasharray="{{number_format($usedLaborCost, 2)}}, 100" stroke="currentColor"></path>
                    </svg>
                    <div class="absolute inset-0 flex items-center justify-center">
                        <span class="text-xs font-semibold text-gray-800">{{number_format($usedLaborCost, 2)}}%</span>
                    </div>
                </div>
                <div class="text-center sm:text-left">
                    <p class="text-[10px] text-gray-500">Total Labor Cost</p>
                    <p class="text-[10px] font-bold text-gray-500 mb-2">Php {{number_format($pow->total_labor_cost, 2)}}</p>

                    <p class="text-[10px] text-gray-500">Project Progress Labor </p>
                    <p class="text-[10px] text-gray-500">Used Amount</p>
                    <p class="text-[10px] font-bold text-gray-500">{{ number_format($totalLaborCost - $remainingLaborCost, 2) }}</p>
                    <div class="flex items-center w-full mb-3">
                        <div class=" progress-bar w-full bg-gray-200 h-2 rounded" style="height: 8px">
                            <div class="target-progress bg-green-500 h-2 rounded" style="width: {{ $usedLaborCost }}%;"></div>
                        </div>
                        <!-- <span class="text-green-500 font-semibold ml-4">{{ $usedLaborCost }}%</span> -->
                    </div>


                        <p class="text-[10px] text-gray-500">Labor Used Percentage</p>
                    <p class="text-[10px] font-bold text-gray-500 mb-1">{{number_format($usedLaborCost, 2)}}%</p>

                </div>
            </div>


            <div class="flex flex-col sm:flex-row items-center">
                <div class="relative w-20 h-20 mb-4 sm:mb-0 sm:mr-4">
                    <!-- SVG Progress Circle -->
                    <svg class="absolute top-0 left-0 w-full h-full" viewBox="0 0 36 36">
                        <!-- Background Circle (Gray) -->
                        <path class="text-gray-200" d="M18 2.0845
                                    a 15.9155 15.9155 0 0 1 0 31.831
                                    a 15.9155 15.9155 0 0 1 0 -31.831"
                              fill="none" stroke-width="4" stroke="currentColor"></path>
                        <!-- Foreground Circle (Progress Bar) -->
                        <path id="circular-progress-4" class="text-teal-500" d="M18 2.0845
                                    a 15.9155 15.9155 0 0 1 0 31.831
                                    a 15.9155 15.9155 0 0 1 0 -31.831"
                              fill="none" stroke-width="4" stroke-dasharray="{{number_format($usedIndirectCost,2)}}, 100" stroke="currentColor"></path>
                    </svg>
                    <div class="absolute inset-0 flex items-center justify-center">
                        <span class="text-xs font-semibold text-gray-800">{{number_format($usedIndirectCost,2)}}%</span>
                    </div>
                </div>

                <div class="text-center sm:text-left">
                    <p class="text-[10px] text-gray-500">Total Indirect Cost</p>
                    <p class="text-[10px] font-bold text-gray-500 mb-2">Php {{number_format($totalIndirectCost, 2)}}</p>

                    <p class="text-[10px] text-gray-500">Project Progress Indirect </p>
                    <p class="text-[10px] text-gray-500">Used Amount</p>
                    <p class="text-[10px] font-bold text-gray-500">Php {{ number_format($totalIndirectCost - $remainingIndirectCost, 2) }}</p>
                    <div class="flex items-center w-full mb-3">
                        <div class=" progress-bar w-full bg-gray-200 h-2 rounded" style="height: 8px">
                            <div class="target-progress bg-green-500 h-2 rounded" style="width: {{ $usedIndirectCost }}%;"></div>
                        </div>
                        <!-- <span class="text-green-500 font-semibold ml-4">{{ $usedIndirectCost }}%</span> -->
                    </div>

                    <p class="text-[10px] text-gray-500">Indirect Used Percentage</p>
                    <p class="text-[10px] font-bold text-gray-500 mb-1">{{number_format($usedIndirectCost,2)}}%</p>
                </div>
            </div>

            <div class="flex flex-col sm:flex-row items-center">
                <div class="relative w-20 h-20 mb-4 sm:mb-0 sm:mr-4">
                    <!-- SVG Progress Circle -->
                    <svg class="absolute top-0 left-0 w-full h-full" viewBox="0 0 36 36">
                        <!-- Background Circle (Gray) -->
                        <path class="text-gray-200" d="M18 2.0845
                                    a 15.9155 15.9155 0 0 1 0 31.831
                                    a 15.9155 15.9155 0 0 1 0 -31.831"
                              fill="none" stroke-width="4" stroke="currentColor"></path>
                        <!-- Foreground Circle (Progress Bar) -->
                        <path id="circular-progress-1" class="text-pink-500" d="M18 2.0845
                                    a 15.9155 15.9155 0 0 1 0 31.831
                                    a 15.9155 15.9155 0 0 1 0 -31.831"
                              fill="none" stroke-width="4" stroke-dasharray="{{number_format($usedDirectCost,2)}}, 100" stroke="currentColor"></path>
                    </svg>
                    <div class="absolute inset-0 flex items-center justify-center">
                        <span class="text-xs font-semibold text-gray-800">{{number_format($usedDirectCost,2)}}%</span>
                    </div>
                </div>
                <div class="text-center sm:text-left">
                    <p class="text-[10px] text-gray-500">Total Direct Cost</p>
                    <p class="text-[10px] font-bold text-gray-500 mb-2">Php {{number_format($totalDirectCost, 2)}}</p>
                    <p class="text-[9px] text-gray-500">Project Progress Total Direct </p>
                    <p class="text-[10px] text-gray-500">Used Amount</p>
                    <p class="text-[10px] font-bold text-gray-500 mb-2">Php {{ number_format(($totalLaborCost - $remainingLaborCost) + ($totalMaterialCost - $remainingMaterialCost), 2) }}</p>
                    <p class="text-[9px] text-gray-500">Direct Used Percentage</p>
                    <p class="text-[10px] font-bold text-gray-500 mb-1">{{number_format($usedDirectCost,2)}}%</p>
                </div>
            </div>
        </div>
    </div>

    <div class="bg-white p-4 rounded shadow mb-5">
        <div class="w-full progress-bar-container text-[12px]">
            <div class="flex flex-col justify-between items-start project-progress-container">
                <span class="text-gray-700 text-[12px] ">Total Project Spent Cost: <span class="font-bold"> Php {{ number_format($totalProjectSpentCost, 2) }}</span></span>
                <span class="text-gray-700 text-[12px]">
    Total Project Savings:
    <span class="font-bold text-[11px]">
        @if($project->status == 'completed')
            Php {{ number_format($saving, 2) }}
        @else
            Project is not completed.
        @endif
    </span>
</span>

                <span class="text-gray-700 text-[12px] ">Overall Project Progress Actual Progress: <span class="font-bold"> {{ number_format($overallProgress, 2) }}%</span></span>
                <div class="progress-bar" style="height: 15px; background-color: #E0E0E0; position: relative;">
                    @foreach($projectConfigurations as $config)
                        <div
                            class="deadline-marker z-40 bg-red-600"
                            style="
                        position: absolute;
                        left: {{ $config->percentage }}%;
                        top: -7px;
                        width: 2px;
                        height: 30px;
                        cursor: pointer; ">
                        <span class="tooltip text-[8px] inline-block whitespace-nowrap">
                            {{ $config->progress_date }} - {{ $config->percentage }}%
                        </span>
                        </div>
                    @endforeach

                    <div
                        class="actual-progress bg-yellow-200"
                        style="
                    width: {{ $overallProgress }}%;
                    height: 100%;
                    position: absolute;
                    left: 0;">
                    </div>

                        <div
                            class="actual-progress bg-red-200"
                            style="
                    width: {{ $inputProgress }}%;
                    height: 100%;
                    position: absolute;
                    left: 0;">
                        </div>
                </div>
            </div>
        </div>
    </div>



    <script>
        // Close modal function
        function closeModal() {
            const modal = document.getElementById('warningModal');
            if (modal) {
                modal.classList.remove('show');
                modal.style.display = 'none'; // Hide the modal after closing
            }
        }

        // Automatically show the modal if it's present
        document.addEventListener('DOMContentLoaded', function() {
            const modal = document.getElementById('warningModal');
            if (modal && modal.classList.contains('show')) {
                modal.style.display = 'flex'; // Ensure it's displayed as flex
            }
        });
    </script>
</div>



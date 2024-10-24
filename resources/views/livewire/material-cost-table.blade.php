<div class="flex w-full mb-4">
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

        /*.modal-content {*/
        /*    background-color: #f8d7da;*/
        /*    color: #721c24;*/
        /*    padding: 20px;*/
        /*    border: 1px solid #f5c6cb;*/
        /*    border-radius: 5px;*/
        /*    width: 300px;*/
        /*    text-align: center;*/
        /*}*/

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
    @if ($totalMaterialCost == 0)
        <div id="warningModal"
             class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-modal show z-50">
            <div class="modal-content bg-white rounded-lg shadow-lg p-6 w-1/3">
                <div class="flex items-center mb-2">
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg"
                         class="mr-2">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                              d="M8.4845 2.49512C9.15808 1.32845 10.842 1.32845 11.5156 2.49512L17.7943 13.3701C18.4678 14.5368 17.6259 15.9951 16.2787 15.9951H3.72136C2.37421 15.9951 1.53224 14.5368 2.20582 13.3701L8.4845 2.49512ZM10 5.00012C10.4142 5.00012 10.75 5.33591 10.75 5.75012V9.25012C10.75 9.66434 10.4142 10.0001 10 10.0001C9.58579 10.0001 9.25 9.66434 9.25 9.25012L9.25 5.75012C9.25 5.33591 9.58579 5.00012 10 5.00012ZM10 14.0001C10.5523 14.0001 11 13.5524 11 13.0001C11 12.4478 10.5523 12.0001 10 12.0001C9.44772 12.0001 9 12.4478 9 13.0001C9 13.5524 9.44772 14.0001 10 14.0001Z"
                              fill="#CA383A"/>
                    </svg>
                    <h2 class="text-sm font-semibold text-red-500">Warning!</h2>
                </div>
                <p class="text-xs mb-4">Please add the Information of Materials for monitoring and updating.</p>
                <div class="flex justify-end">
                    <button id="delete-cancel-button" onclick="closeModal()"
                            class="bg-white border border-gray-300 text-gray-700 rounded-md text-xs px-4 py-2 hover:bg-gray-400">
                        Okay
                    </button>

                </div>
            </div>
        </div>
    @endif





    <div class="cost-details text-[12px] w-1/2">
        <p>Total Material Cost: <strong>Php{{ number_format($pow->total_material_cost, 2) }}</strong></p>
        <p>Total Labor Cost: <strong>Php {{number_format($pow->total_labor_cost, 2)}}</strong></p>
        <p>Total Indirect Cost: <strong>Php {{number_format($totalIndirectCost, 2)}}</strong></p>
        <p>Total Project Spent Cost: <strong>Php {{ number_format($totalProjectSpentCost, 2) }}</strong></p>

{{--        <div class="status-indicator text-[12px]">--}}
{{--            @if ($isOutOfBudget)--}}
{{--                <p>Project Status: <span class="out-of-budget">Out of Budget</span></p>--}}
{{--            @elseif ($progressPercentage == 100)--}}
{{--                <p>Project Status: <span class="completed">Completed</span></p>--}}
{{--            @elseif ($progressPercentage < 50 && $progressPercentage != 0)--}}
{{--                <p>Project Status: <span class="in-progress">In Progress</span></p>--}}
{{--            @else--}}
{{--                <p>Project Status: <span class="not-started">Not Started</span></p>--}}
{{--            @endif--}}
{{--        </div>--}}
    </div>
    <div class="progress-bar-container text-[12px] w-1/2 mt-[-10px]">
{{--        <label>Project Progress Overall:% (Actual) vs Target Progress: %</label>--}}
{{--        <div class="progress-bar mb-2" style="height: 20px">--}}
{{--            <!-- The target progress bar (lighter) -->--}}
{{--            <div class="target-progress" style=""></div>--}}
{{--            <!-- The actual progress bar (darker) -->--}}
{{--            <div class="progress" style=""></div>--}}
{{--        </div>--}}
        <label class="mt-0"> 
            Project Progress Materials:
            Used Amount Php. {{ number_format($totalMaterialCost - $remainingMaterialCost, 2) }}
        </label>
        <div class="progress-bar" style="height: 8px">
            <div class="target-progress" style="width: {{$usedPercentage}}%"></div>
        </div>
        <label>Project Progress Labor: Used Amount Php. {{ number_format($totalLaborCost - $remainingLaborCost, 2) }}</label>
        <div class="progress-bar" style="height: 10px">
            <div class="target-progress" style="width: {{ $usedLaborCost }}%"></div>
            <div class="progress" style="width: 0px"></div>
        </div>
        <label>Project Progress Indirect: Used Amount Php. {{ number_format($totalIndirectCost - $remainingIndirectCost, 2) }}</label>
        <div class="progress-bar" style="height: 10px">
            <div class="target-progress" style="width: {{ $usedIndirectCost }}"></div>
            <div class="progress" style="width: 0px"></div>
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



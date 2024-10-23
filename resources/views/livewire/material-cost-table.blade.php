<div class="flex w-full mb-4">
    <style>
        .progress-bar-container {
            width: 100%;
        }

        .progress-bar {
            background-color: #e0e0e0;
            width: 100%;
            height: 30px;
            border-radius: 10px;
            overflow: hidden;
            position: relative;
        }

        .progress {
            background-color: #4caf50; /* Actual Progress Color */
            height: 100%;
            border-radius: 10px;
            transition: width 0.5s ease; /* Smooth animation */
        }

        .target-progress {
            background-color: #13aa05; /* Target Progress Color */
            height: 100%;
            border-radius: 10px;
            position: absolute;
            left: 0;
            top: 0;
            opacity: 0.7; /* Semi-transparent to distinguish it */
        }

        .cost-details p {
            margin: 5px 0;
        }

        .status-indicator p {
            margin-top: 10px;
        }

        .status-indicator span {
            font-weight: bold;
        }

        .completed {
            color: green;
        }

        .in-progress {
            color: orange;
        }

        .not-started {
            color: red;
        }

        .out-of-budget {
            color: red; /* Indicates out of budget */
            font-weight: bold;
        }
    </style>



    <div class="cost-details text-[12px] w-1/2">
{{--        <h3>Project Cost Status</h3>--}}
        <p>Total Material Cost: <strong>Php{{ number_format($totalMaterialCost, 2) }}</strong></p>
        <p>Total Labor Cost: <strong>Php{{ number_format($totalMaterialCost, 2) }}</strong></p>
        <p>Total Indirect Cost: <strong>Php{{ number_format($totalMaterialCost, 2) }}</strong></p>
        <p>Total  Project Spent Cost: <strong>Php{{ number_format($spentCost, 2) }}</strong></p>


        <div class="status-indicator text-[12px]">
            @if ($isOutOfBudget)
                <p>Project Status: <span class="out-of-budget">Out of Budget</span></p>
            @elseif ($progressPercentage == 100)
                <p>Project Status: <span class="completed">Completed</span></p>
            @elseif ($progressPercentage < 50 && $progressPercentage != 0)
                <p>Project Status: <span class="in-progress">In Progress</span></p>
            @else
                <p>Project Status: <span class="not-started">Not Started</span></p>
            @endif
        </div>
    </div>

    <div class="progress-bar-container text-[12px] w-1/2 ">
        <label>Project Progress Overall: {{ number_format($progressPercentage, 2) }}% (Actual) vs Target Progress: {{ number_format($targetProgressPercentage, 2) }}%</label>
        <div class="progress-bar mb-2" style="height: 20px">
            <!-- The target progress bar (lighter) -->
            <div class="target-progress" style="width: {{ $targetProgressPercentage }}%;"></div>
            <!-- The actual progress bar (darker) -->
            <div class="progress" style="width: {{ $progressPercentage }}%;"></div>
        </div>
        <label class="mt-0">Project Progress Materials: {{ number_format($progressPercentage, 2) }}% (Actual) vs Target Progress: {{ number_format($targetProgressPercentage, 2) }}%</label>
        <div class="progress-bar" style="height: 12px">
            <!-- The target progress bar (lighter) -->
            <div class="target-progress" style="width: {{ $targetProgressPercentage }}%;"></div>
            <!-- The actual progress bar (darker) -->
            <div class="progress" style="width: {{ $progressPercentage }}%;"></div>
        </div>
        <label>Project Progress Labor: {{ number_format($progressPercentage, 2) }}% (Actual) vs Target Progress: {{ number_format($targetProgressPercentage, 2) }}%</label>
        <div class="progress-bar" style="height: 10px">
            <!-- The target progress bar (lighter) -->
            <div class="target-progress" style="width: {{ $targetProgressPercentage }}%;"></div>
            <!-- The actual progress bar (darker) -->
            <div class="progress" style="width: {{ $progressPercentage }}%;"></div>
        </div>
        <label>Project Progress Indirect: {{ number_format($progressPercentage, 2) }}% (Actual) vs Target Progress: {{ number_format($targetProgressPercentage, 2) }}%</label>
        <div class="progress-bar" style="height: 10px">
            <!-- The target progress bar (lighter) -->
            <div class="target-progress" style="width: {{ $targetProgressPercentage }}%;"></div>
            <!-- The actual progress bar (darker) -->
            <div class="progress" style="width: {{ $progressPercentage }}%;"></div>
        </div>

    </div>
</div>

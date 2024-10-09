<div>
    <style>
        .progress-bar-container {
            margin-top: 20px;
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
            background-color: #4caf50;
            height: 100%;
            border-radius: 10px;
            transition: width 0.5s ease; /* Smooth animation */
        }

        .target-progress {
            background-color: #2196F3;
            height: 100%;
            border-radius: 10px;
            position: absolute;
            left: 0;
            top: 0;
            opacity: 0.7; /* Make it semi-transparent to distinguish it */
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
    </style>

    <h3>Project Cost Status</h3>

    <div class="cost-details">
        <p>Total Material Cost: <strong>Php{{ number_format($totalMaterialCost, 2) }}</strong></p>
        <p>Total Spent Cost: <strong>Php{{ number_format($spentCost, 2) }}</strong></p>
    </div>

    <div class="progress-bar-container">
        <label>Project Progress: {{ number_format($progressPercentage, 2) }}% (Actual) vs Target Progress: {{ number_format($targetProgressPercentage, 2) }}%</label>
        <div class="progress-bar">
            <!-- The target progress bar (lighter) -->
            <div class="target-progress" style="width: {{ $targetProgressPercentage }}%;"></div>
            <!-- The actual progress bar (darker) -->
            <div class="progress" style="width: {{ $progressPercentage }}%;"></div>
        </div>
    </div>

    <div class="status-indicator">
        @if ($progressPercentage == 100)
            <p>Project Status: <span class="completed">Completed</span></p>
        @elseif ($progressPercentage > 50)
            <p>Project Status: <span class="in-progress">In Progress</span></p>
        @else
            <p>Project Status: <span class="not-started">Not Started</span></p>
        @endif
    </div>
</div>

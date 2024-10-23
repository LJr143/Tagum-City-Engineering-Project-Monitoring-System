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

        .modal-content {
            background-color: #f8d7da;
            color: #721c24;
            padding: 20px;
            border: 1px solid #f5c6cb;
            border-radius: 5px;
            width: 300px;
            text-align: center;
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
    @if ($totalMaterialCost == 0)
        <div id="warningModal" class="modal show">  <!-- Added 'show' class directly here -->
            <div class="modal-content">
                <span class="close" onclick="closeModal()">&times;</span>
                <strong>Warning:</strong> Please add materials, the total material cost is zero.
            </div>
        </div>
    @endif

    <div class="cost-details text-[12px] w-1/2">
        <p>Total Material Cost: <strong>Php{{ number_format($totalMaterialCost, 2) }}</strong></p>
        <p>Total Labor Cost: <strong>Php</strong></p>  <!-- Adjust variable for labor cost -->
        <p>Total Indirect Cost: <strong>Php</strong></p>  <!-- Adjust variable for indirect cost -->
        <p>Total Project Spent Cost: <strong>Php{{ number_format($spentCost, 2) }}</strong></p>

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

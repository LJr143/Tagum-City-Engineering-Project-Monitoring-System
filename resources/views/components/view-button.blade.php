<div x-data="{ purchaseOrderOpen: false, currentPurchaseOrder: null }" x-cloak>
    <!-- Trigger Button -->
    <form id="viewPoForm" method="GET">
        <button
            type="button"
            @click="purchaseOrderOpen = true; currentPurchaseOrder = '{{ $purchaseOrderNumber }}';"
            class="text-white bg-blue-500 hover:bg-blue-700 px-4 py-2 rounded">
            View
        </button>
    </form>

    <!-- Modal -->
    <div
        x-show="purchaseOrderOpen"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50"
    >
        <!-- Modal Content -->
        <div
            x-show="purchaseOrderOpen"
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 transform scale-90"
            x-transition:enter-end="opacity-100 transform scale-100"
            x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="opacity-100 transform scale-100"
            x-transition:leave-end="opacity-0 transform scale-90"
            class="bg-white rounded-lg shadow-lg p-6 w-full max-w-2xl mx-4 overflow-y-auto max-h-[500px]"
        >
            <div class="flex justify-between items-center mb-4 border-b border-gray-300 pb-2">
                <h2 class="text-lg font-bold text-left w-full sm:w-auto">Purchase Order Details</h2>

                <!-- Close Button -->
                <button @click="purchaseOrderOpen = false" class="text-gray-500 hover:text-gray-700">
                    <i class="fas fa-times"></i>
                </button>
            </div>

            <!-- Display Purchase Order Number -->
            <div class="mb-4">
                <p class="text-sm"><strong>Purchase Order Number:</strong> <span x-text="currentPurchaseOrder"></span></p>
                <livewire:view-po-materials :pow_id="$pow_id" :purchase_order_number="$purchaseOrderNumber" />
            </div>

            <!-- Additional Information -->


            <!-- Action Buttons -->
            <div class="mt-6 flex justify-end space-x-2">
                <button @click="purchaseOrderOpen = false"
                        class="bg-gray-300 text-gray-700 px-4 py-2 rounded shadow-md hover:bg-gray-400">
                    Close
                </button>
            </div>
        </div>
    </div>
</div>

<div class="flex space-x-4 mb-2">
    <!-- Start Date -->
    <div>
        <label for="start-date" class="block text-xs text-gray-700">Date From</label>
        <input
            type="date"
            id="start-date"
            wire:model.defer="startDate"
            class="mt-1 block h-8 w-full border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 text-xs sm:text-[10px] md:text-xs">
    </div>

    <!-- End Date -->
    <div>
        <label for="end-date" class="block text-xs text-gray-700">Date To</label>
        <input
            type="date"
            id="end-date"
            wire:model.defer="endDate"
            class="mt-1 block h-8 w-full border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 text-xs sm:text-[10px] md:text-xs">
    </div>

    <!-- Filter Button -->
    <div class="flex items-end">
        <button
            wire:click="applyFilters"
            class="h-8 px-4 bg-green-500 text-white rounded-md shadow-sm hover:bg-green-600 text-xs">
            Apply Filter
        </button>
    </div>
</div>


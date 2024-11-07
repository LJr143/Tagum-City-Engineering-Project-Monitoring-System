<div class=" w-full bg-white shadow rounded text-gray-800 p-4">
    <!-- First Row -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 w-full mb-4">
        <div class="border p-4 rounded">
            <p class="text-[12px] font-medium">Project Warning Configuration</p>
            <div class="mt-2">
                <form wire:submit.prevent="saveWarning" class="space-y-4 text-[12px]">
                    <!-- Display Fields Dynamically -->
                    @foreach ($warning as $index => $warnings)
                        <div class="flex gap-2 items-center">
                            <!-- Hidden Type Field -->
                            <input type="hidden" name="warning[{{ $index }}][type]"
                                   wire:model.defer="warning.{{ $index }}.type"
                                   value="Warning">

                            <!-- Name Field -->
                            <input type="text" name="warning[{{ $index }}][name]"
                                   wire:model.defer="warning.{{ $index }}.name"
                                   placeholder="e.g. warning"
                                   class="w-1/2 p-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 text-xs"
                                   required>

                            <!-- Percentage Field -->
                            <input type="text" name="warning[{{ $index }}][percentage]"
                                   wire:model.defer="warning.{{ $index }}.percentage"
                                   placeholder="Percentage"
                                   class="w-1/2 p-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 text-xs"
                                   required>

                            <!-- Color Picker and Hex Value -->
                            <div class="flex items-center gap-2">
                                <!-- Color Picker Input -->
                                <input type="color" name="warning[{{ $index }}][picker]"
                                       wire:model.defer="warning.{{ $index }}.color"
                                       class="w-[25px] h-[25px] rounded-full border-0 shadow focus:ring-indigo-500 focus:border-indigo-500"
                                       value="{{ old('warning.' . $index . '.color', '#FFFFFF') }}"
                                required>

                                <!-- Hex Value Display/Input -->
                                <input type="text" name="warning[{{ $index }}][color]"
                                       wire:model.defer="warning.{{ $index }}.color"
                                       placeholder="#FFFFFF"
                                       class="w-[80px] p-2 text-center border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 text-xs"
                                       readonly>
                            </div>

                            <!-- Remove Field Button -->
                            @if ($index > 0)
                                <button type="button" wire:click="removeWarning({{ $index }})"
                                        class="text-red-500 hover:text-red-700">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M6 18L18 6M6 6l12 12"></path>
                                    </svg>
                                </button>
                            @endif
                        </div>

                    @endforeach

                    <!-- Add Field Button -->
                    <button type="button" wire:click="addWarning"
                            class="bg-blue-500 text-white text-[12px] px-2 py-1 rounded hover:bg-blue-600">
                        + Add Field
                    </button>

                    <!-- Action Buttons -->
                    <div class="mt-6 flex justify-end space-x-2">
                        <button @click="directOpen = false" type="button"
                                class="bg-gray-300 text-gray-700 text-[12px] px-4 py-2 rounded shadow-md hover:bg-gray-400 text-xs">
                            Cancel
                        </button>
                        <button type="submit"
                                class="bg-green-500 text-white px-6 py-2 rounded shadow-md hover:bg-green-600 text-[12px]">
                            Save
                        </button>
                    </div>
                </form>
            </div>

        </div>
        <div class="border p-4 rounded">
            <p class="text-[12px] font-medium" >Auto Project Termination</p>
            <div class="mt-2">

            </div>
        </div>
    </div>

    <!-- Second Row -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 w-full">
        <div class="border p-4 rounded">
            <p>Project Warning Configuration</p>
        </div>
        <div class="border p-4 rounded">
            <p>Project Warning Configuration</p>
        </div>
    </div>
</div>

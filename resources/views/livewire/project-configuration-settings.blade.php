<div x-data="{ open: false, showCustomDate: true, extendProject: true }" x-cloak>
    <div class="flex justify-end">
        <div class="relative ml-2 w-full">
            <button @click="open = true"
                    class="flex bg-green-500 text-white text-xs px-6 py-2 rounded shadow-md hover:bg-green-600 focus:outline-none">
                Set Up Project Progress Indicator

                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"
                     class="ml-2">
                    <path d="M21 7L17 3L14 6L8 12V16H12L18 10L21 7Z" stroke="white" stroke-width="1.5"
                          stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M14 6L18 10" stroke="white" stroke-width="1.5" stroke-linecap="round"
                          stroke-linejoin="round"/>
                    <path d="M10 4H4V20H20V14" stroke="white" stroke-width="1.5" stroke-linecap="round"
                          stroke-linejoin="round"/>
                </svg>

            </button>
        </div>
    </div>

    <!-- Modal -->
    <div
        x-show="open"
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
            x-show="open"
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 transform scale-90"
            x-transition:enter-end="opacity-100 transform scale-100"
            x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="opacity-100 transform scale-100"
            x-transition:leave-end="opacity-0 transform scale-90"
            class="bg-white w-full max-w-[1200px] p-6 rounded-lg relative"
        >
            <button @click="open = false" class="absolute top-2 right-2 text-gray-500 hover:text-gray-700">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                     stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>

            <h2 class="text-lg font-bold mb-4">Project Configuration Settings</h2>
            <form wire:submit.prevent="saveProgress" class="grid grid-cols-2 gap-4">
                <!-- Column 1 -->

                <!-- Custom Date Section -->
                <div x-data="{ showCustomDate: @entangle('showCustomDate') }" class="border-2 p-2 rounded">
                    <button type="button" @click="showCustomDate = !showCustomDate" class="text-blue-500 text-xs font-medium hover:underline">
                        Add Custom Date
                    </button>

                    <div x-show="showCustomDate" class="mt-2">
                        <input type="date" wire:model="customDate" class="text-xs border border-gray-400 rounded px-2 py-1 mr-2">
                        <input type="number" wire:model="customPercentage" placeholder="Set Percentage" min="0" max="100" class="text-xs border border-gray-400 rounded px-2 py-1 w-24">
                        <button type="button" wire:click="addCustomProgress" class="text-green-500 text-xs hover:underline mt-2">
                            Add
                        </button>
                    </div>
                </div>

                <!-- Available Dates Table -->
                <div class="border-2 p-2 rounded">
                    <label class="block text-xs font-medium">Available Dates (15th and 30th):</label>
                    <div class="overflow-x-auto mt-2" style="max-height: 200px;">
                        <table class="min-w-full border-collapse">
                            <thead>
                            <tr class="bg-gray-100">
                                <th class="text-left text-xs font-medium px-2 py-1 border-b">Date</th>
                                <th class="text-left text-xs font-medium px-2 py-1 border-b">Set Percentage</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($availableDates as $date)
                                <tr class="hover:bg-gray-50">
                                    <td class="text-xs px-2 py-1 border-b">{{ $date }}</td>
                                    <td class="text-xs px-2 py-1 border-b">
                                        <input type="number" wire:model.lazy="progress.{{ $loop->index }}.percentage"
                                               placeholder="Set Percentage" min="0" max="100" class="text-xs border border-gray-400 rounded px-2 py-1 w-24">
                                        <input type="hidden" wire:model="progress.{{ $loop->index }}.date" value="{{ $date }}">
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Column 2 -->

                <!-- Saved Progress List -->
                <div class="border-2 p-2 rounded overflow-y-auto" style="max-height: 200px;">
                    <h3 class="font-bold text-sm">Saved Progress</h3>
                    <ul class="text-xs">
                        @foreach($progress as $item)
                            <li>{{ $item['date'] }}: {{ $item['percentage'] }}%</li>
                        @endforeach
                    </ul>
                </div>

                <!-- Extend Project Section -->
                <div class="border-2 p-2 rounded">
                    <button type="button" @click="extendProject = !extendProject" class="text-blue-500 text-xs font-medium hover:underline">
                        Extend Project
                    </button>

                    <div x-show="extendProject" class="mt-2">
                        <label class="block text-xs font-medium">New Project End Date:</label>
                        <input type="date" wire:model="newEndDate" class="text-xs border border-gray-400 rounded px-2 py-1 mr-2 w-full">
                        <label class="block text-xs font-medium mt-2">Upload Extension Order (PDF):</label>
                        <input type="file" wire:model="extensionOrderFile" accept="application/pdf" class="text-xs border border-gray-400 rounded px-2 py-1 mr-2 w-full">
                        <button type="button" wire:click="extendProjectEndDate" class="text-green-500 text-xs hover:underline mt-2">
                            Save New End Date
                        </button>
                    </div>
                </div>

                <!-- Past Deadlines Table -->
                <div class="border-2 p-2 rounded overflow-y-auto" style="max-height: 200px;">
                    <h3 class="font-bold text-sm">Past Deadlines</h3>
                    <table class="min-w-full border-collapse mt-2">
                        <thead>
                        <tr class="bg-gray-100">
                            <th class="text-left text-xs font-medium px-2 py-1 border-b">Deadline Date</th>
                            <th class="text-left text-xs font-medium px-2 py-1 border-b">Set By</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($pastDeadlines as $deadline)
                            <tr class="hover:bg-gray-50">
                                <td class="text-xs px-2 py-1 border-b">{{ $deadline->date }}</td>
                                <td class="text-xs px-2 py-1 border-b">{{ $deadline->set_by }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                    <div class="mt-6 flex justify-end space-x-2">
                        <button type="button" @click="open = false"
                                class="bg-gray-300 px-4 py-2 rounded hover:bg-gray-400 text-xs">
                            Cancel
                        </button>
                        <button type="submit"
                                class="bg-green-500 text-white px-6 py-2 rounded hover:bg-green-600 text-xs">
                            Save Progress
                        </button>
                    </div>
                </form>

        </div>

    </div>
</div>

@script
<script>
    Livewire.on('progress-saved', () => {
        alert('Progress saved successfully!');
    });

    Livewire.on('progress-error', (event) => {
        alert(event.message);
    });
</script>
@endscript

<div x-data="{ addSwaaReport: @entangle('addSwaaReport') }" x-cloak @cost-added.window="addSwaaReport = false">
    <div class="flex">
        <div class="relative sm:ml-0">
            <button @click="addSwaaReport = true"
                    class="bg-white text-green-500 font-medium border border-green-500 text-[11px] sm:text-xs px-4 py-2 rounded hover:bg-green-100 focus:outline-none whitespace-nowrap">
                Statement of Work Accomplishment
            </button>
        </div>
    </div>

    <!-- Modal -->
    <div
        x-show="addSwaaReport"
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
            x-show="addSwaaReport"
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 transform scale-90"
            x-transition:enter-end="opacity-100 transform scale-100"
            x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="opacity-100 transform scale-100"
            x-transition:leave-end="opacity-0 transform scale-90"
            class="bg-white rounded-lg shadow-lg p-6 w-full max-w-full mx-4 overflow-y-auto max-h-full"
        >
            <div class="flex justify-between items-center mb-4 border-b border-gray-300 pb-2">
                <h2 class="text-sm font-bold text-left w-full sm:w-auto">Statement of Work Accomplishment</h2>

                <!-- Close Button (X) -->
                <button @click="addSwaaReport = false" class="text-gray-500 hover:text-gray-700">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div>
                @if(auth()->user()->isProjectIncharge() && ($pow->project->status != 'completed' && $pow->project->status != 'suspended'))
                <livewire:add-swa-report :pow_id="$pow_id"/>
                @endif
            </div>
           <div class="text-[12px]">
               <livewire:swa-report-tbale :pow_id="$pow_id" />
           </div>

        </div>
    </div>
</div>

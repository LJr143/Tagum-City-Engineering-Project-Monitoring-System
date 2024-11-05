<!-- Progress Circle Bar Section -->
<div class="bg-white rounded-lg shadow-md p-6">
    <h3 class="text-xs font-semibold text-gray-800 mb-6 text-center">PROGRESS INFORMATION</h3>
    <div class="flex flex-col items-center mb-6 justify-center ">
        <div class="relative w-20 h-20">
            <!-- SVG Progress Circle -->
            <svg class="absolute top-0 left-0 w-full h-full" viewBox="0 0 36 36" aria-label="Progress circle">
                <!-- Background Circle (Gray) -->
                <path
                    class="text-gray-200"
                    d="M18 2.0845
       a 15.9155 15.9155 0 0 1 0 31.831
       a 15.9155 15.9155 0 0 1 0 -31.831"
                    fill="none"
                    stroke-width="4"
                    stroke="currentColor">
                </path>

                <!-- Foreground Circle (Progress Bar) -->
                <path
                    id="circular-progress-1"
                    class="text-green-500 transition-all duration-300"
                    d="M18 2.0845
       a 15.9155 15.9155 0 0 1 0 31.831
       a 15.9155 15.9155 0 0 1 0 -31.831"
                    fill="none"
                    stroke-width="4"
                    stroke-dasharray="100, 100"
                stroke-dashoffset="{{ 100 - min(max($usedPercentage, 0), 100) }}"
                stroke-linecap="round"
                stroke="currentColor">
                </path>
            </svg>



            <!-- Centered Percentage Text -->
            <div class="absolute inset-0 flex items-center justify-center">
                <span id="progress-text-1" class="text-[12px] font-semibold text-gray-800">{{number_format($usedPercentage,2)}}%</span>
            </div>
        </div>
        <p class="text-xs text-gray-500 mt-2 text-center">Material Used Percentage</p>
    </div>

    <div class="flex flex-col items-center mb-6">
        <div class="relative w-20 h-20">
            <svg class="absolute top-0 left-0 w-full h-full" viewBox="0 0 36 36" aria-label="Circular progress">
                <!-- Background Circle (Gray) -->
                <path
                    class="text-gray-200"
                    d="M18 2.0845
       a 15.9155 15.9155 0 0 1 0 31.831
       a 15.9155 15.9155 0 0 1 0 -31.831"
                    fill="none"
                    stroke-width="4"
                    stroke="currentColor">
                </path>

                <!-- Foreground Circle (Progress Bar) -->
                <path
                    id="circular-progress-2"
                    class="text-pink-500 transition-all duration-300"
                    d="M18 2.0845
       a 15.9155 15.9155 0 0 1 0 31.831
       a 15.9155 15.9155 0 0 1 0 -31.831"
                    fill="none"
                    stroke-width="4"
                    stroke-dasharray="100, 100"
                stroke-dashoffset="{{ 100 - min(max($usedLaborCost, 0), 100) }}"
                stroke-linecap="round"
                stroke="currentColor">
                </path>
            </svg>

            <div class="absolute inset-0 flex items-center justify-center">
                <span id="progress-text-2" class="text-[12px] font-semibold text-gray-800">{{number_format($usedLaborCost, 2)}}%</span>
            </div>
        </div>
        <p class="text-center text-xs text-gray-500 mt-2">Labor Used Percentage</p>
    </div>

    <div class="flex flex-col items-center mb-6">
        <div class="relative w-20 h-20">
            <svg class="absolute top-0 left-0 w-full h-full" viewBox="0 0 36 36" aria-label="Circular progress">
                <!-- Background Circle (Gray) -->
                <path
                    class="text-gray-200"
                    d="M18 2.0845
       a 15.9155 15.9155 0 0 1 0 31.831
       a 15.9155 15.9155 0 0 1 0 -31.831"
                    fill="none"
                    stroke-width="4"
                    stroke="currentColor">
                </path>

                <!-- Foreground Circle (Progress Bar) -->
                <path
                    id="circular-progress-3"
                    class="text-blue-500 transition-all duration-300"
                    d="M18 2.0845
       a 15.9155 15.9155 0 0 1 0 31.831
       a 15.9155 15.9155 0 0 1 0 -31.831"
                    fill="none"
                    stroke-width="4"
                    stroke-dasharray="100, 100"
                stroke-dashoffset="{{ 100 - min(max($usedIndirectCost, 0), 100) }}"
                stroke-linecap="round"
                stroke="currentColor">
                </path>
            </svg>

            <div class="absolute inset-0 flex items-center justify-center">
                <span id="progress-text-3" class="text-[12px] font-semibold text-gray-800">{{number_format($usedIndirectCost,2)}}%</span>
            </div>
        </div>
        <p class="text-center text-xs text-gray-500 mt-2">Indirect Used Percentage</p>
    </div>
</div>

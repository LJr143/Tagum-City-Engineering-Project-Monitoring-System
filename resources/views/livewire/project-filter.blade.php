<div>
    <!-- Project Filter -->
    <div x-data="{ selected: @entangle('selectedStatus') }" class="flex mb-6 bg-gray-200 p-1.5 rounded-full max-w-xl justify-between">
        <!-- All projects Button -->
        <button
            :class="selected === 'all' ? 'bg-white text-black' : 'text-gray-600 hover:text-black'"
            class="flex-grow px-3 py-1 rounded-full mx-1 font-semibold text-xs"
            @click="selected = 'all'; $wire.filterProjects()">
            <span :class="selected === 'all' ? 'text-green-500' : 'text-gray-600'">{{ $totalProjects  }}</span> All Projects
        </button>

        <!-- Pending Button -->
        <button
            :class="selected === 'pending' ? 'bg-white text-black' : 'text-gray-600 hover:text-black'"
            class="flex-grow px-3 py-1 rounded-full mx-1 font-semibold text-xs"
            @click="selected = 'pending'; $wire.filterProjects()">
            <span :class="selected === 'pending' ? 'text-green-500' : 'text-gray-600'">{{ $pendingProjects }}</span> Pending
        </button>

        <!-- Closed Button -->
        <button
            :class="selected === 'closed' ? 'bg-white text-black' : 'text-gray-600 hover:text-black'"
            class="flex-grow px-3 py-1 rounded-full mx-1 font-semibold text-xs"
            @click="selected = 'closed'; $wire.filterProjects()">
            <span :class="selected === 'closed' ? 'text-green-500' : 'text-gray-600'">{{ $completedProjects }}</span> Completed
        </button>
    </div>

    <!-- Date Range Filter Section -->
    <div x-data="{ startDate: @entangle('startDate'), endDate: @entangle('endDate') }" class="p-2">
        <div class="flex space-x-4 mb-4">
            <!-- Start Date -->
            <div>
                <label for="start-date" class="block text-xs text-gray-700">Start Date</label>
                <input
                    type="date"
                    id="start-date"
                    x-model="startDate"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-xs"
                    @change="$wire.filterProjects()">
            </div>

            <!-- End Date -->
            <div>
                <label for="end-date" class="block text-xs text-gray-700">End Date</label>
                <input
                    type="date"
                    id="end-date"
                    x-model="endDate"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-xs"
                    @change="$wire.filterProjects()">
            </div>

            <!-- Filter Button -->
            <div class="flex items-end">
                <button
                    @click="$wire.filterProjects()"
                    class="text-xs px-4 py-2 bg-green-500 text-white rounded-md shadow hover:bg-green-600">
                    Filter
                </button>
            </div>
        </div>

        @foreach($projects as $project)
            <div class="grid gap-4 p-3">
                <a href="{{ route('view-project-pow', ['id' => $project->id]) }}" class="flex w-full">
                    <div class="bg-white rounded-lg shadow-md flex items-center w-full">
                        <!-- Left-aligned SVG -->
                        <svg width="63  " height="125" viewBox="0 0 59 112" fill="none" xmlns="http://www.w3.org/2000/svg" class="mr-4 object-cover" preserveAspectRatio="none">
                            <path d="M24.7053 0.0742503L15.7155 0.0930582C10.3557 0.104272 6.01978 4.45836 6.03099 9.81819L6.23539 107.517C6.24661 112.877 10.6007 117.213 15.9605 117.202L43.6449 117.144L26.3988 97.7453C23.0615 93.9915 23.1399 88.3115 26.5795 84.6512L37.6119 72.911C40.4272 69.9151 41.0494 65.4704 39.1649 61.8166L32.9727 49.8106C32.6157 49.1184 32.3433 48.3857 32.1614 47.6285L29.5735 36.8532C28.6404 32.9682 30.1836 28.9083 33.4618 26.6242L53.5632 12.618C57.0534 10.1862 57.5433 5.21061 54.5945 2.14479V2.14479C53.2865 0.784959 51.48 0.0182337 49.5933 0.022181L24.7053 0.0742503Z" fill="#249000" fill-opacity="0.78"/>
                            <path d="M18.6936 0.087678L9.70381 0.106486C4.34398 0.1177 0.00805986 4.47179 0.0192734 9.83162L0.223674 107.53C0.234887 112.89 4.58898 117.226 9.94881 117.215L37.6332 117.157L20.3871 97.7587C17.0498 94.0049 17.1282 88.3249 20.5678 84.6646L31.6002 72.9244C34.4155 69.9285 35.0377 65.4838 33.1532 61.83L26.961 49.824C26.604 49.1318 26.3316 48.3992 26.1497 47.6419L23.5617 36.8666C22.6286 32.9816 24.1719 28.9218 27.4501 26.6376L47.5515 12.6314C51.0416 10.1996 51.5315 5.22404 48.5827 2.15822V2.15822C47.2748 0.798387 45.4683 0.0316614 43.5816 0.0356088L18.6936 0.087678Z" fill="#75E450"/>

                        </svg>


                        <!-- Project Details -->
                        <div class="flex flex-col w-1/4">
                            <div class="text-green-500 text-xs font-bold mb-2 truncate">Project ID # {{ $project->id }}</div>
                            <h2 class="text-md font-semibold truncate" title="{{ $project->title }}">{{ $project->title }}</h2>
                            <div class="flex items-center mt-1">
                                <svg class="mr-3" width="18" height="16" viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                    <rect width="18" height="16" fill="url(#pattern0_1075_18260)"/>
                                    <defs>
                                        <pattern id="pattern0_1075_18260" patternContentUnits="objectBoundingBox" width="1" height="1">
                                            <use xlink:href="#image0_1075_18260" transform="matrix(0.00987654 0 0 0.0111111 0.0555556 0)"/>
                                        </pattern>
                                        <image id="image0_1075_18260" width="90" height="90" xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAFoAAABaCAYAAAA4qEECAAAACXBIWXMAAAsTAAALEwEAmpwYAAAE1ElEQVR4nO2cz4scRRTHC40azxo1UYjgLQHB0/oj/4IH49+RmLhxIwh20GAurrjsOP2+PT3sKT8cErIgiLckXjReVPQvUDAJelCSja5ZM/qwhHXSVdPV01PV1f2+8GDoraru9+k3r6rf1LZSIpFIJBKJRCKRSCQSiUQitba2thPAawCuEtEtAOM2Gv3r25cADq+srDzk9dZnWfYUEX0bGgL82zfsu7dI7ijk8X+wvUS2ThfjLhsRHfIB+mpoRxEe9Bc+QN8M7SjC200foAtPrloqhPJXQENAz0MS0Z4koD1JQHuSgPYkAe1JAtqTBLQnCWhPEtBdBd01UwIaAhoNiESJaISHJ6kD4cFKjoaADh51kIhGcFCSOhAeYqtyNBFtAljK83wPGxEd18eiaB8T6OOTY/OxWNqreavGr9/uybF7vd4TsbRXsYDO83zP5Nhpmj4ZS3sVc+oA8GYs7VVEoDfZOZfJqkntowGNyE1AQ0CPQ0ehRDTCg5PUgfBQJUcjHGgiOpvn+V7vq46m1SLgB/bvAE4kSbLDJ+hG1SLgF/jlokf4uYAueoTlY6Haw7/9lGXZfgGNwkjcAnCJiI4AWOj3+48BeIBNf14AcFS32SoR2dfTNN0314huWi0CdiC3iOjk6urqI2X95rbcB8DGlPGvcTGqIt7/ORdFLQJmO23Lp0mS3GfzX6erM1Nu5OczT5ANyIXjilHMX/1Fk1/Ly8sPA+gB+JWNiFb5mIXDsSnp5N3OgSairSzLXrH5RUQfFvT7YEqfgybY+tv2TKdAwxLJ26BdL+h3owSPJcsN/rhLoE/P4lfJvucMoO9WXvI1ANzYwW6Xfb/GLKD1BGlajbzfBdDvzOpX2f5E9J5hjBu8Lm9zreOOyzp5VtDD4XCXaWJM0/SlNtc6LtXhl+MYV6pOxtHWOojoSB1+uYxBRK8bruW8yzjWC2ravgsAC3X45TjGiwbQX7uME1WtYzgc7qrDL5cXVQ0Gg8cN4/zgci1R1TpGo9GDNfn1aVnY3M4wzkZtoJtmo5pAa9if8WvoZgD9R2tBDx1TB0fuFNhTI9uSOn5uLegsy5538YshToMNYN1WRrVMht+3+XVsR119KwObiF62sFk09LvQ2hcMEtFlZ+fKwX7L1JcL/oY+b1cBfTg0RJSzOwAerRu2qa5tewQHcKDSRfCLUCOJ6pNVQG/zc31ivE9Go9H9Re0BnDJcxy+VikosLj1GAnuj6ImyrHji45zM6YIj2QRZP6HeNtzsj9Qs0l+vQ/xC1IZPkGfUnMW/pBgg3x0MBs+qNomIzlpgH5vjeW0VxIuqbcrzfK/eC1cUWVv8Q2rd5wTwKoC/DOfcrG0zTdME4IRlYmTYb9R4riUTZG2nVFuVJMkOveHQlrPPzbKTiPuacvK2m/qVa60lOgHYzRsOp61G+Dc+l3oIt9VLuMLVxcSWsKdVF5Rl2X7DPo170on++WmRiF7gohBHIht/5mP6sfpKmU2OAH7r9/vPqS4pTdN9HF0el5HXOgd5Ip+a6g+1GefkzqQL2wTJGw7n9G8Yf3Lebv3E5yLecAhgxE9rNUQwj7He2nVyXRMlgOUyk6WhQNRr3WO1mqO4osY7iPSq4gIXyYjoR16+6TTDUL/jvxFRwqXOylW4f074N9ki/FmlCCCpAAAAAElFTkSuQmCC"/>
                                    </defs>
                                </svg>

                                <p class="text-gray-500 text-xs font-semibold truncate">{{ $project->created_at }}</p>
                            </div>
                        </div>

                        <!-- Project Cost with SVG aligned -->
                        <svg class="mr-3" width="39" height="36" viewBox="0 0 39 36" fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                            <ellipse cx="19.0109" cy="18" rx="19.0109" ry="18" fill="#8DEC67" fill-opacity="0.24"/>
                            <rect x="7.89062" y="7.34692" width="21.5218" height="21.3061" fill="url(#pattern0_1075_18261)"/>
                            <defs>
                                <pattern id="pattern0_1075_18261" patternContentUnits="objectBoundingBox" width="1" height="1">
                                    <use xlink:href="#image0_1075_18261" transform="matrix(0.00989978 0 0 0.01 0.00501115 0)"/>
                                </pattern>
                                <image id="image0_1075_18261" width="100" height="100" xlink:href="data:image/png;base64,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"/>
                            </defs>
                        </svg>


                        <div class="flex items-center w-1/5">
                            <div class="text-left truncate">
                                <p class="text-gray-500 text-xs">Project Cost</p>
                                <p class="text-sm font-semibold truncate">Php {{ $project->project_cost }}</p>
                            </div>
                        </div>

                        <!-- Cost percentage Section -->
                        <div class="flex items-center w-1/4 flex-col mt-2">
                            <span class="text-gray-500 text-xs mb-1">Cost Percentage</span>
                            <div class="relative w-48 h-3 bg-gray-200 rounded-full overflow-hidden">
                                <div class="bg-green-500 h-full" style="width: 60%;"></div>
                            </div>
                            <span class="ml-2 text-black text-xs">60%</span>
                        </div>

                        <!-- Project percentage Section -->
                        <div class="flex items-center w-1/4 flex-col mt-2">
                            <span class="text-gray-500 text-xs mb-1">Project Percentage</span>
                            <div class="relative w-48 h-3 bg-gray-200 rounded-full overflow-hidden">
                                <div class="bg-yellow-500 h-full" style="width: 70%;"></div>
                            </div>
                            <span class="ml-2 text-black text-xs">70%</span>
                        </div>

                        <!-- Dropdown with buttons and "Pending" button aligned -->
                        <div class="flex items-center justify-end space-x-1" x-data="{ open: false, viewModal: false, editModal: false, deleteModal: false }">
                            <span class="bg-green-500 text-white px-4 py-1 rounded-3xl text-xs">Pending</span>
                        </div>

                        <!-- Right-aligned SVG -->
                        <svg width="64" height="125" viewBox="0 0 59 112" fill="none" xmlns="http://www.w3.org/2000/svg" class="ml-4 object-cover" preserveAspectRatio="none">
                            <path d="M36.8666 1.2336L45.8557 1.33903C51.2152 1.40188 55.509 5.79755 55.4461 11.157L54.2934 109.443C54.2305 114.803 49.8348 119.097 44.4754 119.034L16.7928 118.709L34.2731 99.3273C37.6245 95.6113 37.601 89.9562 34.2188 86.2682L23.2195 74.2742C20.4518 71.2563 19.8762 66.826 21.7807 63.201L28.1216 51.1322C28.4825 50.4454 28.7597 49.7178 28.9473 48.9649L31.6558 38.0955C32.6188 34.2306 31.1226 30.1697 27.8822 27.8536L7.87997 13.5567C4.41198 11.0779 3.96906 6.09125 6.94587 3.04002V3.04002C8.27474 1.67792 10.1036 0.91971 12.0065 0.942027L36.8666 1.2336Z" fill="#249000" fill-opacity="0.78"/>
                            <path d="M42.8822 1.30513L51.8714 1.41056C57.2308 1.47342 61.5246 5.86908 61.4617 11.2286L60.309 109.515C60.2461 114.874 55.8505 119.168 50.491 119.105L22.8084 118.781L40.2887 99.3988C43.6401 95.6828 43.6166 90.0278 40.2344 86.3397L29.2351 74.3457C26.4674 71.3278 25.8918 66.8975 27.7964 63.2725L34.1373 51.2037C34.4981 50.5169 34.7753 49.7893 34.9629 49.0365L37.6714 38.167C38.6345 34.3021 37.1382 30.2412 33.8978 27.9251L13.8956 13.6282C10.4276 11.1494 9.98469 6.16279 12.9615 3.11156V3.11156C14.2904 1.74946 16.1193 0.991243 18.0221 1.01356L42.8822 1.30513Z" fill="#75E450"/>

                        </svg>


                    </div>
                </a>
            </div>
        @endforeach
</div>
</div>

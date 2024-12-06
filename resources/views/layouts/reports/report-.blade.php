<x-app-layout mainClass="flex" headerClass="shadow-[0px_1px_2px_-1px_rgba(0,0,0,0.1)] ">

    <x-slot name="sidebar">
        <x-sidebar></x-sidebar>
    </x-slot>

    <x-slot name="header">
        <x-header></x-header>
    </x-slot>

    <x-slot name="main">

        <h1 class="text-base font-semibold leading-6 text-gray-900">Reports</h1>
        <p class="mb-6 text-[11px]">Project Monitoring and Performance Reports</p>

        <div class="container mx-auto">
            <div class="bg-white shadow-md rounded-lg">
                <h3 class="text-sm font-semibold mt-4 text-center">Overall Project Report</h3>
                <div class="flex items-center justify-between mb-2 space-x-4">
                </div>
                @if(auth()->user()->isAdmin() || auth()->user()->isEncoder())
                    <div class="text-[12px] bg-white mt-0 p-5 rounded-md md:max-w-[800px] min-[90%]:max-w-[100%] lg:max-w-[900px] xl:w-[100%] xl:min-w-[100%] 2xl:w-[100%] 2xl:min-w-[100%]">
                        <div class="powergrid-filters">
                            <livewire:admin-report />
                        </div>
                    </div>
                    <h3 class="text-sm font-semibold mt-4 text-center">Project Running Balance Report</h3>
                    <div class="text-[12px] bg-white mt-0 p-5 rounded-md md:max-w-[800px] min-[90%]:max-w-[100%] lg:max-w-[900px] xl:w-[100%] xl:min-w-[100%] 2xl:w-[100%] 2xl:min-w-[100%] ">
                        <div class="powergrid-filters">
                            <livewire:report-running-balance />
                        </div>
                    </div>

                @else

                    <div class="text-[12px] bg-white mt-0 p-5 rounded-md md:max-w-[800px] min-[90%]:max-w-[100%] lg:max-w-[900px] xl:w-[100%] xl:min-w-[100%] 2xl:max-w-[1190px]">
                        <div class="powergrid-filters text-[12px]">
                            <livewire:project-incharge-report />
                        </div>
                    </div>

                @endif

            </div>
        </div>

    </x-slot>
</x-app-layout>

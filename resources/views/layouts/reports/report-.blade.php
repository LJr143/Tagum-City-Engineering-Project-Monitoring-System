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
                <h3 class="text-sm font-semibold mb-4 text-center">Report</h3>
                <div class="flex items-center justify-between mb-4 space-x-4">
                </div>
                @if(auth()->user()->isAdmin() || auth()->user()->isEncoder())
                <div class="shadow text-[12px] w-full bg-white mt-0 p-5 rounded-md md:max-w-[800px] min-[1408px]:max-w-[1000px] lg:max-w-[900px] xl:max-w-[870px] 2xl:max-w-[1190px]">
                    <div class="powergrid-filters">
                        <livewire:admin-report />
                    </div>
                </div>
                <div class="shadow text-[12px] w-full bg-white mt-5 p-5 rounded-md md:max-w-[800px] min-[1408px]:max-w-[1000px] lg:max-w-[900px] xl:max-w-[870px] 2xl:max-w-[1190px]">
                    <div class="powergrid-filters">
                        <livewire:report-running-balance />
                    </div>
                </div>

                @else

                    <div class="shadow text-[12px] w-full bg-white mt-0 p-5 rounded-md md:max-w-[800px] min-[1408px]:max-w-[1000px] lg:max-w-[900px] xl:max-w-[870px] 2xl:max-w-[1190px]">
                        <div class="powergrid-filters">
                            <livewire:project-incharge-report />
                        </div>
                    </div>

                @endif

            </div>
        </div>

    </x-slot>
</x-app-layout>

<x-app-layout mainClass="flex" headerClass="shadow-[0px_1px_2px_-1px_rgba(0,0,0,0.1)] ">

    <x-slot name="sidebar">
        <x-sidebar></x-sidebar>
    </x-slot>

    <x-slot name="header">
        <x-header></x-header>
    </x-slot>

    <x-slot name="main">

        <h1 class="text-xl font-medium">Reports</h1>
        <p class="mb-6 text-sm">Project Monitoring Reports</p>

        <div id="labor-cost" class="">
            <div class="bg-white shadow-md rounded-lg p-6">
                <h3 class="text-sm font-semibold mb-4 text-center">Report</h3>
                <!-- Filter, Search, Import Inside Card -->
                <div class="flex items-center justify-between mb-4 space-x-4">
{{--                    <div class="flex space-x-2 ml-auto">--}}
{{--                        <livewire:add-user/>--}}
{{--                        <input type="text" placeholder="Search..." class="px-2 py-1 border border-gray-300 rounded-md shadow-sm text-xs w-55">--}}
{{--                    </div>--}}
                </div>
                <div class="shadow text-[12px] w-full bg-white mt-0 p-5 rounded-md md:max-w-[800px] min-[1408px]:max-w-[1000px] lg:max-w-[900px] xl:max-w-[870px] 2xl:max-w-[1190px]">
                    <div class="powergrid-filters">
                        <livewire:admin-report />
                    </div>
                </div>

            </div>
        </div>

    </x-slot>
</x-app-layout>

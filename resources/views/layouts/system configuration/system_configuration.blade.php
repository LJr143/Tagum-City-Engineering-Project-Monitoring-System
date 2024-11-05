<x-app-layout mainClass="flex" headerClass="shadow-[0px_1px_2px_-1px_rgba(0,0,0,0.1)] ">


    <x-slot name="sidebar">
        <x-sidebar></x-sidebar>
    </x-slot>


    <x-slot name="header">
        <x-header></x-header>
    </x-slot>

    <x-slot name="main">

        <div class="flex h-screen text-gray-800">

            <!-- Main Content -->
            <div class="flex-1 p-4">
                <h3 class="text-base font-semibold leading-6 text-gray-900">System Configuration</h3>


            </div>
        </div>


    </x-slot>


</x-app-layout>

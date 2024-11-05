<x-app-layout mainClass="flex" headerClass="shadow-[0px_1px_2px_-1px_rgba(0,0,0,0.1)] ">

    <x-slot name="sidebar">
        <x-sidebar></x-sidebar>
    </x-slot>


    <x-slot name="header">
        <x-header></x-header>
    </x-slot>

    <x-slot name="main">

        <div>
            <!-- Header -->
            <header class="flex flex-row justify-between items-center mb-4">
                <h1 class="text-base font-semibold leading-6 text-gray-900">Projects</h1>
                @if (auth()->user()->isAdmin())
                    <!-- Modal -->
                    <livewire:add-project/>
                @endif
            </header>


            <livewire:project-filter/>

        </div>

    </x-slot>


</x-app-layout>

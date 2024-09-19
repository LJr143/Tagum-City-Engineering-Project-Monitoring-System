<x-app-layout mainClass="flex" headerClass="shadow-[0px_1px_2px_-1px_rgba(0,0,0,0.1)] ">
    {{-- SIDEBAR --}}
    <x-slot name="sidebar" class="w-64 bg-gray-200 min-h-screen">
        <x-sidebar></x-sidebar>

    </x-slot>
    {{-- HEADER --}}

    <x-slot name="header">
        <x-header></x-header>
    </x-slot>
    <x-slot name="main">
        <h1>Report page</h1>
    </x-slot>

</x-app-layout>
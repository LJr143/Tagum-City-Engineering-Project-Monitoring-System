@props(['mainClass' => '', 'bodyClass' => '', 'headerClass' => ''])
    <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Project Monitoring System</title>

    <link rel="shortcut icon" href="{{ asset('storage/pmsAssets/icon_img.png') }}">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="//unpkg.com/alpinejs" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.0.1/dist/chart.umd.min.js"></script>




    <!-- Styles -->
    @livewireStyles
</head>

<body class="font-poppins antialiased bg-[#F7F7F9]">

<div class="min-h-screen max-w-screen-2xl mx-auto bg-[#F7F7F9] {{ $mainClass }}" x-data="{addProcess: false, showSide: true, subSide: false, show:false , showManage:false, preventAction: false, cancellTransaction: false,
        activeItem: localStorage.getItem('activeItem') || 'dashboard',
            setActiveTab(tab) {
                localStorage.setItem('activeItem', tab);
                this.activeItem = tab;
            },
        subActiveItem: localStorage.getItem('subActiveItem') || 'dashboard',
            setSubActiveTab(tab) {
                localStorage.setItem('subActiveItem', tab);
                this.subActiveItem = tab;
            },
        subTmsActiveItem: localStorage.getItem('subTmsActiveItem') || '',
            setsubTmsActiveItem(tab) {
                localStorage.setItem('subTmsActiveItem', tab);
                this.subTmsActiveItem = tab;
            },
        settingsTmsActiveItem: localStorage.getItem('settingsTmsActiveItem') || '',
            setsettingsTmsActiveItem(tab) {
                localStorage.setItem('settingsTmsActiveItem', tab);
                this.settingsTmsActiveItem = tab;
            },
        }">
    @if (isset($sidebar))
        {{-- Sidebar --}}
        <sidebar class="h-screen flex flex-col shadow bg-white z-10 ">
            {{ $sidebar }}
        </sidebar>
    @endif
    <div class="h-screen w-full flex flex-col {{ $bodyClass }}"
         x-on:registered.window="pushNotification('success', 'Admin Created', 'Admin has been create successfully.');"
         x-on:profile-success.window="pushNotification('success', 'Profile Updates', 'Profile has been update successfully.');"
         x-on:category-saved.window="pushNotification('success', 'Category Saved', 'Category has been save successfully.');"
         x-on:category-removed.window="pushNotification('success', 'Category Removed', 'Category has been remove successfully.');"
         x-on:transaction-created.window="pushNotification('success', 'Transaction Created', 'Transaction has been created successfully.');"
         x-on:transaction-edited.window="pushNotification('success', 'Transaction Edited', 'Transaction has been edit successfully.');"
         x-on:transaction-removed.window="pushNotification('success', 'Transaction Removed', 'Transaction has been remove successfully.');">
        <!-- Page Heading -->
        @if (isset($header))
            <header class="flex  {{ $headerClass }}">
                <div class=" p-4 sm:px-10 h-[85px] w-full justify-between items-center flex">
                    {{ $header }}
                </div>
            </header>
        @endif
        @if (isset($main))
            <!-- Page Content -->
            <main class="relative flex-1 max-lg:h-dvh lg:overflow-y-auto  w-full md:p-9 p-5">
                {{ $main }}
            </main>
        @endif

    </div>
</div>

{{ $slot }}


@stack('modals')
{{--@livewire('wire-elements-modal')--}}
@livewireScripts
@if(session('script'))
    {!! session('script') !!}
@endif


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
</body>

</html>

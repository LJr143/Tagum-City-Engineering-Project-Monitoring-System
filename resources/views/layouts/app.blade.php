@props(['mainClass' => '', 'bodyClass' => '', 'headerClass' => ''])
    <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="0">

    <title>Project Monitoring System</title>

    <link rel="shortcut icon" href="{{ asset('storage/pmsAssets/icon_img.png') }}">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link href="https://unpkg.com/filepond@^4/dist/filepond.css" rel="stylesheet" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.0.1/dist/chart.umd.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <!-- Styles -->
    @livewireStyles
</head>

<body class="font-poppins antialiased bg-[#F7F7F9]">

<div class="min-h-screen max-w-screen-2xl mx-auto bg-[#F7F7F9] {{ $mainClass }}" x-data="{ showSide: true, subSide: false, show:false , showManage:false, preventAction: false">
    @if (isset($sidebar))
        {{-- Sidebar --}}
        <sidebar class="h-screen flex flex-col shadow bg-white z-10 ">
            {{ $sidebar }}
        </sidebar>
    @endif
    <div class="h-screen w-full flex flex-col {{ $bodyClass }}"
         x-on:project-added.window="pushNotification('success', 'Project Created', 'Project has been created successfully.');"
         x-on:pow-added.window="pushNotification('success', 'POW Created', 'POW has been created successfully.');"
         x-on:project-edited.window="pushNotification('success', 'Project Saved', 'Project has been updated successfully.');"
         x-on:payroll-added.window="pushNotification('success', 'Payroll Saved', 'Payroll has been created successfully.');"
         x-on:user-added.window="pushNotification('success', 'User Saved', 'User has been created successfully.');"
         x-on:user-edited.window="pushNotification('success', 'User Saved', 'User has been updated successfully.');"
         x-on:open-edit-modal.window="pushNotification('success', 'Edit Modal Opened', 'Edit modal opened successfully.');"
         x-on:user-deleted.window="pushNotification('success', 'User Deleted', 'User deleted successfully.');"
         x-on:material-edited.window="pushNotification('success', 'Material Edited', 'Material edited successfully.');"
         x-on:material-deleted.window="pushNotification('success', 'Material Deleted', 'Material deleted successfully.');"
         x-on:suspend-success.window="pushNotification('success', 'Project Suspended', 'Project suspended successfully.');"
         x-on:mismatch-import.window="pushNotification('error', 'Project Details Failed', 'PR total amount does not match pow total amount.');"
         x-on:resumed-success.window="pushNotification('success', 'Project Resumed', 'Project resumed successfully.');"
         x-on:realignment-success.window="pushNotification('success', 'Realignment Success', 'Funds realigned successfully.');"
         x-on:indirect-costs-saved.window="pushNotification('success', 'Indirect Cost Added', 'Indirect cost added successfully.');"
         x-on:mark-complete.window="pushNotification('success', 'Marked Complete', 'Project marked complete successfully.');"
         x-on:marked-complete-approve.window="pushNotification('success', 'Project Approved', 'Project approved successfully.');"
         x-on:marked-complete-deny.window="pushNotification('success', 'Project Denied', 'Project denied successfully.');"
         x-on:swa-report-success.window="pushNotification('success', 'Report Added', 'Report added successfully.');"
         x-on:swa-report-add-error.window="pushNotification('error', 'Material Not Found', 'No material matches item no.');"
         x-on:indirect_update.window="pushNotification('success', 'Indirect Report Added', 'Indirect report added successfully.');"
         x-on:job-order-failed.window="pushNotification('error', 'Failed to add job order', 'Insufficient labor cost balance.');"
         x-on:job-order-added.window="pushNotification('success', 'Job Order Added', 'Job order added successfully.');"
         x-on:project-extended.window="pushNotification('success', 'Project Extended', 'Project extended successfully.');"
         x-on:progress-saved.window="pushNotification('success', 'Project Saved', 'Project saved successfully.');"
    >


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
@livewireScripts
@if(session('script'))
    {!! session('script') !!}
@endif


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
<script src="{{ asset('js/app.js') }}"></script>
<script src="https://unpkg.com/filepond@^4/dist/filepond.js"></script>

@yield('scripts')
</body>

</html>

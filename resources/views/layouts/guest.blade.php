<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Project Monitoring System') }}</title>

    <!-- Fonts -->
    <link rel="shortcut icon" href="{{ asset('storage/pmsAssets/icon_img.png') }}">
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    @livewireStyles
</head>
<body class="flex flex-col md:flex-row h-screen">
<!-- Left Side -->
<div class="w-full md:w-1/2 relative">
    <img alt="City Hall of Tagum" class="w-full h-full object-cover" height="1080" src="{{ asset('storage/pmsAssets/bg_img.png') }}" width="960"/>
    <div class="absolute inset-0 ">
    </div>
    <div class="absolute inset-0 flex flex-col items-center justify-center text-white px-4">
        <div class="flex items-center mb-4">
            <img alt="Logo" class="mr-4 mt-4 md:mt-0 w-[130px] h-[230px] md:w-[180px] md:h-[280px]"  src="{{ asset('storage/pmsAssets/icon_img.png') }}" />
            <div class="flex flex-col">
                <div class="top mt-[10px] md:mt-[-60px]">
                    <img alt="Seal 1"  src="{{ asset('storage/pmsAssets/logo_img.png') }}" class="w-[130px]" />
                </div>
                <div class="ml-[-40px] md:ml-[-50px] mt-8 md:mt-10" >
                    <p class="text-white text-[12px]">
                        Office of the City Engineer
                    </p>
                    <p class="text-white font-bold text-[35px]">
                        TC-PMS
                    </p>
                    <p class="text-white" style="font-size: 12px;">
                        Tagum City Project Monitoring System
                    </p>
                </div>
            </div>
        </div>
        <div class="w-full flex justify-center md:mt-20">
            <p class="text-white font-bold">"WE ARE TAGUM"</p>
        </div>
    </div>
</div>

<div class="w-full md:w-1/2 bg-white flex items-center justify-center relative">
    {{ $slot  }}
</div>



@livewireScripts
</body>
</html>

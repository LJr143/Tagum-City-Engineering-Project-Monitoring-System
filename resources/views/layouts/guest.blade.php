<!DOCTYPE html>
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
    <body>
        <div class="font-sans text-gray-900 antialiased flex">
            <div class="h-screen bg-cover w-1/2 flex flex-col justify-center items-center"
                 style="background-image: url('{{ asset('storage/pmsAssets/bg_img.png') }}')">
                <div class=" w-full flex flex-row justify-center " style="height: 400px">
                    <div class="flex flex-col justify-start">
                        <img  src="{{ asset('storage/pmsAssets/icon_img.png') }}" alt="" style="width: 180px; height: 280px">
                    </div>
                    <div class="h-12 mt-8 pl-2" style="margin-left: 20px">
                        <img  src="{{ asset('storage/pmsAssets/logo_img.png') }}" alt="" style="width: 130px">
                        <div style="margin-left: -50px; margin-top: 30px">
                            <p class="text-white" style="font-size: 12px">Office of the City Engineer</p>
                            <p class="text-white font-bold" style="font-size: 35px">TC-PMS</p>
                            <p class="text-white" style="font-size: 12px">Tagum City Project Monitoring System</p>
                        </div>
                    </div>
                </div>

                <div class="w-full flex justify-center">
                    <p class="text-white font-bold">"WE ARE TAGUM"</p>
                </div>
            </div>
            <div class="flex flex-col justify-center  w-1/2">
                {{ $slot  }}
            </div>

        </div>

        @livewireScripts
    </body>
</html>

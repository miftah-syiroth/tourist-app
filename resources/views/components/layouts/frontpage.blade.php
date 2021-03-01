<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        {{-- icons --}}
        <link rel="shortcut icon" href="{{ asset('frontpage/assets/img/favicon.ico')}}" />
        <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('frontpage/assets/img/apple-icon.png') }}" />

        <!-- Fonts -->
        <link rel="stylesheet" href="{{ asset('frontpage/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css') }}" />

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
    </head>

    <body class="text-gray-800 font-sans antialiased">
        {{-- untuk navbar --}}
        <x-frontpage.navigation />
        {{-- /untuk navbar --}}

        <main>
            {{-- hero section --}}
            <div class="relative pt-16 pb-32 flex content-center items-center justify-center" style="min-height: 75vh;">
                <div class="absolute top-0 w-full h-full bg-center bg-cover" style="background-image: url( {{ asset('storage/' . $heroImage->image) }} )">
                    <span id="blackOverlay" class="w-full h-full absolute opacity-75 bg-black"></span>
                </div>
                <div class="container relative mx-auto">
                    <div class="items-center flex flex-wrap">
                    <div class="w-full lg:w-6/12 px-4 ml-auto mr-auto text-center">
                        <div class="pr-12">
                            <h1 class="text-white font-semibold text-4xl">
                                {{ $headline->title }}
                            </h1>
                            <p class="mt-4 text-lg text-gray-300">
                                {{ $headline->subtitle }}
                            </p>
                        </div>
                    </div>
                    </div>
                </div>
                <div class="top-auto bottom-0 left-0 right-0 w-full absolute pointer-events-none overflow-hidden"
                    style="height: 70px; transform: translateZ(0px);">
                    <svg class="absolute bottom-0 overflow-hidden" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none" version="1.1" viewBox="0 0 2560 100" x="0" y="0">
                        <polygon class="text-gray-300 fill-current" points="2560 0 2560 100 0 100"></polygon>
                    </svg>
                </div>
            </div>
            {{-- end hero section --}}

            {{ $slot }}
        </main>

        {{-- footer section --}}
        <x-frontpage.footer />
        {{-- / footer --}}


        <script>
            function toggleNavbar(collapseID) {
            document.getElementById(collapseID).classList.toggle("hidden");
            document.getElementById(collapseID).classList.toggle("block");
            }
        </script>
    </body>

</html>
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
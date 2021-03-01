<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="{{ asset('dashboard-layout/vendor/@fortawesome/fontawesome-free/css/all.min.css') }}" />

    {{-- tailwind css by laravel --}}
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    {{-- alpine by laravel --}}
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>
<body class="font-sans antialiased text-black bg-white">
    <div class="flex h-screen overflow-y-hidden" x-data="setup()" x-init="$refs.loading.classList.add('hidden')">
        <!-- Loading screen -->
        <div x-ref="loading" class="fixed inset-0 z-50 flex items-center justify-center text-white bg-black bg-opacity-50" style="backdrop-filter: blur(14px); -webkit-backdrop-filter: blur(14px)">
            Loading.....
        </div>

        <!-- Sidebar backdrop -->
        <div x-show.in.out.opacity="isSidebarOpen" class="fixed inset-0 z-10 bg-black bg-opacity-20 lg:hidden" style="backdrop-filter: blur(14px); -webkit-backdrop-filter: blur(14px)">
        </div>

        <!-- Sidebar -->
        <x-dashboard.sidebar />

        <div class="flex flex-col flex-1 h-full overflow-hidden">
            <!-- Navbar -->
            <x-dashboard.navbar />

            <!-- Main content -->
            <main class="flex-1 max-h-full p-5 overflow-hidden overflow-y-scroll">
                <!-- Main content header -->
                {{ $slot }}
            </main>

            <!-- Main footer -->
            <x-dashboard.footer />
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.bundle.min.js"></script>
    <script src="{{ asset('dashboard-layout/public/build/script.js') }}"></script>
    <script>
        const setup = () => {
            return {
                loading: true,
                isSidebarOpen: true,
                toggleSidbarMenu() {
                    this.isSidebarOpen = !this.isSidebarOpen
                },
                isSearchBoxOpen: false,
            }
        }
    </script>
</body>
</html>

<aside x-transition:enter="transition transform duration-300"
    x-transition:enter-start="-translate-x-full opacity-30  ease-in"
    x-transition:enter-end="translate-x-0 opacity-100 ease-out"
    x-transition:leave="transition transform duration-300"
    x-transition:leave-start="translate-x-0 opacity-100 ease-out"
    x-transition:leave-end="-translate-x-full opacity-0 ease-in"
    class="fixed inset-y-0 z-10 flex flex-col flex-shrink-0 w-64 max-h-screen overflow-hidden transition-all transform bg-gray-200 border-r shadow-lg lg:z-auto lg:static lg:shadow-none"
    :class="{'-translate-x-full lg:translate-x-0 lg:w-20': !isSidebarOpen}">

    <!-- sidebar header -->
    <div class="flex items-center justify-between flex-shrink-0 p-2" :class="{'lg:justify-center': !isSidebarOpen}">
        <span class="p-2 text-xl font-semibold leading-8 tracking-wider whitespace-nowrap uppercase">
            K
            <span :class="{'lg:hidden': !isSidebarOpen}">-WD</span>
        </span>
        <button @click="toggleSidbarMenu()" class="p-2 rounded-md lg:hidden">
            <svg class="w-6 h-6 text-gray-600" xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
    </div>
    <!-- Sidebar links -->
    <nav class="flex-1 overflow-hidden hover:overflow-y-auto">
        <ul class="p-2 overflow-hidden">
            <li>
                <a href="/dashboard" class="flex items-center p-2 space-x-2 rounded-md hover:bg-gray-300"
                :class="{'justify-center': !isSidebarOpen}">
                    <i class="fas fa-home"></i>
                    <span :class="{ 'lg:hidden': !isSidebarOpen }">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="/dashboard/articles" class="flex items-center p-2 space-x-2 rounded-md hover:bg-gray-300"
                :class="{'justify-center': !isSidebarOpen}">
                    <i class="far fa-newspaper"></i>
                    <span :class="{ 'lg:hidden': !isSidebarOpen }">Artikel</span>
                </a>
            </li>
            <li>
                <a href="/dashboard/events" class="flex items-center p-2 space-x-2 rounded-md hover:bg-gray-300"
                :class="{'justify-center': !isSidebarOpen}">
                    <i class="far fa-calendar-alt"></i>
                    <span :class="{ 'lg:hidden': !isSidebarOpen }">Acara</span>
                </a>
            </li>
            <li>
                <a href="/dashboard/recreations" class="flex items-center p-2 space-x-2 rounded-md hover:bg-gray-300"
                :class="{'justify-center': !isSidebarOpen}">
                    <i class="fas fa-umbrella-beach"></i>
                    <span :class="{ 'lg:hidden': !isSidebarOpen }">Wahana</span>
                </a>
            </li>
            <li>
                <a href="/dashboard/component-view" class="flex items-center p-2 space-x-2 rounded-md hover:bg-gray-300"
                :class="{'justify-center': !isSidebarOpen}">
                    <i class="fas fa-palette"></i>
                    <span :class="{ 'lg:hidden': !isSidebarOpen }">Komponen</span>
                </a>
            </li>
        <!-- Sidebar Links... -->
        </ul>
    </nav>
</aside>
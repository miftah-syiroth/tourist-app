<nav class="top-0 absolute z-50 w-full flex flex-wrap items-center justify-between px-2 py-3 navbar-expand-lg">
    <div class="container px-4 mx-auto flex flex-wrap items-center justify-between">
        <div class="w-full relative flex justify-between lg:w-auto lg:static lg:block lg:justify-start">
            <a class="text-md font-bold leading-relaxed inline-block mr-4 py-2 whitespace-no-wrap uppercase text-white" href="/">
                Hutan Mangroove
            </a>
            <button
            class="cursor-pointer text-xl leading-none px-3 py-1 border border-solid border-transparent rounded bg-transparent block lg:hidden outline-none focus:outline-none"
            type="button"
            onclick="toggleNavbar('example-collapse-navbar')">
              <i class="text-white fas fa-bars"></i>
            </button>
        </div>
        <div class="lg:flex flex-grow items-center bg-white lg:bg-transparent lg:shadow-none hidden" id="example-collapse-navbar">
          <ul class="flex flex-col lg:flex-row list-none mr-auto">
            <li class="flex items-center">
              <a
                class="lg:text-white lg:hover:text-gray-300 text-gray-800 px-3 py-4 lg:py-2 flex items-center text-xs uppercase font-bold"
                href="#pablo"
                ><i
                  class="lg:text-gray-300 text-gray-500 fab fa-facebook text-lg leading-lg "
                ></i
                ><span class="lg:hidden inline-block ml-2">Share</span></a
              >
            </li>
          </ul>
          <ul class="flex flex-col lg:flex-row list-none lg:ml-auto">
            <li class="flex items-center">
              <a class="lg:text-white font-serif lg:hover:text-gray-400 text-gray-800 px-3 py-4 lg:py-2 flex items-center text-sm uppercase font-bold"
                href="/">
                Beranda
                </a
              >
            </li>
            <li class="flex items-center">
              <a class="lg:text-white font-serif lg:hover:text-gray-400 text-gray-800 px-3 py-4 lg:py-2 flex items-center text-sm uppercase font-bold"
                href="/recreations">
                Rekreasi
                </a
              >
            </li>
            <li class="flex items-center">
              <a class="lg:text-white font-serif lg:hover:text-gray-400 text-gray-800 px-3 py-4 lg:py-2 flex items-center text-sm uppercase font-bold"
                href="/events">
                Acara
              </a>
            </li>
            <li class="flex items-center">
              <a class="lg:text-white font-serif lg:hover:text-gray-400 text-gray-800 px-3 py-4 lg:py-2 flex items-center text-sm uppercase font-bold"
                href="#">
                Promo
                </a
              >
            </li>
            <li class="flex items-center">
              <a class="lg:text-white font-serif lg:hover:text-gray-400 text-gray-800 px-3 py-4 lg:py-2 flex items-center text-sm uppercase font-bold"
                href="#">
                Fasilitas
                </a
              >
            </li>
            <li class="flex items-center">
              <a class="lg:text-white font-serif lg:hover:text-gray-400 text-gray-800 px-3 py-4 lg:py-2 flex items-center text-sm uppercase font-bold"
                href="#">
                Artikel
                </a
              >
            </li>
            {{-- <li class="flex items-center">
              @if (Route::has('login'))
                
                  @auth
                      <a href="{{ url('/dashboard') }}" class="bg-white text-gray-800 active:bg-gray-100 text-xs font-bold uppercase px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none lg:mr-1 lg:mb-0 ml-3 mb-3" style="transition: all 0.15s ease 0s;">
                        <i class="fas fa-user"></i> dashboard
                      </a>
                  @else
                      <a href="{{ route('login') }}" class="bg-white text-gray-800 active:bg-gray-100 text-xs font-bold uppercase px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none lg:mr-1 lg:mb-0 ml-3 mb-3" style="transition: all 0.15s ease 0s;">
                        <i class="fas fa-user"></i> login
                      </a>
                      @if (Route::has('register'))
                          <a href="{{ route('register') }}" class="bg-white text-gray-800 active:bg-gray-100 text-xs font-bold uppercase px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none lg:mr-1 lg:mb-0 ml-3 mb-3" style="transition: all 0.15s ease 0s;">
                        <i class="fas fa-user"></i> register
                      </a>
                      @endif
                  @endauth
            @endif
              
            </li> --}}
          </ul>
        </div>
      </div>
    </nav>
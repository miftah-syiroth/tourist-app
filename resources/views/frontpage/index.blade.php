<x-layouts.frontpage>

    {{-- ini untuk card list wahana--}}
    <section class="pb-20 py-20 bg-gray-300">
        <div class="container mx-auto px-4">
            {{-- ini card --}}
            <x-frontpage.feature-cards :recreations="$recreations" />
            {{-- /ini card --}}
            <div class="text-center bg-transparent flex justify-center">
              <a href="" class="font-extralight text-lg text-black text-center flex hover:underline hover:text-indigo-500">
                Selengkapnya . . . 
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M13 5l7 7-7 7M5 5l7 7-7 7" /></svg>
              </a>
            </div>
        </div>
    </section>
    {{-- /ini untuk card list wahana--}}

    {{-- ini untuk list event --}}
    <section class="relative py-20">
      <div class="bottom-auto top-0 left-0 right-0 w-full absolute pointer-events-none overflow-hidden -mt-20"
        style="height: 80px; transform: translateZ(0px);">
        <svg class="absolute bottom-0 overflow-hidden" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none" version="1.1" viewBox="0 0 2560 100" x="0" y="0">
          <polygon class="text-white fill-current" points="2560 0 2560 100 0 100"></polygon>
        </svg>
      </div>
      <x-frontpage.event-cards :events="$events" />
      <div class="text-center bg-transparent flex justify-center">
        <a href="" class="flex font-extralight text-lg text-black text-center hover:underline hover:text-indigo-500">
          Selengkapnya . . . 
          <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M13 5l7 7-7 7M5 5l7 7-7 7" /></svg>
          
        </a>
      </div>
    </section>
    {{-- /ini untuk list event --}}

    <section class="pb-20 relative block bg-gray-900">
      <div class="bottom-auto top-0 left-0 right-0 w-full absolute pointer-events-none overflow-hidden -mt-20" style="height: 80px; transform: translateZ(0px);">
          <svg
            class="absolute bottom-0 overflow-hidden"
            xmlns="http://www.w3.org/2000/svg"
            preserveAspectRatio="none"
            version="1.1"
            viewBox="0 0 2560 100"
            x="0"
            y="0">
            <polygon
              class="text-gray-900 fill-current"
              points="2560 0 2560 100 0 100">
            </polygon>
          </svg>
        </div>
      <div class="container mx-auto px-4 pt-16 lg:pt-24 lg:pb-50 flex justify-center">
        <div class="p-5 lg:p-10 w-full lg:w-6/12 px-4 bg-gray-300 rounded-3xl">
          <h4 class="text-2xl font-semibold">Berikan Feedback Anda</h4>
          <p class="leading-relaxed mt-1 mb-4 text-gray-600">
            Kesan dan saran Anda menjadi hadiah terbaik kami :)
          </p>
          <form action="" method="post">
            <div class="relative w-full mb-3 mt-8">
              <label class="block uppercase text-gray-700 text-xs font-bold mb-2"
                for="full-name">
                Nama Lengkap
                </label>
                <input type="text" class="px-3 py-3 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:shadow-outline w-full" placeholder="Full Name"
                style="transition: all 0.15s ease 0s;"/>
            </div>
            <div class="relative w-full mb-3">
              <label class="block uppercase text-gray-700 text-xs font-bold mb-2"
                for="email">
                Email
                </label>
              <input type="email" class="px-3 py-3 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:shadow-outline w-full" placeholder="Email" style="transition: all 0.15s ease 0s;"/>
            </div>
            <div class="relative w-full mb-3">
              <label class="block uppercase text-gray-700 text-xs font-bold mb-2" for="message">
                Pesan
              </label>
              <textarea
                rows="4"
                cols="80"
                class="px-3 py-3 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:shadow-outline w-full"
                placeholder="Type a message...">
              </textarea>
            </div>
            <div class="text-center mt-6">
              <button
                class="bg-gray-900 text-white active:bg-gray-700 text-sm font-bold uppercase px-6 py-3 rounded-full shadow hover:shadow-lg hover:bg-green-600 outline-none focus:outline-none mr-1 mb-1"
                type="button"
                style="transition: all 0.15s ease 0s;">
                Kirim Pesan
              </button>
            </div>
          </form>
        </div>
      </div>
    </section>
</x-layouts.frontpage>
<div class="container mx-auto">
    <div class="flex flex-wrap justify-center text-center mb-12">
        <div class="w-full lg:w-6/12 px-4">
            <h2 class="text-4xl font-semibold">{{ 'Acara' }}</h2>
        </div>
    </div>
    <div class="flex flex-wrap">
        {{-- looping acaranya di sini --}}
        @foreach ($events as $event)
        <div class="md:w-6/12 lg:w-4/12 py-4 px-2">
            <div class="text-center rounded-lg border border-gray-400 shadow-2xl">
                <div class="bg-cover rounded-lg rounded-b-none w-full h-60" style="background-image: url({{ asset('storage/' . $event->image) }})">
                </div>
                <div class="px-4 py-5 flex-auto">
                    <h2 class="text-xl font-semibold">{{ $event->name }}</h2>
                    <p class="text-blue-500 font-semibold my-2">Berlaku hingga {{ $event->finish_date }}</p>
                    <a href="" class="bg-white text-black uppercase border border-blue-500 rounded-lg hover:bg-blue-500 hover:text-white hover:border-white py-2 px-16 transition duration-500">Lebih Lanjut</a>
                </div>
            </div>
        </div>
        @endforeach
        {{-- /looping acaranya selesai di sini --}}
    </div>
</div>
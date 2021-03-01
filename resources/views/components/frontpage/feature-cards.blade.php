<div class="container mx-auto">
    <div class="flex flex-wrap justify-center text-center mb-12">
        <div class="w-full lg:w-6/12 px-4">
            <h2 class="text-4xl font-semibold">{{ 'Wahana Spesial' }}</h2>
        </div>
    </div>
    <div class="flex flex-wrap">
        {{-- looping acaranya di sini --}}
        @foreach ($recreations as $recreation)
        <div class="w-full md:w-4/12 lg:mb-0 mb-12 px-4 text-center">
            <a href="" class="flex justify-center bg-cover w-full h-64 mb-8 rounded-lg border shadow-2xl border-gray-400" style="background-image: url({{ asset('storage/' . $recreation->images->first()->image) }})">
                <div class="flex flex-col gap-3 my-auto text-white">
                    <div>
                        <h1 class="font-extrabold text-2xl">{{ $recreation->name }}</h1>
                    </div>
                    <div>
                        <p>Jam Operasional</p>
                        <h3 class="font-extrabold">{{ $recreation->start_day }}</h3>
                    </div>
                    <div>
                        <p>Tiket Masuk</p>
                        <h3 class="font-extrabold">{{ $recreation->price }}</h3>
                    </div>
                </div>
            </a>
        </div>
        @endforeach
        {{-- /looping acaranya selesai di sini --}}
    </div>
</div>
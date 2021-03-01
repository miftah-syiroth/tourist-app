<x-layouts.dashboard>
    <div class="flex flex-col items-start justify-between pb-6 space-y-4 border-b lg:items-center lg:space-y-0 lg:flex-row">
        <h1 class="text-2xl font-semibold whitespace-nowrap">Gambar Utama</h1>
        <div>
            <a href="/dashboard/hero-images" class="inline-flex items-center justify-center px-4 py-1 space-x-1 bg-gray-300 rounded-md shadow hover:bg-opacity-60">
                <i class="far fa-plus-square"></i>
                <span>Ubah Gambar</span>
            </a>
            <a href="#" class="inline-flex items-center justify-center px-4 py-1 space-x-1 bg-gray-300 rounded-md shadow hover:bg-opacity-60">
                <i class="far fa-plus-square"></i>
                <span>Ubah Kalimat</span>
            </a>
        </div>
    </div>
    <div class="border shadow-sm rounded-lg">
        <div>
            <div>
                <div class="min-w-full h-96 bg-cover bg-center flex justify-center" style="background-image: url({{ asset('storage/' . $heroImage->image) }})">
                    <div>
                        <div class="w-full lg:w-6/12 px-4 ml-auto mr-auto text-center">
                            <div class="py-40">
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
            </div>
            <div class="mt-4">
                <form action="/dashboard/headlines/{{ $headline->id }}" method="post" id="ubahKalimat">
                @method('PUT')
                @csrf
                    <label class="block my-4">
                        <span class="text-gray-700">Ubah Title</span>
                        <textarea name="title" class="form-textarea mt-1 block w-1/2" rows="3" placeholder="Enter some long form content."> {{ $headline->title }}</textarea>
                        @error('title')
                        <div class="text-red-600 font-medium">{{ $message }}</div>
                        @enderror
                    </label>
                    <label class="block my-4">
                        <span class="text-gray-700"> Ubah Subtitle</span>
                        <textarea name="subtitle" class="form-textarea mt-1 block w-1/2" rows="3" placeholder="Enter some long form content."> {{ $headline->subtitle }}</textarea>
                        @error('subtitle')
                        <div class="text-red-600 font-medium">{{ $message }}</div>
                        @enderror
                    </label>
                    <button type="submit" class="rounded-lg bg-blue-400 py-1 px-3">Ubah</button>
                </form>
            </div>
        </div>
    </div>
    
</x-layouts.dashboard>
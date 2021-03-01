<x-layouts.dashboard>
    <div class="flex flex-row gap-6">
        <div class="w-3/4 rounded-md bg-gray-200 p-4">
            <h2>ini adalah edit recreation</h2>
            <form action="/dashboard/recreations/{{ $recreation->slug }}" method="post" enctype="multipart/form-data" class="mt-4">
                @method('PUT')
                @csrf
                <label class="block py-1">
                    <span class="text-gray-700">nama</span>
                    <input value="{{ $recreation->name ?? old('name') }}" class="@error('name') is-invalid @enderror form-input mt-1 block w-full" type="text" name="name" id="name">
                    @error('name')
                    <div class="text-red-600 font-medium">{{ $message }}</div>
                    @enderror
                </label>

                <label class="block py-1">
                    <span class="text-gray-700">Jam buka</span>
                    <input type="time" value="{{ $recreation->start_day ?? old('start_day') }}" name="start_day" id="start_day">
                    @error('start_day')
                    <div class="text-red-600 font-medium">{{ $message }}</div>
                    @enderror
                </label>

                <label class="block py-1">
                    <span class="text-gray-700">jam tutup</span>
                    <input type="time" value="{{ $recreation->finish_day ?? old('finish_day') }}" name="finish_day" id="finish_day">
                    @error('finish_day')
                    <div class="text-red-600 font-medium">{{ $message }}</div>
                    @enderror
                </label>

                <label class="block py-1">
                    <span class="text-gray-700">harga dasar</span>
                    <input type="number" value="{{ $recreation->price ?? old('price') }}" name="price" id="price">
                    @error('price')
                    <div class="text-red-600 font-medium">{{ $message }}</div>
                    @enderror
                </label>

                <label class="block py-1">
                    <span class="text-gray-700">quote</span>
                    <textarea name="quote" id="quote" cols="30" rows="10" class="@error('quote') is-invalid @enderror form-textarea mt-1 block w-full"> {{ $recreation->quote ?? old('quote') }}</textarea>
                    @error('quote')
                    <div class="text-red-600 font-medium">{{ $message }}</div>
                    @enderror
                </label> 

                <div class="mt-4 flex flex-col">
                    @foreach ($recreation->images as $key => $image)
                        <div class="py-4">
                            <a href="">
                                <img src="{{ asset('storage/' . $image->image) }}" class="object-contain h-48 w-full" alt="">
                            </a>
                            <label class="inline-flex">
                                <span class="text-gray-700">Gambar {{$key+1}}</span>
                                <input type="file" name="images[{{ $image->id }}]" id="images" class="@error('images') is-invalid @enderror"> 
                                @error('images')
                                <div class="text-red-600 font-medium">{{ $message }}</div>
                                @enderror
                            </label>
                        </div>
                    @endforeach
                    
                </div>                              
                
                <button class="bg-blue-500 rounded-md px-2 py-1 text-white" type="submit">simpan</button>
            </form>
        </div>
        
    </div>
</x-layouts.dashboard>
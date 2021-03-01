<x-layouts.dashboard>
    <div class="flex flex-row gap-6">
        
        {{-- form edit artikel --}}
        <div class="w-3/4 rounded-md bg-gray-200 p-4">
            <h1 class="font-bold text-lg">Form Pembuatan Artikel</h1>
            <form action="/dashboard/articles/{{ $article->slug }}" method="post" enctype="multipart/form-data" class="mt-4">
                @method('PUT')
                @csrf
                <label class="block">
                    <span class="text-gray-700">Judul</span>
                    <input value="{{ $article->title ?? old('title') }}" class="@error('title') is-invalid @enderror form-input mt-1 block w-full" type="text" name="title" id="title">
                    @error('title')
                    <div class="text-red-600 font-medium">{{ $message }}</div>
                    @enderror
                </label>
                <label class="block">
                    <span class="text-gray-700">pilih kategori artikel</span>
                    <select multiple name="categories[]" id="" class="@error('categories') is-invalid @enderror block w-full mt-1">
                        @foreach ($categories as $category)
                            <option value={{ $category->id }}>{{ $category->category }}</option>
                        @endforeach 
                    </select>
                    @error('categories')
                        <div class="text-red-600 font-medium">{{ $message }}</div>
                    @enderror
                </label>
                <label class="block">
                    <span class="text-gray-700">Konten</span>
                    <textarea name="content" id="content" cols="30" rows="10" class="@error('content') is-invalid @enderror form-textarea mt-1 block w-full"> {{ $article->content ?? old('title') }}</textarea>
                    @error('content')
                    <div class="text-red-600 font-medium">{{ $message }}</div>
                    @enderror
                </label>

                {{-- untuk gambar --}}
                <div class="mt-4 flex flex-col">
                    
                    @foreach ($article->images as $key => $image)
                    <div class="py-4">
                        <a href="">
                            <img class="object-contain h-48 w-full" src=" {{ asset('storage/' . $image->image) }}" alt="">
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
        {{-- END form pembuatan artikel --}}
    </div>     
</x-layouts.dashboard>
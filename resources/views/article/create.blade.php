<x-layouts.dashboard>
    <div class="flex flex-row gap-6">
        
        {{-- form pembuatan artikel --}}
        <div class="w-3/4 rounded-md bg-gray-100 p-4">
            <h1 class="font-bold text-lg">Form Pembuatan Artikel</h1>
            <form action="/dashboard/articles" method="post" enctype="multipart/form-data" class="mt-4">
                @csrf
                <label class="block">
                    <span class="text-gray-700">Judul</span>
                    <input value="{{ old('title') }}" class="@error('title') is-invalid @enderror form-input mt-1 block w-full" type="text" name="title" id="title">
                    @error('title')
                    <div class="text-red-600 font-medium">{{ $message }}</div>
                    @enderror
                </label>
                <label class="block">
                    <span class="text-gray-700">pilih kategori artikel</span>
                    <select name="categories[]" id="" class="@error('categories') is-invalid @enderror form-multiselect block w-full mt-1" multiple>
                        <option disabled selected>Choose some category!</option>
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
                    <textarea name="content" id="content" cols="30" rows="10" class="@error('content') is-invalid @enderror form-textarea mt-1 block w-full"> {{ old('title') }}</textarea>
                    @error('content')
                    <div class="text-red-600 font-medium">{{ $message }}</div>
                    @enderror
                </label>
                <div class="mt-4 flex flex-col">
                    <div class="py-1">
                        <label class="inline-flex">
                            <span class="text-gray-700">Gambar 1</span>
                            <input type="file" name="images[]" id="image1" class="@error('images.0') is-invalid @enderror">
                            @error('images.0')
                            <div class="text-red-600 font-medium">{{ $message }}</div>
                            @enderror
                        </label>
                    </div>
                    
                    <div class="py-1">
                        <label class="inline-flex">
                            <span class="text-gray-700">Gambar 2</span>
                            <input type="file" name="images[]" id="image2" class="@error('images.1') is-invalid @enderror">
                            @error('images.1')
                            <div class="text-red-600 font-medium">{{ $message }}</div>
                            @enderror
                        </label>
                    </div>
                    

                    <div class="py-1">
                        <label class="inline-flex">
                            <span class="text-gray-700">Gambar 3</span>
                            <input type="file" name="images[]" id="image3" class="@error('images.2') is-invalid @enderror">
                            @error('images.2')
                            <div class="text-red-600 font-medium">{{ $message }}</div>
                            @enderror
                        </label>
                    </div>
                </div>
                
                
                <button class="bg-blue-500 rounded-md px-2 py-1 text-white" type="submit">simpan</button>
            </form>
                
        </div>
        {{-- END form pembuatan artikel --}}

        {{-- CRUD CATEGORY --}}
        <div class="w-1/4">
            {{-- Form create atau edit Kategori --}}
            @include('category.form')
            {{-- end form create or edit kategori --}}

            {{-- list category --}}
            @include('category.list')
            {{-- end list category --}}
        </div>
        {{-- END CRUD CATEGORY --}}
        
    </div> 
</x-layouts.dashboard>
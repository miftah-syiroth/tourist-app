<x-app-layout>

    <div class="py-10">
        <div class="container mx-auto sm:px-4 lg:px-4">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex flex-row gap-6">
                        
                        {{-- form pembuatan artikel --}}
                        <div class="w-3/4 rounded-md bg-gray-200 p-4">
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
                                    <select name="category" id="" class="@error('categories') is-invalid @enderror block w-full mt-1">
                                        <option disabled selected>Choose one!</option>
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
                                <div class="mt-4">
                                    <label class="inline-flex">
                                        <span class="text-gray-700">Gambar 1</span>
                                        <input type="file" name="images[]" id="image1" class="@error('images.0') is-invalid @enderror">
                                        @error('images.0')
                                        <div class="text-red-600 font-medium">{{ $message }}</div>
                                        @enderror
                                    </label>
                                    <label class="inline-flex">
                                        <span class="text-gray-700">Gambar 2</span>
                                        <input type="file" name="images[]" id="image2" class="@error('images.1') is-invalid @enderror">
                                        @error('images.1')
                                        <div class="text-red-600 font-medium">{{ $message }}</div>
                                        @enderror
                                    </label>
                                    <label class="inline-flex">
                                        <span class="text-gray-700">Gambar 3</span>
                                        <input type="file" name="images[]" id="image3" class="@error('images.2') is-invalid @enderror">
                                        @error('images.2')
                                        <div class="text-red-600 font-medium">{{ $message }}</div>
                                        @enderror
                                    </label>
                                    <label class="inline-flex">
                                        <span class="text-gray-700">Gambar 4</span>
                                        <input type="file" name="images[]" id="image4" class="@error('images.3') is-invalid @enderror">
                                        @error('images.3')
                                        <div class="text-red-600 font-medium">{{ $message }}</div>
                                        @enderror
                                    </label>
                                    <label class="inline-flex">
                                        <span class="text-gray-700">Gambar 5</span>
                                        <input type="file" name="images[]" id="image5" class="@error('images.4') is-invalid @enderror">
                                        @error('images.4')
                                        <div class="text-red-600 font-medium">{{ $message }}</div>
                                        @enderror
                                    </label>
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
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
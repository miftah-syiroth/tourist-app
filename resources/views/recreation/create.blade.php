<x-app-layout>

    <div class="py-10">
        <div class="container mx-auto sm:px-4 lg:px-4">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex flex-row gap-6">
                        <div class="w-3/4 rounded-md bg-gray-200 p-4">
                            <h2>ini adalah create recreation</h2>
                            <form action="/dashboard/recreations" method="post" enctype="multipart/form-data" class="mt-4">
                                @csrf
                                <label class="block py-1">
                                    <span class="text-gray-700">nama</span>
                                    <input value="{{ old('name') }}" class="@error('name') is-invalid @enderror form-input mt-1 block w-full" type="text" name="name" id="name">
                                    @error('name')
                                    <div class="text-red-600 font-medium">{{ $message }}</div>
                                    @enderror
                                </label>

                                <label class="block py-1">
                                    <span class="text-gray-700">Jam buka</span>
                                    <input type="time" value="{{ old('start_day') }}" name="start_day" id="start_day">
                                    @error('start_day')
                                    <div class="text-red-600 font-medium">{{ $message }}</div>
                                    @enderror
                                </label>

                                <label class="block py-1">
                                    <span class="text-gray-700">jam tutup</span>
                                    <input type="time" value="{{ old('finish_day') }}" name="finish_day" id="finish_day">
                                    @error('finish_day')
                                    <div class="text-red-600 font-medium">{{ $message }}</div>
                                    @enderror
                                </label>

                                <label class="block py-1">
                                    <span class="text-gray-700">harga dasar</span>
                                    <input type="number" value="{{ old('price') }}" name="price" id="price">
                                    @error('price')
                                    <div class="text-red-600 font-medium">{{ $message }}</div>
                                    @enderror
                                </label>

                                <label class="block py-1">
                                    <span class="text-gray-700">quote</span>
                                    <textarea name="quote" id="quote" cols="30" rows="10" class="@error('quote') is-invalid @enderror form-textarea mt-1 block w-full"> {{ old('quote') }}</textarea>
                                    @error('quote')
                                    <div class="text-red-600 font-medium">{{ $message }}</div>
                                    @enderror
                                </label> 

                                <div class="mt-4 flex flex-col">
                                    <div class="py-4">
                                        <label class="inline-flex">
                                            <span class="text-gray-700">Gambar 1</span>
                                            <input type="file" name="images[]" id="" class="@error('images.0') is-invalid @enderror">
                                            @error('images.0')
                                            <div class="text-red-600 font-medium">{{ $message }}</div>
                                            @enderror
                                        </label>
                                    </div>

                                    <div class="py-4">
                                        <label class="inline-flex">
                                            <span class="text-gray-700">Gambar 2</span>
                                            <input type="file" name="images[]" id="" class="@error('images.1') is-invalid @enderror">
                                            @error('images.1')
                                            <div class="text-red-600 font-medium">{{ $message }}</div>
                                            @enderror
                                        </label>
                                    </div>

                                    <div class="py-4">
                                        <label class="inline-flex">
                                            <span class="text-gray-700">Gambar 3</span>
                                            <input type="file" name="images[]" id="" class="@error('images.2') is-invalid @enderror">
                                            @error('images.2')
                                            <div class="text-red-600 font-medium">{{ $message }}</div>
                                            @enderror
                                        </label>
                                    </div>
                                </div>                              
                                
                                <button class="bg-blue-500 rounded-md px-2 py-1 text-white" type="submit">simpan</button>
                            </form>
                        </div>
                        
                    </div>
                   
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
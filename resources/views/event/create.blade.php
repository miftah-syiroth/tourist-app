<x-layouts.dashboard>
    <div class="flex flex-row gap-6">
        <div class="w-3/4 rounded-md bg-gray-200 p-4">
            <h2>ini adalah create recreation</h2>
            <form action="/dashboard/events" method="post" enctype="multipart/form-data" class="mt-4">
                @csrf
                <label for="name" class="block py-1">
                    <span class="text-gray-700">nama</span>
                    <input value="{{ old('name') }}" class="@error('name') is-invalid @enderror form-input mt-1 block w-full" type="text" name="name" id="name">
                    @error('name')
                    <div class="text-red-600 font-medium">{{ $message }}</div>
                    @enderror
                </label>

                <label for="recreation" class="block py-1">
                    <span class="text-gray-700">Unit Rekreasi</span>
                    <select name="recreation" id="recreation">
                        <option disabled selected>Pilih Satu!</option>
                        @foreach ($recreations as $recreation)
                            <option value="{{ $recreation->id }}">{{ $recreation->name }}</option>
                        @endforeach                                        
                    </select>
                    @error('recreation')
                    <div class="text-red-600 font-medium">{{ $message }}</div>
                    @enderror
                </label>

                <label for="start_date" class="block py-1">
                    <span class="text-gray-700">Tanggal mulai</span>
                    <input type="datetime-local" name="start_date" id="start_date">
                    @error('start_date')
                    <div class="text-red-600 font-medium">{{ $message }}</div>
                    @enderror
                </label>

                <label for="finish_date" class="block py-1">
                    <span class="text-gray-700">Tanggal selesai</span>
                    <input type="datetime-local" name="finish_date" id="finish_date">
                    @error('finish_date')
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
                    <textarea name="description" id="quote" cols="30" rows="10" class="@error('description') is-invalid @enderror form-textarea mt-1 block w-full"> {{ old('description') }}</textarea>
                    @error('description')
                    <div class="text-red-600 font-medium">{{ $message }}</div>
                    @enderror
                </label> 

                <label class="block py-1">
                    <span class="text-gray-700">Pamflet</span>
                    <input type="file" name="image" id="" class="@error('image') is-invalid @enderror">
                    @error('image')
                    <div class="text-red-600 font-medium">{{ $message }}</div>
                    @enderror
                </label>                            
                
                <button class="bg-blue-500 rounded-md px-2 py-1 text-white" type="submit">simpan</button>
            </form>
        </div>
        
    </div>
</x-layouts.dashboard>
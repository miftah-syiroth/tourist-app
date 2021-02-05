
<div class="bg-gray-200 rounded-md p-4">
    {{-- kalau ada variabel kategori yang akan diupdate, tampilkan form update di bawah ini --}}
    @isset($categoryUpdated)
    <h1 class="font-bold text-lg">Edit Kategori</h1>
    <form action="/dashboard/categories/{{$categoryUpdated->id}}" method="post">
        @method('PUT')
        @csrf
        <label class="block">
            <input type="text" class="@error('category') is-invalid @enderror form-input mt-1 block w-full" name="category" id="category" value="{{ $categoryUpdated->category }}">
            @error('category')
                <div class="text-red-600 font-medium">{{ $message }}</div>
            @enderror
            <button class="bg-blue-500 rounded-md px-2 py-1 text-white" type="submit">Simpan</button>
            <a href="/dashboard/articles/create" class="rounded bg-red-500 text-sm py-1 px-1">Cancel</a>
        </label>
    </form>
    @else
    {{-- Kalau ga ada variabel kategori yang akan diupdate, form buat baru --}}
    <h1 class="font-bold text-lg">Tambah Kategori</h1>
    <form action="/dashboard/categories" method="post">
        @csrf
        <label class="block">
            <input type="text" class="@error('category') is-invalid @enderror form-input mt-1 block w-full" name="category" id="category" value="{{ old('category') }}">
            @error('category')
                <div class="text-red-600 font-medium">{{ $message }}</div>
            @enderror
            <button class="bg-blue-500 rounded-md px-2 py-1 text-white" type="submit">tambah</button>
        </label>                                
        
    </form>
    @endisset
    
</div>


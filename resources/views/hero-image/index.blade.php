<x-layouts.dashboard>
    <div class="flex flex-col items-start justify-between pb-6 space-y-4 border-b lg:items-center lg:space-y-0 lg:flex-row">
        <h1 class="text-2xl font-semibold whitespace-nowrap">Gambar Utama</h1>
    </div>
    <div class="border shadow-sm rounded-lg">
        <div class="flex flex-col">
            <div>
                <p class="text-red-500">Note! Pilih satu gambar untuk diaktivasi, jika ada dua gambar yang aktif maka hanya satu yang digunakan pada aplikasi</p>
            </div>
            <div class="my-4 border shadow-sm rounded-lg">
                <table class="min-w-full overflow-x-scroll divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-xs font-semibold tracking-wider text-left text-gray-500 uppercase">
                                Image
                            </th>
                            <th scope="col" class="px-6 py-3 text-xs font-semibold tracking-wider text-left text-gray-500 uppercase">
                                Status
                            </th>
                            <th scope="col" class="relative px-6 py-3">
                                <span class="sr-only">Edit</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($images as $image)
                        <tr class="transition-all hover:bg-gray-200 hover:shadow-lg">
                            <td class="px-6 py-2 whitespace-nowrap">
                                <img src="{{ asset('storage/' . $image->image) }}" class="w-auto h-40" alt="">
                            </td>
                            <td class="px-6 py-2 whitespace-nowrap">
                                @if ($image->status == false)
                                    tidak aktif
                                @else
                                    <i class="fas fa-check"></i>
                                @endif
                            </td>
                            <td class="px-6 py-2 text-sm font-medium text-right whitespace-nowrap">
                                <form class="inline-flex" action="/dashboard/hero-images/{{$image->id}}" method="post">
                                    @method('PATCH')
                                    @csrf
                                    <button type="submit" class="text-indigo-500 hover:text-indigo-900 hover:underline">
                                        {{ $image->status == true ? 'Copot' : 'Pasang'}}
                                    </button>
                                </form>
                                <span class="px-1">|</span>
                                <form action="/dashboard/hero-images/{{$image->id}}" method="post" class="inline-block">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="text-red-600 hover:underline">Hapus</button>
                                </form>
                            </td>
                        </tr>                
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div>
                <form action="/dashboard/hero-images" method="post" enctype="multipart/form-data" class="mt-4 border border-red-400">
                    @csrf
                        <span class="text-gray-700">Tambah Gambar Baru: </span>
                        <input type="file" name="image" id="" value="{{ old('image') }}" class="w-60 @error('image') is-invalid @enderror">
                        @error('image')
                            <div class="text-red-600 font-medium">{{ $message }}</div>
                        @enderror
                        <button class="bg-blue-500 rounded-md px-2 py-1 text-white" type="submit">simpan</button>                          
                </form>
            </div>
        </div>
        
    </div>
    
</x-layouts.dashboard>
<x-layouts.dashboard>
    <div class="flex flex-col items-start justify-between pb-6 space-y-4 border-b lg:items-center lg:space-y-0 lg:flex-row">
        <h1 class="text-2xl font-semibold whitespace-nowrap">Artikel</h1>
        <a href="/dashboard/articles/create" class="inline-flex items-center justify-center px-4 py-1 space-x-1 bg-gray-300 rounded-md shadow hover:bg-opacity-60">
            <i class="far fa-plus-square"></i>
            <span>Tambah Wahana</span>
        </a>
    </div>

    <div class="border shadow-sm rounded-lg">
        <table class="min-w-full overflow-x-scroll divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3 text-xs font-semibold tracking-wider text-left text-gray-500 uppercase">
                        Nama Rekreasi
                    </th>
                    <th scope="col" class="px-6 py-3 text-xs font-semibold tracking-wider text-left text-gray-500 uppercase">
                        Harga Reguler
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
                @php
                    $i = 1;
                @endphp
                @foreach ($recreations as $recreation)
                <tr class="transition-all hover:bg-gray-200 hover:shadow-lg">
                    <td class="px-6 py-2 whitespace-nowrap">
                        <div class="flex items-center">
                            <div>{{ $i }}.</div>
                            <div class="ml-3 text-sm capitalize font-medium text-gray-900">                                            
                                {{ $recreation->name }}                                          
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-2 whitespace-nowrap">
                        <div class="text-sm text-gray-900">
                            Rp. {{ $recreation->price }},-
                        </div>
                    </td>
                    <td class="px-6 py-2 whitespace-nowrap">
                        <span class="inline-flex px-2 py-1 text-sm font-semibold leading-5 text-green-800 {{  $recreation->status == true ? 'bg-green-100' : '' }} rounded-xl">
                            {{ $recreation->status == true ? 'Active' : 'Inactive'}}
                        </span>
                    </td>
                    <td class="px-6 py-2 text-sm font-medium text-right whitespace-nowrap">
                        <form class="inline-flex" action="/dashboard/recreations/{{$recreation->slug}}" method="post">
                            @method('PATCH')
                            @csrf
                            <button type="submit" class="text-indigo-500 hover:text-indigo-900 hover:underline">
                                {{ $recreation->status == true ? 'Inactivate' : 'Activate'}}
                            </button>
                        </form>
                        <span class="px-1">|</span>
                        <a href="recreations/{{ $recreation->slug }}/edit" class="text-indigo-500 hover:text-indigo-900 hover:underline">
                            Edit
                        </a>
                        <span class="px-1">|</span>
                        <form action="/dashboard/recreations/{{$recreation->slug}}" method="post" class="inline-block">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="text-red-600 hover:underline">Hapus</button>
                        </form>
                    </td>
                </tr>
                @php
                    $i++;
                @endphp
                @endforeach
            </tbody>
        </table>
    </div>
    
</x-layouts.dashboard>
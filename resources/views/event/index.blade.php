<x-layouts.dashboard>
    <div class="flex flex-col items-start justify-between pb-6 space-y-4 border-b lg:items-center lg:space-y-0 lg:flex-row">
        <h1 class="text-2xl font-semibold whitespace-nowrap">Acara</h1>
        <a href="/dashboard/events/create" class="inline-flex items-center justify-center px-4 py-1 space-x-1 bg-gray-300 rounded-md shadow hover:bg-opacity-60">
            <i class="far fa-plus-square"></i>
            <span>Buat Acara</span>
        </a>
    </div>
    <div class="border shadow-sm rounded-lg">
        <table class="min-w-full overflow-x-scroll divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3 text-xs font-semibold tracking-wider text-left text-gray-500 uppercase">
                        Nama
                    </th>
                    <th scope="col" class="px-6 py-3 text-xs font-semibold tracking-wider text-left text-gray-500 uppercase">
                        Harga
                    </th>
                    <th scope="col" class="px-6 py-3 text-xs font-semibold tracking-wider text-left text-gray-500 uppercase">
                        Unit Rekreasi
                    </th>
                    <th scope="col" class="px-6 py-3 text-xs font-semibold tracking-wider text-left text-gray-500 uppercase">
                        Waktu
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
                @foreach ($events as $event)
                <tr class="transition-all hover:bg-gray-200 hover:shadow-lg">
                    <td class="px-6 py-2 whitespace-nowrap">
                        <div class="flex items-center">
                            <div>{{ $i }}.</div>
                            <div class="ml-3 text-sm capitalize font-medium text-gray-900">                                            
                                {{ $event->name }}                                          
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-2 whitespace-nowrap">
                        <div class="text-sm text-gray-900">
                            Rp. {{ $event->price }},-
                        </div>
                    </td>
                    <td class="px-6 py-2 whitespace-nowrap">
                        <div class="text-sm text-gray-900">
                            {{ $event->recreation->name }}
                        </div>
                    </td>
                    <td class="px-6 py-2 whitespace-nowrap">
                        <div class="text-sm text-gray-900">{{ $event->start_date }} - {{ $event->finish_date }}</div>
                        <div class="text-sm text-gray-500">{{ $event->dateDifferential() }}</div>
                    </td>
                    <td class="px-6 py-2 whitespace-nowrap">
                        <span class="inline-flex px-2 py-1 text-sm font-semibold leading-5 text-green-800 {{  $event->status == true ? 'bg-green-100' : '' }} rounded-xl">
                            {{ $event->status == true ? 'Active' : 'Inactive'}}
                        </span>
                    </td>
                    <td class="px-6 py-2 text-sm font-medium text-right whitespace-nowrap">
                        <form class="inline-flex" action="/dashboard/events/{{$event->slug}}" method="post">
                            @method('PATCH')
                            @csrf
                            <button type="submit" class="text-indigo-500 hover:text-indigo-900 hover:underline">
                                {{ $event->status == true ? 'Inactivate' : 'Activate'}}
                            </button>
                        </form>
                        <span class="px-1">|</span>
                        <a href="events/{{ $event->slug }}/edit" class="text-indigo-500 hover:text-indigo-900 hover:underline">
                            Edit
                        </a>
                        <span class="px-1">|</span>
                        <form action="/dashboard/events/{{$event->slug}}" method="post" class="inline-block">
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
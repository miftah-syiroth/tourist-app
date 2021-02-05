<x-app-layout>

    <div class="py-10">
        <div class="container mx-auto sm:px-4 lg:px-4">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                   <ul>
                       @foreach ($articles as $article)
                           <li class="border-2 my-2">
                                <div class="flex flex-row flex-auto justify-between">
                                    <span>{{ $article->title }}</span>
                                    <div>
                                        <form action="/dashboard/articles/{{$article->slug}}" method="post" class="inline-block">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="rounded bg-red-500 text-sm py-1 px-1">hapus</button>
                                        </form>
                                        <a href="/dashboard/articles/{{$article->slug}}/edit" class="rounded bg-red-500 text-sm py-1 px-1">edit</a>
                                    </div>
                                    
                                </div>
                                
                            </li>
                       @endforeach
                   </ul>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
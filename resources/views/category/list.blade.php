<div class="bg-gray-200 rounded-md p-4 mt-4">
    <h1 class="font-bold text-lg">List Kategori</h1>
    <ul>
        @foreach ($categories as $category)
            <li class="border-2 my-2">
                <div class="flex flex-row flex-auto justify-between">
                    <span>{{ $category->category }}</span>
                    <div>
                        <form action="/dashboard/categories/{{$category->id}}" method="post" class="inline-block">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="rounded bg-red-500 text-sm py-1 px-1">hapus</button>
                        </form>
                        <a href="/dashboard/categories/{{$category->id}}/edit" class="rounded bg-red-500 text-sm py-1 px-1">edit</a>
                    </div>
                    
                </div>
                
            </li>
        @endforeach
    </ul>
</div>
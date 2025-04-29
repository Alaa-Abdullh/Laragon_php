<x-app-layout>
<head>
  <!-- Tailwind CSS -->
  <!-- <script src="https://cdn.tailwindcss.com"></script> -->
  <!-- Laravel Vite -->
  @vite('resources/css/app.css')
</head>

<body class="bg-black text-white">
<!-- <a href="/posts/create" class="bg-blue-500 hover:bg-blue-700 px-2 py-1 rounded">ADD new post</a> -->

  <table class="min-w-full divide-y divide-gray-700">
    <thead class="text-left">
      <tr class="font-medium text-white">
        <th class="px-3 py-2 whitespace-nowrap">Id</th>
        <th class="px-3 py-2 whitespace-nowrap">Title</th>
        <th class="px-3 py-2 whitespace-nowrap">Body</th>
        <!-- <th class="px-3 py-2 whitespace-nowrap">user_id</th> -->
        <th class="px-3 py-2 whitespace-nowrap">Comments</th>
        <th class="px-3 py-2 whitespace-nowrap">create </th>
        <th class="px-3 py-2 whitespace-nowrap">image </th>

        


      </tr>
    </thead>

    <tbody class="divide-y divide-gray-700">
      @foreach ($posts as $post)
      <tr class="text-white">
        <td class="px-3 py-2 whitespace-nowrap">{{ $post->id }}</td>
        <td class="px-3 py-2 whitespace-nowrap">{{ $post->title  }}</td>
        <td class="px-3 py-2 whitespace-nowrap">{{ $post->body }}</td>
        <!-- <td class="px-3 py-2 whitespace-nowrap">{{ $post->user_id}}</td> -->
        <td class="px-3 py-2 whitespace-nowrap">
    @foreach ($post->comments as $comment)
        <p>- {{ $comment->content }} ({{ $comment->user->name }})</p>
    @endforeach
</td>
        <td class="px-3 py-2 whitespace-nowrap">{{ $post->name}}</td>
        <td class="px-3 py-2 whitespace-nowrap">
        @if($post->image)
                        <img src="{{ asset('storage/' . $post->image) }}" width="100">
                    @else
                        No Image
        @endif
        </td>

        <td class="px-3 py-2 whitespace-nowrap flex space-x-2">
    <a href="/posts/{{ $post->id }}" class="bg-blue-500 hover:bg-blue-700 px-2 py-1 rounded">View</a>
    <a href="/posts/{{ $post->id }}/edit" class="bg-yellow-500 hover:bg-yellow-700 px-2 py-1 rounded">Edit</a>

    @if ($post->trashed())
        <form action="/posts/{{ $post->id }}/restore" method="POST" class="inline">
            @csrf
            @method('PUT')
            <button type="submit" class="bg-green-500 hover:bg-green-700 px-2 py-1 rounded">Restore</button>
        </form>
    @else
        <form action="/posts/{{ $post->id }}" method="POST" class="inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="bg-red-500 hover:bg-red-700 px-2 py-1 rounded">Delete</button>
        </form>
    @endif
</td>
    

        
      </tr>
      @endforeach
    </tbody>
  </table>
  <div class="mt-4">
    {{ $posts->links() }} 
  </div>


</x-app-layout>


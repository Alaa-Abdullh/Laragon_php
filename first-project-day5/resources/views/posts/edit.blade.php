<x-app-layout>

<head>
  @vite('resources/css/app.css')
</head>

<body class="bg-black text-white p-4">
  <h1 class="text-2xl font-bold mb-4">Edit Post</h1>
  
  <form action="/posts/{{ $post->id }}" method="POST">
    @csrf
    @method('PUT')
    
    <div class="mb-4">
      <label for="title" class="block mb-2">Title</label>
      <input type="text" id="title" name="title" value="{{ $post->title}}" 
             class="w-full px-3 py-2 bg-gray-800 border border-gray-700 rounded">
    </div>
    
    <div class="mb-4">
      <label for="body" class="block mb-2">Body</label>
      <textarea id="body" name="body" 
                class="w-full px-3 py-2 bg-gray-800 border border-gray-700 rounded">{{ $post->body }}</textarea>
    </div>
    
    <!-- <div class="mb-4">
      <label for="created_by" class="block mb-2">user_Id</label>
      <input type="text" id="created_by" name="created_by" value="{{  $post->user_id}}" 
             class="w-full px-3 py-2 bg-gray-800 border border-gray-700 rounded">
    </div> -->
    <!-- user id  -->
    <!-- <select id="user_id" name="user_id" required
    class="w-full p-3 rounded bg-gray-700 text-white focus:outline-none focus:ring-2 focus:ring-blue-500">
    @foreach ($users as $user)
        <option value="{{ $user->id }}" {{ $user->id == $post->user_id ? 'selected' : '' }}>
    {{ $user->name }}
</option>

    @endforeach
</select> -->



    <button type="submit" class="bg-green-500 hover:bg-green-700 px-4 py-2 rounded">Update Post</button>
  </form>
  
  <a href="/posts" class="inline-block mt-4 text-blue-400 hover:text-blue-300">Back to Posts</a>


</x-app-layout>

<x-app-layout>

<head>
  <!-- Tailwind CSS -->
  @vite('resources/css/app.css')
</head>
<body class="bg-black text-white">

  <article class="overflow-hidden rounded-lg shadow-sm transition hover:shadow-lg">
    <div class="bg-black p-4 sm:p-6 ">
      
    <img src="{{ asset('storage/' . $post->image) }}" alt="Post Image" class="rounded mt-4 w-full max-w-md">
      
      <a href="#">
        <h3 class="mt-0.5 text-lg font-bold text-white">
         title:  {{ $post->title}}
        </h3>
      </a>

      <p class="mt-2 line-clamp-3 text-sm/relaxed text-gray-500">
       body :  {{ $post -> body }}
      </p>
      <a href="#">
        <p class="mt-2 line-clamp-3 text-sm/relaxed text-gray-500">
        created_at :  {{ optional($post->created_at)->format('l jS \of F Y h:i A') }}
        </p>
      </a>

      <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">{{ $post->title }}</h1>
        <p>{{ $post->body }}</p>
        <p><small>Posted by {{ $post->name }} on {{ $post->created_at->format('M d, Y') }}</small></p>
        




        <!-- comments  -->

        <h2 class="text-xl font-semibold mt-6 mb-4 text-black">Comments</h2>
        @if($post->comments->isEmpty())
            <p>No comments yet.</p>
        @else
            <ul class="space-y-4">
                @foreach($post->comments as $comment)


                    <li class="border p-4 rounded text-white ">
                        <p>{{ $comment->content }}</p>
                        <small>Posted by {{ $comment->user->name }} on {{ $comment->created_at->format('M d, Y') }}</small>
                    </li>
                @endforeach
            </ul>
        @endif

        <form action="{{ route('posts.storeComment', $post->id) }}" method="POST" class="mt-6">
            @csrf
            <div class="mb-4">
                <label for="user_id" class="block text-sm font-medium">Select User</label>
                <select name="user_id" id="user_id" class="w-full border rounded p-2 text-black" required>
                    <option value="">Choose a user</option>
                    @foreach($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>
                @error('user_id')
                    <p class="text-red-500 text-sm text-red ">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label for="content" class="block text-sm font-medium">Add a Comment</label>
                <textarea name="content" id="content" class="w-full border rounded p-2 text-black" rows="4" required></textarea>
                @error('content')
                    <p class="text-sm text-red">{{ $message }}</p>
                @enderror
            </div>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Submit Comment</button>


        </form>
   


        @if(session('success'))
            <p class="text-green-500 mt-4">{{ session('success') }}</p>
        @endif
    </div>
      <!-- <p class="mt-2 line-clamp-3 text-sm/relaxed text-gray-500">
        {{ $post->user_id }}
      </p> -->
    </div>
  </article>

</x-app-layout>

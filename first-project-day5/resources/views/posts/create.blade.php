<x-app-layout>

<head>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-900 text-white min-h-screen flex items-center justify-center">

    <div class="bg-gray-800 p-8 rounded shadow-md w-full max-w-lg">
        <h1 class="text-2xl font-bold mb-6 text-center">Create New Post</h1>

        <form action="/posts" method="POST" class="space-y-4" enctype="multipart/form-data">
            @csrf

            <!-- Title -->
            <div>
                <label for="title" class="block mb-2 text-sm font-medium">Title</label>
                <input type="text" id="title" name="title" required
                    class="w-full p-3 rounded bg-gray-700 text-white focus:outline-none focus:ring-2 focus:ring-blue-500">
                @if ($errors->has('title'))
                    <p class="text-red-500 text-sm">{{ $errors->first('title') }}</p>
                @endif
            </div>

            <!-- Body -->
            <div>
                <label for="body" class="block mb-2 text-sm font-medium">Body</label>
                <textarea id="body" name="body" rows="5" required
                    class="w-full p-3 rounded bg-gray-700 text-white focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>

                @if ($errors->has('body'))
                    <p class="text-red-500 text-sm">{{ $errors->first('body') }}</p>
                @endif
            </div>

            <!-- User ID -->
            <!-- <div>
                <label for="user_id" class="block mb-2 text-sm font-medium">User</label>
                <select id="user_id" name="user_id" required
                    class="w-full p-3 rounded bg-gray-700 text-white focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="" disabled selected>Select a user</option>
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>
            </div> -->
            <!-- image  -->
            <div>
    <label for="image" class="block mb-2 text-sm font-medium">Image</label>
    <input type="file" id="image" name="image"
        class="w-full p-3 rounded bg-gray-700 text-white focus:outline-none focus:ring-2 focus:ring-blue-500">
    
</div>
            <!-- Submit Button -->
            <div class="flex justify-center">
                <button type="submit"
                    class="bg-blue-500 hover:bg-blue-700 px-6 py-2 rounded font-semibold">
                    Create Post
                </button>
            </div>
        </form>
    </div>

</x-app-layout>

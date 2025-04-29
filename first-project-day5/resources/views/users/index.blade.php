<!DOCTYPE html>
<html lang="en">
<head>
  @vite('resources/css/app.css')
</head>

<body class="bg-black text-white">

  <table class="min-w-full divide-y divide-gray-700 mt-10">
    <thead class="text-left">
      <tr class="font-medium text-white">
        <th class="px-3 py-2 whitespace-nowrap">Id</th>
        <th class="px-3 py-2 whitespace-nowrap">Name</th>
        <th class="px-3 py-2 whitespace-nowrap">Email</th>
        <th class="px-3 py-2 whitespace-nowrap">Title Posts</th>
        <th class="px-3 py-2 whitespace-nowrap">Create-At</th>
        <th class="px-3 py-2 whitespace-nowrap">Actions</th>

      </tr>
    </thead>

    <tbody class="divide-y divide-gray-700">
      @foreach ($users as $user)
      <tr class="text-white">
        <td class="px-3 py-2 whitespace-nowrap">{{ $user->id }}</td>
        <td class="px-3 py-2 whitespace-nowrap">{{ $user->name }}</td>
        <td class="px-3 py-2 whitespace-nowrap">{{ $user->email }}</td>
        <td>
          @foreach ($user->posts as $post)
          {{$post->title}}
          @endforeach
        </td>
        <td class="px-3 py-2 whitespace-nowrap">{{ optional($user->created_at)->format('l jS \of F Y h:i A') }}</td>


        <td class="px-3 py-2 whitespace-nowrap flex space-x-2">
          <a href="/users/{{ $user->id }}" class="bg-blue-500 hover:bg-blue-700 px-2 py-1 rounded">View</a>
          <a href="/users/{{ $user->id }}/edit" class="bg-yellow-500 hover:bg-yellow-700 px-2 py-1 rounded">Edit</a>
          <form action="/users/{{ $user->id }}" method="POST" class="inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="bg-red-500 hover:bg-red-700 px-2 py-1 rounded">Delete</button>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>

</body>
</html>

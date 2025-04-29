<?php


namespace App\Http\Controllers\Api;
use App\Http\Resources\PostResource;

use App\Http\Requests\StorePostRequest;
use App\Http\Controllers\controller;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Post;
// use Carbon\Carbon;

use App\Models\User;
use App\Models\Comment;



class postController extends Controller
{
function index(){
    // data model
    // $posts=Post::all();
    // $posts = Post::whereNull('deleted_at')->get();
    // $posts = Post::paginate(5);
    $posts = Post::with('user')->paginate(5);


    return PostResource::collection($posts);

}

function show($id){
$post=Post::find($id);

    // $post->load('comments.user');
    $post = Post::with('user')->findOrFail($id);
    return new PostResource($post);

    // $users = User::all();
    // return view('posts.view', ['post' => $post, 'users' => $users]);
}


// function create(){
//     $users = User::all();
    // $post->created_at_formatted= Carbon::parse($post->created_at)->format('l jS \of F Y h:i A');

// ('l jS \of F Y h:i A')
//     return view("posts.create",['users' => $users]);
// }

function store( StorePostRequest $request){ 

// $path=null;
// if($request->hasFile('image')){
//     $path = $request->file('image')->store('images', 'public');
// }


$post=new Post;
$post->title=$request->title;
$post->body=$request->body;
$post->user_id=Auth::id();
// $post->user_id = $request->user_id;
$post->save();

return new PostResource($post);
    // return redirect("/posts");
} 

function storeComment(Request $request, Post $post)
{
    $validated = $request->validate([
        'content' => 'required|string|max:1000',
        'user_id' => 'required|exists:users,id'
    ]);
    
    Comment::create([
        'user_id' => $request->user_id,
        'commentable_id' => $post->id,
        'commentable_type' => Post::class,
        'content' => $request->content,
    ]);

    return redirect()->route('posts.show', $post->id);
}

function edit ($id){

    $post = Post::withTrashed()->findOrFail($id); 
    $users = User::all();


    return view('posts.edit', ['post' => $post,'users' => $users]);
    

}

function update($id,Request $request){
    $post = Post::withTrashed()->findOrFail($id); 
    $post->title=$request->title;
    $post->body=$request->body;
    $post->user_id = $request->user_id; 
    $post->save();



    return redirect('/posts');
}

function destroy ($id){
    $post=Post::findOrFail($id); 
    $post->delete();
    return redirect('/posts');


}
function restore($id)
{
    $post = Post::withTrashed()->findOrFail($id);  
    $post->restore(); 
    return redirect('/posts');
}

}

<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $posts = Post::all();
        // $posts = Post::get();
        // $posts = Post::orderBy('created_at', 'desc')->get();
        $posts = Post::latest()->paginate(6);

        //dd($posts);

        return view('posts.index', [
            'posts' => $posts,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //dd(Auth::user()->posts());


        //Validate

        $fields = $request->validate([
            
            'title' => ['required','max:255'],
            'body' => ['required'],
            
        ]);



        //Create a post

            // very interesting here we capture auth user id upon creating a new post
        // Post::create(['user_id' => Auth::id(), ...$fields]);
        Auth::user()->posts()->create($fields);




        //Redirect to dashboard
        return redirect()->back()->with('success', 'Your post was created');


    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }
}

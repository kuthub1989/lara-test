<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePost;
use App\Models\BlogPosts;
use Illuminate\Http\Request;

class PostController extends Controller
{
    private $posts = [
        1 => [
            'title' => 'Intro to Laravel',
            'content' => 'This is a short intro to Laravel',
            'is_new' => true
        ],
        2 => [
            'title' => 'Intro to PHP',
            'content' => 'This is a short intro to PHP',
            'is_new' => false
        ]
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('post.index', ['posts' => BlogPosts::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('post.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePost $request)
    {
        // dd($request);

        $validated = $request->validated();

        /* 
        $post = new BlogPosts();

        Method 1 to store data - value from request object
        $post->title = $request->input('title');
        $post->content = $request->input('content');

        Method 2 to store data - value from validated inputs
        $post->title = $request['title'];
        $post->content = $request['content'];
        
        $post->save(); 
        */

        // Method 3 to store data - Fillable
        $post = BlogPosts::create($validated);

        $request->session()->flash('status', 'New post saved successfully.');

        return redirect()->route('post.show',  $post->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // abort_if(!isset($this->posts[$id]), 404);

        return view('post.show', ['post' => BlogPosts::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('post.edit', ['post' => BlogPosts::findOrFail($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StorePost $request, $id)
    {
        $post = BlogPosts::findOrFail($id);
        $validated = $request->validated();
        $post->fill($validated);
        $post->save();

        $request->session()->flash('status', 'Post updated successfully.');

        return redirect()->route('post.show',  $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        // dd($id);
        $post = BlogPosts::findOrFail($id);
        $post->delete();
        session()->flash('status', 'Post Deleted successfully.');

        return redirect()->route('post.index');
    }
}

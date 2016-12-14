<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();

        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::pluck('name', 'id');

        return view('posts.create')->with([ 'categories' => $categories ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post = Post::create($request->all())->user()->associate($request->user()->id);

        return redirect('posts/' . $post->slug);
    }

    /**
     * Display the specified resource.
     *
     * @param $slug
     *
     * @return \Illuminate\Http\Response
     * @internal param string $id
     *
     */
    public function show($slug)
    {
        $post = Post::where('slug', $slug)->first();

        return view('posts.post', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $slug
     *
     * @return \Illuminate\Http\Response
     * @internal param int $id
     *
     */
    public function edit($slug)
    {
        $post       = Post::where('slug', $slug)->first();
        $categories = Category::all();

        return view('posts.post', compact('post', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param                           $slug
     *
     * @return \Illuminate\Http\Response
     * @internal param int $id
     *
     */
    public function update(Request $request, $slug)
    {
        Post::where('slug', $slug)->update($request->all());

        return redirect('posts/' . $slug);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $slug
     *
     * @return \Illuminate\Http\Response
     * @internal param int $id
     *
     */
    public function destroy($slug)
    {
        Post::where('slug', $slug)->delete();

        return redirect('posts');
    }
}

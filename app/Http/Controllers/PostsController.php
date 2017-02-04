<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\PostRequest;
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
    public function store(PostRequest $request)
    {
        $post = $request->user()->posts()->create($request->all());
        $this->syncCategories($post, $request);

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
        $categories = Category::pluck('name', 'id');

        return view('posts.edit', compact('post', 'categories'));
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
     * @param $id
     *
     * @return \Illuminate\Http\Response
     * @internal param int $id
     *
     */
    public function destroy($id)
    {
        Post::find($id)->first()->delete();

        return "success";
    }

    private function syncCategories(Post $post, Request $request)
    {
        $categories = $request->input('category_list');
        $ids        = [];
        foreach ( $categories as $category ) {
            if ( is_numeric($category) )
                $ids[] = $category; else
                $ids[] = Category::firstOrCreate([ 'name' => $category ])->id;
        }

        $post->categories()->sync($ids);
    }
}

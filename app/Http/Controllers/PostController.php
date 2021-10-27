<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {return response(Post::all());}

    public function postByCategory($category){return response(Post::where('category', $category)->get());}

    public function listCategory(){return response(Post::select('category')->distinct()->get());}

    public function postByAuthor($author){return response(Post::where('author', $author)->get());}

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'category' => 'required',
            'title' => 'required|max:50',
            'body' => 'required',
            'thumbnail' => 'nullable|image'
        ]);

        $validated['author'] = $request->user()['name'];

        Post::create($validated);

        return response([
            'message' => 'new data has been added to HumanResources'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response([
            'message' => 'show spesific item',
            'item' => Post::find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'category' => 'required',
            'title' => 'required|max:50',
            'body' => 'required',
            'thumbnail' => 'nullable|image'
        ]);

        $post = Post::find($id);
        $post->category = $validated['category'];
        $post->title = $validated['title'];
        $post->body = $validated['body'];
        $post->thumbnail = $validated['thumbnail'];
        $post->save();

        return response([
            'message' => 'Data has been updated',
            'updated_data' => $post
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Post::find($id)->delete();

        return response()->json([
            'message' => 'A data has been deleted from Posts',
        ]);
    }
}

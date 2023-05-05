<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostCreateRequest;
use App\Http\Requests\PostUpdateRequest;
use App\Models\Post;
use GuzzleHttp\Psr7\Message;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Post $posts)
    {
    }

    public function show($id)
    {
        $post= Post::findOrFail($id);

        return response()->json([
            'post' => $post
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostCreateRequest $request)
    {
        $post = new Post;
        $post->name = $request->name;
        $post->address = $request->address;
        $post->contact = $request->contact;
        $post->dob = $request->dob;
        $post->gender = $request->gender;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = microtime() . '.' . $extension;
            $path = $file->store('images', 'public');
            $post['image'] = $filename;
        }

        $post->save();
        return response()->json([
            'Message' => 'Post Created Successfully',
            'status' => 'success'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function list()
    {
        $posts = Post::all();
        return response()->json([
            'post' => $posts,
            'status' => 'success'
        ]);
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
    public function update(PostUpdateRequest $request, $id)
    {
        $post= Post::findOrFail($id);
        $post->name = $request->name;
        $post->address = $request->address;
        $post->contact = $request->contact;
        $post->dob = $request->dob;
        $post->gender = $request->gender;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = microtime() . '.' . $extension;
            $path = $file->store('images', 'public');
            $post['image'] = $filename;
        }

        $post->update();
        return response()->json([
            'Message' => 'Post Updated Successfully',
            'status' => 'success',
            'post' => $post
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return response()->json([
            'message' => 'Post Deleted Successfully',
            'status' => 'Success'
        ]);
    }
}

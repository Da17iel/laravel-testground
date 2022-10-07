<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{

    public function ShowCreatePost()
    {
        return view('auth.create-post');
    }

    public function StoreCreatedPost(Request $request)
    {
            $request->validate([
                'title' => 'required|max:255|string|unique:posts',
                'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'body' => 'required'
            ]);
            // Puts the Image with the Original Name inside the Local Disk
            //Storage::disk('local')->put($request->image->getClientOriginalName(), $request->image);

            if (!empty($request->image)) {
                $imagename = Carbon::now()->getTimestamp() . "_" . $request->image->getClientOriginalName();
                $request->image->storeAs('/public', $imagename);
            } else {
                $imagename = Arr::random(
                    array(
                        'sample-picture-1.png',
                        'sample-picture-2.jpg',
                        'sample-picture-3.jpg',
                        'sample-picture-4.png',
                        'sample-picture-5.jpg',
                        'sample-picture-6.png',
                        'sample-picture-7.jpg'
                    )
                );
            }

            // Select the User ID
            if (!empty(Auth::user()->id)) {
                $userid = Auth::user()->id;
            } else {
                return view('auth.login');
            }

            $post = Post::create([
                'user_id' => $userid,
                'title' => request('title'),
                'slug' => Str::slug(request('title')),
                'image' => $imagename,
                'body' => request('body'),
            ]);
            $post->save();

        return redirect('/posts')->with('status', "Insert successfully");
    }


    public function getPosts()
    {
        return Post::all()->toJson();
    }

    // Show just a single Post
    public function ShowSingle(Post $post)
    {
        return view('single-post', [
            'post' => $post,
            'comment' => $post->comments,
            'user' => User::all(),
        ]);
    }

    // Show all posts at the same time
    public function ShowAll(Post $posts)
    {
        return view('posts', [
            'post' => Post::all(),
        ]);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */


    /**
     * Display the specified resource.
     *
     * @param \App\Models\Post $post
     * @return \Illuminate\Http\Response
     */


    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Post $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Post $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Post $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }
}

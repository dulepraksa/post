<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();

        return view('post.index')->with(compact('posts'));
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


    public function destroy(Request $request, $id)
    {   
        $userId = auth()->user()->id;
        
        $post = Post::findOrFail($id);

        if($post->user_id != $userId) {
            abort(403, 'Unauthorized action.');
        } else {
            $post->delete();
            return redirect()->to('post/index');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'body' => 'required',
            'user_id' => 'required'
        ]);


        
        $post = new Post([
            'title' => $request->title,
            'body' => $request->body,
            'user_id' => $request->user_id
        ]);

        $post->save();


        Session::flash('flash_message', 'Post successfully added!');


        return redirect()->route('post.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        return view('post.edit')->with(compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post = Post::findOrFail($id);

        $request->validate([
            'title' => 'required|max:255',
            'body' => 'required',
            'user_id' => 'required'
        ]);

        $post->update([
            'title' => $request->input('title'),
            'body' => $request->input('body'),
            'user_id' => $request->user_id
        ]);
        
        Session::flash('flash_message', 'Post successfully updated!');

        return view('post.edit')->with(compact('post'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
}

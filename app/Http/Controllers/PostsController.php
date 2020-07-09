<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Post;

class PostsController extends Controller {
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $posts = Post::orderBy('created_at','desc')->paginate(3);
        return view('posts.index')->with('posts',$posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
            'cover_image' => 'image|nullable|max:1999'
        ]);

        // Handle file uppload
        if ($request->hasFile('cover_image')) {
            // Get the filename with the extension
            $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
            // Get only Filname
            $filname = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get only Ext 
            $extension = $request->file('cover_image')->getClientOriginalExtension();

            // Filename to store w/o any file name conflicts
            $filenameToStore = $filname.'_'.time().'.'.$extension;

            // Upload Image
            $path = $request->file('cover_image')->storeAs('public/post_images',$filenameToStore);

        } else{
            $filenameToStore = 'noimage.jpg';
        }

        // Creat post
        $post = new Post;
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->user_id = auth()->user()->id;
        $post->cover_image = $filenameToStore;
        $post->save();

        return redirect('/posts')->with('success', 'Post Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $post = Post::find($id);
        return view('posts.show')->with('post',$post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $post = Post::find($id);

        //Check for the right user
        if(auth()->user()->id !== $post->user_id){
            return redirect()->to('posts/'.$id)->with('error', '&#128683; Unauthorized access!&nbsp; You are not the owner, can\'t Edit the post');
        }

        return view('posts.edit')->with('post',$post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
            'cover_image' => 'image|nullable|max:1999'

        ]);
        
        // Handle file uppload
        if ($request->hasFile('cover_image')) {
            // Get the filename with the extension
            $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
            // Get only Filname
            $filname = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get only Ext 
            $extension = $request->file('cover_image')->getClientOriginalExtension();

            // Filename to store w/o any file name conflicts
            $filenameToStore = $filname.'_'.time().'.'.$extension;

            // Upload Image
            $path = $request->file('cover_image')->storeAs('public/post_images',$filenameToStore);

        }

        // Update post
        $post = Post::find($id);
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        // Check for image
        if ($request->hasFile('cover_image')) {
            $post->cover_image = $filenameToStore;
        }
        $post->save();

        return redirect()->to('posts/'.$id)->with(['success' => 'Post Updated']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        // Delete post
        $post = Post::find($id);

        //Check for the right user
        if(auth()->user()->id !== $post->user_id){
            return redirect()->to('posts/'.$id)->with('error', '&#128683; Unauthorized access!&nbsp; You are not the owner, can\'t Delete the post');
        }

        //Delete the image (keep if noimage.jpg)
        if ($post->cover_image != 'noimage.jpg') {
            Storage::delete('public/post_images/'.$post->cover_image);
        }

        $post->delete();

        return redirect('/posts')->with('error', 'Post Removed');
    }
}

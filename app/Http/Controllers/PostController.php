<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comment;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class PostController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = post::all();
        return view('wall')->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('createpost');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post = new Post();
        $post->title = $request->input('title');
        $post->content = $request->input('content');
        $post->likes = 0;
        $post->user_id =  Auth()->user()->id;

        $fileNameToStore = '';
        if ($request->hasFile('postimage')) {
            $filenameWithExt = $request->file('postimage')->getClientOriginalName();
            // Get Filename without extension
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get Extension only
            $extension = $request->file('postimage')->getClientOriginalExtension();
            // generate Filename To store
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;
            //Upload Image
            $path = $request->file('postimage')->storeAs('public/post_images', $fileNameToStore);
        }

        $post->image = $fileNameToStore;

        $post->save();


        return redirect('home')->with('postid', $post->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = post::find($id);
        return view('postdetail')->with('post', $post);
    }

    public function putlike($id)
    {
        //$id = $request->input('postid');
        $post = post::find($id);
        $post->likes++;
        $post->save();
        //dd($id);
        return redirect()->route('home');
    }

    public function comment(Request $request)
    {
        $comment = new Comment();
        $comment->text =  $request->input('comment');
        $comment->user_id = Auth()->user()->id;
        $comment->post_id = $request->input('postid');
        $comment->save();

        $post = post::find($request->input('postid'));
        return view('postdetail')->with('post', $post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        if (Auth::user()->id == $post->user->id) {
            //process code here. A lot of code. 
            return view('editpost')->with('post', $post);
        } else {
            return view('postdetail')->with('post', $post);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $post = post::find($request->input('postid'));

        $post->title = $request->input('title');
        $post->content = $request->input('content');

        $fileNameToStore = '';
        if ($request->hasFile('postimage')) {
            $filenameWithExt = $request->file('postimage')->getClientOriginalName();
            // Get Filename without extension
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get Extension only
            $extension = $request->file('postimage')->getClientOriginalExtension();
            // generate Filename To store
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;
            //Upload Image
            $path = $request->file('postimage')->storeAs('public/post_images', $fileNameToStore);
        }

        if ($fileNameToStore != '') {
            $post->image = $fileNameToStore;
        }


        $post->save();


        return redirect()->route('user.viewposts')->with('updated', true);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $res= Post::where('id',$post->id)->delete();
        return redirect()->route('user.viewposts')->with('deleted', $res);
    }
}

<?php

namespace App\Http\Controllers;

use Session;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;
use App\Category;
use App\Tag;
use Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('admin.posts.index')->with('posts', Post::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();

        $tags = Tag::all();

        if($categories->count()==0 || $tags->count()==0)
        {
            Session::flash('info', 'Create at-least one category or tag before storing the post.');
            return redirect()->back();
        }

        return view('admin.posts.create')->with('categories', $categories)
                                               ->with('tags', $tags);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title'  => 'required',
            'featured' => 'required|image',
            'text'  => 'required',
            'tags'   => 'required'
        ]);

        $featured = $request->featured;
        $new_featured = time().$featured->getClientOriginalName();
        $featured->move('uploads/posts',$new_featured);

        $post = Post::create([
           'title' =>   $request->title,
           'featured' => 'uploads/posts/'.$new_featured,
            'category_id' => $request->category_id,
            'slug'  =>  str_slug($request -> title),
            'content'   =>  $request->text,
            'user_id'   =>  Auth::user()->id
        ]);

        $post->tags()->attach($request->tags);

        Session::flash('success', 'You successfully created a post.');

        return redirect()->back();
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
        $post = Post::find($id);
        return view('admin.posts.edit')->with('post', $post)
                                             ->with('categories', Category::all())
                                             ->with('tags', Tag::all());
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


        $this->validate($request, [
            'title'  => 'required',
            'category_id' => 'required',
            'text'  => 'required'
        ]);

        $post = Post::find($id);

        if($request->hasFile('featured'))
        {
            $featured = $request->featured;
            $new_featured = time().$featured->getclientOriginalName();
            $featured -> move('uploads/posts', $new_featured);
            $post -> featured = 'uploads/posts/' . $new_featured;
        }


        $post -> title = $request -> title;

        $post -> category_id = $request -> category_id;

        $post -> content = $request -> text;

        $post -> user_id = Auth::user()->id;

        $post -> save();

        $post->tags()->sync($request->tags);

        Session::flash('success', 'Post updated successfully.');

        return redirect()->route('post.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);

        $post -> delete();

        Session::flash('info', 'You successfully trashed the post.');

        return redirect()->back();
    }

    public function trashed()
    {
        $posts = Post::onlyTrashed()->get();
        return view('admin.posts.trash')->with('posts', $posts);
    }

    public function kill($id)
    {
        $posts = Post::withTrashed()->where('id', $id)->first();

        $posts->forceDelete();

        foreach($posts->comments as $comment)
        {
            $comment->delete();
        }



        Session::flash('warning', "Post permanently destroyed.");

        return redirect()->back();
    }

    public function restore($id)
    {
        $post = Post::withTrashed()->where('id', $id)->first();
        $post->restore();

        Session::flash('success', 'Post restored successfully.');

        return redirect()->back();
    }
}

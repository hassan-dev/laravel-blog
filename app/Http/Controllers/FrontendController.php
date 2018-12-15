<?php

namespace App\Http\Controllers;

use App\Category;
use App\Comment;
use App\Post;
use App\Reply;
use App\Setting;
use App\Tag;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        return view('index')->with('title', Setting::first()->site_name)
                                  ->with('categories', Category::take(5)->get())
                                  ->with('first_post', Post::orderBy('created_at', 'dec')->first())
                                  ->with('second_post', Post::orderBy('created_at', 'dec')->skip(1)->take(1)->get()->first())
                                  ->with('third_post', Post::orderBy('created_at', 'dec')->skip(2)->take(1)->get()->first())
                                  ->with('category1', Category::find(6))
                                  ->with('category2', Category::find(7))
                                  ->with('category3', Category::find(8))
                                  ->with('settings', Setting::first());
    }

    public function singlePost($slug)
    {
        $post = Post::where('slug', $slug)->first();

        $next_post = Post::where('id', '>', $post->id)->min('id');
        $pre_post = Post::where('id', '<', $post->id)->max('id');

        return view('single')->with('post', $post)
                         ->with('title', $post->title)
                        ->with('settings', Setting::first())
                        ->with('categories', Category::take(5)->get())
                         ->with('comments', Comment::all())
                        ->with('next', Post::find($next_post))
                        ->with('prev', Post::find($pre_post))
                        ->with('replies', Reply::all());
    }

    public function category($id)
    {
        $category = Category::find($id);

        return view('category') ->with('category', $category)
                                            ->with('settings', Setting::first())
                                            ->with('title', $category->name)
                                            ->with('categories', Category::take(5)->get());


    }

    public function tag($id)
    {
        $tag = Tag::find($id);

        return view('tag')->with('tag', $tag)
                                ->with('title', $tag->tag)
                                ->with('settings', Setting::first())
                                ->with('categories', Category::take(5)->get());
    }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Setting ;
use App\Category ;
use App\Post ;


class FrontEndController extends Controller
{
    public function index() {

        $setting = Setting::first() ;
        return view('welcome')->with('setting', $setting)
        ->with('title',$setting->site_name)
        ->with('categories', Category::take(4)->get())
        ->with('first_post', Post::orderBy('created_at','desc')->first()) 
        ->with('second_post', Post::orderBy('created_at','desc')->skip(1)->take(1)->get()->first()) 
        ->with('third_post', Post::orderBy('created_at','desc')->skip(2)->take(1)->get()->first())
        ->with('tutorial_posts', Category::find(4)->posts()->orderBy('created_at','desc') ->take(3)->get())
        ->with('career_posts', Category::find(5)->posts()->orderBy('created_at','desc') ->take(3)->get()) ;
    }

    public function singlePost($slug) {
        $post = Post::where('slug',$slug)->first() ;
        $next_id = Post::where('id', '>', $post->id)->min('id') ;
        $prev_id = Post::where('id', '<', $post->id)->max('id') ;

        return view('singlePost')->with('post', $post)
        ->with('next_post', Post::find($next_id))
        ->with('prev_post', Post::find($prev_id))
        ->with('setting', Setting::first())
        ->with('title', $post->title)
        ->with('categories', Category::take(4)->get()) ;
    }
}

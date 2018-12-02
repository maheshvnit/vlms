<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        //return view('home');
        $posts = Post::all();
        return view('posts', compact('posts'));
    }

    public function post($slug) {
        //return view('home');
        //$posts = App\Post::all();
        //return view('posts', compact('posts'));
        $post = Post::where('slug', '=', $slug)->firstOrFail();
        return view('post', compact('post'));
    }

}

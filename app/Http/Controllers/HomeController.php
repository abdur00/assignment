<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $i=1;
        $posts = Post::where('user_id',auth()->id())->get();
        return view('home',compact('posts','i'));
    }
    public function adminHome()
    {
        $i=1;
        $posts = Post::all();
        return view('adminHome',compact('posts','i'));
    }
}

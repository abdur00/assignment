<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    //Create Data
    public function create()
    {
        return view('post.create');
    }

    //Storing the new Data

    public function store(Request $request)
    {
        $request->validate([
            'title'       => 'required|min:4',
            'description' => 'required|min:4',

        ]);
        $user              = auth()->user()->id;
        $post              = new Post();
        $post->title       = $request->title;
        $post->description = $request->description;
        $post->user_id     = $user;
        $post->save();
        if(!'is_admin' == 1)
        {
            return redirect()->route('home');
        }else{
            return redirect()->route('admin.home');
        }
    }
    //Deleting the resource from DB
    public function destroy($id)
    {
        Post::where('id',$id)->delete();

        if(!'is_admin' == 1)
        {
            return redirect()->route('home');
        }else{
            return redirect()->route('admin.home');
        }

    }
    // Editing and updating Record
    public function edit($id)
    {
        $post = Post::where('id',$id)->first();
        return view('post.edit',compact('post'));
    }

    public function update(Request $request , $id)
    {
        $request->validate([
            'title'        => 'required|min:4',
            'description'  => 'required|min:4',
        ]);
        $user              = auth()->user()->id;
        Post::where('id',$id)->update(['title' => $request->title,'description' => $request->description, 'user_id' => $user]);

        if(!'is_admin' == 1)
        {
            return redirect()->route('home');
        }else{
            return redirect()->route('admin.home');
        }
    }
}

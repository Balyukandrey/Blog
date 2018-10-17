<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Tag;


class BlogController extends Controller
{

    public function getIndex(){
        $posts = Post::orderBy('id' , 'desc')->paginate(6);

        return view('blog.index')->with('posts', $posts);
    }

    public function getSingle($slug ){

        $post = Post::where('slug', '=' , $slug)->first();


        return view('blog.single')->with('post', $post);
    }
}

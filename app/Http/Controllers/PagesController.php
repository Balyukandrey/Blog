<?php

namespace App\Http\Controllers;
use App\Post;
use App\User;

class PagesController extends Controller {

    public function getIndex() {
        $posts = Post::orderBy('created_at','desc')->limit(4)->get();
        return view('pages.welcome')->with('posts',$posts);
    }

    public function getAbout(){
        return view('pages.about');
    }

    public function getContact(){
        return view('pages.contact');
    }

    public function getUser($id){

        $user = User::find($id);
        $posts = Post::where('user_id' , $id)->get();

        return view('blog.profile')->with('user', $user)->with('posts', $posts);


    }



}
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Facades\Session;
use App\Category;
use App\Tag;
use Intervention\Image\Facades\Image as Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {

         if(Auth::user()->is_admin){

             $posts = Post::orderBy('id', 'desc')->paginate(9);

         } else{

             $posts = Post::where('user_id', Auth::user()->id)->orderBy('id' , 'DESC')->paginate(9);

         }

        return view('posts.index')->with('posts' , $posts);
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


        return view('posts.create')->with('categories', $categories)->with('tags', $tags);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request , array(
            'title' => 'required | max:255',
            'slug' => 'required | alpha_dash| min:5 | max:255 | unique:posts,slug',
            'category_id' => 'required | integer',
            'body' => 'required'
        ));

        $post = new Post;
        $post->user_id = Auth::user()->id;
        $post->title = $request->title;
        $post->slug = $request->slug;
        $post->category_id = $request->category_id;
        $post->body = $request->body;

        if($request->hasFile('featured_image')){
            $image = $request->file('featured_image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/' . $filename);
            Image::make($image)->resize('800, 400')->save($location);

            $post->image = $filename;
        }


        $post->save();

        $post->tags()->sync($request->tags, false);

        Session::flash('success','The blog post was successfully save!');

        return redirect()->route('posts.show' , $post->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);

        return view('posts.show')->with('post',$post);
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
        $categories = Category::all();
        $cats = array();

        foreach($categories as $category){

            $cats[$category->id] = $category->name;
        }

        $tags = Tag::all();
        $tags2 = array();

        foreach($tags as $tag){
            $tags2[$tag->id] = $tag->name;
        }


        return view('posts.edit')->with('post',$post)->with('categories', $cats)->with('tags' , $tags2);

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

        $post = Post::find($id);
        if($request->input('slug') == $post->slug){
            $this->validate($request , array(
                'title' => 'required | max:255',
                'category_id' => 'required | integer',
                'body' => 'required '
            ));
        }else {
            $this->validate($request , array(
                'title' => 'required | max:255',
                'slug' => 'required | alpha_dash| min:5 | max:255 | unique:posts,slug',
                'category_id' => 'required | integer',
                'body' => 'required '
            ));
        }



        $post = Post::find($id);
        $post->title = $request->input('title');
        $post->slug = $request->input('slug');
        $post->category_id = $request->input('category_id');
        $post->body = $request->input('body');

        if($request->hasFile('featured_image')){
            $image = $request->file('featured_image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/' . $filename);
            Image::make($image)->resize('800, 400')->save($location);

            $oldFilename = $post->image;

            $post->image = $filename;

            Storage::delete($oldFilename);
        }

        $post->save();

        if(isset($request->tags)){
            $post->tags()->sync($request->tags);
        }else{
            $post->tags()->sync(array());
        }



        Session::flash('success','The post  was successfully saved.');

        return redirect()->route('posts.show' , $post->id);

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
        $post->tags()->detach();
        Storage::delete($post->image);

        $post->delete();

        Session::flash('success','The post  was successfully deleted.');

        return redirect()->route('posts.index');
    }
}

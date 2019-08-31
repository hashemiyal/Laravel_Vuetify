<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Facades\Validator;

class PostsController extends Controller
{
    protected $fillable=[
    'title','description','created_at','updated_at'
    ];

    public function index()
    {
    $posts=new Post();
    return response($posts->all());
    }
    public function store(Request $request)
    {
    $posts=new Post();
    $data=$request->validate([
    'title'=>'required|string',
    'description'=>'required|string',
    'date'=>'required|string'
    ]);
    $posts->title=$data['title'];
    $posts->description=$data['description'];
    $posts->created_at=$data['date'];
    $posts->save();
    return response(Post::all());
    }
    public function update(Request $request,$id)
    { 
    $data=$request->validate([
    'title'=>'required|string',
    'description'=>'required|string',
    'date'=>'required|string'
    ]);
     $posts=new Post();
     $post=$posts->find($id);
     $post->title=$data['title'];
     $post->description=$data['description'];
     $post->created_at=$data['date'];
     $post->save();
      return response(Post::all());
    }
    public function destroy(Request $request,$id)
    {
    	$post=Post::find($id);
    	$post->delete();
    	return response(Post::all());
    }
}

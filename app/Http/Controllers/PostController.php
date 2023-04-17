<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post ;
class PostController extends Controller
{
    public function index()  { 

        $posts =  Post::paginate(1) ; 

        return view("blog.index" , [
            'posts' => $posts
        ])  ; 
    } 

    public function show(string $slug , string $id) {
        $post = Post::findOrFail($id) ; 

        if($post->slug !== $slug) {
            return to_route('blog.show', ['slug' => $post->slug , 'id' => $post->id]) ; 
        }
 
        return view('blog.show', [
            'post' => $post 
        ]) ; 
    }
}

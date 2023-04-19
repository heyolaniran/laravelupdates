<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post ;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\PostFilterRequest ; 

class PostController extends Controller
{
    public function index( )  { 
 
        $posts =  Post::paginate(25) ; 


        return view("blog.index" , [
            'posts' => $posts
        ])  ; 
    } 

    public function show(string $slug , Post $post) {

       
       
        if($post->slug !== $slug) {
            return to_route('blog.show', ['slug' => $post->slug , 'post' => $post->id]) ; 
        }
 
        return view('blog.show', [
            'post' => $post 
        ]) ; 
    }
}

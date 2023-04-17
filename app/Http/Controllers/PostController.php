<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post ;
class PostController extends Controller
{
    public function index()  { 

        return  Post::paginate(25) ; 
    } 

    public function show(string $slug , string $id) {
        $post = Post::findOrFail($id) ; 

        if($post->slug !== $slug) {
            return to_route('blog.show', ['slug' => $post->slug , 'id' => $post->id]) ; 
        }
 
        return $post ; 
    }
}

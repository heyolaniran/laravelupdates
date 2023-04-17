<?php

use Illuminate\Support\Facades\Route;
use App\Models\Post ; 
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('/blog')->name("blog.")
->group(function () {

    Route::get("/" , function () { 

        $posts = new Post() ; 

        Post::create([
            'title' => 'Nouvel article' , 
            'slug' => 'nouvel-article' , 
            'content' => "Contenu du nouvel article "
        ]) ; 
        
       

        return $posts::where('id', '>', 0)->get() ; 

        return $posts::all(['id' , 'title']) ; 

        return  [
            'link' => route("blog.show" , ['slug' => 'article-posted' , 'id' =>13])
        ] ; 
    })->name("index") ; 
    
    Route::get('/{slug}-{id}', function (string $slug , string $id) {
       $post = Post::findOrFail($id) ; 

       if($post->slug !== $slug) {
           return to_route('blog.show', ['slug' => $post->slug , 'id' => $post->id]) ; 
       }

       return $post ; 
    })->where([
        'id' => '[0-9]+' , 
        'slug' => '[a-z0-9\-]+'
    ])->name("show") ; 

}) ; 



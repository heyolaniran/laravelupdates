<?php

use Illuminate\Support\Facades\Route;

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
        return  [
            'link' => route("blog.show" , ['slug' => 'article-posted' , 'id' =>13])
        ] ; 
    })->name("index") ; 
    
    Route::get('/{slug}-{id}', function (string $slug , string $id) {
        return [
            'slug' => $slug , 
            'id' => $id 
        ] ; 
    })->where([
        'id' => '[0-9]+' , 
        'slug' => '[a-z0-9\-]+'
    ])->name("show") ; 

}) ; 



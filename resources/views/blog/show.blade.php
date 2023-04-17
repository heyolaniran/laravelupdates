@extends('base')

@section('title' , 'Details - Blog ')



@section('content')
<h1> Mon blog </h1>

<article>
    <h2> {{ $post->title }}</h2>

    <p> {{  $post->content}} </p>
</article>




@endsection
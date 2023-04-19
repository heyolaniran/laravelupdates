@extends('base')

@section('title' , 'Acceuil - Blog ')



@section('content')
<h1 class="text-3xl font-bold justify-center flex">
    Hello 
  </h1>

@foreach ($posts as $post)

<article>
    <h2 class="text-lg mb-2 font-semibold"> {{ $post->title }}</h2>

    <p class="mb-2"> {{  $post->content}} </p>
</article>

@endforeach 



@endsection
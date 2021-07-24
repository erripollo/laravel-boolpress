@extends('layouts/app')

@section('content')

    <div class="container show">
        <h1 class="display-4">{{$post->title}}</h1>
        <p class="lead summary">{{$post->summary}}</p>
        <img width="100%" height="500px" class="mb-4" src="{{asset('storage/' . $post->image)}}" alt="" style="object-fit: cover;">
        <p class="body">{{$post->body}}</p>
    </div>
    
@endsection
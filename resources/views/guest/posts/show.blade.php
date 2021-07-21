@extends('layouts/app')

@section('content')

    <div class="container">
        <h1 class="display-4">{{$post->title}}</h1>
        <p class="lead">{{$post->summary}}</p>
        <img width="100%" height="500px" class="mb-4" src="{{$post->image}}" alt="">
        <p>{{$post->body}}</p>
    </div>
    
@endsection
@extends('layouts.admin')

@section('content')

    <div class="container">
        <img class="mb-4" width="300" src="{{asset('storage/' . $post->image)}}" alt="">
        <h1 class="display-4">{{$post->title}}</h1>
        <p class="lead">{{$post->summary}}</p>
        <p>{{$post->body}}</p>
    </div>
    
@endsection
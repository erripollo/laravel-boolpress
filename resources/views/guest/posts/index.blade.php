@extends('layouts.app')

@section('content')

    <div class="container main_blog">
       <div class="row">
            @foreach ($posts as $post)
                <div class="col-md-4 mb-4">
                    <a href="{{route('posts.show', $post->id)}}">
                        <div class="card text-left">
                            <img class="card-img-top" src="{{asset('storage/' . $post->image)}}" alt="{{$post->title}}">
                            <div class="card-body">
                            <h4 class="card-title">{{$post->title}}</h4>
                            <p class="card-text">{{$post->summary}}</p>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
       </div>

       <div class="d-flex justify-content-center mt-4">
           {{$posts->links()}}
       </div>
    </div>
    
@endsection
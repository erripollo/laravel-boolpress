@extends('layouts/app')

@section('content')

    <div class="container show">
        <h1 class="display-4">{{$post->title}}</h1>
        <h5 class="mt-4">Category: 
            @if ($post->category)
                <a href="{{route('categories.show', $post->category->slug)}}">{{$post->category->name}}</a>
            @else
                Uncategorized
            @endif
        </h5>
        <div class="tags mb-4">
            Tags: 
            @forelse ($post->tags as $tag)
                @if ($loop->last)
                    <span>#{{ $tag->name }}.</span>  
                @else 
                    <span>#{{ $tag->name }}, </span>      
                @endif
            @empty
                
            @endforelse
        </div>
        <p class="lead summary">{{$post->summary}}</p>
        <img width="100%" height="500px" class="mb-4" src="{{asset('storage/' . $post->image)}}" alt="" style="object-fit: cover;">
        <p class="body">{{$post->body}}</p>
    </div>
    
@endsection
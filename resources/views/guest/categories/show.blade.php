@extends('layouts.app')

@section('content')

    <div class="container main_search">
        <h1 class="mb-4">Posts in category: {{$category->name}}</h1>

        
        @forelse ($category->posts as $post)
            <div class="post-list d-flex mb-4">
                <a href="{{ route('posts.show', $post->id) }}">
                    <img width="300" src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}">
                </a>
                <div class="ml-3">
                    Title:
                    <p>{{ $post->title }}</p>
                    Summary:
                    <p>{{ $post->summary }}</p>
                </div>
            </div>
        @empty
            <p>Nothing to see here</p>
        @endforelse
        
          
       
    </div>

    
    
@endsection
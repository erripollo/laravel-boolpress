@extends('layouts.app')

@section('content')

    <div class="container main_search">
        <h1 class="mb-4">Results</h1>

        @if($posts->isNotEmpty())
            @foreach ($posts as $post)
            <div class="post-list d-flex mb-4">
                    <a href="{{ route('posts.show', $post->id) }}">
                        <img width="300" src="{{ asset('storage/' . $post->image) }}">
                    </a>
                    <div class="ml-3">
                        Title:
                        <p>{{ $post->title }}</p>
                        Summary:
                        <p>{{ $post->summary }}</p>
                    </div>
                </div>
            @endforeach
        @else 
            <div>
                <h2>No posts found</h2>
            </div>
        @endif
    </div>

    
    
@endsection

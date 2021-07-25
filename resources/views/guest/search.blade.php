@extends('layouts.app')

@section('content')

    <div class="container">
        <h1>Results</h1>

        @if($posts->isNotEmpty())
            @foreach ($posts as $post)
                <div class="post-list">
                    <p>{{ $post->title }}</p>
                    <img src="{{ asset('storage/' . $post->image) }}">
                </div>
            @endforeach
        @else 
            <div>
                <h2>No posts found</h2>
            </div>
        @endif
    </div>

    
    
@endsection

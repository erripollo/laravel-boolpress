@extends('layouts.app')

@section('jumbotron')
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-3">Welcome</h1>
        </div>
    </div>
@endsection

@section('content')

    <div class="container">

        <!-- Last posts section -->
        <section class="last_posts">
            <h2 class="mb-4">Last Posts</h2>
    
            <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    @foreach ($posts as $key => $post)
                        <li data-target="#carouselExampleCaptions" data-slide-to="{{$key}}" class="{{$key == 0 ? 'active' : ''}}"></li>
                    @endforeach
                  {{-- <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                  <li data-target="#carouselExampleCaptions" data-slide-to="2"></li> --}}
                </ol>
    
                <div class="carousel-inner" style="height: 600px">
                    {{--  @php
                         $i = 1;
                     @endphp --}}
                    @foreach ($posts as $key => $post)
                        <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                {{-- @php
                                    $i++;
                                    @endphp --}}
                            <a href="{{route('posts.show', $post->id)}}">
                                <img height="600px" src="{{asset('storage/' . $post->image)}}" class="d-block w-100" alt="..." style="object-fit: cover;">
                                <div class="carousel-caption d-none d-md-block">
                                    <h2 class="display-4">{{$post->title}}</h5>
                                    <p class="lead">{{$post->summary}}</p>
                                </div>
                            </a>
                        </div>
                    @endforeach
                
    
                </div>
                <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
                </a>
            </div>
        </section>
        <!-- /Last posts section -->

        <!-- Popular posts section -->
        <section class="popular_posts">
            <h2 class="mt-5">Popular</h2>
            <div class="row">
                @foreach ($popularPosts as $post)
                    <div class=" col-lg-4 col-md-6 mt-3">
                        <a href="{{route('posts.show', $post->id)}}">
                            <div class="card text-left">
                                <img class="card-img-top" src="{{asset('storage/' . $post->image)}}" alt="{{$post->title}}">
                                <div class="card-body px-1">
                                    <h4 class="card-title">{{$post->title}}</h4>
                                    <p class="card-text">{{$post->summary}}</p>
                                </div>
                            </div>
                        </a>
                    </div>   
                @endforeach
            </div>
            
        </section>
        <!-- /Popular posts section -->
    </div>

    
    
@endsection

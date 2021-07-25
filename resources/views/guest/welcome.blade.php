@extends('layouts.app')

@section('content')

    <div class="container">
        <h1>Last Posts</h1>

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
                                <h5>{{$post->title}}</h5>
                                <p>{{$post->summary}}</p>
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
    </div>

    
    
@endsection

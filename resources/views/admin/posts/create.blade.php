@extends('layouts/admin')

@section('content')

    <div class="container">
        <h1>Create a new post</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
            
        @endif
        
        <form action="{{route('admin.posts.store')}}" method="post">
            @csrf
    
            <div class="form-group">
              <label for="title">Title</label>
              <input type="text" name="title" id="" class="form-control @error('title') is-invalid @enderror" placeholder="Add a post title" aria-describedby="titleHelper" max="100" value="{{old('title')}}">
              <small id="titleHelper" class="text-muted">Type a title for this post</small>
            </div>
            @error('title')
                <div class="alert alert-danger">{{$message}}</div>
            @enderror
    
            <div class="form-group">
                <label for="summary">Summary</label>
                <input type="text" name="summary" id="" class="form-control @error('summary') is-invalid @enderror" placeholder="Add a post summary" aria-describedby="summaryHelper" max="255" value="{{old('summary')}}">
                <small id="summaryHelper" class="text-muted">Type a summary for this post</small>
            </div>
            @error('summary')
                <div class="alert alert-danger">{{$message}}</div>
            @enderror
    
            <div class="form-group">
              <label for="body">Body</label>
              <textarea class="form-control @error('body') is-invalid @enderror" name="body" id="body" rows="4" >{{old('body')}}</textarea>
            </div>
            @error('body')
                <div class="alert alert-danger">{{$message}}</div>
            @enderror
    
            <div class="form-group">
              <label for="image">Image</label>
              <input type="url" name="image" id="image" class="form-control @error('image') is-invalid @enderror" placeholder="Add a post image url" aria-describedby="imageHelper" max="255" value="{{old('image')}}">
              <small id="imageHelper" class="text-muted">Type a image url for this post</small>
            </div>
            @error('image')
                <div class="alert alert-danger">{{$message}}</div>
            @enderror

            <button type="submit" class="btn btn-primary btn-block">Submit</button>
        </form>
    </div>
@endsection
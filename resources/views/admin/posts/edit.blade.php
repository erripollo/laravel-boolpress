@extends('layouts/admin')

@section('content')

    <div class="container">
        <h1>Edit a post</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
            
        @endif
        
        <form action="{{route('admin.posts.update', $post->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
              <label for="title">Title</label>
              <input type="text" name="title" id="" class="form-control @error('title') is-invalid @enderror" placeholder="Add a post title" aria-describedby="titleHelper" max="100" value="{{$post->title}}" required>
              <small id="titleHelper" class="text-muted">Type a title for this post</small>
            </div>
            @error('title')
                <div class="alert alert-danger">{{$message}}</div>
            @enderror
    
            <div class="form-group">
                <label for="summary">Summary</label>
                <input type="text" name="summary" id="" class="form-control @error('summary') is-invalid @enderror" placeholder="Add a post summary" aria-describedby="summaryHelper" max="255" value="{{$post->summary}}">
                <small id="summaryHelper" class="text-muted">Type a summary for this post</small>
            </div>
            @error('summary')
                <div class="alert alert-danger">{{$message}}</div>
            @enderror
    
            <div class="form-group">
              <label for="body">Body</label>
              <textarea class="form-control @error('body') is-invalid @enderror" name="body" id="body" rows="4" >{{$post->body}}</textarea>
            </div>
            @error('body')
                <div class="alert alert-danger">{{$message}}</div>
            @enderror
            
            <div class="form-group">
                <h4>Current image</h4>
                <img width="200" src="{{asset('storage/' . $post->image)}}" alt="">
            </div>

            <div class="form-group">
              <label for="image">Change Image</label>
              <input type="file" class="form-control-file" name="image" id="image" placeholder="Change post image" aria-describedby="imageHelper">
              <small id="imageHelper" class="form-text text-muted">Change image for this post</small>
            </div>
            @error('image')
                <div class="alert alert-danger">{{$message}}</div>
            @enderror

            <div class="form-group">
                <label for="category_id">Categories</label>
                <select class="form-control" name="category_id" id="category_id">
                  <option value="">Select a category</option>
  
                  @foreach ($categories as $category)
                      <option value="{{$category->id}}" {{ $category->id == old('category_id', $post->category_id) ? 'selected' : '' }} >{{$category->name}}</option>
                  @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="tags">Tags</label>
                <select multiple class="form-control" name="tags[]" id="tags">
                    <option value="" disabled>Select a Tag</option>
                    @if ($tags)
                          @foreach ($tags as $tag)
                            @if ($errors->any())
                                <option value="{{ $tag->id }}" {{ in_array($tag->id, old('tags')) ? 'selected' : '' }}> {{ $tag->name }} </option>
                            @else
                                <option value="{{ $tag->id }}" {{ $post->tags->contains($tag) ? 'selected' : '' }}>{{ $tag->name }}</option>
                            @endif
                          @endforeach   
                    @endif
                </select>
              </div>
              @error('tags')
                  <div class="alert alert-danger">{{$message}}</div>
              @enderror

            <button type="submit" class="btn btn-primary btn-block">Submit</button>
        </form>
    </div>
@endsection
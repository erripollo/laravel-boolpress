@extends('layouts.admin')

@section('content')

    <div class="container">
        <h1 class="mb-4">Edit the category</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
            
        @endif

        <form action="{{ route('admin.categories.update', $category->id) }}" method="post">
            @csrf
            @method('PUT')
    
            <div class="form-group">
              <label for="name">Name</label>
              <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" aria-describedby="nameHelper" placeholder="Name category" value="{{$category->name}}" minlength="5" maxlength="25" required>
              <small id="nameHelper" class="form-text text-muted">Edit a name for this category</small>
            </div>
            @error('name')
                <div class="alert alert-danger">{{$message}}</div>
            @enderror

            
            <button type="submit" class="btn btn-primary btn-block">Submit</button>
        </form>

    </div>
    
@endsection
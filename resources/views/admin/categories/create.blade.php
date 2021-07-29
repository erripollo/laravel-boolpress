@extends('layouts.admin')

@section('content')

    <div class="container">
        <h1 class="mb-4">Create a new category</h1>

        <form action="{{ route('admin.categories.store') }}" method="post">
            @csrf
    
            <div class="form-group">
              <label for="name">Name</label>
              <input type="text" class="form-control" name="name" id="name" aria-describedby="nameHelper" placeholder="Name category">
              <small id="nameHelper" class="form-text text-muted">Type a name for this category</small>
            </div>

            
            <button type="submit" class="btn btn-primary btn-block">Submit</button>
        </form>

    </div>
    
@endsection
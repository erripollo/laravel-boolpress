@extends('layouts.admin')

@section('content')

    <div class="container">
        <h1 class="mb-4">Categories</h1>
        <a name="" id="" class="btn btn-primary mb-4" href="{{route('admin.categories.create')}}" role="button">Add New Category</a>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Slug</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                    <tr>
                        <td scope="row">{{ $category->id }}</td>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->slug }}</td>
                        <td>Show | Edit | Delete</td>
                    </tr>    
                @endforeach
            </tbody>
        </table>
    </div>    

@endsection
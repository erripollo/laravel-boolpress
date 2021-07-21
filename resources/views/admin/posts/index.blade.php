@extends('layouts.admin')

@section('content')

    <div class="container">
        <a name="" id="" class="btn btn-primary mb-4" href="{{route('admin.posts.create')}}" role="button">Add New Post</a>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Image</th>
                    <th>Title</th>
                    <th>Summary</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                    <tr>
                        <td scope="row">{{$post->id}}</td>
                        <td><img width="100" src="{{$post->image}}" alt="{{$post->title}}"></td>
                        <td>{{$post->title}}</td>
                        <td>{{$post->summary}}</td>
                        <td>
                            <a href="#">View</a> |
                            <a href="#">Edit</a> |
                            <a href="#">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    
    
@endsection
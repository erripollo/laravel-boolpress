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
                        <td><img width="100" src="{{asset('storage/' . $post->image)}}" alt="{{$post->title}}"></td>
                        <td>{{$post->title}}</td>
                        <td>{{$post->summary}}</td>
                        <td>
                            <div class="d-flex">
                                <a class="btn btn-primary btn-sm mr-2" href="{{route('admin.posts.show', $post->id)}}" role="button">
                                    <i class="fas fa-eye"></i>
                                </a>
                                
                                <a class="btn btn-secondary btn-sm mr-2" href="{{route('admin.posts.edit', $post->id)}}" role="button">
                                    <i class="fas fa-pen"></i>
                                </a>
    
                                 <!-- Button trigger modal -->
                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#post-{{$post->id}}">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                                
                                <!-- Modal -->
                                <div class="modal fade" id="post-{{$post->id}}" tabindex="-1" role="dialog" aria-labelledby="post-{{$post->title}}" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Delete post {{$post->title}}</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                            </div>
                                            <div class="modal-body">
                                                Are you sure you want to delete the post?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <form action="{{route('admin.posts.destroy', $post->id)}}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                        
                                                        <button type="submit" class=" btn btn-danger">Confirm</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="d-flex justify-content-center mt-4">
            {{$posts->links()}}
        </div>
       
    </div>
    
    
@endsection
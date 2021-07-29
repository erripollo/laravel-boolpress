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
                        <td>
                            <div class="d-flex">

                                {{-- edit button --}}
                                <a class="btn btn-secondary btn-sm mr-2" href="{{route('admin.categories.edit', $category->id)}}" role="button">
                                    <i class="fas fa-pen"></i>
                                </a>

                                {{-- delete button --}}

                                 <!-- Button trigger modal -->
                                 <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#category-{{$category->id}}">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                                
                                <!-- Modal -->
                                <div class="modal fade" id="category-{{$category->id}}" tabindex="-1" role="dialog" aria-labelledby="category-{{$category->title}}" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Delete category {{$category->title}}</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                            </div>
                                            <div class="modal-body">
                                                Are you sure you want to delete the category?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <form action="{{route('admin.categories.destroy', $category->id)}}" method="POST">
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
    </div>    

@endsection
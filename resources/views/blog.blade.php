@extends('layouts.app')

@section('jumbotron')
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-3">Vue Blog</h1>
        </div>
    </div>
@endsection

@section('content')

    <div class="container">
        <div class="form-group">
          <select class="form-control" name="categoty" id="categoty" v-model="catSel" style="width: 250px">
            <option selected value="all">All</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
          </select>
        </div>
    
        <div class="d-flex flex-wrap justify-content-center">
            <a :href=" 'posts/' + post.id " v-for="post in posts" v-if="post.category_id == catSel || catSel === 'all' ">
                <div class="card text-left m-2"  style="width: 350px;">
                    <img class="card-img-top" :src=" 'storage/' + post.image " :alt="post.title">
                    <div class="card-body px-1">
                        <h4 class="card-title">@{{post.title}}</h4>
                        <p class="card-text">@{{post.summary}}</p>
                    </div>
                </div>
            </a>
        </div> 
    </div>
@endsection
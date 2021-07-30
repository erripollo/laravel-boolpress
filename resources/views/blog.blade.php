@extends('layouts.app')

@section('jumbotron')
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-3">Vue Blog</h1>
        </div>
    </div>
@endsection

@section('content')
    <div class="container d-flex flex-wrap justify-content-center">
        <div class="card text-left m-2" v-for="post in posts" style="width: 350px;">
            <img class="card-img-top" :src=" 'storage/' + post.image " :alt="post.title">
            <div class="card-body px-1">
                <h4 class="card-title">@{{post.title}}</h4>
                <p class="card-text">@{{post.summary}}</p>
            </div>
        </div>
    </div> 
@endsection
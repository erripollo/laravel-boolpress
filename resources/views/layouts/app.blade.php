<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="bg-dark">
    <div id="app" class="bg-dark">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="#">Boolpress</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
          
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav mr-auto">
                <li class="nav-item {{Route::currentRouteName() === 'home' ? 'active' : '' }}">
                  <a class="nav-link" href="{{route('home')}}">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item {{Route::currentRouteName() === 'posts.index' ? 'active' : '' }}">
                  <a class="nav-link" href="{{route('posts.index')}}">Posts</a>
                </li>
                <li class="nav-item {{Route::currentRouteName() === 'about' ? 'active' : '' }}">
                    <a class="nav-link" href="#">About</a>
                </li>
                <li class="nav-item {{Route::currentRouteName() === 'contacts' ? 'active' : '' }}">
                    <a class="nav-link" href="#">Contacts</a>
                </li>
              </ul>
              <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
              </form>
            </div>
          </nav>

          <div class="jumbotron">
              <h1 class="display-3">Jumbo heading</h1>
              <p class="lead">Jumbo helper text</p>
              <hr class="my-2">
              <p>More info</p>
              <p class="lead">
                  <a class="btn btn-outline-success btn-lg" href="Jumbo action link" role="button">Jumbo action name</a>
              </p>
          </div>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>

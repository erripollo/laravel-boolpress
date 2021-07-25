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
            <div class="container">

                <a class="navbar-brand mr-5" href="#">Boolpress</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
              
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                  <ul class="navbar-nav mr-auto">
                    <li class="nav-item {{Route::currentRouteName() === 'home' ? 'active' : '' }}">
                      <a class="nav-link" href="{{route('home')}}">Home <span class="sr-only">(current)</span></a>
                    </li>
                     <li class="nav-item {{Route::currentRouteName() === 'about' ? 'active' : '' }}">
                        <a class="nav-link" href="#">About</a>
                    </li>
                    <li class="nav-item {{Route::currentRouteName() === 'posts.index' ? 'active' : '' }}">
                      <a class="nav-link" href="{{route('posts.index')}}">Blog</a>
                    </li>
                    <li class="nav-item {{Route::currentRouteName() === 'contacts' ? 'active' : '' }}">
                        <a class="nav-link" href="{{route('contacts')}}">Contacts</a>
                    </li>
                  </ul>
                  <!-- Right Side Of Navbar -->
                  <ul class="navbar-nav ml-auto mr-5">
                    <!-- Authentication Links -->
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>
    
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            
                                <a class="dropdown-item" href="{{ route('admin.dashboard') }}">
                                    Admin
                                </a>
                        
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                                
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
                  <form class="form-inline my-2 my-lg-0" action="{{route('search')}}" method="GET">
                    <input class="form-control mr-sm-2" type="search" name="search" placeholder="Search" aria-label="Search" required>
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                  </form>
                </div>
            </div>
          </nav>

          <div class="jumbotron">
              <div class="container">
                  <h1 class="display-3">Boolpress</h1>
                  <p class="lead">Jumbo helper text</p>
                  <hr class="my-2">
                  <p>More info</p>
                  <p class="lead">
                      <a class="btn btn-outline-success btn-lg" href="Jumbo action link" role="button">Jumbo action name</a>
                  </p>
              </div>
          </div>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>

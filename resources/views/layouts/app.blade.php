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

    <!-- Fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.css" integrity="sha512-3icgkoIO5qm2D4bGSUkPqeQ96LS8+ukJC7Eqhl1H5B2OJMEnFqLmNDxXVmtV/eq5M65tTDkUYS/Q0P4gvZv+yA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @yield('css')
    
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
                    <input class="form-control mr-sm-2" type="search" name="search" placeholder="Search" aria-label="Search" v-model="search" required>
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                  </form>
                </div>


                {{-- dinamic search window --}}
                <ul class="list-group" >
                    <li class="list-group-item" v-for="post in posts" v-if=" post.title.toLowerCase().includes(search.toLowerCase()) && search.length > 0">
                        <a :href="'posts/' + post.id">
                            <h3>@{{post.title}}</h3>
                        </a>
                        <p>@{{post.summary}}</p>
                    </li>
                </ul>

            </div>

        </nav>
        

        <main class="py-4">
            @yield('jumbotron')
            @yield('content')
        </main>
    </div>
</body>
</html>

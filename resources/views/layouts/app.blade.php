<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js" ></script>
    <script src="{{ asset('js/toastr.min.js') }}" defer></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
    @yield('scripts')
        

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
    @yield('styles')
    

    <script type="text/javascript">
        @if(Session::has('success'))
            $(function(){
                toastr.success('{{Session::get('success')}}'); // Display a info toast, with no title
            });
        @endif

        @if(Session::has('info'))
            $(function(){
                toastr.info('{{Session::get('info')}}'); // Display a info toast, with no title
            });
        @endif
        </script>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container">
            <div class="row">
                @if(Auth::check())
                    <div class="col-lg-4">
                        <ul class="list-group">
                            <li class="list-group-item">
                                <a href="{{ route('home') }}">Home</a>
                            </li>
                            <li class="list-group-item">
                                <a href="{{route('categories.create')}}">Create new category</a>
                            </li>
                            <li class="list-group-item">
                                <a href="{{route('categories.index')}}">Categories</a>
                            </li>
                            <li class="list-group-item">
                                    <a href="{{route('tags.create')}}">Create new tag</a>
                                </li>
                            <li class="list-group-item">
                                <a href="{{route('tags.index')}}">Tags</a>
                            </li>
                            <li class="list-group-item">
                                <a href="{{route('posts.create')}}">Create new post</a>
                            </li>
                            <li class="list-group-item">
                                <a href="{{route('posts.index')}}">Posts</a>
                            </li>
                            <li class="list-group-item">
                                <a href="{{route('posts.trashed')}}">Trashed Posts</a>
                            </li>
                            @if(Auth::user()->admin)
                                <li class="list-group-item">
                                    <a href="{{route('users.index')}}">Users</a>
                                </li>
                                <li class="list-group-item">
                                    <a href="{{route('users.create')}}">New User</a>
                                </li>
                            @endif
                            <li class="list-group-item">
                                <a href="{{route('user.profile')}}">My Profile</a>
                            </li>
                            @if(Auth::user()->admin)
                                <li class="list-group-item">
                                    <a href="{{route('settings')}}">Update Settings</a>
                                </li>
                            @endif
                        </ul>
                    </div>
                @endif
                <div class="col-lg-8">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
</body>
</html>

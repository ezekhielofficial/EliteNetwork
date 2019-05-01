<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <title>{{ config('app.name', 'EliteNetwork') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    
</head>
<style>
    html,body{
    height: 100% !important;
}
.bg-dark, .bg-dark a {
    color: #ababab !important;
}
</style>
<body>
    
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark bg-dark">
            <div class="container">
                
                    <a href="/" class="brand-link">
                        
                        <span class="brand-text font-weight-light"><i class="fab fa-connectdevelop text-primary" ></i>   Elite Network</span>
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
                            <li><a class="nav-link" href="/">Home</a></li> 
                            @foreach($pages as $page)  
                            <li><a class="nav-link" href="{{$page->slug}}">{{$page->title}}</a></li>
                        
                            @endforeach
                               
                        <!-- Authentication Links -->
                        @guest
                        <li class="nav-item dropdown">
                                
                                <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Login</a>
                                <div class="dropdown-menu" aria-labelledby="dropdown01">
                                  <a class="dropdown-item" href="{{ route('login') }}"> {{ __('Login') }}</a>
                                  @if (Route::has('register'))
                                  <a class="dropdown-item" href="{{ route('register') }}">{{ __('Register') }}</a>
                                  @endif
                                  
                                </div>
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
                                    @if(auth()->user()->isAdmin == 1)
                                    <a class="dropdown-item" href="/PageCrud">Create New Page</a>
                                    @endif
                                   
                                    <a class="dropdown-item" href="/dashboard">Dashboard</a>    
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

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
   </div>
</body>
<footer class="text-muted">
        <div class="container text-center">
          <p></i> <strong >Copyright &copy; 2019-2020  <a href="https://www.facebook.com/eze.khiel3" target="_blank">Xin</a>.</strong> All rights reserved.</i></p>
        </div>
      </footer>

</html>

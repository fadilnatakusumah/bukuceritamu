{{-- <!DOCTYPE html>
    <html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        
        <title>{{ config('app.name', 'Laravel') }}</title>
        
        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        
        <!-- Fonts -->
        <link rel="dns-prefetch" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
        
        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>
    <body>
        <div id="app">
            <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
                <div class="container">
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
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
                            <li><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                            <li><a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a></li>
                            @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>
                                
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
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
        
        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html> --}}

{{-- <nav class="navbar navbar-light bg-light static-top">
    <div class="container">
        <a class="navbar-brand" href="#">
            <img src="assets\logo.png" alt="" width="30px" height="30px">
            BukuCeritamu
        </a>
        <div>
            <a class="btn btn-primary" href="{{ route('login') }}">Masuk</a>
            <a class="btn btn-primary" href="{{ route('register') }}">Daftar</a>
        </div>
    </div>
</nav> --}}


<!DOCTYPE html>
<html lang="en">

<head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    
    <title>BukuCeritamu @if($title)- {{ $title }} @endif</title>
    
    <!-- Bootstrap core CSS -->
    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    
    <!-- Custom fonts for this template -->
    <link href="{{ asset('vendor/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('vendor/simple-line-icons/css/simple-line-icons.css') }} " rel="stylesheet" type="text/css">
    <link href="{{ asset('https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic') }} " rel="stylesheet" type="text/css">
    
    <!-- Custom styles for this template -->
    <link href="{{ asset('css/landing-page.min.css') }}" rel="stylesheet">
    
    <link rel="stylesheet" href="{{ asset('css/mycss.css') }}">
    <link rel="shortcut icon" href="{{ asset('assets/logo.png') }}" />
    
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Scripts -->
    {{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}
    
    {{-- Jquery --}}
    {{-- <script src="https://code.jquery.com/jquery-3.3.1.min.js"
    integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
    crossorigin="anonymous"></script> --}}
    <script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>

    {{-- Fabric.js --}}
    <script src="{{ asset('js/fabric.js') }}"></script>
    @desktop

    @elsedesktop
    <script>

        location.href = '/';
    
    </script>
    @enddesktop
    {{-- Slick.js for Displaying images
    <link rel="stylesheet" type="text/css" href="{{asset('js/slick/slick.css')}}"/>
    {{-- // Add the new slick-theme.css if you want the default styling --}}
    {{-- <link rel="stylesheet" type="text/css" href="{{asset('js/slick/slick-theme.css')}}"/> --}}

    {{-- Swiper.css --}}
    <link rel="stylesheet" href="{{asset('css/swiper/swiper.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/swiper/swiper.css')}}">
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.3.3/css/swiper.css"> --}}
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.3.3/css/swiper.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.3.3/css/swiper.min.css"> --}}
</head>

<body>
    
    <!-- Navigation -->
    <nav class="navbar navbar-light bg-light static-top border-bottom">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('index')}}">
                <img src="{{ asset('assets\logo.png') }}" alt="" width="30px" height="30px">
                BukuCeritamu
            </a>
            @if(Auth::check())
            @if(!Auth::user()->admin)
            <div class="top-navigation">    
                <a href=" {{ route('user.index') }} ">BERANDA SAYA</a>
                <a href=" {{ route('user.contact.page') }} ">KONTAK</a>
                <a href=" {{ route('user.help.page') }} ">BANTUAN</a>
                {{-- <a href="#" onclick="redir()">BANTUAN2</a> --}}
            </div>
            @endif
            @endif
            
            @if(Auth::check())
            <div>
                <form id="logout-form" action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-primary" href="">Keluar</button>
                </form>
            </div>
            @endif
        </div>
    </nav>
    
    <!-- Icons Grid -->
    {{-- <section class="features-icons bg-white text-center" style="min-height:500px;"> --}}
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12" style="min-height:520px;" id="bg" >
                        
                    @yield('content')
                    
                </div>
            </div>
        </div>
        
        {{-- </section> --}}
        
        <!-- Footer -->
        <footer class="footer bg-dark">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 h-100 text-center text-lg-left my-auto">
                        <p class="text-muted small mb-4 mb-lg-0">&copy; BukuCeritamu 2018. All Rights Reserved.</p>
                    </div>
                    {{-- <div class="col-lg-6 h-100 text-center text-lg-right my-auto">
                        <ul class="list-inline mb-0">
                            <li class="list-inline-item mr-3">
                                <a href="#">
                                    <i class="fa fa-facebook fa-2x fa-fw"></i>
                                </a>
                            </li>
                            <li class="list-inline-item mr-3">
                                <a href="#">
                                    <i class="fa fa-twitter fa-2x fa-fw"></i>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#">
                                    <i class="fa fa-instagram fa-2x fa-fw"></i>
                                </a>
                            </li>
                        </ul>
                    </div> --}}
                </div>
            </div>
        </footer>
        
        <!-- Bootstrap core JavaScript -->
        <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="https://unpkg.com/jspdf@latest/dist/jspdf.min.js"></script>
        <script>
            $(document).ready(function(){
                $(this).scrollTop(0);
            });

            function redir(){
                // location.href = window.location.origin+"/api/assets";
                console.log(window.location.origin+"/api/assets");
            }
        </script>

        {{-- Slick.js --}}
        {{-- <script type="text/javascript" src="{{ asset('js/slick/slick.min.js') }}"></script> --}}
    
        {{-- swiper.js --}}
        {{-- <script src="{{asset('js/swiper.min.js')}}"></script>--}}
        {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.3.3/js/swiper.js"></script> --}}
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.3.3/js/swiper.min.js"></script>
        
        
        {{-- Notify js --}}
        <script src="{{ asset('js/notify.js') }}"></script>
        {{-- <script src="{{ asset('js/akarata/index.js') }}"></script> --}}

        
    </body>
    
    </html>
    
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
    <link href="{{ asset('vendor/simple-line-icons/css/simple-line-icons.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic') }}" rel="stylesheet" type="text/css">
    
    <!-- Custom styles for this template -->
    <link href="{{ asset('css/landing-page.min.css') }}" rel="stylesheet">
    
    <link rel="stylesheet" href="{{ asset('css/mycss.css') }}">
    <link rel="shortcut icon" href="{{ asset('assets/logo.png') }}" />
    <script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
    @desktop

    @elsedesktop

    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
*{
    /* background-color: #3c0b69; */
    font-family: "Lato", sans-serif;
}

.notdesktop{
    height: 600px;
    background: #ec581e;
    display: flex;
    align-items: center;
    justify-content: center;
}


</style>

@enddesktop

</head>

<body>
    
    <!-- Navigation -->
    <nav class="navbar navbar-light bg-light static-top">
        <div class="container">
            <a class="navbar-brand" href="{{ route('index')}}">
                <img src="{{ asset('assets\logo.png') }}" alt="" width="30px" height="30px">
                BukuCeritamu
            </a>
            @desktop
            <div>
                <a class="btn btn-primary" href="{{ route('login') }}">Masuk</a>
                <a class="btn btn-primary" href="{{ route('register') }}">Daftar</a>
            </div>
            @enddesktop
        </div>
    </nav>
    
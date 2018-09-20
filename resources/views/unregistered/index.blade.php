
@include('includes/top')

<!-- Masthead -->


@desktop
           
<header class="masthead text-white text-center">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-xl-9 mx-auto">
            <img src="{{asset('assets\logo.png')}}" class="biglogo" alt="">
                <h1 class="mb-5">Buat buku ceritamu!</h1>
                <a href="{{ route('register') }}" type="button" class="btn btn-danger">Daftar Gratis</a>
            </div>
        </div>  
    </div>
</header>
<!-- THE BOOKS -->
<section class="testimonials text-center bg-muted">
    <div class="container">
        <h2>
            <a href="{{ route('unreg.allbooks') }}">Jelajahi Buku Cerita</a>
        </h2>
        <div class="row mb-5 mt-3">
            <div class="col-12-lg mx-auto">
                <form class="form-inline text-center" method="get" action="{{ route('unreg.search.book') }}">
                    <input required id="searchBar" class="form-control mr-sm-2" name="search" type="search" placeholder="Cari bukumu disini!" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Cari</button>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 mx-auto">
                @if($latestbooks->where('approved','=','1')->count() > 0)
                @foreach($latestbooks as $book)
                <div class="col-lg-4  mx-auto float-left">
                    <div class="card">
                    <a href="{{ route('unreg.read.book', ['slug' => $book->slug])}}">
                        <img class="card-img-top" src="{{$book->cover}}">
                    </a>
                    <div class="card-block">
                        <a href="{{ route('unreg.read.book', ['slug' => $book->slug])}}"><h4 class="card-title">{{$book->title}}</h4></a>
                        <div class="card-text">
                            Author: <b>{{$book->profile->username }}</b><br>
                            Dibuat pada {{$book->created_at}}
                        </div>
                    </div>
                    <div class="card-footer p-1">
                        <span class="float-right"><a href="{{ route('unreg.read.book', ['slug' => $book->slug])}}" class="btn btn-success btn-md">Baca</a></span>
                        {{-- <span><i class=""></i>75 Friends</span> --}}
                    </div>
                    </div>
                </div>
                @endforeach
                @else
                <div class="alert alert-primary" role="alert" >
                    Belum terdapat cerita yang dipublikasikan
                </div>
                @endif
            </div> 
        </div>
    </div>
</section>
<!-- Icons Grid -->
<section class="features-icons bg-light text-center" id="tentang">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
                    <div class="features-icons-icon d-flex">
                        {{-- <i class="icon-screen-desktop m-auto text-primary"></i> --}}
                        <img src="assets\about.png" class="m-auto size-logo" alt="">
                    </div>
                    <h3>Tentang Kami</h3>
                    <p class="lead mb-0">Website ini adalah project dari tugas akhir mahasiswa Teknik Informatika UII!</p>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="features-icons-item mx-auto mb-0 mb-lg-3">
                    <div class="features-icons-icon d-flex">
                        {{-- <i class="icon-check m-auto text-primary"></i> --}}
                        <img src="assets\email.png" class="m-auto size-logo" alt="">
                    </div>
                    <h3>Kontak Kami</h3>
                    <p class="lead mb-0">fadil.ntksmh@gmail.com</p>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    $(window).ready(function(){
        // check form searchbar
        $('form').on('submit', function(e){
            if($('#searchBar').val().trim()==""){
                e.preventDefault();
                alert("Periksa kembali kotak pencarian!");
            }else{
                $(this).submit();
            }
        });
    });
</script>

         
                        
@elsedesktop

<div class="notdesktop">
    {{-- <div class="w3-display-middle" style="white-space:nowrap;">
        <span style="border-radius:15px;" class="w3-center w3-padding-large w3-black w3-xlarge w3-wide w3-animate-opacity">Afwan</span>
        <br>
    </div>
    <span>Untuk sementara BukuCeritamu tidak dapat diakses melalu perangkat <i>mobile</i> </span> --}}
    <div style="display:inline-block;  text-align: center;"> 
        <div style="background-color: #3b3b3b; color:white; padding: 5px 20px; margin: 0 20px; border-radius:10px;">
            <h2>Afwan</h2>
        </div>
            <h5>Untuk sementara situs BukuCeritamu tidak dapat diakses melalui perangkat <i>mobile</i></h5>
    </div>
    <br>
</div>
      
@enddesktop

@include('includes/bottom')
@extends('layouts.app') @section('content')

<div class="container-fluid" style="min-height:500px;">
    <div class="row mt-2">
        <div class="col-lg-2 ">
            <ul class="list-group">
                <a class="list-group-item menus" id="menus-1" href="{{ route('user.make.story') }}">
                    <img width="30px" height="30px" src="{{ asset('assets/icons/signing.png') }}" alt="">&nbsp; Buat Buku Cerita</a>
                <a class="list-group-item menus" id="menus-2" href="{{route('user.my.books')}}">
                    <img src="{{ asset('assets/icons/open-book.png') }}" alt="">&nbsp; Buku Saya</a>
                <a class="list-group-item menus" id="menus-3" href="{{route('user.my.profile')}}">
                    <img src="{{ asset('assets/avatars/default.png') }}" alt="">&nbsp; Profil Saya</a>
                <a class="list-group-item menus" id="menus-4" href="{{ route('user.all.books') }}">
                    <img src="{{ asset('assets/icons/users.png') }}" alt="">&nbsp; Semua Buku</a>
                <a class="list-group-item menus" id="menus-5" href="{{ route('user.give.input') }}">
                    <img src="{{ asset('assets/icons/chatting.png') }}" alt="">&nbsp; Beri Masukan</a>
            </ul>
        </div>
        <div class="col-lg-10 mb-2">
            <div class="card" style="min-height:500px;">
                <div class="card-header">
                    <div class="row">
                        <div class="col-lg-6">
                            <h5>
                                <img width="25px" height="25px" src="{{ asset('assets/icons/books.png') }}" alt="">&nbsp; Baca Buku-buku
                            </h5>
                        </div>
                        <div class="col-lg-6" >
                            <form style="float:right" class="form-inline text-center" method="get" action="{{ route('user.search.book') }}">
                                <input required id="searchBar" class="form-control mr-sm-2" name="search" type="search" placeholder="Cari buku disini!" aria-label="Search">
                                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Cari</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="card-body p-2" <div class="card-body p-2 mb-2" style="max-height: 900px; height:700px;">
                    <div style="height:100%; overflow:auto;">
                        @if(!empty($notfound))
                        <div class="alert alert-primary" role="alert">
                            <b>Gagal!</b> {{$notfound}}
                        </div>
                        @elseif($books->count() > 0)
                        @foreach($books as $book)
                        <div class="card mx-1 mb-2" style="width: 18rem; float:left;">
                        <img width="350px" height="180px" class="card-img-top" src="{{$book->cover}}" alt="Card image cap">
                            <div class="card-body p-2" align="center">
                                <a href="{{route('user.read.story', ['slug'=>$book->slug])}}" class="my-link"><h5 class="card-title p-0 m-0">{{$book->title}}</h5></a>
                                <small>by <b>{{$book->profile->username}}</b></small><br>
                                <small>DIbuat pada {{$book->created_at}}</small><br>
                            </div>
                        </div>
                        @endforeach
                        @else
                        <div class="alert alert-primary" role="alert">
                            Buku belum tersedia
                        </div>
                        @endif
                        </div>
                </div>
            </div>
        </div>
    </div>

</div>
<script>
    $(document).ready(function(){
        
    });
</script>

@endsection

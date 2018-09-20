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
                <a class="list-group-item menus" id="menus-4"  href="{{ route('user.all.books') }}">
                    <img src="{{ asset('assets/icons/users.png') }}" alt="">&nbsp; Semua Buku</a>
                <a class="list-group-item menus" id="menus-5" href="{{ route('user.give.input') }}">
                    <img src="{{ asset('assets/icons/chatting.png') }}" alt="">&nbsp; Beri Masukan</a>
            </ul>
        </div>
        <div class="col-lg-10 mb-2">
            <div class="card" style="min-height:500px;">
                <div class="card-header">
                    <div class="row">
                        <div class="col lg-6">
                            <h5>
                                <img width="25px" height="25px" src="{{ asset('assets/icons/books.png') }}" alt="">&nbsp; Halaman Kontak
                            </h5>
                        </div>
                    </div>
                </div>
                <div class="card-body p-4 mb-2" style="max-height: 900px; height:700px;">
                    <small>Halaman kontak menunjukan kontak dari pemiliki situs, dan siapa saja boleh untuk memberi saran atau ide untuk mendukung dalam pengembangan <a href="/">BukuCeritamu.com</a>.
                    halaman ini juga menunjukan tujuan dari aplikasi dan tujuan dari pengembangannya</small>
                    <hr>
                    <b>Email Pengembang:</b><br>
                    <label for="">bukuceritamu@developer.com</label>
                    <br><br>
                    
                    <b>Tentang Aplikasi:</b><br>
                    <label for="">Aplikasi ini merupakan project yang dikembangkan untuk memenuhi syarat Tugas Akhir dari Jurusan Teknik Informatika Universitas Indonesia. 
                        Aplikasi ini memungkinkan penggunanya untuk dapat membuat suatu cerita dengan dukungan ilustrasi gambar yang dapat mendukung jalannya cerita
                    </label> 
                    <br><br>

                    <b>Tujuan Pengembangan Aplikasi:</b><br>
                    <label for="">
                        Tujuan utama dari kembangkannya aplikasi ini yakni ingin turut ikut dalam mengembangkan pendidikan Indonesia dalam bidang menulis dan membaca   
                    </label> 
                    
                    
                    </div>
                
            </div>
        </div>
    </div>

</div>
<script>
</script>

@endsection

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
                <a class="list-group-item menus" id="menus-5" href="#">
                    <img src="{{ asset('assets/icons/chatting.png') }}" alt="">&nbsp; Beri Masukan</a>
            </ul>
        </div>
        <div class="col-lg-10 mb-2">
            <div class="card" style="min-height:500px;">
                <div class="card-header">
                    <h5>
                        <img width="25px" height="25px" src="{{ asset('assets/icons/chatting.png') }}" alt="">&nbsp; Beri Masukan kepada Admin</h5>
                </div>
                <div class="card-body p-2 mb-2" >
                    <div style="height:100%; overflow:auto;">
                    @if(Session::has('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Berhasil!</strong> {{Session::get('success')}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    @endif
                    <form action="{{route('user.send.input')}}" method="post" class="p-3">
                        @csrf
                        <div class="form-group">
                            <label for="exampleFormControlInputToAdmin">Isi Masukan berupa saran ataupun kritik</label>
                            <textarea class="form-control" name="  public function profile(){
        return $this->hasOne('App\Profile');
    }" id="exampleFormControlInputToAdmin" rows="3"></textarea>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary mb-2" value="Kirim">
                        </div>
                    </form>
                </div>
                </div>
                
            </div>
        </div>
    </div>

</div>
<script>
</script>

@endsection

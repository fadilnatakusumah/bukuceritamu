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
                    <h5>
                        <img width="25px" height="25px" src="{{ asset('assets/avatars/default.png') }}" alt="">&nbsp; Profil Saya
                        <button style="float: right;" type="button" class="btn btn-info" data-toggle="modal" data-target="#passwordModal">
                            Ubah Password
                        </button>
                        <button style="float: right;" type="button" class="btn btn-info mr-1" data-toggle="modal" data-target="#updateModal">
                            Perbaruhi Data
                        </button>
                    </h5>
                </div>
                <div class="card-body p-3" <div class="card-body p-2 mb-2">
                    <div class="container">
                            @if(Session::has('fails'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Gagal!</strong> {{Session::get('fails')}}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            @endif

                            @if(Session::has('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Berhasil!</strong> {{Session::get('success')}}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            @endif
                        <div class="row">
                            <div class="col-lg-4">
                                <img
                                class="profile pt-2 pb-0"
                                src="{{ asset($profile->profile->avatar) }}"
                                align="center">
                            </div>
                            <div class="col-lg-8">
                                <div style="border-bottom: 2px #e9e1e1 solid; margin-bottom:5px;">
                                    <span><b>Nama:</b></span><br>
                                    <label for="">{{$profile->name}}</label>
                                </div>
                                <div style="border-bottom: 2px #e9e1e1 solid; margin-bottom:5px;">
                                    <span><b>Email:</b></span><br>
                                    <label for="">{{$profile->email}}</label>
                                </div>
                                <div style="border-bottom: 2px #e9e1e1 solid; margin-bottom:5px;">
                                    <span><b>Username:</b></span><br>
                                    <label for="">{{$profile->profile->username}}</label>
                                </div>
                                <div style="border-bottom: 2px #e9e1e1 solid; margin-bottom:5px;">
                                    <span><b>Alamat:</b></span><br>
                                    <label for="">{{$profile->profile->address}}</label>
                                </div>
                                <div style="border-bottom: 2px #e9e1e1 solid; margin-bottom:5px;">
                                    <span><b>Password:</b></span><br>
                                    <label for="">
                                        @for($i = 0; $i<strlen($profile->password); $i++)
                                        *
                                        @endfor
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- MODAL FOR UPDATE DATA --}}
                    <div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Perbaruhi Data Profil</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form method="post" action="{{ route('user.update.profile') }}">
                                    @csrf
                                    <div class="form-group">
                                      <label for="formGroupName">Nama</label>
                                      <input required type="text" class="form-control" name="name" id="formGroupName" value="{{$profile->name}}">
                                      @if ($errors->has('name'))
                                      <span class="invalid-feedback">
                                        <strong>{{ $errors->first('name') }}</strong>
                                      </span>
                                      @endif  
                                    </div>
                                    <div class="form-group">
                                      <label for="formGroupEmail">Email</label>
                                      <input required type="text" class="form-control" name="email" id="formGroupEmail" value="{{$profile->email}}">
                                      @if ($errors->has('email'))
                                      <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                      </span>
                                      @endif  
                                    </div>
                                    <div class="form-group">
                                        <label for="formGroupUsername">Username</label>
                                        <input required type="text" class="form-control" name="username" id="formGroupUsername" value="{{$profile->profile->username}}">
                                        @if ($errors->has('username'))
                                        <span class="invalid-feedback">
                                          <strong>{{ $errors->first('username') }}</strong>
                                        </span>
                                        @endif  
                                    </div>
                                    <div class="form-group">
                                        <label for="formGroupAddress">Alamat</label>
                                        <input required type="text" class="form-control" name="address" id="formGroupAddress" value="{{$profile->profile->address}}">
                                        @if ($errors->has('address'))
                                        <span class="invalid-feedback">
                                          <strong>{{ $errors->first('address') }}</strong>
                                        </span>
                                        @endif  
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batalkan</button>
                                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                    </div>
                                  </form>
                            </div>
                            </div>
                        </div>
                    </div>

                    {{-- MODAL FOR UPDATE PASSWORD --}}
                    <div class="modal fade" id="passwordModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Perbaruhi Passsword</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                               <form  method="post" action="{{ route('user.update.password') }}">
                                @csrf
                                    <div class="form-group">
                                        <label for="formGroupOldPassword">Password Lama</label>
                                        <input placeholder="Masukan Password Lama disini" required type="password" class="form-control" name="oldPassword" id="formGroupOldPassword">
                                        @if ($errors->has('oldPassword'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('oldPassword') }}</strong>
                                        </span>
                                        @endif  
                                    </div>
                                    <div class="form-group">
                                        <label for="formGroupNewPassword">Password Baru</label>
                                        <input placeholder="Masukan Password Baru disini" required type="password" class="form-control" name="newPassword" id="formGroupNewPassword">
                                        @if ($errors->has('newPassword'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('newPassword') }}</strong>
                                        </span>
                                        @endif  
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                    </div>
                               </form>
                            </div>
                            </div>
                        </div>
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

@extends('../layouts.app')

@section('content')

<div class="container-fluid ">
  <div class="row" style="min-height:700px;">
    <div class="col-lg-2 text-light bg-dark pt-3 pl-3" style="background-color: blue;">
      <h4>Dashboard</h4>
      <hr style="background-color:white;">
      <div class="sidebar">
        <a href="{{ route('admin.index') }}" class="my-active">Admin Profil </a>
        <a href="{{ route('admin.categories.index') }}">Manajemen Kategori </a>
        <a href="{{ route('admin.assets.index') }}">Manajemen
          <i>Assets</i>
        </a>
        <a href="{{ route('admin.users.index') }}">Manajemen
          <i>Users</i>
        </a>
        <a href="{{ route('admin.books.index') }}">Manajemen Buku</a>
        <a href="{{ route('admin.words.index') }}">Manajemen Kosa Kata</a>
        <a href="{{ route('admin.suggestions') }}">Lihat Saran & Kritik</a>
      </div>
    </div>

    <div class="col-lg-10 bg-light pt-3 pl-3">
      <h3>Profil Admin - {{ $user->name }}</h3>
      <hr> @if(Session::has('info'))

      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Berhasil!</strong> {{ Session::get('info') }}.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      @endif @if(Session::has('warning'))

      <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Gagal!</strong> {{ Session::get('warning') }}.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      @endif
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-3" style="border-right: 1px solid gray;">
            <div>
              <img src="{{asset($user->profile->avatar)}}" class="rounded profile" alt="...">
            </div>
          </div>
          <div class="col-lg-9">
            <div class="card" style="width: 100%;">
              <div class="card-body">
                <h5 class="card-title">Nama</h5>
                <p class="card-text">{{$user->name}}</p>
                <hr>
                <h5 class="card-title">Username</h5>
                <p class="card-text">{{$user->profile->username}}</p>
                <hr>
                <h5 class="card-title">Email</h5>
                <p class="card-text">{{$user->email}}</p>
                <hr>
                <h5 class="card-title">Alamat</h5>
                <p class="card-text">{{$user->profile->address}}</p>
                <hr>
                <div>
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                    Edit Profil
                  </button>

                </div>
              </div>
            </div>
            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content" style="min-width: 500px;">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Perbaruhi Profil</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <form method="POST" action="{{ route('admin.update') }}" enctype="multipart/form-data">
                    <div class="modal-body">
                      @csrf

                      <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nama') }}</label>

                        <div class="col-md-6">
                          <input placeholder="Masukan Nama" id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                          name="name" value="{{ $user->name }}" required autofocus> @if ($errors->has('name'))
                          <span class="invalid-feedback">
                            <strong>{{ $errors->first('name') }}</strong>
                          </span>
                          @endif
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="username" class="col-md-4 col-form-label text-md-right">
                          <i>{{ __('Username') }}</i>
                        </label>

                        <div class="col-md-6">
                          <input placeholder="Masukan Username" id="username" type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}"
                          name="username" value="{{ $user->profile->username }}" required autofocus> @if ($errors->has('username'))
                          <span class="invalid-feedback">
                            <strong>{{ $errors->first('username') }}</strong>
                          </span>
                          @endif
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Alamat E-Mail') }}</label>

                        <div class="col-md-6">
                          <input placeholder="Masukan Email" id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                          name="email" value="{{ $user->email }}" required> @if ($errors->has('email'))
                          <span class="invalid-feedback">
                            <strong>{{ $errors->first('email') }}</strong>
                          </span>
                          @endif
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Alamat Tempat Tinggal') }}</label>

                        <div class="col-md-6">
                          <input placeholder="Masukan Alamat" id="address" type="address" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}"
                          name="address" value="{{ $user->profile->address }}" required> @if ($errors->has('address'))
                          <span class="invalid-feedback">
                            <strong>{{ $errors->first('address') }}</strong>
                          </span>
                          @endif
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="avatar" class="col-md-4 col-form-label text-md-right">{{ __('Foto Profil') }}</label>

                        <div class="col-md-6">
                          <input id="avatar" type="file" name="avatar" class="form-control">
                        </div>
                      </div>


                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                      <button type="submit" class="btn btn-primary">Perbaruhi</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>

            {{-- Modal 2 - Ubah password --}}
            <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ubah Password</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <form method="POST" action="{{ route('admin.update.password') }}">
                    <div class="modal-body">
                      @csrf
                      <div class="form-group row">
                        <label for="oldpassword" class="col-md-4 col-form-label text-md-right">{{ __('Password Lama') }}</label>
                        <div class="col-md-6">
                          <input placeholder="Masukan Password Lama" id="oldpassword" type="password" class="form-control{{ $errors->has('oldpassword') ? ' is-invalid' : '' }}"
                          name="oldpassword" required> @if ($errors->has('oldpassword'))
                          <span class="invalid-feedback">
                            <strong>{{ $errors->first('oldpassword') }}</strong>
                          </span>
                          @endif
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="newpassword" class="col-md-4 col-form-label text-md-right">{{ __('Password Baru') }}</label>
                        <div class="col-md-6">
                          <input placeholder="Masukan Password Baru" id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                          name="password" required> @if ($errors->has('password'))
                          <span class="invalid-feedback">
                            <strong>{{ $errors->first('password') }}</strong>
                          </span>
                          @endif
                        </div>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary">Perbaruhi Password</button>
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

@endsection

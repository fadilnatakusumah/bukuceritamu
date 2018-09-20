@extends('./../../layouts.app')

@section('content')
<div class="container-fluid ">
    <div class="row" style="min-height:700px;">
        <div class="col-lg-2 text-light bg-dark pt-3 pl-3" style="background-color: blue;">
            <h4>Dashboard</h4>
            <hr style="background-color:white;">
            <div class="sidebar">
                <a href="{{ route('admin.index') }}" >Admin Profil </a>
                <a href="{{ route('admin.categories.index') }}">Manajemen Kategori </a>                    
                <a href="{{ route('admin.assets.index') }}">Manajemen <i>Assets</i> </a>
                <a href="{{ route('admin.users.index') }}" class="my-active">Manajemen <i>Users</i> </a>
                <a href="{{ route('admin.books.index') }}" >Manajemen Buku</a>
                <a href="{{ route('admin.words.index') }}">Manajemen Kosa Kata</a>
                <a href="{{ route('admin.suggestions') }}">Lihat Saran & Kritik</a>
            </div>
        </div>
        
        <div class="col-lg-10 bg-light pt-3 pl-3">
            <h3>Manajemen Pengguna/<i>Users</i></h3>
            <hr>
            @if(Session::has('success'))
            
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Berhasil!</strong> {{Session::get('info')}}.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
            <div class="container-fluid">
                <div class="row">
                        @if(count($users) > 0)
                        <table class="table">
                          <thead class="thead-dark">
                            <tr>
                              <th scope="col">ID</th>
                              <th scope="col">Nama User</th>
                              <th scope="col"><i>Username</i></th>
                              <th scope="col">Jumlah Buku</th>
                              <th scope="col">Opsi</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach($users as $user)
                            <tr style="cursor: pointer;">
                              <th scope="row">{{$user->id}}</th>
                              <td data-toggle="modal" data-target="#exampleViewUser{{$user->id}}">{{$user->name}}</td>
                              <td>{{$user->profile->username}}</td>
                              <td>{{count($user->profile->book)}}</td>
                              <td>
                                {{-- <a class="btn btn-success text-light" href="{{ route('admin.edit.category', ['id' => $cat->id]) }}">Edit</a> --}}
                                {{-- <a type="button" class="btn btn-success text-light" data-toggle="modal" data-target="#exampleModal{{$user->id}}">Edit</a> --}}
                                {{-- <button type="button" class="btn btn-primary" data-target="#exampleModal{{$asset->id}}">Edit</button> --}}
                                @if(!$user->admin)
                                <a href="{{ route('admin.user.delete', ['id' => $user->id]) }}" class="btn btn-danger text-light" onclick="return confirm('Apa kamu yakin ingin menghapusnya?')">Hapus</a>
                                @endif
                              </td>
                            </tr>
                            
                            
                            {{-- MODAL FOR EACH USER --}}
                            
                            <!-- MODAL FOR UPDATE USER -->
                          {{-- <div class="modal fade" id="exampleModal{{$cat->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Perbaruhi User </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <form method="post" action="{{route('admin.save.category')}}">
                                    <div class="modal-body">
                                        {{ csrf_field() }}
                                        <div class="form-group">
                                        <input name="id" type="hidden" value="{{$cat->id}}">
                                          <label for="name">Perbaruhi Kategori - {{ $cat->name }}</label>
                                          <input type="text" class="form-control" id="exampleInputName" aria-describedby="NameHelp" name="name" value="{{ $cat->name }}">
                                        </div>
                                      </div>
                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>  
                                        <button type="submit" class="btn btn-primary">Tambahkan</button>
                                      </div>
                                    </form>
                                </div>
                              </div>
                            </div> --}}
                            {{-- END OF MODAL --}}

                            <!-- MODAL FOR VIEW USER -->
                          <div class="modal fade" id="exampleViewUser{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-lg" role="document" width="700px">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="exampleModalLabel">Profil <i>User</i></h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <form method="post" action="{{route('admin.save.category')}}">
                                      <div class="modal-body">
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <img src="{{asset($user->profile->avatar)}}" alt="" width="300px" height="300px">
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <h6 class="card-title">Nama</h6>
                                                        <p class="card-text">{{$user->name}}</p>
                                                        <hr>
                                                        <h6 class="card-title">Username</h6>
                                                        <p class="card-text">{{$user->profile->username}}</p>
                                                        <hr>
                                                        <h6 class="card-title">Email</h6>
                                                        <p class="card-text">{{$user->email}}</p>
                                                        <hr>
                                                        <h6 class="card-title">Alamat</h6>
                                                        <p class="card-text">{{$user->profile->address}}</p>
                                                        <hr>
                                                        <h6 class="card-title">Jumlah Buku</h6>
                                                        <p class="card-text">{{count($user->profile->book)}}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>  
                                          {{-- <button type="submit" class="btn btn-primary">Tambahkan</button> --}}
                                        </div>
                                      </form>
                                  </div>
                                </div>
                              </div>
                              {{-- END OF MODAL --}}
                            
                            @endforeach
                          </tbody>
                        </table>
                        
                        @else
                        
                        <div class="alert alert-primary" role="alert" align="center">
                          Belum terdapat <i>user</i> pada <i>database</i>
                        </div>
                        
                        @endif
                </div>
            </div>
        </div>
    </div>
</div>

@endsection



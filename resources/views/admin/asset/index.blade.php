@extends('./../../layouts.app') 

@section('content')

<div class="container-fluid ">
  <div class="row" style="min-height:700px;">
    <div class="col-lg-2 text-light bg-dark pt-3 pl-3" style="background-color: blue;">
      <h4>Dashboard</h4>
      <hr style="background-color:white;">
      <div class="sidebar">
        <a href="{{ route('admin.index') }}">Admin Profil </a>
        <a href="{{ route('admin.categories.index') }}">Manajemen Kategori </a>
        <a href="{{ route('admin.assets.index') }}" class="my-active">Manajemen
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
    
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Tambah
              <i>Asset</i>
            </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form enctype="multipart/form-data" action="{{ route('admin.add.asset') }}" method="post">
            {{ csrf_field() }}
            <div class="modal-body">
              <div class="form-group">
                <label for="exampleInputName">Nama Asset</label>
                <input name="name" type="text" class="form-control" id="exampleInputName" aria-describedby="nameHelp" placeholder="Masukkan Nama Asset"
                required>
              </div>
              <div class="form-group">
                <label for="exampleFormControlSelect">Kategori</label>
                <select class="form-control" id="exampleFormControlSelect1" name="category_id">
                  @foreach($categories as $cat)
                  <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                  @endforeach
                </select>
              </div>
              <div class="form-group">
                <label for="exampleInputName">Masukan File</label>
                <input name="image" type="file" class="form-control" id="exampleInputName" required>
              </div>
            </div>
            
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
              <button type="submit" class="btn btn-primary">Tambahkan</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    
    <div class="col-lg-10 bg-light pt-3 pl-3">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-6" align="left">
            <h3>Manajemen
              <i>Asset</i>
            </h3>
          </div>
          <div class="col-lg-6" align="right">
            <button data-toggle="modal" type="button" class="btn btn-warning" data-target="#exampleModal">Tambah</button>
          </div>
        </div>
      </div>
      
      <hr> 
      @if(Session::has('success'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Berhasil!</strong> {{Session::get('success')}}.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      @endif

      {{-- BUAT BARU --}}
      <div class="container-fluid  mb-1" style="max-height: 500px; height: 500px;" >
          @if(count($assets))
          <div class="row" style="height: 100%; overflow:auto;">
          <div class="col-lg-12">
            @foreach($categories as $cat)
            <div class="card p-2 mb-1" style="width: 100%;">
              <h5>{{ $cat->name }}</h5>
              <hr>
              <div class="container">
                <div class="row">
                  @if($cat->asset->count() < 1)
                  <div class="col-lg-12">
                    <div class="alert alert-primary" role="alert" align="center">
                      Asset untuk kategori ini belum tersedia, silahkan tambahkan asset dahulu
                    </div>
                  </div>
                  @else 
                  
                  @foreach($cat->asset as $asset)
                  <div class="card mr-2" style="width: 12rem;" style="float:left;">
                    <img height="200px;" class="card-img-top" src="{{ asset($asset->location) }}" alt="Card image cap">
                    <p align="center">{{$asset->name}}</p>
                    <div class="container pb-1">
                      <div class="row">
                        <div class="col-lg-6">
                          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal{{$asset->id}}">Edit</button>
                        </div>
                        <div class="col-lg-6">
                          <a href="{{ route('admin.delete.asset', ['id' => $asset->id]) }}" class="btn btn-danger text-light" onclick="return confirm('Apa kamu yakin ingin menghapusnya?')">Hapus</a>
                        </div>
                      </div>
                    </div>
                    
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal{{$asset->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Edit
                              <i>Asset</i> - {{ $asset->name }}</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <form action="{{ route('admin.edit.asset')}}" method="post">
                              {{ csrf_field() }}
                              <div class="modal-body">
                                <div class="container">
                                  <div class="row">
                                    <div class="col-lg-12 mb-2" align="center">
                                      <img height="300px" width="300px" src="{{ asset($asset->location)}}" alt="">
                                    </div>
                                  </div>
                                  <hr>
                                  <div class="row">
                                    <div class="form-group">
                                      <label for="exampleInputName">Nama Kategori</label>
                                      <input name="name" type="text" class="form-control" id="exampleInputName" aria-describedby="nameHelp" value="{{ $asset->name }}"
                                      required>
                                      <input name="id" type="hidden" class="form-control" id="exampleInputId" aria-describedby="idHelp" value="{{ $asset->id }}"
                                      required>
                                    </div>
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
                    </div>

                    {{-- Modal --}} 
                    @endforeach 
                    
                    @endif
                  </div>
                  {{-- /row --}}

                </div>
                {{-- /container --}}
              
              </div>
              {{-- /card --}}
              @endforeach

            </div>
          </div>
            @else
              <div class="alert alert-primary" role="alert" align="center">
                Asset belum tersedia, silahkan tambahkan asset dahulu
              </div>
            @endif
        </div>
        
      </div>
    </div>
  </div>
</div>

@endsection

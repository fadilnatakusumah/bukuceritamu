@extends('./../../layouts.app')

@section('content')
<div class="container-fluid ">
  <div class="row" style="min-height:700px;">
    <div class="col-lg-2 text-light bg-dark pt-3 pl-3" style="background-color: blue;">
      <h4>Dashboard</h4>
      <hr style="background-color:white;">
      <div class="sidebar">
        <a href="{{ route('admin.index') }}" >Admin Profil </a>
        <a href="{{ route('admin.categories.index') }}" class="my-active">Manajemen Kategori </a>                    
        <a href="{{ route('admin.assets.index') }}">Manajemen <i>Assets</i> </a>
        <a href="{{ route('admin.users.index') }}">Manajemen <i>Users</i> </a>
        <a href="{{ route('admin.books.index') }}" >Manajemen Buku</a>
        <a href="{{ route('admin.words.index') }}">Manajemen Kosa Kata</a>
        <a href="{{ route('admin.suggestions') }}">Lihat Saran & Kritik</a>
      </div>
    </div>
    
    <div class="col-lg-10 bg-light pt-3 pl-3">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-6" align="left">
            <h3>Manajemen Kategori Asset</h3>                        
          </div>
          <div class="col-lg-6" align="right">
            <button data-toggle="modal" type="button" class="btn btn-warning" data-target="#exampleModal">Tambah</button>                        
          </div>
        </div>
      </div>
      <hr>
      
      
      <!-- Modal Add -->
      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Tambah Kategori </h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="{{ route('admin.add.category') }}" method="post">
              {{ csrf_field() }}
              <div class="modal-body">
                <div class="form-group">
                  <label for="exampleInputName">Nama Kategori</label>
                  <input name="name" type="text" class="form-control" id="exampleInputName" aria-describedby="nameHelp" placeholder="Masukkan Nama Kategori Baru" required>
                  
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary">Tambahkan</button>
              </div>
            </form>
          </div>
        </div>
      </div>
      {{-- END OF MODAL --}}
      
      
      
      @if(Session::has('success'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Berhasil!</strong> {{Session::get('success')}}.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      @elseif(Session::has('info'))
      
      <div class="alert alert-info alert-dismissible fade show" role="alert">
        {{-- <strong>Gagal!</strong>  --}}
        {{Session::get('info')}}.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      @endif
      
      @if($errors->has('name'))
      @foreach($errors->get('name') as $message)
      <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Gagal!</strong> {{ $message }}.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      {{-- <small id="emailHelp" class="form-text text-muted">{{ $message }}</small> --}}
      @endforeach
      @endif
      
      <div class="container-fluid">
        <div class="row">
          @if(count($categories) > 0)
          <table class="table">
            <thead class="thead-dark">
              <tr>
                <th scope="col">No.</th>
                <th scope="col">Nama Kategori</th>
                <th scope="col">Opsi</th>
              </tr>
            </thead>
            <tbody>
              @foreach($categories as $cat)
              <tr>
                <th scope="row">{{$loop->index+1}}</th>
                <td>{{$cat->name}}</td>
                <td>
                  {{-- <a class="btn btn-success text-light" href="{{ route('admin.edit.category', ['id' => $cat->id]) }}">Edit</a> --}}
                  <a type="button" class="btn btn-success text-light" data-toggle="modal" data-target="#exampleModal{{$cat->id}}">Edit</a>
                  {{-- <button type="button" class="btn btn-primary" data-target="#exampleModal{{$asset->id}}">Edit</button> --}}
                  <a href="{{ route('admin.delete.category', ['id' => $cat->id]) }}" class="btn btn-danger text-light" onclick="return confirm('Apa kamu yakin ingin menghapusnya?')">Hapus</a>
                </td>
              </tr>
              
              
              {{-- Modal for each category --}}
              
              <!-- Modal update category -->
            <div class="modal fade" id="exampleModal{{$cat->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Perbaruhi Kategori </h5>
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
                          <button type="submit" class="btn btn-primary">Perbaruhi</button>
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
            Kategori belum tersedia, silahkan masukkan kategori terlebih dahulu
          </div>
          
          @endif
          
          
          
        </div>
      </div>
    </div>
  </div>
</div>

@endsection



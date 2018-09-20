@extends('../layouts.app')

@section('content')

<div class="container-fluid ">
  <div class="row" style="min-height:700px;">
    <div class="col-lg-2 text-light bg-dark pt-3 pl-3" style="background-color: blue;">
      <h4>Dashboard</h4>
      <hr style="background-color:white;">
      <div class="sidebar">
        <a href="{{ route('admin.index') }}">Admin Profil </a>
        <a href="{{ route('admin.categories.index') }}">Manajemen Kategori </a>
        <a href="{{ route('admin.assets.index') }}">Manajemen
          <i>Assets</i>
        </a>
        <a href="{{ route('admin.users.index') }}">Manajemen
          <i>Users</i>
        </a>
        <a href="{{ route('admin.books.index') }}">Manajemen Buku</a>
        <a href="{{ route('admin.words.index') }}">Manajemen Kosa Kata</a>
        <a href="{{ route('admin.suggestions') }}"  class="my-active">Lihat Saran & Kritik</a>
      </div>
    </div>

    <div class="col-lg-10 bg-light pt-3 pl-3">
      <h3>Kritik & Saran dari Pengguna</h3>
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
            @if(count($suggestions))
          <div class="col-lg-12">
              <table class="table table-striped table-sm">
                  <thead class="thead-dark">
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Kritik & Saran</th>
                      <th scope="col">Pengguna</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($suggestions as $s)
                    <tr id="{{$s->id}}" onclick="viewSuggestions()" style="cursor: pointer;">
                      <th scope="row">{{$loop->index + 1}}</th>
                      <td>{{$s->suggestion}}</td>
                      <td>{{$s->user->name}}</td>
                    </tr>
                    @endforeach

                    {{-- <tr>
                      <th scope="row">2</th>
                      <td>Jacob</td>
                      <td>Thornton</td>
                    </tr>
                    <tr>
                      <th scope="row">3</th>
                      <td>Larry</td>
                      <td>the Bird</td>
                    </tr> --}}
                  </tbody>
                </table>
          </div>
          @else
              
          <div class="alert alert-primary" role="alert" align="center">
            Tidak terdapat saran yang dikirimkan
          </div>
          
          @endif
        </div>
      </div>
    </div>
  </div>
</div>

@endsection

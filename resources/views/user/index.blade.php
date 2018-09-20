@extends('layouts.app') @section('content')

<!-- MODAL FOR VIEW UNAPPROVED BOOK -->
<div class="modal fade" id="exampleViewUnapprovedBook" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLongTitle">Buku Yang Tertolak Untuk Dipublikasi</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body" style="max:height: 600px; height:500px;">
              <div style="height:100%; overflow:auto;">
              <table class="table">
                    <thead class="thead text-white" style="background-color:#a02d2d">
                      <tr>
                        <th scope="col">Judul Buku</th>
                        <th scope="col">Dibuat</th>
                        <th scope="col">Alasan Tertolak</th>
                        <th scope="col">Opsi</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($books->where('denied', '=', '1') as $book)
                      <tr>
                        <td>{{$book->title}}</td>
                        <td>{{$book->created_at}}</td>
                        <td>{{$book->explanation}}</td>
                        <td>
                            <a style="width:100px;" href="{{ route('user.edit.story', ['id' => $book->id]) }}" class="btn btn-success btn-sm text-light" target="_blank">Edit</a><br>
                            <a style="width:100px;" href="{{ route('user.delete.story', ['id'=>$book->id]) }}" class="btn btn-danger btn-sm text-light" onclick="return confirm('Apakah kamu yakin ingin menghapus Cerita ini?')">Hapus</a>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
              {{-- <button type="button" class="btn btn-primary" id="closeAndRefresh">Tutup dan Refresh</button> --}}
            </div>
          </div>
        </div>
      </div>
    {{-- END OF MODAL --}}

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
                                <img width="25px" height="25px" src="{{ asset('assets/icons/books.png') }}" alt="">&nbsp; Buku-buku Saya
                            </h5>
                        </div>
                        <div class="col-lg-6">
                            @if(count($books->where('denied', '=','1'))>0)
                            <button style="float:right; margin-right:5px;" class="btn btn-danger" data-toggle="modal" data-target="#exampleViewUnapprovedBook">Buku Tertolak ({{ count($books->where('denied', '=','1')) }})</button>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="card-body p-2 mb-2" style="max-height: 900px; height:700px;">
                    <div style="height:100%; overflow:auto;">
                    @if(Session::has('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Berhasil!</strong> {{Session::get('success')}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    @endif
                    @if(Session::has('successLogin'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Berhasil!</strong> {{Session::get('successLogin')}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    @endif
                    
                    @if($books->count() > 0)
                    @foreach($books as $book)
                    
                    <div class="card mx-1 mb-2" style="width: 18rem; float:left;">
                        <img width="350px" height="180px" class="card-img-top" src="{{$book->cover}}" alt="Card image cap">
                            <div class="card-body p-2" align="center">
                                <a href="{{ route('user.read.story', ['slug' => $book->slug]) }}" class="my-link"><h5 class="card-title p-0 m-0">{{$book->title}}</h5></a>
                                <small>Dibuat: {{$book->created_at}}</small><br>
                                @if($book->denied)
                                <small>Status Buku: <b style="color:red;">Tertolak!</b></small>
                                @elseif(!$book->approved && !$book->denied)
                                <small>Status Buku: <b style="color:blue;">Sedang diperiksa</b></small>
                                @else
                                <small>Status Buku: <b style="color:green;">Telah dipublikasi!</b></small>
                                @endif
                            <div class="mt-2">
                                <a href="{{ route('user.edit.story', ['id' => $book->id]) }}" class="btn btn-primary btn-sm">Edit Cerita &nbsp;<img width="20px" height="20px" src="{{ asset('assets/icons/signing.png') }}" alt=""></a>
                                <a href="{{ route('user.delete.story', ['id'=>$book->id]) }}" onclick="return confirm('Apakah kamu yakin ingin menghapus Cerita ini?')" class="btn btn-success btn-sm" id="deleteBtn">Hapus Cerita &nbsp;<img width="20px" height="20px" src="{{ asset('assets/icons/trash.png') }}" alt=""></a>
                            </div>
                            </div>
                        </div>
                    @endforeach
                    @else
                    <div class="alert alert-primary" role="alert">
                        Kamu belum memiliki Cerita yang ditulis
                    </div>
                    @endif
                </div>
                </div>
                
            </div>
        </div>
    </div>

</div>
<script>
</script>

@endsection

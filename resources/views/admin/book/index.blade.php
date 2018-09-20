@extends('./../../layouts.app')

@section('content')

<!-- MODAL FOR VIEW UNAPPROVED BOOK -->
<div class="modal fade" id="exampleViewUnapprovedBook" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Buku Yang Belum Disetujui</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body" style="max:height: 600px; height:500px;">
          <div style="height:100%; overflow:auto;">
          <table class="table">
                <thead class="thead text-white" style="background-color:#a02d2d">
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Judul Buku</th>
                    <th scope="col">Penulis</th>
                    <th scope="col">Dibuat</th>
                    <th scope="col">Status</th>
                    <th scope="col">Alasan Tertolak</th>
                    <th scope="col">Opsi</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($books->where('approved', '=', '0') as $book)
                  <tr>
                    <th scope="row">{{$book->id}}</th>
                    <td>{{$book->title}}</td>
                    <td>{{$book->profile->username}}</td>
                    <td>{{$book->created_at}}</td>
                    <td>
                      @if($book->denied == 1)
                        Ditolak
                      @else
                        Belum diperiksa
                      @endif
                      
                    </td>
                    <td>{{$book->explanation}}</td>
                    <td>
                        <a style="width:100px;" href="{{ route('admin.read.book', ['slug' => $book->slug]) }}" class="btn btn-success btn-sm text-light" target="_blank">Baca</a><br>
                        <a style="width:100px;" href="#" class="btn btn-info text-light btn-sm approveBtn" data-bookId="{{$book->id}}">Diterima</a><br>
                        <a style="width:100px;" href="#" class="btn btn-warning btn-sm deniedBtn" data-bookId="{{$book->id}}">Ditolak</a><br>
                        <a style="width:100px;" href="{{ route('admin.book.delete', ['id' => $book->id]) }}" class="btn-sm btn btn-danger text-light" onclick="return confirm('Apa kamu yakin ingin menghapusnya?')">Hapus</a>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
          <button type="button" class="btn btn-primary" id="closeAndRefresh">Tutup dan Refresh</button>
        </div>
      </div>
    </div>
  </div>
{{-- END OF MODAL --}}

<div class="container-fluid ">
    <div class="row" style="min-height:700px;">
        <div class="col-lg-2 text-light bg-dark pt-3 pl-3" style="background-color: blue;">
            <h4>Dashboard</h4>
            <hr style="background-color:white;">
            <div class="sidebar">
                <a href="{{ route('admin.index') }}" >Admin Profil </a>
                <a href="{{ route('admin.categories.index') }}">Manajemen Kategori </a>                    
                <a href="{{ route('admin.assets.index') }}">Manajemen <i>Assets</i> </a>
                <a href="{{ route('admin.users.index') }}">Manajemen <i>Users</i> </a>
                <a href="{{ route('admin.books.index') }}" class="my-active">Manajemen Buku</a>
                <a href="{{ route('admin.words.index') }}">Manajemen Kosa Kata</a>
                <a href="{{ route('admin.suggestions') }}">Lihat Saran & Kritik</a>
            </div>
        </div>

        <div class="col-lg-10 bg-light pt-3 pl-3">
          <div class="row">
            <div class="col-lg-6">
                <h3>Manajemen Buku</h3>
            </div>
            <div class="col-lg-6">
              {{-- <button style="float:right;" class="btn btn-danger" >Ditolak ({{ count($books->where('denied', '=','1')) }})</button> --}}
              @if(count($books->where('approved', '=','0'))>0)
              <button style="float:right; margin-right:5px;" class="btn btn-info" data-toggle="modal" data-target="#exampleViewUnapprovedBook">Belum Disetuji ({{ count($books->where('approved', '=','0')) }})</button>
              @endif
            </div>
          </div>

            <hr>
            @if(Session::has('info'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Berhasil!</strong> {{Session::get('info')}}.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
            <div class="container-fluid">
                <div class="row">
                    @if(count($books->where('approved', '=', '1')) > 0)

                        <table class="table">
                          <thead class="thead-dark">
                            <tr>
                              <th scope="col">ID</th>
                              <th scope="col">Judul Buku</th>
                              <th scope="col">Penulis</th>
                              <th scope="col">Dibuat</th>
                              {{-- <th scope="col">Status</th> --}}
                              <th scope="col">Opsi</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach($books->where('approved', 1) as $book)
                            <tr style="cursor: pointer;" data-toggle="modal" data-target="#exampleViewBook{{$book->id}}">
                              <th scope="row">{{$book->id}}</th>
                              <td>{{$book->title}}</td>
                              <td>{{$book->profile->username}}</td>
                              <td>{{$book->created_at}}</td>
                              <td>
                                <a href="{{ route('admin.read.book', ['slug' => $book->slug]) }}" class="btn btn-success text-light" target="_blank">Baca</a>
                                <a href="{{ route('admin.book.delete', ['id' => $book->id]) }}" class="btn btn-danger text-light" onclick="return confirm('Apa kamu yakin ingin menghapusnya?')">Hapus</a>
                              </td>
                            </tr>

                            <!-- MODAL FOR VIEW BOOK DETAIL -->
                          <div class="modal fade" id="exampleViewBook{{$book->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-lg" role="document" width="700px">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="exampleModalLabel">Detail Buku</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                      <div class="modal-body">
                                            <div class="container">
                                                <div class="row">
                                                    {{-- <div class="col-lg-6">
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
                                                    </div> --}}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>  
                                          {{-- <button type="submit" class="btn btn-primary">Tambahkan</button> --}}
                                        </div>
                                  </div>
                                </div>
                              </div>
                              {{-- END OF MODAL --}}
                              
                            
                            @endforeach
                          </tbody>
                        </table>
                        
                        @else
                        
                        <div class="alert alert-primary" role="alert" align="center">
                          Belum terdapat Buku yang disetujui
                        </div>
                        
                        @endif
                </div>
            </div>
        </div>
      </div>
    </div>
    
    
    <script>
  $(window).ready(function(){
    
    function giveExplanation(bookId){
        console.log("bookId: " + bookId);
        // console.log(bookId);
    }
    function giveApproval(id){
        // console.log(id);
        console.log("bookId: " + bookId);

      }
    
      // function for give approval
      
      $('.approveBtn').click(function(e){
        console.log('giveApproval button clicked');
        // console.log(e.target.attributes[3].value);
        // console.log(e);
        var book_id = e.target.attributes[3].value;
        $.ajax({
          async: true,
          method: 'post',
          url: window.location.origin+'/api/give-book-approval',
          crossDomain: true,
          data: {
            book_id: book_id
          }
        }).done(function(res){
          console.log('Approval given');
          $.notify(res, {
            // position: "top center",
            className: "success",
            autoHideDelay: 6000
          });  
        });
      });

    $('.deniedBtn').click(function(e){
      console.log('giveExplanation button clicked');
      console.log(e.target.attributes[3].value);
      var promp = prompt("Jelaskan  kenapa buku tertolak, dan berikan saran kepada Pemilik buku");
      if(promp.trim() != ""){
        var book_id = $(this).attr('data-bookId');
        // console.log();
        $.ajax({
          method: 'post',
          crossDomain: true,
          async: true,
          data: {
            book_id: book_id,
            explanation: promp
          },
          url: window.location.origin+'/api/send-book-explanation'
        }).done(function(res){
          console.log("Book's  Denied");
          $.notify(res, {
            // position: "top right",
            className: "success",
            autoHideDelay: 6000,
          });
        });
        // console.log(window.location.origin);
      }
    if(promp.trim() == ""){
        alert("Penjelasan tidak dapat kosong");
        return promp;
      }
    });


    $('#closeAndRefresh').click(function(){
      location.reload();
    });


  });
</script>

@endsection



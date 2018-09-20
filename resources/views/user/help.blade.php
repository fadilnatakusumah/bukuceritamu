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
                                <img width="25px" height="25px" src="{{ asset('assets/icons/books.png') }}" alt="">&nbsp; Halaman Bantuan
                            </h5>
                        </div>
                    </div>
                </div>
                <div class="card-body p-4 mb-2 pb-4" style="max-height:600px;">
                    {{-- <h3>Halaman Bantuan</h3> --}}
                    <div style="height:100%; overflow:auto;">
                        <small>Halaman bantuan menunjukan tata cara penggunaan aplikasi dalam membuat suatu cerita</small>
                        <hr>

                        <h3>Tutorial Membuat Cerita</h3><br>
                        <b>Langkah 1</b><br>
                        <label for="">
                            <img src="{{asset('assets/steps/1.png')}}" style="border: gray 3px solid;" alt=""><br>
                            Klik pilihan "Buat Buku Cerita" untuk menuju halaman membuat buku cerita
                        </label>
                        <br><br>

                        <b>Langkah 2</b><br>
                        <label for="">
                            Setelah berada halaman membuat buku cerita, pengguna dapat memilih pilihan-pilihan yang ada. <br>
                            Jika ingin menentukan latar belakang maka dapat memilih pilihan "Latar Belakang" <br>
                            <img src="{{asset('assets/steps/2.png')}}" style="border: gray 3px solid;" alt=""><br><br>
                            Jika ingin menambahkan teks maka dapat memilih "Teks" <br>
                            <img src="{{asset('assets/steps/3.png')}}" style="border: gray 3px solid;" alt=""><br><br>
                            Jika ingin menambahkan asset atau gambar maka dapat memilih "Asset" <br>
                            <img src="{{asset('assets/steps/4.png')}}" style="border: gray 3px solid;" alt=""><br><br>
                            Jika ingin menggambar seperti menggunakan pensil maka dapat memilih "Pensil" <br>
                            <img src="{{asset('assets/steps/5.png')}}" style="border: gray 3px solid;" alt=""><br><br>
                        </label>
                        <br><br>

                        <b>Langkah 3</b><br>
                        <label for="">Pada bagian kendali, memberikan pengguna kendali dari object yang ada di canvas</label><br>
                        <img src="{{asset('assets/steps/6.png')}}" style="border: gray 3px solid;" alt=""><br><br>
                        
                        <b>Langkah 4</b><br>
                        <label for="">Untuk berpindah dari satu canvas ke canvas yang lain, dapat memilih canvas pada preview canvas yang ditampilkan. Jika ingin menambahkan canvas maka mengklik pada tombol tambah berwarna hijau</label><br>
                        <img src="{{asset('assets/steps/7.png')}}" style="border: gray 3px solid; width:100%;" alt=""><br><br>  
                    
                        <b>Langkah 6</b><br>
                        <label for="">Jika telah selesai dalam membuat cerita, pengguna dapat menyimpan cerita dengan menekan tombol simpan cerita</label><br>
                        <img src="{{asset('assets/steps/8.png')}}" style="border: gray 3px solid; width:100%;" alt=""><br><br>  
                        
                        <b>Langkah 7</b><br>
                        <label for="">Buku akan diperiksa oleh admin, jika <span style="color:green;">disetujui</span> maka akan dipublish, dan jika <span style="color:red;">ditolak</span> maka buku harus di revisi</label><br>
                        
                        <hr>

                        <h3>Tutorial Download Buku</h3><br>
                        <b>Langkah 1</b><br>
                        <label for="">Pilih buku yang ingin di download</label><br>
                        <img src="{{asset('assets/steps/9.png')}}" style="border: gray 3px solid; width:250px;" alt=""><br><br>  

                        <b>Langkah 2</b><br>
                        <label for="">Pada halaman membaca, pilih tombol unduh sebagai PDF yang ada pada bagian kanan atas</label><br>
                        <img src="{{asset('assets/steps/10.png')}}" style="border: gray 3px solid; width:100%;" alt=""><br><br>  
                    
                        <b>Langkah 3</b><br>
                        <label for="">Lalu pilih tombol save untuk menyimpan file PDF</label><br>
                        <img src="{{asset('assets/steps/11.png')}}" style="border: gray 3px solid; width:350px;" alt=""><br><br>  
                        
                        <hr>
                        <h3>Fitur Rekomendasi Buku</h3><br>
                        <label for="">Fitur ini akan mendeteksi teks cerita dan akan memberikan rekomendasi asset yang cocok untuk cerita</label><br>
                        <img src="{{asset('assets/steps/12.png')}}" style="border: gray 3px solid; height:380px;" alt=""><br><br>  


                    </div>

                </div>
                
            </div>
        </div>
    </div>

</div>
<script>
</script>

@endsection

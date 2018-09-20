@extends('layouts.app') @section('content')

<div class="container-fluid" style="min-height:500px;">
    <div class="row mt-2">
        {{-- <div class="col-lg-2 ">
            <ul class="list-group">
                <a class="list-group-item menus" id="menus-1" href="{{ route('user.make.story') }}">
                    <img width="30px" height="30px" src="{{ asset('assets/icons/signing.png') }}" alt="">&nbsp; Buat Buku Cerita</a>
                <a class="list-group-item menus" id="menus-2" href="#">
                    <img src="{{ asset('assets/icons/open-book.png') }}" alt="">&nbsp; Baca Buku</a>
                <a class="list-group-item menus" id="menus-3" href="#">
                    <img src="{{ asset('assets/avatars/default.png') }}" alt="">&nbsp; Profil Saya</a>
                <a class="list-group-item menus" id="menus-4" href="#">
                    <img src="{{ asset('assets/icons/users.png') }}" alt="">&nbsp; Para Penulis</a>
                <a class="list-group-item menus" id="menus-5" href="#">
                    <img src="{{ asset('assets/icons/chatting.png') }}" alt="">&nbsp; Beri Masukan</a>
            </ul>
        </div> --}}
        {{-- <div class="col-lg-10">
            <div class="card" style="min-height:500px;">
                <div class="card-header">
                    <h5>
                        <img width="25px" height="25px" src="{{ asset('assets/icons/books.png') }}" alt="">&nbsp; Baca Buku-buku</h5>
                </div>
                <div class="card-body p-2">
                    @if($books->count() > 0)
                    @foreach($books as $book)
                    <div class="card mr-1" style="width: 18rem; float:left;">
                    <img class="card-img-top" src="{{$book->cover}}" alt="Card image cap">
                        <div class="card-body p-2" align="center">
                            <a href="#" class="my-link"><h5 class="card-title p-0 m-0">{{$book->title}}</h5></a>
                        <small>by <b>{{$book->profile->username}}</b></small><br>
                        </div>
                    </div>
                    @endforeach
                    @else
                    <div class="alert alert-primary" role="alert">
                        Buku belum tersedia
                    </div>
                    @endif
                </div>
            </div>
        </div> --}}
        <div class="col-lg-12 my-2">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card" style="background-color: #e9e3e3;">
                            <div class="card-header px-5 py-1">
                                <span id="bookTitle" style="font-size:30px;"><i>{{$book->title}}</i></span> by <b>{{$book->profile->username}}</b>
                                <span id="book_id" style="display:none;">{{$book->id}}</span>
                            @if(Auth::check())
                                <button style="float:right; display:none;" class="btn btn-primary" id="downloadPDF">Unduh sebagai PDF</button>
                            @endif
                            </div>
                            <div class="card-body" style="width:100%; height:100%;">
                                {{-- <div class="data-canvases" style="display:none;">
                                @foreach($book->canvas as $canvasData)
                                    <canvas id="canvas{{$loop->index}}" data-canvas="{{$canvasData->json_data}}" width="650px" height="400px"></canvas>
                                @endforeach
                                </div> --}}
                                <!-- Slider main container -->
                                <div class="swiper-container" style="width:100%; height:100%;" >
                                        <!-- Additional required wrapper -->
                                        <div class="swiper-wrapper">
                                            <!-- Slides -->
                                            @foreach($book->canvas as $canvasData)
                                            <div class="swiper-slide" align="center">
                                                <canvas id="canvas{{$loop->index}}" height="{{ $canvasData->canvas_height }}" width="{{ $canvasData->canvas_width }}" data-canvas="{{$canvasData->json_data}}"></canvas>
                                            </div>
                                            @endforeach
                                            {{-- <div class="swiper-slide">
                                                <img   src="https://demo.phpgang.com/crop-images/demo_files/pool.jpg" alt="">
                                            </div>
                                            <div class="swiper-slide">
                                                <img   src="https://camo.mybb.com/e01de90be6012adc1b1701dba899491a9348ae79/687474703a2f2f7777772e6a71756572797363726970742e6e65742f696d616765732f53696d706c6573742d526573706f6e736976652d6a51756572792d496d6167652d4c69676874626f782d506c7567696e2d73696d706c652d6c69676874626f782e6a7067" alt="">
                                            </div>
                                            <div class="swiper-slide">
                                                <img   src="https://cdn.theatlantic.com/assets/media/img/photo/2015/11/images-from-the-2016-sony-world-pho/s01_130921474920553591/main_900.jpg?1448476701" alt="">
                                            </div> --}}
                                            {{-- <div class="swiper-slide" style="display:none;" align="center">
                                                <canvas></canvas>
                                            </div> --}}
                                        </div>
                                        <!-- If we need pagination -->
                                        <div class="swiper-pagination"></div>
                                    
                                        <!-- If we need navigation buttons -->
                                        <div class="swiper-button-prev"  style=" background-color:black; padding:5px; border-radius:5px;"></div>
                                        <div class="swiper-button-next" style=" background-color:black; padding:5px; border-radius:5px;"></div>
                                    
                                        <!-- If we need scrollbar -->
                                        <div class="swipe r-scrollbar"></div>
                                    </div>
                            </div>
                            {{-- <div class="card-footer">
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</div>
<script>
    $(document).ready(function(){
        // var doc = new jsPDF();

        // doc.text('Hello world!', 10, 10);
        // doc.save('a4.pdf');

            var mySwiper = new Swiper ('.swiper-container', {
            // Optional parameters
                direction: 'horizontal',
                // loop: true,
                // If we need pagination
                pagination: {
                el: '.swiper-pagination',
                },
        
                // Navigation arrows
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },
                scrollbar: {
                    el: '.swiper-scrollbar',
                },
            });
        // var book_id = $('#book_id').text();
        var dataCanvases = [];
        var canvases = [];
        var imageCanvases = [];

        $('.swiper-wrapper').find('canvas').each(function(e){
            // dataCanvases[e] = $(this).attr('data-canvas');
            dataCanvases[e] = new fabric.StaticCanvas($(this).attr('id'));
            dataCanvases[e].loadFromJSON($(this).attr('data-canvas'));
            dataCanvases[e].renderAll();
            
            setTimeout(function(){
                imageCanvases[e] = dataCanvases[e].toDataURL({
                format: 'png'
            });
            },1000);
        });
        // $('#downloadPDF').hide();
        setTimeout(function(){
            $('#downloadPDF').show(300);
        },1000);
        $('#downloadPDF').click(function(){
            var title = $('#bookTitle').text();
            // console.log(title);
            // console.log($('canvas').width()+ " : "+ $('canvas').height());
            // var doc = new jsPDF('l','px',[$('canvas').width(), $('canvas').height()]);
            // console.log($('canvas').width(), $('canvas').height());
            var doc = new jsPDF('l','mm','a4');
            // var width = pdf.internal.pageSize.getWidth();
            // var height = pdf.internal.pageSize.getHeight();
            doc.addImage(imageCanvases[0], 'JPEG', 0,0,298,210);
            // var width = doc.internal.pageSize.width;    
            // var height = doc.internal.pageSize.height;
            for(var i = 1; i<imageCanvases.length; i++){
                doc.addPage();
                doc.addImage(imageCanvases[i], 'JPEG', 0,0,298,210);
            }
            // console.log(width +" ===== " + height );

            // 171.979167 = 650px;
            // 105.833333 = 400px;
            // var height = doc.internal.pageSize.height;
            // imageCanvases[0] = imageToDataUri(imageCanvases[0],width,height);
            

            // doc.addImage(imageCanvases[0], 'JPEG', 0, 0, 0, 0);
            // doc.autoPrint();
            doc.save('BukuCeritamu.com - '+title+'.pdf');
            // window.open(imageCanvases[0]);
        });
    });
</script>

@endsection

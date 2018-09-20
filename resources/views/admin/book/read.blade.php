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
                <a href="{{ route('admin.users.index') }}">Manajemen <i>Users</i> </a>
                <a href="{{ route('admin.books.index') }}" class="my-active">Manajemen Buku</a>
                <a href="{{ route('admin.words.index') }}">Manajemen Kosa Kata</a>
                <a href="{{ route('admin.suggestions') }}">Lihat Saran & Kritik</a>
            </div>
        </div>
        <div class="col-lg-10 bg-light pt-3 pl-3">
            <div class="row">
                <div class="col-lg-6">
                    <h3 align="left">Baca Buku - <span id="bookTitle">{{$book->title}}</span></h3>
                </div>
                <div class="col-lg-6">
                    <button style="float:right; display:none;" id="downloadPDF" class="btn btn-danger">Download PDF</button>
                </div>
            </div>
            <hr>
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        {{-- <div class="data-canvases" style="display:none;"> --}}
                        {{-- @foreach($book->canvas as $canvasData)
                            <canvas id="canvas{{$loop->index}}" data-canvas="{{$canvasData->json_data}}" width="650px" height="400px"></canvas> --}}
                            {{-- <span id="dataCanvas{{$loop->index}}" style="display:none;" data-target="#carouselExampleIndicators"></span> --}}
                        {{-- @endforeach --}}
                        {{-- </div> --}}
                        <div class="swiper-container" style="width:800px; height:500px;" >
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
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function(){
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

        // download button
        setTimeout(function(){
            $('#downloadPDF').show(300);
        },1000);
        $('#downloadPDF').click(function(){
            var title = $('#bookTitle').text();
            console.log($('canvas').width()+ " : "+ $('canvas').height());
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



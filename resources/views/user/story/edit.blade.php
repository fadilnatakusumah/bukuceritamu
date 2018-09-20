@extends('layouts.app') @section('content')



<div class="container-fluid">
  <div class="row mt-2">
    <input type="hidden" id="username" value="{{$profile->profile->username}}">
    <input type="hidden" id="idUser" value="{{$profile->profile->id}}">
    <input type="hidden" id="bookID" value="{{$book}}">
    {{-- THE TOOL --}}
    <div class="col-lg-2 p-0">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg p-0">
            <div class="card">
              <div class="card-header py-0 pt-2">
                <h6>
                  <img width="20px" height="20px" src="{{ asset('assets/icons/edit2.png') }}" alt="">&nbsp; Pilihan</h6>
                </div>
                <div class="card-body">
                  <div class="container">
                    <div class="row mb-2">
                      <div class="col-lg p-1 option my-close-modal" onclick="isNotPencil()" align="center" data-toggle="modal" data-target="#modalBackground">
                        <img src="{{ asset('assets/icons/photo.png') }}" alt="">
                        <span class="my-label">Latar Belakang </span>
                      </div>
                      <div class="col-lg p-1 option" align="center" onclick="isNotPencil()" data-toggle="modal" data-target="#modalText">
                        <img src="{{ asset('assets/icons/text.png') }}" alt="">
                        <span class="my-label">Teks</span>
                      </div>
                    </div>
                    <div class="row mb-2">
                      <div class="col-lg p-1 option" align="center" onclick="isNotPencil()" data-toggle="modal" data-target="#modalAssets">
                        <img src="{{ asset('assets/icons/cat.png') }}" alt="">
                        <span class="my-label">Asset</span>
                      </div>
                      <div class="col-lg p-1 option" align="center" onclick="isPencil()">
                        <img src="{{ asset('assets/icons/edit.png') }}" alt="">
                        <span class="my-label">Pensil</span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row h-100 mt-1" style="min-height:230px;">
            <div class="col-lg p-0">
              <div class="card h-100">
                <div class="card-header py-0 pt-2">
                  <h6>
                    <img width="20px" height="20px" src="{{ asset('assets/icons/settings.png') }}" alt="">&nbsp; Kendali </h6>
                  </div>
                  <div class="card-body p-0">
                    <div class="container">
                      <div class="row">
                        <div class="col-lg-12 p-2" style="max-height: 210px;">
                          <div id="control-panel" style="overflow: auto; height:100%;" align="center">
                            <div>
                              <button id="btnClearCanvas" type="button" class="btn btn-danger btn-sm control-btn">Bersihkan Canvas<img class="icon-control-btn" src="{{ asset('assets/icons/easel.png') }}" alt=""></button>
                              <button id="btnDeleleObject" type="button" class="btn btn-dark btn-sm control-btn">Hapus Objek Terpilih<img class="icon-control-btn" src="{{ asset('assets/icons/trash.png') }}" alt=""></button>
                              <button id="btnSelectAllObjects" type="button" class="btn btn-secondary btn-sm control-btn">Pilih Semua Objek<img class="icon-control-btn" src="{{ asset('assets/icons/all.png') }}" alt=""></button>
                              <button id="btnBringForwards" type="button" class="btn btn-primary btn-sm control-btn">Bawa ke Depan <img class="icon-control-btn" src="{{ asset('assets/icons/bring-forward.png') }}" alt=""></button>
                              <button id="btnSendBackwards" type="button" class="btn btn-primary btn-sm control-btn">Bawa ke Belakang<img class="icon-control-btn" src="{{ asset('assets/icons/bring-backward.png') }}" alt=""></button>
                              <button id="btnBringToFront" type="button" class="btn btn-info btn-sm control-btn">Bawa ke Paling Depan <img class="icon-control-btn" src="{{ asset('assets/icons/bring-forward.png') }}" alt=""></button>
                              <button id="btnSendToBack" type="button" class="btn btn-info btn-sm control-btn">Bawa ke Paling Belakang<img class="icon-control-btn" src="{{ asset('assets/icons/bring-backward.png') }}" alt=""></button>
                            </div>
                          </div>
                          <div id="pencil-control" style="overflow: auto; height:100%; display: none;">
                            <div align="left">
                              <div>
                                <div class="control-panel-style">
                                  <label class="">Mode: </label>
                                  <select id="modePencil">
                                    <option value="Pencil" selected>Pensil</option>
                                    <option value="Circle">Lingkaran</option>
                                    <option value="Spray">Semotran</option>
                                    <option value="Pattern">Pola</option>
                                  </select>
                                </div>
                                <div class="control-panel-style">
                                  <label class="">Ketebalan Garis: </label>
                                  <input type="range" value="10" min="0" max="100" id="drawing-line-width">
                                </div>
                                <div class="control-panel-style">
                                  <label class="">Tebal Bayangan Garis: </label>
                                  <input type="range" value="10" min="0" max="100" id="line-shadow-width">
                                </div>
                                <div class="control-panel-style">
                                  <label for="drawing-color">Warna Garis:</label>
                                  <input type="color" value="#000000" id="drawing-color">
                                </div>
                              </div>
                            </div>
                            <div>
                              <button type="button" class="btn btn-success btn-sm control-btn mt-1" onclick="isNotPencil()">Keluar dari Mode Pencil</button>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        {{-- /TOOL --}}
        
        {{-- MODAL FOR BACKGROUND --}}
        <div class="modal fade" id="modalBackground" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
          <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"> <img width="30px" height="30px" src="{{ asset('assets/icons/background.png') }}" alt="">&nbsp; Tentukan Latar Belakang</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body" >
                <div class="container">
                  <div class="row">
                    <div class="col-lg-12" >
                      @if($background->count() > 0)
                      
                      @if($background->asset->count() > 0)
                      {{-- Container for contain many background --}}
                      <div style="overflow:auto; height:100%;">
                        @foreach($background->asset as $bg)
                        {{-- THE BG DIV --}}
                        <div class="my-div-thumbnail" id="{{ $bg->id }}" align="center">
                          <img src="{{ asset($bg->location) }}" class="my-thumbnail-asset float-left m-1" data-bg-name="{{$bg->name}}" data-location-bg="{{ asset($bg->location) }}"  alt="">
                          <span class="my-thumbnail-label">{{ $bg->name }}</span>
                          {{-- <input type="hidden" value="{{$bg->location}}"> --}}
                        </div>
                        {{-- /THE BG DIV --}}
                        @endforeach
                      </div>
                      @else
                      
                      <div class="alert alert-info" role="alert" align="center">
                        Asset untuk Latar Belakang belum tersedia
                      </div>
                      
                      @endif
                      
                      @endif
                      
                    </div>
                  </div>
                  <div class="row mt-3">
                    <div class="col-lg-12">
                      <h6>Latar Yang Terpilih: &nbsp; <i><span id="backgroundName">Tidak Ada</span></i></h6>
                      <input class="form-control" id="locationBg" name="locationBg" type="hidden" disabled class="w-100">
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-lg-12">
                      <h6>Atau tetapkan Latar Belakang dengan Warna <input class="form-control"  type="color" name="backgroundColor" id="backgroundColor"></h6>
                    </div>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary my-close-modal" data-dismiss="modal">Tutup</button>
                <button type="submit" id="setBackground" class="btn btn-primary" data-dismiss="modal">Pilih</button>
              </div>
            </div>
          </div>
        </div>
        {{-- /MODAL FOR BACKGROUND --}}
        
        
        {{-- MODAL FOR TEXT --}}
        <div class="modal fade" id="modalText" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
          <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"> <img width="30px" height="30px" src="{{ asset('assets/icons/speech-bubble.png') }}" alt="">&nbsp; Tambahkan Teks</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body" >
                <div class="container">
                  <div class="row">
                    <div class="col-lg-3">
                      <h6>Jenis Huruf: &nbsp; 
                        <select class="custom-select" id="font-family">
                          <option value="arial">Arial</option>
                          <option value="myriad pro">Myriad Pro</option>
                          <option value="verdana">Verdana</option>
                          <option value="georgia">Georgia</option>
                          <option value="courier">Courier</option>
                          <option value="comic sans ms">Comic Sans MS</option>
                          <option value="impact">Impact</option>
                        </select>
                      </h6>
                    </div>
                    <div class="col-lg-3">
                      <h6>Warna Huruf: &nbsp; <br>
                        <div class="input-group">
                          <input class="form-control"  type="color" name="text-color" id="text-color">
                        </div>
                      </h6>
                    </div><div class="col-lg-3">
                      <h6>Warna Latar Teks: &nbsp; <br>
                        <div class="input-group">
                          <input class="form-control" disabled type="color" name="text-bgcolor" id="text-bgcolor">
                        </div> 
                        <div class="input-group mt-2">
                          <label for="">Latar Transparan</label>
                          <input type="checkbox" checked class="form-control mt-1" name="checkText" id="checkText">
                        </div>
                      </h6>
                    </div>
                    <div class="col-lg-3">
                      <h6>Pelurusan Teks: 
                        <select class="custom-select"  id="text-align">
                          <option selected value="left">Kiri</option>
                          <option value="center">Tengah</option>
                          <option value="right">Kanan</option>
                          <option value="justify">Auto</option>
                        </select>
                      </h6>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-12" >
                      <div class="input-group">
                        <textarea id="text-textarea" class="form-control">Pada suatu hari...</textarea>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary my-close-modal" data-dismiss="modal">Tutup</button>
                <button type="submit" id="addText" class="btn btn-primary" data-dismiss="modal">Tambahkan ke Cerita</button>
              </div>
            </div>
          </div>
        </div> 
        {{-- /MODAL FOR TEXT --}}
        
        {{-- MODAL FOR ASSET --}}
        <div class="modal fade" id="modalAssets" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"> <img width="30px" height="30px" src="{{ asset('assets/icons/cat(2).png') }}" alt="">&nbsp; Tambahkan Asset</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body" >
                <div class="container">
                  <div class="row">
                    <div class="col-lg-12" >
                      @if($categories)
                      <div class="container" style="height:400px;">
                        <div style="overflow:auto; max-height:100%;">
                          @foreach($categories->sortBy('id') as $cat)
                          <h5>{{ $cat->name }}</h5>
                          @foreach($cat->asset as $assets)
                          <div class="my-div-thumbnail">
                            <img  class="my-thumbnail-asset float-left m-1" data-asset-location="{{ asset($assets->location) }}" data-asset-name="{{$assets->name}}" src="{{ asset($assets->location) }}" alt="">
                            <span class="my-thumbnail-label">{{ $assets->name }}</span>
                          </div>
                          @endforeach
                          <hr>
                          @endforeach
                        </div>
                      </div>
                      @else
                      <div class="alert alert-info" role="alert" align="center">
                        Asset belum tersedia
                      </div>
                      @endif
                    </div>
                  </div>
                  <hr>
                  <div class="row mt-2">
                    <div class="col-lg-12">
                      <div class="container">
                        <h6>Asset yang terpilih: &nbsp;<i><span id="assetName">Tidak ada</i></span></h6>
                        <input type="hidden" id="inputAsset" name="inputAsset">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary my-close-modal" data-dismiss="modal">Tutup</button>
                <button type="submit" id="addAssetBtn" class="btn btn-primary" data-dismiss="modal">Tambahkan Pada Certia</button>
              </div>
            </div>
          </div>
        </div>
        {{-- /MODAL FOR ASSET --}}
        
        {{-- THE CANVAS --}}
        <div class="col-lg-7 ">
          <div class="card" style="min-height:100%;">
            <div class="card-header py-1 pt-2">
              <h5><img width="25px" height="25px" src="{{ asset('assets/icons/edit3.png') }}" alt="">&nbsp; Buat Buku Cerita <button type="button" id="my-button-save" class="my-button-save" data-toggle="modal" onclick="saveStoryBtn()" data-target="#modalSaveStory">Simpan Cerita<img class="icon-control-btn" src="{{ asset('assets/icons/save.png') }}" align="right"></button></h5>
            </div>
            <div class="card-body" align="center" style="background-color:#8dbadf;">
              <div class="my-canvas">
                <canvas id="canvas0" ></canvas>
              </div>
            </div>
          </div>
        </div>
        {{-- /THE CANVAS --}}
        
        {{-- ASSET RECOMENDATION --}}
        <div class="col-lg-3 p-0">
          <div class="card" style="min-height:100%;">
            <div class="card-header py-0 pt-2">
              <h6>
                <img width="20px" height="20px" src="{{ asset('assets/icons/like.png') }}" alt=""> &nbsp; Rekomendasi
                <i>Asset</i>
              </h6>
            </div>
            <div class="card-body" id="assetRecommendation">
              <div align="center" id="recommendInfo" class="alert alert-primary" role="alert">
                Tidak terdapat rekomendasi
                <br>
                <small> <b>(fitur ini memberikan rekomendasi asset yang mendukung cerita)</b> </small>
              </div>
              <div align="center" id="recommendLoader" style="display:none;">
                <div class="lds-dual-ring"></div>
              </div>
              <div style="max-height:400px; height:100%;">
                <div class="recommendedAssets" style="overflow:auto; max-height:100%;">
                </div>
              </div>
            </div>
            <div class="card-footer">
              Asset terpilih: <span id="recommendAsset"></span>
              <div class="float-right">
                <button class="btn btn-primary btn-sm" id="addRecommendAsset">Tambahkan</button>
              </div>
            </div>
          </div>
        </div>
        {{-- /ASSET RECOMENDATION --}}
      </div>
    </div>
    
    <div class="container-fluid mt-1">
      <div class="row">
        <div class="col-lg-12 p-0">
          <div class="card" style="min-height:115px;">
            <div class="card-header py-0 pt-1">
              <h6>
                <img width="20px" height="20px" src="{{ asset('assets/icons/canvas.png') }}" alt=""> &nbsp; Canvas | <button onclick="deleteCanvas()" type="button" class="my-button-delete-canvas">Hapus Canvas terpilih<img class="icon-control-btn" src="{{ asset('assets/icons/delete.png') }}" align="right"></button>
              </h6>
            </div>
            <div class="card-body p-0">
              <div class="container-fluid p-0">
                <div class="row">
                  <div id="canvas-preview" class="col-11">
                  </div>
                  <div class="col-1 pt-4">
                    <button id="add-canvas-btn">
                      <img src="{{asset('assets/icons/plus.png')}}" alt="">                  
                    </button>
                  </div>
                </div>
                <div class="bar-long"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    {{-- MODAL FOR SAVING BUTTON --}}
    <div class="modal fade" id="modalSaveStory" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered " role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Simpan Cerita Kamu</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="m-3" id="saveSpinner" style="text-align:center; display:none;">
              <div class="lds-roller"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>
            </div>
            <div id="outForSave">
              <label>Judul untuk buku ceritamu</label>
              <div class="input-group mb-3">
                <input name="storyTitle" id="storyTitle" type="text" class="form-control" value="{{$bookTitle}}" placeholder="Masukkan judul cerita">
              </div>
            </div>
            <div id="failForSave" style="display:none;" align="center" class="alert alert-danger" role="alert">
              Terjadi kesalahan saat menyimpan! <br> Refresh dan buat kembali Cerita kamu
            </div>
            <div id="successForSave" style="display:none;" align="center" class="alert alert-success" role="alert">
              Berhasil menyimpan! <br> Kamu akan diarahkan ke halaman Buku!
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            <button id="submitStory" type="button" class="btn btn-primary">Simpan</button>
          </div>
        </div>
      </div>
    </div>
    {{-- /MODAL FOR SAVING BUTTON --}}
    
    <script>
      
      // TESTING
      
      $(document).resize(function(){
        // var windowsize = $(window).width();
        if ($(window).width < 1024 || $(window).height < 768) {
          //if the window is greater than 440px wide then turn on jScrollPane..
          alert("Ukuran Window anda tidak mendukung. Mohon untuk memperbesar Window anda");
          console.log("BERUBAH");
        }
      });
      // POST WORDS (Kata Sanding) ===== CLUSTER 1 =====
      var collocationWords = ['lah','kah','pun','ku','mu','nya','kan','an'];
      
      // PREFIX WORDS SWITCH WITH " " ===== CLUSTER 2 =====
      var prefixWordsForNothing = ['meng',
      'men','mem','me','peng','pen','pem','di','ter','ke','ber',
      'bel','be','per','pel','pe'];
      
      // PREFIX WORDS SWITCH WITH "S" ===== CLUSTER 3 =====
      var prefixWordsForS = ['menya',
      'menyi','menyu','menye','meny','penya','penyi','penyu','penye',
      'penyo','peny'];
      
      // PREFIX WORDS SWITCH WITH "P" ===== CLUSTER 4 =====
      var prefixWordsForP = ['mema',
      'memi','memu','meme','memo','pema','pemi','pemu','peme',
      'pemo'];
      var allCanvas = [];
      
      var currentCanvas;
      
      var allAssets = [];
      var allRecommendedAssets = [];
      var allBlockedwords = [];
      var allMatchingBlockedwords = [];
      var allStopwords = [];
      var allTempAssets = [];
      
      
      var isFinished = false;
      var text = [];
      var selectedObject;
      var sumCanvas = 0;
      var idCanvas = 0;
      var explanation ="";
      
      var canvasURL = [];
      var editCanvases = [];
      // ===================== /Prevent windows size under 1024px and 768px 
      
      // =========================== GENERAL FUNCTIONS
      
      // =========================== /GENERAL FUNCTIONS
      
      // =========================== DOCUMENT READY
      $(document).ready(function(){
        var bookID = $('#bookID').val();
        // setTimeout(function(){
          var canvas0 = new fabric.Canvas('canvas0', {
              serializeBgOverlay: false
          });
          currentCanvas = canvas0;
          
          
          // LOAD CANVAS
          $.ajax({
            method: 'get',
            url: window.location.origin+"/api/get-a-book/"+bookID
          }).done(function(res){
            editCanvases = res;
            
            console.log(editCanvases);
            
            // LOAD DATA BOOK
            for(var i = 0; i < editCanvases.canvas.length; i++){
              allCanvas[i] = editCanvases.canvas[i].json_data;
            }

            $('.my-canvas').attr('width' , editCanvases.canvas[0].canvas_width);
            $('.my-canvas').attr('height' , editCanvases.canvas[0].canvas_height);
            $('.my-canvas').find('canvas').attr('height' , editCanvases.canvas[0].canvas_height);
            $('.my-canvas').find('canvas').attr('width' , editCanvases.canvas[0].canvas_width);
          
            currentCanvas.setHeight($('.my-canvas').height());
            currentCanvas.setWidth($('.my-canvas').width());
            
            sumCanvas = allCanvas.length;
            console.log("allcanvas length: "+ allCanvas.length);
            console.log("sumcanvas: "+ sumCanvas);
            console.log("id canvas: "+ idCanvas);
            for(var i = 0; i < allCanvas.length ; i++){
                (function(i){
                  setTimeout(() => {
                    currentCanvas.loadFromJSON(allCanvas[i],function(){
                      $('#canvas-preview').append(`
                        <div id="percanvas`+i+`" class="percanvas" onclick="switchCanvas(this.id)">
                          <img src="`+currentCanvas.toDataURL()+`" height="100px" width="150px" id="thumbnail`+i+`" class="thumbnail-canvas mr-1">
                          <span class="preview-label">`+i+`</span>
                        </div>`);
                        // console.log($('#percanvas'+i));
                        currentCanvas.loadFromJSON(allCanvas[0],function(){
                          $('#percanvas0 img').addClass('my-canvas-active');
                          $('div#percanvas0').find('span').text('Cover');
                        });
                    });
                  }, 500);
                  // alert(i);
                  // return i;
                  // preventDefault();
                })(i);
                  // break;
            }

            // $('div#percanvas0').attr('src', currentCanvas.toDataURL());
            
            // console.log('id canvas index 0:');
            // console.log(allCanvas[0]);
            // console.log('id canvas last index :');
            // console.log(allCanvas[allCanvas.length-1]);
            
            // end of ajax
          });
          
          
          // allCanvas[idCanvas] = JSON.stringify(currentCanvas);
          
          currentCanvas.on('object:selected', function(event){
            selectedObject = event.target;
            // console.log(selectedObject);
          });
          currentCanvas.on('selection:cleared', function(event){
            selectedObject = null;
            // console.log(selectedObject);
          });
          
          $('#pencil-control').hide();
          
          // Get request assets and save it to array
          $.ajax({
            async: "true",
            crossDomain: 'true',
            method: 'get',
            url: window.location.origin+'/api/get-assets',
          }).done(function(res, status){
            console.log('Get all assets, status: '+status);
            for(var i = 0; i<res.length; i++){
              allAssets.push(res[i]);
            }
            // console.log(allAssets);
          });
          
          // Get request blockedwords and save it to array
          $.ajax({
            async: "true",
            crossDomain: 'true',
            method: 'get',
            url: window.location.origin+'/api/get-blockedwords',
          }).done(function(res, status){
            console.log('Get all blockswords, status: '+status);
            for(var i = 0; i<res.length; i++){
              allBlockedwords.push(res[i]);
            }
            // console.log(allBlockedwords);
          });
          
          // Get request stopwords and save it to array
          $.ajax({
            async: "true",
            crossDomain: 'true',
            method: 'get',
            url: window.location.origin+'/api/get-stopwords',
          }).done(function(res, status){
            console.log('Get all stopswords, status: '+status);
            for(var i = 0; i<res.length; i++){
              allStopwords.push(res[i]);
            }
            // console.log(allStopwords);
          });
          
          // FUNCTIONS FOR ADDING RECOMMENDED ASSETS
          // Mark active when asset 
          $('.my-div-thumbnail').click(function(){
            $('.my-div-thumbnail').removeClass('my-asset-active');
            $(this).find('img').addClass('my-thumbnail-asset:not');
            $(this).addClass('my-asset-active');
          });
          // Mark active when asset clicked
          
          // adding asset recommendation to canvas
          $('#addRecommendAsset').click(function(){
            // var imgSrc = $('#recommendedAsset').attr('data-srcasset');
            // console.log($('#recommendedAsset').attr('data-srcasset'));
            // console.log($('#recommendAsset').attr('data-srcAsset'));
            var imgSrc = $('#recommendAsset').attr('data-srcAsset');
            if(imgSrc == ""){
              alert('Tidak terdapat rekomendasi!');
            }else{
              
              fabric.Image.fromURL(imgSrc, function(myImg){
                var img1 = myImg.set({
                  left: 0,
                  top: 0,
                  scaleX: .25,
                  scaleY: .25,
                  transparentCorners: false
                });
                currentCanvas.add(img1);
              });
            }
            currentCanvas.renderAll();
            console.log('recommended asset added');
          });
          
          // },1500);
          
        });
        
        
        
        
        // Windows READY
        // Responsive
        $( window ).resize(function() {
          currentCanvas.setHeight($('.my-canvas').height());
          currentCanvas.setWidth($('.my-canvas').width());
          console.log('canvas height :'+ currentCanvas.height);
          console.log('canvas height :'+ currentCanvas.width);});
        
        // ============== CONTROL FUNCTIONS ================
        // Clear Canvas
        $('#btnClearCanvas').click(function(){
          if(confirm('Apakah kamu yakin ingin membersihkan Canvas?')){
            currentCanvas.clear();
            currentCanvas.renderAll();
            renderThumbnail();
            console.log('canvas cleared');
          }
        });
        // /Clear Canvas
        
        // Select All objects function
        $('#btnSelectAllObjects').click(function(){
          currentCanvas.discardActiveObject();
          var sel = new fabric.ActiveSelection(currentCanvas.getObjects(), {
            canvas: currentCanvas,
          });
          currentCanvas.setActiveObject(sel);
          currentCanvas.requestRenderAll();
        });
        
        // Bring object to front function
        $('#btnBringToFront').click(function(){
          selectedObject.bringToFront();
        });
        
        // send object to back function
        $('#btnSendToBack').click(function(){
          selectedObject.sendToBack();
        });
        
        // bring object forward
        $('#btnBringForwards').click(function(){
          currentCanvas.bringForward(selectedObject);
        });
        
        // send object backwards
        $('#btnSendBackwards').click(function(){
          currentCanvas.sendBackwards(selectedObject);
          // currentCanvas.fabric.renderAll()
        });
        
        // ============== /CONTROL FUNCTIONS ================
        
        
        // Prevent click to other page or reload page
        $('a').click(function(){
          if(!isFinished){
            // e.preventDefault();
            return confirm('Apakah kamu yakin? Buku tidak akan tersimpan. Simpan dahulu!');
          }
        });
        // /Prevent click to other page or reload page
        
        // Close the modal and delete all input form
        $('.my-close-modal').click(function () {
          $('.my-input').val('');
          $('#text-textarea').val('Pada suatu hari...');
          $('#addAssetInput').val('');
        });
        
        
        
        // =================== FUNCTION FOR SET BACKGROUND
        // select div that contain the background
        $('.my-thumbnail-asset').click(function () {
          var data = $(this).data('location-bg');
          var bgName = $(this).data('bg-name');
          $('input[name=locationBg]').val(data);
          $('#backgroundName').text(bgName);
          console.log("Background clicked");
        });
        
        // the function for set the background of canvas
        $('button[id=setBackground]').click(function () {
          var img_src = $('input[name=locationBg]').val();
          
          // check if it's color
          if (img_src.charAt(0) == "#"){
            currentCanvas.setBackgroundColor(img_src);
            currentCanvas.renderAll();
            renderThumbnail();
          }else{
            currentCanvas.setBackgroundImage(img_src, currentCanvas.renderAll.bind(currentCanvas));
            fabric.Image.fromURL(img_src, function (img) {
              var oImg = img.set({
                left: 0,
                top: 0,
                angle: 0,
                scaleX: currentCanvas.width / img.width,
                scaleY: currentCanvas.height / img.height
              });
              currentCanvas.setBackgroundImage(oImg).renderAll();
              currentCanvas.renderAll();
              allCanvas[idCanvas] = JSON.stringify(currentCanvas);
              renderThumbnail();
              console.log('Background setted');            
            });
          }
          // alert("Latar berhasil ditetapkan");
        });
        
        // Function when color picker of background selected 
        $('#backgroundColor').click(function(){
          $('input[name=locationBg]').val('');
          $('#backgroundColor').change(function(e){
            $('input[name=locationBg]').val(e.target.value);
            var col = $('input[name=locationBg]').val();
            $('#backgroundName').text(col);
          });
        });
        // =================== /FUNCTION FOR SET BACKGROUND
        
        // =================== IN THE TEXT AREA
        //  Get Color of the text if it's changed and change the color of text-area
        $('#text-color').change(function(e){
          $('#text-textarea').css('color', e.target.value);
        });
        
        //  Get BgColor of the text if it's changed and change the color of text-area
        $('#text-bgcolor').change(function(e){
          $('#text-textarea').css('backgroundColor', e.target.value);
        });
        
        // Get Font-family if changed, and change the font
        $('#font-family').change(function(e){
          $('#text-textarea').css('font-family', e.target.value);
        });
        
        // set Text-Align in text area
        $('#text-align').change(function(e){
          $('#text-textarea').css('text-align', e.target.value);
        });
        
        // Check if transparancy is checked
        $('#checkText').change(function(){
          if($(this).prop('checked')){
            // alert("Checkbox checked");
            $('#text-bgcolor').prop('disabled', true);
          }else{
            $('#text-bgcolor').prop('disabled', false);
          }
        });
        
        // Adding text to the Canvas
        $('#addText').click(function(){
          $('#recommendInfo').hide();
          $('#recommendLoader').show();
          $('div.recommendedAssets').hide();
          
          var text = $('#text-textarea').val();
          var textColor = $('#text-color').val();
          var fontFamily = $('#font-family').val();
          var textAlign = $('#text-align').val();
          var textBgColor;
          if($('#checkText').prop('checked')){
            textBgColor = "transparent";
          }else{
            textBgColor = $('#text-bgcolor').val();
          }
          
          currentCanvas.add(new fabric.IText(text, {
            fill: textColor,
            fontFamily: fontFamily,
            textAlign: textAlign,
            backgroundColor: textBgColor,
            fontSize: 50,
            left: 50,
            top: 100,
            transparentCorners: false
          }));
          
          currentCanvas.renderAll();
          
          // Check and display the recommendation
          $("#recommendInfo").hide();
          $("#recommendLoader").show();
          
            setTimeout(function(){
            // ALGORITHM FOR TOKENIZATION
            // split by space
            var checkText = text.split(" ");
              // console.log(checkText);
            var checkTextForBlockwords = text.split(" ");

            // check for symbol in it and remove it
            for(var i = 0; i < checkText.length; i++){
              checkText[i] =  checkText[i].replace(/[\W_\n\r]/g, '').toLowerCase();
              // console.log(checkText[i]);
            }
            // /=========================================ALGORITHM FOR TOKENIZATION


            // ALGORITHM FOR STOPWORDS REMOVAl
            // remove all the matching stopwords and switch to empty string
            for(var i = 0; i < checkText.length; i++){
              for(var j=0; j< allStopwords.length; j++){
                if(checkText[i].includes(allStopwords[j].stopwords)){
                  checkText[i] = "";
                }
              }
            }

            // /=========================================ALGORITHM FOR STOPWORDS REMOVAl

            // ALGORITHM FOR BLOCKWORDS REMOVAl
            // get all the matching blockedwords and save it to b
            for(var i = 0; i < checkTextForBlockwords.length; i++){
              for(var j = 0; j < allBlockedwords.length; j++){
                if(checkTextForBlockwords[i].indexOf(allBlockedwords[j].blocked_word.toLowerCase()) >= 0 && checkTextForBlockwords[i] != "" || allBlockedwords[j].blocked_word.toLowerCase().indexOf(checkTextForBlockwords[i]) >= 0 && checkTextForBlockwords[i] != ""){
                  allMatchingBlockedwords.push(checkTextForBlockwords[i]);
                  console.log("allMatchingBlockedwords : ");
                  console.log(allMatchingBlockedwords);
                  // console.log("allBlockedwords : ");
                  // console.log(checkTextForBlockwords);
                }
              }
            }

            // /=========================================ALGORITHM FOR BLOCKWORDS REMOVAl

            
            // ALGORITHM FOR STEMMING WORD
            for(var i = 0; i < checkText.length; i++){
              // Check if words has more charachters than four
              if(checkText[i].length > 2){
                // Remove collocation words
                //loop every collocation words
                for(var j = 0; j < collocationWords.length; j++){
                    if(checkText[i].endsWith(collocationWords[j])){
                    checkText[i] = checkText[i].slice(0, checkText[i].length-collocationWords[j].length);
                    console.log("COLLOCATION WORD REMOVED");
                    break;
                  }else{
                    // looping data prefix  (CLUSTER 2) 
                    for(var k = 0; k < prefixWordsForNothing.length; k++ ){
                    // check and remove prefix cluster 2 and swith to  " " (empty string)
                      if(checkText[i].startsWith(prefixWordsForNothing[k])){
                        checkText[i] = checkText[i].slice(prefixWordsForNothing[k].length);
                        console.log("PREFIX WORD FROM CLUSTER 2 REMOVED");
                        break;
                      }else{
                      // looping data prefix  (CLUSTER 3) 
                        for(var l = 0; l < prefixWordsForS.length; l++ ){
                          // check and remove prefix cluster 3 and swith to  "S"
                          if(checkText[i].startsWith(prefixWordsForS[l])){
                            checkText[i] = checkText[i].replace(prefixWordsForS[l], 's');
                            console.log("PREFIX WORD FROM CLUSTER 3 REPLACED WITH 'S'");
                            break;
                          }else{
                          // looping data prefix  (CLUSTER 4) 
                            for(var m = 0; m < prefixWordsForP.length; m++ ){
                            // check and remove prefix cluster 4 and swith to  "P"
                              if(checkText[i].startsWith(prefixWordsForP[m])){
                                checkText[i] = checkText[i].replace(prefixWordsForP[m], 'p');
                                console.log("PREFIX WORD FROM CLUSTER 3 REPLACED WITH 'S'");
                                break;
                              }
                            }
                          }
                        }
                      }
                    }
                  }
                }
              }
              
            }
            console.log("HASIL AKHIR TEXT PRE-PROCESSING");
            console.log(checkText);

            // /=========================================ALGORITHM FOR BLOCKWORDS REMOVAl


            // ALGORITHM FOR GIVING ASSET RECOMENDATION
            // get all the matching token with asset and make the HTML
            if(checkText.length>0){
              for(var i = 0; i < checkText.length; i++){
                for(var j = 0; j < allAssets.length; j++){
                  // if(allAssets[j].name.toLowerCase().indexOf(checkText[i]) >= 0 || checkText[i].indexOf(allAssets[j].name.toLowerCase()) >= 0){
                  if(allAssets[j].name.toLowerCase().indexOf(checkText[i]) >= 0 && checkText[i] != ""){
                    allRecommendedAssets.push(allAssets[j]);
                    console.log('Ada: '+checkText[i]+' didalam: '+ allAssets[j].name);
                  }
                }
              }
              console.log(allRecommendedAssets);
              // $('#recommendInfo').hide();
              $('#recommendLoader').hide();
              if(allRecommendedAssets.length>0){
              // make the html  
                for(var i = 0; i < allRecommendedAssets.length; i++){
                  $('.recommendedAssets').append(`
                  <div class="my-div-thumbnail" onclick="getRecommendAsset(this)">
                      <img style="width:70px; height:70px;"  class="my-thumbnail-asset float-left m-1" data-asset-location="`+ window.location.origin+"/"+allRecommendedAssets[i].location +`" data-asset-name="`+ allRecommendedAssets[i].name +`" src="`+ window.location.origin+"/"+allRecommendedAssets[i].location +`" alt="">
                      <span class="my-thumbnail-label">`+ allRecommendedAssets[i].name +`</span>
                  </div>`);
                }
                $("#recommendLoader").hide();
                $('div.recommendedAssets').show();
              }else{
                $("#recommendLoader").hide();
                $("#recommendInfo").show();
              }
            }
              
            // allRecommendedAssets.length = 0;

          }, 3000);
            
            $('div.recommendedAssets').show();
            // /=========================================ALGORITHM FOR BLOCKWORDS REMOVAl
            
            
            console.log('Recommendation displayed');
            // Check and display the recommendation
            console.log('Text added');
            
          });
          // /Adding text to the Canvas
          
          
          // =================== /IN THE TEXT AREA
          
          
          //============== FUNCTIONS FOR  ADDING ASSETS
          $(".my-thumbnail-asset").click(function(){
            var loc = $(this).data('asset-location');
            var name = $(this).data('asset-name');
            $('#assetName').text(name);
            $('#inputAsset').val(loc);
            console.log("Asset clicked");
          });
          
          // Adding Asset to the Background
          $('#addAssetBtn').click(function(){
            var assetSrc = $('input[name=inputAsset]').val();
            
            fabric.Image.fromURL(assetSrc, function(myImg){
              var img1 = myImg.set({
                left: 0,
                top: 0,
                scaleX: .25,
                scaleY: .25,
                transparentCorners: false
              });
              currentCanvas.add(img1);
            });
            currentCanvas.renderAll();
            console.log("Asset setted");
            // alert('Asset berhasil ditambahkan!');
            
          });
          // /Adding Asset to the Background
          

          
          //============== /FUNCTIONS FOR  ADDING ASSETS
          
          // ======================= FUNCTIONs FOR PENCIL
          // Showing the pencil control
          function isPencil(){
            // isPencil = true;
            currentCanvas.isDrawingMode = true;
            $('#control-panel').hide();
            $('#pencil-control').show();
            if (currentCanvas.freeDrawingBrush) {
              currentCanvas.freeDrawingBrush.color = $('#drawing-color').val();
              currentCanvas.freeDrawingBrush.width = $('#drawing-line-width').val();
              currentCanvas.freeDrawingBrush.setShadow({
                blur: $('#line-shadow-width').val(),
                color: $('#drawing-color').val() 
              });
            }
          }
          // Hiding the pencil control
          function isNotPencil(){
            currentCanvas.isDrawingMode = false;
            $('#pencil-control').hide();
            $('#control-panel').show();
            currentCanvas.renderAll();
            allCanvas[idCanvas] = JSON.stringify(currentCanvas);
            renderThumbnail();
          }
          
          $('#modePencil').change(function(){
            currentCanvas.freeDrawingBrush = new fabric[$(this).val() + 'Brush'](currentCanvas);
            currentCanvas.freeDrawingBrush.width = 10;
            currentCanvas.freeDrawingBrush.setShadow({
              blur: $('#line-shadow-width').val(),
              color: $('#drawing-color').val() 
            });
            currentCanvas.freeDrawingBrush.color = $('#drawing-color').val();
          });
          
          $('#drawing-line-width').change(function(){
            currentCanvas.freeDrawingBrush.width = parseInt(this.value) || 1;
            currentCanvas.freeDrawingBrush.setShadow({
              blur: $('#line-shadow-width').val(),
              color: $('#drawing-color').val() 
            });
          });
          
          $('#line-shadow-width').change(function(){
            currentCanvas.freeDrawingBrush.setShadow({
              blur: this.value || 10,
              color: $('#drawing-color').val() 
            });
          });
          
          $('#drawing-color').change(function(){
            currentCanvas.freeDrawingBrush.color = this.value;
            currentCanvas.freeDrawingBrush.setShadow({
              blur: $('#line-shadow-width').val(),
              color: $('#drawing-color').val() 
            });
          });
          // ======================= /FUNCTION FOR PENCIL
          
          // ============== FUNCTIONS FOR SLIDES
          $('#add-canvas-btn').click(function(){
            console.log('Add canvas button clicked');
            var oldIdCanvas = idCanvas;
            var newIdCanvas = sumCanvas;
            var beforeCanvas = sumCanvas-1;
            idCanvas = newIdCanvas;
            
            // console.log(currentCanvas.toJSON());
            
            $('canvas').attr('id', 'canvas'+idCanvas);
            allCanvas[oldIdCanvas] = JSON.stringify(currentCanvas);
            currentCanvas.clear();
            currentCanvas.setBackgroundColor('white');
            console.log("ID canvas now: "+idCanvas);
            $('.percanvas img').removeClass('my-canvas-active');  
            $(`<div id="percanvas`+newIdCanvas+`" class="percanvas" onclick="switchCanvas(this.id)">
              <img src="`+currentCanvas.toDataURL()+`" height="100px" width="150px" id="thumbnail`+newIdCanvas+`" class="thumbnail-canvas mr-1">
              <span class="preview-label">`+newIdCanvas+`</span>
            </div>`).insertAfter('#percanvas'+beforeCanvas);
            sumCanvas += 1;
            console.log("Canvas added");
            console.log("oldIdCanvas: "+oldIdCanvas);
            console.log("newIdCanvas: "+newIdCanvas);
            console.log("idCanvas: "+idCanvas);
            console.log("sumCanvas: "+sumCanvas);
            
          });
          
          // switch canvas if clicked on slides
          function switchCanvas(e){
            renderThumbnail();
            var index = e.substring(9, e.length);
            console.log("current id: "+index);
            console.log('sumCanvas: '+sumCanvas);
            console.log("canvas thumbnail clicked");
            $('.percanvas img').removeClass('my-canvas-active');
            $('#thumbnail'+index).addClass('my-canvas-active');
            
            // change canvas in html
            allCanvas[idCanvas] = JSON.stringify(currentCanvas);
            idCanvas = index;
            // currentCanvas.clear();
            // console.log(allCanvas);
            // console.log(allCanvas[index]);
            // console.log(allCanvas[0]);
            currentCanvas.loadFromJSON(allCanvas[index]);
            currentCanvas.renderAll();
            console.log('Canvas rerendered, ID canvas now is: '+index);
          }
          
          // Function for deleting canvas
          function deleteCanvas(){
            if(idCanvas==0){
              alert("Kamu tidak dapat menghapus Cover");
            }else{
              // alert("Oke kamu boleh menghapus canvas ini");
              if(idCanvas=>1){
                $('#percanvas'+idCanvas).remove();
                allCanvas[idCanvas] = null;
                // allCanvas.slice(idCanvas,1);
                sumCanvas -= 1;
                idCanvas -= 1;
                // update the thumbnail
                $('.percanvas img').removeClass('my-canvas-active');
                $('#thumbnail'+idCanvas).addClass('my-canvas-active');
                
                // update the canvas
                currentCanvas.clear();
                currentCanvas.loadFromJSON(allCanvas[idCanvas]).renderAll();
                $('.percanvas').each(function(e){
                  $(this).attr('id', "percanvas"+e);
                  $("#percanvas"+e+" img").attr('id', "thumbnail"+e);
                });
                for(var i = 1; i<sumCanvas; i++){
                  $("#percanvas"+i+" span").text(i);
                }
                console.log(allCanvas);
              }else{
                
              }
            }
          }
          // ============== /FUNCTIONS FOR SLIDES 
          
          // ============= ALL NECESSARY CANVAS FUNCTIONS
          // Delete Object
          $('#btnDeleleObject').click(function(){
            var activeObject = currentCanvas.getActiveObjects();
            // currentCanvas.remove(activeObject);
            if (activeObject) {
              if (confirm('Apa kamu yakin mau menghapus objek ini?')) {
                currentCanvas.discardActiveObject();
                currentCanvas.remove(...activeObject);
              }
            }
            currentCanvas.renderAll();
            renderThumbnail();
          });
          
          // Refresh the canvas everytime it changed
          $(document).click(function(){
            currentCanvas.on('object:modified', function(e){
              isFinished = false;
              // console.log("Canvas changed - " + e.e);
              // currentCanvas.renderAll();
              allCanvas[idCanvas] = JSON.stringify(currentCanvas);
              // $('.percanvas img').removeClass('my-canvas-active');
              // renderThumbnail();
              currentCanvas.renderAll();

            });
          });
          // Refresh the canvas everytime it changed
          
          function renderThumbnail(){
            currentCanvas.renderAll();
            var firstDataURL = currentCanvas.toDataURL({
              format: 'png',
            });
            $('#thumbnail'+idCanvas).attr("src", firstDataURL).attr("class", "thumbnail-canvas my-canvas-active");
          }
          
          function saveStoryBtn(){
            isNotPencil();
            if(isFinished==false){
              if(confirm("Apakah kamu sudah selesai membuat cerita?")){
                isFinished = true;
              }
            }
          }
          // ============= /ALL NECESSARY CANVAS FUNCTIONS 
          
          // ========= Sending storybooks through ajax request to API
          $('#submitStory').click(function(){
            console.log('save button clicked');
            if($('#storyTitle').val() == ''){
              alert('Masukkan terlebih dahulu Judul Buku kamu');
            }else{
              // currentCanvas.clear();
              currentCanvas.renderAll();
              allCanvas[idCanvas] = JSON.stringify(currentCanvas);
              currentCanvas.loadFromJSON(allCanvas[0]);
              currentCanvas.renderAll();
              var cover;
              setTimeout(function(){
                cover = currentCanvas.toDataURL({
                  format: 'png'
                });
              }, 300);
              setTimeout(function(){
              // check if there's explanation
                if(allMatchingBlockedwords.length>0){
                  explanation = 'Pada cerita terdapat kata: '+allMatchingBlockedwords;
                }else{
                  explanation = "Tidak terdapat kata-kata yang terlarang";
                }
                // console.log(explanation);
                $.ajax({
                  "async": true,
                  "crossDomain": true,
                  "data": {
                    canvasHeight: currentCanvas.height,
                    canvasWidth: currentCanvas.width,
                    bookID: $('#bookID').val(),
                    finished: isFinished,
                    explain: explanation,
                    cover: cover,
                    canvas: allCanvas,
                    id_user: $('#idUser').val(),
                    title: $('#storyTitle').val(),
                  },
                  "method": "post",
                  "url": window.location.origin+"/api/save-edit-story",
                  "beforeSend": function(){
                    $('#outForSave').hide();
                    $('.modal-footer').hide();
                    $('#saveSpinner').show();
                    console.log('Sending...');
                    // console.log(data);
                  }
                }).done(function(response, status){
                  console.log('Done');
                  console.log(response);
                  setTimeout(function(){
                    if(status  != "success"){
                      $('#saveSpinner').hide();
                      $('#outForSave').hide();
                      $('#failForSave').show();
                    }else{
                      console.log("Success: "+status);
                      console.log(response);
                      if(isFinished){
                        setTimeout(function(){
                          $('#outForSave').hide();
                          $('#saveSpinner').hide();
                          $('#successForSave').html('Berhasil menyimpan! <br> Kamu akan diarahkan ke halaman Buku!');
                          $('#successForSave').show();
                          window.location.href = "{{ route('user.index')}}";
                          setTimeout(function(){
                          $('#outForSave').show();
                          $('#successForSave').hide();
                          $('.modal-footer').show();
                          },2000);
                        },2500);
                      }else{
                        history.pushState(null, null, window.location.origin+'/user/edit-story/'+response.id);
                        $('#storyTitle').val(response.title);
                        $('#outForSave').hide();
                        $('#saveSpinner').hide();
                        $('#successForSave').html('Berhasil menyimpan!');
                        $('#successForSave').show();
                        setTimeout(function(){
                        $('#outForSave').show();
                        $('#successForSave').hide();
                        $('.modal-footer').show();
                        },3000);
                      }
                    }
                  }, 2000);
                });
              },500);
            }
          });
              
              // ========= /Sending storybooks through ajax request to API
              
              
              
              
              // Algorithm for Recommend the Asset
              // function getRecommend(text){
                //   for()
                // }
                // Algorithm for Recommend the Asset
                
                
                // other scripts
                
                function getRecommendAsset(tag){
                  $('.my-div-thumbnail img').removeClass('my-asset-active');
                  $(tag).find('img').addClass('my-thumbnail-asset:not');
                  $(tag).find('img').addClass('my-asset-active');
                  $('#recommendAsset').html('<b><i>'+$(tag).find('span').text()+'</i></b>')
                  $('#recommendAsset').attr('data-srcAsset', $(tag).find('img').attr('data-asset-location'))
                  // console.log($('#recommendAsset').attr('data-srcAsset'));
                }
                
                
                // function for replace character at index x
                // String.prototype.replaceAt = function(index, replacement){
                  //   return this.substr(0, index) + replacement + this.substr(index + replacement.length);
                  // }
                  
                  // ====================== Disabling zooming
                  // $(document).keydown(function(event) {
                  //     if (event.ctrlKey==true && (event.which == '61' || event.which == '107' || event.which == '173' || event.which == '109'  || event.which == '187'  || event.which == '189'  ) ) {
                  //         event.preventDefault();
                  //         alert("Memperbesar/memperkecil tidak diperkenankan demi menjaga kualitas Canvas");
                  //       }
                  //       // 107 Num Key  +
                  //       // 109 Num Key  -
                  //       // 173 Min Key  hyphen/underscor Hey
                  //       // 61 Plus key  +/= key
                  //     });
                      
                  // $(window).bind('mousewheel DOMMouseScroll', function (event) {
                  //   if (event.ctrlKey == true) {
                  //       alert("Memperbesar/memperkecil tidak diperkenankan demi menjaga kualitas Canvas");
                  //       event.preventDefault();
                  //     }
                  // });
                  //  ====================== Disabling zooming
                          
                          // ===================== Prevent windows size under 1024px and 768px 
                          // currentCanvas.setBackgroundColor('#ffff21');
                          // var rect = new fabric.Rect({
                            //   top: 10,
                            //   left: 10,
                            //   width: 200,
                            //   height: 200,
                            //   color: 'red',
                            //   transparentCorners: false
                            // });
                            // currentCanvas.add(rect);
                          </script>
                          
                          @endsection
@include('..\includes\top')

<div class="container-fluid" style="min-height:500px; background-color:gray;">
    <div class="row">
    <div class="col-lg-12 my-2">
            <div class="card" style="min-height:500px;">
                <div class="card-header">
                    <div style="float:left">
                        <form class="form-inline text-center" method="get" action="{{ route('unreg.search.book') }}">
                            <input required id="searchBar" class="form-control mr-sm-2" name="search" type="search" placeholder="Cari bukumu disini!" aria-label="Search">
                            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Cari</button>
                        </form>
                    </div>
                    <div style="margin-left:15px; float:left;">
                        @if(!empty($search))
                        <h4 >Mencari: "{{$search}}"</h4>
                        @endif
                    </div>
                </div>

                <div class="card-body p-0" style="max-height: 900px; height:700px;">
                    <div id="searchPageBody" class="p-2" style="height:100%; overflow:auto;">
                    @if(!empty($notfound))
                    <div class="alert alert-primary" role="alert">
                        <b>Gagal!</b> {{$notfound}}
                    </div>
                    @else

                    @foreach($allbooks as $book)
                    <div class="card mx-1 mb-2" style="width: 18rem; float:left;">
                        <img class="card-img-top" src="{{$book->cover}}" alt="Card image cap">
                        <div class="card-body p-2">
                            <a href="{{route('unreg.read.book', ['slug' =>$book->slug])}}"><h5 class="card-title">{{$book->title}}</h5></a>
                            <h6 class="card-subtitle mb-2 text-muted">Author: {{$book->profile->username}}</h6>
                        <small class="card-text">Dibuat pada tanggal: {{$book->created_at}}</small>
                        </div>
                        <div class="card-footer">
                            <span class="float-right"><a href="{{ route('unreg.read.book', ['slug' => $book->slug])}}" class="btn btn-success btn-md">Baca</a></span>
                        </div>
                    </div>
                    @endforeach

                    @endif
                    </div>
                </div>
                
            </div>
        </div>


    </div>
</div>


@include('..\includes\bottom')
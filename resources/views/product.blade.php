@extends("master")
@section("content")


<div class="container" style="height:10cm">
<div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
        @foreach($products as $item)
            <div class="carousel-item {{$item->id == 2 ? 'active':''}}">
                <a href="detail/{{$item->id}}" style="text-decoration: none; color:black">
            <img height="250px" src="/{{$item->gallery}}" class="d-block w-40" alt="...">
            <div class="carousel-caption">
            <h3 style="color:rgb(192, 120, 120)">{{$item->name}}</h3>
            <p style="color:gray">{{$item->description}}</p>
            </div>
                </a>
            </div>
        @endforeach
  </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"  data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"  data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>

<div class="container">
    <h3>Other Stuff</h3>
    <div class="row row-cols-1 row-cols-md-3 g-4">
    @foreach($products as $item)
        <div class="col">
            <div class="card h-100 border-dark">
                <a href="detail/{{$item->id}}" style="text-decoration: none; color:black">
                    <img src="{{ $item->gallery }}" class="card-img-top" alt="..." height="400px">
                    <div class="card-body">
                        <p class="card-text">{{$item->name}}</p>
                        <h5 class="card-title">${{ $item->price }}</h5>
                    </div>
                </a>
            <div class="card-footer">
                @if ($item->quantity <= 3 && $item->quantity > 0)
                    <small class="text-muted">Just {{ $item->quantity }} more in the shop</small>
                @elseif ($item->quantity == 0)
                    <small class="text-muted">There is nothing in the shop</small>
                @endif
            </div>
            </div>
        </div>
            {{-- <div class="col-md-2">
                <img height="100px" src="{{$item->gallery}}" alt="">
            
                <a href="detail/{{$item->id}}" style="color: black;"><h5>{{$item->name}}</h5></a><br>
                <h3>${{ $item->price }}</h3>
            </div> --}}
    @endforeach
    </div>
</div>
    <br><br>
<div class="row justify-content-center">
  
  <div class="col-md-3">
      {{ $products->links() }}
  </div>
  
</div>
@endsection
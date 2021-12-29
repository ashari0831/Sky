@extends("master")
@section("content")

<div class="container">
  <div class="row justify-content-center">
  @foreach($result as $item)
<div class="card" style="width: 18rem;">
  <img src="{{$item->gallery}}" class="card-img-top" alt="...">
  <div class="card-body">
    <h6 class="card-title">{{ $item->name }}</h6>
    <p class="card-text">{{ $item->description }}</p>
    <h5>${{ $item->price }}</h5>
    <form action="/add_to_cart" method="post">
      @csrf
        <input type="hidden" name="product_id" value="{{ $item->id }}">
        <input class="btn btn-info" type="submit" value="Add To Cart">
    </form>
  </div>
</div>
@endforeach
</div>
<br><br>
  <div class="row justify-content-center">
    
      <div class="col-md-3">
          {{ $result->links() }}
      </div>
  </div>
</div>
<br><br>



    {{-- <nav aria-label="...">
        <ul class="pagination justify-content-center">
           <li class="page-item">
            <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
          </li> 
          <li class="page-item">
            <a class="page-link" href="?search={{ $search }}&pageno=1">1</a>
          </li>
          <li class="page-item" aria-current="page">
            <a class="page-link" href="?search={{ $search }}&pageno=2">2</a>
          </li>
          <li class="page-item">
            <a class="page-link" href="?search={{ $search }}&pageno=3">3</a>
          </li>
           <li class="page-item">
            <a class="page-link" href="#">Next</a>
          </li> 
        </ul>
      </nav> --}}


@endsection
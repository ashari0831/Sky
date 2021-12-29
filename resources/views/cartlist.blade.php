@extends('master')
@section('content')


<ul class="list-group">

@foreach($products as $product)
  <li class="list-group-item">
      <div class="row">
            <div class="col-md-12">
                <img src="{{$product->gallery}}" height="200px" width="230px">
                <h3>{{ $product->name }}</h3><br>
                <p>{{ $product->description }}</p>
                <p>Price of eachone: ${{ $product->price }}</p>
                <p>number: {{ $product->quantity }}</p>    
                <form action="/cartlist/{{$product->id}}" method="POST">
                @csrf
                    <input type="hidden" name="product_id" value="{{$product->id}}">
                    <button class="btn btn-outline-warning " >Remove from cart</button>
                </form>

            </div>
      </div>
  </li>
@endforeach
</ul>
<div class="row">
    <div class="col-md-12 d-flex justify-content-center">
        @if (count($products) > 0 )
         <a class="btn btn-info d-flex justify-content-center" href="/order">Order Now</a>
        @endif
    </div>
</div>


@endsection
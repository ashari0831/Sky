
@extends("master")
@section("content")

    <div class="container" style="height:10cm">
        <div class="row">
            <div class="col-sm-6">
                <img height="380px" width="380px" src="/{{$product->gallery}}" alt="">
            </div>
            <div class="col-sm-6">
                <a class="btn btn-outline-danger" href="/cartlist">Go To Cart</a><br><hr>
                <h3>Title: {{$product->name}}</h3>
                <h5>Price: ${{$product->price}}</h5>
                <h5>Description: {{$product->description}}</h5>
                <h5>Category: {{$product->category}}</h5><hr>
                
                @if ($product->quantity != 0)
                  <form action="/add_to_cart" method="POST">
                    @csrf
                        <input type="hidden" name="product_id" value="{{$product->id}}">
                        <input type="number" name="quantity" value="1">
                    <button class="btn btn-success">Add To Cart</button><br><hr>
                  </form>
                @endif
                
                {{-- <button class="btn btn-info">buy now</button> --}}
            </div>
        </div>
    </div>

    <div class="container">
    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
        <li class="nav-item" role="presentation">
          <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Features</button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Comments</button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">Q & A</button>
        </li>
      </ul>
      <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
            <ul>
                <li>Material: </li>
                <li>Structure: </li>
                <li>Special Features: </li>
            </ul>
        </div>
        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
            <div class="container">
                <div class="row">
                    <div class="col-sm-5 col-md-6 col-12 pb-4">
                        @foreach ($comments as $comm)
                          @if ($comm->status == 'confirmed')
                            <div class="comment mt-4 text-justify float-left"> {{--<img src="https://i.imgur.com/yTFUilP.jpg" alt="" class="rounded-circle" width="40" height="40"> --}}
                              <h6 style="color: green">{{ $comm->advantage }}</h6>
                              <h6 style="color: rgb(200, 33, 33)">{{ $comm->disadvantage }}</h6>
                              <h6>{{ $comm->opinion }}</h6>
                              <small>{{ $comm->user->name }}<span> - {{ $comm->created_at }}</span></small> 
                            </div>
                          @endif
                        @endforeach
                    </div>
                </div>
            </div>
                <a href="{{ $product->id }}/comment" class="btn btn-outline-warning">Post Comment</a>
        </div>
        <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">...</div>
      </div>
    </div>
      



@endsection

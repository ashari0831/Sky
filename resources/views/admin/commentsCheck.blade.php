@extends("admin.adminTemp")
@section("content")

<div class="container">
    <div class="row">
        <div class="col-sm-5 col-md-6 col-12 pb-4">
            @foreach ($comments as $comm)
              
                <div class="comment mt-4 text-justify float-left"> 
                  <h6 style="color: green">{{ $comm->advantage }}</h6>
                  <h6 style="color: rgb(200, 33, 33)">{{ $comm->disadvantage }}</h6>
                  <h6>{{ $comm->opinion }}</h6>
                  <small>{{ $comm->user->name }}<span> - {{ $comm->created_at }}</span></small> 
                </div>
                <div class="comment mt-4 text-justify float-right">
                    <form action="/admin/comments/confirm" method="POST">
                        @method('PATCH')
                        @csrf
                        <input type="hidden" name="id" value="{{ $comm->id }}">
                        <input class="btn btn-outline-success" type="submit" value="confirm">
                    </form>
                    <form action="/admin/comments/deny" method="POST">
                        @method('PATCH')
                        @csrf
                        <input type="hidden" name="id" value="{{ $comm->id }}">
                        <input class="btn btn-outline-danger" type="submit" value="deny">
                    </form>
                </div>
                <hr>
            @endforeach
        </div>
    </div>
</div>

@endsection
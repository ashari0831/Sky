@extends("master")
@section("content")


<div class="container" style="height:20cm">
  <div class="row">
    <div class="col-sm-4 align-self-center">
          <form method="post" action="/">
            
          <div class="form-group">
          @csrf
            <label for="exampleInputEmail1">Email address</label>
            <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
            <input type="text" name="name" class="form-control" placeholder="Enter your name">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
          </div>

          <button type="submit" class="btn btn-primary">Sign Up</button>
        </form>
        <p>if you have signed up already<a href="/login"> Click here</a></p>
    </div>
  </div>
</div>

@endsection
@extends('master')
@section('content')

<div class="container">
    <h2 class="center">Profile</h2>

<form action="/profile" method="POST">
@method('PUT')
@csrf
        <input type="hidden" name="id" value="{{ $user->id }}">
        <label class="form-label" for="">Name</label>
        <input class="form-control" type="text" name="name" id="" value="{{ $user->name }}" required>
        <label class="form-label" for="">Email</label>
        <label class="form-control" for="">{{ $user->email }}</label>
        <label class="form-label" for="">Role</label>
        <label class="form-control" for="">{{ $user->usertype ?? 'User' }}</label>
        <hr>
        <label class="form-label" for="">New Password</label>
        <input class="form-control" type="password" name="password" id="" >
        <label class="form-label" for="">Confirm Password</label>
        <input class="form-control" type="password" name="cpassword" id="" ><br>
        <input type="submit" class="btn btn-outline-info" value="Update">
</form>
</div>

@endsection
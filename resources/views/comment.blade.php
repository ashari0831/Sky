@extends("master")
@section("content")

<div class="container">
<form action="comment/post" method="POST">
    @csrf
    <div class="mb-3">
      <label for="advantage" class="form-label">Advantage</label>
      <input type="text" class="form-control" id="advantage" name="advantage">
    </div>
    <div class="mb-3">
      <label for="disadvantage" class="form-label">Disadvantage</label>
      <input type="text" class="form-control" id="disadvantage" name="disadvantage">
    </div>
    <div class="mb-3">
        <label for="opinion" class="form-label">Opinion</label>
        <textarea class="form-control" id="opinion" name="opinion"></textarea>
      </div>
    <button type="submit" class="btn btn-outline-primary">Post</button>
  </form>
</div>

@endsection
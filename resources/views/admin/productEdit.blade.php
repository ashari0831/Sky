@extends("admin.adminTemp")
@section("content")
<div class="container">
    <form action="/admin/products/{{ $product->id }}" method="POST" enctype="multipart/form-data">
        @method('PATCH')
        @csrf
        <input type="hidden" name="id" value="{{ $product->id }}">
        <label class="form-label" for="">category</label>
        <input class="form-control" type="text" name="category" id="" value="{{ $product->category }}">
        <label class="form-label" for="">name</label>
        <input class="form-control" type="text" name="name" id="" value="{{ $product->name }}">
        <label class="form-label" for="">price</label>
        <input class="form-control" type="text" name="price" id="" value="{{ $product->price }}">
        <label class="form-label" for="">description</label>
        <textarea class="form-control" name="description" id="" cols="30" rows="10">{{ $product->description }}</textarea>
        <label class="form-label" for="">gallery</label>
        <input class="form-control" type="file" name="gallery" id="" >

        <input type="submit" class="btn btn-outline-info" value="Update">
    </form>
</div>
@endsection
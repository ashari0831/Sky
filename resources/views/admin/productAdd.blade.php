@extends("admin.adminTemp")
@section("content")

<div class="container">
    <form action="/admin/products" method="post" enctype="multipart/form-data">
        @csrf
        
        <label class="form-label" for="">category</label>
        <input class="form-control" type="text" name="category" id="" required>
        <label class="form-label" for="">name</label>
        <input class="form-control" type="text" name="name" id="" required>
        <label class="form-label" for="">price</label>
        <input class="form-control" type="text" name="price" id="" required>
        <label class="form-label" for="">description</label>
        <textarea class="form-control" name="description" id="" cols="30" rows="10" required></textarea>
        <label class="form-label" for="">gallery</label>
        <input class="form-control" type="file" name="gallery" required>
        <label class="form-label">Quantity</label>
        <input class="form-control" type="number" name="quantity" required>

        <input type="submit" class="btn btn-outline-info" value="Add">
    </form>
</div>
@endsection

    
  @extends("admin.adminTemp")
  @section("content")

   

    @isset($chatrooms)  
    @php
        $i = 0;
    @endphp
    <h4>Users Chats</h4>
      <ul class="list-group list-group-numbered">
          @foreach ($chatrooms as $chatroom)
            <li class="list-group-item d-flex justify-content-between align-items-start">
              <a href="/admin/chatroom/{{ $chatroom->id }}" style="text-decoration: none">
                  <div class="ms-2 me-auto">
                    <div class="fw-bold">{{ $chatroom->name }}</div>
                  </div>
                  <small>{{ $chatroom->messages->last()->message ?? '' }}</small>
                  @if ($unreadMsg[$i] > 0)
                    <span class="badge bg-primary rounded-pill">{{ $unreadMsg[$i] }}</span>
                  @endif     
              </a>
            </li>
            @php
                $i++;
            @endphp
          @endforeach
      </ul>
    @endisset


  

      @isset($products)
      
      <table class="table table-dark table-striped">
        <thead>
          <tr>
            <th scope="col">Id</th>
            <th scope="col">Category</th>
            <th scope="col">Name</th>
            <th scope="col">Price</th>
            <th scope="col">Description</th>
            <th scope="col">Gallery</th>
            <th scope="col">Quantity</th>
            <th scope="col">#</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($products as $pro)
               <tr>
                    <th scope="row">{{ $pro->id }}</th>
                    <td>{{ $pro->category }}</td>
                    <td>{{ $pro->name }}</td>
                    <td>${{ $pro->price }}</td>
                    <td>{{ $pro->description }}</td>
                    <td>{{ $pro->gallery }}</td>
                    <td>{{ $pro->quantity }}</td>
                    <td>
                      <a class="btn btn-primary" href="products/{{ $pro->id }}/edit">Edit</a>
                      {{-- <a class="btn btn-danger" href="products/{{ $pro->id }}/delete">Delete</a> --}}
                      <form action="products/{{ $pro->id }}" method="POST">
                        @method("DELETE")
                        @csrf
                        <input type="hidden" name="id" value="{{ $pro->id }}">
                        <input type="submit" class="btn btn-danger" value="Delete">
                      </form>
                    </td>
                </tr> 
            @endforeach
          
        </tbody>
      </table>
      <a class="btn btn-outline-success" href="products/create">Add</a>

      @endisset

      <p class="text-xl-center">ADMIN PANEL</p>
      

@endsection


{{-- 
 --}}
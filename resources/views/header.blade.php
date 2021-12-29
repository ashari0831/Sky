<?php
  use App\Http\Controllers\ProductController;
  use App\Models\ChatRoom;
  use Illuminate\Support\Facades\Auth;

  if(Auth::check()){
    $room = ChatRoom::where('name', Auth::user()->email . '_admin')->get();  
    $cartCounter = ProductController::cartItem();

    $unreadMsg = Auth::user()->chatroom->messages->where('user_status', 'unread')->count();
  }else{
      $cartCounter = '';
  }


?>


<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="/">E-Commerce</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
      @if(Auth::check())
      <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            
            
            {{Auth::user()->name}}

            
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li>
              
                <a href="/profile/{{ Auth::user()->id }}"  class="dropdown-item">Profile</a>
              
            </li>
            <li>
              @isset($room)
                  {{-- <a class="dropdown-item" aria-current="page" href="/chatroom">Chat with admin</a> --}}

                  <ul class="list-group list-group-numbered">
                    
                      <li class="list-group-item d-flex justify-content-between align-items-start">
                        <a class="dropdown-item" aria-current="page" href="/chatroom">
                            <div class="ms-2 me-auto">
                              <div>Chat with admin</div>
                            </div>
                             @if ($unreadMsg > 0) 
                              <span class="badge bg-primary rounded-pill"> {{ $unreadMsg }} </span>
                             @endif      
                        </a>
                      </li>
                    </ul>
              @endisset
            </li>
            <li>
              <button type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Logout
              </button>
            </li>
          </ul>
        </li>

      


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Logout</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Are you sure?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <a class="btn btn-primary"  href="/logout">Logout</a>
      </div>
    </div>
  </div>
</div>




        
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/cartlist">
             Cart(
                  @if($cartCounter) 
                    {{ $cartCounter }}
                  @else
                    {{ 0 }}
                  @endif
                  )
            </a>
        </li>
        @endif
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/">Home</a>
        </li>
        {{-- <li class="nav-item">
          <a class="nav-link" href="#">Link</a>
        </li> --}}
        
        <li class="nav-item">
          <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
        </li>
      </ul>

      @if (!Auth::check())
        
      <div class="d-flex">
        <a class="nav-link active" aria-current="page" href="/login">Login</a>
        <a class="nav-link active" aria-current="page" href="/register">Register</a>
      </div>

      @endif

      <form class="d-flex" action="/search" method="get">
        <input name="search" class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
      
    </div>
  </div>
</nav>



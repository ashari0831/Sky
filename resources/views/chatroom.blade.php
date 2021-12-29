@extends('master')
@section('content')
 



    <div class="container">
       
            @foreach ($messages as $message)
                <div class="row">
                    @if ($message->user_id == $admin[0]->id)
                        <small>Admin:</small>
                    @else
                        <small>{{ $user->name }}:</small>
                    @endif
                    
                    <h6>{{ $message->message }}</h6>
                    <small><small>{{ $message->updated_at }}</small></small>
                </div><br><br>
            @endforeach
        
        <div class="row">
            <form action="/sendMessage" method="post">
                @csrf
                {{-- <input type="hidden" name="user_id" value="{{ $user->id }}"> --}}
                 <input type="hidden" name="chat_room_id" value="{{ $room->id }}"> 
                <input type="text" name="message" placeholder="write">
                <input type="submit" value="Send">
            </form>
        </div>
    </div>

    
@endsection
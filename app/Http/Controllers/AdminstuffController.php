<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Comment;
use App\Models\ChatRoom;
use App\Models\ChatMessage;
use Illuminate\Support\Facades\Auth;
use App\Events\NewChatMessage;


class AdminstuffController extends Controller
{
    function allChats()
    {
        $chatrooms = ChatRoom::all();

        $unreadMsg = [];
        //$unreadMsg = ChatMessage::where('status', 'unread')->count();
        
        foreach ($chatrooms as $chatroom) {
            //dd($chatroom->messages->where('status', 'unread')->count());
            array_push($unreadMsg, $chatroom->messages->where('status', 'unread')->count());
            //dd($chatroom->messages->last()->message);
        }
        //dd($chatroom->messages->first()->message);
        return view('admin/admindashboard', compact('chatrooms','unreadMsg'));
       
    }

    function allProducts()
    {
        $products = Product::all();
        return view('admin/admindashboard', compact('products'));
    }

    function detail($id)
    {
        $product = Product::find($id);
        return view('admin.productEdit', compact('product'));
    }

    public function productUpdate(Request $req)
    {
        $pro = Product::where('id', $req->id)->get();
        // dd($pro);
        $pro[0]->name = $req->name;
        $pro[0]->category = $req->category;
        $pro[0]->price = $req->price;
        $pro[0]->description = $req->description;
        if($req->gallery)
        {
            $pro[0]->gallery = 'storage/' . $req->gallery->store('productImages','public');
        }
        $pro[0]->save();

        return redirect('/admin/products');
    }

    public function productDelete($id)
    {
    Product::where('id', $id)->delete();
    return redirect('/admin/products');
    }

    public function productAdd(Request $req)
    {
         
         $data = $req->validate([
             'category'=>'required',
             'name'=>'required',
             'price'=>'required',
             'description'=>'required',
             'gallery'=>'required|image',
             'quantity'=>'required',
         ]);
            
           $imagePath = $data['gallery']->store('productImages', 'public');

          Product::create([
            'category'=>$data['category'],
            'name'=>$data['name'],
            'price'=>$data['price'],
            'description'=>$data['description'],
            'gallery'=>'storage/' . $imagePath,
            'quantity'=> $data['quantity'],
          ]);

            return redirect('/admin/products');
    }

    public function pendingComments()
    {
        $comments = Comment::where('status', 'pending')->orderBy('created_at','desc')->get();
        return view('admin.commentsCheck', compact('comments'));
    }

    public function commentConfirm(Request $req)
    {
        $comm = Comment::find($req->id);
        $comm->status = 'confirmed';
        $comm->save();

        return redirect('/admin/comments');
    }

    public function commentDeny(Request $req)
    {
        $comm = Comment::where('id', $req->id)->delete();

        return redirect('/admin/comments');
    }

    public function chatroom($chat_room_id)
    {
       $room = ChatRoom::find($chat_room_id);

       $messages = ChatMessage::where('chat_room_id', $chat_room_id)->get();

       return view('admin.chatroom', compact('room','messages'));
    }


    public function storeMessage(Request $req)
    {
        $data = $req->validate([
            'chat_room_id'=>'',
            'message'=>'required',
        ]);

       $newMsg = ChatMessage::create([
            'chat_room_id' => $data['chat_room_id'],
            'user_id' => Auth::id(),
            'message' => $data['message'],
        ]);

        broadcast(new NewChatMessage($newMsg))->toOthers();

         return redirect('/admin/chatroom/' . $data['chat_room_id']);
    }
}


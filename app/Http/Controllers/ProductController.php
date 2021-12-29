<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Comment;
use Illuminate\Support\Facades\DB;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\AssignmentCreated;


class ProductController extends Controller
{
    function index(){

        $products = Product::paginate(9);
        //dd($products);
        return view('product', compact('products'));
    }

    

    function detail($id)
    {
        $product = Product::find($id);
        $comments = Comment::where('object_id', $id)->orderBy('created_at', 'DESC')->get();
        return view('details', ['product' => $product, 'comments'=>$comments]);
    }

    public function comment(Request $req, $product_id)
    {
        Comment::create([
            'user_id'=> Auth::id(),
            'object_id'=> $product_id,
            'opinion'=> $req->input('opinion'),
            'advantage'=>$req->input('advantage'),
            'disadvantage'=> $req->input('disadvantage'),
        ]);

        return redirect("/detail/{$product_id}");
    }



    function search(Request $req)
    {
        // $data = Product::where('name', 'like', '%'.$req->search.'%')->paginate(9);
        $data = Product::search($req->search)->get();
        return view('search', ['result'=> $data]);
    }


    function addToCart(Request $req)
    {
        
                $product = Product::find($req->product_id);
            if($product->quantity - $req->quantity >=0){

                $cart = new Cart();
                $cart->user_id = Auth::id();
                $cart->product_id = $req->product_id;
                $cart->quantity = $req->quantity;
                $cart->save();
                return redirect('/');
            }else{
                return redirect('/detail/'.$req->product_id);
            }
                
            
    }

    static function cartItem()
    {
        $user_id = Auth::id();
        return Cart::where('user_id', $user_id)->count();
    }

    function cartList()
    {
        $user_id = Auth::id();

        //$products = DB::table('cart')->where('user_id', $user_id)->get();

        $products = DB::table('cart')->select('cart.id','product_id','user_id'
        ,'name','price','category','cart.quantity'
        ,'gallery','description','cart.updated_at')
        ->join('products','products.id','=','cart.product_id')
        ->where("user_id", $user_id)->orderBy('cart.updated_at', 'DESC')->get();
        //dd($products);
        return view('cartlist', ['products'=>$products]);
    }

    function RemoveFromCartList($product_id)
    {
        $result = Cart::find($product_id)->delete();
        return redirect('/cartlist');
    }

    function order()
    {
        $user_id = Auth::id();
        $user_cart = Cart::where('user_id', $user_id)->get();

         $prices = DB::table('cart')->select('price','cart.quantity')
         ->join('products','products.id','=','cart.product_id')
         ->where("user_id", $user_id)->get();
        $totalPrice=0;

        foreach($prices as $item){
            $totalPrice += $item->price * $item->quantity; 
        }

        return view('order', compact('totalPrice'));
    }

    function orderPlace(Request $req)
    {
        $user_id = Auth::id();
        $relatedRecords = Cart::where('user_id', $user_id)->get();

        

        foreach($relatedRecords as $record)
        {
            $order = new Order;
            

            $validated = $req->validate([
                'product_id'=> '',
                'user_id'=> '',
                'selectedMethod'=> 'required',
                'address'=> 'required',
            ]);

            $order->product_id = $record->product_id;
            $order->user_id = $record->user_id;
            $order->status = 'pending';
            if($req->input('selectedMethod')==1)
            {
                $order->payment_method = 'Online';
            }elseif($req->input('selectedMethod')==2)
            {
                $order->payment_method = 'Cash';
            }
            $order->payment_status = 'pending';
            $order->address = $req->input('address');
            $order->quantity = $record->quantity;
            $order->save(); 

            $product = Product::where('id', $record->product_id)->get();
            $product[0]->quantity -=  $record->quantity;
            $product[0]->save();

            Cart::where('id', $record->id)->delete();
        }

        //sending email to the customer
        $details = [
            'title' => 'cool title',
            'greet' => 'Hello dear '.Auth::user()->name,
            'address' => $req->input('address'),
            
        ];

        //$message = "Your request was sent successfully";

        //Mail::to(Auth::user()->email)->send(new AssignmentCreated($details));
        //Mail::to(Auth::user()->email)->queue(new AssignmentCreated($details));
        // $when = now()->addMinutes(30);
        // Mail::to(Auth::user()->email)->later($when, new AssignmentCreated($details));


        //return response()->download("download (1).jpg", "pretty.jpg");

        return redirect('/');
    }
}









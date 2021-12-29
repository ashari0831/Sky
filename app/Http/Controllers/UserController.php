<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;
class UserController extends Controller
{
    // function login(Request $req){
    //     $user = User::where(['email'=>$req->email])->first();

    //     if(!$user || $req->password != $user->password){
    //         return "sth went wrong".$user.$req->password.$user->password;
    //     }
    //     else
    //     {
    //         $req->session()->put('user', $user);
    //         return redirect('/');
    //     }
    // }

    // function signup(Request $req)
    // {
    //     $user = new User;

    //     $user->name= $req->input('name');
    //     $user->email= $req->input('email');
    //     $user->password= $req->input('password');

    //     $user->save();

    //     return redirect('/');
    // }

    public function profile($id)
    {
        $user = User::find($id);
        return view('profile', compact('user'));
    }

    public function profileUpdate(Request $req)
    {
        $user = User::find($req->id);
        if(!empty($req->password))
        {
            $data = $req->validate([
                'name' => 'required|max:100',
                'password' => 'required|min:8',
                'cpassword' => 'required|min:8',
            ]);
        }else{
            $data = $req->validate([
                'name' => 'required|max:100',
            ]);
        }

        $user->name = $data['name'];
        if(array_key_exists('password', $data) & $data['password'] == $data['cpassword'])
        {
            $user->password = Hash::make($data['password']);
        }
        $user->save();

        return redirect('/');
    }
}

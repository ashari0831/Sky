<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class UserAuth
{
    
    public function handle(Request $request, Closure $next)
    {
        if($request->path() == "login" && $request->session()->has('user')){
            return redirect("/");
        }
        return $next($request);
    }
}

<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class Admin
{

    public function handle(Request $request, Closure $next)
    {
        if (Auth::user()->role == 1){
            return $next($request);
        }
        toastr()->error('اجازه ورود به این بخش را ندارید :(');
        return redirect()->route('home');
    }
}

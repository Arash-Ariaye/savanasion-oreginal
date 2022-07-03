<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Expert
{

    public function handle(Request $request, Closure $next)
    {
        if (in_array(Auth::user()->role, [1,3])){
            return $next($request);
        }
        toastr()->error('اجازه ورود به این بخش را ندارید :(');
        return redirect()->route('home');
    }
}

<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class Login
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
       // dd($request->session());
        
        if($request->session()->has('auth')){
            return $next($request);
        }
        return redirect('tanjak')->with('error',"Maaf Anda Tidak Punya Akses Masuk !!!");
    }
}

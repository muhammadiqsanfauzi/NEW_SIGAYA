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
    public function handle(Request $request, Closure $next, $role)
    {

        if($request->sesion()->has('login')){
            return $next($request);
        }
        return redirect('login')->with('error',"Maaf Anda Tidak Punya Akses Masuk !!!");
    }
}

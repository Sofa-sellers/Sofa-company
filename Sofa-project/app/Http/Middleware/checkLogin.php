<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class checkLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(Auth::check()==true){
            if(Auth::user()->level == 2){
                return redirect()->route('admin.category.index');
            }else {
                return redirect()->route('index');
            }
        
        }
        return redirect()->route('showLogin');
    }
}

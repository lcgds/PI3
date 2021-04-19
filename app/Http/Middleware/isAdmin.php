<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class isAdmin
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

        if(Auth()->user()->isAdmin) {
            return $next($request);
        } else {
            session()->flash('warning', 'Você não possui permissão para acessar essa página.');
            return redirect(route('dashboard')); 
        } 
    }
}

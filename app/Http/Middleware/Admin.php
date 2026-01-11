<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
//        dd($request->all());
        if ($request->email == 'a' && $request->pass == '1234') {
           if ($request->role == 'admin') {
               return $next($request);
           }else{
               return redirect('/');
           }
        }
        return abort(403);
    }
}

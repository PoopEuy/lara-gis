<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserAkses
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role ): Response
    {
        if (auth()->user()->role==$role) {
            # code...
            return $next($request);
        }

        if (auth()->user()->role == 'admin') {
             return redirect('/admin');
        }elseif (auth()->user()->role== 'viewers') {
            return redirect('/viewers');
        }

        
        // return response()->json(['msg' => 'Anda tidak diperbolehkna mengakses halaman ini',]
          
        //     );
    }
}

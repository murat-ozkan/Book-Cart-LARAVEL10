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
        if (auth()->check() && auth()->user()->role == 'admin')
            return $next($request);
        return redirect('home');

        //! user admin kontrolünü bir fonk yardımıyla yaparsak (User model içerisinde isAdmin oluşturduk)

        // ! Aşağıdaki satırlar çalışmadı. İptal ettim.

        // if (auth()->check() && auth()->user()->isAdmin()) // Kullanıcı admin ise isteği yerine getir.
        // {
        //     return $next($request);
        // }
        // return redirect('home'); // Kullanıcı admin değilse home yönlendir
    }
}

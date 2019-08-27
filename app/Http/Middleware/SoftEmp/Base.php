<?php

namespace App\Http\Middleware\SoftEmp;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class Base {

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next) {
        # Check if the user is activated
        if (Auth::check()) {
            #retorna o objeto user autenticado
            $user = Auth::user();

            if (!$user->status){
                Session::flush();
                return redirect()->route('login')->with('warning','Conta bloqueda, entre em contato com o administrador');
            }
            #se não estiver ativado
            if (!$user->active) {
                Session::flush();//mata a sessão
                if (url()->current() != url('/logout')) {
                    if (strpos(url()->current(), route('activate.form')) !== false) {
                        // Seems to be ok
                    } else {
                        return redirect()->route('activate.form');
                    }
                }
            }
        }
        return $next($request);
    }

}

<?php

namespace App\Http\Middleware;
use \App\User;
use Closure;
use Illuminate\Support\Facades\Auth;

class admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        $userId = \Auth::id(); //todo finish adminPanel middelware
        $user= User::find($userId);
        if($user->role != 'adminPanel'){
            return 'Vous n\'avez pas les droits d\'acces nécessaire.';

        }
        return $next($request);
    }
}

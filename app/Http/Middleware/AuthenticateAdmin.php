<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;
use Auth;
class AuthenticateAdmin
{
    public function __construct(Guard $auth) {
         $this->auth = $auth;
    }
    public function handle($request, Closure $next, $guard = null)
    {

      if (!Auth::user()->isAdmin() AND !Auth::user()->isSuper()) {

          return redirect('/');
      }

      return $next($request);
    }


}

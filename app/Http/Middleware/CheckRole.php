<?php

namespace App\Http\Middleware;
use Auth;
use Closure;

class CheckRole
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

        if (!Auth::check()) {
            return redirect()->route('login');
        }
        if (!Auth::user()->isAdmin() && !Auth::user()->isEtudiant()) {
            abort(401, 'This action is unauthorized.');
        }
        
        return $next($request);
    }
}

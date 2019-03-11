<?php

namespace Dasperg\Role;

use Closure;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $roles)
    {
        //TODO: guest
        if (!Auth::check())
            return redirect('login');

        $request->user()->authorizeRoles($roles);

        return $next($request);
    }
}

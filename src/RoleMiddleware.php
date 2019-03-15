<?php

use Closure;
use App\Http\Middleware\Authenticate;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request  $request
     * @param \Closure  $next
     * @param string|array $roles
     * @return mixed
     */
    public function handle($request, Closure $next, ... $roles)
    {
        return app(Authenticate::class)->handle($request, function ($request) use ($next, $roles) {
            $request->user()->authorizeRoles($roles);
            return $next($request);
        });
    }
}

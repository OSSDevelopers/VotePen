<?php

namespace App\Http\Middleware;

use App\Permissions;
use Closure;

class MustBeVotePenAdministrator
{
    use Permissions;

    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure                 $next
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        abort_unless($this->mustBeVotePenAdministrator(), 403);

        return $next($request);
    }
}

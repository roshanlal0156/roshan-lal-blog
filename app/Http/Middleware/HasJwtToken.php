<?php

namespace App\Http\Middleware;

use App\Commons\Constants;
use App\Services\AuthService;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class HasJwtToken
{
    private $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $hasToken = $request->cookie('jwt') ? true : false;
        if ($hasToken and ($this->authService->isJwtValid($request->cookie('user_id'), $request->cookie('jwt')))) {
            $hasRoleAuthor = $this->authService->checkForRole($request->cookie('user_id'), Constants::$AUTHOR);
            view()->share('hasRoleAuthor', $hasRoleAuthor);
        } else {
            view()->share('hasRoleAuthor', false);
        }
        view()->share('hasJwtToken', $hasToken);
        return $next($request);
    }
}

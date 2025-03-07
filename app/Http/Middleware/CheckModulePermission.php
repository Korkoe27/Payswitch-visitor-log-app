<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckModulePermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $module, $action): Response
    {
        $user = Auth::user(); // Get the authenticated user
    
        if (!$user || !User::hasPermission($user->id, $module, $action)) {
            abort(403, 'Go back! Now!');
        }
    
        return $next($request);
    }
    
}

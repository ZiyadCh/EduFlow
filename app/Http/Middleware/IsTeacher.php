<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsTeacher
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = auth('api')->user();

        if ($user && $user->role === 'teacher') {
            return $next($request);
        }

        return response()->json([
            'error' => 'Unauthorized',
            'message' => 'This action is reserved for teachers only.',
        ]);
    }
}

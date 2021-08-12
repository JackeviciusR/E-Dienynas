<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, string $role)
    {
        $roles = [
            'SUPER-ADMIN'=>[1],
            'ADMIN'=>[1,2],
            'STUDENT'=>[3],
            'TEACHER'=>[4],
            'PARENT'=>[5],
        ];
//        dd($role);
        $roleIds = $roles[$role] ?? [];

        if (!in_array( auth()->user()->role_id, $roleIds) ) {
            return redirect()->back();
        }
        return $next($request);

//        return $next($request);
    }
}

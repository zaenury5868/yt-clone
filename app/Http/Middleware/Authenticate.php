<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        if (!$request->expectsJson()) {
            // return route('login');
            if($request->routeIs('video.*')) {
                session()->flash('fail', 'Anda harus masuk terlebih dahulu');
                return route('login',['fail'=>true,'returnUrl' => URL::current()]);
            }
        }
        // return $request->expectsJson() ? null : route('login');
    }
}

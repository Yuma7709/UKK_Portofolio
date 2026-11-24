<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/** Hanya admin yang sudah login (session 'admin_login') boleh masuk. */
class BlogAdmin
{
    public function handle(Request $request, Closure $next)
    {
        if (! session('admin_login')) {
            return Route::has('admin.login')
                ? redirect()->route('admin.login')
                : redirect('/');
        }

        return $next($request);
    }
}
<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;

class EnsureAdmin
{
    public function handle(Request $request, Closure $next)
    {
        $email = session('admin_email');

        if (! session('admin_login') || ! $email) {
            return redirect()->route('admin.login');
        }

        if ($email === config('app.admin_fallback_email')) {
            return $next($request);
        }

        $user = User::where('email', $email)->first();

        if (! $user || (! $user->is_admin && $user->email !== config('app.admin_email'))) {
            session()->forget([
                'user_login',
                'user_email',
                'admin_login',
                'admin_email',
            ]);

            return redirect()->route('admin.login');
        }

        return $next($request);
    }
}
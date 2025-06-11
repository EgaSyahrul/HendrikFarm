<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next, ...$roles)
    {
        $user = Auth::user();

        // Jika pengguna belum login
        if (!$user) {
            return redirect()
                ->route('Overview.index') // Ganti dengan route landing page kamu
                ->with('loginRequired', true) // Kirim variabel untuk membuka modal
                ->with('message', 'Anda belum login'); // Kirim pesan peringatan
        }

        // Jika pengguna tidak memiliki peran yang sesuai
        if (!in_array($user->role, $roles)) {
            abort(403, 'Unauthorized.');
        }

        return $next($request);
    }
}

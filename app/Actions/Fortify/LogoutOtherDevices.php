<?php

namespace App\Actions\Fortify;

use Illuminate\Support\Facades\Auth;

class LogoutOtherDevices
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  callable  $next
     * @return mixed
     */
    public function handle($request, $next)
    {
        // logout other devices
        Auth::logoutOtherDevices($request->password);
        return $next($request);
    }
}
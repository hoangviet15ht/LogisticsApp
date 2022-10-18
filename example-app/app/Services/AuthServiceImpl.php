<?php

namespace App\Services;

use App\Services\Interfaces\AuthService;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthServiceImpl extends BaseServiceImpl implements AuthService
{
    use ThrottlesLogins;

    /**
     * attemp
     *
     * @param Request $request
     * @return
     */
    public function attemp(array $credentials, Request $request)
    {
        if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }

        if (Auth::attempt($credentials, $request->input('remember'))) {
            return Auth::user();
        }

        $this->incrementLoginAttempts($request);

        throw ValidationException::withMessages([
            $this->username() => [trans('auth.failed')],
        ]);
    }

    protected function username()
    {
        return 'email';
    }
}

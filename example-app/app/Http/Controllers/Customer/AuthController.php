<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Services\Interfaces\AuthService;
use Exception;
use Illuminate\Support\Facades\Auth;

class AuthController extends BaseController
{
    protected $authService;

    public function __construct(AuthService $authService)
    {
        parent::__construct();

        $this->middleware('guest:'.$this->appDomain)->except(['logout']);

        $this->authService = $authService;
    }

    /**
     * Show login form
     *
     * @return View
     */
    public function showLoginView()
    {
        return $this->pageView('auth.login');
    }

    /**
     * handle login for admin user
     *
     * @param LoginRequest $request
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse|Throwable
     */
    public function login(LoginRequest $request)
    {
        $crendtials = $request->safe()->toArray();
        $authUser = $this->authService->attemp($crendtials, $request);

        if ($authUser) {
            return $this->redirectTo('dashboard');
        }

        throw new Exception(trans('auth.failed'));
    }

    /**
     * handle logout
     *
     * @param Request $request
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse|Throwable
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();

        return $this->redirectTo('login');
    }
}

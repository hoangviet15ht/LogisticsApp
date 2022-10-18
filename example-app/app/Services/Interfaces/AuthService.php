<?php

namespace App\Services\Interfaces;

use Illuminate\Http\Request;
use Throwable;

interface AuthService
{
    /**
     * attemp user
     *
     * @param Request $request
     * @return Response|Throwable
     */
    public function attemp(array $credentials, Request $request);
}

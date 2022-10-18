<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BaseController extends Controller
{
    protected $appDomain = DOMAIN_CUSTOMER;

    public function __construct()
    {
        // check middleware here
    }
}

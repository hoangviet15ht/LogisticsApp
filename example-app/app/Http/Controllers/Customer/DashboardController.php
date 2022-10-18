<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends BaseController
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * return view dashboard of admin
     *
     * @return void
     */
    public function index()
    {
        return $this->pageView('dashboard.index');
    }
}

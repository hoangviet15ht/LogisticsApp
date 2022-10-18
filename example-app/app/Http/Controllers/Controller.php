<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected $appDomain = null;

    /**
     * only can redirect to other in routes depends on logged user role
     *
     * @param string $routeName
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function redirectTo(string $routeName)
    {
        return redirect()->route($this->appDomain.'.'.$routeName);
    }

    /**
     * Get the evaluated view contents for the given view.of pages for admin
     *
     * @param string $viewName
     * @param array $data
     * @param array $mergeData
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function pageView(string $viewName, $data = [], $mergeData = [])
    {
        return view('pages.'.$this->appDomain.'.'.$viewName, $data, $mergeData);
    }
}

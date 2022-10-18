<?php

namespace App\Providers;

use App\Services;
use App\Services\Interfaces;
use App\Supports\Helper;
use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\ServiceProvider;
use Yajra\DataTables\DataTables;

class AppServiceProvider extends ServiceProvider
{
    protected $serviceBindings = [
        Interfaces\BaseService::class => Services\BaseServiceImpl::class,
        Interfaces\AuthService::class => Services\AuthServiceImpl::class,
    ];

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->registerServices();
    }

    /**
     * Register binding services
     *
     * @return void
     */
    protected function registerServices()
    {
        if (! empty($this->serviceBindings)) {
            foreach ($this->serviceBindings as $interface => $handler) {
                $this->app->bind($interface, $handler);
            }
        }
    }

    protected function loadHelpers()
    {
        require_once __DIR__.'/../Supports/Constants.php';
    }

    protected function handlePaginationDatatables()
    {
        DataTables::macro('paginate', function ($source) {
            $instance = DataTables::make($source->items());
            $instance->setTotalRecords($source->total())
                ->setFilteredRecords($source->total());

            return $instance;
        });
    }

    protected function loadFacades()
    {
        $aliasLoader = AliasLoader::getInstance();
        $aliasLoader->alias('AppHelper', Helper::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadHelpers();
        $this->loadFacades();
        $this->handlePaginationDatatables();
    }
}

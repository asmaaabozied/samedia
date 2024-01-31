<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{

    protected $dashboard_namespace = 'App\Http\Controllers\Dashboard';

    /**
     * The path to the "home" route for your application.
     *
     * @var string
     */
    public const HOME = 'dashboard/home';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        //

        parent::boot();
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapApiRoutes();

        $this->mapWebRoutes();

        $this->mapDashboardRoutes();

        $this->mapInvRoutes();
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        Route::middleware('web')
            ->group(base_path('routes/web.php'));
    }
    protected function mapInvRoutes()
    {
        Route::middleware('web')
            ->group(base_path('routes/invest/web.php'));
    }


    protected function mapDashboardRoutes()
    {
        Route::middleware('web')
            ->group(base_path('routes/dashboard/web.php'));
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        Route::prefix('api/v1')
            ->middleware('api')
            ->group(base_path('routes/api/v1/api.php'));
    }


}

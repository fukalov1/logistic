<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to the "home" route for your application.
     *
     * Typically, users are redirected here after authentication.
     *
     * @var string
     */
    public const HOME = '/home';

    /**
     * Define your route model bindings, pattern filters, and other route configuration.
     */
    public function boot(): void
    {
        $this->configureRateLimiting();

        $this->routes(function () {
            Route::middleware('api')
                ->prefix('api')
                ->group(base_path('routes/api.php'));

            Route::middleware('web')
                ->group(base_path('routes/web.php'));
        });
    }


    public function map(Router $router)
    {
        $this->mapApiRoutes();
        $this->mapWebRoutes();

            $router->group(['middleware' => ['web']], function ($router) {
                $pages = Page::all();
                foreach ($pages as $page) {
                    $router->get($page->url,
                        [
                            'as' => $page->route_name, function () use ($page, $router) {
                            return $this->app->call('App\Http\Controllers\PageController@show',
                                [
                                    'page' => $page,
                                    'parameters' => $router->current()->parameters
                                ]);
                        }]);
                }
            });
    }

    /**
     * Configure the rate limiters for the application.
     */
    protected function configureRateLimiting(): void
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
        });
    }
}

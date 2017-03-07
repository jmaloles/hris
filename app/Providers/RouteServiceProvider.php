<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use App\Memorandum;

use App\Announcement;
use App\Training;
use App\Attendance;
use App\Exam;
use App\Interview;


class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        //

        parent::boot();
        Route::bind('memorandum', function ($value) { return Memorandum::where('id', $value)->first(); });
        Route::bind('announcement', function ($value) { return Announcement::where('id', $value)->first(); });
        Route::bind('exam', function ($value) { return Exam::where('id', $value)->first(); });
        Route::bind('training', function ($value) { return Training::where('id', $value)->first(); });
        Route::bind('attendance', function ($value) { return Attendance::where('id', $value)->first(); });
        Route::bind('interview', function ($value) { return Interview::where('id', $value)->first(); });
        Route::bind('memorandum', function ($value) { return memorandum::where('id', $value)->first(); });
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

        //
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
             ->namespace($this->namespace)
             ->group(base_path('routes/web.php'));
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
        Route::prefix('api')
             ->middleware('api')
             ->namespace($this->namespace)
             ->group(base_path('routes/api.php'));
    }
}

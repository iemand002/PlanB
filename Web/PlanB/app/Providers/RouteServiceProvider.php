<?php

namespace App\Providers;

use App\Milestone;
use App\Project;
use App\Thema;
use App\User;
use App\Vraag;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Routing\Router;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Request;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to the controller routes in your routes file.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @param  \Illuminate\Routing\Router $router
     * @return void
     */
    public function boot(Router $router)
    {
        parent::boot($router);

        $router->bind('projectPublic', function ($slug)  {
            return Project::where('slug', $slug)->published()->firstOrFail();
        });
        $router->bind('project', function ($slug)  {
            return Project::where('slug', $slug)->first();
        });
        $router->bind('milestone', function ($slug) {
            return Milestone::where('slug', $slug)->first();
        });
        $router->bind('thema', function ($id) {
            return Thema::findOrFail($id);
        });
        $router->bind('user', function ($id) {
            return User::find($id);
        });
        $router->bind('vraag', function ($id) {
            return Vraag::find($id);
        });
    }

    /**
     * Define the routes for the application.
     *
     * @param  \Illuminate\Routing\Router $router
     * @return void
     */
    public function map(Router $router)
    {
        $router->group(['namespace' => $this->namespace], function ($router) {
            require app_path('Http/routes.php');
        });
    }
}

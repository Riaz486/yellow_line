<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use DB;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot() {
        View::composer('*', function ($view) {
            $publicMessageData = DB::table('public_message')->get();
            $projectsData      = DB::table('projects')->get();
            

            $view->with([
                'publicMessageData' => $publicMessageData,
                'projectsData'      => $projectsData
            ]);
        });
    }
}

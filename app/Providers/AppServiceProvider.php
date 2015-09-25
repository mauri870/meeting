<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Admin\Entities\Gallery;
use Modules\Admin\Entities\BackgroundImage;
use Modules\Admin\Entities\Offer;
use Modules\Admin\Entities\Portfolio;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->share('app',[
            'name'=> env('APP_NAME',null),
            'version'=> env('APP_VERSION',null)
        ]);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}

<?php

namespace App\Providers;
use App\Models\Service;
use App\Models\Industry;
use View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;


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
    public function boot()
    {
        Schema::defaultStringLength(191);
        View::composer('*', function($view)
        {
            $service_navitem= Service::all();
            $view->with('service_navitem', $service_navitem);

            $service_navitem2= Service::take(6)->get();
            $view->with('service_navitem2', $service_navitem2);

            $industry_navitem= Industry::all();
            $view->with('industry_navitem', $industry_navitem);

            $industry_navitem2= Industry::take(6)->get();
            $view->with('industry_navitem2', $industry_navitem2);


        });
        //
    }
}

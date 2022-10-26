<?php

namespace Artcrud_mongodb\Frameworks\Illuminate;

use Artcrud_mongodb\Commands\CreateTable;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider as Base;

/**
 * Class ServiceProvider
 * @package PrizyvaNet\Vault\Frameworks\Illuminate
 */
class ServiceProvider extends Base
{
    public function register()
    {

    }

    public function boot(){


        $this->loadRoutesFrom(__DIR__.'/../../routes/artcrud_mg.php');
        $this->loadViewsFrom(__DIR__.'/../../resources/views', 'artcrud_mg');


        $this->publishes([
            __DIR__.'/../../resources/public' => public_path('vendor/artcrud_mg'),
        ], 'artcrud_mg');

        $this->publishes([
            __DIR__.'/../../resources/views' => resource_path('views/vendor/artcrud_mg'),
        ],"artcrud_mg");

        $this->publishes([
            __DIR__.'/../../config/artcrud_mg.php' => config_path('artcrud_mg.php'),
        ],"artcrud_mg");

        if ($this->app->runningInConsole()) {
            $this->commands([
                CreateTable::class,
            ]);
        }
    }

}

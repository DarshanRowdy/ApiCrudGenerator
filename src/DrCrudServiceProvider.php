<?php

namespace DevDr\ApiCrudGenerator;

use DevDr\ApiCrudGenerator\src\Commands\CrudGenerator;
use Illuminate\Support\ServiceProvider;

class DrCrudServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->commands([
            CrudGenerator::class,
        ]);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {

    }
}

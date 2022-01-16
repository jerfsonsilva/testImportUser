<?php

namespace App\Providers\People;

use App\Http\Repositories\PeopleRepository;
use App\Repositories\Interfaces\PeopleRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class PeopleProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(
            PeopleRepositoryInterface::class,
            PeopleRepository::class
        );
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}

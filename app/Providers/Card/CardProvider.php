<?php

namespace App\Providers\Card;

use App\Repositories\CreditCardRepository;
use App\Repositories\Interfaces\CreditCardRepositoryInteface;
use Illuminate\Support\ServiceProvider;

class CardProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(
            CreditCardRepositoryInteface::class,
            CreditCardRepository::class
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

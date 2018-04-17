<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
		// Dit is zeg maar een dingetje met deze versie van MySQL, heb ik zelf ook op mijn PC.
		// Dit zal je dus in al jouw laravel projecten moeten aanpassen, 2x loop je tegen dit probleem aan, daarna weet je 't uit je hoofd haha
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

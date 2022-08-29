<?php

namespace App\Providers\CoolWord;

use CoolWord\Domain\CoolWord\CoolWordRepository;
use CoolWord\Infra\CoolWord\EloquentCoolWord;
use Illuminate\Support\ServiceProvider;

class CoolWordServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(CoolWordRepository::class, EloquentCoolWord::class);
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

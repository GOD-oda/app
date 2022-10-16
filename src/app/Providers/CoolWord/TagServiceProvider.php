<?php

namespace App\Providers\CoolWord;

use CoolWord\Domain\CoolWord\TagRepository;
use CoolWord\Infra\CoolWord\EloquentTag;
use Illuminate\Support\ServiceProvider;

class TagServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(TagRepository::class, EloquentTag::class);
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

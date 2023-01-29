<?php

namespace App\Providers;

use App\Services\Wiktionary\ExtractingTextService;
use App\Services\Wiktionary\WordParsingService;
use Illuminate\Support\ServiceProvider;

class WiktionaryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(WordParsingService::class, function($app){
            return new WordParsingService();
        });

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

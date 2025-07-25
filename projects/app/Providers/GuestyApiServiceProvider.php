<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Helper\GuestyApi;

/**
 * Class GuestyApiServiceProvider
 * @package App\Providers
 */
class GuestyApiServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('GuestyApi', function()
        {
            return new GuestyApi;
        });
    }
}

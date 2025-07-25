<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Helper\HospitableApi;

/**
 * Class GuestyApiServiceProvider
 * @package App\Providers
 */
class HospitableApiServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('HospitableApi', function()
        {
            return new HospitableApi;
        });
    }
}

<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * Class GuestyApi
 * @package App\Facades
 */
class GuestyApi extends Facade
{
    /**
     * Create the Facade
     *
     * @return string
     */
    protected static function getFacadeAccessor() { return 'GuestyApi'; }
}
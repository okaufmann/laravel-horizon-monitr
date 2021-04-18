<?php

namespace Okaufmann\LaravelHorizonMonitr;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Okaufmann\LaravelHorizonMonitr\LaravelHorizonMonitr
 */
class HorizonMonitrFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'laravel-horizon-monitr';
    }
}

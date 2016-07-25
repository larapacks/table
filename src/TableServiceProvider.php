<?php

namespace Larapacks\Table;

use Illuminate\Support\ServiceProvider;

class TableServiceProvider extends ServiceProvider
{
    /**
     * Register the service provider.
     */
    public function register()
    {
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'table');
    }
}

<?php

namespace Fairhypo\Agrostatic;

use Illuminate\Support\ServiceProvider;

class AgroservicesServiceProvider extends ServiceProvider
{
    public function boot()
    {

    }

    public function register()
    {
        require_once __DIR__ . '/../helpers/Services.php';
        
    }
}
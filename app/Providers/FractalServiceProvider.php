<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class FractalServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(\League\Fractal\Manager::class, function($app)
        {
            $fractal = new \League\Fractal\Manager;

            $serializer = new \App\Api\V1\Serializer\CustomArraySerializer();

            $fractal->setSerializer($serializer);

            return $fractal;
        });

        $this->app->bind(\Dingo\Api\Transformer\Adapter\Fractal::class, function($app)
        {
            $fractal = $app->make(\League\Fractal\Manager::class);

            return new \Dingo\Api\Transformer\Adapter\Fractal($fractal);
        });
    }
}
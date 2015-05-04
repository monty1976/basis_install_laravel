<?php

namespace App;

use Illuminate\Support\ServiceProvider;

class DependencyResolver extends ServiceProvider{

    public function register() {
        $this->app->bind('App\Activity\ActivityRepositoryInterface', 'App\Activity\ActivityRepository');
        $this->app->bind('App\User\UserRepositoryInterface', 'App\User\UserRepository');
        $this->app->bind('App\Nursery\NurseryRepositoryInterface', 'App\Nursery\NurseryRepository');
    }
}


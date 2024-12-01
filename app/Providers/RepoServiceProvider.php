<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepoServiceProvider extends ServiceProvider
{

    public function register()
    {
        $this->app->bind(\App\Repositories\SubjectRepositoryInterface::class, \App\Repositories\SubjectRepository::class);
    }
}

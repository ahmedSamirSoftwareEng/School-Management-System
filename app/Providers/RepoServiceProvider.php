<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepoServiceProvider extends ServiceProvider
{

    public function register()
    {
        $this->app->bind(\App\Repositories\SubjectRepositoryInterface::class, \App\Repositories\SubjectRepository::class);
        $this->app->bind(\App\Repositories\QuizzRepositoryInterface::class, \App\Repositories\QuizzRepository::class);
        $this->app->bind(\App\Repositories\QuestionRepositoryInterface::class, \App\Repositories\QuestionRepository::class);
        $this->app->bind(\App\Repositories\LibraryRepositoryInterface::class, \App\Repositories\LibraryRepository::class);
    }
}

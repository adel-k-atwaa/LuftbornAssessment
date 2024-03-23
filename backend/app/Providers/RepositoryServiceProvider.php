<?php

namespace App\Providers;

use App\Repository\Authentication\AuthenticationRepo;
use App\Repository\Authentication\IAuthenticationRepo;
use App\Repository\Task\ITaskRepo;
use App\Repository\Task\TaskRepo;
use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        App::bind(IAuthenticationRepo::class,AuthenticationRepo::class);
        App::bind(ITaskRepo::class,TaskRepo::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}

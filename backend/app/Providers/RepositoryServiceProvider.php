<?php

namespace App\Providers;

use App\Repository\Authentication\AuthenticationRepo;
use App\Repository\Authentication\IAuthenticationRepo;
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

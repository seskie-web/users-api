<?php

namespace App\Providers;

use App\Models\Author;
use App\Repositories\AuthorRepository;
use Illuminate\Support\ServiceProvider;
use App\Interfaces\AuthorRepositoryInterface;

class AuthorServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton(AuthorRepositoryInterface::class, function () {
            return new AuthorRepository(new Author());
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}

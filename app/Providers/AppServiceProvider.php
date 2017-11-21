<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->registerRepositories();
    }


    protected function registerRepositories()
    {
        /**
         * ArticleRepository
         */
        $this->app->bind(
            \App\Contracts\ArticleRepositoryContract::class,
            \App\Repositories\ArticleRepository::class
        );

        /**
         * CategoryRepository
         */
        $this->app->bind(
            \App\Contracts\CategoryRepositoryContract::class,
            \App\Repositories\CategoryRepository::class
        );

        /**
         * DiscussionRepository
         */
        $this->app->bind(
            \App\Contracts\DiscussionRepositoryContract::class,
            \App\Repositories\DiscussionRepository::class
        );

        /**
         * TagRepository
         */
        $this->app->bind(
            \App\Contracts\TagRepositoryContract::class,
            \App\Repositories\TagRepository::class
        );
    }
}

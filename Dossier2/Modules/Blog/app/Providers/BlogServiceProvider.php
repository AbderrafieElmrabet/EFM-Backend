<?php

namespace Modules\Blog\app\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use Modules\Blog\app\Policies\ArticlePolicy;
use Modules\Blog\Models\Product;

class BlogServiceProvider extends ServiceProvider
{
    public function boot()
    {
        // Gate::policy(Product::class, ArticlePolicy::class);

        // Load module routes
        $this->loadRoutesFrom(__DIR__ . '/../../Routes/web.php');

        // Load module migrations
        $this->loadMigrationsFrom(__DIR__ . '/../../Database/migrations');

        // Load module views
        $this->loadViewsFrom(__DIR__ . '/../../Resources/views', 'Blog');

        $this->publishes([
            __DIR__ . '/../../Resources/views' => resource_path('views/vendor/Blog'),
        ], 'Blog-views');
    }

    public function register()
    {
        // You can bind services here if needed
    }
}
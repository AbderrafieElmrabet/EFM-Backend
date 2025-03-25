<?php

namespace App\Providers;

use App\Models\Product;
use Modules\Blog\app\Providers\BlogServiceProvider;
use Illuminate\Support\ServiceProvider;
use App\Policies\ArticlePolicy;
use Modules\Blog\app\Repositories\Repository;
use Modules\Blog\app\Repositories\ProductRepositoryInterface;
use Illuminate\Support\Facades\Gate;

class AppServiceProvider extends ServiceProvider
{
    protected $policies = [
        Product::class => ArticlePolicy::class,
    ];
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
        $this->app->bind(ProductRepositoryInterface::class, Repository::class);
        $this->app->register(BlogServiceProvider::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Gate::policy(Product::class, ArticlePolicy::class);
    }
}

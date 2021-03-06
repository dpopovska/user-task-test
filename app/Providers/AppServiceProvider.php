<?php

namespace App\Providers;

use App\Repositories\Task\EloquentTask;
use App\Repositories\Task\TaskRepository;
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
        $this->app->singleton(TaskRepository::class, EloquentTask::class);
    }
}

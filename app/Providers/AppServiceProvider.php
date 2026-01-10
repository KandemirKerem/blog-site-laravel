<?php

namespace App\Providers;
use Illuminate\Support\Facades\Route;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {

\Livewire\Livewire::setUpdateRoute(function ($handle) {
        return Route::post('/livewire/update', $handle)
            ->middleware(['web']); // Şimdilik localization'ı buradan çıkar
    });

        Model::preventLazyLoading();

        Gate::define('crud-post', function (User $user , Post $post) {
            return $post->user->is($user);
        });

    }
}

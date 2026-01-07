<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Controller;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;

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
        Route::macro('multirole', function ($uri, $actions) {
            return Route::get($uri, function (...$parameters) use ($actions) {
                $user = Auth::user();

                foreach ($actions as $role => $controllerAction) {
                    // Cek apakah user punya role tersebut
                    // Pastikan logic $user->hasRole() sesuai dengan sistem role kamu
                    if ($user->hasRole($role)) { 
                        // Panggil Controller & Method yang sesuai
                        return app()->call($controllerAction[0] . '@' . $controllerAction[1], $parameters);
                    }
                }

                abort(403, 'Unauthorized');
            });
        });
        View::composer('*', function ($view) {
            $companyName = null;
            if (Auth::check()) {
                $user = Auth::user();
                $role = $user->role;
                $photoUrl = $user ? $user->photo_url : '';
                $view->with('photoUrl', $photoUrl);
                if ($role === "Seller") {
                    $companyName = $user->seller?->company_name;
                    $badgeLevel  = $user->seller?->badge?->badge_name;
                    $badgeStyle = $user->seller?->badge?->badge_style;
                    $view->with('badgeLevel', $badgeLevel);
                    $view->with('badgeStyle', $badgeStyle);
                    $view->with('companyName', $companyName);
                } 
                if ($role === "Buyer") {
                    $companyName = $user->buyer?->company_name;
                    $view->with('companyName', $companyName);
                }
            }
        });
    }
}

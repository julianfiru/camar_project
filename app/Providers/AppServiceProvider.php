<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Controller;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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
            $displayName = null;
            $photoUrl = asset('urlProfil/User1.gif');
            $roleLabel = null;
            $roleSlug = null;

            if (Auth::check()) {
                $user = Auth::user();
                $role = $user->role ?? '';
                $roleSlug = strtolower($role);

                // role label mapping (short)
                switch ($roleSlug) {
                    case 'buyer':
                        $roleLabel = 'Buyer';
                        break;
                    case 'seller':
                        $roleLabel = 'Seller';
                        break;
                    case 'admin':
                        $roleLabel = 'Admin';
                        break;
                    case 'auditor':
                        $roleLabel = 'Auditor';
                        break;
                    default:
                        $roleLabel = ucfirst($roleSlug ?: 'User');
                }

                // Resolve photo url and make it an absolute HTTP(S) URL where possible.
                $rawPhoto = $user->photo_url ?? '';
                $photoUrl = asset('urlProfil/User1.gif'); // default absolute URL
                if (!empty($rawPhoto)) {
                    // If absolute URL already, use it
                    if (str_starts_with($rawPhoto, 'http://') || str_starts_with($rawPhoto, 'https://')) {
                        $photoUrl = $rawPhoto;
                    } else {
                        // If stored in storage/app/public
                        if (Storage::disk('public')->exists($rawPhoto)) {
                            $photoUrl = asset(ltrim(Storage::url($rawPhoto), '/'));
                        } elseif (file_exists(public_path($rawPhoto))) {
                            // file stored directly in public folder (e.g., public/urlProfil/...)
                            $photoUrl = asset($rawPhoto);
                        } elseif (str_starts_with($rawPhoto, '/')) {
                            // leading slash path
                            $photoUrl = asset(ltrim($rawPhoto, '/'));
                        } else {
                            // treat as relative path inside public
                            $photoUrl = asset($rawPhoto);
                        }
                    }
                }

                \Log::debug('Resolved photoUrl for user', ['raw' => $rawPhoto, 'resolved' => $photoUrl]);

                // company / display name
                if ($roleSlug === 'seller') {
                    $companyName = $user->seller?->company_name;
                } elseif ($roleSlug === 'buyer') {
                    $companyName = $user->buyer?->company_name;
                }

                $displayName = $companyName ?: explode('@', $user->email)[0];

                // seller badge info
                if ($roleSlug === 'seller') {
                    $badgeLevel  = $user->seller?->badge?->badge_name;
                    $badgeStyle = $user->seller?->badge?->badge_style;
                    $view->with('badgeLevel', $badgeLevel);
                    $view->with('badgeStyle', $badgeStyle);
                }
            }

            $view->with('companyName', $companyName);
            $view->with('displayName', $displayName);
            $view->with('photoUrl', $photoUrl);
            $view->with('roleLabel', $roleLabel);
            $view->with('roleSlug', $roleSlug);
        });
    }
}

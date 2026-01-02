<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\View;
use Filament\Auth\Http\Responses\Contracts\LoginResponse;
use App\Http\Responses\LoginResponse as CustomLoginResponse;
use App\Services\InternService;
use App\Services\ProjectService;
use App\Services\SuggestionService;

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
        $this->app->bind(LoginResponse::class, CustomLoginResponse::class);

        Response::macro('success', function ($data = null, $message = 'Success', $code = 200) {
            return response()->json([
                'success' => true,
                'message' => $message,
                'data' => $data,
            ], $code);
        });

        Response::macro('error', function ($message = 'Error', $code = 400, $errors = null) {
            return response()->json([
                'success' => false,
                'message' => $message,
                'errors' => $errors,
            ], $code);
        });

        // Share footer stats with footer component
        View::composer('components.footer', function ($view) {
            $view->with([
                'totalInterns' => app(InternService::class)->count(),
                'totalProjects' => app(ProjectService::class)->count(),
                'totalSuggestions' => app(SuggestionService::class)->count(),
            ]);
        });
    }
}

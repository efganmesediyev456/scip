<?php

namespace App\Providers;

use App\Http\Controllers\LanguageController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RouteController;
use App\Http\Controllers\SitemapController;
use App\Services\Payment\PaymentHandler;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to the "home" route for your application.
     *
     * This is used by Laravel authentication to redirect users after login.
     *
     * @var string
     */
    public const HOME = '/';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        $this->configureRateLimiting();

        Route::pattern('id', '[0-9]+');

        $this->routes(function () {
            Route::middleware(['api'])->prefix('api')->group(base_path('routes/cms/auth.php'));
            Route::middleware(['api'])->prefix('api')->group(base_path('routes/cms/profile.php'));
            Route::middleware(['api'])->prefix('api')->group(base_path('routes/cms/file-manager.php'));
            Route::middleware(['api'])->prefix('api')->group(base_path('routes/cms/2fa.php'));
            Route::middleware(['api'])->prefix('api')->group(base_path('routes/cms/users.php'));
            Route::middleware(['api'])->prefix('api')->group(base_path('routes/cms/field.php'));
            Route::middleware(['api'])->prefix('api')->group(base_path('routes/cms/field-value.php'));
            Route::middleware(['api'])->prefix('api')->group(base_path('routes/cms/post.php'));
            Route::middleware(['api'])->prefix('api')->group(base_path('routes/cms/page.php'));
            Route::middleware(['api'])->prefix('api')->group(base_path('routes/cms/settings.php'));
            Route::middleware(['api'])->prefix('api')->group(base_path('routes/cms/redirect.php'));
            Route::middleware(['api'])->prefix('api')->group(base_path('routes/cms/form.php'));

            Route::view('{any?}', 'admin')
                ->where('any', '.*')
                ->middleware('web')
                ->prefix(config('admin.prefix'))
                ->domain(config('admin.subdomain'));

            Route::middleware('api')->prefix('api')->group(base_path('routes/api.php'));

            Route::get('sitemap.xml', SitemapController::class)->middleware('web');

            Route::middleware('web')->group(base_path('routes/web.php'));

            Route::get('/{slug?}', RouteController::class)->middleware('web')
                ->where('slug', '.*')->name('view');
        });
    }

    /**
     * Configure the rate limiters for the application.
     *
     * @return void
     */
    protected function configureRateLimiting()
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(100)->by($request->user()?->id ?: $request->ip());
        });

        RateLimiter::for('web', function (Request $request) {
            return Limit::perMinute(200)->by($request->ip());
        });
    }
}

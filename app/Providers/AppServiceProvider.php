<?php

namespace App\Providers;

use App\Contracts\CurrencyContract;
use App\Contracts\PaymentContract;
use App\Contracts\SmsContract;
use App\Services\Payment\FakeBankGateway;
use App\Services\Payment\KapitalBankGateway;
use App\Services\Payment\PashaBankGateway;
use App\Services\Payment\PaymentHandler;
use App\Services\Sms\LogSmsGateway;
use App\Services\Sms\PoctGoyerciniGateway;
use App\Services\Sms\SmsHandler;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // ignore deprecated function errors
        // added generally for debugbar
        if (config('debugbar.enabled')) {
            error_reporting(E_ALL & ~E_DEPRECATED);
        }

        // add query params to generated pagination links
        $this->app->resolving(Paginator::class, function ($paginator) {
            return $paginator->appends(Arr::except(request()->query(), $paginator->getPageName()));
        });

        // send all mails to debug email if debug mode enabled
        if (config('app.debug')) {
            Mail::alwaysTo(config('logging.debug.email'));
            Mail::alwaysReplyTo(config('logging.debug.email'));
        }

        // Disable lazy loading across our application on production.
        Model::preventLazyLoading(!app()->isProduction());

        // If mass assignment disabled
        if (Model::isUnguarded()) {
            // Enable all mass assignable restrictions.
            Model::reguard();
        }

        // Prevent polymorphic relationships from being
        // used without model mappings.
//        MorphTo::requireMorphMap();

        // Indicates that unvalidated array keys should be excluded,
        // even if the parent array was validated.
        Validator::excludeUnvalidatedArrayKeys();

        // Remove 'data' wrapper from resources
        JsonResource::withoutWrapping();
        ResourceCollection::withoutWrapping();

        // Hard define root url
        URL::forceRootUrl(config('app.url'));

        // Force HTTPS on all urls
        if (config('app.https_enabled')) {
            URL::forceScheme('https');
        }

        Collection::macro('paginate', function ($perPage, $total = null, $page = null, $pageName = 'page') {
            $page = $page ?: LengthAwarePaginator::resolveCurrentPage($pageName);

            return new LengthAwarePaginator(
                $this->forPage($page, $perPage)->values(),
                $total ?: $this->count(),
                $perPage,
                $page,
                [
                    'path' => LengthAwarePaginator::resolveCurrentPath(),
                    'pageName' => $pageName,
                ]
            );
        });

        $this->app->bind(PaymentContract::class, PaymentHandler::class);
        $this->app->bind(CurrencyContract::class, PaymentHandler::class);
        $this->app->bind(SmsContract::class, SmsHandler::class);

        $this->app->singleton(SmsHandler::class, function () {
            return new LogSmsGateway();
        });

        $this->app->singleton(PaymentHandler::class, function () {
            return new FakeBankGateway();
        });
    }
}

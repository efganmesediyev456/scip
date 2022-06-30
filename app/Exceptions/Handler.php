<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use PDOException;
use Psr\Log\LogLevel;
use Sentry\State\Scope;
use Throwable;
use Sentry;

class Handler extends ExceptionHandler
{
    /**
     * A list of exception types with their corresponding custom log levels.
     *
     * @var array<class-string<Throwable>, LogLevel::*>
     */
    protected $levels = [
        //
    ];

    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            if ($this->shouldReport($e) && app()->bound('sentry')) {
                // Add client's IP address on Sentry log
                Sentry::configureScope(function (Scope $scope): void {
                    $scope->setUser([
                        'ip_address' => request()->ip(),
                    ]);
                });

                // Send exception trace to Sentry
                app('sentry')->captureException($e);
            }
        });
    }

    public function render($request, Throwable $e)
    {
        if (!$this->shouldReturnJson($request, $e)) {
            return parent::render($request, $e);
        }

        $rendered = parent::render($request, $e);

        $responseBody['message'] = $e->getMessage() ?? "System error" ?? null;

        if ($e instanceof PDOException) {
            $responseCode = 500;
            if (app()->isProduction()) {
                $responseBody['message'] = 'Sensitive SQL Error';
            }
        } else {
            $responseCode = $e->getCode() !== 0 ? $e->getCode() : $rendered->getStatusCode();
        }

        http_response_code($responseCode);

        if (config('app.debug')) {
            $responseBody['locale'] = app()->getLocale();
            $responseBody['code'] = $responseCode;

            DB::disableQueryLog();

            $responseBody['trace'] = collect(array_key_exists('trace', $rendered->getOriginalContent())
                ? $rendered->getOriginalContent()['trace']
                : debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS))
                ->whereNotNull('file')
                ->reject(fn (array $trace) => Str::contains($trace['file'], 'vendor/'))
                ->reject(fn (array $trace) => Str::contains($trace['file'], 'Middleware/'))
                ->reject(fn (array $trace) => Str::contains($trace['file'], 'public/index.php'))
                ->map(fn (array $trace, $k) => Str::replace(base_path(), '', $trace['file'])
                    . " #{$trace['line']}: "
                    . (array_key_exists('class', $trace) ? $trace['class'] : "")
                    . (array_key_exists('type', $trace) ? $trace['type'] : "")
                    . "{$trace['function']}()")
                ->values()
                ->toArray();

            $responseBody['db'] = DB::getQueryLog();
            $responseBody['session'] = Session::all();

            $appDuration = number_format(microtime(true) - LARAVEL_START, 2);
            $dbDuration = collect(DB::getQueryLog())->sum('time');
            $totalDuration = number_format((float)$appDuration + $dbDuration, 2);

            header('Server-Timing: db;desc="Database";dur=' . $dbDuration . ', app;desc="App";dur=' . $appDuration . ', total;desc="Total";dur=' . $totalDuration);
        }

        $responseBody['event_id'] = (string) Sentry::getLastEventId();

        $jsonFlags = config('app.debug')
            ? JSON_OBJECT_AS_ARRAY | JSON_PRETTY_PRINT
            : JSON_OBJECT_AS_ARRAY;

        $responseBody['result'] = [];

        header('Content-Type: application/json');

        echo collect($responseBody)->sortKeys()->toJson($jsonFlags);
        die();
    }
}

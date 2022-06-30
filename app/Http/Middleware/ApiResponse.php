<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use PDOException;
use Sentry;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Throwable;

class ApiResponse
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return Response|RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        /** @var $response Response */
        $response = $next($request);

        if ($response instanceof BinaryFileResponse) {
            return $response;
        }

        $responseBody = [];

        $responseCode = $response->getStatusCode();

        $responseBody['message'] = $response->exception?->getMessage() ?? $response->statusText() ?? null;

        if ($response->exception && $response->exception instanceof ValidationException) {
            $responseBody['message'] = 'Some fields failed to validate.';
        }

        if ($response->exception && $response->exception->getCode()) {
            if ($response->exception instanceof PDOException) {
                $responseCode = 500;
                if (app()->isProduction()) {
                    $responseBody['message'] = 'Sensitive SQL Error';
                }
            } else {
                $responseCode = $response->exception->getCode();
            }
        }

        http_response_code($responseCode);

        $response->setStatusCode($responseCode);

        if (config('app.debug')) {
            $responseBody['locale'] = app()->getLocale();
            $responseBody['code'] = $responseCode;

            DB::disableQueryLog();

            if ($response->exception instanceof Throwable) {
                $responseBody['trace'] = collect(debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS))
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
            }

            $responseBody['db'] = DB::getQueryLog();
            $responseBody['session'] = Session::all();

            $appDuration = number_format(microtime(true) - LARAVEL_START, 2);
            $dbDuration = collect(DB::getQueryLog())->sum('time');
            $totalDuration = number_format((float)$appDuration + $dbDuration, 2);

            $response->withHeaders([
                'Server-Timing' => 'db;desc="Database";dur=' . $dbDuration . ', app;desc="App";dur=' . $appDuration . ', total;desc="Total";dur=' . $totalDuration
            ]);
        }

        if ($response->exception instanceof ValidationException) {
            $responseBody['errors'] = array_map(function ($error) {
                return $error[0];
            }, $response->exception->errors());
        }

        $content = collect(json_decode($response->getContent(), true));

        if ($response->isServerError()) {
            $responseBody['event_id'] = (string)Sentry::getLastEventId();
        }

        $jsonFlags = config('app.debug')
            ? JSON_OBJECT_AS_ARRAY | JSON_PRETTY_PRINT
            : JSON_OBJECT_AS_ARRAY;

        if ($content->has('message') && !$response->exception instanceof ValidationException) {
            $responseBody['message'] = $content->get('message');
        }

        $responseBody['result'] = $content->except(['errors', 'message'])->sortKeys()->toArray();

        $this->convertFieldsToString($responseBody);

        $response->withHeaders(['Content-Type' => 'application/json']);
        $response->setContent(collect($responseBody)->sortKeys()->toJson($jsonFlags));

        return $response;
    }

    public function convertFieldsToString(&$array, bool $ignoreBoolean = false)
    {
        foreach ($array as $index => &$field) {
            if (is_countable($field)) {
                $this->convertFieldsToString($field, $ignoreBoolean);
            }

            if (is_int($field)) {
                $field = (string)$field;
            }

            if (is_float($field)) {
                $field = (string)$field;
            }

            if (!$ignoreBoolean && is_bool($field)) {
                $field = $field ? "1" : "0";
            }

            if ($field === "") {
                $field = null;
            }
        }
    }
}

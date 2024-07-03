<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Support\Facades\Notification;
use App\Models\User;
use App\Exceptions\CriticalErrorException;
use Illuminate\Support\Facades\Log;
use Throwable;

class Handler extends ExceptionHandler
{
     /**
     * Report or log an exception.
     *
     * @param  \Throwable  $exception
     * @return void
     */
    public function report(Throwable $exception)
    {
        if ($exception instanceof CriticalErrorException) {
            // Log critical errors
            Log::critical($exception->getMessage(), ['exception' => $exception]);
        }

        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Throwable  $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Throwable $exception)
    {
        if ($exception instanceof CriticalErrorException) {
            return response()->view('errors.critical', ['exception' => $exception], 500);
        }

        return parent::render($request, $exception);
    }
}

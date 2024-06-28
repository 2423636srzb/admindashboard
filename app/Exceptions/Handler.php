<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Support\Facades\Notification;
use App\Models\User;
use App\Notifications\CriticalErrorNotification;
use Illuminate\Support\Facades\Log;
use Throwable;

class Handler extends ExceptionHandler
{
    // ...

    /**
     * Report or log an exception.
     *
     * @param  \Throwable  $exception
     * @return void
     *
     * @throws \Exception
     */
    public function report(Throwable $exception)
    {
        parent::report($exception);
        if ($this->shouldReport($exception)) {
            $this->notifyAdmins($exception);
        }
    }

    protected function notifyAdmins(Throwable $exception)
    {
        try {
            $adminUsers = User::role('Admin')->get();
           
            Notification::send($adminUsers, new CriticalErrorNotification($exception->getMessage()));
        } catch (Throwable $ex) {
            // If an error occurs while sending the notification, log it
            Log::error('Failed to send critical error notification: ' . $ex->getMessage());
        }
    }

    // ...
}

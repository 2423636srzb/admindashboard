<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Cache;

class PerformanceMetrics
{
    public function handle(Request $request, Closure $next)
    {
        // Enable query logging
        DB::enableQueryLog();

        // Start time
        $start = microtime(true);

        // Proceed with the request
        $response = $next($request);

        // End time
        $end = microtime(true);

        // Calculate the duration
        $duration = $end - $start;

        // Collect other metrics
        $queries = DB::getQueryLog();
        $memoryUsage = memory_get_usage();

        // Log or store the metrics
        Cache::put('last_request_metrics', [
            'duration' => $duration,
            'queries' => $queries,
            'memory_usage' => $memoryUsage,
            'timestamp' => now(),
        ], now()->addMinutes(5));

        return $response;
    }
}

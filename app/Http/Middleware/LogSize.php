<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class LogSize {
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     *
     * @return mixed
     */
    public function handle( Request $request, Closure $next ) {
        return $next( $request );
    }

    /**
     * After the request has finished, run this function
     *
     * @param $request
     * @param $response
     */
    public function terminate( $request, $response ) {
        \Log::info( $request->fullUrl(), [
            'size' => strlen( $response->content() ),
        ] );
    }
}

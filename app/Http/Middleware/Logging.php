<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Logging {
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     *
     * @return mixed
     */
    public function handle( Request $request, Closure $next ) {
        \Log::info( $request->fullUrl(), [
            'method' => $request->method(),
            'input'  => $request->all(),
        ] );

        return $next( $request );
    }
}
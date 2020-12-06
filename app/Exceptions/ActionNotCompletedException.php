<?php

namespace App\Exceptions;

use Exception;

class ActionNotCompletedException extends Exception {

    /**
     * Render an exception template
     *
     * @param $request
     *
     * @return \Illuminate\Http\Response
     */
    public function render( $request ) {
        return response()->view( 'no_method', [], 501 );
    }
}

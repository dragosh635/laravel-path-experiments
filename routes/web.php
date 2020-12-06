<?php

use Illuminate\Support\Facades\Route;
use App\Models\Team;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get( '/', function () {
    return view( 'welcome' );
} )->name( 'home' );

Auth::routes();

Route::get( '/home', [ App\Http\Controllers\HomeController::class, 'index' ] )->name( 'home' );

Route::group( [ 'prefix' => 'testing', 'middleware' => [ \App\Http\Middleware\LogTeam::class ] ], function () {
    Route::resource( 'teams', \App\Http\Controllers\Web\TeamController::class );
    Route::get( '/teams/{team}/title', function ( Team $team ) {
        return response()->jTitle( $team );
    } );

    Route::get( 'teams/{team}/activate', function () {
        return view( 'team/activate' );
    } )->name( 'activateTeam' )->middleware( 'signed' );

    Route::get( 'teams/{team}/points', [ \App\Http\Controllers\Web\TeamController::class, 'points' ] );
} );

Route::get( '/square/{number?}', function ( $number = 10 ) {
    return $number * $number;
} )->middleware( 'auth:email' );

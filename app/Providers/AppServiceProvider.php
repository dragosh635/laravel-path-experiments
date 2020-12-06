<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider {
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register() {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot() {
        Schema::defaultStringLength( 191 );

        /*
         * Custom blade directive
         */
        \Blade::directive( 'inputTextBox', function ( $field ) {
            return "<?php echo \App\InputBox::text($field); ?>";
        } );
        /**
         * View composer example
         */
//        \View::composer( '*', 'App\TeamPointsComposer' ); //cannot be overwritten at run time by a controller

        /**
         * View creator example
         */
        \View::creator( 'team/create', 'App\TeamPointsCreator' ); // can be overwritten at run time by a controller
    }
}

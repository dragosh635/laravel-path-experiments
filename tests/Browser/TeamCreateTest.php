<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class TeamCreateTest extends DuskTestCase {

    use DatabaseMigrations;

    /**
     * Test the create method
     * Insert title, click on Create, redirect to teams listing
     *
     * @return void
     */
    public function testCreatePass() {
        $this->browse( function ( Browser $browser ) {
            $browser->visit( '/testing/teams/create' )
                    ->type( 'title', 'SampleTeam' )
                    ->press( 'Create' )
                    ->assertPathIs( '/testing/teams' );
        } );
    }

    /**
     * If the create method fails redirect back
     *
     * @throws \Throwable
     */
    public function testCreateFail() {
        $this->browse( function ( Browser $browser ) {
            $browser->visit( '/testing/teams/create' )
                    ->type( 'title', '' )
                    ->press( 'Create' )
                    ->assertPathIs( '/testing/teams/create' );
        } );
    }
}

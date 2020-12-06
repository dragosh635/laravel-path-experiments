<?php

namespace App;

use App\Models\Team;
use App\Teams\Repository;
use Illuminate\View\View;

class TeamPointsCreator {
    public function __construct( Repository $teams ) {
        $this->teams = $teams;
    }

    /**
     * Create a blade view
     *
     * @param View $view
     */
    public function create( View $view ) {
        $view->with( 'points', $this->teams->points( Team::first() ) );
    }
}

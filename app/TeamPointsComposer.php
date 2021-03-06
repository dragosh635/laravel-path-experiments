<?php

namespace App;

use App\Models\Team;
use App\Teams\Repository;
use Illuminate\View\View;

class TeamPointsComposer {
    public function __construct( Repository $teams ) {
        $this->teams = $teams;
    }

    /**
     * Compose a view
     *
     * @param View $view
     */
    public function compose( View $view ) {
        $view->with( 'points', $this->teams->points( Team::first() ) );
    }
}

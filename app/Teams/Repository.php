<?php

namespace App\Teams;

use App\Models\Team;

class Repository {

    /**
     * Get points for a team using inner joins
     *
     * @param Team $team
     *
     * @return mixed
     */
    public function points( $team ) {
        $users = $team->where( 'teams.id', $team->id )
                      ->join( 'users', 'teams.id', '=', 'users.team_id' )
                      ->select( 'users.id' );

        return $team->where( 'teams.id', $team->id )
                    ->join( 'tickets', 'teams.id', '=', 'tickets.team_id' )
                    ->join( 'points', 'tickets.id', '=', 'points.ticket_id' )
                    ->whereIn( 'points.owner_id', $users )
                    ->sum( 'points.value' );
    }


}



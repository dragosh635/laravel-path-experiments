<?php

namespace App\Http\Controllers\Web;

use App\Exceptions\ActionNotCompletedException;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTeam;
use App\Models\Team;
use Illuminate\Http\Request;
use App\Teams\Repository;

class TeamController extends Controller {

    public function __construct( Repository $teams ) {
        $this->teams = $teams;
        $this->authorizeResource( Team::class, 'team' );
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        //prima echipa care are mai mult de 2 useri
//        return Team::all()->firstWhere( 'users_count', '>', 2 );

        // toate echipele care au mai multi de 2 useri
//        return Team::all()->filter( function ( $team ) {
//            return $team->users_count > 2;
//        } );

        // toate echipele care au mai putin de 2 useri
//        return Team::all()->reject( function ( $team ) {
//            return $team->users_count > 2;
//        } );

        // indexul primei echipe care are mai mult de 2 useri
//        return Team::all()->search( function ( $team ) {
//            return $team->users_count > 2;
//        } );

        //reverse items two by two from the collection
//        return Team::all()->chunk( 2 )->mapSpread( function ( $team1, $team2 ) {
//            return [ $team2, $team1 ];
//        } )->collapse();

        //Group the teams with the same number of users
//        return Team::all()->mapToGroups( function ( $team ) {
//            return [ $team->users_count => $team->id ];
//        } );

        //all the users associated with a team
//        return Team::all()->reduce( function ( $carry, $team ) {
//            return $carry + $team->users_count;
//        }, 10 );

        //all the users associated with a team
//        return Team::all()->sum('users_count');

        //average users associated with a team
//        return Team::all()->avg( 'users_count' );

        //shuffle collection
//        return Team::all()->shuffle();

        //sort by users count
//        return Team::all()->sortBy('users_count')->values();

        //return only two elements
//        return Team::all()->take( 2 );

        //get only the title
//        return Team::all()->pluck( 'title' );

        //transform the collection - all the titles are uppercase
//        return Team::all()->transform( function ( $team ) {
//            $team->title = strtoupper( $team->title );
//
//            return $team;
//        } );

//        $collection1 = Team::all();
//        $collection2 = $collection1->nth( 2 );

//        return $collection1->diff( $collection2 );

//        return $collection2->concat( $collection1 )->unique('created_at');

//        return Team::all()->each->forceFill( [ 'title' => 'each' ] );

        return Team::all()->map->getTable();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view( 'team.create' )->with( 'points', 5 );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store( StoreTeam $request ) {
        $team        = new Team();
        $team->title = $request->input( 'title' );
        $team->save();

        return redirect( '/testing/teams' );
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Team $team
     *
     * @return \Illuminate\Http\Response
     */
    public function show( Team $team ) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Team $team
     *
     * @return \Illuminate\Http\Response
     */
    public function edit( Team $team ) {
        throw new ActionNotCompletedException();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Team $team
     *
     * @return \Illuminate\Http\Response
     */
    public function update( Request $request, Team $team ) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Team $team
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy( Team $team ) {
        //
    }

    public function points( Team $team ) {
//        $this->authorize( 'view', $team );

        return response()->json( $this->teams->points( $team ) );
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Team extends Model {
    use HasFactory;

    /**
     * @var string[]
     */
    public $appends = [ 'users_count' ];

    /**
     * Mutators example
     *
     * @return int|mixed
     */
    public function getUsersCountAttribute() {
        return DB::table( 'users' )->where( 'users.team_id', $this->id )->sum( 'users.id' );
    }

    /**
     * Accessor example
     *
     * @param $value
     */
    public function setTitleAttribute( $value ) {
        $this->attributes['title'] = ucwords( $value );
    }

}

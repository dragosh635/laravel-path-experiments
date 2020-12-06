<?php

namespace App\Models;

use App\Scopes\PointScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Point extends Model {
    use HasFactory;

    /**
     *
     */
    protected static function boot() {
        parent::boot();

        /* Add a global scope for the point model */
        static::addGlobalScope( new PointScope() );
    }
}

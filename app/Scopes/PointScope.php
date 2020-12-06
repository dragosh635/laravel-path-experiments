<?php

namespace App\Scopes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

class PointScope implements Scope {

    /**
     * Define a custom scope for Point model
     *
     * @param Builder $builder
     * @param Model $model
     */
    public function apply( Builder $builder, Model $model ) {
        $builder->where( 'value', '!=', 16 );
    }
}

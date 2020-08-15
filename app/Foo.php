<?php

namespace App;

use FerFabricio\RestGetFilters\Filters\Comparison;
use FerFabricio\RestGetFilters\Filters\Date;
use FerFabricio\RestGetFilters\Filters\Like;
use FerFabricio\RestGetFilters\Traits\Filterable;
use Illuminate\Database\Eloquent\Model;

class Foo extends Model
{
    use Filterable;

    protected $fillable = [
        'name',
        'size',
    ];

    protected $filters = [
        'name' => Like::IDENTIFIER,
        'size' => Comparison::IDENTIFIER,
        'created_at' => Date::IDENTIFIER,
    ];
}

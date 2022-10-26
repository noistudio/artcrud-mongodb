<?php

namespace [name_space];

use Artcrud_mongodb\Traits\MongoIncrement;
use Jenssegers\Mongodb\Eloquent\Model;

class [class] extends Model
{
    use MongoIncrement;


    protected $collection = '[table]';
    protected $fillable = [
        [fillable]
        'created_at'
    ];




    //additional_methods//
}

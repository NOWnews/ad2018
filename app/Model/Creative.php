<?php

namespace AD2018\Model;

use Illuminate\Database\Eloquent\Model;

class Creative extends Model
{

    protected $fillable = [
        'type', 'title', 'image', 'link'
    ];
}

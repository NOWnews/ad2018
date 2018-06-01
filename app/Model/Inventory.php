<?php

namespace AD2018\Model;

use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{

    protected $fillable = [
        'type', 'size', 'name', 'desc'
    ];
}

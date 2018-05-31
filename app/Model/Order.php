<?php

namespace AD2018\Model;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

    protected $fillable = [
        'no', 'order_name', 'salesperson'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}

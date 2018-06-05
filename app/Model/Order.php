<?php

namespace AD2018\Model;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

    protected $fillable = [
        'no', 'name', 'salesperson'
    ];

    public function creative() {
        return $this->hasMany(Creative::class);
    }
}

<?php

namespace AD2018\Model;

use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{

    protected $fillable = [
        'type', 'size', 'name', 'desc'
    ];

    public function creatives() {
        return $this->hasMany(Creative::class);
    }

    public function queues() {
        return $this->hasManyThrough(Queue::class, Creative::class);
    }
}

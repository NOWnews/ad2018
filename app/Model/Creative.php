<?php

namespace AD2018\Model;

use Illuminate\Database\Eloquent\Model;

class Creative extends Model
{

    protected $fillable = [
        'type', 'title', 'image', 'link'
    ];

    public function inventory() {
        return $this->belongsTo(Inventory::class);
    }

    public function queues() {
        return $this->hasMany(Queue::class);
    }
}

<?php

namespace AD2018\Model;

use Illuminate\Database\Eloquent\Model;

class Queue extends Model
{

    protected $fillable = [
        'creative_id', 'start_time', 'end_time'
    ];

    public function creative() {
        return $this->belongsTo(Creative::class);
    }
}

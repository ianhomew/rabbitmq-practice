<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProducerConsumer extends Model
{
    protected $table = 'producer_and_consumer';
    protected $hidden = [];
    protected $fillable = [
        'data'
    ];
}

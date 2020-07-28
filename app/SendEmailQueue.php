<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SendEmailQueue extends Model
{
    protected $table = 'send_email_queues';
    protected $hidden = [];
    protected $fillable = [
        'send_to', 'content'
    ];
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    protected $table = 'post';
    protected $hidden = [];
    protected $fillable = [
        'title', 'author_id', 'content', 'description'
    ];

    public $timestamps = false;
}

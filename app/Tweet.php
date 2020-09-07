<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tweet extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'text',
        'total_comments',
        'user_id',
        'date',
        'likes',
        'total_retweets'
    ];
}

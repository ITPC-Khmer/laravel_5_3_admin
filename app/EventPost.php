<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventPost extends Model
{
    //
    protected $table = 'event_posts';
    protected $dates = ['created_at'];
}

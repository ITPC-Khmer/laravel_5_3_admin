<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostTagDetail extends Model
{
    //
    /*public function post()
    {
        return $this->belongsTo('App\Post','tag_id','id');
    }*/

    protected $table = 'post_tag_details';
    protected $primaryKey = 'post_id';

}

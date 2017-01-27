<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostCategoryDetail extends Model
{
    //
    public function post()
    {
        return $this->belongsTo('App\Post','post_id','id');
    }

    protected $table = 'post_category_details';
    protected $primaryKey = 'post_id';

}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function categories()
    {
        return $this->hasMany('App\PostCategoryDetail','post_id','id');
    }

    public function tags()
    {
        return $this->hasMany('App\PostTagDetail','post_id','id');
    }

    protected $table = 'posts';

}

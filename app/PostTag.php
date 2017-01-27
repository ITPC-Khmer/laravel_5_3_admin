<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostTag extends Model
{
    //
    protected $table = 'post_tags';

    static function drop_down_array()
    {
        $roles = PostTag::all();

        $arr = [];
        foreach ($roles as $row)
        {
            $arr[$row->id] = $row->title;
        }

        return $arr;

    }

}

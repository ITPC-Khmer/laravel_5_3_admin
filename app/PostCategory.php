<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostCategory extends Model
{
    //
    protected $table = 'post_categories';

    //
    static function drop_down_array($id = 0)
    {
        if($id == 0){
            $roles = PostCategory::all();
        }else{
            $roles = PostCategory::where('id','<>',$id)->get();
        }


        $arr = [];
        foreach ($roles as $row)
        {
            $arr[$row->id] = $row->title;
        }

        return $arr;

    }

}

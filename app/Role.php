<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    //
    static function drop_down_array()
    {
        $roles = Role::all();

        $arr = [];
        foreach ($roles as $row)
        {
            $arr[$row->id] = $row->title;
        }

        return $arr;

    }

}

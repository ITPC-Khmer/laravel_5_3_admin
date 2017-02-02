<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Faculty extends Model
{
    //
    protected $table = 'faculties';

    //
    static function get_faculty_list_front($id = 0,$parent_select = 0,$parent = 0,$level = 0)
    {
        if($id == 0){
            $faculty = Faculty::where('parent','=',$parent)->orderBy('id','asc')->get();
        }else{
            $faculty = Faculty::where('id','<>',$id)->where('parent','=',$parent)->orderBy('id','asc')->get();
        }

        $op = '<ul style="padding: 20px 7px !important;">';

        if(count($faculty) > 0)//if have data
        {
            foreach ($faculty as $row)// loop all parent
            {
                if($id == 0){
                    $faculty_sub = Faculty::where('parent','=',$row->id)->orderBy('id','asc')->get();
                }else{
                    $faculty_sub = Faculty::where('id','<>',$id)->where('parent','=',$row->id)->orderBy('id','asc')->get();
                }

                if(count($faculty_sub) > 0)// if have sub
                {
                    $op .= '<li><b>'.$row->title.'</b>';

                    foreach ($faculty_sub as $row_sub) {// loop all sub

                        $op .= '<br><span style="font-size: smaller;"><i class="fa fa-hand-o-right"></i>&nbsp;<a href="#">'.$row_sub->title.'</a></span>';

                        //array_push($rows,$row_sub);
                        //$op .= Faculty::get_faculty_list_front($id,$parent_select,$row_sub->id,$level+2);

                    }//
                    $op .= '</li>';
                }else{
                    $op .= '<li>'.$row->title.'</li>';
                }
                // $faculty_sub


            }// $faculty

        }// $faculty

        $op .= '</ul>';
        return $op;

    }

    //
    static function drop_down_array($id = 0,$parent_select = 0,$parent = 0,$level = 0)
    {
        if($id == 0){
            $faculty = Faculty::where('parent','=',$parent)->orderBy('id','asc')->get();
        }else{
            $faculty = Faculty::where('id','<>',$id)->where('parent','=',$parent)->orderBy('id','asc')->get();
        }

        $op = '';

        if($level == 0){
            $op = '<option value="0">&nbsp;</option>';
        }

        if(count($faculty) > 0)//if have data
        {
            foreach ($faculty as $row)// loop all parent
            {
                if($id == 0){
                    $faculty_sub = Faculty::where('parent','=',$row->id)->orderBy('id','asc')->get();
                }else{
                    $faculty_sub = Faculty::where('id','<>',$id)->where('parent','=',$row->id)->orderBy('id','asc')->get();
                }

                $op .= '<option '.($parent_select==$row->id?' selected="selected" ':'').' value="'.$row->id.'">'. nbs($level*5 + 1).$row->title.'</option>';

                if(count($faculty_sub) > 0)// if have sub
                {
                    foreach ($faculty_sub as $row_sub) {// loop all sub

                        $op .= '<option '.($parent_select==$row_sub->id?' selected="selected" ':'').' value="'.$row_sub->id.'">'. nbs(($level+1)*5 + 1).$row_sub->title.'</option>';

                        //array_push($rows,$row_sub);
                        $op .= Faculty::drop_down_array($id,$parent_select,$row_sub->id,$level+2);

                    }//
                }// $faculty_sub


            }// $faculty

        }// $faculty

        return $op;

    }

    static function get_all_faculty_list($parent = 0,$level = 0)
    {
        $faculty = Faculty::where('parent','=',$parent)->orderBy('id','asc')->get();

        $rows = array();
        if(count($faculty) > 0)//if have data
        {
            foreach ($faculty as $row)// loop all parent
            {
                $faculty_sub = Faculty::where('parent','=',$row->id)->orderBy('id','asc')->get();
                $row->title = nbs($level*5 + 1).$row->title;

                if(count($faculty_sub) > 0)// if have sub
                {
                    $rows[] = $row;
                    foreach ($faculty_sub as $row_sub) {// loop all sub

                        $faculty_sub2 = Faculty::where('parent','=',$row_sub->id)->orderBy('id','asc')->get();

                        $row_sub->title = nbs(($level+1)*5 + 1).$row_sub->title;
                        if(count($faculty_sub2) == 0)// if have sub
                        {
                            $row_sub->is_last = 1;
                        }

                        $rows[] = $row_sub;
                        //array_push($rows,$row_sub);
                        if(count($faculty_sub2) > 0) {
                            $arr_rows2 = Faculty::get_all_faculty_list($row_sub->id, $level + 2);
                            if (count($arr_rows2) > 0) $rows = array_merge($rows, $arr_rows2);
                        }

                    }//
                }else{
                    $row->is_last = 1;
                    $rows[] = $row;
                }// $faculty_sub


            }// $faculty

        }// $faculty

        return $rows;


    }


}

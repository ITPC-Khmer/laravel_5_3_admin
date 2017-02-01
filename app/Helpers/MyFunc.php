<?php
require_once ('str_highlight.php');

function highlight($text, $words) {

    if(trim($words) != '') {
        $w = preg_split('/\s+/', $words);//explode(' ', $words);
        return str_highlight($text, $w, null, '<b><span class="search-highlight">\1</span></b>');
    }else{
        return $text;
    }

}

function _t($txt)
{
    return \App\Helpers\Utility::translate($txt);
}

function nbs($n = 1)
{
    return str_repeat('&nbsp;', $n);
}

function paginate_limit()
{
    return 12;
}

function get_title_search($name='',$value='')
{
    return '<div class="input-group">
                <div class="input-icon"><i class="fa fa-question-circle"></i>
                    <input data-name="'.$name.'" value="'.$value.'" id="'.$name.'" class="head-search-input form-control '.$name.'" type="text" name="'.$name.'" placeholder="'.$name.'"> 
                </div>
                <span class="input-group-btn">
                    <button class="btn btn-success head-search-th" type="button"><i class="fa icon-magnifier"></i></button>
                </span>
            </div>';
}

function arr_lang()
{
    return [
        'en' => 'English',
        'kh' => 'ខ្មែរ',
       /* 'th' => 'ไทย',
        'ch' => '中国',
        'vn' => 'Việt'*/
    ];
}



function resize_img($image,$tmp = false)
{
    return \App\Helpers\MyImage::resize($image,$tmp);
}

function active_url($page,$active = 'active')
{
    //$path = app('request')->path();

    if(app('request')->fullUrl() == url($page))
        return $active;

    /*if (str_contains($path, $page))
        return $active;*/

    return '';
}

function image_lib_type()
{
    return [
        'slide' => 'Top Slide',
        'banner' => 'Banner'
    ];
}

function professors_type()
{
    return [
        'bachelor' => 'Bachelor degree',
        'masters' => 'Masters degree',
        'Doctorate' => 'Doctorate degree',
        'other' => 'Other',
    ];
}



function get_image_lib($image_lib_type)
{
    return \App\ImageLib::where('image_lib_type',$image_lib_type)->first();
}

function event_posts_type()
{
    return [
        'EVENTS-AND-TRAINING' => 'EVENTS AND TRAINING',
        'LATEST-NEWS' => 'LATEST NEWS'
    ];
}

function _tt($arr)
{
    $l = 'en';
    $t = '';
    try{
        if(isset($arr->$l)) $t = $arr->$l;

        if($t.'' == ''){
            if(isset($arr->en))
                $t = $arr->en;
        }
        return $t;
    }catch (Exception $e){ return ''; }

}
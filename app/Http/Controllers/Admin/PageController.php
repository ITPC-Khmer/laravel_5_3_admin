<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\ControllerAdmin;
use Illuminate\Http\Request;

use App\Page;

class PageController extends ControllerAdmin
{
    var $searchWords;
    var $k='';

    public function __construct()
    {
        //$this->middleware('auth');
    }

    public function index(Request $request)
    {
        $q['title'] = $request->input('title','');
        $q['description'] = $request->input('description','');

        $_page = Page::orderBy('pages.id','DESC');

        foreach ($q as $k=>$v)
        {
            $this->k = $k;
            $this->searchWords = preg_split('/\s+/', $v);// explode(' ', $v);

            $_page->where(function($w) {

                    foreach($this->searchWords as $word){
                        if(trim($word) != '') {
                            $w->orWhere($this->k , 'LIKE', '%' . $word . '%');
                        }
                    }

            });

        }

        $pages = $_page->paginate(paginate_limit());

        foreach ($q as $k=>$v)
        {
           if(trim($v) != '')
           {
               $pages->appends($k,$v);
           }
        }

        return view('backend.page.index',array_merge(['result' => $pages],$q));


    }

    function form(Request $request)
    {
        $id = $request->input('id',0) - 0 ;

        $row = null;
        if($id - 0 > 0)
        {
            $row = Page::find($id);
        }

        return view('backend.page.form',['row' => $row]);
    }

    public function upload(Request $request)
    {
        //== Upload Img ===================
        $image 	= 	$request->file('file');
        $filename = '#';
        if ($request->hasFile('file')) {
            $filename 	= 	resize_img($image,true);
        }

        return $filename;

    }

    public function remove_upload_tmp(Request $request)
    {
        $f = $request->input('f');
        try{
            unlink(public_path('_uploads'). '/'. $f);
            unlink(public_path('_uploads'). '/tmp1/'. $f);
            unlink(public_path('_uploads'). '/tmp2/'. $f);
        }catch(\Exception $e){ }

    }

    public function save(Request $request)
    {
        $id = $request->input('id',0) - 0 ;
        $image_url = $request->input('image_url');
        $_image_url = $request->input('_image_url');

        $titles = $request->input('title');
        $descriptions = $request->input('description');

        // validate input
        $error = array();
        if($titles){if(isset($titles['en'])){if( trim($titles['en']) == ''){
            $error[] = _t('title is require!!');
        }}}

        if($descriptions){if(isset($descriptions['en'])){if( trim($descriptions['en']) == ''){
            $error[] = _t('descriptions is require!!');
        }}}

        if(count($error) > 0)
        {
            // remove temp image
            if($image_url)
            {
                foreach ($image_url as $f)
                {

                    try{
                        unlink(public_path('_uploads'). '/'. $f);
                    }catch(\Exception $e){ }

                    try{
                        unlink(public_path('_uploads'). '/tmp1/'. $f);
                    }catch(\Exception $e){ }

                    try{
                        unlink(public_path('_uploads'). '/tmp2/'. $f);
                    }catch(\Exception $e){ }

                }
            }

            return redirect()->back()->withErrors($error);
        }
        // end validate input


        if($id > 0) //for update
        {
            $page = Page::find($id);
        }else{// for save
            $page = new Page();
            $page->view_count = 0;
            $page->user_create_id = 1;
        }

        $page->title = json_encode($titles);
        $page->description =  json_encode($descriptions);
        $page->content = json_encode($request->input('content'));
        $page->video_url =  json_encode($request->input('video_url'));
        $page->image_url = json_encode($request->input('image_url'));

        if($page->save()) {
            // move temp image to upload
            if ($image_url) {
                foreach ($image_url as $img) {
                    try {
                        rename(public_path("_uploads/{$img}"), public_path("uploads/{$img}"));
                    } catch (\Exception $e) {
                    }

                    try {
                        rename(public_path("_uploads/tmp1/{$img}"), public_path("uploads/tmp1/{$img}"));
                    } catch (\Exception $e) {
                    }

                    try {
                        rename(public_path("_uploads/tmp2/{$img}"), public_path("uploads/tmp2/{$img}"));
                    } catch (\Exception $e) {
                    }

                }
            }

            if ($id > 0){
                // move delete image
                if ($_image_url) {
                    foreach ($_image_url as $f) {

                        try {
                            unlink(public_path('uploads') . '/' . $f);
                        } catch (\Exception $e) {
                        }

                        try {
                            unlink(public_path('uploads') . '/tmp1/' . $f);
                        } catch (\Exception $e) {
                        }

                        try {
                            unlink(public_path('uploads') . '/tmp2/' . $f);
                        } catch (\Exception $e) {
                        }

                    }
                }
            }

            return redirect('cpanel/page');
        }else{

            // remove temp image
            if($image_url)
            {
                foreach ($image_url as $f)
                {

                    try{
                        unlink(public_path('_uploads'). '/'. $f);
                    }catch(\Exception $e){ }

                    try{
                        unlink(public_path('_uploads'). '/tmp1/'. $f);
                    }catch(\Exception $e){ }

                    try{
                        unlink(public_path('_uploads'). '/tmp2/'. $f);
                    }catch(\Exception $e){ }

                }
            }

            return redirect()->back()->withErrors([_t('save error!!')]);
        }


    }

    function delete(Request $request)
    {
        $id = $request->input('id',0) - 0 ;

        $page = Page::find($id);

        $affected = 0;
        if($page){
            json_decode(null);
            $_image_url = json_decode($page->image_url);

            if($page->delete()){

                if ($id > 0){
                    // move delete image
                    foreach ($_image_url as $f) {

                        try {
                            unlink(public_path('uploads') . '/' . $f);
                        } catch (\Exception $e) {
                        }

                        try {
                            unlink(public_path('uploads') . '/tmp1/' . $f);
                        } catch (\Exception $e) {
                        }

                        try {
                            unlink(public_path('uploads') . '/tmp2/' . $f);
                        } catch (\Exception $e) {
                        }

                    }

                }

                $affected = 1;
            }

        }

        return response()->json(['affected' => $affected]);

    }



}

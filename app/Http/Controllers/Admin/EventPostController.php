<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\ControllerAdmin;
use Illuminate\Http\Request;

use App\EventPost;

class EventPostController extends ControllerAdmin
{
    var $searchWords;
    var $k = '';

    public function __construct()
    {
        //$this->middleware('auth');
    }

    public function index(Request $request)
    {
        $q['title'] = $request->input('title','');
        $q['description'] = $request->input('description','');

        $_post = EventPost::orderBy('event_posts.id','DESC');

        foreach ($q as $k=>$v)
        {
            $this->k = $k;
            $this->searchWords = preg_split('/\s+/', $v);// explode(' ', $v);

            $_post->where(function($w) {

                    foreach($this->searchWords as $word){
                        if(trim($word) != '') {
                            $w->orWhere($this->k , 'LIKE', '%' . $word . '%');
                        }
                    }

            });

        }

        $posts = $_post->paginate(paginate_limit());

        foreach ($q as $k=>$v)
        {
           if(trim($v) != '')
           {
               $posts->appends($k,$v);
           }
        }


        return view('backend.event_post.index',array_merge(['result' => $posts],$q));


    }

    function form(Request $request)
    {
        $id = $request->input('id',0) - 0 ;

        $row = null;
        if($id - 0 > 0)
        {
            $row = EventPost::find($id);
        }
        return view('backend.event_post.form',['row' => $row]);
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
        $event_type = $request->input('event_type','');

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

        if($event_type){if(isset($event_type)){if( trim($event_type) == ''){
            $error[] = _t('event type is require!!');
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
            $post = EventPost::find($id);
        }else{// for save
            $post = new EventPost();
            $post->view_count = 0;
            $post->user_create_id = 1;
        }

        $post->title = json_encode($titles);
        $post->description =  json_encode($descriptions);
        $post->content = json_encode($request->input('content'));
        $post->video_url =  json_encode($request->input('video_url'));
        $post->image_url = json_encode($request->input('image_url'));
        $post->event_type = $request->input('event_type');

        if($post->save()) {
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

            return redirect('cpanel/event-post');
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

        $post = EventPost::find($id);

        $affected = 0;
        if($post){
            json_decode(null);
            $_image_url = json_decode($post->image_url);

            if($post->delete()){

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

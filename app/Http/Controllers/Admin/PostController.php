<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\ControllerAdmin;
use Illuminate\Http\Request;

use App\Post;
use App\PostCategoryDetail;
use App\PostTagDetail;

class PostController extends ControllerAdmin
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

        $_post = Post::orderBy('posts.id','DESC');

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

        return view('backend.post.index',array_merge(['result' => $posts],$q));


    }

    function form(Request $request)
    {
        $id = $request->input('id',0) - 0 ;

        $row = null;
        if($id - 0 > 0)
        {
            $row = Post::find($id);
        }
        return view('backend.post.form',['row' => $row,'categories' => $row?$row->categories->pluck('category_id'):[],'tags' => $row?$row->tags->pluck('tag_id'):[]]);
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
        $category_id = $request->input('category_id',[]);
        $tag_id = $request->input('tag_id',[]);

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

        if(count($category_id)==0){
            $error[] = _t('category is require!!');
        }

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
            $post = Post::find($id);
        }else{// for save
            $post = new Post();
            $post->view_count = 0;
            $post->user_create_id = 1;
        }

        $post->title = json_encode($titles);
        $post->description =  json_encode($descriptions);
        $post->content = json_encode($request->input('content'));
        $post->video_url =  json_encode($request->input('video_url'));
        $post->image_url = json_encode($request->input('image_url'));

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




            if(count($category_id)>0)
            {

                $PostCategoryDetail = PostCategoryDetail::find($post->id);
                if($PostCategoryDetail)$PostCategoryDetail->delete();

                foreach ($category_id as $c)
                {
                    $cat = new PostCategoryDetail();
                    $cat->post_id = $post->id;
                    $cat->category_id = $c;
                    $cat->save();
                }


            }

            if(count($tag_id)>0)
            {
                $PostTagDetail = PostTagDetail::find($post->id);
                if($PostTagDetail)$PostTagDetail->delete();
                foreach ($tag_id as $t)
                {
                    $tag = new PostTagDetail();
                    $tag->post_id = $post->id;
                    $tag->tag_id = $t;
                    $tag->save();
                }

            }

            return redirect('cpanel/post');
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

        $post = Post::find($id);

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

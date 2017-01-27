<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\ControllerAdmin;
use Illuminate\Http\Request;

use App\PostTag;
use App\PostTagDetail;

class PostTagController extends ControllerAdmin
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

        $_post_tag = PostTag::orderBy('post_tags.id','DESC');

        foreach ($q as $k=>$v)
        {
            $this->k = $k;
            $this->searchWords = preg_split('/\s+/', $v);// explode(' ', $v);

            $_post_tag->where(function($w) {

                    foreach($this->searchWords as $word){
                        if(trim($word) != '') {
                            $w->orWhere($this->k , 'LIKE', '%' . $word . '%');
                        }
                    }

            });

        }

        $post_tags = $_post_tag->paginate(paginate_limit());

        foreach ($q as $k=>$v)
        {
           if(trim($v) != '')
           {
               $post_tags->appends($k,$v);
           }
        }

        return view('backend.post_tag.index',array_merge(['result' => $post_tags],$q));


    }

    function form(Request $request)
    {
        $id = $request->input('id',0) - 0 ;

        $row = null;
        if($id - 0 > 0)
        {
            $row = PostTag::find($id);
        }

        return view('backend.post_tag.form',['row' => $row]);
    }

    public function save(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required'
        ]);

        $id = $request->input('id',0) - 0 ;

        if($id > 0) // update
        {
            $post_tag = PostTag::find($id);
        }else{
            $post_tag = new PostTag();
        }

        $post_tag->title =  $request->input('title');
        $post_tag->description =  $request->input('description');

        if($post_tag->save())
        {
            return redirect('cpanel/tag');
        }else{
            return redirect()->back()->withErrors(['msg', _t('save error')]);
        }


    }

    function delete(Request $request)
    {
        $id = $request->input('id',0) - 0 ;
        $count = PostTagDetail::where('tag_id',$id)->count();

        $affected = 0;

        if($count == 0) {
            if (PostTag::find($id)->delete()) $affected = 1;
        }

        return response()->json(['affected' => $affected]);

    }



}

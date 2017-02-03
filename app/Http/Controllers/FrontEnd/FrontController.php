<?php

namespace App\Http\Controllers\FrontEnd;

namespace App\Http\Controllers\FrontEnd;
use App\EventPost;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class FrontController extends Controller
{
    var $searchWords;
    var $k='';

    public function __construct()
    {
        /*$this->middleware('auth');*/
    }

    public function index()
    {
        return view('frontend.front.index');
    }

    public function event_post_detail($id = 0)
    {
        EventPost::increment('view_count');

        $row = EventPost::find($id);
        return view('frontend.front.event_post_detail',['row' => $row]);
    }

    public function event_list(Request $request, $event_type = '')
    {

        $q['title'] = $request->input('title','');
        $q['description'] = $request->input('description','');

        $_role = EventPost::where('event_type',$event_type);

        foreach ($q as $k=>$v)
        {
            $this->k = $k;
            $this->searchWords = preg_split('/\s+/', $v);// explode(' ', $v);

            $_role->where(function($w) {

                foreach($this->searchWords as $word){
                    if(trim($word) != '') {
                        $w->orWhere($this->k , 'LIKE', '%' . $word . '%');
                    }
                }

            });

        }

        $roles = $_role->orderBy('event_posts.id','DESC')->paginate(12);

        foreach ($q as $k=>$v)
        {
            if(trim($v) != '')
            {
                $roles->appends($k,$v);
            }
        }

        return view('frontend.front.event_list',array_merge(['result' => $roles],$q));


    }

    public function faculty_detail($id)
    {

    }

}

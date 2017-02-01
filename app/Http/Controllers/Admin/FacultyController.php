<?php
namespace App\Http\Controllers\Admin;
use App\Faculty;
use App\Http\Controllers\ControllerAdmin;
use Illuminate\Http\Request;

class FacultyController extends ControllerAdmin
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

        $_post_category = Faculty::orderBy('faculties.id','DESC');

        foreach ($q as $k=>$v)
        {
            $this->k = $k;
            $this->searchWords = preg_split('/\s+/', $v);// explode(' ', $v);

            $_post_category->where(function($w) {

                    foreach($this->searchWords as $word){
                        if(trim($word) != '') {
                            $w->orWhere($this->k , 'LIKE', '%' . $word . '%');
                        }
                    }

            });

        }

        $post_categories = $_post_category->paginate(paginate_limit());

        foreach ($q as $k=>$v)
        {
           if(trim($v) != '')
           {
               $post_categories->appends($k,$v);
           }
        }

        return view('backend.faculty.index',array_merge(['result' => $post_categories],$q));


    }

    function form(Request $request)
    {
        $id = $request->input('id',0) - 0 ;

        $row = null;
        if($id - 0 > 0)
        {
            $row = Faculty::find($id);
        }

        return view('backend.faculty.form',['row' => $row]);
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
            $post_category = Faculty::find($id);
        }else{
            $post_category = new Faculty();
        }

        $post_category->title =  $request->input('title');
        $post_category->description =  $request->input('description');
        $post_category->parent =  $request->input('parent',0)-0;

        if($post_category->save())
        {
            return redirect('cpanel/faculty');
        }else{
            return redirect()->back()->withErrors(['msg', _t('save error')]);
        }


    }

    function delete(Request $request)
    {
        /*$id = $request->input('id',0) - 0 ;
        $count = PostCategoryDetail::where('category_id',$id)->count();

        $affected = 0;

        if($count == 0) {
            if (Faculty::find($id)->delete()) $affected = 1;
        }

        return response()->json(['affected' => $affected]);*/

    }



}

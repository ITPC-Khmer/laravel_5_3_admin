<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\ControllerAdmin;
use Illuminate\Http\Request;

use App\Role;

class RoleController extends ControllerAdmin
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

        $_role = Role::orderBy('roles.id','DESC');

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

        $roles = $_role->paginate(paginate_limit());

        foreach ($q as $k=>$v)
        {
           if(trim($v) != '')
           {
               $roles->appends($k,$v);
           }
        }

        return view('backend.role.index',array_merge(['result' => $roles],$q));


    }

    function form(Request $request)
    {
        $id = $request->input('id',0) - 0 ;

        $row = null;
        if($id - 0 > 0)
        {
            $row = Role::find($id);
        }

        return view('backend.role.form',['row' => $row]);
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
            $role = Role::find($id);
        }else{
            $role = new Role();
        }

        $role->title =  $request->input('title');
        $role->description =  $request->input('description');

        if($role->save())
        {
            return redirect('cpanel/role');
        }else{
            return redirect()->back()->withErrors(['msg', _t('save error')]);
        }


    }

    function delete(Request $request)
    {
        $id = $request->input('id',0) - 0 ;

        $affected = 0;
        if(Role::find($id)->delete())$affected = 1;

        return response()->json(['affected' => $affected]);

    }



}

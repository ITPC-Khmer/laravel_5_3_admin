<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\ControllerAdmin;
use Illuminate\Http\Request;

use App\User;

class UserController extends ControllerAdmin
{

    var $searchWords;
    var $k='';

    public function __construct()
    {
        //$this->middleware('auth');
    }

    public function index(Request $request)
    {
        $q['name'] = $request->input('name','');
        $q['phone'] = $request->input('phone','');
        $q['email'] = $request->input('email','');

        $_user = User::select('users.*','roles.title');


        foreach ($q as $k=>$v)
        {
            $this->k = $k;
            $this->searchWords = preg_split('/\s+/', $v);// explode(' ', $v);

            $_user->where(function($w) {

                    foreach($this->searchWords as $word){
                        if(trim($word) != '') {
                            $w->orWhere("users.{$this->k}"  , 'LIKE', '%' . $word . '%');
                        }
                    }

            });

        }

        $roles = $_user->join('roles', 'users.role_id', '=', 'roles.id')
            ->orderBy('users.id','DESC')
            ->paginate(paginate_limit());

        foreach ($q as $k=>$v)
        {
           if(trim($v) != '')
           {
               $roles->appends($k,$v);
           }
        }

        return view('auth.index',array_merge(['result' => $roles],$q));


    }

    function form(Request $request)
    {
        $id = $request->input('id',0) - 0 ;

        $row = null;
        if($id - 0 > 0)
        {
            $row = User::find($id);
        }else{
            return redirect('register');
        }

        return view('auth.register',['row' => $row]);
    }

    public function save(Request $request)
    {
        $this->validate($request, [
            'role_id' => 'required',
            'phone' => 'required',
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
        ]);

        $id = $request->input('id',0) - 0 ;
        $user = User::find($id);

        $user->name =  $request->input('name');
        $user->phone =  $request->input('phone');
       // $user->email =  $request->input('email');
        $user->note =  $request->input('note');
        $user->role_id =  $request->input('role_id');

        if($user->save())
        {
            return redirect('cpanel/user');
        }else{
            return redirect()->back()->withErrors(['msg', _t('save error')]);
        }


    }


    function delete(Request $request)
    {
        $id = $request->input('id',0) - 0 ;

        $affected = 0;
        if(User::find($id)->delete())$affected = 1;

        return response()->json(['affected' => $affected]);

    }



}

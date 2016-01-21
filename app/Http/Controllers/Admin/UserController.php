<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UserRequest;
use App\Model\Admin\GroupUser;
use App\Model\Admin\User;
use Config,View,Hash ;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('ajax', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->has('q'))
        {
            $search                 = e($request->input('q')) ;
            $setData['data']        = User::with('group_user')
                                        ->orWhere('username', 'LIKE', '%'.$search.'%')
                                        ->orWhere('last_name', 'LIKE', '%'.$search.'%')
                                        ->orWhere('first_name', 'LIKE', '%'.$search.'%')
                                        ->orWhere('id', 'LIKE', '%'.$search.'%')
                                        ->orderBy( 'id' , 'desc' )
                                        ->paginate(Config::get('admin.defultRecord'));   

            $setData['pagination']  = $setData['data']->appends(['q' => $request->input('q')])->links() ;
            $setData['search']      = $request->input('q') ; 
        }
        else
        {
            $setData['data']        = User::with('group_user')
                                        ->orderBy('id', 'desc')
                                        ->paginate(Config::get('admin.defultRecord')); 

            $setData['pagination']  = $setData['data']->links() ;
        }

        return View::make('admin.user.index', $setData) ;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $setData['groupUser']       = GroupUser::where('status', 1)->get() ;
        $setData['action']          = 'create' ;
        $setData['data']            = [];
        $setData['actionLink']      = action('Admin\UserController@store') ;
        return View::make('admin.user.add_edit', $setData) ;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $dataInsert                 = $request->except('_token') ;
        $dataInsert['password']     = Hash::make($dataInsert['password']) ;
        User::create($dataInsert);
        return redirect()->action('Admin\UserController@index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(int $id)
    {
        $setData['groupUser']       = GroupUser::where('status', 1)->get() ;
        $setData['data']            = User::where('id', $id)->get() ;
        $setData['actionLink']      = action('Admin\UserController@update',['id'=>$id]) ;

        if ($setData['data'])
        {
            $setData['action']      = 'edit' ;
            return View::make('admin.user.add_edit', $setData) ;
        }
        else
        {
            return abort(404);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, int $id)
    {
        $dataUpdate                 = $request->except(['_token','_method']) ;

        if( $dataUpdate['password'] )
        {
            $dataUpdate['password'] = Hash::make($dataUpdate['password']) ; 
        }
        
        User::where('id',$id)->update($dataUpdate);
        return redirect()->action('Admin\UserController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id):int
    {
        return User::find($id)->delete() ;
    }
}

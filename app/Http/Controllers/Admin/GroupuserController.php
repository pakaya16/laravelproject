<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\GroupUser;
use App\Http\Requests\Admin\GroupuserRequest;
use View,Config ;

class GroupuserController extends Controller
{
	public function __construct()
	{
		$this->middleware('ajax', ['only' => ['destroy']]);
	}
	public function index(Request $request)
	{
		if ($request->has('q'))
		{
			$search 				= e($request->input('q')) ;
			$setData['data'] 		= GroupUser::orWhere('id', 'LIKE', '%'.$search.'%')
										->orWhere('group_name', 'LIKE', '%'.$search.'%')
										->orderBy('id', 'desc')
										->paginate(Config::get('admin.defultRecord'));		

			$setData['pagination'] 	= $setData['data']->appends(['q' => $request->input('q')])->links() ;
			$setData['search'] 		= $request->input('q') ; 
		}
		else
		{
			$setData['data'] 		= GroupUser::orderBy('id' , 'desc')
										->paginate(Config::get('admin.defultRecord'));	

			$setData['pagination'] 	= $setData['data']->links() ;
		}

		return View::make('admin.groupuser.index', $setData) ;
	}
	public function create()
	{
		$setData['actionLink']      = action('Admin\GroupuserController@store') ;
		$setData['action']			= 'create' ;
		$setData['data'] 			= [];
		return View::make('admin.groupuser.add_edit', $setData) ;
	}	
	public function edit(int $id)
	{
		$setData['data'] 			= GroupUser::where('id', $id)->get() ;

		if( isset($setData['data'][0]) )
		{
			$setData['action'] 		= 'edit' ;
			$setData['actionLink']  = action('Admin\GroupuserController@update', ['id'=>$id]) ;
			return View::make('admin.groupuser.add_edit', $setData) ;
		}
		else
		{
			return abort(404);
		}
	}
	public function update(GroupuserRequest $request, int $id)
    {        
        GroupUser::where('id',$id)->update($request->except(['_token','_method']));
        return redirect()->action('Admin\GroupuserController@index');
    }
	public function store(GroupuserRequest $request)
	{
		GroupUser::create($request->all());
		return redirect()->action('Admin\GroupuserController@index');
	}
	public function destroy(int $id):int
    {
		return GroupUser::where('id', $id)->first()->delete() ;
    }
}
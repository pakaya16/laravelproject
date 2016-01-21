<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\LoginRequest;
use App\Model\Admin\User;
use View,Hash;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return View::make('admin.login.index') ;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\Admin\LoginRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LoginRequest $request)
    {
        $getData    = User::where('username',e($request->input('username')))->get() ;

        if (isset($getData[0]))
        {
            if ($getData[0]->status == 1)
            {
                if (Hash::check($request->input('password'),$getData[0]->password)) 
                {
                    $setSession['id']           = $getData[0]->id ;
                    $setSession['username']     = $getData[0]->username ;
                    $setSession['first_name']   = $getData[0]->first_name ;
                    $setSession['last_name']    = $getData[0]->last_name ;

                    $request->session()->put('backoffice',$setSession);

                    return redirect()->action('Admin\DashboardController@index') ;    
                }
                else
                {   
                    $MessageShow                = trans('banner_messages.passwordFail') ;
                }
            }
            else
            {
                $MessageShow                    = trans('banner_messages.statusUserNoneActive') ;
            }
        }
        else
        {
            $MessageShow                        = trans('banner_messages.nodataInSyatem') ;
        }

        $setData['errorMsg']  = $MessageShow ;

        return View::make('admin.login.index', $setData) ;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Logout Session destroy
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        $request->session()->forget('backoffice');

        return redirect( action('Admin\LoginController@index') );
    }

    /**
     * Change Language
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function lang(Request $request)
    {
        if ($request->session()->get('lang') == 'th')
        {
            $request->session()->put('lang','en');
        }
        else
        {
            $request->session()->put('lang','th');
        }

        return back()->withInput();
    }
}

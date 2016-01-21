<?php

namespace App\Http\Middleware;

use Closure,Config,App;

class BannerToolCheckPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $this->checkLanguage( $request );

        if ( $this->checkLogin( $request ) )
        {
            return redirect( action('Admin\LoginController@index') );
        }

        return $next($request);
    }
    private function checkLanguage( $request )
    {
        if ($request->has('change_lang'))
        {
            if ($request->input('change_lang') == 'th' || $request->input('change_lang') == 'en')
            {
                App::setLocale( $request->input('change_lang') );
                $request->session()->put('lang',$request->input('change_lang'));
            }
            else
            {
                abort(404);
            }
        }
        else
        {
            if ($request->session()->has('lang'))
            {
                App::setLocale( $request->session()->get('lang') );
            }
            else
            { 
                $defaultLanguage = Config::get('admin.defaultLanguage') ;
                $request->session()->put('lang',$defaultLanguage);
                App::setLocale($defaultLanguage);
            }           
        }       
    }
    private function checkLogin( $request ):bool
    {
        if( $request->session()->has('backoffice') )
        {
            return false ;
        }
        elseif( $request->segment(2) == 'login' )
        {
            return false ;
        }
        else
        {
            return true;
        }
    }
}

<?php

namespace App\Http\Middleware;

use Closure;
use App\Model\Admin\User;
use App\Model\Admin\Role;
use App\Model\Admin\Permission;
use DB;

class RoleperMiddleware
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
        //1.首先要知道当前的管理员有哪些权限  session('uid')
        $user = User::find(session('uid'));
        if($user->level == 3){
            return $next($request);
        }
        //2.根据 uid 找到是什么角色
        $userrole = $user->roles;
        $info = [];
        foreach($userrole as $k=>$v){
            $data = $v->permissions;
            foreach($data as $k=>$v){
                $url = $v->perurl;
                $info[] = $url;
            }
        }
        //3.知道角色之后就能知道当前管理员有哪些权限
        $pers = array_unique($info);

        //4.获取用户点击菜单的路径信息  perurl
        $res = \Route::current()->getActionName();
        if($res == 'App\Http\Controllers\Admin\IndexController@index'){
            return $next($request);
        }

        $perr = [
            'App\Http\Controllers\Admin\UserController@store',
            'App\Http\Controllers\Admin\UserController@update',
            'App\Http\Controllers\Admin\UserController@show',
            'App\Http\Controllers\Admin\UserController@dochangepass',
            'App\Http\Controllers\Admin\UserController@profile',
            'App\Http\Controllers\Admin\UserController@profiles',
            'App\Http\Controllers\Admin\UserController@doprofile',
            'App\Http\Controllers\Admin\UserController@douserrole',
            'App\Http\Controllers\Admin\RoleController@store',
            'App\Http\Controllers\Admin\RoleController@update',
            'App\Http\Controllers\Admin\RoleController@store',
            'App\Http\Controllers\Admin\RoleController@doroleper',
            'App\Http\Controllers\Admin\PermissionController@store',
            'App\Http\Controllers\Admin\PermissionController@update',
            'App\Http\Controllers\Admin\TypeController@store',
            'App\Http\Controllers\Admin\TypeController@update',
            'App\Http\Controllers\Admin\TypeController@typeson',
            'App\Http\Controllers\Admin\BannerController@store',
            'App\Http\Controllers\Admin\BannerController@update',
            'App\Http\Controllers\Admin\LinkController@store',
            'App\Http\Controllers\Admin\LinkController@update',
            'App\Http\Controllers\Admin\TipController@store',
            'App\Http\Controllers\Admin\TipController@update',
            'App\Http\Controllers\Admin\AdvertController@store',
            'App\Http\Controllers\Admin\AdvertController@update'
        ];

        if(in_array($res, $perr)){
            return $next($request);
        }

        // dump($res);exit;
        if(in_array($res, $pers)){
            return $next($request);
        } else {
            return redirect('/admin/remind');
        }

        // return $next($request);
        
    }
}

<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\Role;
use App\Model\Admin\Permission;
use DB;

class RoleController extends Controller
{
    /**
     * 添加权限的页面.
     *
     * @return \Illuminate\Http\Response
     */
    public function roleper($id)
    {
        //根据id查角色名
        $role = Role::find($id);
        //获取权限名
        $permission = Permission::all();
        $roleper = $role->permissions;
        $rp = [];
        foreach($roleper as $k=>$v){
            $rp[] = $v->pername;
        }
        return view('admin.role.roleper',['title'=>'角色权限添加页面','role'=>$role,'permission'=>$permission,'rp'=>$rp]);
    }

    /**
     * 处理添加权限的方法.
     *
     * @return \Illuminate\Http\Response
     */
    public function doroleper(Request $request)
    {
        //角色的id  
        $roleid = $request->id;
        //权限的id
        $perid = $request->perid;
        DB::table('role_per')->where('role_id',$roleid)->delete();
        $info = [];
        foreach($perid as $k=>$v){
            $arr = [];
            $arr['role_id'] = $roleid;
            $arr['per_id'] = $v;
            $info[] = $arr;
        }
        $data = DB::table('role_per')->insert($info);
        if($data){
            return redirect('/admin/role')->with('success','添加成功');
        } else {
            return back()->with('error','添加失败');
        }
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $role = Role::
        where('rolename','like','%'.$request->rolename.'%')->paginate($request->input('nums',10));
        $id = 1;
        return view('admin.role.index',['title'=>'角色列表','role'=>$role,'id'=>$id,'request'=>$request]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.role.add',['title'=>'角色的添加页面']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //表单验证
        $this->validate($request, [
            'rolename' => 'required',
        ],[
            'rolename.required' => '角色名不能为空',
        ]);

        $rs = $request->only('rolename');
        // dd($rs);
        try {
            $data = Role::create($rs);
            if($data){
                return redirect('/admin/role')->with('success','添加成功');
            }
        } catch (\Exception $e) {
            return back()->with('error','添加失败');
        }
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
        $res = Role::find($id);
        return view('admin.role.edit',['title'=>'修改页面','res'=>$res]);
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
        $this->validate($request, [
            'rolename' => 'required',
        ],[
            'rolename.required' => '角色名不能为空',
        ]);
        
        $res = $request->only('rolename');
        // dump($res);
        try {
            $data = Role::where('id',$id)->update($res);
            if($data){
                return redirect('/admin/role')->with('success','修改成功');
            }
        } catch (\Exception $e) {
            return back()->with('error','修改失败');
        }
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
        $res = Role::destroy($id);
        if($res){
            return redirect('/admin/role')->with('success','删除成功');
        } else {
            return back()->with('error','删除失败');
        }
    }
}

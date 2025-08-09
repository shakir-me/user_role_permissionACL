<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;

class RoleController extends Controller
{


    function _construct()
    {
        $this->middleware('permission:role-list|role-create|role-edit|role-update|role-delete',['only'=>['index']]);
        $this->middleware('permission:role-create',['only'=>['create','store']]);
        $this->middleware('permission:role-edit',['only'=>['edit']]);
        $this->middleware('permission:role-update',['only'=>['update']]);
        $this->middleware('permissio:role-delete',['only'=>['delete']]);
    }

    

    public function role_index()
    {
       $roles =Role::paginate(10);
        return view('role.index',compact('roles'));
    }

    public function role_create()
    {
        $permissions =Permission::all();
        return view('role.create',compact('permissions'));
    }

    public function role_store(Request $request)
    {
        $role=Role::create(['name'=>$request->input('name'),'guard_name' =>'web']);
        $permissions=Permission::whereIn('id',$request->input('permission'))->get();
        foreach ($permissions as $permission) {
            $role->syncPermissions($permission);
        }

        $notification=array(
            'messege'=>' Role Created  Successfully',
            'alert-type'=>'success'
             );
        return redirect()->route('role.index')->with($notification);
    }

    public function role_edit($id)
    {

         $role=Role::find($id);
         $permissions =Permission::all();
         return view('role.edit',compact('role','permissions'));

    }

    public function role_update(Request $request,$id)
    {
        $role=Role::find($id);
        $role->name=$request->input('name');
        $role->save();

    
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        $permissions=Permission::whereIn('id',$request->input('permission'))->get();
        foreach($permissions as $permission){
          $role->givePermissionTo($permission);
        }

        $notification=array(
            'messege'=>' Role Update  Successfully',
            'alert-type'=>'success'
             );
        return redirect()->route('role.index')->with($notification);

    }

    public function role_delete($id)
    {
        $role=Role::find($id);
        $permissions = Permission::all();
        foreach ($permissions as $permission) {
            $role->revokePermissionTo($permission);
        }
        Role::where('id',$id)->delete();

        $notification=array(
            'messege'=>' Role Deleted  Successfully',
            'alert-type'=>'success'
             );
        return redirect()->route('role.index')->with($notification);
    }
       
}

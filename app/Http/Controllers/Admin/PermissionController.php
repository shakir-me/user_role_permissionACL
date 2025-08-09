<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;
class PermissionController extends Controller
{

    function _construct()
    {
        $this->middleware('permission:permission-list|permission-create|permission-edit|permission-update|permission-delete',['only'=>['index']]);
        $this->middleware('permission:permission-create',['only'=>['create','store']]);
        $this->middleware('permission:permission-edit',['only'=>['edit']]);
        $this->middleware('permission:permission-update',['only'=>['update']]);
        $this->middleware('permissio:permission-delete',['only'=>['delete']]);
    }

    
    public function permission_index()
    {
        $permissions=Permission::paginate(20);
        return view('permission.index',compact('permissions'));
    }

    public function permission_create()
    {
        return view('permission.create');
    }

    public function permission_store(Request $request)
    {
          $permission=Permission::create(['name'=>$request->input('name'),'guard_name' =>'web']);
          $notification=array(
            'messege'=>' Permission Created  Successfully',
            'alert-type'=>'success'
             );
        return redirect()->route('permission.index')->with($notification);

    }

    public function permission_edit($id)
    {
        $permission=Permission::find($id);
        return view('permission.edit',compact('permission'));
    }

    public function permission_update(Request $request,$id)
    {
        $permission=Permission::where('id',$id)->update(['name'=>$request->input('name'),'guard_name' =>'web']);
          $notification=array(
            'messege'=>' Permission Update  Successfully',
            'alert-type'=>'success'
             );
        return redirect()->route('permission.index')->with($notification);

    }

    public function permission_delete($id)
    {
        $permission=Permission::find($id);
        $roles = Role::all()->pluck('name');

        foreach($roles as $role){
            $permission->removeRole($role);
        }

        $permission::where('id',$id)->delete();

        $notification=array(
            'messege'=>' Permission Deleted  Successfully',
            'alert-type'=>'success'
             );
        return redirect()->route('permission.index')->with($notification);
    }

    public function role_permission()
    {
        $permissions=Permission::all();
        $roles=Role::all();
        return view('permission.role_permission',compact('permissions','roles'));
    }

    public function sync_permission(Request $request)
    {
            app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();
            $roles=Role::all();
            foreach($roles as $role){
                $permissions=$request->input('permissions.'. $role->name, []);
                $role->syncPermissions($permissions);
            }
             $notification=array(
            'messege'=>' Permission Sync  Successfully',
            'alert-type'=>'success'
             );
        return redirect()->route('permission.index')->with($notification);
    }
}

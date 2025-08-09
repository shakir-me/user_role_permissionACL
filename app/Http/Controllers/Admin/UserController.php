<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
class UserController extends Controller
{



    function _construct()
    {
        $this->middleware('permission:user-list|user-create|user-edit|user-update|user-delete',['only'=>['index']]);
        $this->middleware('permission:user-create',['only'=>['create','store']]);
        $this->middleware('permission:user-edit',['only'=>['edit']]);
        $this->middleware('permission:user-update',['only'=>['update']]);
        $this->middleware('permissio:user-delete',['only'=>['delete']]);
    }
    public function user_index()
    {
        $users =User::paginate(10);
        return view('user.index',compact('users'));
    }

    public function user_create()
    {
    return view('user.create');
    }

    //


    public function user_store(Request $request)
    {
      

      $data[]=array();
      $data['name'] =$request->name;
      $data['email'] =$request->email;

      if ($request->password != $request->password_confirmation) {
          $notification=array(
            'messege'=>' User Password  and Confirmation Password Not Match',
            'alert-type'=>'success'
             );
        return redirect()->back()->with($notification);

      }else{
         $data['password'] =Hash::make($request->password);
         $user= User::create($data);
         $notification=array(
            'messege'=>' User Created  Successfully',
            'alert-type'=>'success'
             );
        return redirect()->route('user.index')->with($notification);

        
      }

    }

    public function user_edit($id)
    {
        $user = User::find($id);
        return view('user.edit',compact('user'));
    }

    

    public function user_update(Request $request, $id)
{
    $data = [];  // Fixed initialization
    
    $data['name'] = $request->name;
    $data['email'] = $request->email;

    if (!empty($request->password) && !empty($request->password_confirmation)) {
        if ($request->password != $request->password_confirmation) {
            $notification = [
               'messege' => 'User Password Not Match',
               'alert-type' => 'error'  // Changed from 'success' to 'error'
            ];
            return redirect()->back()->with($notification);
        } else {
            $data['password'] = Hash::make($request->password);
            User::where('id', $id)->update($data);
            $notification = [
               'messege' => 'User Update Successfully',
               'alert-type' => 'success'
            ];
            return redirect()->route('user.index')->with($notification);
        }
    } else {
        User::where('id', $id)->update($data);
        $notification = [
            'messege' => 'User Update Successfully',
            'alert-type' => 'success'
        ];
        return redirect()->route('user.index')->with($notification);
    }
}


    public function user_delete($id)
    {
        $user= User::find($id);
        $user->delete();
        $notification=array(
            'messege'=>' User Deleted Successfully',
            'alert-type'=>'success'
             );
        return redirect()->route('user.index')->with($notification);
    }

  
}

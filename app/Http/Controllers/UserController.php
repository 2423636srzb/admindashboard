<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index(){
        $user = User::all();
        return view('admin.user.index',compact('user'));
    }

    public function show(User $user){
       $role = Role::all();

       return view('admin.user.edit',compact('user','role'));

    }

    public function assignRoles(User $user ,Request $request){
     if($user->hasRole($request->roles)){
        return back()->with('message','Role Exists');
     }
     $user->assignRole($request->roles);
     return back()->with('message','Role Added');

    }
    public function removeRoles(User $user,Role $role){
       if($user->hasRole($role)){
        $user->removeRole($role);
        return back()->with('message','Role Removed');
       }
       return back()->with('message','Role Not Exists');

    }

    public function destroy(User $user){
        if($user->hasRole('Admin')){
            return back()->with('message','The User Is Admin' );
        }

        $user->delete();
        return back()->with('message','User Deleted Successfully');
    }
}

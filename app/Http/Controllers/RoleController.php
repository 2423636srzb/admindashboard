<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function index(){
        $role = Role::whereNotIn('name',['Admin'])->get();
        return view('admin.role.index',compact('role'));
    }
    public function create(){
        return view('admin.role.create');
    }
    public function store(Request $request){
      
        $validated = $request->validate(['name'=>['required','min:3']]);
      
        Role::create($validated);

        return to_route('admin.roles.index')->with('message','Role Created successfully');
    }
    public function edit(Role $role){
         $permission = Permission::all();
        return view('admin.role.update',compact('role','permission'));
    }
   public function update(Request $request,Role $role){

    $validated = $request->validate(['name'=>['required','min:3']]);
    $role->update($validated);
    return to_route('admin.roles.index')->with('message','Role Updated successfully');
   }

   public function destroy(Role $role){
    $role->delete();
    return back()->with('message','Role Deleted successfully');
   }

   public function givePermission(Request $request,Role $role){
     if($role->hasPermissionTo($request->permission)){
        return back()->with('message','Permission Exists');
     }
     $role->givePermissionTo($request->permission);
     return back()->with('message','Permission Granted');

   }

   public function revokePermission(Role $role,Permission $permission){
    if($role->hasPermissionTo($permission)){
      $role->revokePermissionTo($permission);
      return back()->with('message','Permission Removed');
    }
    return back()->with('message','Permission Not  Exist');

   }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    public function index(){
        $permission  = Permission::all();
        return view('admin.permission.index',compact('permission'));
    }

    public function create(){
        return view('admin.permission.create');
    }
    public function store(Request $request){

        $validated = $request->validate(['name'=>['required','min:3']]);
      
        Permission::create($validated);

        return to_route('admin.permissions.index')->with('message','Permission Created successfully');
    }
    public function edit(Permission $permission){

        return view('admin.permission.update',compact('permission'));
    }
    public function update(Request $request,Permission $permission){

        $validated = $request->validate(['name'=>['required']]);
       $permission->update($validated);
       return to_route('admin.permissions.index')->with('message','Permission Updated successfully');

    }

    public function destroy(Permission $permission){
        $permission->delete();
        return back()->with('message','permission Deleted successfully');
       }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    


    
    public function index()

    {

        $roles = Role::all();
        $permissions = Permission::all();
        return view('admin.roles.index',compact('roles','permissions'));

    }




    public function store(Request $request)

    { 

        $validatedData = $request->validate([

            'name' => 'required|unique:roles,name',

            'permission' => 'required',

        ]);

    

        $role = Role::create(['name' => $request->input('name')]);

        $role->syncPermissions($request->input('permission'));

    
    
        return back()->with('success','New User Role Added Successfully!');

        
    }


    
    public function show($id)
    {
        $role = Role::find($id);
        $rolePermissions = $role->permissions;
    
        return view('admin.roles.show',compact('role','rolePermissions'));
    }


    
public function edit($id)

{

    $role = Role::find($id);

    $rolePermissions = $role->permissions->pluck('name')->toArray();
    
    $permissions = Permission::get();
    
return view('admin.roles.edit_role',compact('role','permissions','rolePermissions'));

}





public function update(Request $request,$id)

{


    $validatedData = $request->validate([

        'name' => 'required',

        'permission' => 'required',

    ]);



    $role = Role::find($id);

    $role->name = $request->input('name');

    $role->save();

    $role->syncPermissions($request->input('permission'));



    return redirect()->route('role.index')->with('success','User Role Updated Successfully!');

}







public function destroy( $id)

{


    Role::findOrFail($id)->delete();



    return redirect()->back()->session()->flash('message', 'Role Deleted Permanently.');



}





}

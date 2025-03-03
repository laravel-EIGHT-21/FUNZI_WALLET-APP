<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    



    
    public function index()
    {   
        $permits = Permission::latest()->get();

        return view('admin.permissions.index',compact('permits'));
    }



    public function store(Request $request)
    {   
        $request->validate([
            'name' => 'required|unique:permissions,name'
        ]);

        Permission::create($request->only('name'));
      

        return back()->with('success','New Permission Added Successfully!');

    }



    public function edit( $id)
    {
        $permit = Permission::find($id);
        return view('admin.permissions.edit',compact ('permit'));
    }



    public function update(Request $request, $id)
    {
        $data = Permission::find($id);
     
        $validatedData = $request->validate([
               'name' => 'required|unique:permissions,name,'.$data->id
               
           ]);
   
           
           $data->name = $request->name;
           $data->save();

           return redirect()->route('permissions.view')->with('success','Permission Updated Successfully!');

    }



    public function destroy($id)
    {

        Permission::findOrFail($id)->delete();


        return redirect()->back()->session()->flash('message', 'Permission Info Deleted Successfully.');


        
    }





}

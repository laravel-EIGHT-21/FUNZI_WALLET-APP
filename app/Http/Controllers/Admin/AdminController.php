<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin; 
use App\Models\model_has_roles;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\RedirectResponse;
use Carbon\Carbon;
use Illuminate\Validation\Rules\Password;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Imagick\Driver;
use Spatie\Permission\Models\Role;


class AdminController extends Controller
{
    




    
    public function destroy(Request $request): RedirectResponse
    {

        Auth::logout();
 
        $request->session()->invalidate(); 
     
        $request->session()->regenerateToken();

        return redirect()->route('login');

    }




        
    public function profileAdmin()
    {
        $id = Auth::user()->id;
		$adminData = Admin::find($id);
        return view('admin.profile.profile_show',compact('adminData'));
   
    }




    public function profileUpdate(Request $request)
    {
        $id = Auth::user()->id;
		$updateData = Admin::find($id);
        $updateData->name = $request->name;
        $updateData->email = $request->email;
        $updateData->telephone = $request->telephone;

        $validatedData = $request->validate([

            'profile_photo_path' => 'required|mimes:jpg,png|max:4096',
    
           ]);


           if ($request->file('profile_photo_path')) {

            $manager = new ImageManager(new Driver());
            @unlink(public_path('upload/admin_images/'.$updateData->profile_photo_path));
            $image = $request->file('profile_photo_path');
            $name_gen = $image->hashName();
            $new_img = $manager->read($request->file('profile_photo_path'));
            $new_img = $new_img->resize(102,102);
            $new_img->toJpeg(80)->save(base_path('public/upload/admin_images/'.$name_gen));
            $save_url = $name_gen;
            $updateData['profile_photo_path'] = $save_url;
          }    
          
        $updateData->save();

        return back()->with('success','Profile Information Updated Successfully!');

    }


   
    public function passUpdate(Request $request)
    {
        $request->validate([
            'oldpassword' => 'required',
            'password' => ['required', Password::min(8)->mixedCase()->numbers()->symbols()->uncompromised()],
        ]);



        $hashedPassword = Auth::user()->password;
        if(Hash::check($request->oldpassword,$hashedPassword)){
            $admin = Admin::find(Auth::id());
            $admin->password= Hash::make($request->new_password);
            $admin->save();
            Auth::logout();
            return redirect()->route('admin.logout');

        }else{
            return redirect()->back();
        }

    }





    
    public function ViewAdminUsers(){


        $roles = Role::all();
		$allData = Admin::all();
     
    	return view('admin.users.view_admin',compact('roles','allData'));
    }


    



    public function StoreAdminUser(Request $request){

		$email = $request->email;		
		$check = Admin::where('email',$email)->first();

		if($check == null){


    	DB::transaction(function() use($request){

    	
        $adminuser = new Admin(); 
        $adminuser->name = $request->name;
        $adminuser->email = $request->email;
        $adminuser->password = Hash::make($request->password);
        $adminuser->telephone = $request->telephone;
        $adminuser->created_at = Carbon::now(); 
        $adminuser->save();

        $roles = $request['roles'];

        if (isset($roles)) {

            foreach ($roles as $role) {
            $role_r = Role::where('id', '=', $role)->firstOrFail();            
            $adminuser->assignRole($role_r);
            }
        }   

           
    	});


        return back()->with('success','New Admin User Added Successfully!');

	}

		else{

		  
            return back()->with('error','USER EMAIL ALREADY EXIST!!!');
		  
		  }	
	


    } // END Method 



    
    public function EditAdminUser($id){


		$editUser = Admin::findOrFail($id);
        
        $editRole = model_has_roles::where('model_id',$id)->orderBy('role_id','asc')->get();
        $roles = Role::all();
		
    	return view('admin.users.edit_admin',compact('editUser', 'roles','editRole'));
		

    }


    
    public function UpdateAdminUser(Request $request, $id){ 
    
    	
    $request->validate([
        'name' =>['required'],
        'telephone' =>['required'],
   ]);



    DB::transaction(function() use($request, $id){

        
    
        $user = Admin::where('id',$id)->first();     
        $user->name = $request->name;
        $user->telephone = $request->telephone;
        $user->save();

        model_has_roles::where('model_id',$id)->delete();
        $role_id= new model_has_roles();
        $role_id->role_id = $request->role_id;
        $role_id->model_type = 'App\Models\Admin';
        $role_id->model_id = $id;
        $role_id->save();
       


       
    });


    return back()->with('warning',' User Infor Updated Successfully!');


    }// END METHOD




    
    public function inactiveAdminUser($id)
    { 

        Admin::findOrFail($id)->update(['status' => 0]);

            return back()->with('error',' User Has Been Deactivated...');

    } 




    
    public function activeAdminUser($id)
    {


        Admin::findOrFail($id)->update(['status' => 1]);

        return back()->with('success',' User Has Been Activated...');

    }









}

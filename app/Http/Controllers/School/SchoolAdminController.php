<?php

namespace App\Http\Controllers\School;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User; 
use Illuminate\Http\RedirectResponse;
use Illuminate\Validation\Rules\Password;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Imagick\Driver;

class SchoolAdminController extends Controller
{
    

    
        
    public function destroy(Request $request): RedirectResponse
    {

        Auth::logout();
 
        $request->session()->invalidate();
     
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }







    public function SchoolUserprofile()
    {
        $id = Auth::user()->id;
		$adminData = User::find($id);
        return view('school.profile.profile_show',compact('adminData'));
   
    }



    

    public function profileUpdate(Request $request)
    {
        $id = Auth::user()->id;
		$updateData = User::find($id);
        $updateData->name = $request->name;
        $updateData->email = $request->email;
        $updateData->school_tel1 = $request->school_tel1;
        $updateData->school_tel2 = $request->school_tel2;
        $updateData->address = $request->address;

        $validatedData = $request->validate([

            'profile_photo_path' => 'required|mimes:jpg,png|max:4096',
    
           ]);

        
  if ($request->file('profile_photo_path')) {

    $manager = new ImageManager(new Driver());
    @unlink(public_path('upload/logo/'.$updateData->profile_photo_path));
    $image = $request->file('profile_photo_path');
    $name_gen = $image->hashName();
    $new_img = $manager->read($request->file('profile_photo_path'));
    $new_img = $new_img->resize(102,102);
    $new_img->toJpeg(80)->save(base_path('public/upload/logo/'.$name_gen));
    $save_url = $name_gen;
    $updateData['profile_photo_path'] = $save_url;


  }    
  
        $updateData->save();

        return back()->with('success','Profile Information Updated Successfully!');

    }


    

    public function schoolpassUpdate(Request $request)
    {
       
        $request->validate([
            'oldpassword' => 'required',
            'password' => ['required', Password::min(8)->mixedCase()->numbers()->symbols()->uncompromised()],
        ]);


        $hashedPassword = Auth::user()->password;
        if(Hash::check($request->oldpassword,$hashedPassword)){
            $admin = User::find(Auth::id());
            $admin->password= Hash::make($request->new_password);
            $admin->save();
            Auth::logout();
            return redirect()->route('school.logout');
            
        }else{
            return redirect()->back();
        }

    }





}

<?php

namespace App\Http\Controllers\Tours;

use App\Http\Controllers\Controller;
use App\Models\TourOperator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Imagick\Driver;


class TourAdminController extends Controller
{
    





    public function Userprofile()
    {
        $id = Auth::user()->id;
		$adminData = TourOperator::find($id);
        return view('tours_travels.profile.profile_show',compact('adminData'));
   
    }



    

    public function profileUpdate(Request $request)
    {
        $id = Auth::user()->id;
		$updateData = TourOperator::find($id);
        $updateData->name = $request->name;
        $updateData->email = $request->email;
        $updateData->telephone = $request->telephone;
        $updateData->address = $request->address;

        $validatedData = $request->validate([

            'profile_photo_path' => 'required|mimes:jpg,png|max:4096',
    
           ]);

           
           if ($request->file('profile_photo_path')) {

            $manager = new ImageManager(new Driver());
            @unlink(public_path('upload/tour_operators/'.$updateData->profile_photo_path));
            $image = $request->file('profile_photo_path');
            $name_gen = $image->hashName();
            $new_img = $manager->read($request->file('profile_photo_path'));
            $new_img = $new_img->resize(102,102);
            $new_img->toJpeg(80)->save(base_path('public/upload/tour_operators/'.$name_gen));
            $save_url = $name_gen;
            $updateData['profile_photo_path'] = $save_url;
          }    

  
        $updateData->save();

        return back()->with('success','Profile Information Updated Successfully!');

    }


    

    public function passwordUpdate(Request $request)
    {
       
        $request->validate([
            'oldpassword' => 'required',
            'password' => ['required', Password::min(8)->mixedCase()->numbers()->symbols()->uncompromised()],
        ]);


        $hashedPassword = Auth::user()->password;
        if(Hash::check($request->oldpassword,$hashedPassword)){
            $admin = TourOperator::find(Auth::id());
            $admin->password= Hash::make($request->new_password);
            $admin->save();
            Auth::logout();
            return redirect()->route('operator.logout');
            
        }else{
            return redirect()->back();
        }

    }


}

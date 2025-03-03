<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Students;
use App\Models\TourOperator;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
use App\Notifications\TourOperatorPasswordReset;
use App\Notifications\AdminPasswordReset;
use App\Notifications\StudentsPasswordReset;
use Illuminate\Support\Facades\Notification;

use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class PasswordResetController extends Controller
{
    




    ///Tour Operators Reset Password Section///

    public function touroperatorForgotpassword(){

        return view('auth.tour-operator-forgot-password');

    }


    public function touroperatorRESET_LINK_SENT(Request $request){


        //$request->validate(['email' => 'required|email']);
        //$email = $request->email;
       //Notification::route('mail', $email)->notify(new TourOperatorPasswordReset);


       $user = DB::table('tour_operators')->where('email', '=', $request->email)->first();

   //Check if the user exists
   if ($user == false) {
       return redirect()->back()->withErrors(['email' => trans('User does not exist')]);
   }


   else{

       //Create Password Reset Token
   DB::table('password_reset_tokens')->insert([
    'email' => $request->email,
    'token' => Str::random(60),
    'created_at' => Carbon::now()
]);


//Get the token just created above
$tokenData = DB::table('password_reset_tokens')->where('email', $request->email)->first();

if (Password::sendResetLink($request->email, $tokenData->token)) {
    return redirect()->back()->with('status', trans('A reset link has been sent to your email address.'));
} else {
    return redirect()->back()->withErrors(['error' => trans('A Network Error occurred. Please try again.')]);
}


   }
   



    }




    
    public function touroperatorRESETPasswordLink(string $token){

        return view('auth.tour-operator-reset-password', ['token' => $token]);

    }




        
    public function touroperatorPasswordReset(Request $request){

        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed',
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function (TourOperator $user, string $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->setRememberToken(Str::random(60));
     
                $user->save();
     
                event(new PasswordReset($user));
            }
        );
     
        return $status === Password::PASSWORD_RESET
                    ? redirect('touroperator/login')->with('status', __($status))
                    : back()->withErrors(['email' => [__($status)]]);


    }















    
    ///Admin Reset Password Section///

    public function AdminForgotpassword(){
        return view('auth.admin-forgot-password');


    }


    public function AdminRESET_LINK_SENT(){



    }




    
    public function AdminRESETPasswordLink(){



    }




        
    public function AdminPasswordReset(){



    }









    
    ///Students Reset Password Section///

    public function StudentsForgotpassword(){

        return view('auth.students-forgot-password');

    }


    public function StudentsRESET_LINK_SENT(){



    }




    
    public function StudentsRESETPasswordLink(){



    }




        
    public function StudentsPasswordReset(){



    }










}

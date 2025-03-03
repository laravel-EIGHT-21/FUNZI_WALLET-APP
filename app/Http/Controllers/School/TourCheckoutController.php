<?php

namespace App\Http\Controllers\School;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\tours_cart;
use Illuminate\Support\Facades\Auth;

class TourCheckoutController extends Controller
{




    public function TourCheckoutCreate(){


        $school_id = Auth::user()->id;
        $tourCartCout = tours_cart::where('school_id',$school_id)->count();
        if ($tourCartCout > 0) {

            $tourCart = tours_cart::where('school_id',$school_id)->get();

    return view('school.tours.cart.checkout_view',compact('tourCart'));
            
        }
        
        else{

    
    return redirect()->route('school.tour.packages')->with('error','Choose Atleast One Tour Package...');


        }

    
} // end method 






public function TourCheckoutStore(Request $request){

    $data = array();
    $data['shipping_name'] = $request->shipping_name;
    $data['shipping_email'] = $request->shipping_email;
    $data['shipping_tel1'] = $request->shipping_tel1; 
    $data['shipping_tel2'] = $request->shipping_tel2; 
    $data['shipping_address'] = $request->shipping_address;

    $school_id = Auth::user()->id;
    $tourCart = tours_cart::where('school_id',$school_id)->get();

    
    return view('school.tours.cart.checkout_submit',compact('data','tourCart'));
    
    
     

}// end mehtod. 





    
}

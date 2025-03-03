<?php

namespace App\Http\Controllers\School;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Models\order_carts;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    

    
    public function CheckoutCreate(){

        $school_id = Auth::user()->id;
        $CartCout = order_carts::where('school_id',$school_id)->count();
        if ($CartCout > 0) {
    
            $carts = order_carts::where('school_id',$school_id)->get();

    return view('school.ecommerce.cart.checkout_view',compact('carts'));
            
        }
        
        else{

    
    return redirect()->route('school.products')->with('error','Shop Atleast One Product...');


        }

    
} // end method 





public function CheckoutStore(Request $request){

    $data = array();
    $data['shipping_name'] = $request->shipping_name;
    $data['shipping_email'] = $request->shipping_email;
    $data['shipping_tel1'] = $request->shipping_tel1; 
    $data['shipping_tel2'] = $request->shipping_tel2; 
    $data['shipping_address'] = $request->shipping_address;

    $school_id = Auth::user()->id;
    $carts = order_carts::where('school_id',$school_id)->get();
    
    
    return view('school.ecommerce.cart.checkout_submit',compact('data','carts'));
    
    
     

}// end mehtod. 







    
    public function CheckoutCreditStore(Request $request){

		$data = array();
    	$data['shipping_name'] = $request->shipping_name;
    	$data['shipping_email'] = $request->shipping_email;
    	$data['shipping_tel1'] = $request->shipping_tel1; 
    	$data['shipping_tel2'] = $request->shipping_tel2; 
    	$data['shipping_address'] = $request->shipping_address;

        $school_id = Auth::user()->id;
        $carts = order_carts::where('school_id',$school_id)->get();

    	
        return view('school.ecommerce.cart.credit_orders_checkout',compact('data','carts'));
        
    	
    	 

    }// end mehtod. 



}

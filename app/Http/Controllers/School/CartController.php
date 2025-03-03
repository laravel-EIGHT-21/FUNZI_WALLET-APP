<?php

namespace App\Http\Controllers\School;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\products;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;
use App\Models\car_rental_cart; 
use App\Models\car;
use Carbon\Carbon;
use App\Models\order_carts;

class CartController extends Controller
{
    

    
	public function ViewCart(Request $request){
        
        $school_id = Auth::user()->id;
        $carts= order_carts::where('school_id',$school_id)->get();
        
        return view('school.ecommerce.cart.view_cart',compact('carts'));
		
	} // end mehtod 

 
    
    public function addToCart(Request $request){
         
        $school_id = Auth::user()->id;
    $product = products::find($request->id);
    $price = $product->selling_price;

    order_carts::insert([
        'school_id' => $school_id,
        'product_id' => $product->id,
        'qty' => $request->quantity, 
        'price' => $price,
        'pricetotal' => (float)$request->quantity * (float)$price, 

    
    ]);

    return back()->with('info','Product Successfully Added to Your Cart...');



    }




   // Cart QTY Increament 
   public function updateCartQty($id){

        ///Cart::instance('cart')->update($request->rowId,$request->quantity);
        
        $qty = order_carts::findOrFail($id);
        $price = $qty->price;
        $qty = $qty->qty;
        $new_qty = $qty + 1;
        $new_pricetotal = (float)$new_qty * (float)$price;

        order_carts::where('id',$id)->update([
            'qty' => $new_qty,
            'pricetotal' => $new_pricetotal,              
            ]);
        
        
        
        
        return back();

    }// end mehtod 




    
   // Cart QTY DEcreament 
   public function decreCartQty($id){
    
    $qty = order_carts::findOrFail($id);
    $price = $qty->price;
    $qty = $qty->qty;
    $new_qty = $qty - 1;
    $new_pricetotal = (float)$new_qty * (float)$price;

    order_carts::where('id',$id)->update([
        'qty' => $new_qty,
        'pricetotal' => $new_pricetotal,              
        ]);
    
    
    
    
    return back();

}// end mehtod 





    public function removeCart(Request $request){

        $rowId = $request->id;
        order_carts::destroy($rowId);

        return back();

    } 


    public function clearCart(){

            order_carts::instance('cart')->destroy();
        return back();

    }









    ///School Rental Cart Section///


    
	public function ViewBusRentalsCart(Request $request){
        
        $school_id = Auth::user()->id;
        $rentalCart = car_rental_cart::where('school_id',$school_id)->get();
        return view('school.bus_rentals.cart.view_rentals_cart',compact('rentalCart'));
		
	} // end mehtod 


    
    public function addToRentalCart(Request $request){
         

        $toDate = Carbon::parse($request->start_date);
        $fromDate = Carbon::parse($request->end_date);
        $total_days = $toDate->diffInDays($fromDate);

        $school_id = Auth::user()->id;
        $rental = car::find($request->id);
        $hireprice = $rental->hire_price;

        $total_price = $hireprice * $total_days;
        
    
        car_rental_cart::insert([
            'school_id' => $school_id, 
            'car_id' => $rental->id, 
            'vehicle_total' =>$request->vehicle_total,
            'start_day' => date('Y-m-d',strtotime($request->start_date)),
            'end_day' => date('Y-m-d',strtotime($request->end_date)),
            'total_days' => $total_days, 
            'price_per_day' => $hireprice,
            'pricetotal' => $total_price, 

                    
        ]);
    
        return redirect()->route('school.car.rentals')->with('success','Bus Rental Successfully Added To Cart...');
    
    
    
        }
    
        
    
    
        public function removeRentalCart(Request $request){
    
            $rowId = $request->id;
            car_rental_cart::destroy($rowId);
            return back();
    
        }
    
    
        public function clearRentalCart(){
    
            car_rental_cart::instance('cart')->destroy();
            return back();
    
        }







}

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



return back()->with('success','Product Successfully Added to Your Cart...');



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

return back()->with('error','Product Deleted From Your Cart!');



} 



public function deleteFromCart(Request $request){

$rowid = $request->id;
order_carts::destroy($rowid);

return back()->with('error','Product Deleted From Your Cart!');



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

if ($request->fuel_status == 'With Fuel') {





$school_id = Auth::user()->id;
$rental = car::where('id',$request->id)->find($request->id);
$hirepricefuel = $rental->hire_price_fuel;
$total_days = $request->total_days;
$vehicle_total = $request->vehicle_total;

$total_price = ((float)$hirepricefuel*(float)$total_days)*(float)$vehicle_total;


car_rental_cart::insert([
'school_id' => $school_id, 
'car_id' => $rental->id, 
'vehicle_total' => $vehicle_total,
'fuel_status' => $request->fuel_status,
'total_days' => $total_days, 
'start_day' => $request->start_day,
'end_day' => $request->end_day,
'price_per_day' => $hirepricefuel,
'pricetotal' => $total_price, 


]);

return back()->with('success','Bus Rental Successfully Added To Cart...');

}

elseif($request->fuel_status == 'With No Fuel') 
{



$school_id = Auth::user()->id;
$rental1 = car::where('id',$request->id)->find($request->id);
$hirepricenofuel = $rental1->hire_price_no_fuel;
$total_days1 = $request->total_days;
$vehicle_total1 = $request->vehicle_total;


$total_price1 = ((float)$hirepricenofuel*(float)$total_days1)*(float)$vehicle_total1;


car_rental_cart::insert([
'school_id' => $school_id, 
'car_id' => $rental1->id, 
'vehicle_total' => $vehicle_total1,
'fuel_status' => $request->fuel_status,
'total_days' => $total_days1, 
'start_day' => $request->start_day,
'end_day' => $request->end_day,
'price_per_day' => $hirepricenofuel,
'pricetotal' => $total_price1, 


]);

return back()->with('success','Bus Rental Successfully Added To Cart...');



}


}






public function IncreVehiclesCart($id){

$total_cars = car_rental_cart::findOrFail($id);
$vehicles = $total_cars->vehicle_total;
$price = $total_cars->price_per_day;
$days = $total_cars->total_days;
$new_total_cars = $vehicles + 1;
$new_pricetotal = ((float)$new_total_cars*(float)$price)*(float)$days;

car_rental_cart::where('id',$id)->update([
'vehicle_total' => $new_total_cars,
'pricetotal' => $new_pricetotal,              
]);

return back();

}// end mehtod 





public function DecreVehiclesCart($id){

$total_cars = car_rental_cart::findOrFail($id);
$vehicles = $total_cars->vehicle_total;
$price = $total_cars->price_per_day;
$days = $total_cars->total_days;
$new_total_cars = $vehicles - 1;
$new_pricetotal = ((float)$new_total_cars*(float)$price)*(float)$days;

car_rental_cart::where('id',$id)->update([
'vehicle_total' => $new_total_cars,
'pricetotal' => $new_pricetotal,              
]);


return back();

}// end mehtod 





public function IncreRentalDaysCart($id){

$total_days = car_rental_cart::findOrFail($id);
$vehicles = $total_days->vehicle_total;
$price = $total_days->price_per_day;
$days = $total_days->total_days;
$new_total_day = $days + 1;
$new_pricetotal = ((float)$new_total_day * (float)$price)*(float)$vehicles;

car_rental_cart::where('id',$id)->update([
'total_days' => $new_total_day,
'pricetotal' => $new_pricetotal,              
]);

return back();

}// end mehtod 





public function DecreRentalDaysCart($id){


$total_days = car_rental_cart::findOrFail($id);
$vehicles = $total_days->vehicle_total;
$price = $total_days->price_per_day;
$days = $total_days->total_days;
$new_total_day = $days - 1;
$new_pricetotal = ((float)$new_total_day * (float)$price)*(float)$vehicles;

car_rental_cart::where('id',$id)->update([
'total_days' => $new_total_day,
'pricetotal' => $new_pricetotal,              
]);

return back();

}// end mehtod 





public function removeRentalCart(Request $request){

$rowId = $request->id;
car_rental_cart::destroy($rowId);
return back();

}





public function deleteBusRentalCart(Request $request){

$row_id = $request->id;
car_rental_cart::destroy($row_id);
return back();

}




public function clearRentalCart(){

car_rental_cart::instance('cart')->destroy();
return back();

}







}

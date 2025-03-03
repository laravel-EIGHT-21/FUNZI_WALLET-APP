<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\car_rental_cart;
use Illuminate\Support\Facades\Auth;
use App\Models\car_bookings;
use App\Models\car_rental_bookings;
use App\Models\rental_bookings_payments;


class CarRentalCheckOutController extends Controller
{
    

    
    public function PendingBookings(){

        $bookings = car_bookings::where('status','Bookings Pending')->orderBy('id','DESC')->get();
    	return view('admin.car_rentals.bookings.pending_car_bookings',compact('bookings'));

    } 


        
    public function ConfirmedBookings(){

        $bookings = car_bookings::where('status','Bookings Confirmed')->orderBy('id','DESC')->get();
    	return view('admin.car_rentals.bookings.confirmed_car_bookings',compact('bookings'));

    } 



        
    public function CancelledBookings(){

        $bookings = car_bookings::where('status','Bookings Cancelled')->orderBy('id','DESC')->get();
    	return view('admin.car_rentals.bookings.cancelled_car_bookings',compact('bookings'));

    } 


	    
    public function SchoolVehicleRentalBookingDetails($booking_id){

		$booking = car_bookings::where('id',$booking_id)->first();
    	$car_booking = car_rental_bookings::with(['rental','booking'])->where('booking_id',$booking_id)->orderBy('id','ASC')->get();

    	return view('admin.car_rentals.bookings.car_booking_details',compact('booking','car_booking'));

    } 


 

    //Order Status Update Section 

    
    public function PendingToConfirmBooking($booking_id){
   
        car_bookings::findOrFail($booking_id)->update([
			'status' => 'Bookings Confirmed',
		]);

        car_rental_bookings::where('booking_id', $booking_id)->update([
            'status' => 'Bookings Confirmed',
        ]);
  
        return back()->with('info',' Car Rental Booking Has Been Confirmed..');
  
  
      } // end method



      


      
	
public function SchoolVehicleRentalBookingInvoice($booking_id){


    $booking = car_bookings::with('school')->where('id',$booking_id)->first();
    $rentals = car_rental_bookings::with(['rental'])->where('booking_id',$booking_id)->orderBy('id','DESC')->get();


    return view('admin.car_rentals.bookings.car_booking_invoice_details',compact('booking','rentals'));

} 








///School Bus Rentals Bookings Checkout section///


public function BusRentalCheckoutCreate(){


    $school_id = Auth::user()->id;
    $CartCout = car_rental_cart::where('school_id',$school_id)->count();
    if ($CartCout > 0) {

        $rentalCart = car_rental_cart::where('school_id',$school_id)->get();

return view('school.bus_rentals.cart.checkout_view',compact('rentalCart'));
        
    }
    
    else{


return redirect()->route('school.car.rentals')->with('error','Please Select A Bus Rental First ...');


    }


} // end method 






public function BusRentalCheckoutStore(Request $request){

$data = array();
$data['shipping_name'] = $request->shipping_name;
$data['shipping_email'] = $request->shipping_email;
$data['shipping_tel1'] = $request->shipping_tel1; 
$data['shipping_tel2'] = $request->shipping_tel2; 
$data['shipping_address'] = $request->shipping_address;

$school_id = Auth::user()->id;
$rentalCart = car_rental_cart::where('school_id',$school_id)->get();


return view('school.bus_rentals.cart.checkout_submit',compact('data','rentalCart'));


 

}// end mehtod. 












public function SchoolBusRentalBookingsPayments(){

$payments = rental_bookings_payments::with(['school','booking'])->latest()->get();

return view('admin.car_rentals.bookings.rentals_booking_payments', compact('payments'));

}






///for school bookings payments///


public function BusRentalBookingPayments(){

    $payments = rental_bookings_payments::with(['school','booking'])->where('school_id',Auth::id())->latest()->get();
    
    return view('school.bus_rentals.bookings.rentals_booking_payments', compact('payments'));
    
    }
    





}

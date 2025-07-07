<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\car_rental_cart;
use Illuminate\Support\Facades\Auth;
use App\Models\car_bookings;
use App\Models\car_rental_bookings;
use App\Models\rental_bookings_payments;
use App\Models\rentalpayment_records;
use App\Models\rental_payments_tracking;
use Carbon\Carbon;



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

    	$car_booking = car_bookings::with('school')->where('id',$booking_id)->get();
        $rentals = car_rental_bookings::with(['booking','rental'])->where('booking_id',$booking_id)->orderBy('id','ASC')->get();
        $rental_payment_total = rentalpayment_records::with(['booking'])->where('booking_id',$booking_id)->sum('amount');
		$rental_payments = rentalpayment_records::with('booking')->where('booking_id',$booking_id)->get();
        
        $payments_track = rental_payments_tracking::with(['booking'])->where('booking_id',$booking_id)->get();


    	return view('admin.car_rentals.bookings.car_booking_details',compact('booking','car_booking','rental_payments','rental_payment_total','payments_track','rentals'));

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



    
    $schoolid = Auth::user()->id;
    $CartCout = car_rental_cart::where('school_id',$schoolid)->count();
    if ($CartCout > 0) {

    $data = array();
    $data['shipping_name'] = $request->shipping_name; 
    $data['shipping_email'] = $request->shipping_email;
    $data['shipping_tel1'] = $request->shipping_tel1; 
    $data['shipping_tel2'] = $request->shipping_tel2; 
    $data['shipping_address'] = $request->shipping_address;

    $school_id = Auth::user()->id;
    $carts = car_rental_cart::where('school_id',$school_id)->get();
    
    
    return view('school.bus_rentals.cart.checkout_view',compact('data','carts'));

}
        
else{


return back()->with('warning','Book Atleast One Bus Rental First...');

}

 

}// end mehtod. 












public function SchoolBusRentalBookingsPayments(){

$payment_records = rentalpayment_records::with(['school','booking'])->latest()->get();

return view('admin.car_rentals.bookings.rentals_booking_payments', compact('payment_records'));

}














public function SchoolRentalBookingPayment(Request $request, $booking_id)
{ 



$rental_booking_records = rentalpayment_records::where('booking_id',$booking_id)->first();	

$due_bal = (float)$rental_booking_records->total_amount-(float)$rental_booking_records->amount;


if($request->payment_amount <= $due_bal)
{

$previous_amount = $rental_booking_records->amount;
$total_amount = $rental_booking_records->total_amount;
$present_amount = (float)$previous_amount+(float)$request->payment_amount; 
$rental_booking_records->amount = $present_amount;
$rental_booking_records->save();

   
$booking_Pay = new rental_payments_tracking();
$booking_Pay->booking_id = $booking_id;
$booking_Pay->school_id = $rental_booking_records->school_id;
$booking_Pay->payment_amount  = $request->payment_amount;
$booking_Pay->amount_balance  = (float)$total_amount-(float)$rental_booking_records->amount;
$booking_Pay->payment_type = $request->payment_type;
$booking_Pay->payment_note = $request->payment_note;
$booking_Pay->date = Carbon::today()->format('Y-m-d');
$booking_Pay->month = Carbon::today()->format('F Y');
$booking_Pay->year = Carbon::today()->format('Y');
$booking_Pay->save();




if($rental_booking_records->amount == $rental_booking_records->total_amount)
{


car_bookings::where('id',$booking_id)->update([
	
  'payment_status' => 'Payment Made',

]);

}

elseif($rental_booking_records->amount < $rental_booking_records->total_amount)
{

  
car_bookings::where('id',$booking_id)->update([
	
  'payment_status' => 'Partial Payment Made',

]);


}


        return back()->with('success',' Payment Successful');

}

else{


      return back()->with('error','Payment Amount Entered Greater than Account Balance!');



}

} 
  
  
  


  public function RentalBookingTrackInvoice($booking_id){
    
    
    $payment_track = rentalpayment_records::where('booking_id',$booking_id)->first();
    
    if($payment_track == true){
    
      $data['payments_record'] = rentalpayment_records::with(['school','booking'])->where('booking_id',$booking_id)->first();
      $data['payment_records_track'] = rental_payments_tracking::where('booking_id',$booking_id)->get();
    
    return view('admin.car_rentals.bookings.rental_booking_track_invoice', $data);
    
    
      }
       
      else{
    
         abort(code:403);
        
        }	
    
    
      }
    



    
  public function RentalBookingPaymentInvoice($id){

    $payment_track = rental_payments_tracking::where('id',$id)->first();
    
    if($payment_track == true){

$payment_details = rental_payments_tracking::with(['school'])->where('id',$id)->get();

    
    return view('admin.car_rentals.bookings.rental_booking_payment_invoice', compact('payment_details'));
    
    
      }
       
      else{
    
         abort(code:403);
        
        }	
    
    
      }
    



  		
public function RentalBookingPaymentDelete($id)
{

  $rental_booking_payment = rental_payments_tracking::find($id);
  $payment = $rental_booking_payment->payment_amount;
  $booking_id = $rental_booking_payment->booking_id;

  
  
  $paid_amount = rentalpayment_records::where('booking_id',$booking_id)->first();
  $old_amount = $paid_amount->amount;
  $new_amount = (float)$old_amount-(float)$payment;

  rentalpayment_records::where('booking_id',$booking_id)->update([

    'amount' => $new_amount,

  ]);


  rental_payments_tracking::find($id)->delete();
 
  return back()->with('error',' Payment Deleted Successfully');


}
























///for school bookings payments///


public function BusRentalBookingPayments(){

    $payments = rentalpayment_records::with(['school','booking'])->where('school_id',Auth::id())->latest()->get();
    
    return view('school.bus_rentals.bookings.rentals_booking_payments', compact('payments'));
    
    } 
    





}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\tours_packs;
use App\Models\school_bookings;
use App\Models\tour_payments;
use App\Models\tour_packages; 
use App\Models\tours_destinations;
use App\Models\tour_package_images; 
use App\Models\tourpayment_records;
use App\Models\tour_payments_tracking;
use Carbon\Carbon;



class SchoolTourBookingsController extends Controller
{



    
    public function PendingBookings(){

        $bookings = school_bookings::where('status','Bookings Pending')->orderBy('id','DESC')->get();
    	return view('admin.tour_bookings.pending_tour_bookings',compact('bookings'));

    } 


        
    public function ConfirmedBookings(){

        $bookings = school_bookings::where('status','Bookings Confirmed')->orderBy('id','DESC')->get();
    	return view('admin.tour_bookings.confirmed_tour_bookings',compact('bookings'));

    } 



        
    public function CancelledBookings(){

        $bookings = school_bookings::where('status','Bookings Cancelled')->orderBy('id','DESC')->get();
    	return view('admin.tour_bookings.cancelled_tour_bookings',compact('bookings'));

    } 


	    
    public function SchoolTourBookingDetails($booking_id){

		$booking = school_bookings::where('id',$booking_id)->first();
    	$tour_booking = tours_packs::with('tour')->where('booking_id',$booking_id)->orderBy('id','ASC')->get();
        $bookings = school_bookings::with('school')->where('id',$booking_id)->get(); 

        $tour_payments = tourpayment_records::with(['booking'])->where('booking_id',$booking_id)->get();

        $tour_payment_total = tourpayment_records::with(['booking'])->where('booking_id',$booking_id)->sum('amount');

        $offline_payments_track = tour_payments_tracking::with(['booking'])->where('booking_id',$booking_id)->get();


    	return view('admin.tour_bookings.tour_booking_details',compact('booking','bookings','tour_booking','tour_payments','offline_payments_track','tour_payment_total'));

    } 


 

    //Order Status Update Section 

    
    public function PendingToConfirmBooking($booking_id){
   
        school_bookings::findOrFail($booking_id)->update([
			'status' => 'Bookings Confirmed',
		]);

        tours_packs::where('booking_id', $booking_id)->update([
            'status' => 'Bookings Confirmed',
        ]);
  
        return back()->with('info',' Tour Booking Has Been Confirmed..');
  
  
      } // end method



      


      
	
public function SchoolTourBookingInvoice($booking_id){


    $booking = school_bookings::with('school')->where('id',$booking_id)->first();
    $tours = tours_packs::with(['tour'])->where('booking_id',$booking_id)->orderBy('id','DESC')->get();


    return view('admin.tour_bookings.tour_booking_invoice_details',compact('booking','tours'));

} 



         
public function SchoolTourPackages()
{

    $tours = tour_packages::latest()->paginate(12);
        $destinations = tours_destinations::all();

        return view('admin.tour_packages.view_tour_packages',compact('tours','destinations'));

}



    public function tourPackageDetails($id,)
    {

        $tour = tour_packages::findOrFail($id); 
        $multiImgs = tour_package_images::where('tour_package_id',$id)->get();


        return view('admin.tour_packages.tour_package_details',compact('tour','multiImgs'));

    }







public function SchoolTourBookingsPayments(){

    
    $payment_records = tourpayment_records::with(['school','booking'])->latest()->get();

    return view('admin.tour_bookings.tour_booking_payments_records', compact('payment_records'));
    
}






public function SchoolTourBookingPayment(Request $request, $booking_id)
{ 



$tour_booking_records = tourpayment_records::where('booking_id',$booking_id)->first();	

$due_bal = (float)$tour_booking_records->total_amount-(float)$tour_booking_records->amount;


if($request->payment_amount <= $due_bal)
{

$previous_amount = $tour_booking_records->amount;
$total_amount = $tour_booking_records->total_amount;
$present_amount = (float)$previous_amount+(float)$request->payment_amount; 
$tour_booking_records->amount = $present_amount;
$tour_booking_records->save();

   
$booking_Pay = new tour_payments_tracking();
$booking_Pay->booking_id = $booking_id;
$booking_Pay->school_id = $tour_booking_records->school_id;
$booking_Pay->payment_amount  = $request->payment_amount;
$booking_Pay->tour_amount_balance  = (float)$total_amount-(float)$tour_booking_records->amount;
$booking_Pay->payment_type = $request->payment_type;
$booking_Pay->payment_note = $request->payment_note;
$booking_Pay->date = Carbon::today()->format('Y-m-d');
$booking_Pay->month = Carbon::today()->format('F Y');
$booking_Pay->year = Carbon::today()->format('Y');
$booking_Pay->save();




if($tour_booking_records->amount == $tour_booking_records->total_amount)
{


school_bookings::where('id',$booking_id)->update([
	
  'payment_status' => 'Payment Made',

]);

}

elseif($tour_booking_records->amount < $tour_booking_records->total_amount)
{

  
school_bookings::where('id',$booking_id)->update([
	
  'payment_status' => 'Partial Payment Made',

]);


}


        return back()->with('success',' Payment Successful');

}

else{


      return back()->with('error','Payment Amount Entered Greater than Account Balance!');



}

} 
  
  
  


  public function TourBookingTrackInvoice($booking_id){
    
    
    $payment_track = tourpayment_records::where('booking_id',$booking_id)->first();
    
    if($payment_track == true){
    
      $data['payments_record'] = tourpayment_records::with(['school','booking'])->where('booking_id',$booking_id)->first();
      $data['payment_records_track'] = tour_payments_tracking::where('booking_id',$booking_id)->get();
    
    return view('admin.tour_bookings.tour_booking_track_invoice', $data);
    
    
      }
       
      else{
    
         abort(code:403);
        
        }	
    
    
      }
    



    
  public function TourBookingPaymentInvoice($id){

    $payment_track = tour_payments_tracking::where('id',$id)->first();
    
    if($payment_track == true){

$payment_details = tour_payments_tracking::with(['school'])->where('id',$id)->get();

    
    return view('admin.tour_bookings.tour_booking_payment_invoice', compact('payment_details'));
    
    
      }
       
      else{
    
         abort(code:403);
        
        }	
    
    
      }
    



  		
public function TourBookingPaymentDelete($id)
{

  $tour_booking_payment = tour_payments_tracking::find($id);
  $payment = $tour_booking_payment->payment_amount;
  $booking_id = $tour_booking_payment->booking_id;

  
  
  $paid_amount = tourpayment_records::where('booking_id',$booking_id)->first();
  $old_amount = $paid_amount->amount;
  $new_amount = (float)$old_amount-(float)$payment;

  tourpayment_records::where('booking_id',$booking_id)->update([

    'amount' => $new_amount,

  ]);


  tour_payments_tracking::find($id)->delete();
 
  return back()->with('error',' Payment Deleted Successfully');


}








    
}

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

    	return view('admin.tour_bookings.tour_booking_details',compact('booking','tour_booking'));

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

    $tours = tour_packages::where('status',1)->latest()->paginate(12);
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

    
    $payments = tour_payments::with(['school','booking'])->latest()->get();

    return view('admin.tour_bookings.tour_booking_payments', compact('payments'));
    
}



    
}

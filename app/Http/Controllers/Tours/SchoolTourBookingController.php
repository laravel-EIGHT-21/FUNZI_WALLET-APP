<?php

namespace App\Http\Controllers\Tours;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\school_bookings;
use App\Models\tours_packs;
use App\Models\TourOperator; 
use App\Models\tour_packages; 
use App\Models\tours_destinations;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class SchoolTourBookingController extends Controller
{


    


    public function SchoolToursBookings(){

        $operator_id = Auth::user()->id;

    	$tour_bookings = tours_packs::with(['tour','booking'])->where('tour_operator_id',$operator_id)
        ->orderBy('booking_id','desc')
        ->get()
        ->groupBy('booking_id');

    	return view('tours_travels.tour_bookings.school_tour_bookings',compact('tour_bookings'));

    } 


	    
    public function TourBookingDetails($booking_id){

        $operator_id = Auth::user()->id;
		$booking = school_bookings::with('school')->where('id',$booking_id)->first();
    	$tour_booking = tours_packs::with('tour')->where('booking_id',$booking_id)->where('tour_operator_id',$operator_id)->orderBy('id','DESC')->get();

        $stud_price_total = tours_packs::where('booking_id',$booking_id)->where('tour_operator_id',$operator_id)->sum('stud_pricetotal');


        $adult_price_total = tours_packs::where('booking_id',$booking_id)->where('tour_operator_id',$operator_id)->sum('adult_pricetotal');

        $tour_booking_total = (float)$stud_price_total+(float)$adult_price_total;


    	return view('tours_travels.tour_bookings.tour_booking_details',compact('booking','tour_booking','tour_booking_total'));

    } 


    
	    
    public function TourBookingInvoice($booking_id){

        $operator_id = Auth::user()->id;
		$booking = school_bookings::with('school')->where('id',$booking_id)->first();
    	$tour_booking = tours_packs::with('tour')->where('booking_id',$booking_id)->where('tour_operator_id',$operator_id)->orderBy('id','DESC')->get();

        $stud_price_total = tours_packs::where('booking_id',$booking_id)->where('tour_operator_id',$operator_id)->sum('stud_pricetotal');


        $adult_price_total = tours_packs::where('booking_id',$booking_id)->where('tour_operator_id',$operator_id)->sum('adult_pricetotal');

        $tour_booking_total = (float)$stud_price_total+(float)$adult_price_total;


    	return view('tours_travels.tour_bookings.tour_booking_invoice_details',compact('booking','tour_booking','tour_booking_total'));

    } 







          //Yearly Orders Reports
          public function ViewYearlyTourBookingsReports(){

            $operator_id = Auth::user()->id;
            $bookings = tours_packs::select('month')->groupBy('month')->where('tour_operator_id',$operator_id)->where('status','Bookings Confirmed')->orderBy('created_at')->get();
            return view('tours_travels.tour_bookings.tour_bookings_report_view',compact('bookings'));


          }
      
      
      
      public function TourBookingsReportsByYear(Request $request){
      
        $operator_id = Auth::user()->id;
          $year= $request->year;
          $bookings = tours_packs::select('month')->groupBy('month')->where('tour_operator_id',$operator_id)->where('year',$year)->where('status','Bookings Confirmed')->orderBy('created_at', 'asc')->groupBy('month')->get();
      
      
          return view('tours_travels.tour_bookings.tour_bookings_report_view',compact('bookings'));
      
      
      } // end mehtod 
      







      

          //Yearly Orders Reports
          public function ViewAllYearlyTourBookingsReports(){

            $bookings = tours_packs::select('month')->groupBy('month')->where('status','Bookings Confirmed')->orderBy('created_at')->get();
            return view('admin.tour_bookings.tour_bookings_report_view',compact('bookings'));


          }
      
      
      
      public function AllTourBookingsReportsByYear(Request $request){
      
          $year= $request->year;
          $bookings = tours_packs::select('month')->groupBy('month')->where('year',$year)->where('status','Bookings Confirmed')->orderBy('created_at', 'asc')->groupBy('month')->get();
      
          return view('admin.tour_bookings.tour_bookings_report_view',compact('bookings'));
      
      
      } // end mehtod 
      


      





    
}

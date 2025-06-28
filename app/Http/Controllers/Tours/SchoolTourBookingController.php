<?php

namespace App\Http\Controllers\Tours;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\tours_packs;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class SchoolTourBookingController extends Controller
{


    







      

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

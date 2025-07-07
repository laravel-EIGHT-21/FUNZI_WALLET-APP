<?php

namespace App\Http\Controllers\School;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\tours_cart; 
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\tours_packs;
use App\Models\school_bookings;
use App\Models\tour_payments;
use App\MtnMomo\MtnConfig;
use App\MtnMomo\MtnCollection;
use App\Models\car_rental_bookings;
use App\Models\tourpayment_records;
use App\Models\tour_payments_tracking;


class TourBookingsController extends Controller
{
    

    
    public function SubmitTourBookings(Request $request){


				

        $school_id = Auth::user()->id;
        $tourCartCout = tours_cart::where('school_id',$school_id)->count(); 
        $tourCartSubtotal_Stud = tours_cart::where('school_id',$school_id)->sum('stud_pricetotal');
        $tourCartSubtotal_Adult = tours_cart::where('school_id',$school_id)->sum('adult_pricetotal');
        $subtotal =(float)$tourCartSubtotal_Stud + (float)$tourCartSubtotal_Adult;

		/*
		$externalId = rand(100,10000000);
		$partyId = $request->school_tel1;

		$config = new MtnConfig([ 
			// mandatory credentials
			'baseUrl'               => 'https://sandbox.momodeveloper.mtn.com', 
			'currency'              => 'EUR', 
			'targetEnvironment'     => 'sandbox', 
		
			// collection credentials
			"collectionApiSecret"   => 'efe623cfbc9144718fda6974f22d37a8', 
			"collectionPrimaryKey"  => '3b871685daf94e0f8a38e8d6f9bc084a', 
			"collectionUserId"      => '75256da3-6a40-4f34-a6d6-8e27f62fc4aa',
		]);
		
		
		$collection = new MtnCollection($config); 
		
		$params = [
			"mobileNumber"      => $partyId, 
			"amount"            =>  $subtotal, 
			"externalId"        => $externalId,
			"payerMessage"      => 'some note',
			"payeeNote"         => '1212'
		];
		
		$transactionId = $collection->requestToPay($params);
		
		$transaction = $collection->getTransaction($transactionId);

*/
 
 //dd($transaction);


		/*
		$momo_pay = new Collection();
		$transactionId = rand(100,10000000);
		$partyId = $request->mobile_number;



		$momoTransactionId = $momo_pay->requestToPay($transactionId, $partyId, $subtotal);

		$response = $momo_pay->getTransactionStatus($momoTransactionId);

		*/


		

		
     $booking_id = school_bookings::insertGetId([ 
		'school_id' => $school_id,
		 'name' => $request->name,
     	'email' => $request->email,
     	'school_tel1' => $request->school_tel1,
     	'school_tel2' => $request->school_tel2, 
		'school_address' => $request->address,     	 
     	'total_amount' => $subtotal,
		'total_tours' => $tourCartCout,
		'booking_number' => mt_rand(10000000,99999999),
		 'time' => Carbon::now()->toTimeString(),
     	'booking_date' => Carbon::today()->format('Y-m-d'),
     	'booking_month' => Carbon::today()->format('F Y'),
     	'booking_year' => Carbon::today()->format('Y'),
     	'status' => 'Bookings Pending',
		'payment_status' => 'No Payment',
		'created_at' => Carbon::now(),

     ]);


	/* 
$token_obj = $transaction->status;
$amount = $transaction->amount;
$currency = $transaction->currency;


	 
$tour_payment = new tour_payments();
$tour_payment->booking_id = $booking_id;
$tour_payment->school_id = $school_id;
$tour_payment->amount = $amount;
$tour_payment->currency = $currency;
$tour_payment->reference_id = $transactionId;
$tour_payment->externalId = $externalId;
$tour_payment->payer_number =  $partyId;
$tour_payment->status =  $token_obj;
$tour_payment->sent_time = Carbon::now()->toTimeString();;
$tour_payment->payment_date = Carbon::today()->format('Y-m-d');;
$tour_payment->month = Carbon::now()->format('F Y');
$tour_payment->year = Carbon::now()->format('Y');
$tour_payment->save();

*/




tourpayment_records::insert([

'booking_id' => $booking_id, 
'school_id' => Auth::id(), 
'amount' => 0,
'total_amount' => $subtotal,
'month' => Carbon::today()->format('F Y'),
'year' => Carbon::today()->format('Y'),
'created_at' => Carbon::now(),

]);




	 $carts = tours_cart::where('school_id',$school_id)->orderBy('id','ASC')->get();

     foreach ($carts as $cartitem) {
        tours_packs::insert([
     		'booking_id' => $booking_id, 
			'school_id' => Auth::id(), 
            'tour_package_id' => $cartitem->tour_package_id,
     		'stud_qty' => $cartitem->stud_qty,
     		'stud_price' => $cartitem->stud_price,
			'stud_pricetotal' => $cartitem->stud_pricetotal,
            'adult_qty' => $cartitem->adult_qty,
            'adult_price' => $cartitem->adult_price,
           'adult_pricetotal' => $cartitem->adult_pricetotal,
			'date' => Carbon::today()->format('Y-m-d'),
			'month' => Carbon::today()->format('F Y'),
			'year' => Carbon::today()->format('Y'),
			'status' => 'Bookings Pending',
     		'created_at' => Carbon::now(),

     	]);
     } 




     tours_cart::where('school_id',$school_id)->delete();

        return redirect()->route('view.tour.bookings')->with('success','Tour Bookings Submitted Successfully');
 



    } // end method 





    public function ViewTourBookings(){ 

    	$bookings = school_bookings::where('school_id',Auth::id())->latest()->get();
    	return view('school.tours.bookings.view_tour_bookings',compact('bookings'));

    } 


	    
    public function TourBookingDetails($booking_id){

        $school_id = Auth::user()->id;
		$booking = school_bookings::with('school')->where('id',$booking_id)->where('school_id',$school_id)->first();
    	$tour_booking = tours_packs::with('tour')->where('booking_id',$booking_id)->orderBy('id','ASC')->get();
		$payments = tourpayment_records::with('booking')->where('booking_id',$booking_id)->where('school_id',$school_id)->get();

    	return view('school.tours.bookings.tour_booking_details',compact('booking','tour_booking','payments'));

    } 




	
    public function CancelTourBookings($booking_id)
    {

		
        school_bookings::findOrFail($booking_id)->update([
			'status' => 'Bookings Cancelled',
		]);

        tours_packs::where('booking_id', $booking_id)->update([
            'status' => 'Bookings Cancelled',
        ]);

		return redirect()->back()->with('error',' Tour Bookings Cancelled !');
       
    } // end method 





	
public function TourBookingReportInvoice($booking_id){


    $booking = school_bookings::with('school')->where('id',$booking_id)->where('school_id',Auth::id())->first();
    $tours = tours_packs::with(['tour'])->where('booking_id',$booking_id)->orderBy('id','DESC')->get();


    return view('school.tours.bookings.tour_booking_invoice_details',compact('booking','tours'));

} 




    
    public function TourBookingsGeneralInfo(){

    	$payments = tourpayment_records::with(['school','booking'])->where('school_id',Auth::id())->latest()->get();

    	return view('school.tours.bookings.tour_booking_payments', compact('payments'));

    } 





	


          //Yearly Orders Reports
          public function AnnualTourReports(){

            $school_id = Auth::user()->id;
            $bookings = tours_packs::select('month')->groupBy('month')->where('school_id',$school_id)->where('status','Bookings Confirmed')->orderBy('created_at')->get();
            return view('school.reports.tours.tour_bookings_report_view',compact('bookings'));


          }
      
      
      
      public function ToursAnnualReport(Request $request){
      
        $school_id = Auth::user()->id;
          $year= $request->year;
          $bookings = tours_packs::select('month')->groupBy('month')->where('school_id',$school_id)->where('year',$year)->where('status','Bookings Confirmed')->orderBy('created_at', 'asc')->groupBy('month')->get();
      
      
          return view('school.reports.tours.tour_bookings_report_view',compact('bookings'));
      
      
      } // end mehtod 
      







	
///Rental Bookings Report ///



public function AnnualBusRentalsReports(){

	 $school_id = Auth::user()->id;
    $bookings = car_rental_bookings::select('month')->groupBy('month')->where('school_id',$school_id)->where('status','Bookings Confirmed')->orderBy('created_at')->get();

    return view('school.reports.bus_rentals.rental_bookings_report_view',compact('bookings'));


  }



public function BusRentalsAnnualReports(Request $request){

	 $school_id = Auth::user()->id;
  $year= $request->year;
  $bookings = car_rental_bookings::select('month')->groupBy('month')->where('school_id',$school_id)->where('year',$year)->where('status','Bookings Confirmed')->orderBy('created_at', 'asc')->groupBy('month')->get();

  return view('school.reports.bus_rentals.rental_bookings_report_view',compact('bookings'));


} // end mehtod 








	






}

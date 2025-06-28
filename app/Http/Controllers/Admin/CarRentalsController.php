<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\car;
use App\Models\car_bookings;
use App\Models\car_rental_bookings;
use App\Models\car_rental_cart;
use App\Models\rental_bookings_payments;
use App\Models\rental_operators;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Imagick\Driver;
use App\MtnMomo\MtnConfig;
use App\MtnMomo\MtnCollection;
use App\Models\tour_packages;

class CarRentalsController extends Controller
{
    


 
    ///Rental Operator Section///
    
    public function ViewRentalOperator(){


        $data['allData'] = rental_operators::latest()->get();
        
      return view('admin.car_rentals.view_rental_operators',$data);
    }




        
    public function AllBusRentals(){


        $data['allData'] = car::latest()->get();
        
      return view('admin.car_rentals.all_vehicle_rentals',$data);
    }



    

    public function AddNewRentalOperator(){

        
      return view('admin.car_rentals.add_rental_operator');
    }
    
    
    
    
    
    public function storeRentalOperator(Request $request)
    {
    
            $request->validate([
                'name' =>['required'],
                'email' =>['required'],
                'telephone' =>['required'],
                'telephone2' =>['required'],
                'address' =>['required'],
               
           ]);
    
            $email = $request->email;		
            $check = rental_operators::where('email',$email)->first();
    
            if($check == null){
    
    
            DB::transaction(function() use($request){
    
    
    
            
                $rental_operator = new rental_operators(); 
                $rental_operator->name = $request->name;
                $rental_operator->email = $request->email;
                $rental_operator->telephone = $request->telephone;
                $rental_operator->telephone2 = $request->telephone2;
                $rental_operator->address = $request->address;
                $rental_operator->created_at = Carbon::now(); 

                $rental_operator->save();    
            
               
            });
    
    
            return redirect()->route('all.rental.operators')->with('success','New Rental Operator Information Added Successfully');

    
          }
        
            else{
        
              
                    return back()->with('error','USER EMAIL ALREADY EXIST!!!');
              
              }	
           
       
    
    
    }
    
    
    
    
    public function EditRentalOperator($id){
    
        $data['editData'] = rental_operators::findOrFail($id);
		$data['carData'] = car::where('rental_operator_id',$id)->orderBy('id','asc')->get();
		////$data['routesData'] = transport_routes::where('rental_operator_id',$id)->orderBy('id','asc')->get();

    	return view('admin.car_rentals.edit_rental_operator',$data);

    
    }
    
    public function updateRentalOperator(Request $request,$id)
    {
        
        DB::transaction(function() use($request,$id){
    
            
        
            $rental_operator = rental_operators::where('id',$id)->first();  
            $rental_operator->name = $request->name;
            $rental_operator->email = $request->email;
            $rental_operator->telephone = $request->telephone;
            $rental_operator->telephone2 = $request->telephone2;
            $rental_operator->address = $request->address;

            $rental_operator->save();
    
           
        });
    
        
        return redirect()->route('all.rental.operators')->with('warning',' Rental Operator Information Updated Successfully!');

    
    }
    
    
    
    
    
    
    public function inactiveRentalOperator($id)
    { 
    
    rental_operators::findOrFail($id)->update(['status' => 0]);
    
    return back()->with('error',' Rental Operator Has Been Deactivated...');
    
    } 
    
    
    
    
    public function activeRentalOperator($id)
    {
    
    
    
    rental_operators::findOrFail($id)->update(['status' => 1]);
    
    return back()->with('info',' Rental Operator Has Been Activated...');
    
    
    }
    







    ///Rental Vehicles


    
public function StoreVehicle(Request $request,$id){


    $rentalCount = count($request->car_name);
    if ($rentalCount != NULL) {
        for ($i=0; $i <$rentalCount ; $i++) { 

            $assign_car = new car(); 
            $assign_car->rental_operator_id = $id;
            $assign_car->car_name = $request->car_name[$i];
            $assign_car->model = $request->model[$i];
            $assign_car->no_of_seats = $request->no_of_seats[$i];
            $assign_car->hire_price_fuel = $request->hire_price_fuel[$i];
            $assign_car->hire_price_no_fuel = $request->hire_price_no_fuel[$i];
        
            $assign_car->save();


        } // End For Loop
    }// End If Condition



    return redirect()->back()->with('success','Rental Vehicle Added Successfully'); 

}//End Method 



public function EditVehicle($id){

    $rental = car::findOrFail($id);
 
    return response()->json(array(
        'car' => $rental,
    ));


}//End Method 


public function UpdateVehicle(Request $request){

    $id = $request->input('id');
    $data = car::find($id);
    $data->car_name = $request->car_name;
    $data->model = $request->model;
    $data->no_of_seats = $request->no_of_seats;
    $data->hire_price_fuel = $request->hire_price_fuel;
    $data->hire_price_no_fuel = $request->hire_price_no_fuel;


    if ($request->file('car_photo')) {

        $manager = new ImageManager(new Driver());
        @unlink(public_path('upload/car_photos/'.$data->car_photo));
        $image = $request->file('car_photo');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        $new_img = $manager->read($request->file('car_photo'));
        $new_img = $new_img->resize(720,720);
        $new_img->toJpeg(80)->save(base_path('public/upload/car_photos/'.$name_gen));
        $save_url = $name_gen;
        $data['car_photo'] = $save_url;
    
      }    


    $data->save();

    return back()->with('info','Rental Vehicle Successfully Updated...');


}//End Method 



public function DeleteVehicle($id){

    car::find($id)->delete();


    return back()->with('error','Vehicle Deleted Successfully'); 

}//End Method





















///Rental Transportation Routes


/*

public function StoreRoute(Request $request,$id){


    $countRoute = count($request->route_name);
    if ($countRoute != NULL) {
        for ($i=0; $i <$countRoute ; $i++) { 

            $data = new transport_routes();
            $data->rental_operator_id = $id;
            $data->route_name = $request->route_name[$i];
            $data->route_price = $request->route_price[$i];
            $data->region_id = $request->region_id[$i];
            $data->save();


        } // End For Loop
    }// End If Condition



    return redirect()->back()->with('success','Transport Route Added Successfully'); 

}//End Method 



public function EditRoute($id){

    $route = transport_routes::findOrFail($id);
    $regions = tours_destinations::all();
 
    return response()->json(array(
        'route' => $route,
        'regions' => $regions,
    ));


}//End Method 


public function UpdateRoute(Request $request){

    $id = $request->input('id');
    $data = transport_routes::find($id);
    $data->route_name = $request->route_name;
    $data->route_price = $request->route_price;
    $data->region_id = $request->region_id;
    $data->save();

    return back()->with('info','Transport Route Successfully Updated...');


}//End Method 



public function DeleteRoute($id){

    transport_routes::find($id)->delete();


    return back()->with('error','Route Deleted Successfully'); 

}//End Method



*/





    ///Car Rentals School Bookings Section///

    
    
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


	    
    public function SchoolTourBookingDetails($booking_id){

		$booking = car_bookings::where('id',$booking_id)->first();
    	$rental_booking = car_rental_bookings::with(['rental','school'])->where('booking_id',$booking_id)->orderBy('id','ASC')->get();

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



      


      
	
public function SchoolTourBookingInvoice($booking_id){


    $booking = car_bookings::with('school')->where('id',$booking_id)->first();
    $rentals = car_rental_bookings::with(['rental','school'])->where('booking_id',$booking_id)->orderBy('id','DESC')->get();


    return view('admin.car_rentals.bookings.car_booking_invoice_details',compact('booking','rentals'));

} 



    










///Schools Section For Bus Rentals///
 


public function ViewBusRentalsDash(){

    
    $rentals = car::latest()->paginate(12);
    $tours = tour_packages::latest()->limit(6)->orderBy('id','DESC')->get();

    return view('school.bus_rentals.body.index',compact('rentals','tours'));
}



    
public function viewBusRentals()
{

    $rentals = car::latest()->paginate(18);

        return view('school.bus_rentals.bus_rentals.view_bus_rentals',compact('rentals'));

}




public function BusRentalDetails($id,)
{

    $rental = car::findOrFail($id);
    return view('school.bus_rentals.bus_rentals.bus_rental_details',compact('rental'));

}











    
public function FilterBusRentals()
{
    $rentals = car::latest()->paginate(18);

        return view('school.bus_rentals.bus_rentals.filter_bus_rentals',compact('rentals'));

}



public function BusRentalsFilterd(Request $request){

    $min_price = $request->min_price;
    $max_price = $request->max_price;

    $rentals = car::whereBetween('hire_price',[$min_price,$max_price])->latest()->paginate(18);
    
    return view('school.bus_rentals.bus_rentals.filter_bus_rentals',compact('rentals'));

} 






///Bus Renta lOperators Information And Tour Packages

public function BusRentalOperatorDetails($id)
{

$operator = rental_operators::findOrFail($id);
$rentals = car::where('rental_operator_id',$id)->latest()->paginate(18);

return view('school.bus_rentals.rental_operator.bus_rental_operator_details',compact('operator','rentals'));

}





public function BusRentalOperatorFilterd(Request $request){

$min_price = $request->min_price;
$max_price = $request->max_price;

$id = $request->id;
$operator = rental_operators::findOrFail($id);

$rentals = car::where('rental_operator_id',$id)->whereBetween('hire_price',[$min_price,$max_price])->latest()->paginate(18);

return view('school.bus_rentals.rental_operator.bus_rental_operator_details',compact('operator','rentals'));

} 










///Bus Rental Bookings

public function SubmitBusRentalsBookings(Request $request){


				

    $school_id = Auth::user()->id;
    $rentalCartCout = car_rental_cart::where('school_id',$school_id)->count();
   
    $subtotal = car_rental_cart::where('school_id',$school_id)->sum('pricetotal');

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

    
 $booking_id = car_bookings::insertGetId([ 
    'school_id' => $school_id,
     'name' => $request->name,
     'email' => $request->email,
     'school_tel1' => $request->school_tel1,
     'school_tel2' => $request->school_tel2, 
    'school_address' => $request->address,     	 
     'total_price' => $subtotal,
    'total_rentals' => $rentalCartCout,
    'booking_no' => mt_rand(10000000,99999999),
     'time' => Carbon::now()->toTimeString(),
     'date' => Carbon::today()->format('Y-m-d'),
     'month' => Carbon::today()->format('F Y'),
     'year' => Carbon::today()->format('Y'),
     'status' => 'Bookings Pending',
    'created_at' => Carbon::now(),

 ]);


 
$token_obj = $transaction->status;
$amount = $transaction->amount;
$currency = $transaction->currency;


$rental_payment = new rental_bookings_payments();
$rental_payment->booking_id = $booking_id;
$rental_payment->school_id = $school_id;
$rental_payment->amount = $amount;
$rental_payment->currency = $currency;
$rental_payment->reference_id = $transactionId;
$rental_payment->externalId = $externalId;
$rental_payment->payer_number =  $partyId;
$rental_payment->status =  $token_obj;
$rental_payment->sent_time = Carbon::now()->toTimeString();;
$rental_payment->payment_date = Carbon::today()->format('Y-m-d');;
$rental_payment->month = Carbon::now()->format('F Y');
$rental_payment->year = Carbon::now()->format('Y');
$rental_payment->save();


 $carts = car_rental_cart::where('school_id',$school_id)->orderBy('id','ASC')->get();
 foreach ($carts as $cartitem) {
    car_rental_bookings::insert([
    'booking_id' => $booking_id, 
    'school_id' => Auth::id(), 
    'car_id' => $cartitem->car_id,
    'vehicle_total' => $cartitem->vehicle_total,
    'total_days' => $cartitem->total_days,
    'start_day' => $cartitem->start_day,
    'end_day' => $cartitem->end_day,
    'fuel_status' => $cartitem->fuel_status,
    'price_per_day' => $cartitem->price_per_day,
    'pricetotal' => $cartitem->pricetotal,
    'date' => Carbon::today()->format('Y-m-d'),
    'month' => Carbon::today()->format('F Y'),
    'year' => Carbon::today()->format('Y'),
    'status' => 'Bookings Pending',
    'created_at' => Carbon::now(),

     ]);
 } 




 car_rental_cart::where('school_id',$school_id)->delete();

    //return redirect()->route('view.bus.rental.bookings')->with('success','Bus Rental Bookings Submitted Successfully');

    return redirect()->route('school.car.rentals.dashboard')->with('success','Bus Rental Bookings Submitted Successfully');



} // end method 









///School Bus Rental Bookings///

public function ViewBusRentalsBookings(){

    $bookings = car_bookings::where('school_id',Auth::id())->latest()->get();
    return view('school.bus_rentals.bookings.view_rental_bookings',compact('bookings'));

} 


    
public function BusRentalBookingDetails($booking_id){

    $school_id = Auth::user()->id;
    $booking = car_bookings::with('school')->where('id',$booking_id)->where('school_id',$school_id)->first();
    $rental_booking = car_rental_bookings::with('rental')->where('booking_id',$booking_id)->orderBy('id','ASC')->get();
    $payments = rental_bookings_payments::with('booking')->where('booking_id',$booking_id)->where('school_id',$school_id)->get();


    return view('school.bus_rentals.bookings.rental_booking_details',compact('booking','rental_booking','payments'));

} 





public function CancelBusRentalBookings($booking_id)
{

    
    car_bookings::findOrFail($booking_id)->update([
        'status' => 'Bookings Cancelled',
    ]);

    car_rental_bookings::where('booking_id', $booking_id)->update([
        'status' => 'Bookings Cancelled',
    ]);

    return redirect()->back()->with('error',' Bus Rental Bookings Cancelled !');
   
} // end method 






public function BusRentalBookingReportInvoice($booking_id){


$booking = car_bookings::with('school')->where('id',$booking_id)->where('school_id',Auth::id())->first();
$rentals = car_rental_bookings::with(['rental'])->where('booking_id',$booking_id)->orderBy('id','DESC')->get();


return view('school.bus_rentals.bookings.rental_booking_invoice_details',compact('booking','rentals'));

} 














///Rental Bookings Report ///



public function AllRentalBookingReport(){

    $bookings = car_rental_bookings::select('month')->groupBy('month')->where('status','Bookings Confirmed')->orderBy('created_at')->get();
    return view('admin.car_rentals.bookings.rental_bookings_report_view',compact('bookings'));


  }



public function AllRentalBookingsReportsByYear(Request $request){

  $year= $request->year;
  $bookings = car_rental_bookings::select('month')->groupBy('month')->where('year',$year)->where('status','Bookings Confirmed')->orderBy('created_at', 'asc')->groupBy('month')->get();

  return view('admin.car_rentals.bookings.rental_bookings_report_view',compact('bookings'));


} // end mehtod 














    // Bus Rental Seach 
	public function BusRentalSearch(Request $request){

        $request->validate(["search" => "required"]);

		$item = $request->search; 
       
		$rentals= car::where('car_name','LIKE',"%$item%")->get();
        $tours = tour_packages::latest()->limit(6)->orderBy('id','DESC')->get();
        
        

		return view('school.bus_rentals.bus_rentals.search',compact('tours','rentals'));

	}


///// Advance Search Options 

public function SearchBusRental(Request $request){

    $request->validate(["search" => "required"]);

    $item = $request->search;		  
    
    $rentals = car::where('car_name','LIKE',"%$item%")->select('car_name','car_photo','hire_price_fuel','id')->limit(6)->get();


    
    return view('school.bus_rentals.bus_rentals.search_bus_rental',compact('rentals'));



} // end method 









}

<?php

namespace App\Http\Controllers\School;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\tour_package_images; 
use App\Models\tour_packages;
use App\Models\TourOperator;
use App\Models\tours_destinations;

class SchoolToursController extends Controller
{

    
    public function ViewToursTravelDash(){

        return view('school.tours.body.index');
    }
  


        
    public function viewTourPackages()
    {

        $tours = tour_packages::where('status',1)->latest()->paginate(18);
            $destinations = tours_destinations::all();

            return view('school.tours.tours_packages.view_tour_packages',compact('tours','destinations'));

    }



    
    public function tourPackageDetails($id,)
    {

        $tour = tour_packages::findOrFail($id);
        $multiImgs = tour_package_images::where('tour_package_id',$id)->get();
        return view('school.tours.tours_packages.tour_package_details',compact('tour','multiImgs'));

    }











        
    public function FilterTourPackages()
    {

        $tours = tour_packages::where('status',1)->latest()->paginate(18);
            $destinations = tours_destinations::all();

            return view('school.tours.tours_packages.filter_tour_packages',compact('tours','destinations'));

    }



    public function TourPackagesFilterd(Request $request){

    	$sdate = date('Y-m-d',strtotime($request->start_date));
        $edate = date('Y-m-d',strtotime($request->end_date));
        $min_price = $request->min_price;
        $max_price = $request->max_price;
        $destination_id = $request->destination_id;


        $destinations = tours_destinations::all();
	
    	$tours = tour_packages::where('status',1)->whereBetween('availability_start_date',[$sdate,$edate])->whereBetween('availability_end_date',[$sdate,$edate])->whereBetween('students_price',[$min_price,$max_price])->where('destination_id',$destination_id)->latest()->paginate(18);
		return view('school.tours.tours_packages.filter_tour_packages',compact('tours','destinations'));

    } 






///Tour Agencies Information And Tour Packages
    
public function tourAgencyPackageDetails($id)
{

    $agency = TourOperator::findOrFail($id);
    $tours = tour_packages::where('status',1)->where('tour_operator_id',$id)->latest()->paginate(18);
    $destinations = tours_destinations::all();

    return view('school.tours.tour_agency.tour_agency_details',compact('agency','tours','destinations'));

}





public function TourAgencyPackagesFilterd(Request $request){

    $sdate = date('Y-m-d',strtotime($request->start_date));
    $edate = date('Y-m-d',strtotime($request->end_date));
    $min_price = $request->min_price;
    $max_price = $request->max_price;
    $destination_id = $request->destination_id;

    $id = $request->id;
    $agency = TourOperator::findOrFail($id);

    $destinations = tours_destinations::all();

    $tours = tour_packages::where('status',1)->where('tour_operator_id',$id)->whereBetween('availability_start_date',[$sdate,$edate])->whereBetween('availability_end_date',[$sdate,$edate])->whereBetween('students_price',[$min_price,$max_price])->where('destination_id',$destination_id)->latest()->paginate(18);
    return view('school.tours.tour_agency.tour_agency_details',compact('agency','tours','destinations'));

} 




    
}

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
use App\Models\tours_destinations;
use App\Models\tour_activities;
use App\Models\car;

class SchoolToursController extends Controller
{

    
    public function ViewToursTravelDash(){

        $tours = tour_packages::where('status',1)->orderBy('id','ASC')->paginate(12);
        $destinations = tours_destinations::all();
        $rentals = car::latest()->limit(6)->orderBy('id','DESC')->get();

        return view('school.tours.body.index',compact('tours','destinations','rentals'));
    }
  


    
    public function tourPackageDetails($id,)
    {

        $tour = tour_packages::findOrFail($id);
        $multiImgs = tour_package_images::where('tour_package_id',$id)->get();
        $tour_activities = tour_activities::where('tour_id',$id)->orderBy('id','asc')->get();

        return view('school.tours.tours_packages.tour_package_details',compact('tour','multiImgs','tour_activities'));

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






        
    // Tour Seach 
	public function TourSearch(Request $request){

        $request->validate(["search" => "required"]);

		$item = $request->search; 
        $destinations = tours_destinations::orderBy('destination_name','ASC')->get();
		$tours = tour_packages::where('name','LIKE',"%$item%")->get();
        $rentals = car::latest()->limit(6)->orderBy('id','DESC')->get();
        
        

		return view('school.tours.tours_packages.search',compact('tours','destinations','rentals'));

	}


///// Advance Search Options 

public function SearchTour(Request $request){

    $request->validate(["search" => "required"]);

    $item = $request->search;		  
    
    $tours = tour_packages::where('name','LIKE',"%$item%")->select('name','image_thambnail','students_price','id')->limit(6)->get();



    return view('school.tours.tours_packages.search_tour',compact('tours'));



} // end method 




public function ShopPage(){

    $tours = tour_packages::query();

   if(!empty($_GET['region'])) {
    $slugs = explode(',',$_GET['region']);
    $catIds = tours_destinations::select('id')->whereIn('destination_name',$slugs)->pluck('id')->toArray();
    $tours = $tours->whereIn('destination_id',$catIds)->paginate(3);

  }

    else{
         $tours = tour_packages::orderBy('id','DESC')->paginate(3);
    }


    $destzz = tours_destinations::orderBy('destination_name','ASC')->get();
    
    return view('school.tours.tours_packages.shop_page',compact('tours','destzz'));

} // end Method 




public function ShopFilter(Request $request){ 
    // dd($request->all());
 
    $data = $request->all();
 
    // Filter Category
        $regUrl = "";
        if (!empty($data['region'])) {
           foreach ($data['region'] as $region) {
              if (empty($regUrl)) {
                 $regUrl .= '&region='.$region;
              }else{
                $regUrl .= ','.$region;
              }
           } // end foreach condition
        } // end if condition 

 
        return redirect()->route('tours.filter.page',$regUrl);
 
 
 
 
        //Filter Price
 
        $tours = tour_packages::query();
 
         #Get minimum and maximum price to set in price filter range
         $min_price = tour_packages::min('students_price');
         $max_price = tour_packages::max('students_price');
         //dd('Minimum Price value in DB->'.$min_price,'Maximum Price value in DB->'.$max_price);
  
         #Get filter request parameters and set selected value in filter
         $filter_min_price = $request->min_price;
         $filter_max_price = $request->max_price;
          
         #Get products according to filter 
         if($filter_min_price && $filter_max_price){
             if($filter_min_price > 0 && $filter_max_price > 0)
             {
 
             $tours = $tours->whereBetween('students_price',[$filter_min_price,$filter_max_price])->paginate(3);
 
 
           }
         }  
         #Show default product list in Blade file
         else{
 
               $tours = tour_packages::orderBy('id','DESC')->paginate(3);
 
         }
 
 
       //  return view('shop.page',compact('products','min_price','max_price','filter_min_price','filter_max_price'));
 
         return redirect()->route('tours.filter.page',$tours,$min_price,$max_price,$filter_min_price,$filter_max_price);
 
 
 
 } // end Method 
 






    
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\school_terms;
use Illuminate\Support\Facades\DB;
use App\Models\tours_destinations;

class TermController extends Controller
{
    


    /*
    
//School Terms Section //



public function viewTerms()
{
    $terms = school_terms::orderBy('id','ASC')->get();
    return view('admin.school_terms.view_terms',compact('terms'));

}

public function storeTerm(Request $request)
{
   
    DB::transaction(function() use($request){

        $term = new school_terms();
        $term->name =  $request->name;
        $term->save();


    });

    
    return back()->with('info',' New School Term Information Added Successfully!');

}





public function editTerm($id)
{


    $term = school_terms::findOrFail($id);
    return response()->json(array(
        'term' => $term,
    ));


}


public function updateTerm(Request $request)
{

    $id = $request->input('id');
    $updateData = school_terms::find($id);
    $updateData->name = $request->name;
    $updateData->save();

    return back()->with('success','School Term Information Update Successfully!');


}

*/






    
//Tour Destinations Section //

public function viewTourDestinations()
{
    $tours = tours_destinations::orderBy('id','ASC')->get();
    return view('admin.tour_destinations.view_tour_destinations',compact('tours'));

}

public function storeTourDestination(Request $request)
{
   
    DB::transaction(function() use($request){
        $tours = new tours_destinations();
        $tours->destination_name = $request->destination_name;
        $tours->save();

    });
    
    return back()->with('info',' New Tour Destination Information Added Successfully!');

}





public function editTourDestination($id)
{

    $destination = tours_destinations::findOrFail($id);
    return response()->json(array(
        'destination' => $destination,
    ));


}


public function updateTourDestination(Request $request)
{

    $id = $request->input('id');
    $updateData = tours_destinations::find($id);
    $updateData->destination_name = $request->destination_name;
    $updateData->save();

    return back()->with('success','Tour Destination Information Update Successfully!');



}





}

<?php

namespace App\Http\Controllers\Tours;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\tour_package_images; 
use App\Models\tour_packages; 
use App\Models\tours_destinations;
use App\Models\tour_activities;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Imagick\Driver;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ToursTravelsController extends Controller
{



    
    public function addTourPackages()
    {

        $destinations = tours_destinations::all();
       
        return view('admin.tour_packages.add_tour_package',compact('destinations'));
 
    }





    public function storeTourPackage(Request $request)
    {
       
           
            $manager = new ImageManager(new Driver());
            $image = $request->file('image_thambnail');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            $new_img = $manager->read($request->file('image_thambnail'));
            $new_img = $new_img->resize(1280,1280);
            $new_img->toJpeg(80)->save(base_path('public/upload/tour_package_thumbnail/'.$name_gen));
            $save_url = $name_gen;

            $tour_id = tour_packages::insertGetId([
                'name' =>  $request->name,
                'destination_id' => $request->destination_id,
                'description' =>  $request->description,
                'students_price' =>  $request->students_price,
                'adults_price' =>  $request->adults_price,
                'availability_start_date' =>  $request->availability_start_date,
                'availability_end_date' =>  $request->availability_end_date,
                'image_thambnail' => $save_url,
                'created_at' => Carbon::now(),
     
                
            ]);
    

            $imagedata = [];
            if($images = $request->file('image_url'))
            {
            
            foreach($images as $img){
                $fileName = hexdec(uniqid()).'.'.$img->getClientOriginalExtension(); 
                $img->move(public_path('upload/tour_package_multimages'), $fileName);
                $upload_url = $fileName;
            

                $imagedata[] = [

                    'tour_package_id' => $tour_id,
                    'image_url' => $upload_url,
                    'created_at' => Carbon::now(),


                ];    
    
            }

        }


        tour_package_images::insert($imagedata);

        
        return back()->with('info',' New Tour Package Information Added Successfully!');

    }


 


    public function editTourPackage($id)
    {
 
     $tour_check = tour_packages::where('id',$id)->first();
 
     if($tour_check == true){
 

        $tour = tour_packages::findOrFail($id);
        $destinations = tours_destinations::all();
        $multiImgs = tour_package_images::where('tour_package_id',$id)->get();
        $edit_activities = tour_activities::where('tour_id',$id)->orderBy('id','asc')->get();
        return view('admin.tour_packages.edit_tour_package',compact('tour','destinations','multiImgs','edit_activities'));

     }

     else{
        abort(code:403);
    }

    }



    public function updateTourPackage(Request $request)
    {

        $id = $request->id;
        $updateTour = tour_packages::find($id);
        $updateTour->name = $request->name;
        $updateTour->destination_id = $request->destination_id;
        $updateTour->students_price = $request->students_price;
        $updateTour->adults_price = $request->adults_price;
        $updateTour->description = $request->description;
        $updateTour->availability_start_date = $request->availability_start_date;
        $updateTour->availability_end_date = $request->availability_end_date;

  if ($request->file('image_thambnail')) {

    $manager = new ImageManager(new Driver());
    @unlink(public_path('upload/tour_package_thumbnail/'.$updateTour->image_thambnail));
    $image = $request->file('image_thambnail');
    $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
    $new_img = $manager->read($request->file('image_thambnail'));
    $new_img = $new_img->resize(1280,1280);
    $new_img->toJpeg(80)->save(base_path('public/upload/tour_package_thumbnail/'.$name_gen));
    $save_url = $name_gen;
    $updateTour['image_thambnail'] = $save_url;

  }    
  
        $updateTour->save();



        return back()->with('success','Tour Package Information Update Successfully!');



    }





    

    public function updateTourMultiImage(Request $request)
    {
        $imgs = $request->image_url;

        foreach($imgs as $id => $img){
            $imgDel = tour_package_images::findOrFail($id);
            $old_img = $imgDel->image_url;
            @unlink(public_path('upload/tour_package_multimages/'.$old_img));
            $fileName = hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
            $img->move(public_path('upload/tour_package_multimages'), $fileName);
            $upload_url = $fileName;



            tour_package_images::where('id',$id)->update([
                'image_url' =>$upload_url,
                'updated_at' => Carbon::now(),

            ]);
        }



        return back()->with('success','Tour Package Multi-Image Updated Successfully!');


    }




    
    public function deleteTourMultiImage($id)
    {
        $oldimg = tour_package_images::findOrFail($id);
        ////unlink($oldimg->image_url);
        $old_img = $oldimg->image_url;
        @unlink(public_path('upload/tour_package_multimages/'.$old_img));
        tour_package_images::findOrFail($id)->delete();


        return back()->with('error','Tour Package Multi-Image DELETED!');



    }


    public function deleteTourPackage($id)
    {
        $tour = tour_packages::findOrFail($id);
        unlink($tour->image_thambnail);
        tour_packages::findOrfail($id)->delete();

        $images = tour_package_images::where('tour_package_id',$id)->get();
        foreach($images as $img){
            //unlink($img->image_url);
            @unlink(public_path('upload/tour_package_multimages/'.$img->image_url));
            tour_package_images::where('tour_package_id',$id)->delete();
        }


        return back()->with('error','Tour Package Information DELETED!');


    }    




    
public function deactivateTourPackage($id)
{ 

tour_packages::findOrFail($id)->update(['status' => 0]);

return back()->with('error',' Tour Package Has Been Deactivated...');

} 




public function activateTourPackage($id)
{
  


tour_packages::findOrFail($id)->update(['status' => 1]);

return back()->with('info',' Tour Package Has Been Activated...');


}














    ///Tour Activities
    
public function StoreTourActivity(Request $request,$id){

            
    	$tour_act = count($request->tour_activity);
    	if ($tour_act !=NULL) {
    		for ($i=0; $i <$tour_act ; $i++) { 

    			$activities = new tour_activities();
    			$activities->tour_id =  $id;
    			$activities->tour_activity = $request->tour_activity[$i];
    		
    			$activities->save();

    		} // End For Loop
    	}// End If Condition



    return back()->with('success','Tour Activity Added Successfully'); 

}//End Method 



public function EditTourActivity($id){

    $act = tour_activities::findOrFail($id);
 
    return response()->json(array(
        'tour_acts' => $act,
    ));


}//End Method 


public function UpdateTourActivity(Request $request){

    $id = $request->input('id');
    $data = tour_activities::find($id);
    $data->tour_activity = $request->tour_activity;

    $data->save();

    return back()->with('info','Tour Activity Successfully Updated...');


}//End Method 





public function DeleteTourActivity($id){

    tour_activities::find($id)->delete();


    return back()->with('error','Tour Activity Deleted Successfully'); 

}//End Method





    
}

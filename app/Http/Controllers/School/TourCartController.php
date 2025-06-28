<?php

namespace App\Http\Controllers\School;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request; 
use App\Models\tour_packages; 
use App\Models\tours_cart;
use Illuminate\Support\Facades\Auth;

class TourCartController extends Controller
{
    

    
    
	public function ViewTourCart(Request $request){
        
        $school_id = Auth::user()->id;
        $tourCart = tours_cart::where('school_id',$school_id)->get();
        return view('school.tours.cart.view_tour_cart',compact('tourCart'));
		
	} // end mehtod 


    
    public function addTotourCart(Request $request){
         
        $school_id = Auth::user()->id;
        $tour = tour_packages::find($request->id);
        $stdprice = $tour->students_price;
        $adtprice = $tour->adults_price;
    
        tours_cart::insert([
            'school_id' => $school_id, 
            'tour_package_id' => $tour->id, 
            'stud_qty' => $request->stud_qty, 
            'stud_price' => $stdprice,
            'adult_qty' => $request->adult_qty, 
            'adult_price' => $adtprice,
            'stud_pricetotal' => (float)$request->stud_qty * (float)$stdprice, 
            'adult_pricetotal' => (float)$request->adult_qty * (float)$adtprice,
                    
        ]);
    
        return back()->with('success','Tour Package Successfully Added To Your Tour Cart...');
    
    
    
        }
    

    
    
       public function IncreStudentQtyCart($id){

        $student_qty = tours_cart::findOrFail($id);
        $price = $student_qty->stud_price;
        $qty = $student_qty->stud_qty;
        $new_stud_qty = $qty + 1;
        $new_stud_pricetotal = (float)$new_stud_qty * (float)$price;

        tours_cart::where('id',$id)->update([
            'stud_qty' => $new_stud_qty,
            'stud_pricetotal' => $new_stud_pricetotal,              
            ]);

            return back();
    
        }// end mehtod 





        public function DecreStudentQtyCart($id){

            $student_qty = tours_cart::findOrFail($id);
            $price = $student_qty->stud_price;
            $qty = $student_qty->stud_qty;
            $new_stud_qty = $qty - 1;
            $new_stud_pricetotal = (float)$new_stud_qty * (float)$price;
    
            tours_cart::where('id',$id)->update([
                'stud_qty' => $new_stud_qty,
                'stud_pricetotal' => $new_stud_pricetotal,                  
                ]);
    
                return back();
        
            }// end mehtod 



            public function IncreAdultQtyCart($id){

                $adult_qty = tours_cart::findOrFail($id);
                $price = $adult_qty->adult_price;
                $qty = $adult_qty->adult_qty;
                $new_adult_qty = $qty + 1;
                $new_adult_pricetotal = (float)$new_adult_qty * (float)$price;
        
                tours_cart::where('id',$id)->update([
                    'adult_qty' => $new_adult_qty,
                    'adult_pricetotal' => $new_adult_pricetotal,              
                    ]);
        
                    return back();
            
                }// end mehtod 
        
        
        
        
        
                public function DecreAdultQtyCart($id){
        
                    $adult_qty = tours_cart::findOrFail($id);
                    $price = $adult_qty->adult_price;
                    $qty = $adult_qty->adult_qty;
                    $new_adult_qty = $qty - 1;
                    $new_adult_pricetotal = (float)$new_adult_qty * (float)$price;
            
                    tours_cart::where('id',$id)->update([
                        'adult_qty' => $new_adult_qty,
                        'adult_pricetotal' => $new_adult_pricetotal,                  
                        ]);
            
                        return back();
                
                    }// end mehtod 
        
        
    
    
        public function removeTourCart(Request $request){
    
            $rowId = $request->id;
            tours_cart::destroy($rowId);
            return back()->with('error','Tour Deleted From Your Cart!');
    
        }
    

            
    public function deleteTourFromCart(Request $request){

        $row_id = $request->id;
        tours_cart::destroy($row_id);

        return back()->with('error','Tour Deleted From Your Cart!');



    } 
    
        public function clearTourCart(){
    
            tours_cart::instance('cart')->destroy();
            return back();
    
        }
    







}

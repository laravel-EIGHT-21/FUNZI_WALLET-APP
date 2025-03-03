<?php

namespace App\Http\Controllers\School;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\purchaseItems;
use App\models\purchase_categories;
use App\Models\purchaseStocks;
use App\Models\school_terms;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class PurchasesController extends Controller
{
    


     // Purchase items categories Section //

     public function ViewPurchaseItemCategoryList()
     {
         $school_id = Auth::user()->id;
         $categories = purchase_categories::where('school_id',$school_id)->latest()->get();
         return view('school.purchases.purchase_item_categories',compact('categories'));
 
     }
 
 
     public function StorePurchaseItemCategory(Request $request)
     {
         DB::transaction(function() use($request){
 
 
 
             $validatedData = $request->validate([
 
                 'name' => 'required',
         
                ]);
 
 
         $school_id = Auth::user()->id;
         $purchase = new purchase_categories();
         $purchase->school_id = $school_id;
         $purchase->name = $request->name;
         $purchase->save();
 
         });
 
           
   return back()->with('success','New Purchase Category Information Added Successfully');
           
     }
 
 
 
     public function EditPurchaseItemCategory($id)
 
     {  
         
         $purchasecate = purchase_categories::findOrFail($id);
 
         return response()->json(array(
             'purchasecate' => $purchasecate,
         ));
 
     }
 
 
     public function UpdatePurchaseItemCategory(Request $request)
     {
 
         $id = $request->input('id');
         $purchase = purchase_categories::find($id);
         $purchase->name = $request->input('name');
         $purchase->update();
     
     
         return back()->with('info','Puchase Item Category Successfully Updated...');
 
    }
 
 
 
 
 
 
    //Purchase Items  Section
 
    
 
    public function ViewPurchaseItemList()
    {
 
     $school_id = Auth::user()->id;
     $categories = purchase_categories::where('school_id',$school_id)->get();
    $purchasesitems = purchaseItems::where('school_id',$school_id)->latest()->get();
 
    return view('school.purchases.purchase_items.view_purchase_items',compact('purchasesitems','categories'));
 
    }
 
    
    public function StorePurchaseItem(Request $request){
 
 $name = $request->name;
 $category_id = $request->category_id;
 $school_id = Auth::user()->id;
 
 $check = purchaseItems::where('name',$name)->where('category_id', $category_id)->where('school_id',$school_id)->first();
 
 if($check == null){
 
 
        DB::transaction(function() use($request){
    
         $school_id = Auth::user()->id;
        $purchaseitem = new purchaseItems();
        $purchaseitem->school_id = $school_id;
        $purchaseitem->name = $request->name;
        $purchaseitem->category_id = $request->category_id;    	
          $purchaseitem->save();
 
 
        });
 
 
 
        return back()->with('success','New Purchase Item Information Added Successfully');
           
 
            
 
    }
 
    else{
 
 
        return back()->with('error','RECORD ALREADY EXISTS...');
 
      
      }
 
 
    } // End Method 
 
 
 
 
    public function EditPurchaseItem($id){
 
     $school_id = Auth::user()->id;
     $purchaseitem = purchaseItems::findOrFail($id);
     $categories = purchase_categories::where('school_id',$school_id)->get();
 
     return response()->json(array(
         'purchaseitem' => $purchaseitem,
         'categories' => $categories,
     ));
 
 
    }
 
 
    public function UpdatePurchaseItem(Request $request){
    
      $id = $request->input('id');
        $purchase = purchaseItems::find($id);
        $purchase->name = $request->name;
        $purchase->category_id = $request->category_id;
         $purchase->save(); 
         
 
        return back()->with('info','Item Information Updated Successfully');
 
 
 
    }// END METHOD
 
 
 
 
 
 
 
 
    //Purchased Stocks Details Section
 
 
    
     public function ViewAllPurchases()
     {
 
             $school_id = Auth::user()->id;
             $data['terms'] = school_terms::all();
 
             $data['purchasesitems'] = purchaseItems::where('school_id',$school_id)->latest()->get();
 
             $data['purchases_term1'] = purchaseStocks::with(['school'])->where('school_id',$school_id)->where('term_id',1)->latest()->get();
 
             $data['purchases_term2'] = purchaseStocks::with(['school'])->where('school_id',$school_id)->where('term_id',2)->latest()->get();
 
             $data['purchases_term3'] = purchaseStocks::with(['school'])->where('school_id',$school_id)->where('term_id',3)->latest()->get();
 
     return view('school.purchases.view_all_purchases',$data);
 
     }
 
 
     
    
     public function ViewPurchasesFilter()
     {
 
         $school_id = Auth::user()->id;
         
     $data['purchases_term1'] = purchaseStocks::with(['school'])->where('school_id',$school_id)->where('term_id',1)->latest()->get();
     
     $data['purchases_term2'] = purchaseStocks::with(['school'])->where('school_id',$school_id)->where('term_id',2)->latest()->get();
 
     $data['purchases_term3'] = purchaseStocks::with(['school'])->where('school_id',$school_id)->where('term_id',3)->latest()->get();
 
     return view('school.purchases.purchases_filter_details',$data);
 
     }
 
 
     
 
  
     public function SubmitPurchaseInfo(Request $request){
 
 
         $purchase_id = $request->purchase_id;
         $term_id = $request->term_id;
         $date = Carbon::parse($request->date)->format('Y-m-d');
         $month = Carbon::parse($request->month)->format('F Y');
         $year = Carbon::parse($request->year)->format('Y');
         $school_id = Auth::user()->id;
 
         $check = purchaseStocks::where('date',$date)->where('month', $month)->where('year', $year)->where('purchase_id',$purchase_id)->where('term_id',$term_id)->where('school_id',$school_id)->first();
 
         if($check == null){
 
         DB::transaction(function() use($request){
             $school_id = Auth::user()->id;
 
         $purchasestock = new purchaseStocks();
         $purchasestock->school_id = $school_id;
         $purchasestock->purchase_id = $request->purchase_id;
         $purchasestock->term_id = $request->term_id;
         $purchasestock->date = date('Y-m-d',strtotime($request->date));		
         $purchasestock->month = Carbon::now()->format('F Y');
         $purchasestock->year = Carbon::now()->format('Y');
         $purchasestock->item_qty = $request->item_qty;		 
         $purchasestock->unit_price= $request->unit_price;
         $purchasestock->total_price= (float)$request->unit_price * (float)$request->item_qty;
         $purchasestock->supplier = $request->supplier;
         $purchasestock->invoice_no= $request->invoice_no;
         $purchasestock->notes= $request->notes;
          $purchasestock->save();
  
 
 
         });
 
 
         return back()->with('success','Purchase Information Submitted Successfully');
 
     }
 
 
     else{
 
 
         return back()->with('error','PURCHASE RECORD ALREADY EXISTS...');
       
       }
 
 
     } // End Method 
 
 
     public function EditPurchaseInfo($id){
        
 
 
         $school_id = Auth::user()->id;
         $purchase = purchaseStocks::findOrFail($id);
         $purchaseitem = purchaseItems::where('school_id',$school_id)->get();
         $terms = school_terms::all();
     
         return response()->json(array(
             'purchase' => $purchase,
             'purchaseitem' => $purchaseitem,
             'terms' => $terms,
         ));
 
 
 
     }
 
 
     public function UpdatePurchaseInfo(Request $request){
 
 
         $id = $request->input('id');
              
         DB::transaction(function() use($request,$id){
 
         $purchasestock = purchaseStocks::find($id);
         $purchasestock->purchase_id = $request->purchase_id;
         $purchasestock->term_id = $request->term_id;
         $purchasestock->date = date('Y-m-d',strtotime($request->date));		
         $purchasestock->item_qty = $request->item_qty;		 
         $purchasestock->unit_price= $request->unit_price;
         $purchasestock->total_price= (float)$request->unit_price * (float)$request->item_qty;
         $purchasestock->supplier = $request->supplier;
         $purchasestock->invoice_no= $request->invoice_no;
         $purchasestock->notes= $request->notes;
          $purchasestock->save();
 
          
         });
 
 
         return back()->with('info','Purchase Information Updated Successfully');
 
 
 
     }// END METHOD
 
 
 
 
     
     public function PurchaseInfoReport($id){
         $school_id = Auth::user()->id;
     
         $purchase = purchaseStocks::where('id',$id)->where('school_id',$school_id)->first();
         
         if($purchase == true){
         
         $details = purchaseStocks::with(['school'])->where('id',$id)->where('school_id',$school_id)->get();
             
         return view('school.purchases.purchase_report', compact('details'));
         
         
           }
            
           else{
         
              abort(code:403);
             
             }	
         
        }
 
 
 
 
 
 
 
 
 
 
  
        public function ViewPurchaseDetails($id){
 
    
         $school_id = Auth::user()->id;
         
         
         $purchase = purchaseStocks::where('id',$id)->where('school_id',$school_id)->first();
         
         if($purchase == true){
         
           $terms = school_terms::all();
         
         $purchase_details = purchaseStocks::with('school')->where('id',$id)->where('school_id',$school_id)->get();
         
         $otherpurchase_details = purchaseStocks::with('school')->where('purchase_id',$purchase->purchase_id)->where('year',$purchase->year)->where('school_id',$school_id)->latest()->get();
 
         
         return view('school.purchases.purchase_details', compact('purchase_details','otherpurchase_details'));
         
         
         }
         
         else{
         
         abort(code:403);
         
         }	
         
         
             }
 



}

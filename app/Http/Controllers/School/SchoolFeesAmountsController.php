<?php

namespace App\Http\Controllers\School;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\schoolsfees_amounts;
use Illuminate\Support\Facades\Auth;
use App\Models\school_terms;

class SchoolFeesAmountsController extends Controller
{
    


    
    public function ViewFeeAmount(){
        $data['allData'] = schoolsfees_amounts::select('rand_no','school_id','student_day_boarding','year')->groupBy('rand_no','school_id','student_day_boarding','year')->where('school_id',Auth::id())->get();
    	return view('school.schoolfees_amounts.view_fees_amounts',$data);
    }


    public function AddFeeAmount(){
    	$data['terms'] = school_terms::all();
    	//$data['classes'] = classes::all();
    	return view('school.schoolfees_amounts.add_fees_amounts',$data);
    }


    public function StoreFeeAmount(Request $request){ 
        
   $school_id = Auth::user()->id;
   $school_code = Auth::user()->school_id_no;
   $rand_no = rand(100,1000000);
 
    	$countClass = count($request->student_class); 
    	if ($countClass !=NULL) {
    		for ($i=0; $i <$countClass ; $i++) { 

    			$fee_amount = new schoolsfees_amounts();
                $fee_amount->school_id = $school_id;
                $fee_amount->school_code = $school_code;
                $fee_amount->rand_no = $rand_no;
                $fee_amount->year = $request->year[$i];
                $fee_amount->term_id = $request->term_id[$i];
    			$fee_amount->student_class = $request->student_class[$i];
                $fee_amount->student_day_boarding = $request->student_day_boarding[$i];
    			$fee_amount->fees_total_amount = $request->fees_total_amount[$i];
    			$fee_amount->save();

    		} // End For Loop
    	}// End If Condition
 
    	
    	return redirect()->route('fee.amount.view')->with('success','SchoolFees Amounts Submitted Successfully');

    }  // End Method 



    public function EditFeeAmount($rand_no){

        $school_code = Auth::user()->school_id_no;
        $school = schoolsfees_amounts::where('school_id',Auth::id())->where('school_code',$school_code)->where('rand_no',$rand_no)->first();

        if($school == true){

    	$data['editData'] = schoolsfees_amounts::where('rand_no',$rand_no)->orderBy('id','asc')->get();
    	$data['terms'] = school_terms::all();

    	return view('school.schoolfees_amounts.edit_fees_amounts',$data);

    }

    else{
        abort(code:403);
    }


    }
 

    public function UpdateFeeAmount(Request $request,$rand_no){

        $school_id = Auth::user()->id;
        $school_code = Auth::user()->school_id_no;
        $rand_no_new = rand(100,1000000); 
    	$countClass = count($request->student_class);
        schoolsfees_amounts::where('rand_no',$rand_no)->delete();
                for ($i=0; $i <$countClass ; $i++) { 
                    $fee_amount_update = new schoolsfees_amounts();
                    $fee_amount_update->rand_no = $rand_no_new;
                    $fee_amount_update->school_id = $school_id; 
                     $fee_amount_update->school_code = $school_code;
                    $fee_amount_update->year = $request->year[$i];
                    $fee_amount_update->term_id = $request->term_id[$i];
                    $fee_amount_update->student_class = $request->student_class[$i];
                    $fee_amount_update->fees_total_amount = $request->fees_total_amount[$i];
                    $fee_amount_update->save();
    
                } // End For Loop	 


    	
    	return redirect()->route('fee.amount.view')->with('success','SchoolFees Amounts Updated Successfully');

    } // end Method 





}

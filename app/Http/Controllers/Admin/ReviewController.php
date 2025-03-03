<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\tour_reviews;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; 
use Carbon\Carbon;


class ReviewController extends Controller
{
    


    

    public function StoreReview(Request $request){
 
        $tour =  $request->input('tour_id');
        $operator =  $request->input('tour_operator_id');

        $request->validate([
            'comment' => 'required',
        ]);

        tour_reviews::insert([
            'tour_id' => $tour,
            'school_id' => Auth::id(),
            'comment' => $request->comment,
            'rating' => $request->rate,
            'tour_operator_id' => $operator,
            'created_at' => Carbon::now(),
        ]);


        return redirect()->back()->with('info','Your Review will Be Approved By Admin Soon');  

    }// End Method 



    
    public function PendingReviews(){

        $review = tour_reviews::where('status',0)->latest()->get();
        return view('admin.tour_reviews.pending_review',compact('review'));

    }// End Method 

    public function UpdateReviewStatus($review_id){

        tour_reviews::findOrFail($review_id)->update([
			'status' => '1',
		]);

        return back()->with('info','Tour Review Approved...');

    }// End Method 



    public function PublishedReviews(){

        $review = tour_reviews::where('status',1)->latest()->get();
        return view('admin.tour_reviews.published_reviews',compact('review'));

    }// End Method 


    

    public function AllTourReviews(){
        $id = Auth::user()->id;
        $review = tour_reviews::where('tour_operator_id',$id)->where('status',1)->orderBy('id','DESC')->get();
        return view('tours_travels.tours.tour_reviews',compact('review'));


    }// End Method 





}

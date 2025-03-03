  
@extends('school.body.admin_master')
@section('content')
        

@section('title')

Add SchoolFees Amounts | funziwallet

@endsection

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<div class="container-xxl flex-grow-1 container-p-y">

<h4 class="py-3 mb-4">
      <span class="text-muted fw-light">Add /</span> SchoolFees Amounts Information
    </h4>

    <div class="row">

<div class="mb-4">

<a href="{{ route('fee.amount.view')}}" class="btn rounded-pill btn-warning" style="float:right;"><i class='tf-icons mdi mdi-arrow-left mdi-20px'></i>Back</a>

</div>

</div>


    
    <div class="row">

              <!-- User Content -->
              <div class="col-xl-12 col-lg-7 col-md-7 order-0 order-md-1">

          
                <div class="card mb-4">
                  <h5 class="card-header">Add SchoolFees Amounts Information Below</h5>
                  <div class="card-body">
                    <form action="{{ route('store.fee.amount') }}" enctype="multipart/form-data" method="POST" >
                    @csrf
     <div class="add_item">
            <div class="row">
            <div class="col-md-2">


            <div class="form-floating form-floating-outline mb-4">
            <select id="student_class" name="student_class[]" required class="select2 form-select form-select-lg" data-allow-clear="true"">
            <option value="">Select Class</option>
                <option value="SeniorOne">Senior One</option>
                <option value="SeniorTwo">Senior Two</option>
                <option value="SeniorThree">Senior Three</option>
                <option value="SeniorFour">Senior Four</option>
                <option value="SeniorFive">Senior Five</option>
                <option value="SeniorSix">Senior Six</option>
                <option value="PrimaryOne">Primary One</option>
                <option value="PrimaryTwo">Primary Two</option>
                <option value="PrimaryThree">Primary Three</option>
                <option value="PrimaryFour">Primary Four</option>
                <option value="PrimaryFive">Primary Five</option>
                <option value="PrimarySix">Primary Six</option>
                <option value="PrimarySeven">Primary Seven</option>
                <option value="TopClass">Top Class</option>
                <option value="MiddleClass">Middle Class</option>
                <option value="BabyClass">Baby Class</option>
                <option value="PrePrimary">Pre-Primary</option>

            </select>
            <label for="student_class">Classes</label>
            </div>
            

            </div>


            <div class="col-md-2">


            <div class="form-floating form-floating-outline mb-4">
            <select id="term_id" name="term_id[]" required class="select2 form-select form-select-lg" data-allow-clear="true"">
            <option value="">Select Term</option>
            @foreach ($terms as $term)
            <option value="{{ $term->id }}">{{ $term->name }}</option>
            @endforeach

            </select>
            <label for="term_id">School Terms</label>
            </div>

            </div>




            
            <div class="col-md-2">
                    <div class="form-floating form-floating-outline">
                    <select id="student_dayboarding" name="student_day_boarding" required class="select2 form-select" data-allow-clear="true">
                    <option value="">Select Section</option>
                    <option value="DaySection">Day Section</option>
                    <option value="BoardingSection">Boarding Section</option>


                    </select>
                    <label for="student_dayboarding">Day or Boarding</label>
                    </div>
                    </div>

            <div class="col-md-2">

<div class="form-floating form-floating-outline mb-4">
<input class="form-control" type="text" name="fees_total_amount[]" required  id="html5-text-input" />
<label for="html5-text-input">Amount</label>
</div>

</div>



<div class="col-md-2">


<div class="form-floating form-floating-outline mb-4">
<input class="form-control" type="text" name="year[]" required  id="html5-text-input" />
<label for="html5-text-input">Year</label>
</div>

</div>



          
<div class="col-md-2" style="padding-top: 10px;">
 <span class="btn btn-sm btn-success addeventmore"><i class="tf-icons mdi mdi-plus mdi-20px"></i> </span>    		
     	</div><!-- End col-md-5 -->

            </div>








              </div>




            <div class="row">
            <div class="mb-5">
            <button type="submit" class="btn btn-primary me-2">Submit SchoolFees Amounts </button>
            </div>
            </div>
        

            </form>
            </div>
            </div>



            

              </div>
              <!--/ User Content -->




            </div>
            


            
    </div>

    
  <div style="visibility: hidden;">
  	<div class="whole_extra_item_add" id="whole_extra_item_add">
  		<div class="delete_whole_extra_item_add" id="delete_whole_extra_item_add">
  			<div class="row">

            <div class="col-md-2">


            <div class="form-floating form-floating-outline mb-4">
            <div class="controls">
            <select name="student_class[]" required class="form-select form-select-lg" data-allow-clear="true"">
            <option value="">Select Class</option>
                <option value="SeniorOne">Senior One</option>
                <option value="SeniorTwo">Senior Two</option>
                <option value="SeniorThree">Senior Three</option>
                <option value="SeniorFour">Senior Four</option>
                <option value="SeniorFive">Senior Five</option>
                <option value="SeniorSix">Senior Six</option>
                <option value="PrimaryOne">Primary One</option>
                <option value="PrimaryTwo">Primary Two</option>
                <option value="PrimaryThree">Primary Three</option>
                <option value="PrimaryFour">Primary Four</option>
                <option value="PrimaryFive">Primary Five</option>
                <option value="PrimarySix">Primary Six</option>
                <option value="PrimarySeven">Primary Seven</option>
                <option value="TopClass">Top Class</option>
                <option value="MiddleClass">Middle Class</option>
                <option value="BabyClass">Baby Class</option>
                <option value="PrePrimary">Pre-Primary</option>

            </select>
            </div>

            </div>
            

            </div>


            <div class="col-md-2">


            <div class="form-floating form-floating-outline mb-4">
            <div class="controls">
            <select id="term_id" name="term_id[]" required class="form-select form-select-lg" data-allow-clear="true"">
            <option value="">Select Term</option>
            @foreach ($terms as $term)
            <option value="{{ $term->id }}">{{ $term->name }}</option>
            @endforeach

            </select>
        </div>
           
            </div>

            </div>



            <div class="col-md-2">
                    <div class="form-floating form-floating-outline">
                    <select id="student_dayboarding" name="student_day_boarding" required class="form-select form-select-lg" data-allow-clear="true">
                    <option value="">Select Section</option>
                    <option value="DaySection">Day Section</option>
                    <option value="BoardingSection">Boarding Section</option>


                    </select>
                    <label for="student_dayboarding">Day or Boarding</label>
                    </div>
                    </div>


            <div class="col-md-2">


<div class="form-floating form-floating-outline mb-4">
<input class="form-control" type="text" name="fees_total_amount[]" required id="html5-text-input" />
<label for="html5-text-input">Amount</label>
</div>

</div>



<div class="col-md-2">


<div class="form-floating form-floating-outline mb-4">
<input class="form-control" type="text" name="year[]" required  id="html5-text-input" />
<label for="html5-text-input">Year</label>
</div>

</div>



<div class="col-md-2" style="padding-top: 10px;">
 <span class="btn btn-sm btn-success addeventmore"><i class="tf-icons mdi mdi-plus mdi-20px"></i> </span> 
  <span class="btn btn-sm btn-danger removeeventmore"><i class="tf-icons mdi mdi-minus-circle mdi-20px"></i> </span>    		
     	</div><!-- End col-md-2 -->
     	
       </div>  			
  		</div>  		
  	</div>  	
  </div>


                      <script type="text/javascript">
 	$(document).ready(function(){
 		var counter = 0;
 		$(document).on("click",".addeventmore",function(){
 			var whole_extra_item_add = $('#whole_extra_item_add').html();
 			$(this).closest(".add_item").append(whole_extra_item_add);
 			counter++;
 		});
 		$(document).on("click",'.removeeventmore',function(event){
 			$(this).closest(".delete_whole_extra_item_add").remove();
 			counter -= 1
 		});

 	});
 </script>



@endsection

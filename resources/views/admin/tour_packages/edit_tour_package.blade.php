@extends('admin.body.admin_master')
@section('content')
        


@section('title')

Update Tour Package | funzitours

@endsection

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>


        <!-- Content -->
        
<div class="container-xxl flex-grow-1 container-p-y">

<h4 class="py-3 mb-4">
<span class="text-muted fw-light">Update / Tour /</span> Package  ( {{$tour->name}} ) Information
</h4>

<div class="row">

<div class="mb-4">

<a href="{{ route('all.school.tour.packages')}}" class="btn rounded-pill btn-warning" style="float:right;"><i class='tf-icons mdi mdi-arrow-left mdi-20px'></i>Back</a>

</div>

</div>




            
<div class="col-xl-12 col-lg-7 col-md-7 order-0 order-md-1">

    <ul class="nav nav-pills flex-column flex-md-row mb-3">
    
    <li class="nav-item">
    <button type="button" class="nav-link active py-2" role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-justified-update" aria-controls="navs-pills-justified-update" aria-selected="true"><i class="ti ti-bus me-1"></i>Update Tour Package Details</button>
    </li>


    <li class="nav-item">
        <button type="button" class="nav-link py-2" role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-justified-activities" aria-controls="navs-pills-justified-activities" aria-selected="false"><i class="tf-icons ti ti-bus me-1"></i> Tour Activites</button>
        </li>
    
    
    </ul>
    
    <div class="tab-content">

        
<div class="tab-pane fade show active" id="navs-pills-justified-update" role="tabpanel">

        
<div class="row">

    <!-- User Content -->
    <div class="col-xl-12 col-lg-7 col-md-7 order-0 order-md-1">
    
        <div class="card mb-4">
            <h5 class="card-header">Update Tour Package Information Below</h5>

           

            <div class="card-body pt-2 mt-1">
          <form class="card-body" method="post" action="{{ route('tour.package.update') }}" enctype="multipart/form-data">
          @csrf

          <input type="hidden" name="id" value="{{$tour->id}}">
  

        
          <div class="row g-6">
            <div class="col-md-6">
              <div class="form-floating form-floating-outline">
                <input type="text" id="multicol-username" name="name" class="form-control" value="{{$tour->name}}" />
                <label for="multicol-username">Title</label>
              </div>
            </div>
            <div class="col-md-6">
                <div class="form-floating form-floating-outline">
                  <select id="destinationid" name="destination_id" required class="select2 form-select form-select-lg" data-allow-clear="true">
                    <option value="">Select Region</option>
                    @foreach ($destinations as $dest)
            <option value="{{ $dest->id }}" {{ $dest->id == $tour->destination_id ? 'selected':''}}>{{ $dest->destination_name }}</option>
            @endforeach


                  </select>
                  <label for="destinationid">Destination regions</label>
                </div>
              </div>

          </div>
            

          
          <hr class="my-6 mx-n4" />

          <h6>Description</h6>

            
            <div class="input-group input-group-merge">

            <div class="form-floating form-floating-outline">
              <textarea class="form-control h-px-75" aria-label="With textarea" name="description" >{{$tour->description}}</textarea>
              <label>Tour Description</label>
            </div>
          </div>

          <hr class="my-6 mx-n4" />


          <h6>Tour Package Main Image Thambnai</h6>
          <div class="row g-6">




            <div class="col-md-6">
              <div class="form-floating form-floating-outline">
                <input type="file" onChange="mainThamUrl(this)" name="image_thambnail" class="form-control" value="{{$tour->image_thambnail}}" />
                <label for="multicol-file">Main Thambnail</label>
              </div>
              <br />
              <img src="" id="mainThmb">
            </div>



          </div>


<br />

            

<hr class="my-6 mx-n4" />
<h6>Pricing & Tour Availability</h6>
<div class="row g-4">
  <div class="col-md-6">
    <div class="form-floating form-floating-outline">
      <input type="text" id="multicol-first-name" name="students_price" required class="form-control" value="{{$tour->students_price}}" />
      <label for="multicol-first-name">Students Price</label>
    </div>
  </div>

  <div class="col-md-6">
    <div class="form-floating form-floating-outline">
      <input type="text" id="multicol-last-name" name="adults_price" required class="form-control" value="{{$tour->adults_price}}" />
      <label for="multicol-last-name">Adults Price</label>
    </div>
  </div>


  <div class="col-md-6">
    <div class="form-floating form-floating-outline">
        <input type="text" class="form-control" name="availability_start_date" required id="flatpickr-date" value="{{$tour->availability_start_date}}" />
        <label for="flatpickr-date">Start Date</label>
      </div>
  </div>

  <div class="col-md-6">
    <div class="form-floating form-floating-outline">
        <input type="text" class="form-control" name="availability_end_date" required id="flatpickr2-date" value="{{$tour->availability_end_date}}" />
        <label for="flatpickr2-date">End Date</label>
      </div>
  </div>

</div>


  <br />

            

          <hr class="my-6 mx-n4" />

          <div class="pt-6">
            <button type="submit" class="btn btn-primary me-4">Update Package Information</button>

          </div>

            </form>

            </div>

        </div>
            
        

  <br/>


    
<div class="row">
  <div class="card mb-6">
      <h5 class="card-header">Multiple Images Details</h5>
      <form class="card-body" method="post" action="{{ route('tour.multi.image.update') }}" enctype="multipart/form-data">
        @csrf


        <h6>Update Tour Package Multiple Images</h6>
        <div class="row g-6">
          @foreach($multiImgs as $img)

          
<div class="col-md-6">

  <div class="card" style="width: 22rem;">
    <img src="{{ (!empty($img->image_url))? url('upload/tour_package_multimages/'.$img->image_url):url('upload/no_image.jpg') }}" class="card-img-top" style="height:200px; width:350px;" >
    <div class="card-body">
    <h5 class="card-title">
      <a href="{{route('tour.multi.image.delete',$img->id)}}" class="btn btn-sm btn-danger" id="delete" title="Delete"><i class="ri-delete-bin-2-line"></i></a>
  
    </h5> 
    <p class="card-text">
      <div class="form-floating form-floating-outline">
        <input type="file" name="image_url[ {{$img->id}} ]" class="form-control" />
        <label for="multiImg">Change Image</label>
      </div>
    </p>
    
    </div>
  </div>
  
    </div>

@endforeach

        </div>


<br />



        <hr class="my-6 mx-n4" />

        <div class="pt-6">
          <button type="submit" class="btn btn-primary me-4">Update Package Images</button>

        </div>
      </form>
    </div>

</div>



              <br/>


        


</div>

</div>

</div>







<div class="tab-pane fade" id="navs-pills-justified-activities" role="tabpanel">


    <div class="row">

        <h4 class="text"><b>Add Tour Activities</b></h4>
        <div class="nav-align-top mb-4">
    
            <div class="col-xl-12">
    
            
              <div class="row">
      <div class="col-xl">
        <div class="card mb-4">

          <div class="card-body">
            

    
              <button type="button" onclick="addTourActivity()" id="addTourActivity" class="btn btn-primary">Add Tour Activities</button>

              <button type="button" onclick="viewTourActivity()" id="viewTourActivity" class="btn btn-sm btn-warning">View Tour Activities</button>
    
<br/><br/>

              <div class="TourActivityHide" id="TourActivityHide">
                <form action="{{ route('store.tour.activities',$tour->id) }}" method="post">
                    @csrf
    
                    
                    <input type="hidden" name="tour_id" value="{{$tour->id}}" >

                    <div class="add_car_remove" id="add_car_remove">
                    <div class="add_item">

                        <div class="row">
                        
                        
                        
                        <div class="col-md-4">
                        
                        <div class="form-floating form-floating-outline mb-4">
                        <input class="form-control" type="text" name="tour_activity[]" required  id="html5-text-input" />
                        <label for="html5-text-input">Tour Activity</label>
                        </div>
                        
                        </div>
                        

                        <div class="col-md-3" style="padding-top: 10px;">
                            <span class="btn btn-sm btn-success addeventmore"><i class="tf-icons mdi mdi-plus mdi-20px"></i> </span> 
                           
                            </div><!-- End col-md-2 -->
                            
                        </div>
                        
                        
                        </div>
                        
                    </div>
                        
                        
                        
                        
                        
                        
                        
                        <div class="row">
                        <div class="mb-5">
                        <button type="submit" class="btn btn-success me-1">Submit Information</button>
                        </div>
                        </div>
                        
                        
                        </form>
                        </div>

                        
    
           
          </div>
        </div>






      </div>
    
    
          </div>

          <div class="card mb-4">

            <div class="card-body" id="TourActivityview">
          <div class="row">

            
 <table id="one_config" class="table border table-striped table-bordered text-nowrap">
    <thead>
        <tr>
            <th scope="col">Tour Activity</th>

            <th scope="col">Action</th> 
        </tr>
    </thead>
    <tbody>
  
        @foreach ($edit_activities as $item) 
       
        <tr>
            <td>{{ $item->tour_activity }}</td>
            

            <td>
<a href="javascript:void(0);" class="btn btn-sm btn-info px-3 radius-30" title="Edit" data-bs-toggle="modal" data-bs-target="#editTourActivity" id="{{ $item->id }}" onclick="TourActivityView(this.id)">
    <i class="mdi mdi-square-edit-outline me-2"></i></a>




<a href="{{ route('delete.tour.activity',$item->id) }}" class="btn tbn-sm btn-danger px-3 radius-30" id="delete" title="Delete"> <i class="mdi mdi-delete-empty me-1"></i></a>  

            </td>
        </tr>
        @endforeach
        
    </tbody>
</table>

          </div>
        
      </div>
    </div>


    
    <div class="modal fade" id="editTourActivity" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title" id="modalCenterTitle"> Update Tour Activity Detail</h4>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>


            <form action="{{ url('/admin/update/tour/activity')}}" enctype="multipart/form-data"  method="post">
                @csrf
                
                <input type="hidden" name="id" id="acts_id">

            <div class="modal-body">
              <div class="row g-2">
                <div class="col mb-4 mt-2">
                  <div class="form-floating form-floating-outline">
                    <input type="text" id="touractivity" class="form-control" name="tour_activity" required>
                    <label for="name">Tour Activity</label>
                  </div>
                </div>
              </div>
            </div>


            <div class="modal-footer">

                <button type="submit" class="btn btn-primary me-sm-3 me-1 data-submit">Update Activity</button>
            </div>
        </form>
          </div>
        </div>
      </div>


    
    
</div>
    
      </div>
      </div>
    
   
</div>






    </div>

</div>

</div>
 





 <!--========== Start Rental Vehicle Add ==============-->

<div style="visibility: hidden;">
    <div class="whole_extra_item_add" id="whole_extra_item_add">
    <div class="delete_whole_extra_item_add" id="delete_whole_extra_item_add">
    <div class="row">

  <div class="col-md-4">
  
  <div class="form-floating form-floating-outline mb-4">
  <input class="form-control" type="text" name="tour_activity[]" required  id="html5-text-input" />
  <label for="html5-text-input">Tour Activity</label>
  </div>
  
  </div>
  
    
    
    <div class="col-md-3" style="padding-top: 10px;">
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


<script type="text/javascript">


$.ajaxSetup({
headers:{
'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
}
})


function TourActivityView(id){

$.ajax({
type: 'GET',
url: '/admin/edit/tour/activity/'+id,
dataType: 'json',
success:function(data){

$('#touractivity').val(data.tour_acts.tour_activity);
$('#act_id').val(id);


}
})

}

</script>



<script>
    $('#TourActivityHide').hide();
    $('#TourActivityview').show();

    function addTourActivity(){
        $('#TourActivityHide').show();
        $('#TourActivityview').hide();
        $('#addTourActivity').hide();
    }

    function viewTourActivity(){
        $('#TourActivityHide').hide();
        $('#TourActivityview').show();
        $('#addTourActivity').hide();
    }

</script>



        
	<script type="text/javascript">

		function mainThamUrl(input) {
			if (input.files && input.files[0]) {
				var reader = new FileReader();
				reader.onload = function(e){
					$('#mainThmb').attr('src',e.target.result).width(100).height(80);

				};
				reader.readAsDataURL(input.files[0]);
			}
		}
	  </script>



<script type="text/javascript">
 
            $(document).ready(function(){
             $('#multiImg').on('change', function(){ //on file input change
                if (window.File && window.FileReader && window.FileList && window.Blob) //check File API supported browser
                {
                    var data = $(this)[0].files; //this file data
                     
                    $.each(data, function(index, file){ //loop though each file
                        if(/(\.|\/)(gif|jpe?g|png)$/i.test(file.type)){ //check supported file type
                            var fRead = new FileReader(); //new filereader
                            fRead.onload = (function(file){ //trigger function on successful read
                            return function(e) {
                                var img = $('<img/>').addClass('thumb').attr('src', e.target.result) .width(100)
                            .height(90); //create image element 
                                $('#preview_img').append(img); //append image to output element
                            };
                            })(file);
                            fRead.readAsDataURL(file); //URL representing the file's data.
                        }
                    });
                     
                }else{
                    alert("Your browser doesn't support File API!"); //if File API is absent
                }
             });
            });
             
            </script>
                
          
            
@endsection
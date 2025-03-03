
@extends('tours_travels.body.admin_master')
@section('content')
        

@section('title')

Update Tour Package | funzitours

@endsection

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" ></script>


        <!-- Content -->
        
        <div class="container-xxl flex-grow-1 container-p-y">

            
            
            <h4 class="py-3 mb-4">
                <span class="text-muted fw-light">Update / Tour /</span> Package  Information
              </h4>

              
            <div class="row">

              <div class="mb-4">
              
              <a href="{{ route('view.tour.package')}}" class="btn rounded-pill btn-primary" style="float:right;"><i class='tf-icons ri-arrow-left-line ri-20px'></i>Back</a>
              
              </div>
              
              </div>
  

              <br/>

                          

<div class="row">
    <div class="card mb-6">
        <h5 class="card-header">Update Tour Package Details</h5>
        <form class="card-body" method="post" action="{{ route('tour.package.update') }}" enctype="multipart/form-data">
          @csrf

          <input type="hidden" name="id" value="{{$tour->id}}">


          <h6>1. Account Details</h6>
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
        <!-- / Content -->
                
        


        
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
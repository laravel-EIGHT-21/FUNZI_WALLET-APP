
@extends('tours_travels.body.admin_master')
@section('content')
        

@section('title')

Add Tour Packages | funzitours

@endsection

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" ></script>


        <!-- Content -->
        
        <div class="container-xxl flex-grow-1 container-p-y">

            
            
            <h4 class="py-3 mb-4">
                <span class="text-muted fw-light">Add / New Tour /</span> Package 
              </h4>
  

              <br/>

                          

<div class="row">
    <div class="card mb-6">
        <h5 class="card-header">Add New Tour Package Details</h5>
        <form class="card-body" method="post" action="{{ route('tour.package.store') }}" enctype="multipart/form-data">
          @csrf 

          <h6>1. Account Details</h6>
          <div class="row g-6">
            <div class="col-md-6">
              <div class="form-floating form-floating-outline">
                <input type="text" id="multicol-username" name="name" class="form-control" placeholder="Package title" />
                <label for="multicol-username">Title</label>
              </div>
            </div>
            <div class="col-md-6">
                <div class="form-floating form-floating-outline">
                  <select id="destinationid" name="destination_id" required class="select2 form-select form-select-lg" data-allow-clear="true">
                    <option value="">Select Region</option>
                    @foreach ($destinations as $dest)
            <option value="{{ $dest->id }}">{{ $dest->destination_name }}</option>
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
              <textarea class="form-control h-px-75" aria-label="With textarea" name="description" placeholder="Lorem ipsum"></textarea>
              <label>Tour Description</label>
            </div>
          </div>

          <hr class="my-6 mx-n4" />


          <h6>Tour Package Images</h6>
          <div class="row g-6">




            <div class="col-md-6">
              <div class="form-floating form-floating-outline">
                <input type="file" onChange="mainThamUrl(this)" name="image_thambnail" class="form-control" />
                <label for="multicol-file">Main Thambnail</label>
              </div>
              <br />
              <img src="" id="mainThmb">
            </div>



            <div class="col-md-6">
              <div class="form-floating form-floating-outline">
                <input type="file" multiple=" " id="multiImg" name="image_url[]" class="form-control" />
                <label for="multiImg">Multiple Images</label>
              </div>

              <br />

              <div class="row" id="preview_img" ></div>

            </div>



          </div>


<br />


<hr class="my-6 mx-n4" />
<h6>Pricing & Tour Availability</h6>
<div class="row g-4">
  <div class="col-md-6">
    <div class="form-floating form-floating-outline">
      <input type="text" id="multicol-first-name" name="students_price" class="form-control" placeholder="Enter Price" />
      <label for="multicol-first-name">Students Price</label>
    </div>
  </div>

  <div class="col-md-6">
    <div class="form-floating form-floating-outline">
      <input type="text" id="multicol-last-name" name="adults_price" class="form-control" placeholder="Enter Price" />
      <label for="multicol-last-name">Adults Price</label>
    </div>
  </div>

  <div class="col-md-6">
    <div class="form-floating form-floating-outline">
        <input type="text" class="form-control" name="availability_start_date" placeholder="YYYY-MM-DD" id="flatpickr-date" />
        <label for="flatpickr-date">Start Date</label>
      </div>
  </div>

  <div class="col-md-6">
    <div class="form-floating form-floating-outline">
        <input type="text" class="form-control" name="availability_end_date" placeholder="YYYY-MM-DD" id="flatpickr2-date" />
        <label for="flatpickr2-date">End Date</label>
      </div>
  </div>

</div>


          <hr class="my-6 mx-n4" />

          <div class="pt-6">
            <button type="submit" class="btn btn-primary me-4">Save Package Information</button>

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
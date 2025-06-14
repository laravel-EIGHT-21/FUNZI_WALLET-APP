  
@extends('admin.body.admin_master')
@section('content')
        

@section('title')

Edit Rental Operator | funziwallet

@endsection



<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<div class="container-xxl flex-grow-1 container-p-y">

<h4 class="py-3 mb-4">
<span class="text-muted fw-light">Update /</span>Rental Operator ( {{$editData->name}} ) Information
</h4>

<div class="row">

<div class="mb-4">

<a href="{{ route('all.rental.operators')}}" class="btn rounded-pill btn-warning" style="float:right;"><i class='tf-icons mdi mdi-arrow-left mdi-20px'></i>Back</a>

</div>

</div>




            
<div class="col-xl-12 col-lg-7 col-md-7 order-0 order-md-1">

    <ul class="nav nav-pills flex-column flex-md-row mb-3">
    
    <li class="nav-item">
    <button type="button" class="nav-link active py-2" role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-justified-update" aria-controls="navs-pills-justified-update" aria-selected="true"><i class="ti ti-bus me-1"></i>Update Rental Operator Details</button>
    </li>


    <li class="nav-item">
        <button type="button" class="nav-link py-2" role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-justified-vehicles" aria-controls="navs-pills-justified-vehicles" aria-selected="false"><i class="tf-icons ti ti-bus me-1"></i> Rental Vehicles</button>
        </li>
    
    
    </ul>
    
    <div class="tab-content">

        
<div class="tab-pane fade show active" id="navs-pills-justified-update" role="tabpanel">

        
<div class="row">

    <!-- User Content -->
    <div class="col-xl-12 col-lg-7 col-md-7 order-0 order-md-1">
    
        <div class="card mb-4">
            <h5 class="card-header">Add Rental Operator Information Below</h5>

            <hr>

           

            <div class="card-body pt-2 mt-1">
            <form action="{{ route('update.rental.operator',$editData->id) }}" enctype="multipart/form-data" method="POST" >
            @csrf
            
            
            <div class="row">
            
            
            
            <div class="col-md-4">
            
            <div class="form-floating form-floating-outline mb-4">
            <input class="form-control" type="text" name="name" required  id="html5-text-input" value="{{$editData->name}}" />
            <label for="html5-text-input">Operator Name</label>
            </div>
            </div>
            
            
            
            <div class="col-md-4">
            
            <div class="form-floating form-floating-outline mb-4">
            <input class="form-control" type="text" name="email" required  id="html5-text-input" value="{{$editData->email}}" />
            <label for="html5-text-input">Email</label>
            </div>
            </div>
            
            
            
            <div class="col-4">
            
            <div class="form-floating form-floating-outline mb-4">
            <input class="form-control" type="text" name="telephone" required  maxlength="10" id="html5-text-input" value="{{$editData->telephone}}" />
            <label for="html5-text-input">Telephone 1</label>
            </div>
            </div>
            
            </div>
            
            
            
            
            
            <div class="row">    
            
            <div class="col-4">
            
            <div class="form-floating form-floating-outline mb-4">
            <input class="form-control" type="text" name="telephone2" maxlength="10" required  id="html5-text-input" value="{{$editData->telephone2}}" />
            <label for="html5-text-input">Telephone 2</label>
            </div>
            </div>
            
            
            <div class="col-4">
            
            <div class="form-floating form-floating-outline mb-4">
            <input class="form-control" type="text" name="address" required  id="html5-text-input" value="{{$editData->address}}" />
            <label for="html5-text-input">Address</label>
            </div>
            </div>
            
            
            
            </div>


            <div class="row">
                <div class="col-md-4">
                    
                    <button type="submit" class="btn btn-success" style="margin-top: 28px;">Update</button>
                    
                </div> 
            </div> 

            </form>

            </div>

        </div>
            
        


</div>

</div>

</div>







<div class="tab-pane fade" id="navs-pills-justified-vehicles" role="tabpanel">


    <div class="row">

        <h4 class="text"><b>Add Rental Vehicle</b></h4>
        <div class="nav-align-top mb-4">
    
            <div class="col-xl-12">
    
            
              <div class="row">
      <div class="col-xl">
        <div class="card mb-4">

          <div class="card-body">
            

    
              <button type="button" onclick="addVehicle()" id="addVehicle" class="btn btn-primary">Add New Rental Vehicle</button>

              <button type="button" onclick="viewVehicle()" id="viewVehicle" class="btn btn-sm btn-warning">View Rental Vehicles</button>
    
<br/><br/>

              <div class="vehicleHide" id="vehicleHide">
                <form action="{{ route('store.vehicle',$editData->id) }}" method="post">
                    @csrf
    
                    
                    <input type="hidden" name="rental_operator_id" value="{{$editData->id}}" >

                    <div class="add_car_remove" id="add_car_remove">
                    <div class="add_item">

                        <div class="row">
                        
                        
                        
                        <div class="col-md-2">
                        
                        <div class="form-floating form-floating-outline mb-4">
                        <input class="form-control" type="text" name="car_name[]" required  id="html5-text-input" />
                        <label for="html5-text-input">Car Name</label>
                        </div>
                        
                        </div>
                        
                        
                    <div class="col-md-2">
                    
                        <div class="form-floating form-floating-outline mb-4">
                        <input class="form-control" type="text" name="model[]" required  id="html5-text-input"/>
                        <label for="html5-text-input">Car Model</label>
                        </div>
                        
                        </div>
                        
                        <div class="col-md-2">
                        
                        <div class="form-floating form-floating-outline mb-4">
                        <input class="form-control" type="text" name="no_of_seats[]" required  id="html5-text-input" />
                        <label for="html5-text-input">No of Seats</label>
                        </div>
                        
                        </div>
                        
                        
                        
                        <div class="col-md-2">
                        
                        <div class="form-floating form-floating-outline mb-4">
                        <input class="form-control" type="text" name="hire_price_fuel[]" required  id="html5-text-input" />
                        <label for="html5-text-input">Hire Price (With Fuel)</label>
                        </div>
                        
                        </div>


                                                
                        <div class="col-md-2">
                        
                          <div class="form-floating form-floating-outline mb-4">
                          <input class="form-control" type="text" name="hire_price_no_fuel[]" required  id="html5-text-input" />
                          <label for="html5-text-input">Hire Price (No Fuel)</label>
                          </div>
                          
                          </div>
  
  
                        

                        <div class="col-md-2" style="padding-top: 10px;">
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

            <div class="card-body" id="vehicleview">
          <div class="row">

            
 <table id="one_config" class="table border table-striped table-bordered text-nowrap">
    <thead>
        <tr>
            <th scope="col">Vehicle</th>
            <th scope="col">Model</th>
            <th scope="col">No. of Seats</th>
            <th scope="col">Hire Px. (Fuel)</th>
            <th scope="col">Hire Px. (No Fuel)</th>
            <th scope="col">Action</th> 
        </tr>
    </thead>
    <tbody>
  
        @foreach ($carData as $item) 
       
        <tr> 


        
            <td>
                <div class="d-flex align-items-center">
                <img src="{{ (!empty($item->car_photo))? url('upload/car_photos/'.$item->car_photo):url('upload/no_image.jpg') }}" class="rounded-circle" alt="..." width="56" height="56">
                
                
                <div class="ms-3">
                <h6 class="fw-semibold mb-0 fs-6">{{ $item->car_name}}</h6>
            
                </div>
                </div>
                </td>



            <td>{{ $item->model }}</td>
            <td>{{ $item->no_of_seats }}</td>
            <td>{{ $item->hire_price_fuel }}</td>
            <td>{{ $item->hire_price_no_fuel }}</td>

            <td>
<a href="javascript:void(0);" class="btn btn-sm btn-info px-3 radius-30" title="Edit" data-bs-toggle="modal" data-bs-target="#editVehicle" id="{{ $item->id }}" onclick="vehicleView(this.id)">
    <i class="mdi mdi-square-edit-outline me-2"></i></a>




<a href="{{ route('delete.vehicle',$item->id) }}" class="btn tbn-sm btn-danger px-3 radius-30" id="delete" title="Delete"> <i class="mdi mdi-delete-empty me-1"></i></a>  

            </td>
        </tr>
        @endforeach
        
    </tbody>
</table>

          </div>
        
      </div>
    </div>


    
    <div class="modal fade" id="editVehicle" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title" id="modalCenterTitle"> Update Rental Vehicle Detail</h4>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>


            <form action="{{ url('/admin/update/vehicle')}}" enctype="multipart/form-data"  method="post">
                @csrf
                
                <input type="hidden" name="id" id="car_id">

            <div class="modal-body">
              <div class="row g-2">
                <div class="col mb-4 mt-2">
                  <div class="form-floating form-floating-outline">
                    <input type="text" id="carname" class="form-control" name="car_name" required>
                    <label for="name">Vehicle Name</label>
                  </div>
                </div>

                <div class="col mb-4 mt-2">
                  <div class="form-floating form-floating-outline">
                    <input type="text" id="model" class="form-control" name="model" required>
                    <label for="name">Car Model</label>
                  </div>
                </div>

              </div>


              <div class="row g-2">
                <div class="col mb-4 mt-2">
                  <div class="form-floating form-floating-outline">
                    <input type="text" id="seats" class="form-control" name="no_of_seats" required>
                    <label for="name">No of Seats</label>
                  </div>
                </div>

                <div class="col mb-4 mt-2">
                  <div class="form-floating form-floating-outline">
                    <input type="text" id="hirepricefuel" class="form-control" name="hire_price_fuel" required>
                    <label for="name">Hire Price(With Fuel)</label>
                  </div>
                </div>


                <div class="col mb-4 mt-2">
                  <div class="form-floating form-floating-outline">
                    <input type="text" id="hirepricenofuel" class="form-control" name="hire_price_no_fuel" required>
                    <label for="name">Hire Price (No Fuel)</label>
                  </div>
                </div>

              </div>


              <div class="row g-2">
                <div class="col mb-4 mt-2">
                    <div class="form-floating form-floating-outline">
                      <input type="file" id="carphoto" class="form-control" name="car_photo" >
                      <label for="name">Photo</label>
                    </div>
                  </div>
              </div>
                


            </div>
            <div class="modal-footer">

                <button type="submit" class="btn btn-primary me-sm-3 me-1 data-submit">Update Vehicle</button>
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
    
    <div class="col-md-2">
    
    
    
    <div class="form-floating form-floating-outline mb-4">
    <input class="form-control" type="text" name="car_name[]" required  id="html5-text-input" />
    <label for="html5-text-input">Car Name</label>
    </div>
    
    
    </div>
    
    
<div class="col-md-2">

    <div class="form-floating form-floating-outline mb-4">
    <input class="form-control" type="text" name="model[]" required  id="html5-text-input" />
    <label for="html5-text-input">Car Model</label>
    </div>
    
    </div>
    
    <div class="col-md-2">
    
    <div class="form-floating form-floating-outline mb-4">
    <input class="form-control" type="text" name="no_of_seats[]" required  id="html5-text-input" />
    <label for="html5-text-input">No Of Seats</label>
    </div>
    </div>
    
    
    <div class="col-md-2">
    
        <div class="form-floating form-floating-outline mb-4">
            <input class="form-control" type="text" name="hire_price_fuel[]" required  id="html5-text-input" />
            <label for="html5-text-input">Hire Price (With Fuel)</label>
            </div>
    </div>


        
    <div class="col-md-2">
    
      <div class="form-floating form-floating-outline mb-4">
          <input class="form-control" type="text" name="hire_price_no_fuel[]" required  id="html5-text-input" />
          <label for="html5-text-input">Hire Price (No Fuel)</label>
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
    

    













<script type="text/javascript">


$.ajaxSetup({
headers:{
'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
}
})


function vehicleView(id){

$.ajax({
type: 'GET',
url: '/admin/edit/vehicle/'+id,
dataType: 'json',
success:function(data){

$('#carname').val(data.car.car_name);
$('#model').val(data.car.model);
$('#seats').val(data.car.no_of_seats);
$('#hirepricefuel').val(data.car.hire_price_fuel);
$('#hirepricenofuel').val(data.car.hire_price_no_fuel);
$('#carphoto').val(data.car.car_photo);
$('#car_id').val(id);


}
})

}

</script>



<script>
    $('#vehicleHide').hide();
    $('#vehicleview').show();

    function addVehicle(){
        $('#vehicleHide').show();
        $('#vehicleview').hide();
        $('#addVehicle').hide();
    }

    function viewVehicle(){
        $('#vehicleHide').hide();
        $('#vehicleview').show();
        $('#addVehicle').hide();
    }

</script>



@endsection

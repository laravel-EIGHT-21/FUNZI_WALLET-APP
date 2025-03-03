  
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
    
    <li class="nav-item">
    <button type="button" class="nav-link py-2" role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-justified-routes" aria-controls="navs-pills-justified-routes" aria-selected="false"><i class="tf-icons ti ti-bus me-1"></i> Transport Routes</button>
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

            <div class="card-body">
                <div class="d-flex align-items-start align-items-sm-center gap-4">
                  <img src="{{ (!empty($editData->rental_photo))? url('upload/rental_photos/'.$editData->rental_photo):url('upload/no_image.jpg') }}" alt="user-avatar" class="d-block w-px-200 h-px-170 rounded"  />
        
                </div>
              </div>


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
            
            
            
            <div class="col-4">
            
                <div class="form-floating form-floating-outline mb-4">
                <input class="form-control" type="file" name="rental_photo" id="html5-text-input" value="{{$editData->rental_photo}}" />
                <label for="html5-text-input">Photo</label>
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
                        <input class="form-control" type="text" name="hire_price[]" required  id="html5-text-input" />
                        <label for="html5-text-input">Hire Price Amount</label>
                        </div>
                        
                        </div>


                        

                        <div class="col-md-2" style="padding-top: 10px;">
                            <span class="btn btn-sm btn-success addeventmore"><i class="tf-icons mdi mdi-plus mdi-20px"></i> </span> 
                            <span class="btn btn-sm btn-danger removeeventmore"><i class="tf-icons mdi mdi-minus-circle mdi-20px"></i> </span>    		
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
            <th scope="col">Hire Px.</th>
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
            <td>{{ $item->hire_price }}</td>

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
                    <input type="text" id="hireprice" class="form-control" name="hire_price" required>
                    <label for="name">Hire Price</label>
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




<div class="tab-pane fade" id="navs-pills-justified-routes" role="tabpanel">

    
    <div class="row">

        <h4 class="text"><b>Add Transport Routes</b></h4>
        <div class="nav-align-top mb-4">
    
            <div class="col-xl-12">
    
            
              <div class="row">
      <div class="col-xl">
        <div class="card mb-4">

          <div class="card-body">
            

    
              <button type="button" onclick="addRoute()" id="addRoute" class="btn btn-primary">Add New Routes</button>

              <button type="button" onclick="viewRoute()" id="viewRoute" class="btn btn-sm btn-warning">View Routes</button>
    
<br/><br/>


<div class="routesHide" id="routesHide">
    <form action="{{ route('store.route',$editData->id) }}" method="post">
        @csrf

        
        <input type="hidden" name="rental_operator_id" value="{{$editData->id}}" >


        <div class="add_route_remove" id="add_route_remove">
        <div class="add_item2">


        <div class="row">

            <div class="col-md-3">

                <div class="form-floating form-floating-outline mb-4">
                <input class="form-control" type="text" name="route_name[]" required  id="html5-text-input" />
                <label for="html5-text-input">Route Name</label>
                </div>
                
                </div>


                <div class="col-md-3">

                    <div class="form-floating form-floating-outline mb-4">
                    <input class="form-control" type="text" name="route_price[]" required  id="html5-text-input" />
                    <label for="html5-text-input">Route Price</label>
                    </div>
                    
                    </div>
                

                    <div class="col-md-3">


                        <div class="form-floating form-floating-outline mb-4">
                        <select id="region_id" name="region_id[]" required class="select2 form-select form-select-lg" data-allow-clear="true"">
                        <option value="">Select Region</option>
                        @foreach ($regions as $region)
                        <option value="{{ $region->id }}">{{ $region->destination_name }}</option>
                        @endforeach
            
                        </select>
                        <label for="region_id">Regions</label>
                        </div>
            
                        </div> 


                        <div class="col-md-2" style="padding-top: 10px;">
                            <span class="btn btn-sm btn-success addeventmore1"><i class="tf-icons mdi mdi-plus mdi-20px"></i> </span> 
                            <span class="btn btn-sm btn-danger removeeventmore1"><i class="tf-icons mdi mdi-minus-circle mdi-20px"></i> </span>    		
                            </div><!-- End col-md-2 -->
           
                       </div>
                    </div>    
                
                </div>


                       <div class="row">
        <div class="col-md-4">
            
            <button type="submit" class="btn btn-success" style="margin-top: 28px;">Save</button>
            
        </div> 
    </div> 
    </form> 
</div>




          </div>

        </div>



        <div class="card mb-4">

            <div class="card-body" id="routesview">
          <div class="row">

            
 <table id="zero_config" class="table border table-striped table-bordered text-nowrap">
    <thead>
        <tr>
            <th scope="col">Route</th>
            <th scope="col">Price</th>
            <th scope="col">Region</th>
            <th scope="col">Action</th> 
        </tr>
    </thead>
    <tbody>
  
        @foreach ($routesData as $item) 
       
        <tr> 
            <td>{{ $item->route_name }}</td>
            <td>{{ $item->route_price }}</td>
            <td>{{ $item['region']['destination_name'] }}</td>
            <td>
<a href="javascript:void(0);" class="btn btn-sm btn-info px-3 radius-30" title="Edit" data-bs-toggle="modal" data-bs-target="#editRoute" id="{{ $item->id }}" onclick="routeView(this.id)">
    <i class="mdi mdi-square-edit-outline me-2"></i></a>




<a href="{{ route('delete.route',$item->id) }}" class="btn tbn-sm btn-danger px-3 radius-30" id="delete" title="Delete"> <i class="mdi mdi-delete-empty me-1"></i></a>  

            </td>
        </tr>
        @endforeach
        
    </tbody>
</table>

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
            <input class="form-control" type="text" name="hire_price[]" required  id="html5-text-input" />
            <label for="html5-text-input">Hire Price Amount</label>
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
        $(this).closest("#add_car_remove").remove();
        counter -= 1
    });
    
    });
    </script>
    



  <!--========== Start Transport Route Add ==============-->
  <div style="visibility: hidden">
    <div class="whole_extra_item_add2" id="whole_extra_item_add2">
       <div class="add_route_remove" id="add_route_remove">
          <div class="container mt-2">



            <div class="row">
                <div class="col-md-3">

                    <div class="form-floating form-floating-outline mb-4">
                    <input class="form-control" type="text" name="route_name[]" required  id="html5-text-input" />
                    <label for="html5-text-input">Route Name</label>
                    </div>
                    
                    </div>


                    <div class="col-md-3">

                        <div class="form-floating form-floating-outline mb-4">
                        <input class="form-control" type="text" name="route_price[]" required  id="html5-text-input" />
                        <label for="html5-text-input">Route Price</label>
                        </div>
                        
                        </div>
                    
    
                        <div class="col-md-3">


                            <div class="form-floating form-floating-outline mb-4">
                            <select id="region_id" name="region_id[]" required class="form-select" data-allow-clear="true">
                            <option value="">Select Region</option>
                            @foreach ($regions as $region)
                            <option value="{{ $region->id }}">{{ $region->destination_name }}</option>
                            @endforeach
                
                            </select>
                            <label for="region_id">Regions</label>
                            </div>
                
                            </div> 


                <div class="col-md-2" style="padding-top: 10px;">
                    <span class="btn btn-sm btn-success addeventmore1"><i class="tf-icons mdi mdi-plus mdi-20px"></i> </span> 
                    <span class="btn btn-sm btn-danger removeeventmore1"><i class="tf-icons mdi mdi-minus-circle mdi-20px"></i> </span>    		
                    </div><!-- End col-md-2 -->
                   
                               </div>



          </div>
       </div>
    </div>
 </div>



 
    <script type="text/javascript">
        $(document).ready(function(){
           var counter = 0;
           $(document).on("click",".addeventmore1",function(){
                 var whole_extra_item_add2 = $("#whole_extra_item_add2").html();
                 $(this).closest(".add_item2").append(whole_extra_item_add2);
                 counter++;
           });
           $(document).on("click",".removeeventmore1",function(event){
                 $(this).closest("#add_route_remove").remove();
                 counter -= 1
           });
        });
     </script>
    
    





<script>
    $('#routesHide').hide();
    $('#routesview').show();

    function addRoute(){
        $('#routesHide').show();
        $('#routesview').hide();
        $('#addRoute').hide();
    }

    function viewRoute(){
        $('#routesHide').hide();
        $('#routesview').show();
        $('#addRoute').hide();
    }

</script>





<script type="text/javascript">


$.ajaxSetup({
headers:{
'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
}
})


function routeView(id){

$.ajax({
type: 'GET',
url: '/admin/edit/route/'+id,
dataType: 'json',
success:function(data){

$('#name').val(data.route.route_name);
$('#price').val(data.route.route_price);
$('#route_id').val(id);
var route = data.route;
var region = data.regions;
var htmlRegion = "<option value=''>Select Region</option>";


for(let i = 0;i < region.length;i++){
if(route['region_id'] == region[i]['id']){
htmlRegion += `<option value="`+region[i]['id']+`" selected>`+region[i]['destination_name']+`</option>`;
}
else{
htmlRegion += `<option value="`+region[i]['id']+`">`+region[i]['destination_name']+`</option>`;
}
}

$("#edit_region").html(htmlRegion);

}
})

}

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
$('#hireprice').val(data.car.hire_price);
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

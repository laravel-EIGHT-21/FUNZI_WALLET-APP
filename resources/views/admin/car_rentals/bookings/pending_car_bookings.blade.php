  
@extends('admin.body.admin_master')
@section('content')
  

@section('title')
 
Pending Car Rentals Bookings | funziwallet

@endsection
        


        <!-- Content -->
        
        <div class="container-xxl flex-grow-1 container-p-y">


        <h4 class="py-3 mb-4">
              <span class="text-muted fw-light"><a href="{{route('admin.dashboard')}}">Home</a> /View /</span> All Pending Car Rentals Bookings List ( {{ count($bookings) }} Booking)
            </h4>

            <br/>


            <div class="row">
                        <div class="col-12">
                            <!-- ---------------------
                                    start Zero Configuration
                          
                                ---------------- -->
                            <div class="card">
                                <div class="card-body">
     
                                    <div class="table-responsive">
                                        <table id="zero_config"
                                            class="table border table-striped table-bordered text-nowrap">
                                            <thead>
                                                <!-- start row -->
                                                <tr>
                                            <th scope="col">School</th>
                                            <th scope="col">Booking No.</th>
                                            <th scope="col">Date</th>
                                            <th scope="col">Total Price</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Actions</th>


                                                </tr>
                                                <!-- end row --> 
                                            </thead>

<tbody>
@foreach($bookings as $value )
<tr>

<td>

<div class="d-flex align-items-center">
<div class="ms-3">
<h6 class="fw-semibold mb-0">{{ $value->name}}</h6>

</div>
</div>

</td>




<td>

  <div class="d-flex align-items-center">
  <div class="ms-3">
  <h6 class="fw-semibold mb-0">{{ $value->booking_no}}</h6>
  
  </div>
  </div>
  
  </td>


<td>

<div class="d-flex align-items-center">
<div class="ms-3">
<h6 class="fw-semibold mb-0">{{ $value->date}}</h6>

</div>
</div>

</td>


<td>
    
<div class="d-flex align-items-center">
<div class="ms-3">
<h6 class="fw-semibold mb-0">{{ $value->total_price}}</h6>

</div>
</div>


</td>



<td class="pe-0">
      
<span class="badge badge-pill badge-warning" style="background: orange;">{{$value->status}}</span>

</td>




<td>

<div class="action-btn d-flex align-items-center">
<a href="{{route('car.rental.bookings.details',$value->id)}}" target="_blank"  title="Booking Details" class="btn btn-sm btn-primary">
  <i class="mdi mdi-notebook-outline me-1"></i>
</a>

&nbsp;&nbsp;

<a href="{{route('car.rental.bookings.invoice',$value->id)}}"  target="_blank" title="Booking Invoice Report" class="btn btn-sm btn-warning">
  <i class="mdi mdi-printer-outline"></i>
</a>


</div>



</td>

</tr>
@endforeach
</tbody>

                                        </table>
                                    </div>




                                </div>
                            </div>
                            <!-- ---------------------
                                    end Zero Configuration
                                ---------------- -->
                        </div>
                    </div>


            
            
                      </div>
                      <!--/ Content -->




                                  

@endsection 
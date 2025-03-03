
@extends('school.tours.body.admin_master')
@section('content')
        

@section('title')

Tour Bookings List | funziwallet

@endsection

@php




$id = Auth::user()->id;


$months = date('F Y');

$years = date('Y');


$month_tours = DB::table('school_bookings')->where('school_id',$id)->where('booking_month',$months)->where('status','Bookings Confirmed')->get();

$year_tours = DB::table('school_bookings')->where('school_id',$id)->where('booking_year',$years)->where('status','Bookings Confirmed')->get();


$monthly_total = DB::table('school_bookings')->where('school_id',$id)->where('booking_month',$months)->where('status','Bookings Confirmed')->sum('total_amount');

$yearly_total =DB::table('school_bookings')->where('school_id',$id)->where('booking_year',$years)->where('status','Bookings Confirmed')->sum('total_amount');

@endphp 
        


        <!-- Content -->
        
        <div class="container-xxl flex-grow-1 container-p-y">


        <h4 class="py-3 mb-4">
              <span class="text-muted fw-light"><a href="{{route('tours.travels.dashboard')}}">Home</a> /View /</span> All Tour Bookings List
            </h4>

            <br/>




             
            <h5 class="py-3 mb-2">Total Bookings Amounts  </h5>
<div class="row gy-4">

  <!-- Cards with users info -->
 
  <div class="col-lg-6 col-sm-6">
    <div class="card">
      <div class="card-body">
        <div class="d-flex align-items-center flex-wrap gap-2">
          <div class="avatar me-3">
            <div class="avatar-initial bg-label-success rounded">
              <i class="mdi mdi-bus mdi-24px">
              </i>
            </div>
          </div>
    
          <div class="card-info">
            <div class="d-flex align-items-center">
              <h4 class="mb-0">{{ ($monthly_total) }}</h4>

            </div>
            <small>Monthly Total</small>
          </div>
          
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-6 col-sm-6">
    <div class="card">
      <div class="card-body">
        <div class="d-flex align-items-center flex-wrap gap-2">
          <div class="avatar me-3">
            <div class="avatar-initial bg-label-info rounded">
              <i class="mdi mdi-bus mdi-24px">
              </i>
            </div>
          </div>

          <div class="card-info">
            <div class="d-flex align-items-center">
              <h4 class="mb-0">{{ ($yearly_total) }}</h4>

            </div>
            <small>Yearly Total</small>
          </div>
        
        </div>
      </div>
    </div>
  </div>



</div>



<br />

                    
<h5 class="py-3 mb-2">Total Tour Bookings Made </h5>
<div class="row gy-4">

  <!-- Cards with users info -->
 
  <div class="col-lg-6 col-sm-6">
    <div class="card">
      <div class="card-body">
        <div class="d-flex align-items-center flex-wrap gap-2">
          <div class="avatar me-3">
            <div class="avatar-initial bg-label-danger rounded">
              <i class="mdi mdi-bus mdi-24px">
              </i>
            </div>
          </div>
    
          <div class="card-info">
            <div class="d-flex align-items-center">
              <h4 class="mb-0">{{ count($month_tours) }}</h4>

            </div>
            <small>Monthly Tour Bookings</small>
          </div>
          
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-6 col-sm-6">
    <div class="card">
      <div class="card-body">
        <div class="d-flex align-items-center flex-wrap gap-2">
          <div class="avatar me-3">
            <div class="avatar-initial bg-label-warning rounded">
              <i class="mdi mdi-bus mdi-24px">
              </i>
            </div>
          </div>

          <div class="card-info">
            <div class="d-flex align-items-center">
              <h4 class="mb-0">{{ count($year_tours) }}</h4>

            </div>
            <small>Yearly Tour Bookings</small>
          </div>
        
        </div>
      </div>
    </div>
  </div>



</div>


<br />


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
  <h6 class="fw-semibold mb-0">{{ $value->booking_number}}</h6>
  
  </div>
  </div>
  
  </td>




<td>

<div class="d-flex align-items-center">
<div class="ms-3">
<h6 class="fw-semibold mb-0">{{ $value->booking_date}}</h6>

</div>
</div>

</td>


<td>
    
<div class="d-flex align-items-center">
<div class="ms-3">
<h6 class="fw-semibold mb-0">{{ $value->total_amount}}</h6>

</div>
</div>


</td>


<td class="pe-0">
@if($value->status == 'Bookings Pending')        
<span class="badge badge-pill badge-warning" style="background: red;">Pending </span>

@elseif($value->status == 'Bookings Confirmed')
<span class="badge badge-pill badge-warning" style="background: green;">Confirmed </span>


@endif

</td>




<td>

<div class="action-btn d-flex align-items-center">
<a href="{{route('tour.bookings.details',$value->id)}}" target="_blank"  title="Tour Booking Details" class="btn btn-sm btn-primary">
  <i class="ri-bus-line"></i>
</a>

&nbsp;&nbsp;

<a href="{{route('tour.bookings.invoice.report.details',$value->id)}}"  target="_blank" title="Booking Invoice Report" class="btn btn-sm btn-warning">
  <i class="ri-printer-line"></i>
</a>





&nbsp;&nbsp;

@if($value->status == 'Bookings Pending')       

<a href="{{route('cancel.tour.bookings',$value->id)}}" title="Cancel Booking" class="btn btn-sm btn-danger" id="cancelled">
  <i class="ri-delete-bin-2-line lh-1 scaleX-n1-rtl"></i>
</a>

@else


@endif




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
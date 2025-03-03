
@extends('tours_travels.body.admin_master')
@section('content')

@section('title')

Tour Bookings Details | funziwallet

@endsection


        
        <!-- Content --> 
        
        <div class="container-xxl flex-grow-1 container-p-y">
            
            
        <h4 class="py-3 mb-2">
              <span class="text-muted fw-light">View /</span> Tour Bookings Details
            </h4>

                 
            <a href="{{ route('school-tours-bookings')}}" class="btn rounded-pill btn-primary" style="float:right;"><i class='tf-icons mdi mdi-arrow-left mdi-20px'></i>Back</a>




<div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-3">
            
              <div class="d-flex flex-column justify-content-center gap-2 gap-sm-0">
                <h4 class="mb-1 mt-3 d-flex flex-wrap gap-2 align-items-end">
                  Booking No. #{{$booking->booking_number}} &nbsp;&nbsp; <b>|</b> &nbsp;&nbsp;
                 @if($booking->status == 'Bookings Pending')        
                 Booking Status : <span class="badge badge-pill badge-warning" style="background: #FFA500;">Tour(s) Pending </span>


@elseif($booking->status == 'Bookings Confirmed')
Booking Status : <span class="badge badge-pill badge-success" style="background: green;">Tour(s) Confirmed</span>

@elseif($booking->status == 'Bookings Cancelled')
Booking Status : <span class="badge badge-pill badge-danger" style="background: red;">Tour(s) Confirmed</span>
@endif
                
                </h4>

                <p class="text-body"><b> Date : {{$booking->booking_date}}</b> &nbsp;&nbsp; <b>|</b> &nbsp;&nbsp; <b>Booking Time : {{$booking->time}}</b> </p>
              </div>


            </div>
            
            <!-- Order Details Table -->
            
            <div class="row">
              <div class="col-12 col-lg-9">
                <div class="card mb-4">
                  <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="card-title m-0">Tour Bookings details</h5>

                  </div>
                  <div class="table-responsive text-nowrap">
              <table class="table table-borderless">
                <thead class="border-bottom">
                        <tr>
      
                        <th class="w-40">Tour</th>
                          <th class="w-10">Stud Qty</th>
                          <th class="w-20">Stud Total</th>
                          <th class="w-10">Adult Qty</th>
                          <th class="w-20">AdultTotal</th>
                        </tr>
                      </thead>
                      @foreach($tour_booking as $value )
                      <tbody>
                        <tr>
                        <td>
                          <div class="d-flex align-items-center">
                            <img src="{{ (!empty($value['tour']['image_thambnail']))? url('upload/tour_package_thumbnail/'.$value['tour']['image_thambnail']):url('upload/no_image.jpg') }}" class="rounded-circle" width="50" height="50">
                            <div class="ms-3">
                              <p class="mb-0">{{$value->tour->name}}</p>
                            </div>
                          </div>
                        </td>


<td>

<div class="d-flex align-items-center">

<div class="ms-3">
<h6 class="fw-semibold mb-0">{{ $value->stud_qty}}</h6>

</div>
</div>


</td>



<td>

<div class="d-flex align-items-center">

<div class="ms-3">
<h6 class="fw-semibold mb-0">{{ $value->stud_pricetotal}}</h6>

</div>
</div>

</td>



<td>

  <div class="d-flex align-items-center">
  
  <div class="ms-3">
  <h6 class="fw-semibold mb-0">{{ $value->adult_qty}}</h6>
  
  </div>
  </div>
  
  
  </td>
  
  
  
  <td>
  
  <div class="d-flex align-items-center">
  
  <div class="ms-3">
  <h6 class="fw-semibold mb-0">{{ $value->adult_pricetotal}}</h6>
  
  </div>
  </div>
  
  </td>


    

    

                        </tr>
                      </tbody>
                      @endforeach
                    </table>
                    <div class="d-flex justify-content-end align-items-center m-3 mb-2 p-1">
                      <div class="order-calculations">

                        <div class="d-flex justify-content-between">
                          <h6 class="w-px-100 mb-0">Total Amount:</h6>
                          <h6 class="mb-0">ugx {{($tour_booking_total)}}</h6>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>



              </div>



              <div class="col-12 col-lg-3">

                   <div class="card mb-4">
      <div class="card-header">
        <h6 class="card-title m-0">School details</h6>
      </div>
      <div class="card-body">
        <div class="d-flex justify-content-start align-items-center mb-4">

          <div class="d-flex flex-column"> 
            <a href="app-user-view-account.html" class="text-body text-nowrap">
              <h6 class="mb-0">{{$booking->name}}</h6>
            </a>
</div>
        </div>
        <div class="d-flex justify-content-start align-items-center mb-4">
          <span class="avatar rounded-circle bg-label-success me-2 d-flex align-items-center justify-content-center"><i class='mdi mdi-bus mdi-24px'></i></span>
          <h6 class="text-body text-nowrap mb-0">{{$booking->total_tours}} Tours</h6>
        </div>
        <div class="d-flex justify-content-between"> 
          <h6>Contact info</h6>

        </div>
        <p class=" mb-1">Email: {{$booking->email}}</p>
        <p class=" mb-0">Tel One : {{$booking->school_tel1}}</p>
        <p class=" mb-0">Tel Two : {{$booking->school_tel2}}</p>
        <p class="mb-0">Address :{{$booking->school_address}}</p>
      </div>
    </div>


    <div class="card mb-4">

      <div class="card-header d-flex justify-content-between">
        <h6 class="card-title m-0">Status Update</h6>
        
      </div>

      @if($booking->status == 'Bookings Pending')
      <div class="card-body">
      <a href="#" class="btn btn-block btn-warning" id="confirm2">Tour Booking Pending</a>
      
      
      @elseif($booking->status == 'Bookings Confirmed')
      <a href="#" class="btn btn-block btn-success">Tour Booking Confirmed</a>

@elseif($booking->status == 'Bookings Cancelled')
<a href="#" class="btn btn-block btn-danger"> Tour Booking Cancelled</a>


@endif

      </div>




      
      </div>


              </div>
            </div>


            
            
            
            
                      </div>
                      <!--/ Content -->
            
            
                    
@endsection

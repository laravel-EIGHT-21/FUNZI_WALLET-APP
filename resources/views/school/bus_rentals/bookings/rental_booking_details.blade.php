
@extends('school.bus_rentals.body.admin_master')
@section('content')
        

@section('title')

Bus Rental Bookings Details | funziwallet

@endsection


        
        <!-- Content -->
        
        <div class="container-xxl flex-grow-1 container-p-y">
            
            
        <h4 class="py-3 mb-2">
              <span class="text-muted fw-light">View /</span> Bus Rental Bookings Details
            </h4>

            
                    
<a href="{{ route('view.bus.rental.bookings')}}" class="btn rounded-pill btn-info" style="float:right;"><i class='tf-icons ri-arrow-left-line ri-20px'></i>Back</a>



<div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-3">
            
              <div class="d-flex flex-column justify-content-center gap-2 gap-sm-0">
                <h4 class="mb-1 mt-3 d-flex flex-wrap gap-2 align-items-end">
                  Booking No. #{{$booking->booking_no}} &nbsp;&nbsp; <b>|</b> &nbsp;&nbsp;
                 @if($booking->status == 'Bookings Pending')        
                 Booking Status : <span class="badge badge-pill badge-warning" style="background: #FFA500;">Booking Pending </span>


@elseif($booking->status == 'Bookings Confirmed')
Booking Status : <span class="badge badge-pill badge-warning" style="background: green;;">Confirmed</span>
@endif
                
                </h4>

                <p class="text-body"><b> Date : {{$booking->date}}</b> &nbsp;&nbsp; <b>|</b> &nbsp;&nbsp; <b>Booking Time : {{$booking->time}}</b> </p>
              </div>


            </div>
            
            <!-- Order Details Table -->
            
            <div class="row">
              <div class="col-12 col-lg-9">
                <div class="card mb-4">
                  <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="card-title m-0">Rental Bookings details</h5>

                  </div>
                  <div class="table-responsive text-nowrap">
              <table class="table table-borderless">
                <thead class="border-bottom">
                        <tr>
      
                          <th>Rental</th>
                          <th>Operator</th>
                          <th>Vehicle Total</th>
                          <th>No. of Days</th>
                          <th>Dates</th>
                          <th>Price / Day</th>
                        </tr>
                      </thead>
                      @foreach($rental_booking as $value )
                      <tbody>
                        <tr>
                          <td>
                            <div class="d-flex">
                            <p class="mb-0">{{$value->rental->car_name}}</p>
                            </div>
                            </td>
                    
                    
                            <td>
                    
                            <div class="d-flex">
                    
                            <h6 class="mb-0">{{ $value->rental->operator->name}}</h6>
                    
                            </div>
                    
                    
                            </td>
                    
                            <td>
                    
                            <div class="d-flex">
                    
                            <h6 class="mb-0">{{ $value->vehicle_total}}</h6>
                    
                            </div>
                    
                    
                            </td>
                    
                    
                    
                            <td>
                    
                            <div class="d-flex">
                    
                            <h6 class="mb-0">{{ $value->total_days}}</h6>
                    
                            </div>
                    
                            </td>
                    
                    
                    
                            <td>
                    
                            <div class="d-flex">
                    
                            <h6 class="mb-0">{{ $value->start_day}} / <br>
                               {{ $value->end_day}}</h6>
                    
                            </div>
                    
                    
                            </td>
                    
                    
                    
                            <td>
                    
                            <div class="d-flex">
                    
                            <h6 class="mb-0">{{ $value->price_per_day}}</h6>
                    
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
                          <h6 class="mb-0">ugx {{$booking->total_price}}</h6>
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
          <span class="avatar rounded-circle bg-label-success me-2 d-flex align-items-center justify-content-center"><i class='ri-bus-fill ri-24px'></i></span>
          <h6 class="text-body text-nowrap mb-0">{{$booking->total_rentals}} Tours</h6>
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


              </div>
            </div>


            
            
            
            
                      </div>
                      <!--/ Content -->
            
            
                    
@endsection

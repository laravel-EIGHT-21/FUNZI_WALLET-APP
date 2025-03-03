
@extends('admin.body.admin_master')
@section('content')
        

@section('title')

Annual School Bus Rental Bookings Report

@endsection



@php  

$months = date('F Y');

$years = date('Y');



$rentals_confirmed = App\Models\car_rental_bookings::where('status','Bookings Confirmed')->where('year',$years)->get();


$rentals_cancelled = App\Models\car_rental_bookings::where('status','Bookings Cancelled')->where('year',$years)->get();





@endphp






 
        <!-- Content -->
        
        <div class="container-xxl flex-grow-1 container-p-y">
            
            

            <h4 class="py-3 mb-4">
              <span class="text-muted fw-light"><a href="{{route('admin.dashboard')}}">Home</a> /View/</span>
              Annual Rental Bookings Report
            </h4>

            
            
            
<div class="card mb-4">

      <div class="row gy-4 gy-sm-1">
            
            
<!-- Cards with few info -->

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
                <h4 class="mb-0">{{count($rentals_confirmed)}}</h4>

            </div>
            <small>Annual Total Confirmed Bookings</small>
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
                <h4 class="mb-0">{{count($rentals_cancelled)}}</h4>

            </div>
            <small>Annual Total Cancelled Bookings</small>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!--/ Cards with few info -->
            </div>
            </div>




<br/>
            

            


            <div class="row">

    <h4 class="text"><b>Annual Rental Bookings Reports</b></h4>
    <div class="nav-align-top mb-4">

        <div class="col-xl-12">

    <div class="card mb-6">
      <div class="card-header p-0">

      </div>
      <div class="card-body">

          <div class="row">
  <div class="col-xl">
    <div class="card mb-4">
      <div class="card-header d-flex justify-content-between align-items-center">

      </div>
      <div class="card-body">
        <form method="post" action="{{ route('search-school-rental-booking-by-year') }}">
          @csrf
        <div class="form-floating form-floating-outline mb-4">
        <input class="form-control" type="text" name="year" id="html5-month-input" required />
        <label for="html5-month-input">Year</label>
        </div> 

          <button type="submit" class="btn btn-primary">Submit</button>

          <a href="{{ route('all.rental.bookings.reports')}}"  class="btn btn-success">Reset</a>
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

  
<br/>


<div class="row">
    
    <div class="col-xl-12">
    <h4 class="text"><b>Annual Rental Bookings Report</b></h4>
  
  <div class="nav-align-top mb-2">
  
  <div class="card">
  
  
                          <div class="card-body">
                                      
                          <div class="table-responsive">
                          <table id="file_export2" class="table border table-bordered display text-nowrap">
                          <thead>
                          <!-- start row -->
                          <tr>

                            <th>Month  </th>
            
                            <th>Total Bookings Amount (UGX) </th>
              
                                      </tr>
                                      </thead>
                                      <tbody>
            
                                      @foreach($bookings as $key => $value )
            
            <tr>
                @php 

                $price_total_yearly = App\Models\car_rental_bookings::where('month',$value->month)->sum('pricetotal');


                @endphp
            
            <td> {{ $value->month}}</td>
            
            <td> {{ ($price_total_yearly) }}</td>
            
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
                        <!--/ Content -->







@endsection
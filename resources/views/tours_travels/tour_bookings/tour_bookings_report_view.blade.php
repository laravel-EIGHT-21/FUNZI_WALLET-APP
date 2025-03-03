
@extends('tours_travels.body.admin_master')
@section('content')
        

@section('title')

Annual School Tour Bookings Report

@endsection



@php  




$operator_id = Auth::user()->id;

$months = date('F Y');

$years = date('Y');


$tours = App\Models\tour_packages::where('status',1)->where('tour_operator_id',$operator_id)->get();

$tours_confirmed = App\Models\tours_packs::where('status','Bookings Confirmed')->where('tour_operator_id',$operator_id)->where('year',$years)->get();


$tours_cancelled = App\Models\tours_packs::where('status','Bookings Cancelled')->where('tour_operator_id',$operator_id)->where('year',$years)->get();





@endphp






 
        <!-- Content -->
        
        <div class="container-xxl flex-grow-1 container-p-y">
            
            

            <h4 class="py-3 mb-4">
              <span class="text-muted fw-light"><a href="{{route('tour.operator.dashboard')}}">Home</a> /View/</span>
              Annual School Tour Bookings Report
            </h4>

            
            
            
<div class="card mb-4">

      <div class="row gy-4 gy-sm-1">
            
            
<!-- Cards with few info -->
<div class="col-lg-4 col-sm-6">
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
                <h4 class="mb-0">{{ count($tours) }}</h4>
            </div>
            <small>Total Tour Packages Available</small>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-4 col-sm-6">
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
                <h4 class="mb-0">{{count($tours_confirmed)}}</h4>

            </div>
            <small>Annual Total Confirmed Tours</small>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-4 col-sm-6">
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
                <h4 class="mb-0">{{count($tours_cancelled)}}</h4>

            </div>
            <small>Annual Total Cancelled Tours</small>
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

    <h4 class="text"><b>Annual Tour Bookings Reports</b></h4>
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
        <form method="post" action="{{ route('search-tour-booking-by-year') }}">
          @csrf
        <div class="form-floating form-floating-outline mb-4">
        <input class="form-control" type="text" name="year" id="html5-month-input" required />
        <label for="html5-month-input">Year</label>
        </div> 

          <button type="submit" class="btn btn-primary">Submit</button>

          <a href="{{ route('tour.bookings.reports')}}"  class="btn btn-success">Reset</a>
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
    <h4 class="text"><b>Annual Tour Bookings Report</b></h4>
  
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

                    $operator_id = Auth::user()->id;
                $stud_price_total_yearly = App\Models\tours_packs::where('month',$value->month)->where('tour_operator_id',$operator_id)->sum('stud_pricetotal');


                $adult_price_total_yearly = App\Models\tours_packs::where('month',$value->month)->where('tour_operator_id',$operator_id)->sum('adult_pricetotal');

                $tour_booking_total_yearly = (float)$stud_price_total_yearly+(float)$adult_price_total_yearly;

                @endphp
            
            <td> {{ $value->month}}</td>
            
            <td> {{ ($tour_booking_total_yearly) }}</td>
            
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
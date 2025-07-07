
@extends('school.body.admin_master')
@section('content')
        
@section('title')

School - Dashboard | funziwallet

@endsection



@php 


$id = Auth::user()->id;

$students= App\Models\Students::where('status',1)->where('school_id',$id)->get();
 

$months = date('F Y');

$years = date('Y');


$orders = App\Models\orders::where('school_id',$id)->where('order_year',$years)->latest()->limit(4)->get();

$month_orders = DB::table('order_items')->where('month',$months)->where('school_id',$id)->where('status','Order Delivered')->sum('pricetotal');

$year_orders = DB::table('order_items')->where('year',$years)->where('school_id',$id)->where('status','Order Delivered')->sum('pricetotal');


$tours = App\Models\school_bookings::where('school_id',$id)->where('booking_year',$years)->latest()->limit(4)->get();


$month_stud_totals = DB::table('tours_packs')->where('month',$months)->where('school_id',$id)->where('status','Bookings Confirmed')->sum('stud_pricetotal');

$month_adult_totals = DB::table('tours_packs')->where('month',$months)->where('school_id',$id)->where('status','Bookings Confirmed')->sum('adult_pricetotal');
$monthly_tours_total = (float)$month_stud_totals + (float)$month_adult_totals;


$year_stud_tours = DB::table('tours_packs')->where('year',$years)->where('school_id',$id)->where('status','Bookings Confirmed')->sum('stud_pricetotal');

$year_adult_tours = DB::table('tours_packs')->where('year',$years)->where('school_id',$id)->where('status','Bookings Confirmed')->sum('adult_pricetotal');
$yearly_tours_total = (float)$year_stud_tours + (float)$year_adult_tours;



$rentals = App\Models\car_bookings::where('school_id',$id)->where('year',$years)->latest()->limit(4)->get();

$monthly_rentals = DB::table('car_rental_bookings')->where('month',$months)->where('school_id',$id)->where('status','Bookings Confirmed')->sum('pricetotal');

$yearly_rentals = DB::table('car_rental_bookings')->where('year',$years)->where('school_id',$id)->where('status','Bookings Confirmed')->sum('pricetotal');


@endphp


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" ></script>


       <!-- Content -->
        
       <div class="container-xxl flex-grow-1 container-p-y">
          
<br/>

<div class="row gy-4">

  <!-- Students Overview-->
  <div class="col-lg-6">
    <div class="card h-100">
      <div class="card-header">
        <div class="d-flex justify-content-between">
          <h4 class="mb-2">Students Overview</h4>

        </div>

      </div>
      <div class="card-body d-flex justify-content-between flex-wrap gap-3">

        <div class="d-flex gap-2">
          <div class="avatar">
            <div class="avatar-initial bg-label-warning rounded">
              <i class="mdi mdi-account-outline mdi-24px"></i>
            </div>
          </div>
          <a href="{{ route('view.students') }}">
          <div class="card-warning">
            <h4 class="mb-0">{{ count($students) }}</h4>
            <small>Active Wallets</small>
          </div>
          </a>
        </div>



      </div>
    </div>
  </div>
  <!--/ Students & Agents Overview-->

  
  <div class="col-lg-6">
  
    <div class="swiper-container swiper-container-horizontal swiper swiper-sales">
      <div class="swiper-wrapper">

        <div class="swiper-slide">
        <div class="col-lg-6">


        <div class="d-flex justify-content-between">
          <h4 class="mb-2">Total Amounts For Orders Overview</h4>

        </div>

      </div>
      <br/>
      <div class="card-body d-flex justify-content-between flex-wrap gap-3">

        <div class="d-flex gap-3">
          <div class="avatar">
            <div class="avatar-initial bg-label-warning rounded">
              <i class="mdi mdi-currency-usd mdi-px"></i>
            </div>
          </div>
          <div class="card-info">
            <h4 class="mb-0">{{ ($month_orders) }}</h4>
            <small>Monthly Total</small>
          </div>
        </div>
        <div class="d-flex gap-3">
          <div class="avatar">
            <div class="avatar-initial bg-label-success rounded">
              <i class="mdi mdi-currency-usd mdi-px"></i>
            </div>
          </div>
          <div class="card-info">
            <h4 class="mb-0">{{ ($year_orders) }}</h4>
            <small>Yearly Total</small>
          </div>
        </div>
      </div>



        </div>


      </div>

    </div>
  </div>




</div>




<br/><br/>



<div class="row gy-4">

  <!-- Tours Overview-->
 
  <div class="col-lg-6">
  
    <div class="swiper-container swiper-container-horizontal swiper swiper-sales">
      <div class="swiper-wrapper">

        <div class="swiper-slide">
        <div class="col-lg-6">


        <div class="d-flex justify-content-between">
          <h4 class="mb-2">Total Amounts For Tours Booked Overview</h4>

        </div>

      </div>
      <br/>
      <div class="card-body d-flex justify-content-between flex-wrap gap-3">

        <div class="d-flex gap-3">
          <div class="avatar">
            <div class="avatar-initial bg-label-warning rounded">
              <i class="mdi mdi-currency-usd mdi-px"></i>
            </div>
          </div>
          <div class="card-info">
            <h4 class="mb-0">{{ ($monthly_tours_total) }}</h4>
            <small>Monthly Total</small>
          </div>
        </div>
        <div class="d-flex gap-3">
          <div class="avatar">
            <div class="avatar-initial bg-label-success rounded">
              <i class="mdi mdi-currency-usd mdi-px"></i>
            </div>
          </div>
          <div class="card-info">
            <h4 class="mb-0">{{ ($yearly_tours_total) }}</h4>
            <small>Yearly Total</small>
          </div>
        </div>
      </div>



        </div>


      </div>

    </div>
  </div>
  <!--/ Tours Overview-->

  
  <div class="col-lg-6">
  
    <div class="swiper-container swiper-container-horizontal swiper swiper-sales">
      <div class="swiper-wrapper">

        <div class="swiper-slide">
        <div class="col-lg-6">


        <div class="d-flex justify-content-between">
          <h4 class="mb-2">Total Amounts For Vehicle Rentals Overview</h4>

        </div>

      </div>
      <br/>
      <div class="card-body d-flex justify-content-between flex-wrap gap-3">

        <div class="d-flex gap-3">
          <div class="avatar">
            <div class="avatar-initial bg-label-warning rounded">
              <i class="mdi mdi-currency-usd mdi-px"></i>
            </div>
          </div>
          <div class="card-info">
            <h4 class="mb-0">{{ ($monthly_rentals) }}</h4>
            <small>Monthly Total</small>
          </div>
        </div>
        <div class="d-flex gap-3">
          <div class="avatar">
            <div class="avatar-initial bg-label-success rounded">
              <i class="mdi mdi-currency-usd mdi-px"></i>
            </div>
          </div>
          <div class="card-info">
            <h4 class="mb-0">{{ ($yearly_rentals) }}</h4>
            <small>Yearly Total</small>
          </div>
        </div>
      </div>



        </div>


      </div>

    </div>
  </div>




</div>



<br/><br/>

<h5 class="py-3 mb-2"> School Orders </h5>
<div class="row gy-4">
<div class="col-12 col-xl-12">
    <div class="card h-100">
      <div class="card-header d-flex justify-content-between">
        <div class="card-title m-0">
          <h5 class="mb-1"> Latest Orders</h5>
        </div>


      </div>
      <div class="card-body pb-3">


            <div class="table-responsive text-nowrap">
              <table class="table table-borderless">
                <thead class="border-bottom">
                  <tr>
                    <th class="fw-medium ps-0 text-heading">Order No.</th>
                    <th class="pe-0 fw-medium text-heading">Order Date</th>
                    <th class="pe-0 fw-medium text-heading">Time of Order</th>
                    <th class="pe-0 fw-medium text-heading"> Status</th>
                    <th class="pe-0 text-end text-heading"> Total Amount </th>
                  </tr>
                </thead>
                @foreach($orders as $key => $value )
                <tbody>
                  <tr>
                    <td class="h6 ps-0">{{ $value->order_number}}</td>
                    <td class="pe-0"><span class="badge rounded-pill bg-label-primary">{{ $value->order_date}}</span></td>
                    <td class="pe-0"><span class="badge rounded-pill bg-label-warning">{{ $value->order_time}}</span></td>
                    <td class="pe-0 text-success">
                    @if($value->status == 'Order Pending')        
<span class="badge badge-pill badge-warning" style="background: #800080;">Order Pending </span>

@elseif($value->status == 'Order Confirmed')
<span class="badge badge-pill badge-warning" style="background: #0000FF;">Order  Confirmed </span>


@elseif($value->status == 'Out for Delivery')
<span class="badge badge-pill badge-warning" style="background: #FFA500;">Out For Delivery </span>


@elseif($value->status == 'Order Delivered')
<span class="badge badge-pill badge-warning" style="background: green;">Order  Delivered </span>


@elseif($value->status == 'Order Cancelled')
<span class="badge badge-pill badge-warning" style="background: red;">Order Cancelled </span>


@endif
                    
                    </td>
                    <td class="pe-0 text-end h6">{{ $value->amount}}</td>
                  </tr>

                </tbody>
                @endforeach

              </table>
            </div>

      </div>
    </div>
  </div>


  




</div>





<br/>

<h5 class="py-3 mb-2"> School Tour Bookings </h5>
<div class="row gy-4">
<div class="col-12 col-xl-12">
    <div class="card h-100">
      <div class="card-header d-flex justify-content-between">
        <div class="card-title m-0">
          <h5 class="mb-1"> Latest Bookings</h5>
        </div>


      </div>
      <div class="card-body pb-3">


            <div class="table-responsive text-nowrap">
              <table class="table table-borderless">
                <thead class="border-bottom">
                  <tr>
                    <th class="fw-medium ps-0 text-heading">Booking No.</th>
                    <th class="pe-0 fw-medium text-heading"> Date</th>
                    <th class="pe-0 fw-medium text-heading">Time</th>
                    <th class="pe-0 fw-medium text-heading"> Status</th>
                    <th class="pe-0 text-end text-heading"> Total Amount</th>
                  </tr>
                </thead>
                @foreach($tours as $key => $value )
                <tbody>
                  <tr>
                    <td class="h6 ps-0">{{ $value->booking_number}}</td>
                    <td class="pe-0"><span class="badge rounded-pill bg-label-primary">{{ $value->booking_date}}</span></td>
                    <td class="pe-0"><span class="badge rounded-pill bg-label-warning">{{ $value->time}}</span></td>
                    <td class="pe-0 text-success">
                    @if($value->status == 'Bookings Pending')        
<span class="badge badge-pill badge-warning" style="background: #800080;">Booking Pending </span>

@elseif($value->status == 'Bookings Confirmed')
<span class="badge badge-pill badge-warning" style="background: #0000FF;">Booking Confirmed </span>


@elseif($value->status == 'Bookings Cancelled')
<span class="badge badge-pill badge-warning" style="background: red;">Booking Cancelled </span>


@endif
                    
                    </td>
                    <td class="pe-0 text-end h6">{{ $value->total_amount}}</td>
                  </tr>

                </tbody>
                @endforeach

              </table>
            </div>

      </div>
    </div>
  </div>


  




</div>






<br/>

<h5 class="py-3 mb-2"> School Bus Rentals </h5>
<div class="row gy-4">
<div class="col-12 col-xl-12">
    <div class="card h-100">
      <div class="card-header d-flex justify-content-between">
        <div class="card-title m-0">
          <h5 class="mb-1"> Latest Bookings</h5>
        </div>


      </div>
      <div class="card-body pb-3">


            <div class="table-responsive text-nowrap">
              <table class="table table-borderless">
                <thead class="border-bottom">
                  <tr>
                    <th class="fw-medium ps-0 text-heading">Booking No.</th>
                    <th class="pe-0 fw-medium text-heading">Date</th>
                    <th class="pe-0 fw-medium text-heading">Time </th>
                    <th class="pe-0 fw-medium text-heading"> Status</th>
                    <th class="pe-0 text-end text-heading"> Total Amount </th>
                  </tr>
                </thead>
                @foreach($rentals as $key => $value )
                <tbody>
                  <tr>
                    <td class="h6 ps-0">{{ $value->booking_no}}</td>
                    <td class="pe-0"><span class="badge rounded-pill bg-label-primary">{{ $value->date}}</span></td>
                    <td class="pe-0"><span class="badge rounded-pill bg-label-warning">{{ $value->time}}</span></td>
                    <td class="pe-0 text-success">
                    @if($value->status == 'Bookings Pending')        
<span class="badge badge-pill badge-warning" style="background: #800080;">Booking Pending </span>

@elseif($value->status == 'Bookings Confirmed')
<span class="badge badge-pill badge-warning" style="background: #0000FF;">Booking Confirmed </span>


@elseif($value->status == 'Bookings Cancelled')
<span class="badge badge-pill badge-warning" style="background: red;">Booking Cancelled </span>


@endif
                    
                    </td>
                    <td class="pe-0 text-end h6">{{ $value->total_price}}</td>
                  </tr>

                </tbody>
                @endforeach

              </table>
            </div>

      </div>
    </div>
  </div>


  




</div>



       </div>

<br/>


       <script src="{{asset('Admin/assets/vendor/libs/chart.js/Chart.js')}}"></script>
<script src="{{asset('Admin/assets/vendor/libs/chart.js/Chart.min.js')}}"></script>
<script src="{{asset('Admin/assets/vendor/libs/chart.js/Chart.bundle.min.js')}}"></script>

                      


<script type="text/javascript">
      
  @session("success")
      toastr.success("{{ $value }}", "Success");
  @endsession

  @session("info")
      toastr.info("{{ $value }}", "Info");
  @endsession

  @session("warning")
      toastr.warning("{{ $value }}", "Warning");
  @endsession

  @session("error")
      toastr.error("{{ $value }}", "Error");
  @endsession

</script>



            

@endsection

@extends('admin.body.admin_master')
@section('content')
        

@section('title')

Admin - Dashboard | funziwallet 

@endsection

 
@php 


$students= App\Models\Students::where('status',1)->get();

$totalstudents= App\Models\Students::all();

$schools= App\Models\User::where('status',1)->get();

$admin= App\Models\Admin::where('status',1)->get();

$rental_operators= App\Models\rental_operators::where('status',1)->get();


$months = date('F Y');

$years = date('Y');


$month_orders = DB::table('order_items')->where('month',$months)->where('status','Order Delivered')->sum('pricetotal');

$year_orders = DB::table('order_items')->where('year',$years)->where('status','Order Delivered')->sum('pricetotal');


$pending_orders = App\Models\orders::whereDate('created_at',Carbon\Carbon::today())->where('status','Order Pending')->latest()->limit(5)->get();

$pending_daily_orders = App\Models\orders::whereDate('created_at',Carbon\Carbon::today())->get();

$pending_monthly_orders = App\Models\orders::where('order_month',$months)->get();


$confirmed_orders = App\Models\orders::whereDate('created_at',Carbon\Carbon::today())->where('status','Order Confirmed')->latest()->limit(5)->get();

$delivered_orders = App\Models\orders::whereDate('created_at',Carbon\Carbon::today())->where('status','Order Delivered')->latest()->limit(5)->get();



$booking_pending = App\Models\school_bookings::where('status','Bookings Pending')->where('booking_year',$years)->latest()->limit(5)->get();


$booking_confirmed = App\Models\school_bookings::where('status','Bookings Confirmed')->where('booking_year',$years)->latest()->limit(5)->get();


$booking_cancelled = App\Models\school_bookings::where('status','Bookings Cancelled')->where('booking_year',$years)->latest()->limit(5)->get();


$month_tours_amounts = DB::table('school_bookings')->where('booking_month',$months)->where('status','Bookings Confirmed')->sum('total_amount');

$year_tours_amounts = DB::table('school_bookings')->where('booking_year',$years)->where('status','Bookings Confirmed')->sum('total_amount');








$rental_pending = App\Models\car_bookings::where('status','Bookings Pending')->where('year',$years)->latest()->limit(5)->get();


$rental_confirmed = App\Models\car_bookings::where('status','Bookings Confirmed')->where('year',$years)->latest()->limit(5)->get();


$rental_cancelled = App\Models\car_bookings::where('status','Bookings Cancelled')->where('year',$years)->latest()->limit(5)->get();


$month_rental_amount = DB::table('car_bookings')->where('month',$months)->where('status','Bookings Confirmed')->sum('total_price');

$year_rental_amount = DB::table('car_bookings')->where('year',$years)->where('status','Bookings Confirmed')->sum('total_price');


@endphp

      
      
       <!-- Content -->
        
       <div class="container-xxl flex-grow-1 container-p-y">
            
            

        <h4 class="py-3 mb-4"><span class="text-muted fw-light">Dashboard /</span> Statistics
        </h4>
        <div class="row gy-4">
          <!-- Cards with few info -->
          <div class="col-lg-4 col-sm-6">
            <div class="card">
              <div class="card-body">
                <div class="d-flex align-items-center flex-wrap gap-2">
                  <div class="avatar me-3">
                    <div class="avatar-initial bg-label-primary rounded">
                      <i class="mdi mdi-account-outline mdi-24px">
                      </i>
                    </div>
                  </div>
                  <a href="{{ route('view.schools') }}">
                  <div class="card-primary">
                    <div class="d-flex align-items-center">
                      <h4 class="mb-0">{{ count($schools) }}</h4>

                    </div>
                    <small>Active Schools</small>
                  </div>
                  </a>
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
                      <i class="mdi mdi-currency-usd mdi-24px">
                      </i>
                    </div>
                  </div>
                  <a href="{{ route('view.all.students') }}">
                  <div class="card-success">
                    <div class="d-flex align-items-center">
                      <h4 class="mb-0">{{ count($students) }}</h4>

                    </div>
                    <small>Total Students</small>
                  </div>
                  </a>
                </div>
              </div>
            </div>
          </div>


          <div class="col-lg-4 col-sm-6">
            <div class="card">
              <div class="card-body">
                <div class="d-flex align-items-center flex-wrap gap-2">
                  <div class="avatar me-3">
                    <div class="avatar-initial bg-label-danger rounded">
                      <i class="mdi mdi-account-outline mdi-24px">
                      </i>
                    </div>
                  </div>
                  <a href="{{ route('all.rental.operators') }}">
                  <div class="card-warning">
                    <div class="d-flex align-items-center">
                      <h4 class="mb-0"><h4 class="mb-0">{{ count($rental_operators) }}</h4></h4>

                    </div>
                    <small>Rental Operators</small>
                  </div>
                  </a>
                </div>
              </div>
            </div>
          </div>

          <!--/ Cards with few info -->
        

       
          <br/> 
           

          <h5 class="py-3 mb-2">Schools` Annual Orders</h5>
        
        
          <!-- Weekly Sales-->
          <div class="col-lg-6">
            <div class="swiper-container swiper-container-horizontal swiper swiper-sales" id="swiper-weekly-sales">
              <div class="swiper-wrapper">
                <div class="swiper-slide pb-3">
                  <h5 class="mb-2">Pending Orders</h5>

                  <div class="d-flex align-items-center mt-3">

                    <div class="col-12">
            <div class="table-responsive text-nowrap">
              <table class="table table-borderless">
                <thead class="border-bottom">
                  <tr>
            
                    <th class="pe-0 fw-medium text-heading">School</th>
                    <th class="pe-0 fw-medium text-heading"> Order No.</th>
                    <th class="pe-0 fw-medium text-heading"> Order Date</th>
                    <th class="pe-0 fw-medium text-heading"> Total Price</th>
                  </tr>
                </thead>
                @foreach($pending_orders as $key => $value )
                <tbody>
                  <tr>
            
                    <td class="pe-0"><span class="badge rounded-pill bg-label-primary">{{ $value->name}}</span></td>
                    <td class="pe-0 text-success">{{ $value->order_number}}</td>
                    <td class="pe-0 text-warning">{{ $value->order_date}}</td>
                    <td class="pe-0 h6">{{ $value->amount}}</td> 
                  </tr>
            
                </tbody>
                @endforeach
            
              </table>
            </div>
                    </div>
            
                      </div>
                  <div class="mt-3 pt-1">
                    <a href="{{ route('school.orders')}}" class="btn btn-sm btn-outline-primary me-3">Details</a>

                  </div>
                </div>
              </div>

            </div>
          </div>
          <!--/ Weekly Sales-->
        
          <!-- Marketing & Sales-->
          <div class="col-lg-6">
            <div class="swiper-container swiper-container-horizontal swiper swiper-sales" id="swiper-marketing-sales">
              <div class="swiper-wrapper">
                <div class="swiper-slide pb-3">
                  <h5 class="mb-2">Confirmed Orders</h5>

                  <div class="d-flex align-items-center mt-3">
                    <div class="col-12">
                      <div class="table-responsive text-nowrap">
                        <table class="table table-borderless">
                          <thead class="border-bottom">
                            <tr>
                      
                              <th class="pe-0 fw-medium text-heading">School</th>
                              <th class="pe-0 fw-medium text-heading"> Order No.</th>
                              <th class="pe-0 fw-medium text-heading"> Order Date</th>
                              <th class="pe-0 fw-medium text-heading"> Total Price</th>
                            </tr>
                          </thead>
                          @foreach($confirmed_orders as $key => $value )
                          <tbody>
                            <tr>
                      
                              <td class="pe-0"><span class="badge rounded-pill bg-label-primary">{{ $value->name}}</span></td>
                              <td class="pe-0 text-success">{{ $value->order_number}}</td>
                              <td class="pe-0 text-warning">{{ $value->order_date}}</td>
                              <td class="pe-0 h6">{{ $value->amount}}</td>
                            </tr>
                      
                          </tbody>
                          @endforeach
                      
                        </table>
                      </div>
                              </div>

                  </div>
                  <div class="mt-3 pt-1">
                    <a href="{{ route('confirmed-orders')}}" class="btn btn-sm btn-outline-primary me-3">Details</a>

                  </div>
                </div>

              </div>

            </div>
          </div>
          <!--/ Marketing & Sales-->
        
          <!-- Weekly Sales with bg-->
          <div class="col-lg-6">
            <div class="swiper-container swiper-container-horizontal swiper swiper-sales" id="swiper-marketing-sales">
              <div class="swiper-wrapper">
                <div class="swiper-slide pb-3">
                  <h5 class="mb-2">Deliverd Orders</h5>

                  <div class="d-flex align-items-center mt-3">
                    <div class="col-12">
                      <div class="table-responsive text-nowrap">
                        <table class="table table-borderless">
                          <thead class="border-bottom">
                            <tr>
                      
                              <th class="pe-0 fw-medium text-heading">School</th>
                              <th class="pe-0 fw-medium text-heading"> Order No.</th>
                              <th class="pe-0 fw-medium text-heading"> Order Date</th>
                              <th class="pe-0 fw-medium text-heading"> Total Price</th>
                            </tr>
                          </thead>
                          @foreach($delivered_orders as $key => $value )
                          <tbody>
                            <tr>
                      
                              <td class="pe-0"><span class="badge rounded-pill bg-label-primary">{{ $value->name}}</span></td>
                              <td class="pe-0 text-success">{{ $value->order_number}}</td>
                              <td class="pe-0 text-warning">{{ $value->order_date}}</td>
                              <td class="pe-0 h6">{{ $value->amount}}</td>
                            </tr>
                      
                          </tbody>
                          @endforeach
                      
                        </table>
                      </div>
                              </div>

                  </div>
                  <div class="mt-3 pt-1">
                    <a href="{{ route('delivered-orders')}}" class="btn btn-sm btn-outline-primary me-3">Details</a>

                  </div>
                </div>

              </div>

            </div>
          </div>
          <!--/ Weekly Sales with bg-->
        
          <!-- Sales Overview-->
          <div class="col-lg-6">
            <div class="card">
              <div class="card-header">
                <div class="d-flex justify-content-between">
                  <h4 class="mb-2">Orders` Sales Overview</h4>
                 
                </div>

              </div>
              <div class="card-body d-flex justify-content-between flex-wrap gap-3">

                <div class="d-flex gap-3">
                  <div class="avatar">
                    <div class="avatar-initial bg-label-warning rounded">
                      <i class="mdi mdi-currency-usd mdi-24px"></i>
                    </div>
                  </div>
                  <div class="card-info">
                    <h4 class="mb-0">{{ ($month_orders) }}</h4>
                    <small>Monthly Total</small>
                  </div>
                </div>
                <div class="d-flex gap-3">
                  <div class="avatar">
                    <div class="avatar-initial bg-label-info rounded">
                      <i class="mdi mdi-currency-usd mdi-24px"></i>
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
          <!--/ Sales Overview-->






          <br/> 
           

          <h5 class="py-3 mb-2">School Annual Tour Bookings</h5>
        
        
          <!-- Weekly Sales-->
          <div class="col-lg-6">
            <div class="swiper-container swiper-container-horizontal swiper swiper-sales" id="swiper-weekly-sales">
              <div class="swiper-wrapper">
                <div class="swiper-slide pb-3">
                  <h5 class="mb-2">Pending Tour Bookings</h5>

                  <div class="d-flex align-items-center mt-3">

                    <div class="col-12">
            <div class="table-responsive text-nowrap">
              <table class="table table-borderless">
                <thead class="border-bottom">
                  <tr>
            
                    <th class="pe-0 fw-medium text-heading">School</th>
                    <th class="pe-0 fw-medium text-heading"> Booking No.</th>
                    <th class="pe-0 fw-medium text-heading"> Date</th>
                    <th class="pe-0 fw-medium text-heading"> Total Price</th>
                  </tr>
                </thead>
                @foreach($booking_pending as $key => $value )
                <tbody>
                  <tr>
            
                    <td class="pe-0"><span class="badge rounded-pill bg-label-primary">{{ $value->name}}</span></td>
                    <td class="pe-0 text-success">{{ $value->booking_number}}</td>
                    <td class="pe-0 text-warning">{{ $value->booking_date}}</td>
                    <td class="pe-0 h6">{{ $value->total_amount}}</td>
                  </tr>
            
                </tbody>
                @endforeach
            
              </table>
            </div>
                    </div>
            
                      </div>
                  <div class="mt-3 pt-1">
                    <a href="{{ route('pending-tour-bookings')}}" class="btn btn-sm btn-outline-primary me-3">Details</a>

                  </div>
                </div>
              </div>

            </div>
          </div>
          <!--/ Weekly Sales-->
        
          <!-- Marketing & Sales-->
          <div class="col-lg-6">
            <div class="swiper-container swiper-container-horizontal swiper swiper-sales" id="swiper-marketing-sales">
              <div class="swiper-wrapper">
                <div class="swiper-slide pb-3">
                  <h5 class="mb-2">Confirmed Tour Bookings</h5>

                  <div class="d-flex align-items-center mt-3">
                    <div class="col-12">
                      <div class="table-responsive text-nowrap">
                        <table class="table table-borderless">
                          <thead class="border-bottom">
                            <tr>
                      
                              <th class="pe-0 fw-medium text-heading">School</th>
                              <th class="pe-0 fw-medium text-heading"> Booking No.</th>
                              <th class="pe-0 fw-medium text-heading"> Date</th>
                              <th class="pe-0 fw-medium text-heading"> Total Price</th>
                            </tr>
                          </thead>
                          @foreach($booking_confirmed as $key => $value )
                          <tbody>
                            <tr>
                      
                              <td class="pe-0"><span class="badge rounded-pill bg-label-primary">{{ $value->name}}</span></td>
                              <td class="pe-0 text-success">{{ $value->booking_number}}</td>
                              <td class="pe-0 text-warning">{{ $value->booking_date}}</td>
                              <td class="pe-0 h6">{{ $value->total_amount}}</td>
                            </tr>
                      
                          </tbody>
                          @endforeach
                      
                        </table>
                      </div>
                              </div>

                  </div>
                  <div class="mt-3 pt-1">
                    <a href="{{ route('confirmed-tour-bookings')}}" class="btn btn-sm btn-outline-primary me-3">Details</a>

                  </div>
                </div>

              </div>

            </div>
          </div>
          <!--/ Marketing & Sales-->
        
          <!-- Weekly Sales with bg-->
          <div class="col-lg-6">
            <div class="swiper-container swiper-container-horizontal swiper swiper-sales" id="swiper-marketing-sales">
              <div class="swiper-wrapper">
                <div class="swiper-slide pb-3">
                  <h5 class="mb-2">Cancelled Tour Bookings</h5>

                  <div class="d-flex align-items-center mt-3">
                    <div class="col-12">
                      <div class="table-responsive text-nowrap">
                        <table class="table table-borderless">
                          <thead class="border-bottom">
                            <tr>
                      
                              <th class="pe-0 fw-medium text-heading">School</th>
                              <th class="pe-0 fw-medium text-heading"> Booking No.</th>
                              <th class="pe-0 fw-medium text-heading"> Date</th>
                              <th class="pe-0 fw-medium text-heading"> Total Price</th>
                            </tr>
                          </thead>
                          @foreach($booking_cancelled as $key => $value )
                          <tbody>
                            <tr>
                      
                              <td class="pe-0"><span class="badge rounded-pill bg-label-primary">{{ $value->name}}</span></td>
                              <td class="pe-0 text-success">{{ $value->booking_number}}</td>
                              <td class="pe-0 text-warning">{{ $value->booking_date}}</td>
                              <td class="pe-0 h6">{{ $value->total_amount}}</td>
                            </tr>
                      
                          </tbody>
                          @endforeach
                      
                        </table>
                      </div>
                              </div>

                  </div>
                  <div class="mt-3 pt-1">
                    <a href="{{ route('cancelled-tour-bookings')}}" class="btn btn-sm btn-outline-primary me-3">Details</a>

                  </div>
                </div>

              </div>

            </div>
          </div>
          <!--/ Weekly Sales with bg-->
        
          <!-- Sales Overview-->
          <div class="col-lg-6">
            <div class="card">
              <div class="card-header">
                <div class="d-flex justify-content-between">
                  <h4 class="mb-2">Tour Bookings Overview</h4>
                 
                </div>

              </div>
              <div class="card-body d-flex justify-content-between flex-wrap gap-3">
                
                <div class="d-flex gap-3">
                  <div class="avatar">
                    <div class="avatar-initial bg-label-warning rounded">
                      <i class="mdi mdi-currency-usd mdi-24px"></i>
                    </div>
                  </div>
                  <div class="card-info">
                    <h4 class="mb-0">{{ ($month_tours_amounts) }}</h4>
                    <small>Monthly Total</small>
                  </div>
                </div>
                <div class="d-flex gap-3">
                  <div class="avatar">
                    <div class="avatar-initial bg-label-info rounded">
                      <i class="mdi mdi-currency-usd mdi-24px"></i>
                    </div>
                  </div>
                  <div class="card-info">
                    <h4 class="mb-0">{{ ($year_tours_amounts) }}</h4>
                    <small>Yearly Total</small>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!--/ Sales Overview-->






          <br/> 
           

          <h5 class="py-3 mb-2">School Annual Bus Rentals Bookings</h5>
        
        
          <!-- Weekly Sales-->
          <div class="col-lg-6">
            <div class="swiper-container swiper-container-horizontal swiper swiper-sales" id="swiper-weekly-sales">
              <div class="swiper-wrapper">
                <div class="swiper-slide pb-3">
                  <h5 class="mb-2">Pending Rental Bookings</h5>

                  <div class="d-flex align-items-center mt-3">

                    <div class="col-12">
            <div class="table-responsive text-nowrap">
              <table class="table table-borderless">
                <thead class="border-bottom">
                  <tr>
            
                    <th class="pe-0 fw-medium text-heading">School</th>
                    <th class="pe-0 fw-medium text-heading"> Booking No.</th>
                    <th class="pe-0 fw-medium text-heading"> Date</th>
                    <th class="pe-0 fw-medium text-heading"> Total Price</th>
                  </tr>
                </thead>
                @foreach($rental_pending as $key => $value )
                <tbody>
                  <tr>
            
                    <td class="pe-0"><span class="badge rounded-pill bg-label-primary">{{ $value->name}}</span></td>
                    <td class="pe-0 text-success">{{ $value->booking_no}}</td>
                    <td class="pe-0 text-warning">{{ $value->date}}</td>
                    <td class="pe-0 h6">{{ $value->total_price}}</td>
                  </tr>
            
                </tbody>
                @endforeach
            
              </table>
            </div>
                    </div>
            
                      </div>
                  <div class="mt-3 pt-1">
                    <a href="{{ route('pending-car-rental-bookings')}}" class="btn btn-sm btn-outline-primary me-3">Details</a>

                  </div>
                </div>
              </div>

            </div>
          </div>
          <!--/ Weekly Sales-->
        
          <!-- Marketing & Sales-->
          <div class="col-lg-6">
            <div class="swiper-container swiper-container-horizontal swiper swiper-sales" id="swiper-marketing-sales">
              <div class="swiper-wrapper">
                <div class="swiper-slide pb-3">
                  <h5 class="mb-2">Confirmed Rental Bookings</h5>

                  <div class="d-flex align-items-center mt-3">
                    <div class="col-12">
                      <div class="table-responsive text-nowrap">
                        <table class="table table-borderless">
                          <thead class="border-bottom">
                            <tr>
                      
                              <th class="pe-0 fw-medium text-heading">School</th>
                              <th class="pe-0 fw-medium text-heading"> Booking No.</th>
                              <th class="pe-0 fw-medium text-heading"> Date</th>
                              <th class="pe-0 fw-medium text-heading"> Total Price</th>
                            </tr>
                          </thead>
                          @foreach($rental_confirmed as $key => $value )
                          <tbody>
                            <tr>
                      
                              <td class="pe-0"><span class="badge rounded-pill bg-label-primary">{{ $value->name}}</span></td>
                              <td class="pe-0 text-success">{{ $value->booking_no}}</td>
                              <td class="pe-0 text-warning">{{ $value->date}}</td>
                              <td class="pe-0 h6">{{ $value->total_price}}</td>
                            </tr>
                      
                          </tbody>
                          @endforeach
                      
                        </table>
                      </div>
                              </div>

                  </div>
                  <div class="mt-3 pt-1">
                    <a href="{{ route('confirmed-car-rental-bookings')}}" class="btn btn-sm btn-outline-primary me-3">Details</a>

                  </div>
                </div>

              </div>

            </div>
          </div>
          <!--/ Marketing & Sales-->
        
          <!-- Weekly Sales with bg-->
          <div class="col-lg-6">
            <div class="swiper-container swiper-container-horizontal swiper swiper-sales" id="swiper-marketing-sales">
              <div class="swiper-wrapper">
                <div class="swiper-slide pb-3">
                  <h5 class="mb-2">Cancelled Rental Bookings</h5>

                  <div class="d-flex align-items-center mt-3">
                    <div class="col-12">
                      <div class="table-responsive text-nowrap">
                        <table class="table table-borderless">
                          <thead class="border-bottom">
                            <tr>
                      
                              <th class="pe-0 fw-medium text-heading">School</th>
                              <th class="pe-0 fw-medium text-heading"> Booking No.</th>
                              <th class="pe-0 fw-medium text-heading"> Date</th>
                              <th class="pe-0 fw-medium text-heading"> Total Price</th>
                            </tr>
                          </thead>
                          @foreach($rental_cancelled as $key => $value )
                          <tbody>
                            <tr>
                      
                              <td class="pe-0"><span class="badge rounded-pill bg-label-primary">{{ $value->name}}</span></td>
                              <td class="pe-0 text-success">{{ $value->booking_no}}</td>
                              <td class="pe-0 text-warning">{{ $value->date}}</td>
                              <td class="pe-0 h6">{{ $value->total_price}}</td>
                            </tr>
                      
                          </tbody>
                          @endforeach
                      
                        </table>
                      </div>
                              </div>

                  </div>
                  <div class="mt-3 pt-1">
                    <a href="{{ route('cancelled-car-rental-bookings')}}" class="btn btn-sm btn-outline-primary me-3">Details</a>

                  </div>
                </div>

              </div>

            </div>
          </div>
          <!--/ Weekly Sales with bg-->
        
          <!-- Sales Overview-->
          <div class="col-lg-6">
            <div class="card">
              <div class="card-header">
                <div class="d-flex justify-content-between">
                  <h4 class="mb-2">Bus Rental Bookings Overview</h4>
                 
                </div>

              </div>
              <div class="card-body d-flex justify-content-between flex-wrap gap-3">
                
                <div class="d-flex gap-3">
                  <div class="avatar">
                    <div class="avatar-initial bg-label-warning rounded">
                      <i class="mdi mdi-currency-usd mdi-24px"></i>
                    </div>
                  </div>
                  <div class="card-info">
                    <h4 class="mb-0">{{ ($month_rental_amount) }}</h4>
                    <small>Monthly Total</small>
                  </div>
                </div>
                <div class="d-flex gap-3">
                  <div class="avatar">
                    <div class="avatar-initial bg-label-info rounded">
                      <i class="mdi mdi-currency-usd mdi-24px"></i>
                    </div>
                  </div>
                  <div class="card-info">
                    <h4 class="mb-0">{{ ($year_rental_amount) }}</h4>
                    <small>Yearly Total</small>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!--/ Sales Overview-->







        
          <!-- Live Visitors-->
          <div class="col-lg-6">
            <div class="card">
              <div class="card-header pb-0">
                <div class="d-flex justify-content-between mb-1">
                  <h4 class="mb-0">Live Visitors</h4>
                  <div class="d-flex text-success">
                    <p class="mb-0 me-2">+78.2%</p>
                    <i class="mdi mdi-chevron-up"></i>
                  </div>
                </div>
                <p class="text-body mb-0">Total 890 Visitors Are Live</p>
              </div>
              <div class="card-body">
                <div id="liveVisitors"></div>
              </div>
            </div>
          </div>
          <!--/ Live Visitors-->
        </div>


                      </div>
                      <!-- / Content -->





  <script src="{{asset('Admin/assets/vendor/libs/chart.js/Chart.js')}}"></script>
  <script src="{{asset('Admin/assets/vendor/libs/chart.js/Chart.min.js')}}"></script>
  <script src="{{asset('Admin/assets/vendor/libs/chart.js/Chart.bundle.min.js')}}"></script>

                      

            
            @endsection
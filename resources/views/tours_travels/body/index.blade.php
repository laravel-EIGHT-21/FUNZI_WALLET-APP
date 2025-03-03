
@extends('tours_travels.body.admin_master')
@section('content')
        

@section('title')

Admin - Dashboard | funziwallet

@endsection


@php 


 

$operator_id = Auth::user()->id;

$months = date('F Y');

$years = date('Y');


$tours = App\Models\tour_packages::where('status',1)->where('tour_operator_id',$operator_id)->get();

$tours_confirmed = App\Models\tours_packs::where('status','Bookings Confirmed')->where('tour_operator_id',$operator_id)->where('year',$years)->get();


$tours_cancelled = App\Models\tours_packs::where('status','Bookings Cancelled')->where('tour_operator_id',$operator_id)->where('year',$years)->get();



$booking_confirmed = App\Models\tours_packs::where('status','Bookings Confirmed')->where('tour_operator_id',$operator_id)->where('year',$years)->orderBy('booking_id','DESC')->latest()->limit(4)->get();


$booking_cancelled = App\Models\tours_packs::where('status','Bookings Cancelled')->where('tour_operator_id',$operator_id)->where('year',$years)->orderBy('booking_id','DESC')->latest()->limit(4)->get();



$tours_booked = App\Models\tours_packs::select('tour_package_id')->groupBy('tour_package_id')->where('status','Bookings Confirmed')->where('tour_operator_id',$operator_id)->where('year',$years)->get();




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
                              <div class="avatar-initial bg-label-warning rounded">
                                <i class="mdi mdi-bus mdi-24px">
                                </i>
                              </div>
                            </div>
                            <div class="card-warning">
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
                  


       
                    <br/> 
           

                    <h5 class="py-3 mb-2">School Tour Bookings</h5>


                    <!-- Weekly Sales-->
                    <div class="col-lg-6">
                      <div class="swiper-container swiper-container-horizontal swiper swiper-sales" id="swiper-weekly-sales">
                        <div class="swiper-wrapper">
                          <div class="swiper-slide pb-3">
                            <h5 class="mb-2">Annual Confimred Tours</h5>

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
                                    @foreach($booking_confirmed as $value )

                                    <tbody>
                                      <tr>
                                
                                        <td class="pe-0"><span class="badge rounded-pill bg-label-primary">{{ $value['booking']['name']}}</span></td>
                                        <td class="pe-0 text-success">{{ $value['booking']['booking_number']}}</td>
                                        <td class="pe-0 text-warning">{{ $value['booking']['booking_date']}}</td>
                                        @php
                                          

                $stud_price_total_yearly = App\Models\tours_packs::where('tour_operator_id',$operator_id)->where('booking_id',$value->booking_id)->sum('stud_pricetotal');


                $adult_price_total_yearly = App\Models\tours_packs::where('tour_operator_id',$operator_id)->where('booking_id',$value->booking_id)->sum('adult_pricetotal');

                $tour_booking_total_yearly = (float)$stud_price_total_yearly+(float)$adult_price_total_yearly;


                                        @endphp
                                        <td class="pe-0 h6">{{ ($tour_booking_total_yearly) }}</td>
                                      </tr>
                                
                                    </tbody>
                                    @endforeach
                                
                                  </table>
                                </div>
                                        </div>
                            </div>
                            <div class="mt-3 pt-1">
                              <a href="{{ route('school-tours-bookings')}}" class="btn btn-sm btn-outline-primary me-3">Details</a>

                            </div>
                          </div>

                        </div>
                        <div class="swiper-pagination"></div>
                      </div>
                    </div>
                    <!--/ Weekly Sales-->
                  
                    <!-- Marketing & Sales-->
                    <div class="col-lg-6">
                      <div class="swiper-container swiper-container-horizontal swiper swiper-sales" id="swiper-marketing-sales">
                        <div class="swiper-wrapper">
                          <div class="swiper-slide pb-3">
                            <h5 class="mb-2">Annual Cancelled Tours</h5>

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
                                    @foreach($booking_cancelled as $value )

                                    <tbody>
                                      <tr>
                                
                                
                                        <td class="pe-0"><span class="badge rounded-pill bg-label-primary">{{ $value['booking']['name']}}</span></td>
                                        <td class="pe-0 text-success">{{ $value['booking']['booking_number']}}</td>
                                        <td class="pe-0 text-warning">{{ $value['booking']['booking_date']}}</td>
                                        @php
                                          

                $stud_price_total_yearly = App\Models\tours_packs::where('tour_operator_id',$value->tour_operator_id)->where('year',$value->year)->sum('stud_pricetotal');


                $adult_price_total_yearly = App\Models\tours_packs::where('tour_operator_id',$value->tour_operator_id)->where('year',$value->year)->sum('adult_pricetotal');

                $tour_booking_total_yearly = (float)$stud_price_total_yearly+(float)$adult_price_total_yearly;


                                        @endphp
                                        <td class="pe-0 h6">{{ $tour_booking_total_yearly}}</td>
                                
                                    </tbody>
                                    @endforeach
                                
                                  </table>
                                </div>
                                        </div>

                            </div>
                            <div class="mt-3 pt-1">
                              <a href="{{ route('school-tours-bookings')}}" class="btn btn-sm btn-outline-primary me-3">Details</a>
                            </div>
                          </div>

                        </div>
                        <div class="swiper-pagination"></div>
                      </div>
                    </div>
                    <!--/ Marketing & Sales-->
                  


                    <br/> 
           

                    <h5 class="py-3 mb-2">Most Tour Packages Booked This Year</h5>


                    <!-- Weekly Sales-->
                    <div class="col-lg-12">
                      <div class="swiper-container swiper-container-horizontal swiper swiper-sales" id="swiper-weekly-sales">
                        <div class="swiper-wrapper">
                          <div class="swiper-slide pb-3">

                            <div class="d-flex align-items-center mt-3">
                              <div class="col-12">
                                <div class="table-responsive text-nowrap">
                                  <table class="table table-borderless">
                                    <thead class="border-bottom">
                                      <tr>

                                        <th class="pe-0 fw-medium text-heading">Tour Package</th>
                                        <th class="pe-0 fw-medium text-heading"> Times Selected</th>

                                      </tr>
                                    </thead>
                                    @foreach($tours_booked as $booked )

                                    <tbody>
                                      <tr>
                                
                                        <td class="pe-0 h6">{{ $booked['tour']['name']}}</td>

                                        @php
                                          

                $total_times_booked = App\Models\tours_packs::where('tour_package_id',$booked->tour_package_id)->where('year',$value->year)->get();


                                        @endphp
                                        <td class="pe-0 h6">{{ count($total_times_booked) }}</td>
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
                    </div>
                    <!--/ Weekly Sales-->
                  



                  
                            </div>
                  <!-- / Content -->
        
                  


                      

                      <script src="{{asset('Tours/assets/vendor/libs/chart.js/Chart.js')}}"></script>
<script src="{{asset('Tours/assets/vendor/libs/chart.js/Chart.min.js')}}"></script>
<script src="{{asset('Tours/assets/vendor/libs/chart.js/Chart.bundle.min.js')}}"></script>

                      

            
            @endsection
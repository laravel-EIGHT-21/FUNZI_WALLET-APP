
@extends('school.bus_rentals.body.admin_master')
@section('content')
        

@section('title')

Admin - Dashboard | funziwallet

@endsection


@php 


$school_id = Auth::user()->id;

$months = date('F Y');

$years = date('Y');



$rentals_confirmed = App\Models\car_rental_bookings::where('status','Bookings Confirmed')->where('school_id',$school_id)->where('year',$years)->get();


$rentals_cancelled = App\Models\car_rental_bookings::where('status','Bookings Cancelled')->where('school_id',$school_id)->where('year',$years)->get();


$rental_operators = App\Models\rental_operators::where('status',1)->get();


$bus_rentals = App\Models\car::latest()->limit(6)->get();


@endphp

      
              <!-- Content -->
        
              <div class="container-xxl flex-grow-1 container-p-y">
       
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
                              <h4 class="mb-0">{{count($rentals_confirmed)}}</h4>

                            </div>
                            <h6>Total Confirmed Rentals</h6>
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
                            <h6>Total Cancelled Rentals</h6>
                          </div>
                        
                        </div>
                      </div>
                    </div>
                  </div>
                
                
                
                </div>
                



                <br/><br/>




                <div class="row">
                  <div class="col-xl-12">
                    <h4 class="text-bold">Some Bus Rentals</h4>
                    <div class="nav-align-top mb-4">
                      <div class="card-header d-flex flex-wrap justify-content-between gap-3">
                        <div class="card-title mb-0 me-1">
                          <h5 class="mb-1"><a href="{{route('school.car.rentals')}}">View More Bus Rentals</a></h5>
                         
                        </div>
                       
                      </div>
                      <br>
                      <div class="tab-content">
                        <div class="tab-pane fade show active" id="navs-pills-all" role="tabpanel">
                
                <br>
                              <div class="card-body">
                                <div class="row gy-4 mb-4">
                
                
                                  @foreach($bus_rentals as $bus )
                
                                  <div class="col-sm-6 col-lg-4">
                                    <div class="card p-2 h-100 shadow-none border">
                                      <div class="rounded-2 text-center mb-3">
                                        <img class="img-fluid" src="{{ (!empty($bus->car_photo))? url('upload/car_photos/'.$bus->car_photo):url('upload/no_image.jpg') }}" alt="Main Thambnail" />
                                      </div>
                                      <div class="card-body p-3 pt-2">
                
                                     
                                        <a href="javascript:void(0);" class="h5">{{$bus->car_name}}</a>
  
                                        <hr>
                                       
                
                                        <div class="row mb-6 g-4">
                                          <div class="col-6">
                                            <div class="d-flex">
                                              <div class="avatar flex-shrink-0 me-4">
                                                <span class="avatar-initial rounded-3 bg-label-warning"><i class="mdi mdi-cash mdi-24px"></i></span>
                                              </div>
                                              <div>
                                                <h6 class="mb-0 text-nowrap fw-semibold"> ugx {{$bus->hire_price}} per Day</h6>
              
                                                <small>Hire Price</small>
                                              </div>
                                            </div>
                                          </div>
              
                                        </div>      
                                        
                                        <br>
                                        <div class="row mb-6 g-4">
                                          <div class="col-6">
                                            <div class="d-flex">
                                              <div class="avatar flex-shrink-0 me-4">
                                                <span class="avatar-initial rounded-3 bg-label-success"><i class="mdi mdi-seat-passenger mdi-24px"></i></span>
                                              </div>
                                              <div>
                                                <h6 class="mb-0 text-nowrap fw-semibold"> {{$bus->no_of_seats}} </h6>
              
                                                <small>Total Seats</small>
                                              </div>
                                            </div>
                                          </div>
              
                                        </div> 
                                        
                                        
                
                <br>
                
                
                
                

                
                                        <div class="d-flex flex-column flex-md-row gap-3 text-nowrap flex-wrap flex-md-nowrap  flex-lg-wrap flex-xxl-nowrap">
                
                                          @php 
  
                                          $school_id = Auth::user()->id;
                                          $busCart = App\Models\car_rental_cart::where('school_id',$school_id)->where('car_id',$bus->id)->first();
                                          
                                          
                                                @endphp
                
                                          @if($busCart == null)
                                       
                                            <a href="{{url('school/bus/rentals/details/'.$bus->id)}}">
                                                <button type="button" title="Add To Rental Cart" class="w-100 btn btn-info d-flex align-items-center">
                                                <i class="ri-bus-fill lh-1 scaleX-n1-rtl ri-24px"></i>
                                                Add To Rental Cart
                                                </button>
                                              </a>


                                              @else
                
                                              <a href="javascript:void(0);">
                                                <button type="button" class="w-100 btn btn-success d-flex align-items-center">
                                                <i class="ri-bus-fill lh-1 scaleX-n1-rtl ri-24px"></i>
                                                      Already Added To Rental Cart
                                                </button>
                                              </a>
                
                                              @endif
                

                                        </div>
                                      </div>
                                    </div>
                                  </div>
                
                
                                  @endforeach
                
                
                                </div>
                
              
                
                
                              </div>
                            
                        </div>
                
                
                
                        </div>
                        
                
                
                
                
                      </div>
                    </div>
                  </div>




                  <br /> <br />
            



                  <div class="row">
                    <div class="col-xl-12">
                      <h4 class="text-bold">Rental Operators Available</h4>
                      <div class="nav-align-top mb-4">
                        <div class="card-header d-flex flex-wrap justify-content-between gap-3">
  
                         
                        </div>
                        <br>
                        <div class="tab-content">
                          <div class="tab-pane fade show active" id="navs-pills-all" role="tabpanel">
                  
                  <br>
                                <div class="card-body">
                                  <div class="row gy-4 mb-4">
                  
                  
                                    @foreach($rental_operators as $operator)
                  
                                    <div class="col-12 col-xxl-4 col-md-4">
                                      <div class="card h-100">
                                        <div class="card-body">

                                          <br>
                                          <h5 class="mb-1">{{$operator->name}}</h5>

                                          <hr>

                                          <p class="mb-6">Tel Contacts : {{$operator->telephone}}, {{$operator->telephone2}}</p>
                                          <p class="mb-6">Address : {{$operator->address}}</p>
                                          <br>
                                          <div class="row mb-6 g-4">
                                            
                                            <div class="col-6">
                                              <div class="d-flex">
                                                <div class="avatar flex-shrink-0 me-4">
                                                  <span class="avatar-initial rounded-3 bg-label-warning"><i class="ri-bus-fill ri-24px"></i></span>
                                                </div>

                                                @php
                                                  
$car_rentals = App\Models\car::where('rental_operator_id',$operator->id)->get();

                                                @endphp
                                                <div>
                                                  <h6 class="mb-0 text-nowrap fw-normal">{{ count($car_rentals) }}</h6>
                                                  <small>Rentals Available </small>
                                                </div>
                                              </div>
                                            </div>
                                          </div>

                                            <br />
                                            <a href="{{url('school/bus/rental/operator/details/'.$operator->id)}}" class="btn btn-primary w-100">View More Details</a>
                                          <br />

                                        </div>
                                      </div>
                                    </div>
                  
                  
                                    @endforeach
                  
                  
                                  </div>
                  
                
                  
                  
                                </div>
                              
                          </div>
                  
                  
                  
                          </div>
                          
                  
                  
                  
                  
                        </div>
                      </div>
                    </div>
  

<br/><br/>

                          </div>
                          <!-- / Content -->
                

                      

                      <script src="{{asset('Admin/assets/vendor/libs/chart.js/Chart.js')}}"></script>
<script src="{{asset('Admin/assets/vendor/libs/chart.js/Chart.min.js')}}"></script>
<script src="{{asset('Admin/assets/vendor/libs/chart.js/Chart.bundle.min.js')}}"></script>

                      

            
            @endsection
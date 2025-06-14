
@extends('school.tours.body.admin_master')
@section('content')
        

@section('title')

Admin - Dashboard | funziwallet

@endsection


@php 


$school_id = Auth::user()->id;

$months = date('F Y');

$years = date('Y');



$tours_confirmed = App\Models\tours_packs::where('status','Bookings Confirmed')->where('school_id',$school_id)->where('year',$years)->get();


$tours_cancelled = App\Models\tours_packs::where('status','Bookings Cancelled')->where('school_id',$school_id)->where('year',$years)->get();


$average1 = App\Models\tour_reviews::where('status',1)->avg('rating',2);

$average2 = App\Models\tour_reviews::where('status',1)->avg('rating',5);

$ratings = App\Models\tour_reviews::with('tour')->where('status',1)->whereBetween('rating',[$average1,$average2])->limit(6)->get();



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
                              <h4 class="mb-0">{{count($tours_confirmed)}}</h4>

                            </div>
                            <h6>Total Confirmed Tours</h6>
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
                              <h4 class="mb-0">{{count($tours_cancelled)}}</h4>

                            </div>
                            <h6>Total Cancelled Tours</h6>
                          </div>
                        
                        </div>
                      </div>
                    </div>
                  </div>
                
                
                
                </div>
                



                <br/><br/>




                <div class="row">
                  <div class="col-xl-12">
                    <h4 class="text-bold">Highest Rated Tour Packages</h4>
                    <div class="nav-align-top mb-4">
                      <div class="card-header d-flex flex-wrap justify-content-between gap-3">
                        <div class="card-title mb-0 me-1">
                          <h5 class="mb-1"><a href="{{route('school.tour.packages')}}">View More Tour Packages</a></h5>
                         
                        </div>
                       
                      </div>
                      <br>
                      <div class="tab-content">
                        <div class="tab-pane fade show active" id="navs-pills-all" role="tabpanel">
                
                <br>
                              <div class="card-body">
                                <div class="row gy-4 mb-4">
                
                
                                  @foreach($ratings as $tour )
                
                                  <div class="col-sm-6 col-lg-4">
                                    <div class="card p-2 h-100 shadow-none border">
                                      <div class="rounded-2 text-center mb-3">
                                        <img class="img-fluid" src="{{ (!empty($tour['tour']['image_thambnail']))? url('upload/tour_package_thumbnail/'.$tour['tour']['image_thambnail']):url('upload/no_image.jpg') }}" alt="Main Thambnail" />
                                      </div>
                                      <div class="card-body p-3 pt-2">
                
                                        @php
                                        $reviewcount = App\Models\tour_reviews::where('tour_id',$tour->id)->where('status',1)->latest()->get();
                                        $avarage = App\Models\tour_reviews::where('tour_id',$tour->id)->where('status',1)->avg('rating');
                                 
                                    @endphp   
                                        <div class="d-flex justify-content-between align-items-center mb-4">
                                          <span class="badge rounded-pill bg-label-warning">Ratings</span>
                                          <p class="d-flex align-items-center justify-content-center gap-1 mb-0">
                                            {{ round($avarage,1) }} 
                                            @if ($avarage == 0)
                                            <span class="text-secondary"><i class="ri-star-s-fill ri-24px me-1"></i></span>
                                            @elseif ($avarage == 1 || $avarage < 2)
                                            <span class="text-warning"><i class="ri-star-s-fill ri-24px me-1"></i></span>
                                            @elseif ($avarage == 2 || $avarage < 3)
                                            <span class="text-warning"><i class="ri-star-s-fill ri-24px me-1"></i></span>
                                            @elseif ($avarage == 3 || $avarage < 4)
                                            <span class="text-warning"><i class="ri-star-s-fill ri-24px me-1"></i></span>
                                            @elseif ($avarage == 4 || $avarage < 5)
                                            <span class="text-warning"><i class="ri-star-s-fill ri-24px me-1"></i></span>
                                            @elseif ($avarage == 5 || $avarage < 5)
                                            <span class="text-warning"><i class="ri-star-s-fill ri-24px me-1"></i></span>
                                            @endif
                                            <span class="fw-normal"> ({{ count($reviewcount) }})</span>
                                          </p>
                                        </div>
                
                                        <a href="javascript:void(0);" class="h5">{{ $tour['tour']['name']}}</a>
  
                                        <hr>
                                       
                
                                        <div class="row mb-6 g-4">
                                          <div class="col-6">
                                            <div class="d-flex">
                                              <div class="avatar flex-shrink-0 me-4">
                                                <span class="avatar-initial rounded-3 bg-label-info"><i class="ri-money-dollar-circle-fill ri-24px"></i></span>
                                              </div>
                                              <div>
                                                <h6 class="mb-0 text-nowrap fw-semibold"> ugx {{$tour['tour']['students_price']}}</h6>

                                                <small>Sudents Price</small>
                                              </div>
                                            </div>
                                          </div>
              
              
              
                                          <div class="col-6">
                                            <div class="d-flex">
                                              <div class="avatar flex-shrink-0 me-4">
                                                <span class="avatar-initial rounded-3 bg-label-dark"><i class="ri-money-dollar-circle-fill ri-24px"></i></span>
                                              </div>
                                              <div>
                                                <h6 class="mb-0 text-nowrap fw-semibold">ugx {{$tour['tour']['adults_price']}}</h6>
                                                <small>Adults Price</small>
                                              </div>
                                            </div>
                                          </div>
                
                                        </div>                            
                
                <br>
                
                
                
                
                                            <div class="row mb-6 g-4">
                
                                              <div class="col-6">
                                                <div class="d-flex">
                                                  <div class="avatar flex-shrink-0 me-4">
                                                    <span class="avatar-initial rounded-3 bg-label-success"><i class="ri-calendar-line ri-24px"></i></span>
                                                  </div>
                                                  <div>
                                                    <h6 class="mb-0 text-nowrap fw-normal"> {{ Carbon\Carbon::parse($tour['tour']['availability_start_date'])->format('d M Y') }}</h6>

                                                    <small>Start Date</small>
                                                  </div>
                                                </div>
                                              </div>
                
                
                
                                              <div class="col-6">
                                                <div class="d-flex">
                                                  <div class="avatar flex-shrink-0 me-4">
                                                    <span class="avatar-initial rounded-3 bg-label-warning"><i class="ri-calendar-line ri-24px"></i></span>
                                                  </div>
                                                  <div>
                                                    <h6 class="mb-0 text-nowrap fw-normal">{{ Carbon\Carbon::parse($tour['tour']['availability_end_date'])->format('d M Y') }}</h6>
                                                    <small>End Date</small>
                                                  </div>
                                                </div>
                                              </div>
                
                                            </div>
                <br />
                
                                        <div class="d-flex flex-column flex-md-row gap-3 text-nowrap flex-wrap flex-md-nowrap  flex-lg-wrap flex-xxl-nowrap">
                
                                          @php 
  
                                          $school_id = Auth::user()->id;
                                          $tourCart = App\Models\tours_cart::where('school_id',$school_id)->where('tour_package_id',$tour['tour']['id'])->first();
                                          
                                          
                                                @endphp
                
                                          @if($tourCart == null)
                                       
                                            <a href="{{url('school/tour/package/details/'.$tour['tour']['id'])}}">
                                                <button type="button" title="Add To Tour Cart" class="w-100 btn btn-primary d-flex align-items-center">
                                                <i class="ri-bus-fill lh-1 scaleX-n1-rtl ri-24px"></i>
                                                Add To Tour Cart
                                                </button>
                                              </a>


                                              @else
                
                                              <a href="javascript:void(0);">
                                                <button type="button" class="w-100 btn btn-danger d-flex align-items-center">
                                                <i class="ri-bus-fill lh-1 scaleX-n1-rtl ri-24px"></i>
                                                      Already Added To Tour Cart
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





<br/><br/>

                          </div>
                          <!-- / Content -->
                

                      

                      <script src="{{asset('Admin/assets/vendor/libs/chart.js/Chart.js')}}"></script>
<script src="{{asset('Admin/assets/vendor/libs/chart.js/Chart.min.js')}}"></script>
<script src="{{asset('Admin/assets/vendor/libs/chart.js/Chart.bundle.min.js')}}"></script>

                      

            
            @endsection
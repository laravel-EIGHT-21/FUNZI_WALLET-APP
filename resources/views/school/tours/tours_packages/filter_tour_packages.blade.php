
@extends('school.tours.body.admin_master')
@section('content')
        

@section('title')

Filter Tour Packages | funzitours

@endsection


      


        <!-- Content -->
        
          <div class="container-xxl flex-grow-1 container-p-y">
            
            
          <h4 class="py-3 mb-4"><span class="text-muted fw-light"><a href="{{route('tours.travels.dashboard')}}">Home</a>/</span>Filter Tour Packages</h4>

          <br/>   <br/>


          <h4 class="text"><b>Filter Tour Packages</b></h4>
            
<div class="app-academy">
  <div class="card p-0 mb-4">
    <div class="card-body">
        <form method="GET" action="{{ route('tour.packages.filtered') }}">
        
            <div class="row">
                <div class="col-md-2">
                <div class="form-floating form-floating-outline mb-4">
                    <input class="form-control" type="date" name="start_date" id="html5-month-input" required />
                    <label for="html5-month-input">Start Date</label>
                    </div> 
                </div> 


                <div class="col-md-2">
        <div class="form-floating form-floating-outline mb-4">
            <input class="form-control" type="date" name="end_date" id="html5-month-input" required />
            <label for="html5-month-input">End Date</label>
            </div> 
        </div>

        <div class="col-md-2">
          <div class="form-floating form-floating-outline mb-4">
              <input class="form-control" type="text" name="min_price" id="html5-month-input" required />
              <label for="html5-month-input">Min Student Price</label>
              </div> 
          </div>

          <div class="col-md-2">
            <div class="form-floating form-floating-outline mb-4">
                <input class="form-control" type="text" name="max_price" id="html5-month-input" required />
                <label for="html5-month-input">Max Student Price</label>
                </div> 
            </div>
            
                <div class="col-md-3">
            <div class="form-floating form-floating-outline mb-4">
                <select name="destination_id" required="" class="select2 form-select form-select-lg" data-allow-clear="true" required>
                    <option value="" selected="" disabled="">Select Region</option>
                    @foreach($destinations as $dest)
                    <option value="{{ $dest->id }}" {{ (@$destination_id == $dest->id)? "selected":"" }} >{{ $dest->destination_name }}</option>
                    @endforeach
                </select>
                <label for="html5-month-input">Region</label>
                </div> 

            </div>
        </div>

          <button type="submit" class="btn btn-primary">Submit</button>

          <a href="{{ route('filter.tour.packages')}}"  class="btn btn-success">Reset</a>
        </form>
      </div>
  </div>

<br/><br/>

<div class="row">
  <div class="col-xl-12">
    <h5 class="text-bold">All Tour Packages Available </h5>
    <div class="nav-align-top mb-4">

      <div class="tab-content">
        <div class="tab-pane fade show active" id="navs-pills-all" role="tabpanel">

<br>
              <div class="card-body">
                <div class="row gy-4 mb-4">


                @foreach($tours as $tour )

                  <div class="col-sm-6 col-lg-4">
                    <div class="card p-2 h-100 shadow-none border">
                      <div class="rounded-2 text-center mb-3">
                        <img class="img-fluid" src="{{ (!empty($tour->image_thambnail))? url('upload/tour_package_thumbnail/'.$tour->image_thambnail):url('upload/no_image.jpg') }}" alt="Main Thambnail" />
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

                        <a href="javascript:void(0);" class="h5">{{ $tour->name}}</a>

                        <hr>
                       

                        <div class="row mb-6 g-4">
                          <div class="col-6">
                            <div class="d-flex">
                              <div class="avatar flex-shrink-0 me-4">
                                <span class="avatar-initial rounded-3 bg-label-info"><i class="ri-money-dollar-circle-fill ri-24px"></i></span>
                              </div>
                              <div>
                                <h6 class="mb-0 text-nowrap fw-semibold"> ugx {{$tour->students_price}}</h6>

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
                                <h6 class="mb-0 text-nowrap fw-semibold">ugx {{$tour->adults_price}}</h6>
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
                                    <h6 class="mb-0 text-nowrap fw-normal"> {{ Carbon\Carbon::parse($tour->availability_start_date)->format('d M Y') }}</h6>

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
                                    <h6 class="mb-0 text-nowrap fw-normal">{{ Carbon\Carbon::parse($tour->availability_end_date)->format('d M Y') }}</h6>
                                    <small>End Date</small>
                                  </div>
                                </div>
                              </div>

                            </div>
<br />

                        <div class="d-flex flex-column flex-md-row gap-3 text-nowrap flex-wrap flex-md-nowrap  flex-lg-wrap flex-xxl-nowrap">

                          @php 

                          $school_id = Auth::user()->id;
                          $tourCart = App\Models\tours_cart::where('school_id',$school_id)->where('tour_package_id',$tour->id)->first();
                          
                          
                                @endphp

                          @if($tourCart == null)
                       
                            <a href="{{url('school/tour/package/details/'.$tour->id)}}">
                                <button type="button" title="Add To Tour Cart" class="w-100 btn btn-primary d-flex align-items-center">
                                <i class="ri-bus-fill lh-1 scaleX-n1-rtl ri-24px"></i>
                                Add To Tour Cart
                                </button>
                              </a>


                              @else

                              <a href="javascript:void(0);">
                                <button type="button" class="w-100 btn btn-danger d-flex align-items-center">
                                <i class="ri-bus-fill lh-1 scaleX-n1-rtl ri-24px"></i>
                                      Alredy Added To Tour Cart
                                </button>
                              </a>

                              @endif

                        </div>
                      </div>
                    </div>
                  </div>


                  @endforeach


                </div>




                {{$tours->links('pagination.bootstrap-4') }}


              </div>
            
        </div>



        </div>
        




      </div>
    </div>
  </div>

</div>

<br/>

          </div>
          <!-- / Content -->

          
          

                      

                      

            
            @endsection
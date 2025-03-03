
@extends('school.bus_rentals.body.admin_master')
@section('content')
        

@section('title')
 
Rental Operator Details | funziwallet

@endsection





<div class="container-xxl flex-grow-1 container-p-y">
            
            
    <h4 class="py-3 mb-2">
        <span class="text-muted fw-light"><a href="{{route('school.car.rentals.dashboard')}}">Home</a> /</span> {{$operator->name}} Details
        </h4>


        <h4 class="text"><b>Filter Bus Rentals</b></h4>
            
        <div class="app-academy">
          <div class="card p-0 mb-4">
            <div class="card-body">
                <form method="GET" action="{{ route('bus.rental.operator.filtered') }}">

                    <input class="form-control" type="hidden" name="id" id="html5-month-input" value="{{$operator->id}}" />

                    <div class="row">



        <div class="col-md-6">
          <div class="form-floating form-floating-outline mb-4">
              <input class="form-control" type="text" name="min_price" id="html5-month-input" required />
              <label for="html5-month-input">Min Hire Price</label>
              </div> 
          </div>

          <div class="col-md-6">
            <div class="form-floating form-floating-outline mb-4">
                <input class="form-control" type="text" name="max_price" id="html5-month-input" required />
                <label for="html5-month-input">Max Hire Price</label>
                </div> 
            </div>
                    
                     
                </div>
        
                  <button type="submit" class="btn btn-primary">Submit</button>

                  <a href="{{ route('bus.rental.operator.details',$operator->id)}}"  class="btn btn-success">Reset</a>

                </form>
              </div>
          </div>
        
        <br/><br/>
        
        <div class="row">
          <div class="col-xl-12">
            <h5 class="text-bold">All Bus Rentals Available From {{$operator->name}} </h5>
            <div class="nav-align-top mb-4">
        
              <div class="tab-content">
                <div class="tab-pane fade show active" id="navs-pills-all" role="tabpanel">
        
        <br>
                      <div class="card-body">
                        <div class="row gy-4 mb-4">
        
        
                        @foreach($rentals as $bus )
        
                        <div class="col-sm-6 col-lg-4">
                          <div class="card p-2 h-100 shadow-none border">
                            <div class="rounded-2 text-center mb-3">
                              <img class="img-fluid" src="{{ (!empty($bus->car_photo))? url('upload/car_photos/'.$bus->car_photo):url('upload/no_image.jpg') }}" alt="Main Thambnail" />
                            </div>
                            <div class="card-body p-3 pt-2">
      
      
                              <a href="javascript:void(0);" class="h5">{{ $bus->car_name}}</a>
      
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
      
      
      <br />
      
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
                                      <button type="button" class="w-100 btn btn-sm btn-success d-flex align-items-center">
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
        
        
        
        
                        {{$rentals->links('pagination.bootstrap-4') }}
        
        
                      </div>
                    
                </div>
        
        
        
                </div>
                
        
        
        
        
              </div>
            </div>
          </div>
        
        </div>
        
        <br/>




            
    </div>
    <!--/ Content -->




@endsection

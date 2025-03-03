
@extends('school.bus_rentals.body.admin_master')
@section('content')
        

@section('title')

Bus Rentals | funzitours

@endsection


      


        <!-- Content -->
        
          <div class="container-xxl flex-grow-1 container-p-y">
            
            
          <h4 class="py-3 mb-4"><span class="text-muted fw-light"><a href="{{route('school.car.rentals.dashboard')}}">Home</a>/All/</span> Bus Rentals</h4>

            
<div class="app-academy">
  <div class="card p-0 mb-4">
    <div class="card-body d-flex flex-column flex-md-row justify-content-between p-0 pt-4">
      <div class="app-academy-md-25 card-body py-0">
        <img src="{{asset('Tours/assets/img/illustrations/bulb-light.png')}}" class="img-fluid app-academy-img-height scaleX-n1-rtl" alt="Bulb in hand" height="90" />
      </div>
      <div class="app-academy-md-50 card-body d-flex align-items-md-center flex-column text-md-center mb-4">
        <span class="card-title mb-3 lh-lg px-md-5 display-6 text-heading">
          All Your Bus Rentals ,
          <span class="text-primary text-nowrap">All In One Place</span>.
        </span>

      </div>
      <div class="app-academy-md-25 d-flex align-items-end justify-content-end">
        <img src="{{asset('Tours/assets/img/illustrations/pencil-rocket.png')}}" alt="pencil rocket" height="188" class="scaleX-n1-rtl" />
      </div>
    </div>
  </div>

<br/><br/>

<div class="row">
  <div class="col-xl-12">
    <h5 class="text-bold">All Bus Rentals </h5>
    <div class="nav-align-top mb-4">

      <br>
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
          <!-- / Content -->

          
          

                      

                      

            
            @endsection
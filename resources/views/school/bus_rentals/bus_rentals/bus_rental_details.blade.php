 
@extends('school.bus_rentals.body.admin_master')
@section('content')



@section('title')

{{$rental->car_name}} details

@endsection




        <!-- Content -->
        
        <div class="container-xxl flex-grow-1 container-p-y">
            
            
            
        <h4 class="py-3 mb-4">
              <span class="text-muted fw-light">View /</span> <b>{{$rental->car_name}}</b>  Detail
            </h4>


            <div class="row">

<div class="mb-4">

<a href="{{ route('school.car.rentals')}}" class="btn rounded-pill btn-warning" style="float:right;"><i class='tf-icons mdi mdi-cart-arrow-right mdi-20px'></i>Contiune Shopping</a>

</div>

</div>
            
            <div class="card g-3 mt-5">
              <div class="card-body row g-3">


                <div class="col-lg-8">
                  <div class="d-flex justify-content-between align-items-center flex-wrap mb-2 gap-1">
                    <div class="me-1">
                      <h5 class="mb-1">{{$rental->car_name}}</h5>                      
                    </div>

                  </div>
                  <div class="card academy-content shadow-none border">
                    <div class="p-2">
                      <div class="cursor-pointer">

                       <img src="{{ (!empty($rental->car_photo))? url('upload/car_photos/'.$rental->car_photo):url('upload/no_image.jpg') }}" class="img-fluid w-100" alt="Product Image" >


                      </div>
                    </div>
                    <div class="card-body">
                      <h5 class="mb-2">Bus Details</h5>

                      <hr class="my-4">
                    
                      <div class="d-flex flex-wrap">
                        <div class="me-5">
                        <p class="text-nowrap fw-semibold"><i class='mdi mdi-bus-multiple mdi-24px me-2'></i> Operator : {{$rental->car_name}}</p>
                          <p class="text-nowrap fw-bold"><i class='mdi mdi-currency-usd mdi-24px me-2'></i>Hire Price : ugx {{$rental->hire_price}}</p>
                          <p class="text-nowrap fw-semibold"><i class='mdi mdi-seat-passenger mdi-24px me-2'></i>Total Seats : {{$rental->no_of_seats}}</p>

                        </div>

                      </div>
                      <hr class="mb-4 mt-2">
                      <h5>Rental Operator</h5>
                      <p class="mb-4">
                      Name : {{$rental['operator']['name']}}
                      </p><br>

                      <p class="mb-4">
                        Tel 1 : {{$rental['operator']['telephone']}}
                        </p><br>

                        <p class="mb-4">
                          Tel 2 : {{$rental['operator']['telephone2']}}
                          </p><br>


                          <p class="mb-4">
                           Address : {{$rental['operator']['address']}}
                            </p><br>




                    </div>
                  </div>
                </div>



                <div class="col-lg-4">
                  <div class="accordion stick-top" id="courseContent">
                    <div class="accordion-item shadow-none border border-bottom-0 active my-0 overflow-hidden">
                      <div class="accordion-header border-0" id="headingOne">
                        <button type="button" class="accordion-button bg-lighter rounded-0" data-bs-toggle="collapse" data-bs-target="#chapterOne" aria-expanded="true" aria-controls="chapterOne">
                          <span class="d-flex flex-column">
                            <span class="h4 mb-1">Submit to Rental Cart</span>

                          </span>
                        </button>
                      </div>
                      <div id="chapterOne" class="accordion-collapse collapse show" data-bs-parent="#courseContent">
                        <div class="accordion-body py-3 border-top">

                        <form action="{{ route('add.to.car.rental.cart') }}"  method="POST" >
                    @csrf

                    <input class="form-control" type="hidden" name="id" value="{{$rental->id}}" id="html5-text-input" />

                    
            <div class="row">
            <div class="col-md">

            <div class="form-floating form-floating-outline mb-4">
          <input class="form-control" type="number" id="vehicle_total" name="vehicle_total" value="1" min="1" />
          <label for="vehicle_total">Total Bus Hired</label>
        </div>

            </div>

            </div>



            <div class="row">
              <div class="col-md">
  
              <div class="form-floating form-floating-outline mb-4">
                <input type="date" name="start_date" class="form-control" min="{{ Carbon\Carbon::now()->format('Y-m-d') }}">
            <label for="startdate">Start Date</label>
          </div>
  
              </div>
  
              </div>



              <div class="row">
                <div class="col-md">
    
                <div class="form-floating form-floating-outline mb-4">
                  <input type="date" name="end_date" class="form-control" min="{{ Carbon\Carbon::now()->format('Y-m-d') }}">
              <label for="enddate">End Date</label>
            </div>
    
                </div>
    
                </div>







            <div class="row">
            <div class="col-md-6">
            <button type="submit" class="btn rounded-pill btn-sm btn-success me-1"><i class='tf-icons mdi mdi-cart-variant mdi-20px'></i>Rental Cart</button>
            </div>

            <div class="col-md-6">
              <button type="reset" class="btn btn-sm btn-outline-secondary me-1"><i class='tf-icons mdi mdi-cart-variant mdi-20px'></i>Reset</button>
              </div>
            </div>

            </form>

                        </div>
                      </div>
                    </div>


                  </div>
                </div>



              </div>
            </div>
            
            
            
                      </div>
                      <!-- / Content -->






@endsection  

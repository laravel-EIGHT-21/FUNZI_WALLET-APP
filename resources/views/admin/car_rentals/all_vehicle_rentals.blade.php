  
@extends('admin.body.admin_master')
@section('content')
        

@section('title')

View All Rentals | funziwallet

@endsection





        <!-- Content -->
        
        <div class="container-xxl flex-grow-1 container-p-y">

            <h4 class="py-3 mb-4">
                  <span class="text-muted fw-light"><a href="{{route('admin.dashboard')}}">Home</a>/View /</span>All Vehicle Rentals 
                </h4>
    
    
    
                <div class="row">
                            <div class="col-12">
                                <!-- ---------------------
                                        start Zero Configuration
                              
                                    ---------------- -->
                                <div class="card">
                                    <div class="card-body">
         
                                        <div class="table-responsive">
                                            <table id="zero_config" class="table border table-striped table-bordered text-nowrap">
                                                <thead>
                                                    <!-- start row -->
                                                    <tr>

                                                <th>Rental Vehicle</th>

                                                <th>Rental Operator</th>
                                                <th>No. of Seats</th>
                                                <th>Hire Price/Day (Fuel)</th>
                                                <th>Hire Price/Day (No Fuel)</th>
                                                    </tr>
                                                    <!-- end row -->
                                                </thead>
    
    <tbody>
    @foreach($allData as $key => $value )
    <tr>

        
<td>
    <div class="d-flex align-items-center">
    <img src="{{ (!empty($value->car_photo))? url('upload/car_photos/'.$value->car_photo):url('upload/no_image.jpg') }}" class="rounded-circle" alt="..." width="56" height="56">
    
    
    <div class="ms-3">
    <h6 class="fw-semibold mb-0 fs-6">{{ $value->car_name}}</h6>

    </div>
    </div>
    </td>
    



    <td>{{ $value['operator']['name']}}</td>
    <td>{{ $value->no_of_seats}}</td>
    <td>{{ $value->hire_price_fuel}}</td>
    <td>{{ $value->hire_price_no_fuel}}</td>
    
    
    

    </tr>
    @endforeach
    </tbody>
    
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <!-- ---------------------
                                        end Zero Configuration
                                    ---------------- -->
                            </div>
                        </div>
    
    
                
                
                          </div>
                          <!--/ Content -->
    
        





@endsection

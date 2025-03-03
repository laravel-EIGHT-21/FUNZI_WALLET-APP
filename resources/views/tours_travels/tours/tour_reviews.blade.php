
@extends('tours_travels.body.admin_master')
@section('content')
        




@section('title')

View All Tour Reviews | funziwallet

@endsection





        <!-- Content -->
        
        <div class="container-xxl flex-grow-1 container-p-y">

        <h4 class="py-3 mb-4">
              <span class="text-muted fw-light"><a href="{{route('tour.operator.dashboard')}}">Home</a>/View /</span> Published Tour Reviews
            </h4>





            <div class="row">
                        <div class="col-12">
                            <!-- ---------------------
                                    start Zero Configuration
                          
                                ---------------- -->
                            <div class="card">
                                <div class="card-body">
     
                                    <div class="table-responsive">
                                        <table id="zero_config"
                                            class="table border table-striped table-bordered text-nowrap">
                                            <thead>
                                                <!-- start row -->
                                                <tr>
                                                    <th>Tour </th>
                                                    <th>School </th> 
                                                    <th>Ratings </th>
                                                    <th>Tour Agency </th> 
                                                    <th>Comment </th> 
                          
                                                </tr>
                                                <!-- end row -->
                                            </thead>

<tbody>
    @foreach ($review as $key=> $item) 
    <tr>

        <td>{{ $item['tour']['name'] }}</td> 
        <td>{{ $item['school']['name'] }}</td> 
        <td> 
            @if($item->rating == NULL)

            <i class="ri-star-s-line"></i>
            <i class="ri-star-s-line"></i>
            <i class="ri-star-s-line"></i>
            <i class="ri-star-s-line"></i>
            <i class="ri-star-s-line"></i>
            @elseif ($item->rating == 1)
            <span class="text-primary fs-1 fw-medium"> <i class="ri-star-s-fill"></i></span>
     
            @elseif ($item->rating == 2)
         <span class="text-primary fs-1 fw-medium"> <i class="ri-star-s-fill"></i></span>
         <span class="text-primary fs-1 fw-medium"> <i class="ri-star-s-fill"></i></span>
     
            @elseif ($item->rating == 3)
            <span class="text-primary fs-1 fw-medium"> <i class="ri-star-s-fill"></i></span>
            <span class="text-primary fs-1 fw-medium"> <i class="ri-star-s-fill"></i></span>
            <span class="text-primary fs-1 fw-medium"> <i class="ri-star-s-fill"></i></span>
     
            @elseif ($item->rating == 4)
            <span class="text-primary fs-1 fw-medium"> <i class="ri-star-s-fill"></i></span>
            <span class="text-primary fs-1 fw-medium"> <i class="ri-star-s-fill"></i></span>
            <span class="text-primary fs-1 fw-medium"> <i class="ri-star-s-fill"></i></span>
            <span class="text-primary fs-1 fw-medium"> <i class="ri-star-s-fill"></i></span>
     
            @elseif ($item->rating == 5)
            <span class="text-primary fs-1 fw-medium"> <i class="ri-star-s-fill"></i></span>
            <span class="text-primary fs-1 fw-medium"> <i class="ri-star-s-fill"></i></span>
            <span class="text-primary fs-1 fw-medium"> <i class="ri-star-s-fill"></i></span>
            <span class="text-primary fs-1 fw-medium"> <i class="ri-star-s-fill"></i></span>
            <span class="text-primary fs-1 fw-medium"> <i class="ri-star-s-fill"></i></span>
       @endif
        </td> 

        <td>{{ $item['tour']['operator']['name'] }}</td> 
        <td>{{ $item->comment }}</td> 
       
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
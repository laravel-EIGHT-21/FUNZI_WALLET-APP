  

@extends('tours_travels.body.admin_master')
@section('content')
@section('title')
 
Schools Tour Bookings | funziwallet

@endsection
        


        <!-- Content -->
        
        <div class="container-xxl flex-grow-1 container-p-y">


        <h4 class="py-3 mb-4">
              <span class="text-muted fw-light"><a href="{{route('tour.operator.dashboard')}}">Home</a> /View /</span> All Tour Bookings List ( {{ count($tour_bookings) }} Booking)
            </h4>

            <br/>


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
                                            <th scope="col">School</th>
                                            <th scope="col">Booking No.</th>
                                            <th scope="col">Date</th>
                                            <th scope="col">Total Price</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Actions</th>


                                                </tr>
                                                <!-- end row --> 
                                            </thead>

<tbody>
  @foreach ($tour_bookings as $key=> $bookingtours)
  @php
      $tourbooking = $bookingtours->first();
      $tour = $tourbooking->booking;
  @endphp  
<tr>

<td>

<div class="d-flex align-items-center">
<div class="ms-3">
<h6 class="fw-semibold mb-0">{{ $tour->name}}</h6>

</div>
</div>

</td>




<td>

  <div class="d-flex align-items-center">
  <div class="ms-3">
  <h6 class="fw-semibold mb-0">{{ $tour->booking_number}}</h6>
  
  </div>
  </div>
  
  </td>


<td>

<div class="d-flex align-items-center">
<div class="ms-3">
<h6 class="fw-semibold mb-0">{{ $tour->booking_date}}</h6>

</div>
</div>

</td>



@php
      
      
$stud_price_total = App\Models\tours_packs::where('tour_operator_id',Auth::user()->id)->where('booking_id',$tour->id)->sum('stud_pricetotal');

$adult_price_total = App\Models\tours_packs::where('tour_operator_id',Auth::user()->id)->where('booking_id',$tour->id)->sum('adult_pricetotal');

$tour_booking_total = (float)$stud_price_total+(float)$adult_price_total;


@endphp

<td>
    
<div class="d-flex align-items-center">
<div class="ms-3">
<h6 class="fw-semibold mb-0">{{ ($tour_booking_total)}}</h6>

</div>
</div>


</td>



<td class="pe-0">
  
  @if ($tour->status == 'Bookings Pending')
  
<span class="badge badge-pill badge-warning" style="background: orange;">Pending</span>

  @elseif ($tour->status == 'Bookings Confirmed')
  
  <span class="badge badge-pill badge-success" style="background: green;">Confirmed</span>

  @elseif ($tour->status == 'Bookings Cancelled')
    
<span class="badge badge-pill badge-danger" style="background: red;">Pending</span>


  @endif

</td>




<td>

<div class="action-btn d-flex align-items-center">
<a href="{{route('tour.bookings.information',$tour->id)}}" target="_blank"  title="Booking Details" class="btn btn-sm btn-primary">
  <i class="mdi mdi-notebook-outline me-1"></i>
</a>

&nbsp;&nbsp;

<a href="{{route('tour.bookings.invoice',$tour->id)}}"  target="_blank" title="Booking Invoice Report" class="btn btn-sm btn-warning">
  <i class="mdi mdi-printer-outline"></i>
</a>


</div>



</td>

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
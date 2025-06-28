@extends('school.bus_rentals.body.main_master')
@section('content')
        

@section('title')

Bus Rental Bookings Details 

@endsection




<div class="body-content">
	<div class="container">


    <div class="row">

      <div class="col-md-6">
        <div class="card">
          <div class="card-header"><h4>School Details</h4></div>
         <hr>
         <div class="card-body" style="background: #E9EBEC;">
           <table class="table">
            <tr>
              <th> Shipping Name : </th>
               <th> {{ $booking->name }} </th>
            </tr>

             <tr>
              <th> Shipping Phone 1 : </th>
               <th> {{ $booking->school_tel1 }} </th>
            </tr>

            <tr>
              <th> Shipping Phone 2 : </th>
               <th> {{ $booking->school_tel2 }} </th>
            </tr>

             <tr>
              <th> Shipping Email : </th>
               <th> {{ $booking->email }} </th>
            </tr>

             <tr>
              <th> Address : </th>
               <th> {{ $booking->school_address }} </th>
            </tr>
             
           </table>


         </div> 
          
        </div>
        
      </div> <!-- // end col md -5 -->



<div class="col-md-6">
        <div class="card"> 
          <div class="card-header"><h4>Bus Rental Booking Details
<span class="text-danger"> Booking No. {{ $booking->booking_no }}</span></h4>
          </div>
         <hr>
         <div class="card-body" style="background: #E9EBEC;">
           <table class="table">
            <tr>
              <th>  Time : </th>
               <th> {{ $booking->time}} </th>
            </tr>

             <tr>
              <th>  Date : </th>
               <th> {{ $booking->date }} </th>
            </tr>

             <tr> 
              <th> Total Tours : </th>
               <th> {{ $booking->total_rentals}} </th>
            </tr>



             <tr>
              <th> Total Amount : </th>
               <th> UGX {{ $booking->total_price }} </th>
            </tr>
 
            <tr>
              <th> Booking Status : </th>
               <th>   
                @if($booking->status == 'Bookings Pending')        
                <span class="badge badge-pill badge-warning" style="background: #6a04df;">Bus Rental Booking Pending </span>

                @elseif($booking->status == 'Bookings Confirmed')
                <span class="badge badge-pill badge-warning" style="background: #31f40a;">Bus Rental Booking Confirmed </span>

              
                @elseif($booking->status == 'Bookings Cancelled')
                <span class="badge badge-pill badge-" style="background: red;">Bus Rental Booking Cancelled </span>

               

              @endif
               </th>
            </tr>

        
    <tr>


      
      @if($booking->status == 'Bookings Pending')     
      
      <th> Cancel Bus Rental Booking : </th>
      <th> 
  
        <a href="{{route('cancel.bus.rentals.bookings',$booking->id)}}" class="btn btn-danger" id="cancelled">
          <i class="fa fa-trash"></i>
        </a>
        
      </th>

      
      @else
      
      
      @endif

    </tr>

 
           
             
           </table>


         </div> 
          
        </div>
        
      </div> <!-- // 2ND end col md -5 -->

      
<br><br>


<div class="row">

<h3> <b>Bus Rental Booking Payments(Mobile Money)</b></h3>

  <div class="col-md-12">
  
          <div class="table-responsive">
            <table class="table border table-striped table-bordered">
              <tbody>
    
                <tr style="background: rgba(241, 239, 241, 0.133)">
                  <td class="col-md-3">
                    <label for=""> Booking No</label>
                  </td>
  
                  <td class="col-md-3">
                    <label for=""> Date </label>
                  </td>
  
                  <td class="col-md-3">
                    <label for="">Time</label>
                  </td>
  
  
                   <td class="col-md-3">
                    <label for=""> Amount (UGX) </label>
                  </td>
                  
                </tr>
  
  
                @foreach($payments as $key => $value)
         <tr>
                  <td class="col-md-3">
                    <label for="">{{$value['booking']['booking_no']}} </label>
                  </td>
  
                  <td class="col-md-3">
                    <label for=""> {{ $value->payment_date }}</label>
                  </td>
  
  
                   <td class="col-md-3">
                    <label for=""> {{ $value->sent_time }}</label>
                  </td>
  
  

  
                   <td class="col-md-3">
                    <label for=""> UGX  {{$value->amount }}</label>
                  </td>
                  
                </tr>
                @endforeach
  
  
  
  
  
              </tbody>
              
            </table>
  
            
            
          </div>
   
           
         </div> <!-- / end col md 8 --> 
  
         
          
        </div> <!-- // END ORDER ITEM ROW -->
  
  

<br><br>

      <div class="row">


        <h3> <b>Bus Rentals Booked </b></h3>



<div class="col-md-12">

        <div class="table-responsive">
          <table class="table">
            <tbody>
  
              <tr style="background: #e2e2e2;">
                <td class="col-md-1">
                  <label for=""> Image</label>
                </td>

                          <td class="col-md-3">
                  <label for=""> Vehicle </label>
                </td>

                <td class="col-md-3">
                  <label for=""> Fuel Status</label>
                </td>


                 <td class="col-md-1">
                  <label for="">Total Vehicle </label>
                </td>

                <td class="col-md-1">
                  <label for="">Total Days </label>
                </td>


                  <td class="col-md-1">
                  <label for="">Hire Price/Day</label>
                </td>

                <td class="col-md-1">
                  <label for="">Total Amount(UGX) </label>
                </td>
      
                
              </tr>


              @foreach($rental_booking as $value)
       <tr>
                <td class="col-md-1">
                  <label for=""><img src="{{ (!empty($value['rental']['car_photo']))? url('upload/car_photos/'.$value['rental']['car_photo']):url('upload/no_image.jpg') }}" height="50px;" width="50px;"> </label>
                </td>

                
                <td class="col-md-3">
                  <label for=""> {{ $value->rental->car_name }}</label>
                </td>


                 <td class="col-md-2">
                  <label for=""> {{ $value->fuel_status }}</label>
                </td>


                

                 <td class="col-md-2">
                  <label for=""> {{ $value->vehicle_total }}</label>
                </td>


          <td class="col-md-2">
                  <label for=""> {{ $value->total_days}}    </label>
                </td>


                                
          <td class="col-md-2">
                  <label for=""> UGX {{ $value->price_per_day}}    </label>
                </td>
                
                          <td class="col-md-2">
                  <label for=""> UGX {{ $value->pricetotal}}    </label>
                </td>

                
              </tr>
              @endforeach





            </tbody>
            
          </table>

          
          
        </div>
 
         
       </div> <!-- / end col md 8 --> 

       
        
      </div> <!-- // END ORDER ITEM ROW -->





<br><br>



    


		 
			
		</div> <!-- // end row -->



  </div>
</div>
            
                    
@endsection

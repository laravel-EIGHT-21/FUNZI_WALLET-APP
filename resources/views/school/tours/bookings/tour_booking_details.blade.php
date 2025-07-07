@extends('school.tours.body.main_master')
@section('content')
        

@section('title')

Tour Bookings Details 

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
          <div class="card-header"><h4>Tour Booking Details
<span class="text-danger"> Booking No. {{ $booking->booking_number }}</span></h4>
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
               <th> {{ $booking->booking_date }} </th>
            </tr>

             <tr> 
              <th> Total Tours : </th>
               <th> {{ $booking->total_tours}} </th>
            </tr>



             <tr>
              <th> Total Amount : </th>
               <th> ugx {{ $booking->total_amount }} </th>
            </tr>
 
            <tr>
              <th> Booking Status : </th>
               <th>   
                @if($booking->status == 'Bookings Pending')        
                <span class="badge badge-pill badge-warning" style="background: #6a04df;">Tour Booking Pending </span>

                @elseif($booking->status == 'Bookings Confirmed')
                <span class="badge badge-pill badge-warning" style="background: #31f40a;">Tour Booking Confirmed </span>

              
                @elseif($booking->status == 'Bookings Cancelled')
                <span class="badge badge-pill badge-" style="background: red;">Tour Booking Cancelled </span>

               

              @endif
               </th>
            </tr>

        
    <tr>


      
      @if($booking->status == 'Bookings Pending')     
      
      <th> Cancel Tour Booking : </th>
      <th> 
  
        <a href="{{route('cancel.tour.bookings',$booking->id)}}" class="btn btn-danger" id="cancelled">
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

<h3> <b>Tour Booking Payments</b></h3>

  <div class="col-md-12">
  
          <div class="table-responsive">
            <table class="table border table-striped table-bordered">
              <tbody>
    
                <tr style="background: rgba(241, 239, 241, 0.133)">
                  <td class="col-md-3">
                    <label for=""> Booking No</label>
                  </td>
  
                  <td class="col-md-3">
                    <label for=""> Paid (UGX) </label>
                  </td>
  
                  <td class="col-md-3">
                    <label for="">Total (UGX)</label>
                  </td>
  
  
                   <td class="col-md-3">
                    <label for=""> Balance (UGX) </label>
                  </td>
                  
                </tr>
  
                  
                </tr>
  
  
                @foreach($payments as $key => $value)
         <tr>
                  <td class="col-md-3">
                    <label for="">{{$value['booking']['booking_number']}} </label>
                  </td>
  
                  <td class="col-md-3">
                    <label for=""> UGX {{ $value->amount }}</label>
                  </td>
  
  
                   <td class="col-md-3">
                    <label for="">UGX {{ $value->total_amount }}</label>
                  </td>
  
  
                  @php 

                  $bal = (float)$value->total_amount-(float)$value->amount;

                  @endphp

  
                   <td class="col-md-3">
                    <label for=""> UGX  {{ $bal }}</label>
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


        <h3> <b>Tours Booked </b></h3>



<div class="col-md-12">

        <div class="table-responsive">
          <table class="table">
            <tbody>
  
              <tr style="background: #e2e2e2;">
                <td class="col-md-1">
                  <label for=""> Image</label>
                </td>

                <td class="col-md-3">
                  <label for=""> Tour </label>
                </td>

                <td class="col-md-3">
                  <label for=""> Stud Qty</label>
                </td>


                 <td class="col-md-1">
                  <label for="">Adult Qty </label>
                </td>

                <td class="col-md-1">
                  <label for="">Stud Total </label>
                </td>

                <td class="col-md-1">
                  <label for="">Adult Total </label>
                </td>
                
              </tr>


              @foreach($tour_booking as $value)
       <tr>
                <td class="col-md-1">
                  <label for=""><img src="{{ (!empty($value['tour']['image_thambnail']))? url('upload/tour_package_thumbnail/'.$value['tour']['image_thambnail']):url('upload/no_image.jpg') }}" height="50px;" width="50px;"> </label>
                </td>

                <td class="col-md-3">
                  <label for=""> {{ $value->tour->name }}</label>
                </td>


                 <td class="col-md-2">
                  <label for=""> {{ $value->stud_qty }}</label>
                </td>

                
                 <td class="col-md-2">
                  <label for=""> {{ $value->adult_qty }}</label>
                </td>


          <td class="col-md-2">
                  <label for=""> UGX {{ $value->stud_pricetotal}}    </label>
                </td>

                
          <td class="col-md-2">
                  <label for=""> UGX {{ $value->adult_pricetotal}}    </label>
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

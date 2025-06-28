@extends('school.tours.body.main_master')
@section('content')
        

@section('title')

Tour Bookings List 

@endsection







<div class="body-content">
	<div class="container">

<div class="row">
  
  <h4>All School Tour Bookings</h4>

</div>

<br/>
		<div class="row">
		
       
       <div class="col-md-1">

       </div>

       <div class="col-md-12"> 

        <div class="shopping-cart">
			<div class="shopping-cart-table">
        <div class="table-responsive"> 
          <table class="table">
            <tbody>
  
              <tr style="background: #e2e2e2;">
              

                <td class="col-md-1">
                  <label for="">Booking No.</label>
                </td>

                <td class="col-md-3">
                  <label for=""> Date</label>
                </td>

                <td class="col-md-3">
                  <label for="">Time</label>
                </td>


                <td class="col-md-2">
                  <label for=""> Total Px</label>
                </td>

                 <td class="col-md-2">
                  <label for=""> Booking Status</label>
                </td>

                 <td class="col-md-1">
                  <label for=""> Action </label>
                </td>
                
              </tr>


              @foreach($bookings as $value )
       <tr>
                <td class="col-md-1">
                  <label for=""> {{ $value->booking_number}}
                </td>

                <td class="col-md-3">
                  <label for=""> {{ $value->booking_date }}</label>
                </td>


                 <td class="col-md-3">
                  <label for=""> {{ $value->time }}</label>
                </td>

                <td class="col-md-2">
                  <label for="">UGX {{ $value->total_amount }}</label>
                </td>



                 <td class="col-md-2">
                  <label for=""> 
                  @if($value->status == 'Bookings Pending')    
                    <span class="badge badge-pill badge-warning" style="background: #330df1;">Tour Bookings Pending </span>

                    @elseif($value->status == 'Bookings Confirmed')
                    <span class="badge badge-pill badge-warning" style="background: #4bec58;">Tour Bookings Confirmed </span>

                   
                @elseif($value->status == 'Bookings Cancelled')
                <span class="badge badge-pill badge-" style="background: red;">Tour Booking Cancelled </span>


                  @endif
 
                    </label>
                </td>

         <td class="col-md-1">
         <a href="{{route('tour.bookings.details',$value->id)}}"   title="Tour Booking Details" class="btn btn-sm btn-primary"><i class="fa fa-eye"></i> View</a>
         
         <a href="{{route('tour.bookings.invoice.report.details',$value->id)}}"  target="_blank" title="Booking Invoice Report" class="btn btn-sm btn-warning" style="margin-top: 5px;"><i class="fa fa-download" style="color: white;"></i> Invoice </a>
          
        </td>
                
              </tr>
              @endforeach





            </tbody>
            
          </table>
          
        </div>
      </div>
       </div>




         
       </div> <!-- / end col md 8 -->

		 

		 
			
		</div> <!-- // end row -->

    <br/><br/><br/>
		
	</div>
	
</div>



                                                        

@endsection 
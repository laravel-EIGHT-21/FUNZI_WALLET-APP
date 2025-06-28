@extends('school.ecommerce.body.main_master')
@section('content')
        


@section('title')

Orders List | funziwallet

@endsection







<div class="body-content">
	<div class="container">

<div class="row">
  
  <h4>All School Orders</h4>

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
                  <label for="">Order No.</label>
                </td>

                <td class="col-md-3">
                  <label for=""> Date</label>
                </td>

                <td class="col-md-3">
                  <label for="">Order Time</label>
                </td>


                <td class="col-md-2">
                  <label for=""> Total Px</label>
                </td>

                 <td class="col-md-2">
                  <label for=""> Status</label>
                </td>

                 <td class="col-md-1">
                  <label for=""> Action </label>
                </td>
                
              </tr>


              @foreach($orders as $order)
       <tr>
                <td class="col-md-1">
                  <label for=""> {{ $order->order_number }}</label>
                </td>

                <td class="col-md-3">
                  <label for=""> {{ $order->order_date }}</label>
                </td>


                 <td class="col-md-3">
                  <label for=""> {{ $order->order_time }}</label>
                </td>

                <td class="col-md-2">
                  <label for="">UGX {{ $order->amount }}</label>
                </td>



                 <td class="col-md-2">
                  <label for=""> 
                  @if($order->status == 'Order Pending')        
                    <span class="badge badge-pill badge-warning" style="background: #800080;">Order Pending </span>

                    @elseif($order->status == 'Order Confirmed')
                    <span class="badge badge-pill badge-warning" style="background: #0000FF;">Order Confirmed </span>


                    @elseif($order->status == 'Out for Delivery')
                    <span class="badge badge-pill badge-warning" style="background: orange;">Out for Delivery </span>


                    @elseif($order->status == 'Order Delivered')
                    <span class="badge badge-pill badge-warning" style="background: #008000;">Order  Delivered </span>

                  
                    @elseif($order->status == 'Order Cancelled')
                    <span class="badge badge-pill badge-" style="background: red;">Order Cancelled </span>

                   

                  @endif
 
                    </label>
                </td>

         <td class="col-md-1">
         <a href="{{route('school.order.details',$order->id)}}"   title="Order Details" class="btn btn-sm btn-primary"><i class="fa fa-eye"></i> View</a>
         
         <a href="{{route('order.invoice.report.details',$order->id)}}"  target="_blank" title="Order Invoice Report" class="btn btn-sm btn-warning" style="margin-top: 5px;"><i class="fa fa-download" style="color: white;"></i> Invoice </a>
          
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
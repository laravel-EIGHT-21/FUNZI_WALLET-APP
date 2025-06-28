@extends('school.ecommerce.body.main_master')
@section('content')
        

@section('title')

Order Details | funziwallet

@endsection




<div class="body-content">
	<div class="container">
		<div class="row">

      <div class="col-md-6">
        <div class="card">
          <div class="card-header"><h4>Shipping Details</h4></div>
         <hr>
         <div class="card-body" style="background: #E9EBEC;">
           <table class="table">
            <tr>
              <th> Shipping Name : </th>
               <th> {{ $order->name }} </th>
            </tr>

             <tr>
              <th> Shipping Phone 1 : </th>
               <th> {{ $order->school_tel1 }} </th>
            </tr>

            <tr>
              <th> Shipping Phone 2 : </th>
               <th> {{ $order->school_tel2 }} </th>
            </tr>

             <tr>
              <th> Shipping Email : </th>
               <th> {{ $order->email }} </th>
            </tr>

             <tr>
              <th> Address : </th>
               <th> {{ $order->school_address }} </th>
            </tr>



            <tr>
              <th> Order Date : </th>
               <th> {{ $order->order_date }} </th>
            </tr>
             
           </table>


         </div> 
          
        </div>
        
      </div> <!-- // end col md -5 -->



<div class="col-md-6">
        <div class="card">
          <div class="card-header"><h4>Order Details
<span class="text-danger"> Order No. : {{ $order->order_number }}</span></h4>
          </div>
         <hr>
         <div class="card-body" style="background: #E9EBEC;">
           <table class="table">
            <tr>
              <th>  Order Time : </th>
               <th> {{ $order->order_time}} </th>
            </tr>

             <tr>
              <th>  Date : </th>
               <th> {{ $order->order_date }} </th>
            </tr>

             <tr> 
              <th> Total Order Items : </th>
               <th> {{ $order->total_order_items}} </th>
            </tr>


            <tr>
              <th> Payment Status : </th>
               <th><b><span class="badge badge-pill badge-warning" style="background: #d0f333;"> {{ $order->payment_status}} </span></b></th>
            </tr>


             <tr>
              <th> Order Total Px : </th>
               <th> ugx {{ $order->amount }} </th>
            </tr>
 
            <tr>
              <th> Order Status : </th>
               <th>   
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
               </th>
            </tr>

        
    <tr>


      
      @if($order->status == 'Order Pending')     
      
      <th> Cancel Order : </th>
      <th> 
  
        <a href="{{route('cancel.order',$order->id)}}" title="Cancel Order" class="btn btn-danger" id="cancelled">
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

<h3> <b>Order Payments</b></h3>

  <div class="col-md-12">
  
          <div class="table-responsive">
            <table class="table border table-striped table-bordered">
              <tbody>
    
                <tr style="background: rgba(241, 239, 241, 0.133)">
                  <td class="col-md-3">
                    <label for=""> Order No</label>
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
  
  
                @foreach($order_payments as $key => $value)
         <tr>
                  <td class="col-md-3">
                    <label for="">{{$value['order']['order_number']}} </label>
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


        <h3> <b>Order Items </b></h3>



<div class="col-md-12">

        <div class="table-responsive">
          <table class="table">
            <tbody>
  
              <tr style="background: #e2e2e2;">
                <td class="col-md-1">
                  <label for=""> Image</label>
                </td>

                <td class="col-md-3">
                  <label for=""> Product Name </label>
                </td>

                <td class="col-md-3">
                  <label for=""> Unit Price</label>
                </td>


                 <td class="col-md-1">
                  <label for=""> Quantity </label>
                </td>

                <td class="col-md-1">
                  <label for="">Total Price </label>
                </td>
                
              </tr>


              @foreach($orderItems as $item)
       <tr>
                <td class="col-md-1">
                  <label for=""><img src="{{ (!empty($item['product']['product_thambnail']))? url('upload/product_images/'.$item['product']['product_thambnail']):url('upload/no_image.jpg') }}" height="50px;" width="50px;"> </label>
                </td>

                <td class="col-md-3">
                  <label for=""> {{ $item->product->product_name }}</label>
                </td>


                 <td class="col-md-3">
                  <label for="">ugx {{ $item->price }}</label>
                </td>



                 <td class="col-md-2">
                  <label for=""> {{ $item->qty }}</label>
                </td>

          <td class="col-md-2">
                  <label for=""> ugx {{ $item->pricetotal}}    </label>
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

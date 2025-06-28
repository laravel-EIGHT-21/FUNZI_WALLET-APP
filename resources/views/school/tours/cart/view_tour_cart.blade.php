@extends('school.tours.body.main_master')
@section('content')
        

@section('title')

Tours Booking Cart

@endsection
 

      
 

<div class="container">


	<div class="row">
  
		<h4>Tour Cart List</h4>
	  
	  </div>
	  
	  <br/>
	  


	<div class="row ">
		<div class="shopping-cart">
			<div class="shopping-cart-table ">
<div class="table-responsive">
	<table class="table">
		<thead>
			<tr>
				<th class="cart-romove item">Remove</th>
				<th class="cart-product-name item">Tour</th>
				<th class="cart-qty item">Stud qty</th>
        <th class="cart-qty item">Adult qty</th>
		<th class="cart-sub-total item">Std Subtotal</th>
		<th class="cart-sub-total item">Adlt Subtotal</th>
			
			
			</tr>
		</thead><!-- /thead -->
		<tfoot>
			<tr>
				<td colspan="7">
					<div class="shopping-cart-btn">
						<span class="">
							<a href="{{ route('tours.travels.dashboard')}}" class="btn btn-upper btn-primary outer-left-xs">Continue Shopping</a>
							
						</span>
					</div><!-- /.shopping-cart-btn -->
				</td>
			</tr>
		</tfoot>

    @php 

    $school_id = Auth::user()->id;
    $tourCartCout = App\Models\tours_cart::where('school_id',$school_id)->count();
    $tourCartSubtotal_Stud = App\Models\tours_cart::where('school_id',$school_id)->sum('stud_pricetotal');
    $tourCartSubtotal_Adult = App\Models\tours_cart::where('school_id',$school_id)->sum('adult_pricetotal');
    
    
          @endphp

@if($tourCartCout > 0)

@foreach($tourCart as $cart)

		<tbody>
			<tr>
				<td class="romove-item">
          <button type="button" onclick="deleteTourCart('{{$cart->id}}')"><i class="fa fa-trash"></i></button> 

        </td>

				<td class="cart-product-name-info">
					<h4 class='cart-product-description'><a href="">{{$cart['tour']['name']}}</a></h4>


				</td>

				<td class="cart-product-quantity">
					<div class="quant-input">

            <div class="arrows">

              <div class="arrow plus gradient">
                <a href="{{route('tour.cart.students.qty.increment',$cart->id)}}" >
                <span class="ir"><i class="icon fa fa-sort-asc"></i></span>
                </a>
              </div>


              <div class="arrow minus gradient">
                <a href="{{route('tour.cart.students.qty.decrement',$cart->id)}}" >
                <span class="ir"><i class="icon fa fa-sort-desc"></i></span>
                </a>
              
              </div>


            </div>
            <input name="stud_qty" value="{{$cart->stud_qty}}" min="1">
							
					  </div>


				</td>
				

        <td class="cart-product-quantity">
					<div class="quant-input">

            <div class="arrows">

              <div class="arrow plus gradient">
                <a href="{{route('tour.cart.adults.qty.increment',$cart->id)}}" >
                <span class="ir"><i class="icon fa fa-sort-asc"></i></span>
                </a>
              </div>


              <div class="arrow minus gradient">
                <a href="{{route('tour.cart.adults.qty.decrement',$cart->id)}}" >
                <span class="ir"><i class="icon fa fa-sort-desc"></i></span>
                </a>
              
              </div>


            </div>
            <input name="adult_qty" value="{{$cart->adult_qty}}" min="1">
							
					  </div>


				</td>


				<td class="cart-product-sub-total"><span class="cart-sub-total-price">{{$cart->stud_pricetotal}}</span></td>
				

				<td class="cart-product-sub-total"><span class="cart-sub-total-price">{{$cart->adult_pricetotal}}</span></td>
				


				
			</tr>




			


		</tbody><!-- /tbody -->

    @endforeach
    @else

    <h4>Your Tour Cart Is EMPTY</h4>

    @endif
	</table><!-- /table -->
</div>
</div><!-- /.shopping-cart-table -->				<div class="col-md-4 col-sm-12 estimate-ship-tax">
<table class="table">
	
	
</table>
</div><!-- /.estimate-ship-tax -->

<div class="col-md-4 col-sm-12 estimate-ship-tax">
<table class="table">
	
	<tbody>
			<tr>
				<td>

				</td>
			</tr>
	</tbody><!-- /tbody -->
</table><!-- /table -->
</div><!-- /.estimate-ship-tax -->

<div class="col-md-4 col-sm-12 cart-shopping-total">
<table class="table">
	<thead>
		<tr>
			<th>

        
        @php 

        $subtotal =(float)$tourCartSubtotal_Stud + (float)$tourCartSubtotal_Adult;

        @endphp

				<div class="cart-grand-total">
					Grand Total<span class="inner-left-md">UGX {{$subtotal}}</span>
				</div>
			</th>
		</tr>
	</thead><!-- /thead -->
	<tbody>
			<tr>
				<td>
					<div class="cart-checkout-btn pull-right">

						<div class="d-grid">

							<form id="CheckOutOrder" method="post" action="{{ route('tour.checkout.store') }}">
							  @csrf
							
							<div class="row">
							<div class="form-floating">
							<input type="hidden" name="shipping_name" value="{{ Auth::user()->name }}" class="form-control" id="floatingInput" aria-describedby="floatingInputHelp" />
							<input type="hidden" name="shipping_email" value="{{Auth::user()->email}}" class="form-control" id="floatingInput" aria-describedby="floatingInputHelp" />
							<input type="hidden" name="shipping_tel1" value="{{Auth::user()->school_tel1}}" class="form-control" id="floatingInput" aria-describedby="floatingInputHelp" />
							<input type="hidden" name="shipping_tel2" value="{{Auth::user()->school_tel2}}" class="form-control" id="floatingInput" aria-describedby="floatingInputHelp" />
							<input type="hidden" name="shipping_address" value="{{Auth::user()->address}}" class="form-control" id="floatingInput" aria-describedby="floatingInputHelp" /> 
							
							
							
							</div> 
							</div>
							
							</form>
							
							
							
							
							<a href="javascript:void(0)" onclick="event.preventDefault();document.getElementById('CheckOutOrder').submit();" class="btn btn-primary checkout-btn">
							<span>PROCEED TO CHECKOUT</span>
							</a>   
						  
						
					</div>
				</td>
			</tr>
	</tbody><!-- /tbody -->
</table><!-- /table -->
</div><!-- /.cart-shopping-total -->			 



<br/><br/><br/><br/>


</div><!-- /.shopping-cart -->
	</div> <!-- /.row -->

<br/><br/>

<form id="removeTourCart" action="{{route('delete.tour.cart')}}" method="post">
  @csrf 
  @method('delete')
  <input type="hidden" id="row_id" name="id" />

  </form>


</div><!-- /.container -->



<script type="text/javascript">


  function deleteTourCart(id)
  {
  
  $('#row_id').val(id);
  $('#removeTourCart').submit();
  
  }
  
  
  </script>
  

            

            

  
  @endsection
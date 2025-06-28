@extends('school.bus_rentals.body.main_master')
@section('content')
        

@section('title')

Bus Rentals Cart 

@endsection


<div class="container">


	<div class="row">
  
		<h4>Bus Rentals Cart List</h4>
	  
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
				<th class="cart-description item">Image</th>
				<th class="cart-product-name item">Name</th>
        <th class="cart-qty item">Fuel</th>
					<th class="cart-qty item">Vehicles</th>
        <th class="cart-qty item">Days</th>
				<th class="cart-sub-total item">Subtotal</th>
			
			</tr>
		</thead><!-- /thead -->
		<tfoot>
			<tr>
				<td colspan="7">
					<div class="shopping-cart-btn">
						<span class="">
							<a href="{{ route('school.car.rentals.dashboard')}}" class="btn btn-upper btn-primary outer-left-xs">Continue Shopping</a>
							
						</span>
					</div><!-- /.shopping-cart-btn -->
				</td>
			</tr>
		</tfoot>

  @php 


  $school_id = Auth::user()->id;
  $CartCount = App\Models\car_rental_cart::where('school_id',$school_id)->count();
  $CartSubtotal = App\Models\car_rental_cart::where('school_id',$school_id)->sum('pricetotal');

    
          @endphp


@if($CartCount > 0)

@foreach($rentalCart as $cart)

		<tbody>
			<tr>
				<td class="romove-item">
          <button type="button" onclick="deleteRentalCart('{{$cart->id}}')"><i class="fa fa-trash"></i></button> 

        </td>


				<td class="cart-image">
					<a class="entry-thumbnail" href="">
						<img src="{{ (!empty($cart['car']['car_photo']))? url('upload/car_photos/'.$cart['car']['car_photo']):url('upload/no_image.jpg') }}" alt="">
					</a>
				</td>
				<td class="cart-product-name-info">
					<h4 class='cart-product-description'><a href="">{{$cart['car']['car_name']}}</a></h4>


				</td>

        				<td class="cart-product-name-info">
					<h4 class='cart-product-description'><a href="">{{$cart->fuel_status}}</a></h4>


				</td>

				<td class="cart-product-quantity">
					<div class="quant-input">

            <div class="arrows">

              <div class="arrow plus gradient">
                <a href="{{route('vehicles.increment',$cart->id)}}" >
                <span class="ir"><i class="icon fa fa-sort-asc"></i></span>
                </a>
              </div>


              <div class="arrow minus gradient">
                <a href="{{route('vehicles.decrement',$cart->id)}}" >
                <span class="ir"><i class="icon fa fa-sort-desc"></i></span>
                </a>
              
              </div>


            </div>
            <input name="vehicle_total" value="{{$cart->vehicle_total}}" min="1">
							
					  </div>


				</td>
				

        <td class="cart-product-quantity">
					<div class="quant-input">

            <div class="arrows">

              <div class="arrow plus gradient">
                <a href="{{route('days.increment',$cart->id)}}" >
                <span class="ir"><i class="icon fa fa-sort-asc"></i></span>
                </a>
              </div>


              <div class="arrow minus gradient">
                <a href="{{route('days.decrement',$cart->id)}}" >
                <span class="ir"><i class="icon fa fa-sort-desc"></i></span>
                </a>
              
              </div>


            </div>
            <input name="total_days" value="{{$cart->total_days}}" min="1">
							
					  </div>


				</td>

				<td class="cart-product-sub-total"><span class="cart-sub-total-price">{{$cart->pricetotal}}</span></td>
				
			</tr>




			


		</tbody><!-- /tbody -->

    @endforeach
    @else

    <h4>Your Cart Is EMPTY</h4>

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

				<div class="cart-grand-total">
					Grand Total<span class="inner-left-md">UGX {{$CartSubtotal}}</span>
				</div>
			</th>
		</tr>
	</thead><!-- /thead -->
	<tbody>
			<tr>
				<td>
					<div class="cart-checkout-btn pull-right">

						<div class="d-grid">

							<form id="CheckOutOrder" method="post" action="{{ route('bus.rental.checkout.store') }}">
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

<form id="removeRentalCart" action="{{route('delete.car.rental.cart')}}" method="post">
  @csrf 
  @method('delete')
  <input type="hidden" id="row_id" name="id" />

  </form>


</div><!-- /.container -->



<script type="text/javascript">


  function deleteRentalCart(id)
  {
  
  $('#row_id').val(id);
  $('#removeRentalCart').submit();
  
  }
  
  
  </script>
        



            

  
  @endsection
@extends('school.ecommerce.body.main_master')
@section('content')
        

@section('title')

Shopping Cart List 

@endsection


<div class="container">


	<div class="row">
  
		<h4>Shopping Cart List</h4>
	  
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
				<th class="cart-product-name item">Product Name</th>
				<th class="cart-qty item">Quantity</th>
				<th class="cart-sub-total item">Subtotal</th>
			
			</tr>
		</thead><!-- /thead -->
		<tfoot>
			<tr>
				<td colspan="7">
					<div class="shopping-cart-btn">
						<span class="">
							<a href="{{ route('school.ecommerce.dashboard')}}" class="btn btn-upper btn-primary outer-left-xs">Continue Shopping</a>
							
						</span>
					</div><!-- /.shopping-cart-btn -->
				</td>
			</tr>
		</tfoot>

    @php 

    $school_id = Auth::user()->id;
    $CartCount = App\Models\order_carts::where('school_id',$school_id)->count();
    $Subtotal = App\Models\order_carts::where('school_id',$school_id)->sum('pricetotal');

    
          @endphp


@if($CartCount > 0)

@foreach($carts as $cart)

		<tbody>
			<tr>
				<td class="romove-item">
          <button type="button" onclick="deleteFromCart('{{$cart->id}}')"><i class="fa fa-trash"></i></button> 

        </td>


				<td class="cart-image">
					<a class="entry-thumbnail" href="">
						<img src="{{ (!empty($cart['product']['product_thambnail']))? url('upload/product_images/'.$cart['product']['product_thambnail']):url('upload/no_image.jpg') }}" alt="">
					</a>
				</td>
				<td class="cart-product-name-info">
					<h4 class='cart-product-description'><a href="">{{$cart['product']['product_name']}}</a></h4>


				</td>

				<td class="cart-product-quantity">
					<div class="quant-input">

            <div class="arrows">

              <div class="arrow plus gradient">
                <a href="{{route('cart.qty.increment',$cart->id)}}" >
                <span class="ir"><i class="icon fa fa-sort-asc"></i></span>
                </a>
              </div>


              <div class="arrow minus gradient">
                <a href="{{route('cart.qty.decrement',$cart->id)}}" >
                <span class="ir"><i class="icon fa fa-sort-desc"></i></span>
                </a>
              
              </div>


            </div>
            <input name="qty" value="{{$cart->qty}}" min="1">
							
					  </div>
				</td>
				<td class="cart-product-sub-total"><span class="cart-sub-total-price">{{$cart->pricetotal}}</span></td>
				
			</tr>




			


		</tbody><!-- /tbody -->

    @endforeach
    @else

    <h4>Your Shopping Cart Is EMPTY</h4>

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
					Grand Total<span class="inner-left-md">UGX {{$Subtotal}}</span>
				</div>
			</th>
		</tr>
	</thead><!-- /thead -->
	<tbody>
			<tr>
				<td>
					<div class="cart-checkout-btn pull-right">

						<div class="d-grid">

							<form id="CheckOutOrder" method="post" action="{{ route('checkout.store') }}">
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

<form id="removeFromCart" action="{{route('delete.from.cart')}}" method="post">
  @csrf 
  @method('delete')
  <input type="hidden" id="row_id" name="id" />

  </form>


</div><!-- /.container -->



<script type="text/javascript">


  function deleteFromCart(id)
  {
  
  $('#row_id').val(id);
  $('#removeFromCart').submit();
  
  }
  
  
  </script>
  

@endsection
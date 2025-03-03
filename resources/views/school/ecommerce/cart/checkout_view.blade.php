@extends('school.ecommerce.body.admin_master')
@section('content')


@section('title')

CheckOut | funziwallet

@endsection


<!-- Content -->

<div class="container-xxl flex-grow-1 container-p-y">



<h4 class="py-3 mb-0">
<span class="text-muted fw-light">View/</span><span class="fw-medium"> CheckOut</span>
</h4>

<div class="app-ecommerce">

<form id="CheckOutStore" method="post" action="{{ route('checkout.store') }}">
@csrf

<div class="row">

<!-- First column-->
<div class="col-12 col-lg-4">
<!-- Product Information -->
<div class="card mb-4">
<div class="card-header">
<h5 class="card-tile mb-0">School Shipping Information</h5>
</div>
<div class="card-body">
<div class="mb-3">
<label class="form-label" for="ecommerce-school-name">School</label>
<input type="text" class="form-control" id="ecommerce-school-name"  name="shipping_name" value="{{ Auth::user()->name }}" aria-label="School Name">
</div>


<div class="mb-3">
<label class="form-label" for="ecommerce-school-email">Email</label>
<input type="email" class="form-control" id="ecommerce-school-email" name="shipping_email" value="{{Auth::user()->email}}" aria-label="Email">
</div>

<div class="mb-3">
<label class="form-label" for="ecommerce-school_tel1">Telephone One</label>
<input type="text" class="form-control" id="ecommerce-school_tel1" name="shipping_tel1" value="{{Auth::user()->school_tel1}}" aria-label="Telephone One">
</div>

<div class="mb-3">
<label class="form-label" for="ecommerce-school_tel2">Telephone Two</label>
<input type="text" class="form-control" id="ecommerce-school_tel2" name="shipping_tel2" value="{{Auth::user()->school_tel2}}" aria-label="Telephone Two">
</div>

<div class="mb-3">
<label class="form-label" for="ecommerce-school_address">Address</label>
<input type="text" class="form-control" id="ecommerce-school_address" name="shipping_address" value="{{Auth::user()->address}}" aria-label="Address">
</div>

</div>
</div>
<!-- /Product Information -->


</div>
<!-- /First column -->

@php 

$school_id = Auth::user()->id;
$CartCount = App\Models\order_carts::where('school_id',$school_id)->count();
$Subtotal = App\Models\order_carts::where('school_id',$school_id)->sum('pricetotal');



@endphp

<!-- Second column -->
<div class="col-12 col-lg-8">
<!-- Pricing Card -->
<div class="card mb-4">
<div class="card-header">
<h5 class="card-title mb-0">School Order(s)</h5>
</div>
<div class="card-body">
<ul class="list-group mb-3">
@foreach($carts as $cart)
<li class="list-group-item p-4">
<div class="d-flex gap-3">
<div class="flex-shrink-0">
<img src="{{ (!empty($cart['product']['product_thambnail']))? url('upload/product_images/'.$cart['product']['product_thambnail']):url('upload/no_image.jpg') }} " alt="Product Image" class="w-px-100">

</div>
<div class="flex-grow-1">
<div class="row">
<div class="col-md-8">
<h6 class="me-3"><a href="javascript:void(0)" class="text-heading">{{$cart['product']['product_name']}}</a></h6>


<div class="d-flex d-md-block align-items-center mb-2 gap-4 justify-content-center justify-content-sm-start">

<p class="fw-medium">Quantity : {{$cart->qty}}</p>

<p class="fw-medium">Total Price : {{$cart->pricetotal}}</p>

</div>


</div>


</div>
</div>
</div>
</li>




@endforeach
</ul>


<hr class="mx-n4">

<!-- Price Details -->
<h6>Price Details</h6>
<dl class="row mb-0">

<dt class="col-6 fw-normal text-heading">Total</dt>
<dd class="col-6 text-end">ugx {{ $Subtotal }}</dd>

</dl>
<hr class="mx-n4">
<div class="d-grid">
<button type="button" onclick="event.preventDefault();document.getElementById('CheckOutStore').submit();" class="btn btn-primary btn-next">
Proceed to CheckOut 
</button>

   


</div>

</form>


<br />

<hr class="mx-n4">

<div class="d-grid">

  <form id="CheckOutCreditOrder" method="post" action="{{ route('checkoutcredit.store') }}">
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
  
  
  
  
  <a href="javascript:void(0)" onclick="event.preventDefault();document.getElementById('CheckOutCreditOrder').submit();" class="btn btn-warning btn-next">
  <span>Chechout Credit Order(s)</span>
  </a>   

</div>


</div>



</div>
<!-- /Pricing Card -->

</div>
<!-- /Second column -->

</div>

</div>

</div>
<!--/ Content -->


@endsection 
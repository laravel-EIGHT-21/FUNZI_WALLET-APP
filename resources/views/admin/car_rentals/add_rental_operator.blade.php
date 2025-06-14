
@extends('admin.body.admin_master')
@section('content')


@section('title')

Add New Rental Operator | funziwallet
 
@endsection




<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<div class="container-xxl flex-grow-1 container-p-y">

<h4 class="py-3 mb-4">
<span class="text-muted fw-light">Add /</span> New Rental Operator Information
</h4>

<div class="row">

<div class="mb-4">

<a href="{{ route('all.rental.operators')}}" class="btn rounded-pill btn-warning" style="float:right;"><i class='tf-icons mdi mdi-arrow-left mdi-20px'></i>Back</a>

</div>

</div>



<div class="row">

<!-- User Content -->
<div class="col-xl-12 col-lg-7 col-md-7 order-0 order-md-1">


<div class="card mb-4">
<h5 class="card-header">Add Rental Operator Information Below</h5>
<div class="card-body">
<form action="{{ route('rental.operator.store') }}" enctype="multipart/form-data" method="POST" >
@csrf


<div class="row">



<div class="col-md-4">

<div class="form-floating form-floating-outline mb-4">
<input class="form-control" type="text" name="name" required  id="html5-text-input" />
<label for="html5-text-input">Operator Name</label>
</div>
</div>



<div class="col-md-4">

<div class="form-floating form-floating-outline mb-4">
<input class="form-control" type="text" name="email" required  id="html5-text-input" />
<label for="html5-text-input">Email</label>
</div>
</div>



<div class="col-4">

<div class="form-floating form-floating-outline mb-4">
<input class="form-control" type="text" name="telephone" required  maxlength="13" id="html5-text-input" />
<label for="html5-text-input">Telephone 1</label>
</div>
</div>

</div>





<div class="row">    

<div class="col-4">

<div class="form-floating form-floating-outline mb-4">
<input class="form-control" type="text" name="telephone2" maxlength="13" required  id="html5-text-input" />
<label for="html5-text-input">Telephone 2</label>
</div>
</div>


<div class="col-4">

<div class="form-floating form-floating-outline mb-4">
<input class="form-control" type="text" name="address" required  id="html5-text-input" />
<label for="html5-text-input">Address</label>
</div>
</div>




<div class="row">
<div class="mb-5">
<button type="submit" class="btn btn-primary me-2">Submit Information</button>
</div>
</div>


</form>
</div>
</div>





</div>
<!--/ User Content -->




</div>




</div>





@endsection

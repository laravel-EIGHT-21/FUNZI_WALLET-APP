
@extends('school.body.admin_master')
@section('content')




@section('title')

School Purchases Information | funziwallet

@endsection



@php


$school_id = Auth::user()->id;

$years = date('Y');

$term_one = DB::table('purchase_stocks')->where('school_id',$school_id)->where('term_id',1)->where('year',$years)->sum('total_price');

$term_two = DB::table('purchase_stocks')->where('school_id',$school_id)->where('term_id',2)->where('year',$years)->sum('total_price');

$term_three = DB::table('purchase_stocks')->where('school_id',$school_id)->where('term_id',3)->where('year',$years)->sum('total_price');



@endphp



<!-- Content -->

<div class="container-xxl flex-grow-1 container-p-y">

<h4 class="py-3 mb-4">
<span class="text-muted fw-light"><a href="{{route('dashboard')}}">Home</a> /View /</span> All School Purchases Information 
</h4>



<br/>



<h5 class="py-3 mb-2"> All School Purchases for Year {{$years}}</h5>
<div class="row gy-4">

<!-- Cards Purchases Transactions -->
<div class="col-lg-4 col-sm-6">
<div class="card">
<div class="card-body">
<div class="d-flex align-items-center flex-wrap gap-2">
<div class="avatar me-3">
<div class="avatar-initial bg-label-danger rounded">
<i class="mdi mdi-currency-usd mdi-24px">
</i>
</div>
</div>
<div class="card-info">
<div class="d-flex align-items-center">
<h4 class="mb-0">UGX {{ ($term_one) }}</h4>

</div>
<small>Total Amount For Term 1</small>
</div>
</div>
</div>
</div>
</div>
<div class="col-lg-4 col-sm-6">
<div class="card">
<div class="card-body">
<div class="d-flex align-items-center flex-wrap gap-2">
<div class="avatar me-3">
<div class="avatar-initial bg-label-success rounded">
<i class="mdi mdi-currency-usd mdi-24px">
</i>
</div>
</div>
<div class="card-info">
<div class="d-flex align-items-center">
<h4 class="mb-0">UGX {{ ($term_two) }}</h4>

</div>
<small>Total Amount For Term 2</small>
</div>
</div>
</div>
</div>
</div>
<div class="col-lg-4 col-sm-6">
<div class="card">
<div class="card-body">
<div class="d-flex align-items-center flex-wrap gap-2">
<div class="avatar me-3">
<div class="avatar-initial bg-label-info rounded">
<i class="mdi mdi-currency-usd mdi-24px">
</i>
</div>
</div> 
<div class="card-info">
<div class="d-flex align-items-center">
<h4 class="mb-0">UGX {{ ($term_three) }}</h4>

</div>
<small>Total Amount For Term 3</small>
</div>
</div>
</div>
</div>
</div>

<!--/ Cards Purchases Transactions -->


</div>


<br/> <br/> 



<div class="row"> 

<div class="mb-4">

<a href="{{ route('view.purchases.filter')}}" class="btn rounded-pill btn-danger" style="float:left;"><i class='mdi mdi-currency-usd mdi-24px'></i>Purchases Filter </a>


<button type="button" class="btn rounded-pill btn-label-primary" style="float:right;" data-bs-toggle="modal" data-bs-target="#addPurchase"><i class='tf-icons mdi mdi-plus mdi-20px'></i>New Purchase Info</button>


</div>


</div>



<!-- Modal -->
<div class="modal fade" id="addPurchase" tabindex="-1" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered" role="document">
<div class="modal-content">
<div class="modal-header">
<h4 class="modal-title" id="modalCenterTitle">Enter New Purchase Information</h4>
<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<form  method="post" action="{{ route('store.purchase.information') }}"  class="row g-3 needs-validation" novalidate>
@csrf
<div class="modal-body">


<div class="row g-2">


<div class="col mb-4 mt-2">
<div class="form-floating form-floating-outline">
<select id="purchase_id" name="purchase_id" required class="select2 form-select form-select-lg" data-allow-clear="true"">
<option value="">Select Item</option>
@foreach ($purchasesitems as $item)
<option value="{{ $item->id }}">{{ $item->name }}</option>
@endforeach

</select>
<label for="purchase_id">Purchase Item</label>
</div>
</div>


<div class="col mb-4 mt-2">
<div class="form-floating form-floating-outline">
<select id="term_id" name="term_id" required class="select2 form-select form-select-lg" data-allow-clear="true"">
<option value="">Select Term</option>
@foreach ($terms as $term)
<option value="{{ $term->id }}">{{ $term->name }}</option>
@endforeach

</select>
<label for="term_id">School Term</label>
</div>
</div>

</div>





<div class="row g-2">


<div class="col mb-4 mt-2">
<div class="form-floating form-floating-outline">
<input type="text" id="qty" class="form-control"  name="item_qty" required">
<label for="qty">Quantity</label> 
</div>
</div>


<div class="col mb-4 mt-2">
<div class="form-floating form-floating-outline">
<input type="text" id="price" class="form-control" maxlength="7" name="unit_price" required">
<label for="price">Enter Unit Price</label> 
</div>
</div>

</div>



<div class="row g-2">


<div class="col mb-4 mt-2">
<div class="form-floating form-floating-outline">
<input type="date" id="date" class="form-control" name="date" required">
<label for="date">Enter Date</label> 
</div>
</div>


<div class="col mb-4 mt-2">
<div class="form-floating form-floating-outline">
<input type="text" id="supplier" class="form-control" name="supplier" required">
<label for="supplier">Enter Supplier</label> 
</div>
</div>

</div>



<div class="row g-2">


<div class="col mb-4 mt-2">
<div class="form-floating form-floating-outline">
<input class="form-control" type="text" name="invoice_no" id="html5-text-input" />
<label for="html5-text-input">Invoice No</label>   
</div>
</div>



<div class="col mb-4 mt-2">
<div class="form-floating form-floating-outline">
<input class="form-control" type="text" name="notes" id="html5-text-input" />
<label for="html5-text-input">Notes</label>   
</div>
</div>


</div>





</div>
<div class="modal-footer">
<button type="submit" class="btn btn-primary me-sm-3 me-1 data-submit">Submit</button>
<button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
</div>
</form>
</div>
</div>
</div>



<br/>




<div class="col-xl-12 col-lg-7 col-md-7 order-0 order-md-1">

<ul class="nav nav-pills flex-column flex-md-row mb-3">

<li class="nav-item">
<button type="button" class="nav-link active py-2" role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-justified-term1" aria-controls="navs-pills-justified-term1" aria-selected="true"><i class="ti ti-user me-1"></i>Term 1 Purchases </button>
</li>

<li class="nav-item">
<button type="button" class="nav-link py-2" role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-justified-term2" aria-controls="navs-pills-justified-term2" aria-selected="false"><i class="tf-icons ti ti-currency-dollar me-1"></i> Term 2 Purchases</button>
</li>


<li class="nav-item">
<button type="button" class="nav-link py-2" role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-justified-term3" aria-controls="navs-pills-justified-term3" aria-selected="false"><i class="tf-icons ti ti-currency-dollar me-1"></i> Term 3 Purchases</button>
</li>

</ul>

<div class="tab-content">




<div class="tab-pane fade show active" id="navs-pills-justified-term1" role="tabpanel">

<div class="row">
<div class="col-12">
<!-- ---------------------
start Zero Configuration

---------------- -->
<div class="card">
<div class="card-body">

<div class="table-responsive">
  <table id="zero_config"
      class="table border table-striped table-bordered text-nowrap">
      <thead>
          <!-- start row -->
          <tr>
          <th>Details</th>
<th>Item</th>
<th>Date</th>
<th>InvoiceNo</th>
<th>Qty</th>
<th>Unit Price</th>
<th>Total</th>

          </tr>
          <!-- end row -->
      </thead>

      <tbody>
@foreach($purchases_term1 as $key => $term1 )
<tr>


<td>


<div class="action-btn">
<a href="{{route('purchase.details',$term1->id)}}" target="_blank"  class="btn btn-sm btn-success"  title="Expense Fees Details">
<span class="mdi mdi-notebook-outline me-1"></span>
</a>

<a href="javascript:void(0);" title="Edit Purchase" class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#editPurchase" id="{{ $term1->id }}" onclick="purchaseView(this.id)">
<i class="mdi mdi-square-edit-outline me-1"></i>
</a>


</div>

</td>

<td>{{ $term1['purchase']['name']}}</td>

<td>{{ $term1->date}}</td>

<td>{{ $term1->invoice_no}}</td>


<td>{{ $term1->item_qty}}</td>

<td> 

<span class="badge rounded-pill text-success bg-dark-info p-2 text-uppercase px-3">
<b><i class='align-middle me-1'></i> 

UGX {{ $term1->unit_price }}



</b></span>


</td>

<td>

<span class="badge rounded-pill text-primary bg-dark-info p-2 text-uppercase px-3">
<b><i class='align-middle me-1'></i>UGX {{$term1->total_price}} </b></span>


</td>







</tr>
@endforeach
</tbody>

  </table>
</div>
</div>
</div>
<!-- ---------------------
end Zero Configuration
---------------- -->


</div>
</div>


</div>    <!--/Term 1 Puchases -->






<!--Term 2 Purchases Collections -->

<div class="tab-pane fade " id="navs-pills-justified-term2" role="tabpanel">


<div class="row">
<div class="col-12">
<!-- ---------------------
start Zero Configuration

---------------- -->
<div class="card">
<div class="card-body">

<div class="table-responsive">
  <table id="one_config"
      class="table border table-striped table-bordered text-nowrap">
      <thead>
          <!-- start row -->
          <tr>
          <th>Details</th>
          <th>Item</th>
<th>Date</th>
<th>InvoiceNo</th>
<th>Qty</th>
<th>Unit Price</th>
<th>Total</th>

          </tr>
          <!-- end row -->
      </thead>

      <tbody>
@foreach($purchases_term2 as $key => $term2 )
<tr>


<td>


<div class="action-btn">
<a href="{{route('purchase.details',$term2->id)}}" target="_blank"  class="btn btn-sm btn-success"  title="Expense Fees Details">
<span class="mdi mdi-notebook-outline me-1"></span>
</a>

<a href="javascript:void(0);" title="Edit Purchase" class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#editPurchase" id="{{ $term2->id }}" onclick="purchaseView(this.id)">
<i class="mdi mdi-square-edit-outline me-1"></i>
</a>


</div>

</td>


<td>{{ $term2['purchase']['name']}}</td>

<td>{{ $term2->date}}</td>

<td>{{ $term2->invoice_no}}</td>


<td>{{ $term2->item_qty}}</td>

<td>

<span class="badge rounded-pill text-success bg-dark-info p-2 text-uppercase px-3">
<b><i class='align-middle me-1'></i> 

UGX {{ $term2->unit_price }}



</b></span>


</td>


<td>

<span class="badge rounded-pill text-primary bg-dark-info p-2 text-uppercase px-3">
<b><i class='align-middle me-1'></i>UGX {{$term2->total_price}} </b></span>


</td>




</tr>
@endforeach
</tbody>

  </table>
</div>
</div>
</div>
<!-- ---------------------
end Zero Configuration
---------------- -->


</div>
</div>


</div>    <!--/Term 2 Puchases -->





<!--Term 3 Purchases Collections -->

<div class="tab-pane fade" id="navs-pills-justified-term3" role="tabpanel">


<div class="row">
<div class="col-12">
<!-- ---------------------
start Zero Configuration

---------------- -->
<div class="card">
<div class="card-body">

<div class="table-responsive">
  <table id="two_config"
      class="table border table-striped table-bordered text-nowrap">
      <thead>
          <!-- start row -->
          <tr>
          <th>Details</th>
          <th>Item</th>
<th>Date</th>
<th>InvoiceNo</th>
<th>Qty</th>
<th>Unit Price</th>
<th>Total</th>

          </tr>
          <!-- end row -->
      </thead>

      <tbody>
@foreach($purchases_term3 as $key => $term3 )
<tr>


<td>


<div class="action-btn">
<a href="{{route('purchase.details',$term3->invoice_no)}}" target="_blank"  class="btn btn-sm btn-success"  title="Purchase Details">
<span class="mdi mdi-notebook-outline me-1"></span>
</a>


<a href="javascript:void(0);" title="Edit Purchase" class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#editPurchase" id="{{ $term3->id }}" onclick="purchaseView(this.id)">
<i class="mdi mdi-square-edit-outline me-1"></i>
</a>

</div>

</td>


<td>{{ $term3['purchase']['name']}}</td>

<td>{{ $term3->date}}</td>
<td>{{ $term3->invoice_no}}</td>

<td>{{ $term3->item_qty}}</td>

<td>

<span class="badge rounded-pill text-success bg-dark-info p-2 text-uppercase px-3">
<b><i class='align-middle me-1'></i> 

UGX {{ $term3->unit_price }}



</b></span>


</td>


<td>

<span class="badge rounded-pill text-primary bg-dark-info p-2 text-uppercase px-3">
<b><i class='align-middle me-1'></i>UGX {{$term3->total_price}} </b></span>


</td>


</tr>
@endforeach
</tbody>

  </table>
</div>
</div>
</div>
<!-- ---------------------
end Zero Configuration
---------------- -->


</div>
</div>


</div>    <!--/Term 3 Puchases -->





</div>

</div>



<!-- Modal -->
<div class="modal fade" id="editPurchase" tabindex="-1" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered" role="document">
<div class="modal-content">
<div class="modal-header">
<h4 class="modal-title" id="modalCenterTitle">Update Purchase Information</h4>
<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<form action="{{ url('/school/update-purchase-information')}}"  method="post">
@csrf

<input type="hidden" name="id" id="id">
<div class="modal-body">


<div class="row g-2">


<div class="col mb-4 mt-2">
<div class="form-floating form-floating-outline">
<select id="edit_purchase" name="purchase_id" required class="select2 form-select form-select-lg" data-allow-clear="true">
<option value="">Select Item</option>

</select>
<label for="edit_purchase">Purchase Item</label>
</div>
</div>


<div class="col mb-4 mt-2">
<div class="form-floating form-floating-outline">
<select id="edit_term" name="term_id" required class="select2 form-select form-select-lg" data-allow-clear="true">
<option value="">Select Term</option>

</select>
<label for="edit_term">School Term</label>
</div>
</div>

</div>





<div class="row g-2">


<div class="col mb-4 mt-2">
<div class="form-floating form-floating-outline">
<input type="text" id="itemqty" class="form-control"  name="item_qty" required">
<label for="qty">Quantity</label> 
</div>
</div>


<div class="col mb-4 mt-2">
<div class="form-floating form-floating-outline">
<input type="text" id="unitprice" class="form-control" maxlength="7" name="unit_price" required">
<label for="price">Enter Unit Price</label> 
</div>
</div>

</div>



<div class="row g-2">


<div class="col mb-4 mt-2">
<div class="form-floating form-floating-outline">
<input type="date" id="dates" class="form-control" name="date" required">
<label for="date">Enter Date</label> 
</div>
</div>


<div class="col mb-4 mt-2">
<div class="form-floating form-floating-outline">
<input type="text" id="suppliers" class="form-control" name="supplier" required">
<label for="supplier">Enter Supplier</label> 
</div>
</div>

</div>



<div class="row g-2">


<div class="col mb-4 mt-2">
<div class="form-floating form-floating-outline">
<input class="form-control" type="text" name="invoice_no" id="invoice_no" />
<label for="invoice_no">Invoice No</label>   
</div>
</div>



<div class="col mb-4 mt-2">
<div class="form-floating form-floating-outline">
<input class="form-control" type="text" name="notes" id="notes" />
<label for="notes">Notes</label>   
</div>
</div>


</div>





</div>
<div class="modal-footer">
<button type="submit" class="btn btn-primary me-sm-3 me-1 data-submit">Update Purchase Details</button>
</div>
</form>
</div>
</div>
</div>





</div>
<!--/ Content -->





      

<script type="text/javascript">


$.ajaxSetup({
headers:{
'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
}
})


function purchaseView(id){

$.ajax({
type: 'GET',
url: '/school/edit/purchase/information/'+id,
dataType: 'json',
success:function(data){

  $('#itemqty').val(data.purchase.item_qty);
  $('#unitprice').val(data.purchase.unit_price);
  $('#dates').val(data.purchase.date);
  $('#suppliers').val(data.purchase.supplier);
  $('#invoice_no').val(data.purchase.invoice_no);
  $('#notes').val(data.purchase.notes);
$('#id').val(id);
var stock = data.purchase;
var item = data.purchaseitem;
var term = data.terms;
var htmlItem = "<option value=''>Select Item</option>";
var htmlTerm = "<option value=''>Select Term</option>";

for(let i = 0;i < item.length;i++){
if(stock['purchase_id'] == item[i]['id']){
htmlItem += `<option value="`+item[i]['id']+`" selected>`+item[i]['name']+`</option>`;
}
else{
htmlItem += `<option value="`+item[i]['id']+`">`+item[i]['name']+`</option>`;
}
}

for(let x = 0;x < term.length;x++){
if(stock['term_id'] == term[x]['id']){
htmlTerm += `<option value="`+term[x]['id']+`" selected>`+term[x]['name']+`</option>`;
}
else{
htmlTerm += `<option value="`+term[x]['id']+`">`+term[x]['name']+`</option>`;
}
}


$("#edit_purchase").html(htmlItem);
$("#edit_term").html(htmlTerm);


}
})

}

</script>




@endsection

@extends('school.body.admin_master')
@section('content')


@section('title')

Purchase Items Categories | funziwallet

@endsection

<!-- Content -->

<div class="container-xxl flex-grow-1 container-p-y">

<h4 class="py-3 mb-4">
<span class="text-muted fw-light"><a href="{{route('dashboard')}}">Home</a> / View /</span> Purchase Items Categories  Information
</h4>


<div class="row">

<div class="mb-2">
<button type="button" class="btn rounded-pill btn-label-primary" style="float:right;" data-bs-toggle="modal" data-bs-target="#addItem"><i class='tf-icons mdi mdi-plus mdi-20px'></i>Add Purchase Item</button>
</div>

</div>


<!-- Modal -->
<div class="modal fade" id="addItem" tabindex="-1" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered" role="document">
<div class="modal-content">
<div class="modal-header">
<h4 class="modal-title" id="modalCenterTitle">Enter New Purchase Item Information</h4>
<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<form  method="post" action="{{ route('store.purchase.items') }}" enctype="multipart/form-data" class="row g-3 needs-validation" novalidate>
@csrf
<div class="modal-body">
<div class="row">
<div class="col mb-4 mt-2">
<div class="form-floating form-floating-outline">
<input type="text" id="nameWithTitle" class="form-control" name="name" required placeholder="Enter Item Name">
<label for="nameWithTitle">Purchase Item Name</label>
</div>
</div>

</div>


<div class="row">
<div class="col mb-4 mt-2">
<div class="form-floating form-floating-outline">
<select id="category_id" name="category_id" required class="select2 form-select form-select-lg" data-allow-clear="true"">
<option value="">Select Category</option>
@foreach ($categories as $item)
<option value="{{ $item->id }}">{{ $item->name }}</option>
@endforeach

</select>
<label for="category_id">Purchase Categories</label>
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
<th scope="col">Item</th>
<th scope="col">Category</th>

<th scope="col">Actions</th>


</tr>
<!-- end row --> 
</thead>

<tbody>
@foreach($purchasesitems as $key => $value )
<tr>

<td>

<div class="d-flex align-items-center">
<div class="ms-3">
<h6 class="fw-semibold mb-0">{{ $value->name}}</h6>

</div>
</div>

</td>



<td>

<div class="d-flex align-items-center">
<div class="ms-3">
<h6 class="fw-semibold mb-0">{{ $value['category']['name']}}</h6>

</div>
</div>

</td>





<td>


<div class="action-btn d-flex align-items-center">

<a href="javascript:void(0);" title="Edit Item" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#editItem" id="{{ $value->id }}" onclick="purchaseitemView(this.id)">
<i class="mdi mdi-square-edit-outline me-2"></i>
</a>


</div>





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




<!-- Modal -->
<div class="modal fade" id="editItem" tabindex="-1" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered" role="document">
<div class="modal-content">
<div class="modal-header">
<h4 class="modal-title" id="modalCenterTitle">Update Purchase Item Information</h4>
<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<form action="{{ url('/school/purchase-items-update')}}"  method="post">
@csrf

<input type="hidden" name="id" id="item_id">

<div class="modal-body">
<div class="row">
<div class="col mb-4 mt-2">
<div class="form-floating form-floating-outline">
<input type="text" id="name" class="form-control" name="name" required>
<label for="name">Purchase Item Name</label>
</div>
</div>

</div>


<div class="row">
<div class="col mb-4 mt-2">
<div class="form-floating form-floating-outline">
<select id="edit_category" name="category_id" required class="select2 form-select form-select-lg" data-allow-clear="true">
<option value="">Select Category</option>
</select>
<label for="edit_category">Purchase Categories</label>
</div>
</div>
</div>




</div>
<div class="modal-footer">
<button type="submit" class="btn btn-primary me-sm-3 me-1 data-submit">Update Purchase Item</button>

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


function purchaseitemView(id){

$.ajax({
type: 'GET',
url: '/school/purchase/items/edit/'+id,
dataType: 'json',
success:function(data){

$('#name').val(data.purchaseitem.name);
$('#item_id').val(id);
var item = data.purchaseitem;
var category = data.categories;
var htmlCategory = "<option value=''>Select Category</option>";


for(let i = 0;i < category.length;i++){
if(item['category_id'] == category[i]['id']){
htmlCategory += `<option value="`+category[i]['id']+`" selected>`+category[i]['name']+`</option>`;
}
else{
htmlCategory += `<option value="`+category[i]['id']+`">`+category[i]['name']+`</option>`;
}
}

$("#edit_category").html(htmlCategory);

}
})

}

</script>




@endsection 
  
@extends('admin.body.admin_master')
@section('content')
        

@section('title')

All School Term | funziwallet

@endsection

        <!-- Content -->
        
        <div class="container-xxl flex-grow-1 container-p-y">

        <h4 class="py-3 mb-4">
              <span class="text-muted fw-light">View /</span> School Term Information
            </h4>

            @can('create-school-term')
<div class="row">

<div class="mb-2">
<button type="button" class="btn rounded-pill btn-label-primary" style="float:right;" data-bs-toggle="modal" data-bs-target="#addTerm"><i class='tf-icons mdi mdi-plus mdi-20px'></i>Add New Term</button>
</div>

</div>
@endcan

          <!-- Modal -->
          <div class="modal fade" id="addTerm" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title" id="modalCenterTitle">Enter New Term Information</h4>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form  method="post" action="{{ route('term.store') }}" enctype="multipart/form-data" class="row g-3 needs-validation" novalidate>
                                @csrf
                <div class="modal-body">
                  <div class="row">
                    <div class="col mb-4 mt-2">
                      <div class="form-floating form-floating-outline">
                        <input type="text" id="nameWithTitle" class="form-control" name="name" required placeholder="Enter Term Name">
                        <label for="nameWithTitle">Name</label>
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
                                            <th scope="col">Term</th>

                                            <th scope="col">Actions</th>


                                                </tr>
                                                <!-- end row --> 
                                            </thead>

<tbody>
@foreach($terms as $key => $value )
<tr>

<td>

<div class="d-flex align-items-center">
<div class="ms-3">
<h6 class="fw-semibold mb-0">{{ $value->name}}</h6>

</div>
</div>

</td>





<td>

@can('edit-school-term')

<div class="action-btn d-flex align-items-center">

<a href="javascript:void(0);" title="Edit Term" class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#editTerm" id="{{ $value->id }}" onclick="termView(this.id)">
<i class="mdi mdi-square-edit-outline me-1"></i>
</a>


</div>
@endcan




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
          <div class="modal fade" id="editTerm" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title" id="modalCenterTitle">Update Term</h4>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ url('/admin/update-school-term')}}"  method="post">
                  @csrf

                  <input type="hidden" name="id" id="id">
                <div class="modal-body">
                  <div class="row">
                    <div class="col mb-4 mt-2">
                      <div class="form-floating form-floating-outline">
                        <input type="text" id="name" class="form-control" name="name" required>
                        <label for="nameWithTitle">Name</label>
                      </div>
                    </div>

                  </div>




                </div>
                <div class="modal-footer">
                <button type="submit" class="btn btn-primary me-sm-3 me-1 data-submit">Submit</button>

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


function termView(id){

$.ajax({
type: 'GET',
url: '/admin/edit/school/term/'+id,
dataType: 'json',
success:function(data){

$('#name').val(data.term.name);
$('#id').val(id);

}
})

}

</script>




                                  

@endsection 
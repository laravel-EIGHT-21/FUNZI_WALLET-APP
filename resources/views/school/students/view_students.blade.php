
@extends('school.body.admin_master')
@section('content')
        



@section('title')

View Active Students` Wallets| funziwallet

@endsection





        <!-- Content -->
        
        <div class="container-xxl flex-grow-1 container-p-y">

        <h4 class="py-3 mb-4">
              <span class="text-muted fw-light"><a href="{{route('dashboard')}}">Home</a> /View /</span>  Active Students Wallets
            </h4>

            <div class="row">

            <div class="mb-2">
                                <button type="button" class="btn rounded-pill btn-label-primary" style="float:right;" data-bs-toggle="modal" data-bs-target="#addStudent"><i class='ti ti-plus ti-sm'></i>Register New Student</button>
                                    </div>

            </div>

          <!-- Modal -->
          <div class="modal fade" id="addStudent" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title" id="modalCenterTitle">Enter New Student Information</h4>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form  method="post" action="{{ route('students.store') }}"  class="row g-3 needs-validation" novalidate>
                                @csrf
                <div class="modal-body">
                  <div class="row g-2">
                    <div class="col mb-4 mt-2">
                      <div class="form-floating form-floating-outline">
                        <input type="text" id="nameWithTitle" class="form-control" name="name" required placeholder="Enter Name">
                        <label for="nameWithTitle">Name</label>
                      </div>
                    </div>

                    <div class="col mb-4 mt-2">
                      <div class="form-floating form-floating-outline">
                        <input type="email" id="emailWithTitle" class="form-control" name="email" required placeholder="xxxx@xxx.xx">
                        <label for="emailWithTitle">Email</label>
                      </div>
                    </div>

                  </div>





                  <div class="row g-2">
                    <div class="col mb-4 mt-2">
                      <div class="form-floating form-floating-outline">
                        <input type="text" id="nameWithTitle" class="form-control" name="student_tel" maxlength="13" required placeholder="Example +256700000000">
                        <label for="nameWithTitle">Parent/Guardian Telephone One</label>
                      </div>
                    </div>

                    <div class="col mb-4 mt-2">
                      <div class="form-floating form-floating-outline">
                        <input type="text" id="nameWithTitle" class="form-control" name="student_tel2" maxlength="13" required placeholder="Example +256700000000">
                        <label for="nameWithTitle">Parent/Guardian Telephone Two</label>
                      </div>
                    </div>


                  </div>


                  

                  <div class="row ">
                    <div class="col mb-4 mt-2">
                      <div class="form-floating form-floating-outline">
                        <input type="text" id="nameWithTitle" class="form-control" name="student_NIN" required >
                        <label for="nameWithTitle">Student NIN</label>
                      </div>
                    </div>





                  </div>





                  <div class="row g-2">




                    <div class="col mb-4 mt-2">
                    <div class="form-floating form-floating-outline">
                    <select id="genders" name="gender" class="form-select form-select-lg" data-allow-clear="true">
                    <option value="">Select Gender</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                    </select>
                    <label for="genders">Gender</label>
                    </div>
                    </div>

                    
                    <div class="col mb-4 mt-2">
                      <div class="form-floating form-floating-outline">
                        <input type="password" id="password" class="form-control" name="password" required">
                        <label for="password">Password</label> 
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
                                        <table id="file_export"
                                            class="table border table-striped table-bordered text-nowrap">
                                            <thead>
                                                <!-- start row -->
                                                <tr>
                                                <th>Students</th>
                                            <th>School</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                                </tr>
                                                <!-- end row -->
                                            </thead>

                                            <tbody>
@foreach($allData as $key => $value )
<tr>

<td>{{ $value->name}}</td>

<td> {{ $value['school']['name'] }}</td>	

<td class="pe-0">

@if($value->status == 1)
<span class="badge rounded-pill bg-label-success">Active</span>
@elseif($value->status == 0 )
<span class="badge rounded-pill bg-label-danger">Inactive</span>
@endif

</td>

<td>

<div class="action-btn">


<a href="{{route('edit.student',$value->id)}}" class="btn btn-sm btn-primary"  title="Edit Student">
<span class="mdi mdi-square-edit-outline"></span>
</a>
&nbsp;

<a href="javascript:void(0);" class="btn btn-sm btn-success"  title="Student Details" data-bs-toggle="modal" data-bs-target="#viewStudent" id="{{ $value->id }}" onclick="studentDetails(this.id)">
<span class="mdi mdi-notebook-outline "></span>
</a>
&nbsp;

@if($value->status == 1)
<a href="{{route('students.inactive',$value->id)}}" class="btn btn-sm btn-danger" id="deactivate" title="Deactivate">
<span class="mdi mdi-arrow-down-bold-box "></span></a>
@else
<a href="{{route('students.active',$value->id)}}" class="btn btn-sm btn-success" id="activate" title="Activate">
<span class="mdi mdi-arrow-up-bold-box"></span></a>
@endif

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







                    <div class="modal fade" id="viewStudent" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title" id="modalCenterTitle"> Student Information Detail</h4>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                  <div class="row g-2">
                    <div class="col mb-4 mt-2">
                      <div class="form-floating form-floating-outline">
                        <input class="form-control" id="name" readonly>
                        <label for="nameWithTitle">Student Name</label>
                      </div>
                    </div>

                    <div class="col mb-4 mt-2">
                      <div class="form-floating form-floating-outline">
                        <input type="email" class="form-control" id="email" readonly>
                        <label for="emailWithTitle">Email</label>
                      </div>
                    </div>

                  </div>





                  <div class="row g-2">
                    <div class="col mb-4 mt-2">
                      <div class="form-floating form-floating-outline">
                        <input class="form-control" id="telephone" readonly>
                        <label for="nameWithTitle">Parent/Guardian Telephone One</label>
                      </div>
                    </div>

                    <div class="col mb-4 mt-2">
                      <div class="form-floating form-floating-outline">
                        <input class="form-control" id="telephone2" readonly>
                        <label for="nameWithTitle">Parent/Guardian Telephone Two</label>
                      </div>
                    </div>


                  </div>


                  

                  <div class="row g-2">
                    <div class="col mb-4 mt-2">
                      <div class="form-floating form-floating-outline">
                        <input class="form-control" id="student_NIN" readonly >
                        <label for="nameWithTitle">Student NIN</label>
                      </div>
                    </div>

                    

                    <div class="col mb-4 mt-2">
                      <div class="form-floating form-floating-outline">
                      <input class="form-control" id="gender" readonly>
                      <label for="genders">Gender</label>
                      </div>
                      </div>


                  </div>












                </div>
                <div class="modal-footer">

                      <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                </div>

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


function studentDetails(id){

$.ajax({
  type: 'GET',
  url: '/school/student/view/details/'+id,
  dataType: 'json',
  success:function(data){
     
    $('#name').val(data.student.name);
    $('#email').val(data.student.email);
    $('#telephone').val(data.student.telephone);
    $('#telephone2').val(data.student.telephone2);
    $('#student_NIN').val(data.student.student_NIN);

    $('#gender').val(data.student.gender);

    var student = data.student;

    var term = data.terms;
var htmlTerm = "<option value=''>Select Term</option>";


for(let x = 0;x < term.length;x++){
if(student['term_id'] == term[x]['id']){
htmlTerm += `<option value="`+term[x]['id']+`" selected>`+term[x]['name']+`</option>`;
}
else{
htmlTerm += `<option value="`+term[x]['id']+`">`+term[x]['name']+`</option>`;
}
}

$("#edit_term").html(htmlTerm);


  }
})

}
 
</script>





@endsection
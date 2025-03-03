
@extends('school.body.admin_master')
@section('content')




@section('title')

Update Student | funziwallet

@endsection

        
        <!-- Content -->
        
        <div class="container-xxl flex-grow-1 container-p-y">
            
            
            <h4 class="py-3 mb-4">
              <span class="text-muted fw-light">Student / Information /</span> Update 
            </h4>



            
            <div class="row">

<div class="mb-4">

<a href="{{ route('view.students')}}" class="btn rounded-pill btn-primary" style="float:right;"><i class='tf-icons mdi mdi-arrow-left mdi-20px'></i>Back</a>

</div>

</div>

            <div class="row">
              <!-- User Sidebar -->
              <div class="col-xl-6 col-lg-5 col-md-5 order-1 order-md-0">
                <!-- User Card -->
                <div class="card mb-4">
                  <div class="card-body">


                    <h5 class="pb-3 border-bottom mb-3">Student`s Details</h5>
                    <div class="info-container">
                      <ul class="list-unstyled mb-4">


                      <li class="mb-3">
                          <span class="fw-medium text-heading me-2">Name :</span>
                          <span>{{$editData->name}}</span>
                        </li>


                        <li class="mb-3">
                          <span class="fw-medium text-heading me-2">Email :</span>
                          <span>{{$editData->email}}</span>
                        </li>

                        
                        <li class="mb-3">
                          <span class="fw-medium text-heading me-2">Parent/Guardian Tel 1 :</span>
                          <span>{{$editData->telephone}}</span>
                        </li>

                        <li class="mb-3">
                          <span class="fw-medium text-heading me-2">Parent/Guardian Tel 2 :</span>
                          <span>{{$editData->telephone2}}</span>
                        </li>


                        <li class="mb-3">
                          <span class="fw-medium text-heading me-2">Gender :</span>
                          <span>{{$editData->gender}}</span>
                        </li>

                        <li class="mb-3">
                          <span class="fw-medium text-heading me-2">Student NIN :</span>
                          <span>{{$editData->student_NIN}}</span>
                        </li>



                        <li class="mb-3">
                          <span class="fw-medium text-heading me-2">Status :</span>

                          
@if($editData->status == 1)
<span class="badge bg-label-success rounded-pill">Active</span>
@elseif($editData->status == 0 )
<span class="badge bg-label-danger rounded-pill">Deactive</span>
@endif


                           
                        </li>

                      

                      </ul>

                    </div>
                  </div>
                </div>
                <!-- /User Card -->

              </div>
              <!--/ User Sidebar -->
            
            
              <!-- User Content -->
              <div class="col-xl-6 col-lg-7 col-md-7 order-0 order-md-1">

            
                <!-- Change Password -->
                <div class="card mb-4">
                  <h5 class="card-header">Update Student Information Below</h5>
                  <div class="card-body">
                    <form action="{{ route('students.update',$editData->id) }}" method="POST" >
                    @csrf

                      <div class="row">
                      <div class="col mb-4 mt-2">
    
     
        <div class="form-floating form-floating-outline">
          <input type="text" class="form-control" id="floatingInputFilled" name="name" value="{{$editData->name}}" aria-describedby="floatingInputFilledHelp" />
          <label for="floatingInputFilled">Student Name</label>
          <span class="form-floating-focused"></span>
        </div>
      
  
  </div>
  </div>


  <div class="row">
  <div class="col mb-4 mt-2">
            <div class="form-floating form-floating-outline">
            <input type="email" id="email" class="form-control" name="email" value="{{$editData->email}}" required">
            <label for="email">Email</label> 
            </div>
            </div> 
  </div>


<div class="row">

<div class="col mb-4 mt-2">
<div class="form-floating form-floating-outline">
<input type="text" id="nameWithTitle" class="form-control" name="telephone" required value="{{$editData->telephone}}"maxlength="13">
<label for="nameWithTitle">Parent/Guardian Telephone One</label>
</div>

</div>
</div>



<div class="row">

<div class="col mb-4 mt-2">
<div class="form-floating form-floating-outline">
<input type="text" id="nameWithTitle" class="form-control" name="telephone2" required value="{{$editData->telephone2}}" maxlength="13">
<label for="nameWithTitle">Parent/Guardian Telephone Two</label>
</div>

</div>
</div>



<div class="row">

<div class="col mb-4 mt-2">
<div class="form-floating form-floating-outline">
<input type="text" id="nameWithTitle" class="form-control" name="student_NIN" required value="{{$editData->student_NIN}}" >
<label for="nameWithTitle">Student NIN</label>
</div>

</div>
</div>








                <div class="row">
                <div class="col mb-4 mt-2">
                <div class="form-floating form-floating-outline">
                <select id="gender" name="gender" class="select2 form-select" data-allow-clear="true">
                <option value="" selected="" disabled="">Select Gender</option>
                <option value="Male" {{ ($editData->gender == 'Male')? 'selected':'' }}>Male</option>
                <option value="Female" {{ ($editData->gender == 'Female')? 'selected':'' }}>Female</option>

                </select>
                <label for="gender">Gender</label>
                </div>
                </div>

                </div>




                      <div class="row">
                      <div>
                          <button type="submit" class="btn btn-primary me-2">Update Student Information</button>
                        </div>
                      </div>

                    </form>
                  </div>
                </div>

            

            

              </div>
              <!--/ User Content -->
            </div>
            

            
                      </div>
                      <!--/ Content -->
            
                                                        

@endsection 

@extends('school.body.admin_master')
@section('content')
        



@section('title')


@php

$school = Auth::user()->name;    
 
@endphp

{{ $school}}`s Admission Fees Filter| funziwallet

@endsection



@php  


$years = date('Y');

$school_id = Auth::user()->id;

$term_one = DB::table('admissions')->where('school_id',$school_id)->where('term_id',1)->where('year',$years)->sum('admission_fees');


$term_two = DB::table('admissions')->where('school_id',$school_id)->where('term_id',2)->where('year',$years)->sum('admission_fees');


$term_three = DB::table('admissions')->where('school_id',$school_id)->where('term_id',3)->where('year',$years)->sum('admission_fees');




@endphp 





        <!-- Content -->
        
        <div class="container-xxl flex-grow-1 container-p-y">

        <h4 class="py-3 mb-4">
              <span class="text-muted fw-light"><a href="{{route('dashboard')}}">Home</a> /View /</span>Students  Admission Fees Collections
            </h4>



            
      <br />

            
<div class="card mb-4">

<div class="row gy-4 gy-sm-1">
      
      
<!-- Cards SchoolFees Transactions -->
<div class="col-lg-4 col-sm-6">
<div class="card">
<div class="card-body">
  <div class="d-flex align-items-center flex-wrap gap-2">
    <div class="avatar me-3">
      <div class="avatar-initial bg-label-primary rounded">
        <i class="mdi mdi-currency-usd mdi-24px">
        </i>
      </div>
    </div>
    <div class="card-info">
      <div class="d-flex align-items-center">
        <h4 class="mb-0">UGX {{ ($term_one) }}</h4>

      </div>
      <small>Admission Fees For Term 1 {{$years}}</small>
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
      <small>Admission Fees For Term 2 {{$years}}</small>
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
      <div class="avatar-initial bg-label-warning rounded">
        <i class="mdi mdi-currency-usd mdi-24px">
        </i>
      </div>
    </div>
    <div class="card-info">
      <div class="d-flex align-items-center">
        <h4 class="mb-0">UGX {{ ($term_three) }}</h4>

      </div>
      <small>Admission Fees For Term 3 {{$years}}</small>
    </div>
  </div>
</div>
</div>
</div>

<!--/ Cards Admission Fees -->
      </div>
      </div>
      
<br/>




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


                  

                  <div class="row g-2">
                    <div class="col mb-4 mt-2">
                      <div class="form-floating form-floating-outline">
                        <input type="text" id="nameWithTitle" class="form-control" name="student_NIN" required >
                        <label for="nameWithTitle">Student NIN</label>
                      </div>
                    </div>



                    <div class="col mb-4 mt-2">
                      <div class="form-floating form-floating-outline">
                      <select id="studentclass" name="student_class" class="select2 form-select" data-allow-clear="true">
                <option value="">Select Class</option>
                <option value="SeniorOne">Senior One</option>
                <option value="SeniorTwo">Senior Two</option>
                <option value="SeniorThree">Senior Three</option>
                <option value="SeniorFour">Senior Four</option>
                <option value="SeniorFive">Senior Five</option>
                <option value="SeniorSix">Senior Six</option>
                <option value="PrimaryOne">Primary One</option>
                <option value="PrimaryTwo">Primary Two</option>
                <option value="PrimaryThree">Primary Three</option>
                <option value="PrimaryFour">Primary Four</option>
                <option value="PrimaryFive">Primary Five</option>
                <option value="PrimarySix">Primary Six</option>
                <option value="PrimarySeven">Primary Seven</option>
                <option value="TopClass">Top Class</option>
                <option value="MiddleClass">Middle Class</option>
                <option value="BabyClass">Baby Class</option>
                <option value="PrePrimary">Pre-Primary</option>
 
              </select>
              <label for="studentclass">Class</label>
                      </div>
                    </div>

                  </div>





                  <div class="row g-2">

                    <div class="col mb-4 mt-2">
                    <div class="form-floating form-floating-outline">
                    <select id="student_dayboarding" name="student_day_boarding" class="select2 form-select form-select-lg" data-allow-clear="true">
                    <option value="">Select Section</option>
                    <option value="DaySection">Day Section</option>
                    <option value="BoardingSection">Boarding Section</option>
                    </select>
                    <label for="student_dayboarding">Day or Boarding</label>
                    </div>
                    </div>


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




                  </div>


                  <div class="row g-2">

 
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
                    
                    <div class="col mb-4 mt-2">
                      <div class="form-floating form-floating-outline">
                        <input type="password" id="password" class="form-control" name="password" required">
                        <label for="password">Password</label> 
                      </div>
                    </div>

                  </div>


              <div class="row ">


              <div class="col mb-4 mt-2">
              <div class="form-floating form-floating-outline">
              <input type="text" id="admission_fees" class="form-control" maxlength="7" name="admission_fees" required">
              <label for="admission_fees">Enter Admission Fees</label> 
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
<button type="button" class="nav-link active py-2" role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-justified-term1" aria-controls="navs-pills-justified-term1" aria-selected="true"><i class="ti ti-user me-1"></i>Term 1 Admission Fees </button>
</li>

<li class="nav-item">
<button type="button" class="nav-link py-2" role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-justified-term2" aria-controls="navs-pills-justified-term2" aria-selected="false"><i class="tf-icons ti ti-currency-dollar me-1"></i> Term 2 Admission Fees</button>
</li>


<li class="nav-item">
<button type="button" class="nav-link py-2" role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-justified-term3" aria-controls="navs-pills-justified-term3" aria-selected="false"><i class="tf-icons ti ti-currency-dollar me-1"></i> Term 3 Admission Fees</button>
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
                                        <table id="file_export"
                                            class="table border table-striped table-bordered text-nowrap">
                                            <thead>
                                                <!-- start row -->
                                                <tr>
                                                <th>Students</th>
                                            <th>Class</th>
                                            <th>Section</th>
                                            <th>Fees</th>
                                            <th>Term</th>
                                            <th>Date</th>
                                            <th>Year</th>
                                            <th>Action</th>

                                                </tr>
                                                <!-- end row -->
                                            </thead>

                                            <tbody>
                                                
@foreach($admissions_term1 as $key => $value )
<tr>

<td>{{ $value['student']['name']}}</td>
<td>{{ $value->student_class}}</td>
<td>{{ $value->student_day_boarding}}</td>
<td>{{ $value->admission_fees}}</td>
<td> {{ $value['term']['name'] }}</td>	
<td>{{ $value->date}}</td>
<td>{{ $value->year}}</td>


<td>

<div class="action-btn">

<a href="{{route('edit.admission.fee',$value->id)}}" class="btn btn-sm btn-primary"  title="Edit Admission Fees">
<span class="mdi mdi-square-edit-outline"></span>
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


</div>    <!--/Term 1 Admission Fees Collections -->






<!--Term 2 Admission Fees Collections -->

<div class="tab-pane fade " id="navs-pills-justified-term2" role="tabpanel">


<div class="row">
                        <div class="col-12">
                            <!-- ---------------------
                                    start Zero Configuration
                          
                                ---------------- -->
                            <div class="card">
                                <div class="card-body">
     
                                    <div class="table-responsive">
                                        <table id="file_export2"
                                            class="table border table-striped table-bordered text-nowrap">
                                            <thead>
                                                <!-- start row -->
                                                <tr>
                                                <th>Students</th>
                                            <th>Class</th>
                                            <th>Section</th>
                                            <th>Fees</th>
                                            <th>Term</th>
                                            <th>Date</th>
                                            <th>Year</th>
                                            <th>Action</th>

                                                </tr>
                                                <!-- end row -->
                                            </thead>

                                            <tbody>
                                                
@foreach($admissions_term2 as $key => $value )
<tr>

<td>{{ $value['student']['name']}}</td>
<td>{{ $value->student_class}}</td>
<td>{{ $value->student_day_boarding}}</td>
<td>{{ $value->admission_fees}}</td>
<td> {{ $value['term']['name'] }}</td>	
<td>{{ $value->date}}</td>
<td>{{ $value->year}}</td>


<td>

<div class="action-btn">

<a href="{{route('edit.admission.fee',$value->id)}}" class="btn btn-sm btn-primary"  title="Edit Admission Fees">
<span class="mdi mdi-square-edit-outline"></span>
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


</div>    <!--/Term 2 Admission Fees Collections -->





<!--Term 3 Admission Fees Collections -->

<div class="tab-pane fade" id="navs-pills-justified-term3" role="tabpanel">


<div class="row">
                        <div class="col-12">
                            <!-- ---------------------
                                    start Zero Configuration
                          
                                ---------------- -->
                            <div class="card">
                                <div class="card-body">
     
                                    <div class="table-responsive">
                                        <table id="file_export3"
                                            class="table border table-striped table-bordered text-nowrap">
                                            <thead>
                                                <!-- start row -->
                                                <tr>
                                                <th>Students</th>
                                            <th>Class</th>
                                            <th>Section</th>
                                            <th>Fees</th>
                                            <th>Term</th>
                                            <th>Date</th>
                                            <th>Year</th>
                                                <th>Action</th>
                                                </tr>
                                                <!-- end row -->
                                            </thead>

                                            <tbody>
          
@foreach($admissions_term3 as $key => $value )
<tr>

<td>{{ $value['student']['name']}}</td>
<td>{{ $value->student_class}}</td>
<td>{{ $value->student_day_boarding}}</td>
<td>{{ $value->admission_fees}}</td>
<td> {{ $value['term']['name'] }}</td>	
<td>{{ $value->date}}</td>
<td>{{ $value->year}}</td>

<td>

<div class="action-btn">

<a href="{{route('edit.admission.fee',$value->id)}}" class="btn btn-sm btn-primary"  title="Edit Admission Fees">
<span class="mdi mdi-square-edit-outline"></span>
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


</div>    <!--/Term 3 Admission Fees Collections -->





</div>

</div>









            
                      </div>
                      <!--/ Content -->


@endsection
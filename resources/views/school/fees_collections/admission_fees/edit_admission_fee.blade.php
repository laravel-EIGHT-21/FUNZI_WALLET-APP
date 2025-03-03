
@extends('school.body.admin_master')
@section('content')




@section('title')

Update Admission Fees | funziwallet

@endsection

        
        <!-- Content -->
        
        <div class="container-xxl flex-grow-1 container-p-y">
            
            
            <h4 class="py-3 mb-4">
              <span class="text-muted fw-light">Student / Admission Fees /</span> Update 
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
                          <span>{{$editFees['student']['name']}}</span>
                        </li>


                        
                        <li class="mb-3">
                          <span class="fw-medium text-heading me-2">Parent/Guardian Tel 1 :</span>
                          <span>{{$editFees['student']['student_tel']}}</span>
                        </li>

                        <li class="mb-3">
                          <span class="fw-medium text-heading me-2">Parent/Guardian Tel 2 :</span>
                          <span>{{$editFees['student']['student_tel2']}}</span>
                        </li>


                        <li class="mb-3">
                          <span class="fw-medium text-heading me-2">Gender :</span>
                          <span>{{$editFees['student']['gender']}}</span>
                        </li>

                        <li class="mb-3">
                          <span class="fw-medium text-heading me-2">Student NIN :</span>
                          <span>{{$editFees['student']['student_NIN']}}</span>
                        </li>

                        <li class="mb-3">
                          <span class="fw-medium text-heading me-2">Class :</span>
                          <span>{{$editFees['student']['student_class']}}</span>
                        </li>


                        <li class="mb-3">
                          <span class="fw-medium text-heading me-2">Day/Boarding Section :</span>
                          <span>{{$editFees['student']['student_day_boarding']}}</span>
                        </li>


 
                        <li class="mb-3">
                          <span class="fw-medium text-heading me-2">Student Wallet ID:</span>
                          <span>{{$editFees['student']['student_code']}}</span>
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
                  <h5 class="card-header">Update Student`s Admission Fees Below</h5>
                  <div class="card-body">
                    <form action="{{ route('update.admission.fee',$editFees->id) }}" method="POST" >
                    @csrf

                    <div class="row ">

<div class="col mb-4 mt-2">
<div class="form-floating form-floating-outline">
<input type="text" id="admission_fees" class="form-control" maxlength="7" value="{{$editFees->admission_fees}}" name="admission_fees" required">
<label for="admission_fees">Enter Admission Fees</label> 
</div>
</div>

</div>




  <div class="row">
  <div class="col mb-4 mt-2">
                      <div class="form-floating form-floating-outline">
                      <select id="student_class" name="student_class" class="select2 form-select" data-allow-clear="true">
                <option value="" selected="" disabled="">Select Class</option>

                <option value="SeniorOne" {{ ($editFees->student_class == 'SeniorOne')? 'selected':'' }}>Senior One</option>
                <option value="SeniorTwo" {{ ($editFees->student_class == 'SeniorTwo')? 'selected':'' }}>Senior Two</option>
                <option value="SeniorThree" {{ ($editFees->student_class == 'SeniorThree')? 'selected':'' }}>Senior Three</option>
                <option value="SeniorFour" {{ ($editFees->student_class == 'SeniorFour')? 'selected':'' }}>Senior Four</option>
                <option value="SeniorFive" {{ ($editFees->student_class == 'SeniorFive')? 'selected':'' }}>Senior Five</option>
                <option value="SeniorSix" {{ ($editFees->student_class == 'SeniorSix')? 'selected':'' }}>Senior Six</option>
                <option value="PrimaryOne" {{ ($editFees->student_class == 'PrimaryOne')? 'selected':'' }}>Primary One</option>
                <option value="PrimaryTwo" {{ ($editFees->student_class == 'PrimaryTwo')? 'selected':'' }}>Primary Two</option>
                <option value="PrimaryThree" {{ ($editFees->student_class == 'PrimaryThree')? 'selected':'' }}>Primary Three</option>
                <option value="PrimaryFour" {{ ($editFees->student_class == 'PrimaryFour')? 'selected':'' }}>Primary Four</option>
                <option value="PrimaryFive" {{ ($editFees->student_class == 'PrimaryFive')? 'selected':'' }}>Primary Five</option>
                <option value="PrimarySix" {{ ($editFees->student_class == 'PrimarySix')? 'selected':'' }}>Primary Six</option>
                <option value="PrimarySeven" {{ ($editFees->student_class == 'PrimarySeven')? 'selected':'' }}>Primary Seven</option>
                <option value="TopClass" {{ ($editFees->student_class == 'TopClass')? 'selected':'' }}>Top Class</option>
                <option value="MiddleClass" {{ ($editFees->student_class == 'MiddleClass')? 'selected':'' }}>Middle Class</option>
                <option value="BabyClass" {{ ($editFees->student_class == 'BabyClass')? 'selected':'' }}>Baby Class</option>
                <option value="PrePrimary" {{ ($editFees->student_class == 'PrePrimary')? 'selected':'' }}>Pre-Primary</option>

              </select>
              <label for="student_class">Class</label>
                      </div>
                    </div>
            
                      </div>




                <div class="row">
                <div class="col mb-4 mt-2">
                <div class="form-floating form-floating-outline">
                <select id="student_dayboarding" name="student_day_boarding" class="select2 form-select" data-allow-clear="true">
                <option value="" selected="" disabled="">Select Section</option>
                <option value="DaySection" {{ ($editFees->student_day_boarding == 'DaySection')? 'selected':'' }}>Day Section</option>
                <option value="BoardingSection" {{ ($editFees->student_day_boarding == 'BoardingSection')? 'selected':'' }}>Boarding Section</option>

                </select>
                <label for="student_dayboarding">Day or Boarding</label>
                </div>
                </div>

                </div>



                <div class="row">
                <div class="col mb-4 mt-2">
                <div class="form-floating form-floating-outline">
                <select id="term_id" name="term_id" required class="select2 form-select form-select-lg" data-allow-clear="true"">
            <option value="">Select Term</option>
            @foreach ($terms as $term)
            <option value="{{ $term->id }}" {{ ($editFees->term_id == $term->id)? "selected": ""  }} >{{ $term->name }}</option>
            @endforeach

            </select>
            <label for="term_id">School Terms</label>
                </div>
                </div>

                </div>



                      <div class="row">
                      <div>
                          <button type="submit" class="btn btn-primary me-2">Update Student Admission Fee</button>
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
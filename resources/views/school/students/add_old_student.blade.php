
@extends('school.body.admin_master')
@section('content')



@section('title')

Deactivated Students | funziwallet

@endsection



        
        <!-- Content -->
        
        <div class="container-xxl flex-grow-1 container-p-y">
            
            
            <h4 class="py-3 mb-4">
              <span class="text-muted fw-light">Register  / Deactivated /</span> Student Information
            </h4>

            
            <div class="row">

<div class="mb-4">

<a href="{{ route('view.old.students')}}" class="btn rounded-pill btn-primary" style="float:right;"><i class='tf-icons mdi mdi-arrow-left mdi-20px'></i>Back</a>

</div>

</div>


            <div class="row">
            
              <!-- User Content -->
              <div class="col-xl-8 col-lg-7 col-md-7 order-0 order-md-1">

            
                <!-- Change Password -->
                <div class="card mb-4">
                  <h5 class="card-header">Register Student Information Below</h5>
                  <div class="card-body">
                    <form action="{{ route('old.students.store',$editData->id) }}" method="POST" >
                    @csrf

                      <div class="row">
                      <div class="col-md">


            
    <div class="col mb-4 mt-2">
            <div class="form-floating form-floating-outline">
            <input type="text" id="student" class="form-control" name="name" value="{{$editData->name}}" required">
            <label for="student">Student Name</label> 
            </div>
            </div> 

               
         <div class="col mb-4 mt-2">
            <div class="form-floating form-floating-outline">
            <input type="text" id="walletid" class="form-control" name="student_code" value="{{$editData->student_code}}" required">
            <label for="walletid">Student Wallet ID</label> 
            </div>
            </div> 

            
          <div class="col mb-4 mt-2">
            <div class="form-floating form-floating-outline">
            <input type="email" id="email" class="form-control" name="email" value="{{$editData->email}}" required">
            <label for="email">Email</label> 
            </div>
            </div> 


                  <div class="col mb-4 mt-2">
                  <div class="form-floating form-floating-outline">
                  <select id="student_class" name="student_class" id="student_class" class="select2 form-select" data-allow-clear="true">
                  <option value="" selected="" disabled="">Select Class</option>
                  <option value="SeniorOne" {{ ($editData->student_class == 'SeniorOne')? 'selected':'' }}>Senior One</option>
                  <option value="SeniorTwo" {{ ($editData->student_class == 'SeniorTwo')? 'selected':'' }}>Senior Two</option>
                  <option value="SeniorThree" {{ ($editData->student_class == 'SeniorThree')? 'selected':'' }}>Senior Three</option>
                  <option value="SeniorFour" {{ ($editData->student_class == 'SeniorFour')? 'selected':'' }}>Senior Four</option>
                  <option value="SeniorFive" {{ ($editData->student_class == 'SeniorFive')? 'selected':'' }}>Senior Five</option>
                  <option value="SeniorSix" {{ ($editData->student_class == 'SeniorSix')? 'selected':'' }}>Senior Six</option>
                  <option value="PrimaryOne" {{ ($editData->student_class == 'PrimaryOne')? 'selected':'' }}>Primary One</option>
                  <option value="PrimaryTwo" {{ ($editData->student_class == 'PrimaryTwo')? 'selected':'' }}>Primary Two</option>
                  <option value="PrimaryThree" {{ ($editData->student_class == 'PrimaryThree')? 'selected':'' }}>Primary Three</option>
                  <option value="PrimaryFour" {{ ($editData->student_class == 'PrimaryFour')? 'selected':'' }}>Primary Four</option>
                  <option value="PrimaryFive" {{ ($editData->student_class == 'PrimaryFive')? 'selected':'' }}>Primary Five</option>
                  <option value="PrimarySix" {{ ($editData->student_class == 'PrimarySix')? 'selected':'' }}>Primary Six</option>
                  <option value="PrimarySeven" {{ ($editData->student_class == 'PrimarySeven')? 'selected':'' }}>Primary Seven</option>
                  <option value="TopClass" {{ ($editData->student_class == 'TopClass')? 'selected':'' }}>Top Class</option>
                  <option value="MiddleClass" {{ ($editData->student_class == 'MiddleClass')? 'selected':'' }}>Middle Class</option>
                  <option value="BabyClass" {{ ($editData->student_class == 'BabyClass')? 'selected':'' }}>Baby Class</option>
                  <option value="PrePrimary" {{ ($editData->student_class == 'PrePrimary')? 'selected':'' }}>Pre-Primary</option>

                  </select>
                  <label for="student_class">Class</label>
                  </div>

                  </div>


                  <div class="col mb-4 mt-2">
                  <div class="form-floating form-floating-outline">
                  <select id="student_dayboarding" name="student_day_boarding" class="select2 form-select" data-allow-clear="true">
                  <option value="" selected="" disabled="">Select Section</option>
                  <option value="DaySection" {{ ($editData->student_day_boarding == 'DaySection')? 'selected':'' }}>Day Section</option>
                  <option value="BoardingSection" {{ ($editData->student_day_boarding == 'BoardingSection')? 'selected':'' }}>Boarding Section</option>
                  </select>
                  <label for="student_dayboarding">Day or Boarding</label>
                  </div>
                  </div>



              <div class="col mb-4 mt-2">
              <div class="form-floating form-floating-outline">
              <select id="term_id" name="term_id" required class="select2 form-select form-select-lg" data-allow-clear="true"">
              <option value="">Select Term</option>
              @foreach ($terms as $term)
              <option value="{{ $term->id }}" {{ ($editData->term_id == $term->id)? "selected": ""  }} >{{ $term->name }}</option>
              @endforeach

              </select>
              <label for="term_id">Choose Terms</label>
              </div>
              </div>



            <div class="col mb-4 mt-2">
            <div class="form-floating form-floating-outline">
            <input type="text" id="admission_fees" class="form-control" maxlength="7" name="admission_fees" required">
            <label for="admission_fees">Enter Admission Fees</label> 
            </div>
            </div>






  </div>
            
                      </div>

                      <div class="row">
                      <div>
                          <button type="submit" class="btn btn-primary me-2">Register Student Information</button>
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
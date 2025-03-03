
@extends('school.body.admin_master')
@section('content')

@section('title')
Submit Student`s  Offline Pay
@endsection



<!-- Content -->
        
<div class="container-xxl flex-grow-1 container-p-y">
            
            
            <h4 class="py-3 mb-4">
              <span class="text-muted fw-light">SchoolFees / Payment /</span> Submit Student`s  Offline Payment
            </h4>


<div class="row">


<div class="mb-0">

<a href="{{ route('view.fees.collections')}}" target="_blank" class="btn rounded-pill btn-success" style="float:center;"><i class='tf-icons mdi mdi-currency-usd mdi-20px'></i>Fees Details</a>

</div>


</div>
            
<div class="row">

<div class="mb-4">

<a href="{{ route('make.offline.payments')}}" class="btn rounded-pill btn-primary" style="float:right;"><i class='tf-icons mdi mdi-arrow-left mdi-20px'></i>Back</a>

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
                          <span class="fw-medium text-heading me-2">School Term :</span>
                          <span>{{$makePay['term']['name']}}</span>
                        </li>

                      <li class="mb-3">
                          <span class="fw-medium text-heading me-2">Name :</span>
                          <span>{{$makePay->name}}</span>
                        </li>

                        
                        <li class="mb-3">
                          <span class="fw-medium text-heading me-2">Parent/Guardian Tel 1 :</span>
                          <span>{{$makePay->student_tel}}</span>
                        </li>

                        <li class="mb-3">
                          <span class="fw-medium text-heading me-2">Parent/Guardian Tel 2 :</span>
                          <span>{{$makePay->student_tel2}}</span>
                        </li>


                        <li class="mb-3">
                          <span class="fw-medium text-heading me-2">Gender :</span>
                          <span>{{$makePay->gender}}</span>
                        </li>



                        <li class="mb-3">
                          <span class="fw-medium text-heading me-2">Class :</span>
                          <span>{{$makePay->student_class}}</span>
                        </li>


                        <li class="mb-3">
                          <span class="fw-medium text-heading me-2">Day/Boarding Section :</span>
                          <span>{{$makePay->student_day_boarding}}</span>
                        </li>


                        <li class="mb-3">
                          <span class="fw-medium text-heading me-2">Status :</span>

                          
@if($makePay->status == 1)
<span class="badge bg-label-success rounded-pill">Active</span>
@elseif($makePay->status == 0 )
<span class="badge bg-label-danger rounded-pill">Deactive</span>
@endif


                          
                        </li>


                        <li class="mb-3">
                          <span class="fw-medium text-heading me-2">Student Wallet ID:</span>
                          <span>{{$makePay->student_code}}</span>
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


                  <div class="card mb-4">
                  <h5 class="card-header">Submit Offline Payment Information Below</h5>
                  <div class="card-body">
                  <form action="{{ route('student.submit.offline.schoolfees.payment',$makePay->student_code) }}" method="POST" >
                  @csrf

                  <input type="hidden" name="student_code" value="{{ $makePay->student_code }}" />



                  <div class="row">

                  <div class="col mb-4 mt-2">
                  <div class="form-floating form-floating-outline">
                  <input class="form-control" type="text" name="amount" id="cash" required />
                  <label for="cash">Enter Payment</label>
                  </div>

                  </div>
                  </div>



                  <div class="row">

                  <div class="col mb-4 mt-2">
                  <div class="form-floating form-floating-outline">
                  <input class="form-control" type="text" name="year" required  id="html5-text-input" />
                  <label for="html5-text-input">For Year</label>
                  </div>

                  </div>
                  </div>



                  <div class="row">

                  <div class="col mb-4 mt-2">
                  <div class="form-floating form-floating-outline">
                  <select id="payment_type" name="payment_type" class="select2 form-select" data-allow-clear="true">
                  <option value="">Select Type</option>
                  <option value="Cash">Cash</option>
                  <option value="BankSlip">Bank Slip</option>
                  </select>
                  <label for="payment_type">Payment Type</label>
                  </div>

                  </div>
                  </div>


                  <div class="row">

                  <div class="col mb-4 mt-2">
                  <div class="form-floating form-floating-outline">
                  <input class="form-control" type="text" name="notes" id="html5-text-input" />
                  <label for="html5-text-input">Notes</label>
                  </div>

                  </div>
                  </div>




                  <div class="row">
                  <div>
                  <button type="submit" class="btn btn-primary me-2">Submit Offline Payment</button>
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
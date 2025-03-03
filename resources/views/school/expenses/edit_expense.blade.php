 
@extends('school.body.admin_master')
@section('content')

@section('title')
Update Expense Payment
@endsection



<!-- Content -->
        
<div class="container-xxl flex-grow-1 container-p-y">
            
            
            <h4 class="py-3 mb-4">
              <span class="text-muted fw-light">Expense fees /</span> Update Expense Payment Information
            </h4>

            
<div class="row">

<div class="mb-4">

<a href="{{ route('view.expenses')}}" class="btn rounded-pill btn-primary" style="float:right;"><i class='tf-icons mdi mdi-arrow-left mdi-20px'></i>Back</a>

</div>

</div>

            <div class="row">
              <!-- User Sidebar -->
              <div class="col-xl-4 col-lg-5 col-md-5 order-1 order-md-0">
                <!-- User Card -->
                <div class="card mb-4">
                  <div class="card-body">


                    <h5 class="pb-3 border-bottom mb-3">Expense Details</h5>
                    <div class="info-container">
                      <ul class="list-unstyled mb-4">

                      <li class="mb-3">
                          <span class="fw-medium text-heading me-2">Term :</span>
                          <span>{{$edit_expense['term']['name']}}</span>
                        </li>

                      <li class="mb-3">
                          <span class="fw-medium text-heading me-2">Expense :</span>
                          <span>{{$edit_expense['category']['name']}}</span>
                        </li>

                        
                        <li class="mb-3">
                          <span class="fw-medium text-heading me-2">School :</span>
                          <span>{{$edit_expense['school']['name']}}</span>
                        </li>

                      

                      </ul>

                    </div>
                  </div>
                </div>
                <!-- /User Card -->

              </div>
              <!--/ User Sidebar -->
            
            
              <!-- User Content -->
              <div class="col-xl-8 col-lg-7 col-md-7 order-0 order-md-1">


                  <div class="card mb-4">
                  <h5 class="card-header">Update Expense Payment Information Below</h5>
                  <div class="card-body">
                  <form action="{{ route('expense.fees.update',$edit_expense->id) }}" method="POST" >
                  @csrf

                  <input type="hidden" name="id" value="{{ $edit_expense->id }}" />



                    <div class="row">

                    <div class="col mb-4 mt-2">
                    <div class="form-floating form-floating-outline">
                    <input class="form-control" type="text" name="invoice_amount" value="{{$edit_expense->invoice_amount}}" id="cash" required />
                    <label for="cash">Invoice Amount</label>
                    </div>

                    </div>
                    </div>


                  <div class="row">

                  <div class="col mb-4 mt-2">
                  <div class="form-floating form-floating-outline">
                  <input class="form-control" type="text" name="amount" value="{{$edit_expense->amount}}" id="cash" required />
                  <label for="cash">Expense Payment Amount</label>
                  </div>

                  </div>
                  </div>



                  <div class="row">

                  <div class="col mb-4 mt-2">
                  <div class="form-floating form-floating-outline">
                  <input class="form-control" type="date" name="date" required value="{{$edit_expense->date}}" id="html5-text-input" />
                  <label for="html5-text-input">date</label>
                  </div>

                  </div>
                  </div>


                  <div class="row">

                  <div class="col mb-4 mt-2">
                  <div class="form-floating form-floating-outline">
                  <input class="form-control" type="text" name="year" required value="{{$edit_expense->year}}" id="html5-text-input" />
                  <label for="html5-text-input">For Year</label>
                  </div>

                  </div>
                  </div>


                  <div class="row">

<div class="col mb-4 mt-2">
<div class="form-floating form-floating-outline mb-4">
<select id="category_id" name="category_id" required class="select2 form-select form-select-lg" data-allow-clear="true"">
<option value="">Select Category</option>
@foreach ($categories as $cate)
<option value="{{ $cate->id }}" {{ ($edit_expense->category_id == $cate->id)? "selected": ""  }} >{{ $cate->name }}</option>
@endforeach

</select>
<label for="category_id">Expense Category</label>
</div>
</div>
</div>


                  
                  <div class="row">

                  <div class="col mb-4 mt-2">
                  <div class="form-floating form-floating-outline mb-4">
            <select id="term_id" name="term_id" required class="select2 form-select form-select-lg" data-allow-clear="true"">
            <option value="">Select Term</option>
            @foreach ($terms as $term)
            <option value="{{ $term->id }}" {{ ($edit_expense->term_id == $term->id)? "selected": ""  }} >{{ $term->name }}</option>
            @endforeach

            </select>
            <label for="term_id">School Terms</label>
            </div>
            </div>
                  </div>


                  @foreach($expense_track as $update)
                  <div class="row">

                  <div class="col mb-4 mt-2">
                  <div class="form-floating form-floating-outline">
                  <select id="payment_type" name="payment_type" class="select2 form-select" data-allow-clear="true">
                  <option value="">Select Type</option>

                  <option value="Cash" {{ ($update->payment_type == 'Cash')? 'selected':'' }}>Cash</option>
                <option value="MobileMoney" {{ ($update->payment_type == 'MobileMoney')? 'selected':'' }}>Bank Slip</option>

                  </select>
                  <label for="payment_type">Payment Type</label>
                  </div>

                  </div>
                  </div>


                  <div class="row">

                  <div class="col mb-4 mt-2">
                  <div class="form-floating form-floating-outline">
                  <input class="form-control" type="text" name="notes" value="{{$update->notes}}" id="html5-text-input" />
                  <label for="html5-text-input">Notes</label>
                  </div>

                  </div>
                  </div>

@endforeach


                  <div class="row">
                  <div>
                  <button type="submit" class="btn btn-primary me-2">Update Payment</button>
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
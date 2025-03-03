
@extends('school.body.admin_master')
@section('content')

@section('title')
 Make Offline Payments
@endsection




   <!-- Content -->
        
   <div class="container-xxl flex-grow-1 container-p-y">

<h4 class="py-3 mb-4">
      <span class="text-muted fw-light"><a href="{{route('dashboard')}}">Home</a>/</span>  Make Offline Payments
    </h4>


<br/>


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
                                        <th>Students</th>
                                    <th>Wallet ID</th>
                                    <th>Class</th>
                                    <th>Day/Boarding</th>
                                    <th>Gender</th>
                                    <th>Actions</th>
                                        </tr>
                                        <!-- end row -->
                                    </thead>

                                    <tbody>
@foreach($students as $key => $value )
<tr>

<td>{{ $value->name}}</td>
<td>{{ $value->student_code}}</td>
<td>{{ $value->student_class}}</td>
<td>{{ $value->student_day_boarding}}</td>
<td> {{ $value->gender }}</td>	

<td>

<div class="action-btn">


<a href="{{route('student.make.offline.schoolfees.payment',$value->id)}}" title="Offline Payment" class="btn btn-sm btn-success">
<i class="mdi mdi-currency-usd me-1"></i>
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





    
              </div>
              <!--/ Content -->







@endsection
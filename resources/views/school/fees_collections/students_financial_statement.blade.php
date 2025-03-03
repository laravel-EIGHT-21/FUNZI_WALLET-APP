
@extends('school.body.admin_master')
@section('content')
        

@section('title')

Students Financial Statements  | funziwallet
@endsection





        <!-- Content -->
        
        <div class="container-xxl flex-grow-1 container-p-y">

        <h4 class="py-3 mb-4">
              <span class="text-muted fw-light"><a href="{{route('dashboard')}}">Home</a> /Generate /</span> Students Financial Statements
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
                                            <th>WalletID</th>
                                            <th>Class</th>
                                            <th>Section</th>
                                            <th>Term</th>
                                           <th>Payments </th>
                                           <th>Year </th>
                                            <th>Actions</th>
                                                </tr>
                                                <!-- end row -->
                                            </thead>

                                            <tbody>
@foreach($allData as $key => $value )
<tr>

<td>{{ $value['student']['name']}}</td>
<td>{{ $value->student_acct_no}}</td>

<td>{{ $value->student_class}}</td>


<td>{{ $value->student_day_boarding}}</td>
<td>{{ $value['term']['name']}}</td>

<td>


<span class="badge rounded-pill text-primary bg-dark-info p-2 text-uppercase px-3"><b><i class='align-middle me-1'></i>ugx {{ $value->amount }}</b></span>


</td>


<td>{{ $value->year}}</td>



<td>


<div class="action-btn">
<a href="{{route('generate.student.financial.statement',$value->id)}}"  class="btn btn-sm btn-success"  title="Get Financial Statement">
<span class="mdi mdi-notebook-outline me-1"></span>
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
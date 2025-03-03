  
@extends('school.body.admin_master')
@section('content')
        

@section('title')

SchoolFees Amounts | funziwallet

@endsection

        <!-- Content -->
        
        <div class="container-xxl flex-grow-1 container-p-y">

        <h4 class="py-3 mb-4">
              <span class="text-muted fw-light">View /</span> SchoolFees Amounts Information
            </h4>


<div class="row">

<div class="mb-2">
<a href="{{route('fee.amount.add')}}" class="btn rounded-pill btn-label-primary" style="float:right;"><i class='tf-icons mdi mdi-plus mdi-20px'></i>Add SchoolFees Amounts</a>
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
                                            <th scope="col">School</th>
                                            <th scope="col">Day/Boarding Section</th>
                                            <th scope="col">Year</th>
                                            <th scope="col">Actions</th>


                                                </tr>
                                                <!-- end row --> 
                                            </thead>

<tbody>
@foreach($allData as $key => $value )
<tr>

<td>

<div class="d-flex align-items-center">
<div class="ms-3">
<h6 class="fw-semibold mb-0">{{ $value['school']['name']}}</h6>

</div>
</div>

</td>


<td>

<div class="d-flex align-items-center">
<div class="ms-3">
<h6 class="fw-semibold mb-0">{{ $value->student_day_boarding}}</h6>

</div>
</div>

</td>

<td>

<div class="d-flex align-items-center">
<div class="ms-3">
<h6 class="fw-semibold mb-0">{{ $value->year}}</h6>

</div>
</div>

</td>

<td>



<div class="action-btn d-flex align-items-center">
<a href="{{route('fee.amount.edit',$value->rand_no)}}"   title="Edit Fees Amount" class="btn btn-primary">
<span class="mdi mdi-square-edit-outline "></span>
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
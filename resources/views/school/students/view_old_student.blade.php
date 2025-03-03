
@extends('school.body.admin_master')
@section('content')
        


@section('title')

Deactivated Students | funziwallet

@endsection





        <!-- Content -->
        
        <div class="container-xxl flex-grow-1 container-p-y">

        <h4 class="py-3 mb-4">
              <span class="text-muted fw-light"><a href="{{route('dashboard')}}">Home</a> /View /</span> Deactivated Students Wallets
            </h4>





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
                                            <th>Recent School</th>
                                            <th>Wallet ID</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                                </tr>
                                                <!-- end row -->
                                            </thead>

<tbody>
@foreach($allData as $key => $value )
<tr>

<td>{{ $value->name}}</td>


@php 


$school = App\Models\User::where('school_id_no',$value->student_school_code)->where('user_type',1)->get();



@endphp


<td> 
@foreach($school as $sch)

	{{ ($sch->name)}}

@endforeach


</td>


<td>{{ $value->student_code}}</td>
<td class="pe-0">

@if($value->status == 1)
<span class="badge rounded-pill bg-label-success">Active</span>
@elseif($value->status == 0 )
<span class="badge rounded-pill bg-label-danger">Inactive</span>
@endif

</td>

<td>

<div class="action-btn">
<a href="{{route('add.old.students',$value->id)}}" class="btn btn-sm btn-info"   title="Edit Student ">
<i class="mdi mdi-square-edit-outline mdi-20px"></i>
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
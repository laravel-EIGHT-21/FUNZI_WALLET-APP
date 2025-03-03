
@extends('admin.body.admin_master')
@section('content')
        




@section('title')

View All Students | funziwallet

@endsection





        <!-- Content -->
        
        <div class="container-xxl flex-grow-1 container-p-y">

        <h4 class="py-3 mb-4">
              <span class="text-muted fw-light"><a href="{{route('admin.dashboard')}}">Users</a>/View /</span> Students Accounts
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
                                            <th>School</th>
                                            <th>Status</th>
                          
                                                </tr>
                                                <!-- end row -->
                                            </thead>

<tbody>
@foreach($allData as $key => $value )
<tr>

<td>{{ $value->name}}</td>


@php 

$school = App\Models\User::where('id',$value->school_id)->get();

@endphp


<td> 
@foreach($school as $sch)

	{{ ($sch->name)}}

@endforeach


</td>


<td class="pe-0">

@if($value->status == 1)
<span class="badge rounded-pill bg-label-success">Active</span>
@elseif($value->status == 0 )
<span class="badge rounded-pill bg-label-danger">Inactive</span>
@endif

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
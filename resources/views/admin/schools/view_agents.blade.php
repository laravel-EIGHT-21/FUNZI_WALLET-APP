
@extends('admin.body.admin_master')
@section('content')
        



@section('title')

View School Agents | funziwallet

@endsection






        <!-- Content -->
        
        <div class="container-xxl flex-grow-1 container-p-y">

        <h4 class="py-3 mb-4">
              <span class="text-muted fw-light"><a href="{{route('dashboard')}}">User</a>/View /</span> School Agents
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
                                            <th>School Agent</th>
                                            <th>Telephone</th>
                                            <th>School</th>
                                            <th>Status</th>
                          
                                                </tr>
                                                <!-- end row -->
                                            </thead>

<tbody>
@foreach($agents as $key => $value )
<tr>

<td>{{ $value->name}}</td>
<td>{{ $value->agent_tel}}</td>

@php 


$school = App\Models\User::where('school_id_no',$value->agent_school_code)->where('user_type',1)->get();



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
<span class="badge rounded-pill bg-label-danger">Deactived</span>
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
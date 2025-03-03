
@extends('school.body.admin_master')
@section('content')
        


@section('title')

View Agents | funziwallet

@endsection



 
        <!-- Content -->
        
        <div class="container-xxl flex-grow-1 container-p-y">

        <h4 class="py-3 mb-4">
              <span class="text-muted fw-light"><a href="{{route('dashboard')}}">Home</a> /View/</span>  All School Agents
            </h4>

            <div class="row">

            <div class="mb-2">
                                <button type="button" class="btn rounded-pill btn-label-primary" style="float:right;" data-bs-toggle="modal" data-bs-target="#addUser"><i class='ti ti-plus ti-sm'></i>Register New Agent</button>
                                    </div>

            </div>

          <!-- Modal -->
          <div class="modal fade" id="addUser" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title" id="modalCenterTitle">Enter New Agent Information</h4>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form  method="post" action="{{ route('school.agent.store') }}"  class="row g-3 needs-validation" novalidate>
                                @csrf
                <div class="modal-body">
                  <div class="row g-2">
                    <div class="col mb-4 mt-2">
                      <div class="form-floating form-floating-outline">
                        <input type="text" id="nameWithTitle" class="form-control" name="name" required placeholder="Enter Name">
                        <label for="nameWithTitle">Name</label>
                      </div>
                    </div>

                    <div class="col mb-4 mt-2">
                      <div class="form-floating form-floating-outline">
                        <input type="email" id="emailWithTitle" class="form-control" name="email" required placeholder="xxxx@xxx.xx">
                        <label for="emailWithTitle">Email</label>
                      </div>
                    </div>

                  </div>





                  <div class="row g-2">
                  <div class="col mb-4 mt-2">
                      <div class="form-floating form-floating-outline">
                        <input type="text" id="telWithTitle" class="form-control" name="agent_tel" required placeholder="0700000000">
                        <label for="telWithTitle">Telephone</label>
                      </div>
                    </div>


                  <div class="col mb-6 mt-2">
                      <div class="form-floating form-floating-outline">
                        <input type="password" id="password" class="form-control" name="password" required>
                        <label for="password">Password</label>
                      </div>
                    </div>


                  </div>


                </div>
                <div class="modal-footer">
                <button type="submit" class="btn btn-primary me-sm-3 me-1 data-submit">Submit</button>
                      <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                </div>
                </form>
              </div>
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
                                            <th>School Agent</th>
                                            <th>Telephone</th>
                                            <th>School</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                                </tr>
                                                <!-- end row -->
                                            </thead>

                                            <tbody>
@foreach($allData as $key => $value )
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
<span class="badge rounded-pill bg-label-danger">Inactive</span>
@endif

</td>

<td>

<div class="action-btn">
<a href="javascript:void(0);" class="btn btn-sm btn-primary"  title="Edit Agent Details" data-bs-toggle="modal" data-bs-target="#editAgent" id="{{ $value->id }}" onclick="agentView(this.id)">
<span class="mdi mdi-square-edit-outline "></span>
</a>

&nbsp;&nbsp;

@if($value->status == 1)
<a href="{{route('school.agent.inactive',$value->id)}}" class="btn btn-sm btn-danger" id="deactivate" title="Deactivate">
<span class="mdi mdi-arrow-down-bold-box "></span></a>
@else
<a href="{{route('school.agent.active',$value->id)}}" class="btn btn-sm btn-success" id="activate" title="Activate">
<span class="mdi mdi-arrow-up-bold-box "></span></a>
@endif

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


                              <!-- Modal -->
          <div class="modal fade" id="addUser" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title" id="modalCenterTitle">Enter New Agent Information</h4>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form  method="post" action="{{ route('school.agent.store') }}"  class="row g-3 needs-validation" novalidate>
                                @csrf
                <div class="modal-body">
                  <div class="row g-2">
                    <div class="col mb-4 mt-2">
                      <div class="form-floating form-floating-outline">
                        <input type="text" id="nameWithTitle" class="form-control" name="name" required placeholder="Enter Name">
                        <label for="nameWithTitle">Name</label>
                      </div>
                    </div>

                    <div class="col mb-4 mt-2">
                      <div class="form-floating form-floating-outline">
                        <input type="email" id="emailWithTitle" class="form-control" name="email" required placeholder="xxxx@xxx.xx">
                        <label for="emailWithTitle">Email</label>
                      </div>
                    </div>

                  </div>





                  <div class="row g-2">
                  <div class="col mb-4 mt-2">
                      <div class="form-floating form-floating-outline">
                        <input type="text" id="telWithTitle" class="form-control" name="agent_tel" required placeholder="0700000000">
                        <label for="telWithTitle">Telephone</label>
                      </div>
                    </div>


                  <div class="col mb-6 mt-2">
                      <div class="form-floating form-floating-outline">
                        <input type="password" id="password" class="form-control" name="password" required>
                        <label for="password">Password</label>
                      </div>
                    </div>


                  </div>


                </div>
                <div class="modal-footer">
                <button type="submit" class="btn btn-primary me-sm-3 me-1 data-submit">Submit</button>
                      <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                </div>
                </form>
              </div>
            </div>
          </div>          <!-- Modal -->
          <div class="modal fade" id="editAgent" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title" id="modalCenterTitle">Update Agent Information</h4>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form action="{{ url('/school/agent-update')}}"  method="post">
                @csrf

                <input type="hidden" name="id" id="id">

                <div class="modal-body">
                  <div class="row g-2">
                    <div class="col mb-4 mt-2">
                      <div class="form-floating form-floating-outline">
                        <input type="text" id="name" class="form-control" name="name">
                        <label for="nameWithTitle">Name</label>
                      </div>
                    </div>

                    <div class="col mb-4 mt-2">
                      <div class="form-floating form-floating-outline">
                        <input type="text" id="agent_tel" class="form-control" name="agent_tel" >
                        <label for="telWithTitle">Telephone</label>
                      </div>
                    </div>

                  </div>



                </div>
                <div class="modal-footer">
                <button type="submit" class="btn btn-primary me-sm-3 me-1 data-submit">Update</button>
                      <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                </div>
                </form>
              </div>
            </div>
          </div>

            
            
                      </div>
                      <!--/ Content -->


                      

    <script type="text/javascript">


$.ajaxSetup({
headers:{
'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
}
})


function agentView(id){

$.ajax({
type: 'GET',
url: '/school/agent/edit/'+id,
dataType: 'json',
success:function(data){

$('#name').val(data.agent.name);
$('#agent_tel').val(data.agent.agent_tel);
$('#id').val(id);

}
})

}

</script>



@endsection
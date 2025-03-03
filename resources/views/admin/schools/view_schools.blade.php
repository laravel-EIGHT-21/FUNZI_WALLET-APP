
@extends('admin.body.admin_master')
@section('content')
        



@section('title')

View Schools | funziwallet 

@endsection




        <!-- Content -->
        
        <div class="container-xxl flex-grow-1 container-p-y">

        <h4 class="py-3 mb-4">
              <span class="text-muted fw-light"><a href="{{route('admin.dashboard')}}">Users</a>/View /</span> Schools 
            </h4>

            @can('create-school')
        <div class="row">

        <div class="mb-2">
        <button type="button" class="btn rounded-pill btn-label-primary" style="float:right;" data-bs-toggle="modal" data-bs-target="#addUser"><i class='tf-icons mdi mdi-plus mdi-20px'></i>Add School</button>
        </div>

        </div>
        @endcan



          <!-- Modal -->
          <div class="modal fade" id="addUser" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title" id="modalCenterTitle">Enter School Information</h4>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form  method="post" action="{{ route('schools.store') }}"  class="row g-3 needs-validation" novalidate>
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
                        <input type="text" id="phoneWithTitle" class="form-control" name="school_tel1" maxlength="10" minlength="10" required placeholder="0700000000">
                        <label for="phoneWithTitle">Telephone 1</label>
                      </div>
                    </div>



                    <div class="col mb-4 mt-2">
                      <div class="form-floating form-floating-outline">
                        <input type="text" id="phoneWithTitle" class="form-control" name="school_tel2" maxlength="10" minlength="10" required placeholder="0700000000">
                        <label for="phoneWithTitle">Telephone 2</label>
                      </div>
                    </div>



                  </div>

                  <div class="row g-2">

                  <div class="col mb-4 mt-2">
                      <div class="form-floating form-floating-outline">
                        <input type="text" id="addressWithTitle" class="form-control" name="address" required >
                        <label for="addressWithTitle">School Address</label>
                      </div>
                    </div>

                    <div class="col mb-4 mt-2">
                      <div class="form-floating form-floating-outline">
                      <select id="schooltype" name="school_type" class="select2 form-select" data-allow-clear="true">
                <option value="">Select Type</option>
                <option value="Primary">Primary</option>
                <option value="Secondary">Secondary</option>
                <option value="Nursery&Primary">Nursery & Primary</option>
                <option value="Tertiary">Tertiary</option>
              </select>
              <label for="schooltype">School Type</label>
                      </div>
                    </div>

                  </div>


                  <div class="row">


<div class="col mb-4 ">
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
                                            <th>Schools</th>
                                            <th>Email</th>
                                            <th>School ID</th>
                                            <th>Type</th>

                                            <th>Active Walllets</th> 
                                            <th>Status</th>
                                            <th>Actions</th>
                                                </tr>
                                                <!-- end row -->
                                            </thead>

<tbody>
@foreach($allData as $key => $value )
<tr>

<td>{{ $value->name}}</td>
<td>{{ $value->email}}</td>
<td>{{ $value->school_id_no}}</td>
<td>{{ $value->school_type}}</td>
@php 


$students= App\Models\Students::where('status',1)->where('school_id',$value->id)->get();


@endphp

<td class="pe-0">{{ count($students) }}</td>


<td class="pe-0">

@if($value->status == 1)
<span class="badge rounded-pill bg-label-success">Active</span>
@elseif($value->status == 0 )
<span class="badge rounded-pill bg-label-danger">Deactived</span>
@endif

</td>




<td>

@can('edit-school')
<div class="action-btn">
<a href="{{route('edit.school',$value->id)}}"   title="Edit School Details" class="btn btn-sm btn-primary">
<span class="mdi mdi-square-edit-outline "></span>
</a>

&nbsp;

@if($value->status == 1)
<a href="{{route('school.inactive',$value->id)}}" class="btn btn-sm btn-danger" id="deactivate" title="Deactivate " >
<span class="mdi mdi-arrow-down-bold-box "></span></a>
@else
<a href="{{route('school.active',$value->id)}}" class="btn btn-sm btn-success" id="activate" title="Activate ">
<span class="mdi mdi-arrow-up-bold-box"></span></a>
@endif

</div>
@endcan



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
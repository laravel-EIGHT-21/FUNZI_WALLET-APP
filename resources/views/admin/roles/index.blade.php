
@extends('admin.body.admin_master')
@section('content')


@section('title')
Admin User Roles | funziwallet

@endsection
        
        <!-- Content -->
        
        <div class="container-xxl flex-grow-1 container-p-y">
            
            
            <h4 class="mb-1">Roles List</h4>
            <p class="mb-4">A role provided access to predefined menus and features so that depending on assigned role an administrator can have access to what user needs.</p>
            <!-- Role cards -->
            <div class="row g-4">


            @foreach($roles as $key => $value )
 


              <div class="col-xl-4 col-lg-6 col-md-6">
                <div class="card">
                  <div class="card-body">

                    <div class="d-flex justify-content-between align-items-end">
                      <div class="role-heading">
                        <h4 class="mb-1 text-body">{{$value->name}}</h4>
                        @can('role-edit')
                        <a href="{{route('role.edit',$value->id)}}" title="Edit Role"><span class="mdi mdi-square-edit-outline bg-label-primary"></span></a>
                        &nbsp;
                        <a href="{{route('role.show',$value->id)}}" title="Role Details"><span class="mdi mdi-notebook bg-label-success"></span></a>

                        &nbsp;
                        <a href="{{route('role.delete',$value->id)}}" id="delete" title="Delete Role"><span class="mdi mdi-delete-empty bg-label-danger"></span></a>
                    @endcan
                      </div>
                     
                    </div>
                  </div>
                </div>
              </div>

              @endforeach





              <div class="col-xl-4 col-lg-6 col-md-6">
                <div class="card h-100">
                  <div class="row h-100">

                    <div class="col-7">
                    @can('role-create')
                      <div class="card-body text-sm-end text-center ps-sm-0">

                        <button data-bs-target="#addRoleModal" data-bs-toggle="modal" class="btn btn-primary mb-3 text-nowrap add-new-role">Add Role</button>

                        <p class="mb-0">Add role, if it does not exist</p>
                      </div>
                      @endcan
                    </div>
                  </div>
                </div>
              </div>
            
            </div>
            <!--/ Role cards -->
            
            <!-- Add Role Modal -->
            <!-- Add Role Modal -->
            
            <div class="modal fade" id="addRoleModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered modal-add-new-role">
    <div class="modal-content p-3 p-md-5">
      <button type="button" class="btn-close btn-pinned" data-bs-dismiss="modal" aria-label="Close"></button>
      <div class="modal-body p-md-0">
        <div class="text-center mb-4">
          <h3 class="role-title mb-2 pb-0">Add New Role</h3>
          <p>Set role permissions</p>
        </div>
        <!-- Add role form -->
        <form  method="post" action="{{ route('roles.store') }}"  class="row g-3 needs-validation" novalidate>
          @csrf
          <div class="col-12 mb-4">
            <div class="form-floating form-floating-outline">
              <input type="text" id="modalRoleName" class="form-control" name="name" required placeholder="Enter Role Name">
              <label for="modalRoleName">Role Name</label>
            </div>
          </div>
          <div class="col-12">
            <h5>Assign Role Permissions</h5>
            <!-- Permission table -->
            <div class="table-responsive">
              <table class="table table-flush-spacing">
                @foreach($permissions as $permission)
                <tbody>

                  <tr>
                    <td class="text-nowrap fw-medium">{{ $permission->name }}</td>
                    <td class="text-nowrap fw-medium">{{ $permission->guard_name }}</td>
                    <td>
                      <div class="d-flex">
                        <div class="form-check me-3 me-lg-5">
                          <input class="form-check-input permission" type="checkbox" name="permission[{{ $permission->name }}]" value="{{ $permission->name }}" />
                          
                        </div>
                       
                      </div>
                    </td>
                  </tr>


                </tbody>

                @endforeach
              </table>
            </div>
            <!-- Permission table -->
          </div>
          <div class="col-12 text-center">
            <button type="submit" class="btn btn-primary me-sm-3 me-1">Submit</button>
            <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal" aria-label="Close">Cancel</button>
          </div>
        </form>
        <!--/ Add role form -->
      </div>
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

            <!--/ Add Role Modal -->
            
            <!-- / Add Role Modal -->
            
                      </div>
                      <!--/ Content -->
            


@endsection
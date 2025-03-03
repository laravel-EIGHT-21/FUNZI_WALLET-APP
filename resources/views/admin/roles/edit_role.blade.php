
@extends('admin.body.admin_master')
@section('content')


@section('title')
Update User Roles | funziwallet

@endsection
        


        
        <!-- Content -->
        
        <div class="container-xxl flex-grow-1 container-p-y">
            
            
            <h4 class="py-3 mb-4">
              <span class="text-muted fw-light">User Role / Information /</span> Update 
            </h4>
            <div class="row">

              
            <div class="row">

<div class="mb-4">

<a href="{{ route('role.index')}}" class="btn rounded-pill btn-primary" style="float:right;"><i class='tf-icons mdi mdi-arrow-left mdi-20px'></i>Back</a>

</div>
 
</div>

            
            
              <!-- User Content -->
              <div class="col-xl-8 col-lg-7 col-md-7 order-0 order-md-1">

            
                <!-- Change Password -->
                <div class="card mb-4">
                  <h5 class="card-header">Update User Role Information Below</h5>
                  <div class="card-body">
                    <form action="{{ route('role.update',$role->id) }}" method="POST" >
                    @csrf

                      <div class="row">
                        <div class="mb-3 col-12 col-sm-12 form-password-toggle">
                          <div class="input-group input-group-merge">
                            <div class="form-floating form-floating-outline">
                              <input class="form-control" type="text" id="user_name" name="name" value="{{$role->name}}" required />
                              <label for="user_name">Role</label>
                            </div>

                          </div>
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
                          <input type="checkbox" name="permission[{{ $permission->name }}]" value="{{ $permission->name }}" class='permission'{{ in_array($permission->name, $rolePermissions) ? 'checked' : '' }}/>
                          
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

          <br />

<hr />

<br />

@can('role-edit')
          <div class="row">

          <div>
          <button type="submit" class="btn btn-primary me-2">Update Role </button>
          </div>

          </div>
          @endcan 

                      

                    </form>
                  </div>
                </div>

            

            

              </div>
              <!--/ User Content -->
            </div>
            

            
                      </div>
                      <!--/ Content -->
            
                                                        

@endsection 

@extends('admin.body.admin_master')
@section('content')


@section('title')
Show User Role | funziwallet

@endsection
        


        
        <!-- Content -->
        
        <div class="container-xxl flex-grow-1 container-p-y">
            
            
            <h4 class="py-3 mb-4">
              <span class="text-muted fw-light">User Role / Information /</span> Details
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
                  <h5 class="card-header"> {{ ucfirst($role->name) }} Role Information Below</h5>
                  <div class="card-body">


                      <div class="row">
                        <div class="mb-3 col-12 col-sm-12 form-password-toggle">
                          <div class="input-group input-group-merge">
                            <div class="form-floating form-floating-outline">
                              <input class="form-control" type="text" id="user_name" name="name" value="{{$role->name}}" required/>
                              <label for="user_name">Role</label>
                            </div>

                          </div>
                        </div>
                      </div>


                      <div class="col-12">
            <h5>{{ ucfirst($role->name) }}`s Role Permissions</h5>
            <!-- Permission table -->
            <div class="table-responsive">
              <table class="table table-flush-spacing">
              @foreach($rolePermissions as $permission)
                <tbody>

                  <tr>
                    <td class="text-nowrap fw-medium">{{ $permission->name }}</td>
                    <td class="text-nowrap fw-medium">{{ $permission->guard_name }}</td>
                    <td>

                    </td>
                  </tr>


                </tbody>

                @endforeach
              </table>
            </div>
            <!-- Permission table -->
          </div>




                  </div>
                </div>

            

            

              </div>
              <!--/ User Content -->
            </div>
            

            
                      </div>
                      <!--/ Content -->
            
                                                        

@endsection 
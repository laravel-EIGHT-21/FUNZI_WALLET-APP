  
@extends('admin.body.admin_master')
@section('content')
        

@section('title')

View Rental Operators | funziwallet

@endsection





        <!-- Content -->
        
        <div class="container-xxl flex-grow-1 container-p-y">

            <h4 class="py-3 mb-4">
                  <span class="text-muted fw-light"><a href="{{route('admin.dashboard')}}">Home</a>/View /</span> Rental Operators 
                </h4>
    
                @can('taxi-bus-create')
            <div class="row">
    
            <div class="mb-2">
            <a href="{{route('add.rental.operators')}}" class="btn rounded-pill btn-label-primary" style="float:right;"><i class='tf-icons mdi mdi-plus mdi-20px'></i>Add New Rental Operator</a>
            </div>
    
            </div>
            @endcan
    

    
    
                <div class="row">
                            <div class="col-12">
                                <!-- ---------------------
                                        start Zero Configuration
                              
                                    ---------------- -->
                                <div class="card">
                                    <div class="card-body">
         
                                        <div class="table-responsive">
                                            <table id="zero_config" class="table border table-striped table-bordered text-nowrap">
                                                <thead>
                                                    <!-- start row -->
                                                    <tr>
                                                <th>Name</th>

                                                <th>Address</th>
                                                <th>Telephone</th>
                                                <th>Telephone2</th>
                                                <th>Status</th>
                                                <th>Actions</th>
                                                    </tr>
                                                    <!-- end row -->
                                                </thead>
    
    <tbody>
    @foreach($allData as $key => $value )
    <tr>

        
<td>
    <div class="d-flex align-items-center">
    
    <div class="ms-3">
    <h5 class="fw-semibold mb-0 fs-6">{{ $value->name}}</h5>

    </div>
    </div>
    </td>
    



    <td>{{ $value->address}}</td>
    <td>{{ $value->telephone}}</td>
    <td>{{ $value->telephone2}}</td>
    
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
      
    <a href="{{route('edit.rental.operator',$value->id)}}" title="Edit" class="btn btn-sm btn-info" >
      <i class="mdi mdi-square-edit-outline me-1"></i>
      </a>
      
      
    &nbsp;
    
    @if($value->status == 1)
    <a href="{{route('rental.operator.inactive',$value->id)}}" class="btn btn-sm btn-danger" id="deactivate" title="Deactivate " >
    <span class="mdi mdi-arrow-down-bold-box "></span></a>
    @else
    <a href="{{route('rental.operator.active',$value->id)}}" class="btn btn-sm btn-success" id="activate" title="Activate ">
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

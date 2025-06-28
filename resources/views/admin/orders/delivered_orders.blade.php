  
@extends('admin.body.admin_master')
@section('content')


@section('title')

Delivered Orders| funziwallet

@endsection

        

      <!-- Content -->
        
        <div class="container-xxl flex-grow-1 container-p-y">

        <h4 class="py-3 mb-4">
              <span class="text-muted fw-light"><a href="{{route('admin.dashboard')}}">Orders</a> /View/</span> Delivered Orders List ( {{ count($orders) }} Orders)
            </h4>
          
            <div class="card">
                                <div class="card-body">
     
                                    <div class="table-responsive">
                                        <table id="zero_config"
                                            class="table border table-striped table-bordered text-nowrap">
                                            <thead>
                                                <!-- start row -->
                                                <tr>
                                             <th scope="col">School</th>       
                                            <th scope="col">Order No.</th>
                                            <th scope="col">Total Px</th>
                                            <th scope="col"> Pay Status</th>
                                            <th scope="col">Delivery Date</th>
                                            <th scope="col">Actions</th>


                                                </tr>
                                                <!-- end row --> 
                                            </thead>

<tbody>
@foreach($orders as $key => $value )
<tr>




<td>

<div class="d-flex align-items-center">
<div class="ms-3">
<h6 class="fw-semibold mb-0">{{ $value->name}}</h6>

</div>
</div>

</td>




<td>

<div class="d-flex align-items-center">
<div class="ms-3">
<h6 class="fw-semibold mb-0">{{ $value->order_number}}</h6>

</div>
</div>

</td>


<td>
    
    <div class="d-flex align-items-center">
    
    <div class="ms-3">
    <h6 class="fw-semibold mb-0">{{ $value->amount}}</h6>
    
    </div>
    </div>
    
    
    </td>
    


    
<td>
    
    <div class="d-flex align-items-center">
    
    <div class="ms-3">
    <h6 class="fw-semibold mb-0">{{ $value->payment_status}}</h6>
    
    </div>
    </div>
    
    
    </td>




<td>

<div class="d-flex align-items-center">
<div class="ms-3">
<h6 class="fw-semibold mb-0">{{ $value->delivered_date}}</h6>

</div>
</div>

</td>


<td>
@can('school-orders-details')
<div class="action-btn d-flex align-items-center">
<a href="{{route('order.details',$value->id)}}"   title="Order Details" class="btn btn-sm btn-success">
<i class="mdi mdi-notebook-outline me-1"></i>
</a>
@endcan

&nbsp;&nbsp;

<a href="{{route('order.details.invoice.report',$value->id)}}" target="_blank"   title="Order Invoice" class="btn btn-sm btn-warning">
<i class="mdi mdi-printer-outline me-1"></i>
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
            
                      </div>
                      <!--/ Content -->




@endsection 
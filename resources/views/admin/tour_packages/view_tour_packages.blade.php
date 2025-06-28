@extends('admin.body.admin_master')
@section('content')
          

@section('title')

Tour Packages | funzitours

@endsection

         


        <!-- Content -->
        
        <div class="container-xxl flex-grow-1 container-p-y">
            
            
          <h4 class="py-3 mb-4"><span class="text-muted fw-light"><a href="{{route('admin.dashboard')}}">Home</a>/All/</span> Tour Packages</h4>

            
<div class="app-academy">
  <div class="card p-0 mb-4">
    <div class="card-body d-flex flex-column flex-md-row justify-content-between p-0 pt-4">
      <div class="app-academy-md-25 card-body py-0">
        <img src="{{asset('Tours/assets/img/illustrations/bulb-light.png')}}" class="img-fluid app-academy-img-height scaleX-n1-rtl" alt="Bulb in hand" height="90" />
      </div>
      <div class="app-academy-md-50 card-body d-flex align-items-md-center flex-column text-md-center mb-4">
        <span class="card-title mb-3 lh-lg px-md-5 display-6 text-primary text-nowrap text-heading">
          All Tour Packages 
        </span>
 
      </div>
      <div class="app-academy-md-25 d-flex align-items-end justify-content-end">
        <img src="{{asset('Tours/assets/img/illustrations/pencil-rocket.png')}}" alt="pencil rocket" height="188" class="scaleX-n1-rtl" />
      </div>
    </div>
  </div>

<br/><br/>

  @can('school-tours-operate')
  <div class="row">

  <div class="mb-2">
  <a href="{{route('add.tour.package')}}" class="btn rounded-pill btn-label-success" style="float:right;"><i class='tf-icons mdi mdi-plus mdi-20px'></i>Add New Tour Package</a>
  </div>

  </div>
  @endcan

<br/><br/>




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
                      <th>Tour</th>
                      <th>Availability</th>
                      <th>Region</th>
                      <th>Std Px</th>
                      <th>Adult Px</th>
                      <th>Dates</th>
                      <th>Status</th>
                      <th>Actions</th>
                          </tr>
                          <!-- end row -->
                      </thead>

<tbody>
@foreach($tours as $tour )
<tr>


<td>
<div class="d-flex align-items-center">

<div class="ms-3">
<h6 class="fw-semibold mb-0 fs-6">{{ $tour->name}}</h6>

<div class="d-flex align-items-center">
  <img src="{{ (!empty($tour->image_thambnail))? url('upload/tour_package_thumbnail/'.$tour->image_thambnail):url('upload/no_image.jpg') }}" class="rounded-circle" alt="..." width="56" height="56">
  
  </div>
  </div>

</td>

<td>
  @if($tour->availability_end_date >= Carbon\Carbon::now()->format('Y-m-d'))
  <span class="badge rounded-pill bg-label-success"><b> Available </b> </span>
  @else
<span class="badge rounded-pill bg-label-danger"><b> Expired </b></span>
  @endif

</td>



<td> {{$tour['destination']['destination_name']}}</td>

<td> {{$tour->students_price}}</td>
<td> {{$tour->adults_price}}</td>
<td>
 <span class="badge bg-info">{{ $tour->availability_start_date }}</span>  /<br/> <span class="badge bg-warning text-dark">{{ $tour->availability_end_date }}</span> 
  
<td class="pe-0">

@if($tour->status == 1)
<span class="badge rounded-pill bg-label-success"><b>Active</b></span>
@elseif($tour->status == 0 )
<span class="badge rounded-pill bg-label-danger"><b>Deactived</b></span>
@endif

</td>




<td>

@can('school-tours-operate')
<div class="action-btn">

<a href="{{route('tour.package.edit',$tour->id)}}" title="Edit" class="btn btn-sm btn-info" >
  <i class="ri-edit-circle-fill lh-1 scaleX-n1-rtl"></i>
</a>


&nbsp;

@if($tour->status == 1)
<a href="{{route('tour.deactivate',$tour->id)}}" class="btn btn-sm btn-danger" id="deactivate_tour" title="Deactivate Tour" >
  <i class="ri-thumb-down-line lh-1 scaleX-n1-rtl"></i></a>
@else
<a href="{{route('tour.activate',$tour->id)}}" class="btn btn-sm btn-success" id="activate_tour" title="Activate Tour">
  <i class="ri-thumb-up-fill lh-1 scaleX-n1-rtl"></i></a>
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

<br/>

          </div>
          <!-- / Content -->


          

                      

                      

            
            @endsection

@extends('tours_travels.body.admin_master')
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
        <span class="card-title mb-3 lh-lg px-md-5 display-6 text-heading">
          All Your Tour Packages ,
          <span class="text-primary text-nowrap">All In One Place</span>.
        </span>

      </div>
      <div class="app-academy-md-25 d-flex align-items-end justify-content-end">
        <img src="{{asset('Tours/assets/img/illustrations/pencil-rocket.png')}}" alt="pencil rocket" height="188" class="scaleX-n1-rtl" />
      </div>
    </div>
  </div>

<br/><br/>

<div class="row">
  <div class="col-xl-12">
    <h5 class="text-bold">All Tour Packages Available By Region</h5>
    <div class="nav-align-top mb-4">
      <ul class="nav nav-pills mb-3" role="tablist">
        <li class="nav-item">
          <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-all" aria-controls="navs-pills-all" aria-selected="true">All</button>
        </li>
        @foreach($destinations as $destination) 
        <li class="nav-item">
          <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#destination{{$destination->id}}" aria-controls="navs-pills-category" aria-selected="false">{{$destination->destination_name}}</button>
        </li>
        @endforeach

      </ul>


      <br/>
      <div class="tab-content">
        <div class="tab-pane fade show active" id="navs-pills-all" role="tabpanel">



              <br>
              <div class="card-body">
                <div class="row gy-4 mb-4">


                @foreach($tours as $tour )

                  <div class="col-sm-6 col-lg-4">
                    <div class="card p-2 h-100 shadow-none border">
                      <div class="rounded-2 text-center mb-3">
                        <img class="img-fluid" src="{{ (!empty($tour->image_thambnail))? url('upload/tour_package_thumbnail/'.$tour->image_thambnail):url('upload/no_image.jpg') }}" alt="Main Thambnail" />
                      </div>
                      <div class="card-body p-3 pt-2">

                        @php
                        $reviewcount = App\Models\tour_reviews::where('tour_id',$tour->id)->where('status',1)->latest()->get();
                        $avarage = App\Models\tour_reviews::where('tour_id',$tour->id)->where('status',1)->avg('rating');
                 
                    @endphp   
                        <div class="d-flex justify-content-between align-items-center mb-4">
                          <span class="badge rounded-pill bg-label-warning">Ratings</span>
                          <p class="d-flex align-items-center justify-content-center gap-1 mb-0">
                            {{ round($avarage,1) }}  
                            @if ($avarage == 0)
                            <span class="text-secondary"><i class="ri-star-s-fill ri-24px me-1"></i></span>
                            @elseif ($avarage == 1 || $avarage < 2)
                            <span class="text-warning"><i class="ri-star-s-fill ri-24px me-1"></i></span>
                            @elseif ($avarage == 2 || $avarage < 3)
                            <span class="text-warning"><i class="ri-star-s-fill ri-24px me-1"></i></span>
                            @elseif ($avarage == 3 || $avarage < 4)
                            <span class="text-warning"><i class="ri-star-s-fill ri-24px me-1"></i></span>
                            @elseif ($avarage == 4 || $avarage < 5)
                            <span class="text-warning"><i class="ri-star-s-fill ri-24px me-1"></i></span>
                            @elseif ($avarage == 5 || $avarage < 5)
                            <span class="text-warning"><i class="ri-star-s-fill ri-24px me-1"></i></span>
                            @endif
                            <span class="fw-normal"> ({{ count($reviewcount) }})</span>
                          </p>
                        </div>

                        <a href="javascript:void(0);" class="h5">{{ $tour->name}}</a>

                        <hr>
                      
                        <div class="row mb-6 g-4">
                            <div class="col-6">
                              <div class="d-flex">
                                <div class="avatar flex-shrink-0 me-4">
                                  <span class="avatar-initial rounded-3 bg-label-info"><i class="ri-money-dollar-circle-fill ri-24px"></i></span>
                                </div>
                                <div>
                                  <h6 class="mb-0 text-nowrap fw-semibold"> ugx {{$tour->students_price}}</h6>

                                  <small>Sudents Price</small>
                                </div>
                              </div>
                            </div>



                            <div class="col-6">
                              <div class="d-flex">
                                <div class="avatar flex-shrink-0 me-4">
                                  <span class="avatar-initial rounded-3 bg-label-dark"><i class="ri-money-dollar-circle-fill ri-24px"></i></span>
                                </div>
                                <div>
                                  <h6 class="mb-0 text-nowrap fw-semibold">ugx {{$tour->adults_price}}</h6>
                                  <small>Adults Price</small>
                                </div>
                              </div>
                            </div>

                          </div>                            

<br>

                            <div class="row mb-6 g-4">

                              <div class="col-6">
                                <div class="d-flex">
                                  <div class="avatar flex-shrink-0 me-4">
                                    <span class="avatar-initial rounded-3 bg-label-success"><i class="ri-calendar-line ri-24px"></i></span>
                                  </div>
                                  <div>
                                    <h6 class="mb-0 text-nowrap fw-normal"> {{ Carbon\Carbon::parse($tour->availability_start_date)->format('d M Y') }}</h6>

                                    <small>Start Date</small>
                                  </div>
                                </div>
                              </div>



                              <div class="col-6">
                                <div class="d-flex">
                                  <div class="avatar flex-shrink-0 me-4">
                                    <span class="avatar-initial rounded-3 bg-label-warning"><i class="ri-calendar-line ri-24px"></i></span>
                                  </div>
                                  <div>
                                    <h6 class="mb-0 text-nowrap fw-normal">{{ Carbon\Carbon::parse($tour->availability_end_date)->format('d M Y') }}</h6>
                                    <small>End Date</small>
                                  </div>
                                </div>
                              </div>

                            </div>
<br />

                        <div class="d-flex flex-column flex-md-row gap-3 text-nowrap flex-wrap flex-md-nowrap  flex-lg-wrap flex-xxl-nowrap">


                          <a href="{{url('touroperator/edit/tour/package/'.$tour->id)}}">
                            <button type="button" title="Edit" class="w-100 btn btn-sm btn-primary d-flex align-items-center">
                            <i class="ri-edit-circle-fill lh-1 scaleX-n1-rtl"></i>
                            </button>
                          </a>


                      @if($tour->status == 1)
                       <a href="{{url('touroperator/deactivate/tour/package/'.$tour->id)}}">
                      <button type="button" id="deactivate_tour" title="Deactivate Tour" class="w-100 btn btn-sm btn-danger d-flex align-items-center">
                      <i class="ri-thumb-down-line lh-1 scaleX-n1-rtl"></i>
                      </button>
                      </a>
                      @else
                      <a href="{{url('touroperator/activate/tour/package/'.$tour->id)}}">
                      <button type="button" id="activate_tour" title="Activate Tour" class="w-100 btn btn-sm btn-success d-flex align-items-center">
                      <i class="ri-thumb-up-fill lh-1 scaleX-n1-rtl"></i>
                      </button>
                      </a>

                      @endif


                        </div>
                      </div>
                    </div>
                  </div>


                  @endforeach


                </div>




                {{$tours->links('pagination.bootstrap-4') }}


              </div>
            
        </div>



        @foreach($destinations as $dest)
        <div class="tab-pane fade" id="destination{{$dest->id}}" role="tabpanel">

              <div class="card-header d-flex flex-wrap justify-content-between gap-3">
                <div class="card-title mb-0 me-1">
                  <h4 class="mb-1">All Tour Packages</h4>
                 
                </div>
               
              </div>
              <div class="card-body">
                <div class="row gy-4 mb-4">


                  @php
                  $id = Auth::user()->id;
            $destTourPackage = App\Models\tour_packages::where('tour_operator_id',$id)->where('destination_id',$dest->id)->paginate(9);
          @endphp

                @foreach($destTourPackage as $tourss)
                  <div class="col-sm-6 col-lg-4">
                    <div class="card p-2 h-100 shadow-none border">
                      <div class="rounded-2 text-center mb-3">
                        <img class="img-fluid" src="{{ (!empty($tourss->image_thambnail))? url('upload/tour_package_thumbnail/'.$tourss->image_thambnail):url('upload/no_image.jpg') }}" alt="Main Thambnail" />
                      </div>
                      <div class="card-body p-3 pt-2">

                        @php
                        $reviewcount2 = App\Models\tour_reviews::where('tour_id',$tourss->id)->where('status',1)->latest()->get();
                        $average2 = App\Models\tour_reviews::where('tour_id',$tourss->id)->where('status',1)->avg('rating');
                 
                    @endphp   
                        <div class="d-flex justify-content-between align-items-center mb-4">
                          <span class="badge rounded-pill bg-label-warning">Ratings</span>
                          <p class="d-flex align-items-center justify-content-center gap-1 mb-0">
                            {{ round($average2,1) }} 
                            @if ($average2 == 0)
                            <span class="text-secondary"><i class="ri-star-s-fill ri-24px me-1"></i></span>
                            @elseif ($average2 == 1 || $average2 < 2)
                            <span class="text-warning"><i class="ri-star-s-fill ri-24px me-1"></i></span>
                            @elseif ($average2 == 2 || $average2 < 3)
                            <span class="text-warning"><i class="ri-star-s-fill ri-24px me-1"></i></span>
                            @elseif ($average2 == 3 || $average2 < 4)
                            <span class="text-warning"><i class="ri-star-s-fill ri-24px me-1"></i></span>
                            @elseif ($average2 == 4 || $average2 < 5)
                            <span class="text-warning"><i class="ri-star-s-fill ri-24px me-1"></i></span>
                            @elseif ($average2 == 5 || $average2 < 5)
                            <span class="text-warning"><i class="ri-star-s-fill ri-24px me-1"></i></span>
                            @endif
                            <span class="fw-normal"> ({{ count($reviewcount2) }})</span>
                          </p>
                        </div>
                       
                        <a href="javascript:void(0);" class="h5">{{ $tourss->name}}</a>

                        <hr>
                       

                        <div class="row mb-6 g-4">
                          <div class="col-6">
                            <div class="d-flex">
                              <div class="avatar flex-shrink-0 me-4">
                                <span class="avatar-initial rounded-3 bg-label-info"><i class="ri-money-dollar-circle-fill ri-24px"></i></span>
                              </div>
                              <div>
                                <h6 class="mb-0 text-nowrap fw-semibold"> ugx {{$tourss->students_price}}</h6>

                                <small>Sudents Price</small>
                              </div>
                            </div>
                          </div>



                          <div class="col-6">
                            <div class="d-flex">
                              <div class="avatar flex-shrink-0 me-4">
                                <span class="avatar-initial rounded-3 bg-label-dark"><i class="ri-money-dollar-circle-fill ri-24px"></i></span>
                              </div>
                              <div>
                                <h6 class="mb-0 text-nowrap fw-semibold">ugx {{$tourss->adults_price}}</h6>
                                <small>Adults Price</small>
                              </div>
                            </div>
                          </div>

                        </div>                            

<br>



                            <div class="row mb-6 g-4">

                              <div class="col-6">
                                <div class="d-flex">
                                  <div class="avatar flex-shrink-0 me-4">
                                    <span class="avatar-initial rounded-3 bg-label-success"><i class="ri-calendar-line ri-24px"></i></span>
                                  </div>
                                  <div>
                                    <h6 class="mb-0 text-nowrap fw-normal"> {{ Carbon\Carbon::parse($tourss->availability_start_date)->format('d M Y') }}</h6>

                                    <small>Start Date</small>
                                  </div>
                                </div>
                              </div>



                              <div class="col-6">
                                <div class="d-flex">
                                  <div class="avatar flex-shrink-0 me-4">
                                    <span class="avatar-initial rounded-3 bg-label-warning"><i class="ri-calendar-line ri-24px"></i></span>
                                  </div>
                                  <div>
                                    <h6 class="mb-0 text-nowrap fw-normal">{{ Carbon\Carbon::parse($tourss->availability_end_date)->format('d M Y') }}</h6>
                                    <small>End Date</small>
                                  </div>
                                </div>
                              </div>

                            </div>
<br />

                        <div class="d-flex flex-column flex-md-row gap-3 text-nowrap flex-wrap flex-md-nowrap  flex-lg-wrap flex-xxl-nowrap">


                          <a href="{{url('touroperator/edit/tour/package/'.$tourss->id)}}">
                            <button type="button" title="Edit" class="w-100 btn btn-primary d-flex align-items-center">
                            <i class="ri-edit-circle-fill lh-1 scaleX-n1-rtl"></i>
                            </button>
                          </a>


                          @if($tourss->status == 1)
                          <a href="{{url('touroperator/deactivate/tour/package/'.$tourss->id)}}">
                          <button type="button" id="deactivate_tour" title="Deactivate Tour" class="w-100 btn btn-sm btn-danger d-flex align-items-center">
                          <i class="ri-thumb-down-line lh-1 scaleX-n1-rtl"></i>
                          </button>
                          </a>
                          @else
                          <a href="{{url('touroperator/activate/tour/package/'.$tourss->id)}}">
                          <button type="button" id="activate_tour" title="Activate Tour" class="w-100 btn btn-sm btn-success d-flex align-items-center">
                          <i class="ri-thumb-up-fill lh-1 scaleX-n1-rtl"></i>
                          </button>
                          </a>
    
                          @endif



                        </div>
                      </div>
                    </div>
                  </div>


                  @endforeach


                </div>



                {{$destTourPackage->links('pagination.bootstrap-4') }}


              </div>

        </div>
        @endforeach




        </div>
        




      </div>
    </div>
  </div>

</div>

<br/>

          </div>
          <!-- / Content -->



          
          

                      

                      

            
            @endsection
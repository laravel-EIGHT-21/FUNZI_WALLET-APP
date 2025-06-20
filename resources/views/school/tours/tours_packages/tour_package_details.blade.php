
@extends('school.tours.body.admin_master')
@section('content')
        

@section('title')

Tour Package Details | funzitours
 
@endsection


      


        <!-- Content -->
        
          <div class="container-xxl flex-grow-1 container-p-y">



            <h4 class="py-3 mb-4">
              <span class="text-muted fw-light">View /</span> <b>{{$tour->name}}</b>  Details
            </h4>


            <div class="row">

<div class="mb-4">

<a href="{{ route('school.tour.packages')}}" class="btn rounded-pill btn-warning" style="float:right;"><i class='tf-icons ri-arrow-left-line ri-20px'></i>Back</a>

</div>

</div>
<br/>
            

            
<div class="row g-6">
    <div class="col-lg-8">
      <div class="card">
        <div class="card-body">

          <div class="card academy-content shadow-none border">
            <div class="p-2">

                <!-- Gallery effect-->

    <div id="swiper-gallery">
      <div class="swiper gallery-top">

        <div class="swiper-wrapper">
          @foreach($multiImgs as $img)
          <div class="swiper-slide" style="background-image:url({{ (!empty($img->image_url))? url('upload/tour_package_multimages/'.$img->image_url):url('upload/no_image.jpg') }})"></div>
          @endforeach


        </div>
        <!-- Add Arrows -->
        <div class="swiper-button-next swiper-button-white"></div>
        <div class="swiper-button-prev swiper-button-white"></div>
      </div>
      <div class="swiper gallery-thumbs">
        <div class="swiper-wrapper">
          @foreach($multiImgs as $img)
          <div class="swiper-slide" style="background-image:url({{ (!empty($img->image_url))? url('upload/tour_package_multimages/'.$img->image_url):url('upload/no_image.jpg') }})"></div>
          @endforeach
        </div>
      </div>
    </div>
  



            </div>

            <div class="card-body pt-3">

              <h5>About this Tour Package</h5>

              <h6>Region</h6>
              <p class="mb-0">
                {{$tour['destination']['destination_name']}}
              </p>

              <br/>

              <h6>Description</h6>
              <p class="mb-0">
                {{$tour->description}}
              </p>
              <hr class="my-6">
              <h5>Prices & Dates Available</h5>
              <div class="d-flex flex-wrap row-gap-2">
                <div class="me-12">
                  <p class="text-nowrap mb-2"><i class='ri-group-line ri-20px me-2'></i>Students Price (per student) ugx: {{$tour->students_price}} </p>
                  <p class="text-nowrap mb-2"><i class='ri-group-fill ri-20px me-2'></i>Adults Price (per adult) ugx : {{$tour->adults_price}}</p>
                  <p class="text-nowrap mb-2"><i class='ri-calendar-line ri-20px me-2'></i>From : {{ Carbon\Carbon::parse($tour->availability_start_date)->format('D, d F Y') }}</p>
                  <p class="text-nowrap mb-0"><i class='ri-calendar-fill ri-20px me-2'></i>To : {{ Carbon\Carbon::parse($tour->availability_end_date)->format('D, d F Y') }}</p>
                </div>

              </div>
              <hr class="my-6">
              <h5>Reviews</h5>
              @php
              $averages = App\Models\tour_reviews::where('tour_id',$tour->id)->where('status',1)->avg('rating');
       
          @endphp  

              @php
              $reviewcount = App\Models\tour_reviews::where('tour_id',$tour->id)
                              ->where('status',1)
                              ->select('rating', DB::raw('count(*) as count'))
                              ->groupBy('rating')
                              ->orderBy('rating','desc')
                              ->get();
              $totalReviews = $reviewcount->sum('count');
  
              $percentages = [];
  
              for ($i=5; $i >= 1 ; $i--) { 
                  $ratingCount = $reviewcount->where('rating',$i)->first();
                  $count =  $ratingCount ? $ratingCount->count : 0;
                  $percent = $totalReviews  > 0 ? ($count / $totalReviews) * 100 : 0;
                  $percentages[] = [
                      'rating' => $i,
                      'percent' => $percent,
                      'count' => $count,
                 ];
              } 
          @endphp
  


              <div class="col-md-12">
                <div class="card h-100">
                  <div class="card-body row widget-separator">
                    <div class="col-sm-5 border-shift border-end">
                      <div class="d-flex align-items-center mb-2">
                        <span class="text-primary fs-3 fw-medium">{{ round($averages,1) }}</span>
                        <span class='ri-star-fill ri-32px ms-2 text-primary'></span>

                      </div>
                      <h6 class="mb-2">Total {{ count($reviewcount) }} reviews</h6>
                      <p class="mb-2">All reviews are from genuine !</p>

                      <hr class="d-sm-none">
                    </div>

            
                    <div class="col-sm-7 g-2 text-nowrap d-flex flex-column justify-content-between px-6 gap-3">

                      @if (count($percentages) > 0) 
                      @foreach ($percentages as $ratingInfo)
                      <div class="d-flex align-items-center gap-2">
                        <small>{{ $ratingInfo['rating'] }}   <i class="ri-star-fill"></i></small>
                        <div class="progress w-100 rounded-pill" style="height:8px;">
                          <div class="progress-bar bg-primary" role="progressbar" style="width: {{ $ratingInfo['percent'] }}%" aria-valuenow="{{ $ratingInfo['percent'] }}" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <small class="w-px-20 text-end">{{ $ratingInfo['count'] }}</small>
                      </div>

            
                      @endforeach
                      @else
                      <p>No Reviews Available</p>
                      @endif

                    </div>




                  </div>
                </div>
              </div>

              @php
              $school_id = App\Models\tour_reviews::where('school_id',Auth::id())->where('tour_id',$tour->id)->first();
       
          @endphp  
              <hr class="my-6">
              <h5>Add a Review</h5>

              @if($school_id == NULL)

              <div class="d-flex justify-content-start align-items-center user-name">

                <form method="post" action="{{ route('store.review') }}" class="row">
                  @csrf

                  <input type="hidden" name="tour_id" value="{{ $tour->id }}">

                <div class="col-md-12">


                  <div class="mb-12">

                    <div class="form-check form-check-inline mt-4">
                      <input class="form-check-input" type="radio" name="rate" value="1" />
                      <label class="form-check-label" for="inlineRadio1">1</label>
                    </div>

                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="rate" value="2" />
                      <label class="form-check-label" for="inlineRadio2">2</label>
                    </div>

                    <div class="form-check form-check-inline mt-4">
                      <input class="form-check-input" type="radio" name="rate" value="3" />
                      <label class="form-check-label" for="inlineRadio1">3</label>
                    </div>

                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="rate" value="4" />
                      <label class="form-check-label" for="inlineRadio2">4</label>
                    </div>

                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="rate" value="5" />
                      <label class="form-check-label" for="inlineRadio2">5</label>
                    </div>
                </div>


                  <div class="mb-12">

                      <div class="form-floating form-floating-outline mb-6">
                        <textarea class="form-control h-px-100 w-px-500" id="exampleFormControlTextarea1" name="comment" placeholder="Comments here..."></textarea>
                        <label for="exampleFormControlTextarea1">Message</label>
                      </div>
                    </div>

                      <div class="mb-4">
                      
                        <button type="submit" class="btn btn-primary me-2">Submit Review</button>

                    </div>


                  </div>
        </form>


                </div>

@else

<p>You Already Submitted Review For This Tour</p>

@endif


            </div>
          </div>
        </div>
      </div>
    </div>





    <div class="col-lg-4">
 <!-- Store Details Tab -->
 <div class="tab-pane fade show active" id="store_details" role="tabpanel">

  <form action="{{ route('add.to.tour.cart') }}"  method="POST" >
    @csrf

    <input class="form-control" type="hidden" name="id" value="{{$tour->id}}" id="html5-text-input" />


  <div class="card mb-6">
    <div class="card-header">
      <h6 class="card-title m-0">Add Tour To Cart</h6>
    </div>
    <div class="card-body">
      <div class="row mb-5 g-5">
        <div class="col-12 col-md-6">
          <div class="form-floating form-floating-outline mb-4">
            <input class="form-control" type="number" id="studqty" name="stud_qty" value="1" min="1" />
            <label for="studqty">Students Total</label>
          </div>
        </div>


        <div class="col-12 col-md-6">
          <div class="form-floating form-floating-outline">
            <input class="form-control" type="number" id="adultqty" name="adult_qty" value="1" min="1" />
            <label for="adultqty">Adults Total</label>
          </div>
        </div>


      </div>


    </div>
  </div>

  @php 

  $school_id = Auth::user()->id;
  $tourCart = App\Models\tours_cart::where('school_id',$school_id)->where('tour_package_id',$tour->id)->first();
  
  
        @endphp

    @if($tourCart == null)

  <div class="d-flex justify-content-end gap-4">
    <button type="reset" class="btn btn-outline-secondary">Discard</button>
    <button type="submit" class="btn btn-primary"><i class="ri-bus-fill lh-1 scaleX-n1-rtl ri-24px"></i>Add To Cart</button>
  </div>

  @else

  @endif

</div>

</form>
    </div>
  </div>
  


            
<br/><br/>

</div>
<!-- / Content -->




            

            

  
  @endsection
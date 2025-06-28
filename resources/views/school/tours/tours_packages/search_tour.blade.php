<!-- <ul>
	@foreach($tours as $item)
	<li> <img src="{{ (!empty($item->image_thambnail))? url('upload/tour_package_thumbnail/'.$item->image_thambnail):url('upload/no_image.jpg') }}" style="width: 30px; height: 30px;"> {{ $item->product_name }}  </li>
	@endforeach
</ul> -->

<style>
	
body {
    background-color: #eeeSS
}
.card {
    background-color: #fff;
    padding: 15px; 
    border: none
}
.input-box {
    position: relative
}
.input-box i {
    position: absolute;
    right: 13px;
    top: 15px;
    color: #ced4da
}
.form-control {
    height: 50px;
    background-color: #eeeeee69
}
.form-control:focus {
    background-color: #eeeeee69;
    box-shadow: none;
    border-color: #eee
}
.list {
    padding-top: 20px;
    padding-bottom: 10px;
    display: flex;
    align-items: center
}
.border-bottom {
    border-bottom: 2px solid #eee
}
.list i {
    font-size: 19px;
    color: red
}
.list small {
    color: #dedddd
}
</style>

@if($tours -> isEmpty()) 
<h3 class="text-center text-danger">Tour Not Found </h3>

@else
 

<div class="container mt-5">
    <div class="row d-flex justify-content-center "> 
        <div class="col-md-6">
            <div class="card">
                

            @foreach($tours as $item)
   <a href="{{ url('school/product/details/'.$item->id.'/'.$item->product_name ) }}">
                <div class="list border-bottom">  
                    
                <img src="{{ (!empty($item->image_thambnail))? url('upload/tour_package_thumbnail/'.$item->image_thambnail):url('upload/no_image.jpg') }}" style="width: 30px; height: 30px;"> 
                    
   <div class="d-flex flex-column ml-3" style="margin-left: 10px;">
   
   <span>{{ $item->name }} </span>

    <small> Student Px : {{$item->students_price}}</small><br>
    
    <small> Adult Px : {{$item->adults_price}}</small>


</div>
               

</div>
                </a>
                @endforeach
                
            </div>
        </div>
    </div>
</div>

@endif


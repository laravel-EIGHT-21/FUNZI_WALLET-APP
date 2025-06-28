<!-- <ul>
	@foreach($rentals as $bus)
	<li> <img src="{{ (!empty($bus->car_photo))? url('upload/car_photos/'.$bus->car_photo):url('upload/no_image.jpg') }}" style="width: 30px; height: 30px;"> {{ $item->product_name }}  </li>
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

@if($rentals -> isEmpty()) 
<h3 class="text-center text-danger">Product Not Found </h3>

@else
 

<div class="container mt-5">
    <div class="row d-flex justify-content-center "> 
        <div class="col-md-6">
            <div class="card">
                

            @foreach($rentals as $item)
   <a href="{{ url('school/bus/rentals/details/'.$item->id ) }}">
                <div class="list border-bottom">  
                    
                <img src="{{ (!empty($item->car_photo))? url('upload/car_photos/'.$item->car_photo):url('upload/no_image.jpg') }}" style="width: 30px; height: 30px;"> 
                    
   <div class="d-flex flex-column ml-3" style="margin-left: 10px;">
   
   <span>{{ $item->car_name }} </span> <small>Hire with Fuel : UGX {{ $item->hire_price_fuel }}</small> </div>
               

</div>
                </a>
                @endforeach
                
            </div>
        </div>
    </div>
</div>

@endif


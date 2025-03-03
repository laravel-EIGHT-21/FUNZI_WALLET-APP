  
@extends('admin.body.admin_master')
@section('content')


@section('title')

Order Details | funziwallet

@endsection



<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>



        
<div class="container-xxl flex-grow-1 container-p-y">
            
            
    <h4 class="py-3 mb-4">
      <span class="text-muted fw-light">Update/</span> Offline Order Payment for Order Number : {{$payment_record['0']['order']['order_number']}}
    </h4> 


    <div class="card mb-4">
        <h5 class="card-header">Update Offline Order Payment Below</h5>
        <div class="card-body">
        <form action="{{ route('offline.order.payment.update',$payment_record['0']['order_id']) }}" method="POST" >
        @csrf

        <input type="hidden" name="id" value="{{ $payment_record['0']['order_id'] }}" />


        
        <div class="row">

            <div class="col mb-4 mt-2">
            <div class="form-floating form-floating-outline">
            <input class="form-control" type="text" name="total_amount" readonly value="{{$payment_record['0']['total_amount']}}" id="html5-text-input" />
            <label for="html5-text-input">Total Amount</label>
            </div>
    
            </div>
            </div>
    


        <div class="row">

        <div class="col mb-4 mt-2">
        <div class="form-floating form-floating-outline">
        <input class="form-control" type="text" name="amount" value="{{$payment_record['0']['amount']}}" id="cash" required />
        <label for="cash">Enter Payment</label>
        </div>

        </div>
        </div>



        @foreach($orders_payments as $update)
        <div class="row">

        <div class="col mb-4 mt-2">
        <div class="form-floating form-floating-outline">
        <select id="payment_type" name="payment_type" class="select2 form-select" data-allow-clear="true">
        <option value="">Select Type</option>

        <option value="Cash" {{ ($update->payment_type == 'Cash')? 'selected':'' }}>Cash</option>
      <option value="Mobile Money" {{ ($update->payment_type == 'Mobile Money')? 'selected':'' }}>Mobile Money</option>

        </select>
        <label for="payment_type">Payment Type</label>
        </div>

        </div>
        </div>




@endforeach


        <div class="row">
        <div>
        <button type="submit" class="btn btn-primary me-2">Update Order Payment</button>
        </div>
        </div>

        </form>
        </div>
        </div>

  


</div>

<!--/ Content -->





            
                    
@endsection

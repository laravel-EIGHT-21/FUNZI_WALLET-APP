  
@extends('admin.body.admin_master')
@section('content')


@section('title')

Offline Order Payment | funziwallet

@endsection



<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

        <!-- Content -->
        
        <div class="container-xxl flex-grow-1 container-p-y">
            
            

            <h4 class="py-3 mb-2">
              <span class="text-muted fw-light">Make /</span>Offline Order Payment for Order No. {{$orders['0']['order_number']}}
            </h4>
            


            <div class="row">
                <div class="card mb-4">
                              <h5 class="card-header">Submit Order Payment </h5>
            
                              <form action="{{ route('submit.order.payment',$orders['0']['id']) }}" method="POST" >
                              @csrf
            
                              <input type="hidden" name="order_id" value="{{ $orders['0']['id'] }}" />
            
                              <div class="row">
            
            <div class="col mb-4 mt-2">
            <div class="form-floating form-floating-outline">
            <input class="form-control" type="text" name="amount" readonly value="{{$orders['0']['amount']}}"  id="html5-text-input" />
            <label for="html5-text-input">Total Amount</label>
            </div>
            
            </div>
            </div>
            
            
            <div class="row">
            
            <div class="col mb-4 mt-2">
              <div class="form-floating form-floating-outline">
              <input class="form-control" type="text" name="amount" readonly value="{{$order_payment_total}}"  id="html5-text-input" />
              <label for="html5-text-input">Amount Paid</label>
              </div>
            
              </div>
            </div>
        
            @php
        
        $balance = (float)$orders['0']['amount'] - (float)$order_payment_total;
        
            @endphp
            
            
            <div class="row">
            
            <div class="col mb-4 mt-2">
              <div class="form-floating form-floating-outline">
              <input class="form-control" type="text" name="amount" readonly value="{{$balance}}"  id="html5-text-input" />
              <label for="html5-text-input">Fees Balance </label>
              </div>
            
              </div>
            </div>
            
            
            @if($order_payment_total < $orders['0']['amount'])
            
            
            <div class="row">
            
            <div class="col mb-4 mt-2">
            <div class="form-floating form-floating-outline">
            <input class="form-control" type="text" maxlength="7" name="payment_amount" id="cash" required />
            <label for="cash">Enter Order Payment</label>
            </div>
            
            </div>
            </div>
            
            
            
            <div class="row">
            
            <div class="col mb-4 mt-2">
            <div class="form-floating form-floating-outline">
            <select id="payment_type" name="payment_type" class="select2 form-select" data-allow-clear="true">
            <option value="">Select Type</option>
            <option value="Cash">Cash</option>
            <option value="Mobile Money">Mobile Money</option>
            </select>
            <label for="payment_type">Payment Type</label>
            </div>
            
            </div>
            </div>
            
            
            
            
            <div class="row">
                              <div>
                              <button type="submit" class="btn btn-primary mb-2 me-2">Submit Order Payment</button>
                              </div>
                              </div>
              
            
                              @else
            
                              @endif
            
            
                              </form>
                              </div>
        
        
      
            </div>

            

        </div>

        <!--/ Content -->

      
@endsection

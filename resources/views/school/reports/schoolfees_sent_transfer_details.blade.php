  
@extends('school.body.admin_master')
@section('content')


@section('title')

SchoolFees Transfer Amounts Details | funziwallet

@endsection



      <!-- Content wrapper -->
      <div class="content-wrapper">
 
      <h4 class="py-3 mb-4">
              <span class="text-muted fw-light">Details /</span> For SchoolFees Amounts Received
            </h4>
      

        <!-- Content -->
        
          <div class="container-xxl flex-grow-1 container-p-y">
            
          <div class="row">

<div class="mb-4">

<a href="{{ route('school.recent.schoolsfees.transactions')}}" class="btn rounded-pill btn-primary" style="float:right;"><i class='tf-icons mdi mdi-arrow-left mdi-20px'></i>Back</a>

</div>

    </div>
            

<div class="row invoice-preview">
  <!-- Invoice -->
  <div class="col-xl-9 col-md-8 col-12 mb-md-0 mb-4">
    <div class="card invoice-preview-card">
      <div class="card-body">
        <div class="d-flex justify-content-between flex-xl-row flex-md-column flex-sm-row flex-column">
          <div class="mb-xl-0 pb-3">
            <div class="d-flex svg-illustration align-items-center gap-2 mb-4">
              <span class="app-brand-logo demo">
<span style="color:var(--bs-primary);">
  <svg width="268" height="150" viewBox="0 0 38 20" fill="none" xmlns="http://www.w3.org/2000/svg">
    <path d="M30.0944 2.22569C29.0511 0.444187 26.7508 -0.172113 24.9566 0.849138C23.1623 1.87039 22.5536 4.14247 23.5969 5.92397L30.5368 17.7743C31.5801 19.5558 33.8804 20.1721 35.6746 19.1509C37.4689 18.1296 38.0776 15.8575 37.0343 14.076L30.0944 2.22569Z" fill="currentColor" />
    <path d="M30.171 2.22569C29.1277 0.444187 26.8274 -0.172113 25.0332 0.849138C23.2389 1.87039 22.6302 4.14247 23.6735 5.92397L30.6134 17.7743C31.6567 19.5558 33.957 20.1721 35.7512 19.1509C37.5455 18.1296 38.1542 15.8575 37.1109 14.076L30.171 2.22569Z" fill="url(#paint0_linear_2989_100980)" fill-opacity="0.4" />
    <path d="M22.9676 2.22569C24.0109 0.444187 26.3112 -0.172113 28.1054 0.849138C29.8996 1.87039 30.5084 4.14247 29.4651 5.92397L22.5251 17.7743C21.4818 19.5558 19.1816 20.1721 17.3873 19.1509C15.5931 18.1296 14.9843 15.8575 16.0276 14.076L22.9676 2.22569Z" fill="currentColor" />
    <path d="M14.9558 2.22569C13.9125 0.444187 11.6122 -0.172113 9.818 0.849138C8.02377 1.87039 7.41502 4.14247 8.45833 5.92397L15.3983 17.7743C16.4416 19.5558 18.7418 20.1721 20.5361 19.1509C22.3303 18.1296 22.9391 15.8575 21.8958 14.076L14.9558 2.22569Z" fill="currentColor" />
    <path d="M14.9558 2.22569C13.9125 0.444187 11.6122 -0.172113 9.818 0.849138C8.02377 1.87039 7.41502 4.14247 8.45833 5.92397L15.3983 17.7743C16.4416 19.5558 18.7418 20.1721 20.5361 19.1509C22.3303 18.1296 22.9391 15.8575 21.8958 14.076L14.9558 2.22569Z" fill="url(#paint1_linear_2989_100980)" fill-opacity="0.4" />
    <path d="M7.82901 2.22569C8.87231 0.444187 11.1726 -0.172113 12.9668 0.849138C14.7611 1.87039 15.3698 4.14247 14.3265 5.92397L7.38656 17.7743C6.34325 19.5558 4.04298 20.1721 2.24875 19.1509C0.454514 18.1296 -0.154233 15.8575 0.88907 14.076L7.82901 2.22569Z" fill="currentColor" />
    <defs>
      <linearGradient id="paint0_linear_2989_100980" x1="5.36642" y1="0.849138" x2="10.532" y2="24.104" gradientUnits="userSpaceOnUse">
        <stop offset="0" stop-opacity="1" />
        <stop offset="1" stop-opacity="0" />
      </linearGradient>
      <linearGradient id="paint1_linear_2989_100980" x1="5.19475" y1="0.849139" x2="10.3357" y2="24.1155" gradientUnits="userSpaceOnUse">
        <stop offset="0" stop-opacity="1" />
        <stop offset="1" stop-opacity="0" />
      </linearGradient>
    </defs>
  </svg>
</span>
</span>
              <span class="h4 mb-0 app-brand-text fw-bold">Funzi Wallet</span>
            </div>
            <p class="mb-1">Office 149, 450 South Brand Brooklyn</p>
            <p class="mb-1">San Diego County, CA 91905, USA</p>
            <p class="mb-0">+1 (123) 456 7891, +44 (876) 543 2198</p>
          </div>
          <div>
          <h4 class="fw-medium">INVOICE No.#{{$sent_schoolfees['0']['transfer_invoice']}}</h4>
    <div class="mb-2">
      <span class="text-muted">Invoice Date:</span>
      <span class="fw-medium">{{$sent_schoolfees['0']['transfer_date']}}</span>
    </div>
    <div>
      <span class="text-muted">Print Date:</span>
      <span class="fw-medium">{{ date("d F Y") }}</span>
    </div>
          </div>
        </div>
      </div>


      <hr class="my-4" />


<div class="row">
  <div class="col-12">

    <span><b>SCHOOLFEES TRANSFERED AMOUNT REPORT</b></span>
  </div>
</div>


      <hr class="my-4" />
      <div class="card-body">
        <div class="d-flex justify-content-between flex-wrap">
          <div class="my-3">
          <h6>Invoice To:</h6>
    <table>
      <tbody>
        <tr>
          <td class="pe-3">School:</td>
          <td class="fw-medium">{{$sent_schoolfees['0']['school']['name']}}</td>
        </tr>
        <tr>
          <td class="pe-3">School ID:</td>
          <td>{{$sent_schoolfees['0']['school']['school_id_no']}}</td>
        </tr>
        <tr>
          <td class="pe-3">Tel 1:</td>
          <td>{{$sent_schoolfees['0']['school']['school_tel1']}}</td>
        </tr>
        <tr>
          <td class="pe-3">Tel 2:</td>
          <td>{{$sent_schoolfees['0']['school']['school_tel2']}}</td>
        </tr>
        <tr>
          <td class="pe-3">Address:</td>
          <td>{{$sent_schoolfees['0']['school']['school_address']}}</td>
        </tr>
      </tbody>
    </table>
          </div>
          <div class="my-3">
          <h6>Transfer Details:</h6>
    <table>
      <tbody>
      <tr>
          <td class="pe-3">For Deposit Date:</td>
          <td>{{$sent_schoolfees['0']['transfer_date']}}</td>
        </tr>
        <tr>
          <td class="pe-3">Total Deposit:</td>
          <td class="fw-medium">ugx {{ ($schoolfees_details) }}</td>
        </tr>
        <tr>
          <td class="pe-3">Total Transfered:</td>
          <td class="fw-medium">ugx {{ ($sent_amount_details) }}</td>
        </tr>
        <tr>
          <td class="pe-3">Balance:</td>
          <td>ugx {{ ($transfer_bal) }}</td>
        </tr>


      </tbody>
    </table>
          </div>
        </div>
      </div>
      <div class="table-responsive">
        <table class="table table-borderless m-0">
          <thead class="border-top">
            <tr>
        <th>Sent BY</th>
        <th>Sent Date</th>
        <th>Time Sent </th>
        <th>Amount Sent </th>
            </tr>
          </thead>
          @foreach($sent_schoolfees_details as $key => $value )
    <tbody>

      <tr>
      <td> {{ $value['sender']['name']}}</td>
      <td> {{ $value->sent_date}}</td>
      <td> {{ $value->sent_time}}</td>
      <td>{{ $value->amount_sent}}</td>
      </tr>

    </tbody>
    @endforeach
        </table>
      </div>


    </div>
  </div>
  <!-- /Invoice -->

  <!-- Invoice Actions -->
  <div class="col-xl-3 col-md-4 col-12 invoice-actions">
    <div class="card">
      <div class="card-body">
        <a href="{{route('report.schoolsfees_transfer.sent.print',$sent_schoolfees['0']['transfer_invoice'])}}"  target="_blank" class="btn btn-success d-grid w-100 mb-3">
          <span class="d-flex align-items-center justify-content-center text-nowrap"><i class="mdi mdi-printer-outline scaleX-n1-rtl me-1"></i>Print Invoice</span>
</a>


      </div>
    </div>
  </div>
  <!-- /Invoice Actions -->
</div>


          </div>
          <!-- / Content -->

          

        
                   
                    
@endsection

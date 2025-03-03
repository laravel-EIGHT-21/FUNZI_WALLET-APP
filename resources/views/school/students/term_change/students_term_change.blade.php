
@extends('school.body.admin_master')
@section('content')
        


@section('title')

Students Term Change

@endsection





 
        <!-- Content -->
        
        <div class="container-xxl flex-grow-1 container-p-y">
            
            

            <h4 class="py-3 mb-4">
              <span class="text-muted fw-light"><a href="{{route('dashboard')}}"> Promotion </a> / View /</span> Students Term Change
            </h4>


<br/>


        
            <div class="row">
                        <div class="col-12">

                        <div class="col-xl-12">
    <h4 class="text">Students` Term Change</h4>
    <div class="nav-align-top mb-4">


        <div class="col-xl-12">

    <div class="card mb-6">

      <div class="card-body">

          <div class="row">
  <div class="col-xl">
    <div class="card mb-4">
      <div class="card-header d-flex justify-content-between align-items-center">

      </div>
      <div class="card-body">
      <form method="GET" action="{{ route('students.term.class.wise') }}">
  @csrf
  <div class="col-md-6">
  <div class="form-floating form-floating-outline">
                      <select id="studentclass1" name="student_class" class="select2 form-select form-select-lg" data-allow-clear="true" required>
                <option value="">Select Class</option>
                <option value="SeniorOne">Senior One</option>
                <option value="SeniorTwo">Senior Two</option>
                <option value="SeniorThree">Senior Three</option>
                <option value="SeniorFour">Senior Four</option>
                <option value="SeniorFive">Senior Five</option>
                <option value="SeniorSix">Senior Six</option>
                <option value="PrimaryOne">Primary One</option>
                <option value="PrimaryTwo">Primary Two</option>
                <option value="PrimaryThree">Primary Three</option>
                <option value="PrimaryFour">Primary Four</option>
                <option value="PrimaryFive">Primary Five</option>
                <option value="PrimarySix">Primary Six</option>
                <option value="PrimarySeven">Primary Seven</option>
                <option value="TopClass">Top Class</option>
                <option value="MiddleClass">Middle Class</option>
                <option value="BabyClass">Baby Class</option>
                <option value="PrePrimary">Pre-Primary</option>
 
              </select>
              <label for="studentclass1">Class</label>
                      </div>
  </div>
  <div class="col-md-3" style="padding-top: 10px;">

<button type="submit" class="btn btn-primary">Submit</button>


<a href="{{ route('students.term.change')}}" class="btn rounded-pill btn-warning" style="float:right;">Reset</a>

</div>

</form>
      </div>


    </div>
  </div>

</div>

      </div>
    </div>
  </div>


  
<br/><br/>
    
    <div class="col-xl-12">
    <h4 class="text">Change Students Term</h4>
  
  <div class="nav-align-top mb-2">


  
  <div class="card">
    
<form method="post" action="{{ route('students.term.change.store') }}">
			@csrf
                          <div class="card-body">

                            
<div class="row"> 
    

    <div class="col-md-4">
    <div class="form-floating form-floating-outline">
                      <select id="studentclass" name="student_class" class="select2 form-select" data-allow-clear="true" required>
                <option value="">Select Class</option>
                <option value="SeniorOne">Senior One</option>
                <option value="SeniorTwo">Senior Two</option>
                <option value="SeniorThree">Senior Three</option>
                <option value="SeniorFour">Senior Four</option>
                <option value="SeniorFive">Senior Five</option>
                <option value="SeniorSix">Senior Six</option>
                <option value="PrimaryOne">Primary One</option>
                <option value="PrimaryTwo">Primary Two</option>
                <option value="PrimaryThree">Primary Three</option>
                <option value="PrimaryFour">Primary Four</option>
                <option value="PrimaryFive">Primary Five</option>
                <option value="PrimarySix">Primary Six</option>
                <option value="PrimarySeven">Primary Seven</option>
                <option value="TopClass">Top Class</option>
                <option value="MiddleClass">Middle Class</option>
                <option value="BabyClass">Baby Class</option>
                <option value="PrePrimary">Pre-Primary</option>
 
              </select>
              <label for="studentclass">Student Class</label>
                      </div>
    </div> <!-- end col md 4 -->
    

    <div class="col-md-4">
    <div class="form-floating form-floating-outline">
    <select id="term_id" name="term_id" required class="select2 form-select form-select-lg" data-allow-clear="true">
            <option value="">Select Term</option>
            @foreach ($terms as $term)
            <option value="{{ $term->id }}">{{ $term->name }}</option>
            @endforeach

            </select>
            <label for="term_id">Current School Terms</label>
                      </div>
    </div> <!-- end col md 4 -->




    <div class="col-md-4">
    <div class="form-floating form-floating-outline">
    <select id="new_term_id" name="new_term_id" required class="select2 form-select form-select-lg" data-allow-clear="true">
            <option value="">Select Term</option>
            @foreach ($terms as $term)
            <option value="{{ $term->id }}">{{ $term->name }}</option>
            @endforeach

            </select>
            <label for="new_term_id">New School Terms</label>
                      </div>
    </div> <!-- end col md 4 -->
    
    
</div> 

<br/>
                                      
                          <div class="table-responsive">
                          <table class="table border table-bordered display text-nowrap">
                          <thead>
                          <!-- start row -->
                          <tr>
                          <th>SL</th>
                        <th>Wallet ID</th>
                        <th>Name</th>
                        <th>Class</th>
                        <th>Term</th>
                        <th>Gender</th>
                        <th>Select</th>
                          </thead>
                          <tbody>
                          @foreach($students as $key => $value )
                          <tr>
  
<input type="hidden" name="id[]" value="{{ $value->id }}"> 
<td>{{ $key+1 }}</td>
<td> {{ $value->student_code }}</td>
<td> {{ $value->name}}</td>	
<td> {{ $value->student_class }}</td>	
<td> {{ $value['term']['name'] }}</td>
<td> {{ $value->gender }}</td>	

<td>  <input type="checkbox" name="checkmanage[]" id="{{$key}}" value="{{$key}}" checked="checked">
<label for="{{$key}}"></label>  </td>


                          </tr>
                          @endforeach
                          </tbody>
  
                          </table>
                          </div>
  
  
                          </div>

&nbsp;

                          <button type="submit" class="btn btn-success mb-2">Change Term</button>
                          &nbsp;

                                    </form>

                          </div>
  
  
  </div>
  
  
  </div>
  


  


    </div>
  </div>


                        </div>
                        </div>




                        </div>
                        <!--/ Content -->





@endsection
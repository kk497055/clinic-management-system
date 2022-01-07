@extends('admin.admin_master')
@section('admin')
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<div class="content-wrapper">
    <div class="container-full">
      <!-- Content Header (Page header) -->
      

      <!-- Main content -->
      <section class="content">

        <div class="box">
			<div class="box-header with-border">
			  <h4 class="box-title">Complete Appointment</h4>
			  <h6 class="box-subtitle">Record patient appointments <a class="text-warning" href="http://reactiveraven.github.io/jqBootstrapValidation/">Seek Help </a></h6>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
			  <div class="row">
				<div class="col">
					<form method="POST" action="{{route('appointments.complete.store', $editData->id)}}">
                        @csrf
					  <div class="row">
						<div class="col-12">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <h5>Appointment Was For: <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="name" id="name" class="form-control" required value="{{$editData->title}}"> </div>
                                        
                                    </div>
                                </div> 
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <h5>Mobile <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="mobile" id="mobile" class="form-control" required value="{{$editData->mobile}}"> </div>
                                        
                                    </div>
                                </div>   
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <h5>Branch <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <select name="branch_id" id="branch_id" required class="form-control">
                                                <option value="">Select Branch</option>
                                                @foreach($branches as $branch)
                                                <option value="{{$branch->id}}" {{($editData->branch_id == $branch->id?"selected":"")}}>{{$branch->branch_name}}</option>
                                                @endforeach
                                                
                                                
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <h5>Appointment Priority <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <select name="service_category" id="service_category" required class="form-control">
                                                <option value="">Select Priority</option>
                                                @foreach($service_priorities as $service_priority)
                                                <option value="{{$service_priority->id}}" {{$editData->service_category == $service_priority->id?"selected":""}}>{{$service_priority->name}}</option>
                                                @endforeach
                                                
                                            </select>
                                        </div>
                                    </div>
                                </div> 
                            </div> 
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <h5>Appointment Date <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="datetime" name="appointment_date" id="appointment_date" class="form-control" required value="{{$editData->start}}"> </div>
                                        
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <h5>Link Patient MR No <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <select name="patient_id" id="patient_id" required class="form-control">
                                                <option value="">Select MR NO</option>
                                                @foreach($patients as $patient)
                                                <option value="{{$patient->id}}">{{$patient->mr_no." - ".$patient->name." - ".$patient->mobile}}</option>
                                                @endforeach
                                                
                                            </select>
                                        </div>
                                        <br />
                                        <a href="={{route('patients.add')}}" style="float: right;" data-toggle="modal" class="btn btn-rounded btn-primary mb-5">
                                            Register New Patient
                                        </a>
                                    </div>
                                </div> 
                            </div> 
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <h5>Notes <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <textarea name="notes" id="notes" class="form-control" required>{{$editData->notes}}</textarea> </div>
                                        
                                    </div>
                                </div>
                            </div> 
                            <br /><br />

                            <div class="row">
                                <div class="box box-solid box-inverse box-info">
                                    <div class="box-header with-border">
                                      <h4 class="box-title">Visit <strong>Details</strong></h4>
                                      
                                    </div>
                    
                                    <div class="box-body">
                                      <p>Please record patient's visit related status and findings below</p>
                                      <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <h5>Chief Complaint <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <textarea name="chief_complaint" id="chief_complaint" class="form-control" required>{{$editData->notes}}</textarea> </div>
                                                
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <h5>Diagnosis <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <textarea name="diagnosis" id="diagnosis" class="form-control" required></textarea> </div>
                                                
                                            </div>
                                        </div>
                                    </div> 
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <h5>Recommendation <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <textarea name="recommendation" id="recommendation" class="form-control" required></textarea> </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                    
                                  </div>
                            </div>
                            <div class="row">
                                <div class="box box-solid box-inverse box-info">
                                    <div class="box-header with-border">
                                      <h4 class="box-title">Service <strong>Charges</strong></h4>
                                      
                                    </div>
                    
                                    <div class="box-body">
                                      <p>Please enter services performed</p>
                                      <div class="add_item">
                                      <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <h5>Services Offered <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <select name="service_category_id[]" id="service_category_id" required class="form-control">
                                                        <option value="">Select Services</option>
                                                        @foreach ($service_categories as $service_category )
                                                        <option value="{{$service_category->id}}"> {{$service_category['service_fee_main']['name']." PKR.".$service_category->service_amount}}</option>
                                                        @endforeach
                                                        
                                                    </select>
                                                </div> <!-- end select -->
                                            </div> <!-- end form group -->
                                        </div>
                                        
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <h5>Quantity <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" name="quantity[]" id="quantity" class="form-control" required> </div>
                                                @error('quantity')
                                                    <span class="text-danger">
                                                        {{$message}}
                                                    </span>
                                                @enderror
                                            </div> <!-- end form group -->
                                        </div> <!-- end of col md -->
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <h5>Amount <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" name="amount[]" id="amount" class="form-control" required> </div>
                                                @error('amount')
                                                    <span class="text-danger">
                                                        {{$message}}
                                                    </span>
                                                @enderror
                                            </div> <!-- end form group -->
                                        </div> <!-- end of col md -->
                                        <div class="col-md-2" style="padding-top:25px;">
                                            <span class="btn btn-success addeventmore"><i class="fa fa-plus-circle"></i></span>
                                        <!--    <span class="btn btn-danger addeventmore"><i class="fa fa-minus-circle"></i></span> -->
                                        </div>
                                    </div> 
                                </div>
                                    </div>
                                    
                                  </div>
                            </div>
                                   
							
						</div>
					  </div>
						
					
						<div class="text-xs-right">
							<input type="submit" class="btn btn-rounded btn-info mb-5" value="Complete Appointment">
						</div>
					</form>

				</div>
				<!-- /.col -->
			  </div>
			  <!-- /.row -->
                         
            
            
            
            </div>
			<!-- /.box-body -->
		  </div>

        </section>
        <!-- /.content -->
        
      
      </div>
  </div>

  <div style="visibility: hidden;">
    <div class="extra-row" id="extra-row">
     <div class="delete-extra-row" id="delete-extra-row">

        <div class="form-row">
      
                                
                <div class="col-md-3">
                    <div class="form-group">
                        <h5>Services Offered <span class="text-danger">*</span></h5>
                        <div class="controls">
                            <select name="service_category_id[]" id="service_category_id" required class="form-control">
                                <option value="">Select Services</option>
                                @foreach ($service_categories as $service_category )
                                <option value="{{$service_category->id}}"> {{$service_category['service_fee_main']['name']." PKR.".$service_category->service_amount}}</option>
                                @endforeach
                                
                            </select>
                        </div> <!-- end select -->
                    </div> <!-- end form group -->
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <h5>Quantity <span class="text-danger">*</span></h5>
                        <div class="controls">
                            <input type="text" name="quantity[]" id="quantity" class="form-control" required> </div>
                        @error('quantity')
                            <span class="text-danger">
                                {{$message}}
                            </span>
                        @enderror
                    </div> <!-- end form group -->
                </div> 
                <div class="col-md-2">
                    <div class="form-group">
                        <h5>Amount <span class="text-danger">*</span></h5>
                        <div class="controls">
                            <input type="text" name="amount[]" id="amount" class="form-control" required> </div>
                        @error('amount')
                            <span class="text-danger">
                                {{$message}}
                            </span>
                        @enderror
                    </div> <!-- end form group -->
                </div> <!-- end of col md -->
                
                
                
                <div class="col-md-2" style="padding-top:25px;">
                    <span class="btn btn-success addeventmore"><i class="fa fa-plus-circle"></i></span>
                    <span class="btn btn-danger removeeventmore"><i class="fa fa-minus-circle"></i></span>
                </div>
            </div> 

               
        
        </div>
        </div>
    </div>
    </div>
</div>

  <script type="text/javascript">
  $(document).ready(function(){
      var counter = 0;
  $(document).on("click", ".addeventmore", function(){
    var new_extra_row = $("#extra-row").html();
    $(this).closest(".add_item").append(new_extra_row);
    counter++;
  });
  $(document).on("click", ".removeeventmore", function(){
    $(this).closest(".delete-extra-row").remove();
    counter -= 1;
  });

});
  
  </script>
    
  @endsection
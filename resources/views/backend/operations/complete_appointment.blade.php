@extends('admin.admin_master')
@section('admin')

<div class="content-wrapper">
    <div class="container-full">
      <!-- Content Header (Page header) -->
      

      <!-- Main content -->
      <section class="content">

        <div class="box">
			<div class="box-header with-border">
			  <h4 class="box-title">Complete Appointments</h4>
			  <h6 class="box-subtitle">Schedule patient appointments <a class="text-warning" href="http://reactiveraven.github.io/jqBootstrapValidation/">Seek Help </a></h6>
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
                                                @foreach($service_categories as $service_category)
                                                <option value="{{$service_category->id}}" {{$editData->service_category == $service_category->id?"selected":""}}>{{$service_category->name}}</option>
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
  
  
  @endsection
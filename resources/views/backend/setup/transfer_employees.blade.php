@extends('admin.admin_master')
@section('admin')

<div class="content-wrapper">
    <div class="container-full">
      <!-- Content Header (Page header) -->
      

      <!-- Main content -->
      <section class="content">

        <div class="box">
			<div class="box-header with-border">
			  <h4 class="box-title">Transfer Employees</h4>
			  <h6 class="box-subtitle">Add service branches in the system <a class="text-warning" href="http://reactiveraven.github.io/jqBootstrapValidation/">Seek Help </a></h6>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
			  <div class="row">
				<div class="col">
					<form method="POST" action="{{route('employeestransfer.store')}}">
                        @csrf
					  <div class="row">
						<div class="col-12">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                      <h5>Branch Name <span class="text-danger">*</span></h5>
                                      <div class="controls">
                                          <select name="branch_id" id="branch_id" required class="form-control">
                                              <option value="">Select Branch</option>
                                              @foreach ($branches as $branch)
                                              <option value="{{$branch->id}}">{{$branch->branch_name}}</option>
                                              @endforeach
                                              
                                              
                                          </select>
                                      </div>
                                  </div>
                                </div>
                               
                                  
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                      <h5>Employee Name <span class="text-danger">*</span></h5>
                                      <div class="controls">
                                          <select name="employee_id" id="employee_id" required class="form-control">
                                              <option value="">Select Employee</option>
                                              @foreach ($employees as $employee)
                                              <option value="{{$employee->id}}">{{$employee->name}}</option>
                                              @endforeach
                                              
                                              
                                          </select>
                                      </div>
                                  </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <h5>Date <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="date" name="transfer_date" id="transfer_date" class="form-control" required> </div>
                                        
                                    </div>
                                </div> 
                            </div>
                            
						</div>
					  </div>
						
					
						<div class="text-xs-right">
							<input type="submit" class="btn btn-rounded btn-info mb-5" value="Submit">
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
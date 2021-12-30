@extends('admin.admin_master')
@section('admin')

<div class="content-wrapper">
    <div class="container-full">
      <!-- Content Header (Page header) -->
      

      <!-- Main content -->
      <section class="content">

        <div class="box">
			<div class="box-header with-border">
			  <h4 class="box-title">Add New Employees</h4>
			  <h6 class="box-subtitle">Add new employees to the system <a class="text-warning" href="http://reactiveraven.github.io/jqBootstrapValidation/">Seek Help </a></h6>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
			  <div class="row">
				<div class="col">
					<form method="POST" action="{{route('employees.store')}}">
                        @csrf
					  <div class="row">
						<div class="col-12">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <h5>Full Name <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="name" id="name" class="form-control" required> </div>
                                        
                                    </div>
                                </div> 
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <h5>User Type <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <select name="usertype" id="usertype" required class="form-control">
                                                <option value="">Select User Type</option>
                                                <option value="Admin">Admin</option>
                                                <option value="User">User</option>
                                                
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                  <div class="form-group">
                                    <h5>User Role <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <select name="userrole" id="userrole" required class="form-control">
                                            <option value="">Select User Role</option>
                                            <option value="Consultant">Consultant</option>
                                            <option value="Employee">Employee</option>
                                            <option value="Doctor">Doctor</option>
                                            
                                            
                                        </select>
                                    </div>
                                </div>
                              </div>

                            </div>
                            <div class="row">
                              <div class="col-md-3">
                                  <div class="form-group">
                                      <h5>Email <span class="text-danger">*</span></h5>
                                      <div class="controls">
                                          <input type="email" name="email" id="email" class="form-control" required> </div>
                                      
                                  </div>
                              </div> 
                              <div class="col-md-3">
                                <div class="form-group">
                                    <h5>Mother Name <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="mother_name" id="mother_name" class="form-control" required> </div>
                                    
                                </div>
                            </div> 
                              <!-- Another Field can come here -->
                            

                          </div>
                          <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <h5>Mobile <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="mobile" id="mobile" class="form-control" required> </div>
                                    
                                </div>
                            </div> 
                            <div class="col-md-3">
                              <div class="form-group">
                                  <h5>Address <span class="text-danger">*</span></h5>
                                  <div class="controls">
                                      <input type="text" name="address" id="address" class="form-control" required> </div>
                                  
                              </div>
                          </div> 
                            
                          

                        </div>
                        <div class="row">
                          <div class="col-md-3">
                              <div class="form-group">
                                  <h5>Join Date <span class="text-danger">*</span></h5>
                                  <div class="controls">
                                      <input type="date" name="join_date" id="join_date" class="form-control" required> </div>
                                  
                              </div>
                          </div> 
                          <div class="col-md-3">
                            <div class="form-group">
                                <h5>Date of Birth <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="date" name="dob" id="dob" class="form-control" required> </div>
                                
                            </div>
                        </div> 
                          
                          
                          <div class="col-md-3">
                            <div class="form-group">
                              <h5>Gender <span class="text-danger">*</span></h5>
                              <div class="controls">
                                  <select name="gender" id="gender" required class="form-control">
                                      <option value="">Select Gender</option>
                                      <option value="Male">Male</option>
                                      <option value="Female">Female</option>
                                  </select>
                              </div>
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
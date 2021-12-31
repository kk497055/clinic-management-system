@extends('admin.admin_master')
@section('admin')

<div class="content-wrapper">
    <div class="container-full">
      <!-- Content Header (Page header) -->
      

      <!-- Main content -->
      <section class="content">

        <div class="box">
			<div class="box-header with-border">
			  <h4 class="box-title">Add New Employee Salaries</h4>
			  <h6 class="box-subtitle">Add Salaries in the system <a class="text-warning" href="http://reactiveraven.github.io/jqBootstrapValidation/">Seek Help </a></h6>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
			  <div class="row">
				<div class="col">
					<form method="POST" action="{{route('salary.incrementstore', $allData->id)}}">
                        @csrf
					  <div class="row">
						<div class="col-12">
                            <div class="row">
                              
                                <div class="col-md-3">
                                  <div class="form-group">
                                      <h5>Increment <span class="text-danger">*</span></h5>
                                      <div class="controls">
                                          <input type="text" name="increment_salary" id="increment_salary" class="form-control" required> </div>
                                      
                                  </div>
                              </div> 
                              
                              <!-- Another Field can come here -->
                            

                          </div>
                          
                            
                          

                        
                        <div class="row">
                          <div class="col-md-3">
                              <div class="form-group">
                                  <h5>Effective Date <span class="text-danger">*</span></h5>
                                  <div class="controls">
                                      <input type="date" name="effective_date" id="effective_date" class="form-control" required> </div>
                                  
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
@extends('admin.admin_master')
@section('admin')

<div class="content-wrapper">
    <div class="container-full">
      <!-- Content Header (Page header) -->
      

      <!-- Main content -->
      <section class="content">

        <div class="box">
			<div class="box-header with-border">
			  <h4 class="box-title">Add New Branch</h4>
			  <h6 class="box-subtitle">Add service branches in the system <a class="text-warning" href="http://reactiveraven.github.io/jqBootstrapValidation/">Seek Help </a></h6>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
			  <div class="row">
				<div class="col">
					<form method="POST" action="{{route('branch.store')}}">
                        @csrf
					  <div class="row">
						<div class="col-12">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <h5>Branch Name <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="branch_name" id="branch_name" class="form-control" required> </div>
                                        @error('branch_name')
                                            <span class="text-danger">
                                                {{$message}}
                                            </span>
                                        @enderror
                                    </div>
                                </div> 
                               
                                  
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <h5>Branch Address <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="branch_address" id="branch_address" class="form-control" required> </div>
                                        @error('branch_address')
                                            <span class="text-danger">
                                                {{$message}}
                                            </span>
                                        @enderror
                                    </div>
                                </div> 
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                      <h5>City <span class="text-danger">*</span></h5>
                                      <div class="controls">
                                          <select name="city_id" id="city_id" required class="form-control">
                                              <option value="">Select City</option>
                                              @foreach ($cities as $city)
                                              <option value="{{$city->city_id}}">{{$city->city_name}}</option>
                                              @endforeach
                                              
                                              
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
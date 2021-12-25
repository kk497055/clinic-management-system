@extends('admin.admin_master')
@section('admin')

<div class="content-wrapper">
    <div class="container-full">
      <!-- Content Header (Page header) -->
      

      <!-- Main content -->
      <section class="content">

        <div class="box">
			<div class="box-header with-border">
			  <h4 class="box-title">Add New Service Fee</h4>
			  <h6 class="box-subtitle">Add service fee <a class="text-warning" href="http://reactiveraven.github.io/jqBootstrapValidation/">Seek Help </a></h6>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
			  <div class="row">
				<div class="col">
					<form method="POST" action="{{route('servicesfeeamount.store')}}">
                        @csrf
					  <div class="row">
						<div class="col-12">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <h5>Select Service Category <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <select name="service_category_id" id="service_category_id" required class="form-control">
                                                <option value="">Select Service Category</option>
                                                @foreach ($service_category as $category )
                                                    <option value="{{$category->id}}"> {{$category->name}}</option>
                                                @endforeach
                                                
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                    <div class="col-md-6">
                                    <div class="form-group">
                                        <h5>Select Service <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <select name="service_id" id="service_id" required class="form-control">
                                                <option value="">Select Service</option>
                                                @foreach ($service as $serv )
                                                <option value="{{$serv->id}}"> {{$serv->name}}</option>
                                                @endforeach
                                                
                                            </select>
                                        </div>
                                    </div>
                                </div> 
                                
                                  
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <h5>Fee Amount <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="service_amount" id="service_amount" class="form-control" required> </div>
                                        @error('service_amount')
                                            <span class="text-danger">
                                                {{$message}}
                                            </span>
                                        @enderror
                                    </div>
                                </div> 
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <h5>Quantity <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="quantity" id="quantity" class="form-control" required> </div>
                                        @error('quantity')
                                            <span class="text-danger">
                                                {{$message}}
                                            </span>
                                        @enderror
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
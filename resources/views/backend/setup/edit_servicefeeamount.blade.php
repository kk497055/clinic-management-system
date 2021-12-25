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
			  <h4 class="box-title">Edit Service Fee</h4>
			  <h6 class="box-subtitle">Edit service fee in the system <a class="text-warning" href="http://reactiveraven.github.io/jqBootstrapValidation/">Seek Help </a></h6>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
			  <div class="row">
				<div class="col">
					<form method="POST" action="{{route('servicesfeeamount.update', $editData[0]->service_category_id)}}">
                        @csrf
					  <div class="row">
						<div class="col-12">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <h5>Select Service Category <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <select name="service_category_id" id="service_category_id" required class="form-control">
                                                <option value="" selected="">Select Service Category</option>
                                                @foreach ($service_category as $category )
                                                    <option value="{{$category->id}}" {{($editData['0']->service_category_id == $category->id)? "selected":""}}> {{$category->name}}</option>
                                                @endforeach
                                                
                                            </select>
                                        </div>
                                    </div>
                                </div> 
                                
                            </div>
                        <div class="add_item">

                            @foreach($editData as $edit)
                            <div class="delete-extra-row" id="delete-extra-row">
                            <div class="row">    
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <h5>Select Service <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <select name="service_id[]" id="service_id" required class="form-control">
                                                <option value="">Select Service</option>
                                                @foreach ($service as $serv )
                                                <option value="{{$serv->id}}" {{($edit->service_id == $serv->id)?"selected":""}}> {{$serv->name}}</option>
                                                @endforeach
                                                
                                            </select>
                                        </div> <!-- end select -->
                                    </div> <!-- end form group -->
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <h5>Fee Amount <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                  <input type="text" name="service_amount[]" id="service_amount" class="form-control" required value="{{$edit->service_amount}}"> </div>
                                                                             @error('service_amount')
                                                                             <span class="text-danger">
                                                                                 {{$message}}
                                                                             </span>
                                                                             @enderror
                                    </div> <!-- end form group -->
                                </div> 
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <h5>Quantity <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="quantity[]" id="quantity" class="form-control" required value="{{$edit->quantity}}"> </div>
                                        @error('quantity')
                                            <span class="text-danger">
                                                {{$message}}
                                            </span>
                                        @enderror
                                    </div> <!-- end form group -->
                                </div> 
                                <div class="col-md-3" style="padding-top:25px;">
                                    <span class="btn btn-success addeventmore"><i class="fa fa-plus-circle"></i></span>
                                   <span class="btn btn-danger removeeventmore"><i class="fa fa-minus-circle"></i></span> 
                                </div>
                            </div> 

                        </div>       
                            @endforeach	

						</div>
					  </div>
                      
                    </div> <!-- End add_item -->
						
					
						<div class="text-xs-right">
							<input type="submit" class="btn btn-rounded btn-info mb-5" value="Update">
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
                    <h5>Select Service <span class="text-danger">*</span></h5>
                    <div class="controls">
                        <select name="service_id[]" id="service_id" required class="form-control">
                            <option value="">Select Service</option>
                            @foreach ($service as $serv )
                            <option value="{{$serv->id}}"> {{$serv->name}}</option>
                            @endforeach
                            
                        </select>
                    </div> <!-- end select -->
                </div> <!-- end form group -->
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <h5>Fee Amount <span class="text-danger">*</span></h5>
                            <div class="controls">
                              <input type="text" name="service_amount[]" id="service_amount" class="form-control" required> </div>
                                                         @error('service_amount')
                                                         <span class="text-danger">
                                                             {{$message}}
                                                         </span>
                                                         @enderror
                </div> <!-- end form group -->
            </div> 
            <div class="col-md-3">
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
            <div class="col-md-3" style="padding-top:25px;">
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
  $(document).on("click", ".addeventmore", function(){
    var new_extra_row = $("#extra-row").html();
    $(this).closest(".add_item").append(new_extra_row);
    counter++;
  });
  $(document).on("click", ".removeeventmore", function(){
    $(this).closest(".delete-extra-row").remove();
    counter -= 1;
  });
  </script>



  @endsection
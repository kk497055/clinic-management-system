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
			  <h4 class="box-title">Purchase Inventory</h4>
			  <h6 class="box-subtitle">Enter new PO for the Inventory <a class="text-warning" href="">Seek Help </a></h6>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
			  <div class="row">
				<div class="col">
					<form method="POST" action="{{route('inventorypurchase.store')}}">
                        @csrf
					  <div class="row">
						<div class="col-12">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <h5>Select Supplier <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <select name="supplier_id" id="supplier_id" required class="form-control">
                                                <option value="">Select Supplier</option>
                                                @foreach ($suppliers as $supplier )
                                                    <option value="{{$supplier->id}}"> {{$supplier->name}}</option>
                                                @endforeach
                                                
                                            </select>
                                        </div>
                                    </div>
                                </div> 
                                
                            </div>
                           
                                
                            
                        <div class="add_item">
                            <div class="row">
                                
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <h5>Inventory <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <select name="inventory_id[]" id="inventory_id" required class="form-control">
                                                <option value="">Select Inventory</option>
                                                @foreach ($inventories as $inventory )
                                                <option value="{{$inventory->id}}"> {{$inventory->item}}</option>
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
                                
                                
                                <div class="col-md-2" style="padding-top:25px;">
                                    <span class="btn btn-success addeventmore"><i class="fa fa-plus-circle"></i></span>
                                <!--    <span class="btn btn-danger addeventmore"><i class="fa fa-minus-circle"></i></span> -->
                                </div>
                            </div> 

                                   
							
						</div>
					  </div>
                    </div> <!-- End add_item -->
						
					
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

  <div style="visibility: hidden;">
    <div class="extra-row" id="extra-row">
     <div class="delete-extra-row" id="delete-extra-row">

        <div class="form-row">
      
                                
                <div class="col-md-3">
                    <div class="form-group">
                        <h5>Inventory <span class="text-danger">*</span></h5>
                        <div class="controls">
                            <select name="inventory_id[]" id="inventory_id" required class="form-control">
                                <option value="">Select Inventory</option>
                                @foreach ($inventories as $inventory )
                                <option value="{{$inventory->id}}"> {{$inventory->item." PKR.".$inventory->unit_price}}</option>
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
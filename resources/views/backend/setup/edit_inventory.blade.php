@extends('admin.admin_master')
@section('admin')

<div class="content-wrapper">
    <div class="container-full">
      <!-- Content Header (Page header) -->
      

      <!-- Main content -->
      <section class="content">

        <div class="box">
			<div class="box-header with-border">
			  <h4 class="box-title">Add New Inventory Items</h4>
			  <h6 class="box-subtitle">Add new Inventory items in the system <a class="text-warning" href="">Seek Help </a></h6>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
			  <div class="row">
				<div class="col">
					<form method="POST" action="{{route('inventory.update', $editData->id)}}">
                        @csrf
					  <div class="row">
						<div class="col-12">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <h5>Item Name <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="name" id="name" class="form-control" required value="{{$editData->item}}"> </div>
                                        
                                    </div>
                                </div> 
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <h5>Description <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="description" id="description" class="form-control" required value="{{$editData->description}}"> </div>
                                    </div>
                                </div>   
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <h5>Packing <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="packing" id="packing" class="form-control" required value="{{$editData->packing}}"> </div>
                                        
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <h5>Opening Balance</h5>
                                        <div class="controls">
                                            <input type="text" name="opening_balance" id="opening_balance" class="form-control" required value="{{$editData->opening_balance}}"> </div>
                                        
                                    </div>
                                </div> 
                            </div> 
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <h5>Unit Price<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="unit_price" id="unit_price" class="form-control" required value="{{$editData->unit_price}}"> </div>
                                        
                                    </div>
                                </div>
                                
                            </div>
                            
                                   
							
						</div>
					  </div>
						
					
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

  @endsection
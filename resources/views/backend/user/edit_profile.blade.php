@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="content-wrapper">
    <div class="container-full">
      <!-- Content Header (Page header) -->
      

      <!-- Main content -->
      <section class="content">

        <div class="box">
			<div class="box-header with-border">
			  <h4 class="box-title">Manage Profile</h4>
			  <h6 class="box-subtitle">Manage Your Profile <a class="text-warning" href="http://reactiveraven.github.io/jqBootstrapValidation/">Seek Help </a></h6>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
			  <div class="row">
				<div class="col">
					<form method="POST" action="{{route('profile.store')}}" enctype="multipart/form-data">
                        @csrf
					  <div class="row">
						<div class="col-12">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <h5>Full Name <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="name" id="name" class="form-control" required value="{{$editData->name}}"> </div>
                                        
                                    </div>
                                </div> 
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <h5>User Role <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <select name="usertype" id="usertype" required class="form-control">
                                                <option value="">Select User Role</option>
                                                <option value="Admin" {{($editData->usertype == "Admin" ? "selected":"")}}>Admin</option>
                                                <option value="User" {{($editData->usertype == "User" ? "selected":"")}}>User</option>
                                                
                                            </select>
                                        </div>
                                    </div>
                                </div>   
                            </div>
                            <div class="row">
                            
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <h5>Email <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="email" name="email" id="email" class="form-control" required value="{{$editData->email}}"> </div>
                                        
                                    </div>
                                </div> 
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <h5>Address</h5>
                                        <div class="controls">
                                            <input type="text" name="address" id="address" class="form-control" value="{{$editData->address}}"> </div>
                                        
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <h5>Mobile</h5>
                                        <div class="controls">
                                            <input type="text" name="mobile" id="mobile" class="form-control" value="{{$editData->mobile}}"> </div>
                                        
                                    </div>
                                </div> 
                            </div>
                            <div class="row">
                            
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <h5>Gender</h5>
                                        <div class="controls">
                                            <select name="gender" id="gender" class="form-control">
                                                <option value="">Select Gender</option>
                                                <option value="Male" {{($editData->gender == "Male" ? "selected":"")}}>Male</option>
                                                <option value="Female" {{($editData->gender == "Female" ? "selected":"")}}>Female</option>
                                                
                                            </select>
                                        </div>
                                    </div>
                                    
                                </div> 
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <h5>Profile Image</h5>
                                        <div class="controls">
                                            <input type="file" name="image" id="image" class="form-control" value="{{$editData->image}}"> </div>
                                        
                                    </div>
                                    <div class="form-group">
                                       
                                        <div class="controls">
                                         <img id="showImage" src="{{(!empty($editData->image))? url('upload/user_images/'.$editData->image):url('upload/no_image.jpg') }}"
                                         style="width:100px; height:100px; border:1px; solid: #000000"> </div>
                                        
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

  <script type="text/javascript">
    $(document).ready(function(){
        $('#image').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#showImage').attr('src',e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });
  </script>

  @endsection
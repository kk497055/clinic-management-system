@extends('admin.admin_master')
@section('admin')

<div class="content-wrapper">
    <div class="container-full">
      <!-- Content Header (Page header) -->
      

      <!-- Main content -->
      <section class="content">

        <div class="box">
			<div class="box-header with-border">
			  <h4 class="box-title">Edit Patient Information</h4>
			  <h6 class="box-subtitle">Edit patient complete information <a class="text-warning" href="http://reactiveraven.github.io/jqBootstrapValidation/">Seek Help </a></h6>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
			  <div class="row">
				<div class="col">
					<form method="POST" action="{{route('patients.update', $editData['patient']['id'])}}">
                        @csrf
                        <input type="hidden" name="user_id", id="user_id" value="{{$editData->user_id}}">
					  <div class="row">
						<div class="col-12">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <h5>Full Name <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" tabindex="1" name="name" id="name" class="form-control" required value="{{$editData['patient']['name']}}"> </div>
                                        
                                    </div>
                                </div> 
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <h5>User Type <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <select name="usertype" tabindex="2" id="usertype" required class="form-control">
                                                <option value="">Select User Type</option>
                                                <option value="User" {{($editData['patient']['usertype'] == "User"?"selected":"")}}>User</option>
                                                
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                  <div class="form-group">
                                    <h5>User Role <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <select name="userrole" tabindex="3" id="userrole" required class="form-control">
                                            <option value="">Select User Role</option>
                                            <option value="Patient"{{($editData['patient']['role'] == "Patient"?"selected":"")}}>Patient</option>
                                            
                                            
                                            
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
                                          <input type="email" name="email" tabindex="4" id="email" class="form-control" required value="{{$editData['patient']['email']}}"> </div>
                                      
                                  </div>
                              </div> 
                              <div class="col-md-3">
                                <div class="form-group">
                                    <h5>Mother Name <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" tabindex="5" name="mother_name" id="mother_name" class="form-control" required value="{{$editData['patient']['mother_name']}}"> </div>
                                    
                                </div>
                            </div> 
                              <!-- Another Field can come here -->
                              <div class="col-md-3">
                                <div class="form-group">
                                    <h5>Father Name <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" tabindex="6" name="father_name" id="father_name" class="form-control" required value="{{$editData['patient']['father_name']}}"> </div>
                                    
                                </div>
                            </div> 

                          </div>
                          <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <h5>Mobile <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" tabindex="7" name="mobile" id="mobile" class="form-control" required value="{{$editData['patient']['mobile']}}"> </div>
                                    
                                </div>
                            </div> 
                            <div class="col-md-3">
                              <div class="form-group">
                                  <h5>Address <span class="text-danger">*</span></h5>
                                  <div class="controls">
                                      <input type="text" tabindex="8" name="address" id="address" class="form-control" required value="{{$editData['patient']['address']}}"> </div>
                                  
                              </div>
                          </div> 
                          <div class="col-md-3">
                            <div class="form-group">
                              <h5>City <span class="text-danger">*</span></h5>
                              <div class="controls">
                                  <select name="city_id" tabindex="10" id="city_id" required class="form-control">
                                      <option value="">Select City</option>
                                      @foreach ($cities as $city)
                                      <option value="{{$city->city_id}}" {{($editData['patient']['city_id'] == $city->city_id?"selected":"")}}>{{$city->city_name}}</option>
                                      @endforeach
                                  </select>
                              </div>
                          </div>
                        </div>
                            
                          

                        </div>
                        <div class="row">
                          <div class="col-md-3">
                            <div class="form-group">
                                <h5>Date of Birth <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="date" tabindex="9" name="dob" id="dob" class="form-control" required value="{{$editData['patient']['dob']}}"> </div>
                                
                            </div>
                          </div> 
                          
                          
                          <div class="col-md-3">
                            <div class="form-group">
                              <h5>Gender <span class="text-danger">*</span></h5>
                              <div class="controls">
                                  <select name="gender" tabindex="10" id="gender" required class="form-control">
                                      <option value="">Select Gender</option>
                                      <option value="Male"{{($editData['patient']['gender'] == "Male"?"selected":"")}}>Male</option>
                                      <option value="Female" {{($editData['patient']['name'] == "Female"?"selected":"")}}>Female</option>
                                  </select>
                              </div>
                          </div>
                        </div>
                        

                      </div> 
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                              <h5>Primary Complaint <span class="text-danger">*</span></h5>
                              <div class="controls">
                                  <textarea name="major_complaint" tabindex="11" id="major_complaint" class="form-control" required>{{$editData->major_complaint}}</textarea> </div>
                              
                          </div>
                        </div> 
                        
                      

                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <div class="controls">
                            <input type="checkbox" {{($editData->pain_discomfort == 1?"checked":"")}} name="pain" id="pain" value="1">
                            <label for="pain">Pain/Discomfort</label>
                          <div>
                        </div>
                        <div class="form-group">
                          <div class="controls">
                            <input type="checkbox" {{($editData->tooth_filling == 1?"checked":"")}} name="tooth_filling" tabindex="12" id="tooth_filling" value="1">
                            <label for="tooth_filling">Tooth Filling</label>
                          <div>
                        </div>
                        <div class="form-group">
                          <div class="controls">
                            <input type="checkbox" {{($editData->bleeding_gums == 1?"checked":"")}} tabindex="13" name="bleeding_gums" id="bleeding_gums" value="1">
                            <label for="bleeding_gums">Bleeding Gums</label>
                          <div>
                        </div>
                        <div class="form-group">
                          <div class="controls">
                            <input type="checkbox" {{($editData->implant_replacement == 1?"checked":"")}} tabindex="14" name="implant_replacement" id="implant_replacement" value="1">
                            <label for="implant_replacement">Implant Replacement</label>
                          <div>
                        </div>
                        <div class="form-group">
                          <div class="controls">
                            <input type="checkbox" {{($editData->aesthetic_concern == 1?"checked":"")}} tabindex="15" name="aesthetic_concern" id="aesthetic_concern" value="1">
                            <label for="aesthetic_concern">Aesthetic Concern</label>
                          <div>
                        </div>
                        <div class="form-group">
                          <div class="controls">
                            <input type="checkbox" {{($editData->routine_checkup == 1?"checked":"")}} tabindex="16" name="routine_checkup" id="routine_checkup" value="1">
                            <label for="routine_checkup">Routine Checkup</label>
                          <div>
                        </div>
                        <div class="form-group">
                          <div class="controls">
                            <input type="checkbox" {{($editData->previous_medication == 1?"checked":"")}} tabindex="17" name="previous_medication" id="previous_medication" value="1">
                            <label for="previous_medication">Previous Medication</label>
                          <div>
                        </div>
                        <div class="form-group">
                          <div class="controls">
                            <input type="checkbox" {{($editData->smoking == 1?"checked":"")}} tabindex="18" name="smoking" id="smoking" value="1">
                            <label for="smoking">Smoking</label>
                          <div>
                        </div>
                        <div class="form-group">
                          <div class="controls">
                            <input type="checkbox" {{($editData->blood_pressure == 1?"checked":"")}} tabindex="19" name="blood_presuure" id="blood_pressure" value="1">
                            <label for="blood_pressure">Blood Pressure</label>
                          <div>
                        </div>
                        <div class="form-group">
                          <div class="controls">
                            <input type="checkbox" {{($editData->diabetes == 1?"checked":"")}} tabindex="20" name="diabetes" id="diabetes" value="1">
                            <label for="diabetes">Diabetes</label>
                          <div>
                        </div>
                        <div class="form-group">
                          <div class="controls">
                            <input type="checkbox" {{($editData->asthma == 1?"checked":"")}} tabindex="21" name="asthma" id="asthma" value="1">
                            <label for="asthma">Asthma</label>
                          <div>
                        </div>
                        <div class="form-group">
                          <div class="controls">
                            <input type="checkbox" {{($editData->hepatitis == 1?"checked":"")}} tabindex="22" name="hepatitis" id="hepatitis" value="1">
                            <label for="hepatitis">Hepatitis</label>
                          <div>
                        </div>
                        <div class="form-group">
                          <div class="controls">
                            <input type="checkbox" {{($editData->hiv == 1?"checked":"")}} tabindex="23" name="hiv" id="hiv" value="1">
                            <label for="hiv">HIV</label>
                          <div>
                        </div>
                        <div class="form-group">
                          <div class="controls">
                            <input type="checkbox" {{($editData->epilepsy == 1?"checked":"")}} tabindex="24" name="epilepsy" id="epilepsy" value="1">
                            <label for="epilepsy">Epilepsy</label>
                          <div>
                        </div>
                        <div class="form-group">
                          <div class="controls">
                            <input type="checkbox" {{($editData->heart_trouble == 1?"checked":"")}} tabindex="25" name="heart_trouble" id="heart_trouble" value="1">
                            <label for="heart_trouble">Heart Trouble</label>
                          <div>
                        </div>
                        <div class="form-group">
                          <div class="controls">
                            <input type="checkbox" {{($editData->auto_immune_disease == 1?"checked":"")}} tabindex="26" name="auto_immune_disease" id="auto_immune_disease" value="1">
                            <label for="auto_immune_disease">Auto Immune Disease</label>
                          <div>
                        </div>
                        <div class="form-group">
                          <div class="controls">
                            <input type="checkbox" {{($editData->pregnancy == 1?"checked":"")}} tabindex="27" name="pregnancy" id="Pregnancy" value="1">
                            <label for="pregnancy">Pregnancy</label>
                          <div>
                        </div>
                      </div>
                    </div> 
                    <!-- End of Checkboxes -->
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                            <h5>Other Issues <span class="text-danger">*</span></h5>
                            <div class="controls">
                                <textarea name="other" tabindex="28" id="other" class="form-control" required>{{$editData->other}}</textarea> </div>
                            
                        </div>
                      </div> 
                      <div class="col-md-6">
                        <div class="form-group">
                            <h5>Medication Allergies <span class="text-danger">*</span></h5>
                            <div class="controls">
                                <textarea name="medication_allergies" tabindex="29" id="medication_allergies" class="form-control" required>{{$editData->medication_allergies}}</textarea> </div>
                            
                        </div>
                      </div> 
                    

                  </div>
                                   
							
						</div>
					  </div>
						
					
						<div class="text-xs-right">
							<input type="submit" tabindex="30" class="btn btn-rounded btn-info mb-5" value="Update">
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
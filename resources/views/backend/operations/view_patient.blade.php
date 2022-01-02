@extends('admin.admin_master')
@section('admin')

<div class="content-wrapper">
    <div class="container-full">
      <!-- Content Header (Page header) -->
      

      <!-- Main content -->
      <section class="content">
        <div class="row">


          <div class="col-12">

           <div class="box">
              <div class="box-header with-border">
                <h3 class="box-title">Patient List</h3>
                <a href="{{route('patients.add')}}" style="float: right;" class="btn btn-rounded btn-success mb-5">
                    Register New Patients
                </a>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                  <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                          <tr>
                              <th width="5%">SL</th>
                              <th>Name</th>
                              <th>MR NO</th>
                              <th>Mobile</th>
                              <th>Address</th>
                              <th>Gender</th>
                              <th>Date of Birth</th>
                              @if(Auth::user()->usertype == 'Admin')
                              <th>Code</th>
                              @endif
                              <th width="20%">Action</th>
                              
                          </tr>
                      </thead>
                      <tbody>
                          @foreach($allData as $key => $patient)
                          <tr>
                              <td>{{ $key+1 }}</td>
                              <td>{{$patient->name}}</td>
                              <td>{{$patient->mr_no}}</td>
                              <td>{{$patient->mobile}}</td>
                              <td>{{$patient->address}}</td>
                              <td>{{$patient->gender}}</td>
                              <td>{{$patient->dob}}</td>
                              @if(Auth::user()->usertype == 'Admin')
                              <td>{{$patient->code}}</td>
                              @endif
                              <td><a href="{{route('patients.edit', $patient->user_id)}}" class="btn btn-info">EDIT</a>
                                <a href="" class="btn btn-primary">Details</a></td>
                              
                          </tr>
                          @endforeach
                      </tbody>
                     
                    </table>
                  </div>
              </div>
              <!-- /.box-body -->
            </div>
            <!-- /.box -->


            <!-- /.box -->          
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </section>
      <!-- /.content -->
    
    </div>
</div>


@endsection
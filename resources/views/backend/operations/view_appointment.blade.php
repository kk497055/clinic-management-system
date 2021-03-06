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
                <h3 class="box-title">Appointments List</h3>
                <a href="{{route('appointments.add')}}" style="float: right;" class="btn btn-rounded btn-success mb-5">
                    Book New Appointment
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
                              <th>Mobile</th>
                              <th>Priority</th>
                              <th>Branch</th>
                              <th>Date</th>
                              <th>Status</th>
                              <th width="30%">Notes</th>
                              <th>Action</th>
                              
                          </tr>
                      </thead>
                      <tbody>
                          @foreach($allData as $key => $appointment)
                          <tr>
                              <td>{{ $key+1 }}</td>
                              <td>{{$appointment->title}}</td>
                              <td>{{$appointment->mobile}}</td>
                              <td>{{$appointment['priority_info']['name']}}</td>
                              <td>{{$appointment['branch_info']['branch_name']}}</td>
                              <td>{{$appointment->appointment_start}}</td>
                              @if ($appointment->status == "Pending")
                              <td><span class="badge badge-info">{{$appointment->status}}</span></td>
                              @endif
                              <td>{{$appointment->notes}}</td>
                              <td><a href="{{route('appointments.edit', $appointment->id)}}" class="btn btn-info">EDIT</a>
                                <a href="{{route('appointments.complete', $appointment->id)}}" class="btn btn-primary">Complete</a></td>
                              
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
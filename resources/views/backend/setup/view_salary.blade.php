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
                <h3 class="box-title">Employee Salaries</h3>
                <a href="{{route('salary.add')}}" style="float: right;" class="btn btn-rounded btn-success mb-5">
                    Add Salary
                </a>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                  <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                          <tr>
                              <th width="10%">SL</th>
                              <th>Employee Name</th>
                              <th>Current Salary</th>
                              <th>Join Date</th>
                              <th>Last Increment Date</th>
                              <th width="30%">Action</th>
                              
                          </tr>
                      </thead>
                      <tbody>
                          @foreach($employees as $key => $employee)
                          <tr>
                              <td>{{ $key+1 }}</td>
                              <td>{{$employee->name}}</td>
                              <td>{{$employee->previous_salary+$employee->increment_salary}}</td>
                              <td>{{$employee->join_date}}</td>
                              <td>{{$employee->effective_date}}</td>
                              <td><a href="{{route('salary.increment', $employee->employee_id)}}" class="btn btn-info">Increment</a>
                                <a href="" class="btn btn-danger" id="delete">Details</a></td>
                              
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
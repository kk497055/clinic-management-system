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
                <h3 class="box-title">Branch List</h3>
                <a href="{{route('branch.add')}}" style="float: right;" class="btn btn-rounded btn-success mb-5">
                    Add New Branch
                </a>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                  <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                          <tr>
                              <th width="10%">SL</th>
                              <th>Name</th>
                              <th>Address</th>
                              <th width="25%">Action</th>
                              
                          </tr>
                      </thead>
                      <tbody>
                          @foreach($allData as $key => $branch)
                          <tr>
                              <td>{{ $key+1 }}</td>
                              <td>{{$branch->branch_name}}</td>
                              <td>{{$branch->address.", ".$branch->city_name}}</td>
                              <td><a href="{{route('branch.edit', $branch->id)}}" class="btn btn-info">EDIT</a>
                                <a href="{{route('branch.delete', $branch->id)}}" class="btn btn-danger" id="delete">DELETE</a></td>
                              
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
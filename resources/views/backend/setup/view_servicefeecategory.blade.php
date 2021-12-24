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
                <h3 class="box-title">Service Fee Category List</h3>
                <a href="{{route('servicesfeecategory.add')}}" style="float: right;" class="btn btn-rounded btn-success mb-5">
                    Add Service Fee Category
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
                              <th width="25%">Action</th>
                              
                          </tr>
                      </thead>
                      <tbody>
                          @foreach($allData as $key => $servicefeecategory)
                          <tr>
                              <td>{{ $key+1 }}</td>
                              <td>{{$servicefeecategory->name}}</td>
                              <td><a href="{{route('servicesfeecategory.edit', $servicefeecategory->id)}}" class="btn btn-info">EDIT</a>
                                <a href="{{route('servicesfeecategory.delete', $servicefeecategory->id)}}" class="btn btn-danger" id="delete">DELETE</a></td>
                              
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
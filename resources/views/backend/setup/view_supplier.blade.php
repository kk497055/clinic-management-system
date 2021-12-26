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
                <h3 class="box-title">Suppliers List</h3>
                <a href="{{route('suppliers.add')}}" style="float: right;" class="btn btn-rounded btn-success mb-5">
                    Add New Supplier
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
                              <th>Contact</th>
                              <th>Mobile</th>
                              <th>Email</th>
                              <th>Tax Number</th>
                              <th width="20%">Action</th>
                              
                          </tr>
                      </thead>
                      <tbody>
                          @foreach($allData as $key => $supplier)
                          <tr>
                              <td>{{ $key+1 }}</td>
                              <td>{{$supplier->name}}</td>
                              <td>{{$supplier->address.", ".$supplier['city_name']}}</td>
                              <td>{{$supplier->contact_name}}</td>
                              <td>{{$supplier->mobile}}</td>
                              <td>{{$supplier->email}}</td>
                              <td>{{$supplier->tax_number}}</td>
                              <td><a href="" class="btn btn-info">EDIT</a>
                                <a href="" class="btn btn-danger" id="delete">PURCHASE</a></td>
                              
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
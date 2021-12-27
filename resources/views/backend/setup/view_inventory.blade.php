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
                <h3 class="box-title">Inventory List</h3>
                <a href="{{route('inventory.add')}}" style="float: right;" class="btn btn-rounded btn-success mb-5">
                    Add New Inventory Item
                </a>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                  <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                          <tr>
                              <th width="10%">SL</th>
                              <th>Item</th>
                              <th>Description</th>
                              <th>Packing</th>
                              <th>Closing Balance</th>
                              <th>Unit Price</th>
                              <th width="20%">Action</th>
                              
                          </tr>
                      </thead>
                      <tbody>
                          @foreach($allData as $key => $inventory)
                          <tr>
                              <td>{{ $key+1 }}</td>
                              <td>{{$inventory->item}}</td>
                              <td>{{$inventory->description}}</td>
                              <td>{{$inventory->packing}}</td>
                              <td>{{$inventory->closing_balance}}</td>
                              <td>{{$inventory->unit_price}}</td>
                              <td><a href="{{route('inventory.edit', $inventory->id)}}" class="btn btn-info">EDIT</a>
                                <a href="{{route('inventory.purchase')}}" class="btn btn-primary">PURCHASE</a></td>
                              
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
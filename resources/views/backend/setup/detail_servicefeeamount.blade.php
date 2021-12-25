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
                <h3 class="box-title">Service Fee Amounts List</h3>

              </div>
              <!-- /.box-header -->
              <div class="box-body">
                  <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                          <tr>
                              <th width="10%">SL</th>
                              
                              <th>Service Category: {{ $detailData[0]['service_fee_category']['name']}}</th>
                              <th>Amount</th>
                              
                              
                          </tr>
                      </thead>
                      <tbody>
                          @foreach($detailData as $key => $servicefeeamount)
                          <tr>
                              <td>{{ $key+1 }}</td>
                              
                              <td>{{$servicefeeamount['service_fee_main']['name']}}</td>
                              <td>{{$servicefeeamount->service_amount}}</td>
                              
                              
                              
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
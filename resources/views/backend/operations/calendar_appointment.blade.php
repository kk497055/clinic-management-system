@extends('admin.admin_master')
@section('admin')

<div class="content-wrapper">
    <div class="container-full">
      <!-- Content Header (Page header) -->
      

      <!-- Main content -->
      <section class="content">

        <div class="box">
			<div class="box-header with-border">
			  <h4 class="box-title">Appointments Calendar</h4>
			  <h6 class="box-subtitle">view patient appointments <a class="text-warning" href="http://reactiveraven.github.io/jqBootstrapValidation/">Seek Help </a></h6>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
			  <div class="row">
                <div class="col-xl-9 col-lg-8 col-12">	
                    <div id="calendar"></div>
                </div>
              </div> 
		  </div>

        </section>
        <!-- /.content -->
      
      </div>
  </div>

  @endsection
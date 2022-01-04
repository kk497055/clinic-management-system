@php
    $prefix = Request::route()->getPrefix();
    $route = Route::current()->getName();

@endphp

  <aside class="main-sidebar">
    <!-- sidebar-->
    <section class="sidebar">	
		
        <div class="user-profile">
			<div class="ulogo">
				 <a href="index.html">
				  <!-- logo for regular state and mobile devices -->
					 <div class="d-flex align-items-center justify-content-center">					 	
						  <img src="{{ asset('backend/images/logo-dark.png')}}" alt="">
						  <h3><b>Easy</b> Clinic</h3>
					 </div>
				</a>
			</div>
        </div>
      
      <!-- sidebar menu-->
      <ul class="sidebar-menu" data-widget="tree">  
		  
		<li class="{{($route == 'dashboard')?'active':''}}">
          <a href="{{ route('dashboard')}}">
            <i data-feather="pie-chart"></i>
			<span>Dashboard</span>
          </a>
        </li>  
		
        <li class="treeview {{ ($prefix == '/users')?'active':''}}">
          <a href="#">
            <i data-feather="message-circle"></i>
            <span>Manage Users</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('user.view')}}"><i class="ti-more"></i>View Users</a></li>
            <li><a href="{{ route('user.add')}}"><i class="ti-more"></i>Add Users</a></li>
          </ul>
        </li> 
		  
        <li class="treeview {{ ($prefix == '/profile')?'active':''}}"">
          <a href="#">
            <i data-feather="mail"></i> <span>Create Profile</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('profile.view')}}"><i class="ti-more"></i>Your Profile</a></li>
            <li><a href="{{ route('password.view')}}"><i class="ti-more"></i>Change Password</a></li>
           
          </ul>
        </li>
		
        <li class="treeview {{ ($prefix == '/setup')?'active':''}}">
            <a href="#">
              <i data-feather="mail"></i> <span>Setup</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-right pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="{{ route('employees.view')}}"><i class="ti-more"></i>Employees</a></li>
              <li><a href="{{ route('salary.view')}}"><i class="ti-more"></i>Employee Salaries</a></li>
              <li><a href="{{ route('branch.view')}}"><i class="ti-more"></i>Branches</a></li>
              <li><a href="{{ route('services.view')}}"><i class="ti-more"></i>Services</a></li>
              <li><a href="{{ route('servicesfeecategory.view')}}"><i class="ti-more"></i>Service Fee Categories</a></li>
              <li><a href="{{ route('servicesfeeamount.view')}}"><i class="ti-more"></i>Service Fee Amounts</a></li>
              <li><a href="{{ route('suppliers.view')}}"><i class="ti-more"></i>Suppliers</a></li>
              <li><a href="{{ route('inventory.view')}}"><i class="ti-more"></i>Inventory Items</a></li>
              <li><a href=""><i class="ti-more"></i>SMS Integration</a></li>
             
            </ul>
        </li>

        <li class="treeview {{ ($prefix == '/operations')?'active':''}}">
            <a href="#">
              <i data-feather="mail"></i> <span>Operations</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-right pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="{{route('employees.transfer')}}"><i class="ti-more"></i>Transfer Employees</a></li>
                <li><a href=""><i class="ti-more"></i>Receive Inventory</a></li>
                <li><a href="{{route('patients.view')}}"><i class="ti-more"></i>Search Patients</a></li>
                <li><a href="{{route('patients.add')}}"><i class="ti-more"></i>Register Patients</a></li>
                <li><a href="{{route('appointments.add')}}"><i class="ti-more"></i>Set up Appointments</a></li>
                <li><a href="{{route('appointments.calendar')}}"><i class="ti-more"></i>Appointments Calendar</a></li>
                
              
             
            </ul>
        </li>
		  
        
		
		
         
        </li> 
        
      </ul>
    </section>
	
	<div class="sidebar-footer">
		<!-- item-->
		<a href="javascript:void(0)" class="link" data-toggle="tooltip" title="" data-original-title="Settings" aria-describedby="tooltip92529"><i class="ti-settings"></i></a>
		<!-- item-->
		<a href="mailbox_inbox.html" class="link" data-toggle="tooltip" title="" data-original-title="Email"><i class="ti-email"></i></a>
		<!-- item-->
		<a href="javascript:void(0)" class="link" data-toggle="tooltip" title="" data-original-title="Logout"><i class="ti-lock"></i></a>
	</div>
  </aside>
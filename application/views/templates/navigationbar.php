<header class="main-header">
	<!-- Logo -->
	<a href="<?php echo site_url('Home/index');?>" class="logo">
		<!-- mini logo for sidebar mini 50x50 pixels -->
		<span class="logo-mini"><b>E</b>L</span>
		<!-- logo for regular state and mobile devices -->
		<span class="logo-lg"><b>Enabled</b>Living</span>
	</a>
		<!-- Header Navbar: style can be found in header.less -->
	<nav class="navbar navbar-static-top" role="navigation">
		<!-- Sidebar toggle button-->
		<a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
			<span class="sr-only">Toggle navigation</span>
		</a>
		<div class="navbar-custom-menu">
			<ul class="nav navbar-nav">
			<!-- Messages: style can be found in dropdown.less-->
			
				<?php if($navigation_panel=="system_navbar") { ?>
			
				<li class="dropdown messages-menu">

					<a href="<?php echo site_url('System_Admin/sys_agency_registration');?>" class="dropdown-toggle">
						<i class="fa fa-users"></i>
						Agency Registration
					</a>
				</li>
				<!-- Notifications: style can be found in dropdown.less -->
				<li class="dropdown notifications-menu">
					<a href="#" class="dropdown-toggle">
						<i class="fa fa-user"></i>
						Role
					</a>

				</li>

				<?php } elseif($navigation_panel=="agency_navbar") { ?>
				
				<li class="dropdown messages-menu">
					<a href="<?php echo site_url('Agency_Admin/agency_change_password_index');?>" class="dropdown-toggle">
							<i class="fa fa-compass"></i>
							Change Password
					</a>
				</li>
				
				<li class="dropdown messages-menu">
					<a href="<?php echo site_url('Agency_Admin/agency_user_registration');?>" class="dropdown-toggle">
							<i class="fa fa-users"></i>
							User Registration
					</a>
				</li>
				
				<!--<li class="dropdown messages-menu">
					<a href="<?php //echo site_url('Agency_Admin/agency_registered_users_index');?>" class="dropdown-toggle">
							<i class="fa fa-users"></i>
							Registered Users
					</a>
				</li>-->
					<!-- Notifications: style can be found in dropdown.less -->
				<!--<li class="dropdown notifications-menu">
					<a href="#" class="dropdown-toggle">
						<i class="fa fa-user"></i>
						Role
					</a>
				</li>-->
				
				<?php } else { ?>
				
				<li class="dropdown messages-menu">
					<a href="<?php echo site_url('Home/agency_login');?>" class="dropdown-toggle">
						<i class="fa fa-users"></i>
								Agency
					</a>
				</li>
						<!-- Notifications: style can be found in dropdown.less -->
				<li class="dropdown notifications-menu">
					<a href="<?php echo site_url('Home/sys_login');?>" class="dropdown-toggle">
						<i class="fa fa-user"></i>
							Admin
					</a>
				</li>

				<?php }?>

				<?php $panel_logged_in= isset($this->session->userdata['agency_logged_in']) ? $this->session->userdata['agency_logged_in']:(isset($this->session->userdata['system_logged_in']) ? $this->session->userdata['system_logged_in'] : ''); 
	  
				if(!empty($panel_logged_in))
				{	
			
				?>
							<!-- User Account: style can be found in dropdown.less -->
				<li class="dropdown user user-menu">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<img src="<?php echo base_url('assets/dist/img/avatar5.png');?>" class="user-image" alt="User Image">
						<span class="hidden-xs"><?php echo $panel_logged_in['username'];?></span>
					</a>
					<ul class="dropdown-menu">
						<!-- User image -->
						<li class="user-header">
							<img src="<?php echo base_url('assets/dist/img/avatar5.png');?>" class="img-circle" alt="User Image">
							<p>
								<strong><?php echo $panel_logged_in['username'];?></strong>
							</p>
						</li>
						<!-- Menu Footer-->
						<li class="user-footer">
							<center>
								<div>
									<a href="logout" class="btn btn-default btn-flat">Sign Out</a>
								</div>
							</center>
						</li>
					</ul>
				</li>
				
				<?php } ?>

			</ul>
		</div>
	</nav>
</header>
<!-- begin::page loader-->
<div class="page-loader">
    <div class="spinner-border text-danger"></div>
    <span>Loading</span>
</div>
<!-- end::page loader -->
<nav class="navbar">
	<div class="container-fluid">
		<div class="header-logo">
			<a href="#">
				<img class="d-none d-lg-block" src="<?php echo base_url();?>assets/images/logo/PCL-logo.png" alt="...">
				<img class="d-lg-none d-sm-block" src="<?php echo base_url();?>assets/images/logo/PCL-logo.png" alt="...">
			</a>
		</div>

		<div class="header-body">
			<form class="search">
				<div class="row">
					<div class="col-md-4">
						
					</div>
				</div>
			</form>
			<ul class="navbar-nav">
				
				<li class="nav-item dropdown">
					<a href="#" class="nav-link" data-toggle="dropdown">
						<i class="fa fa-user-o"></i>
					</a>
					<div class="dropdown-menu dropdown-menu-right dropdown-menu-big">
						<div class="dropdown-menu-title text-center"
							 data-backround-image="<?php echo base_url()?>/adminassets/media/image/event_manager_visiting_card.png">
							<figure class="avatar avatar-state-success avatar-sm m-b-10 bring-forward">
								<img src="<?php echo base_url()?>/adminassets/media/image/avatar.jpg" class="rounded-circle" alt="image">
							</figure>
							<h6 class="text-uppercase font-size-12 m-b-0"><?php echo @$_SESSION['admin']['username']; ?></h6>
						</div>
						<div class="dropdown-menu-body">
							
							<ul class="list-group list-group-flush">
<!--								<a href="--><?php //echo base_url()?><!--superadmin/console/profile" class="list-group-item link-2">Profile</a>-->
<!--								-->
<!--								<a href="--><?php //echo base_url()?><!--superadmin/console/changePAssword" class="list-group-item link-2">Change Password</a>-->
								
								<a href="<?php echo base_url()?>superadmin/login/logout" class="list-group-item text-danger">Logout</a>
							</ul>
						</div>
					</div>
				</li>
				<li class="nav-item d-lg-none d-sm-block">
					<a href="#" class="nav-link side-menu-open">
						<i class="ti-menu"></i>
					</a>
				</li>
			</ul>
		</div>

	</div>
</nav>
<!-- end::navbar -->

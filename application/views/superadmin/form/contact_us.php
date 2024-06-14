<!-- begin::main content -->
<main class="main-content">

	<div class="container-fluid">

		<!-- begin::page header -->
		<div class="page-header d-md-flex align-items-center justify-content-between">
			<div>
				<h3><?php echo $page_title; ?></h3>
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="<?php echo base_url('superadmin/administrator/index'); ?>">Dashboard</a>
						</li>
						<li class="breadcrumb-item active" aria-current="page"><?php echo $page_title; ?></li>
					</ol>
				</nav>
			</div>
			<div>
				<!-- <a href="<?php echo base_url('superadmin/administrator/add_edit_Testimonial'); ?>"
				   class="btn btn-primary btn-uppercase">
					<i class="fa fa-plus m-r-5"></i> Add Testimonial
				</a> -->
			</div>
		</div>
		<!-- end::page header -->

		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-body">
						<div class="table-responsive">
							<table class="table table-bordered" id="data_table" data-function="Contact_list">
								<thead>
								<tr>
									<th>#</th>
									<th>Client Name</th>
									<th>Contact No</th>
									<th>Email</th>
									<th>Company Name</th>
									<th>Designation</th>
									<th>Enquiry For</th>
									<th>Location</th>
									<th>Date of Event</th>
									<th>No of Guest</th>
									<th>Event</th>
									<th>Specify Other Event</th>
									<th>Venue</th>
									<th>Event Type</th>
									<th>Artist Requirement</th>
									<th>work Profile</th>
									<th>Date</th>
								</tr>
								</thead>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>

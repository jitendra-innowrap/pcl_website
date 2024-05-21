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
				<a href="<?php echo base_url('superadmin/administrator/add_edit_report_policies'); ?>"
				   class="btn btn-primary btn-uppercase">
					<i class="fa fa-plus m-r-5"></i> Add Report And Policies
				</a>
			</div>
		</div>
		<!-- end::page header -->
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-body">
						<div class="table-responsive">
							<table class="table table-bordered" id="data_table" data-function="gst_notification_list">
								<thead>
								<tr>
									<th>#</th>
									<th>Type</th>
									<th>Document Name</th>
									<th>PDF</th>
									<th>Document date</th>
									<th>Order No.</th>
									<th>Created Date</th>
									<th>Action</th>
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

<!-- begin::main content -->
<main class="main-content">

	<div class="container-fluid">

		<!-- begin::page header -->
		<div class="page-header d-md-flex align-items-center justify-content-between">
			<div>
				<h3><?php echo $page_title;?></h3>
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="<?php echo base_url('superadmin/administrator/index');?>">Dashboard</a></li>
						<li class="breadcrumb-item active" aria-current="page"><?php echo $page_title;?></li>
					</ol>
				</nav>
			</div>
			<div>
				<a href="<?php echo base_url('superadmin/administrator/add_edit_Client');?>" class="btn btn-primary btn-uppercase">
					<i class="fa fa-plus m-r-5"></i> Add Client
				</a>
			</div>
		</div>
		<!-- end::page header -->

		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-body">
						<div class="table-responsive">
							<table class="table table-bordered text-center" id="data_table" data-function="clientele">
								<thead>
								<tr>
									<th>#</th>
									<th>Client Name</th>
									<th>Images</th>
									<th>Logo alt</th>
									<th>Home page</th>
									<th>Home page order no.</th>
									<th>Product page</th>
									<th>Product Name</th>
									<th>Product page order no.</th>
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

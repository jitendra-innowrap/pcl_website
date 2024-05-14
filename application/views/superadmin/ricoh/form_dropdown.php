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
				<button type="button" class="btn btn-primary btn-uppercase" id="addRecord">
					<i class="fa fa-plus m-r-5"></i> Add
				</button>
			</div>
		</div>
		<!-- end::page header -->

		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-body">
						<div class="table-responsive">
							<table class="table table-bordered" id="data_table" data-function="form_dropdown">
								<thead>
								<tr class="text-uppercase">
									<th>#</th>
									<th>Title</th>
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
<div id="recordModal" class="modal fade">
	<div class="modal-dialog">
		<form method="post" id="recordForm">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title"><i class="fa fa-plus"></i> Add Dropdown</h4>
					<button type="button" class="close" data-dismiss="modal">×</button>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label for="name" class="control-label">Name</label>
						<input type="text" class="form-control"
							   id="name" name="name" placeholder="Name" required>
					</div>
					<div class="form-group">
						<label for="order">Order No.*</label>
						<input class="form-control" type="number" min="0" name="order_no" id="order" placeholder="Enter Order No." required>
					</div>
					<div class="form-group">
						<div class="custom-control custom-switch">
							<input type="checkbox" class="custom-control-input" name="status" id="status" value="1">
							<label class="custom-control-label" for="status">Active/Inactive</label>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<input type="hidden" name="id" id="id"/>
					<input type="hidden" name="action" id="action" value=""/>
					<input type="submit" name="save" id="save" class="btn btn-primary btn-uppercase waves-effect waves-button waves-light" value="Save"/>
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
		</form>
	</div>
</div>


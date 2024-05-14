<!-- begin::main content -->
<main class="main-content">

	<div class="container">

		<!-- begin::page header -->
		<div class="page-header">
			<h3><?php echo $page_title;?></h3>
			<nav aria-label="breadcrumb">
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="<?php echo base_url('superadmin/administrator/index');?>">Dashboard</a></li>
					<li class="breadcrumb-item"><a href="<?php echo base_url('superadmin/administrator/counter');?>">Counter</a></li>
					<li class="breadcrumb-item active" aria-current="page"><?php echo $page_title;?></li>
				</ol>
			</nav>
		</div>
		<!-- end::page header -->

		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-body">
						<form method="post" class="needs-validation" novalidate="" enctype="multipart/form-data">
							<div class="form-row">
								<div class="col-md-4 mb-3">
									<label for="label">Label*</label>
									<input class="form-control" name="label" placeholder="Enter label" value="<?php echo isset($edit['label']) ? $edit['label'] :'';?>" id="label" required>
								</div>
								<div class="col-md-4 mb-3">
									<label for="img">Icon</label>
									<input type="file" class="form-control" name="file" accept="image/jpeg,image/png,image/jpg,image/svg" placeholder="Select a image" <?php echo isset($edit['icon']) ? '':'required'?>>
								</div>
								<div class="col-md-2 mb-3">
									<label for="order">Order No.*</label>
									<input class="form-control" type="number" min="0" name="order_no" id="order" value="<?php echo isset($edit['order_no'])?$edit['order_no']:'';?>" placeholder="Enter Order No." required>
								</div>
								<div class="col-md-2 mb-3">
									<label for="value">Value</label>
									<input class="form-control" name="value" id="value" value="<?php echo isset($edit['value'])?$edit['value']:'';?>"/>
								</div>
								<?php if (isset($edit['icon']) && !empty($edit['icon'])){?>
									<div class="col-md-3 mb-3">
										<img src="<?php echo base_url($edit['icon']);?>" class="img-fluid"/>
									</div>
								<?php }?>
								<div class="col-md-2 mb-3">
									<div class="custom-control custom-switch">
										<input type="checkbox" class="custom-control-input" name="status" id="status" value="1" <?php echo isset($edit['status'])?$edit['status'] == 1 ? 'checked':'':'';?>>
										<label class="custom-control-label" for="status">Active/Inactive</label>
									</div>
								</div>
							</div>
							<button type="submit" name="submit" class="btn btn-primary">Submit</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>

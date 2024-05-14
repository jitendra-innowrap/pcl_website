<!-- begin::main content -->
<main class="main-content">

	<div class="container-fluid">

		<!-- begin::page header -->
		<div class="page-header">
			<h3><?php echo $page_title;?></h3>
			<nav aria-label="breadcrumb">
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="<?php echo base_url('superadmin/administrator/index');?>">Dashboard</a></li>
					<li class="breadcrumb-item"><a href="<?php echo base_url('superadmin/administrator/speakers');?>">Speakers</a></li>
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
								<div class="col-md-6 mb-3">
									<label for="name">Name*</label>
									<input class="form-control" name="name" value="<?php echo isset($edit['name'])?$edit['name']:'';?>" placeholder="Enter Speaker Name" required>
								</div>
								<div class="col-md-3 mb-3">
									<label for="blog_date">Company*</label>
									<input class="form-control" name="company" value="<?php echo isset($edit['company'])?$edit['company']:'';?>" type="text" required>
								</div>
								<div class="col-md-3 mb-3">
									<label for="author">Designation*</label>
									<input class="form-control" name="designation" value="<?php echo isset($edit['designation'])?$edit['designation']:'';?>" placeholder="Enter Designation" required>
								</div>
								<div class="col-md-4 mb-3">
									<label for="img">Image</label>
									<input type="file" class="form-control" name="file" accept="image/jpeg,image/png,image/jpg" placeholder="Select a image" <?php echo isset($edit['photo']) ? '':'required'?>>
								</div>
								<?php if (isset($edit['photo']) && !empty($edit['photo'])){?>
									<div class="col-md-12 mb-3">
										<img src="<?php echo base_url($edit['photo']);?>" class="img-fluid"/>
									</div>
								<?php }?>
								<div class="col-md-2 mb-3 align-self-end">
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

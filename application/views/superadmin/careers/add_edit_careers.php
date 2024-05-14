<!-- begin::main content -->
<main class="main-content">

	<div class="container">

		<!-- begin::page header -->
		<div class="page-header">
			<h3><?php echo $page_title;?></h3>
			<nav aria-label="breadcrumb">
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="<?php echo base_url('superadmin/administrator/index');?>">Dashboard</a></li>
					<li class="breadcrumb-item"><a href="<?php echo base_url('superadmin/administrator/investors_category');?>">Investors Category</a></li>
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
								<div class="col-md-3 mb-3">
									<label for="department_id">Investors Category*</label>
									<select name="department_id" class="form-control" required>
										<option value="" disabled>Select a category</option>
										<?php foreach ($careers_department as $value){?>
											<option value="<?php echo $value->id;?>" <?php echo isset($edit['department_id']) ? $edit['department_id'] == $value->id ? 'selected':'':'';?>><?php echo $value->name;?></option>
										<?php }?>
									</select>
								</div>
								<div class="col-md-9 mb-3">
									<label for="title">Job Title*</label>
									<input class="form-control" name="job_name" value="<?php echo isset($edit['job_name'])?$edit['job_name']:'';?>" placeholder="Enter Job title" required>
								</div>
								<div class="col-md-4 mb-3">
									<label for="experience">Experience*</label>
									<input class="form-control" name="experience" value="<?php echo isset($edit['experience'])?$edit['experience']:'';?>" placeholder="Enter Experience" required>
								</div>
								<div class="col-md-2 mb-3">
									<label for="no_of_vacancy">No of vacancy*</label>
									<input class="form-control" name="no_of_vacancy" value="<?php echo isset($edit['no_of_vacancy'])?$edit['no_of_vacancy']:'';?>" placeholder="Enter Job title" required>
								</div>
								<div class="col-md-4 mb-3">
									<label for="location">Location*</label>
									<select class="form-control" name="location[]" id="cites" multiple></select>
								</div>
								<div class="col-md-2 mb-3">
									<label for="order">Order No.*</label>
									<input class="form-control" type="number" min="0" name="order_no" id="order" value='<?php echo isset($edit['order_no'])?$edit['order_no']:'';?>' placeholder="Enter Order No." required>
								</div>
								<div class="col-md-12 mb-3">
									<label for="editor">Job description</label>
									<textarea class="form-control editor" rows="10" name="job_description" id="editor" required><?php echo isset($edit['job_description'])?$edit['job_description']:'';?></textarea>
								</div>
								<div class="col-md-2 mb-3 align-self-end">
									<div class="custom-control custom-switch">
										<input type="checkbox" class="custom-control-input" name="status" id="status" value="1" <?php echo isset($edit['status'])?$edit['status'] == 1 ? 'checked':'':'';?>>
										<label class="custom-control-label" for="status">Active/Inactive</label>
									</div>
								</div>
								<input type="hidden" name="selectedcity" data-value='<?php echo isset($job_location)?$job_location:'';?>'>
							</div>
							<button type="submit" name="submit" class="btn btn-primary">Submit</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>

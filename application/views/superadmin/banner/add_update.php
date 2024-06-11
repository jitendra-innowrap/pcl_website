<!-- begin::main content -->
<main class="main-content">

	<div class="container">

		<!-- begin::page header -->
		<div class="page-header">
			<h3><?php echo $page_title;?></h3>
			<nav aria-label="breadcrumb">
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="<?php echo base_url('superadmin/administrator/index');?>">Dashboard</a></li>
					<li class="breadcrumb-item"><a href="<?php echo base_url('superadmin/administrator/banner');?>">Banner</a></li>
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
								<div class="col-md-5 mb-3">
									<label for="name">Name*</label>
									<input class="form-control" name="name" placeholder="Enter Name" value="<?php echo isset($edit['name']) ? $edit['name'] :'';?>" id="name" required>
								</div>
								<div class="col-md-5 mb-3">
									<label for="title">Display Title</label>
									<input class="form-control" name="title" placeholder="Enter Display Title" value="<?php echo isset($edit['title']) ? $edit['title'] :'';?>" id="title">
								</div>
								<div class="col-md-2 mb-3">
									<label for="order">Order No.</label>
									<input class="form-control" type="number" min="0" name="order_no" id="order" value="<?php echo isset($edit['order_no'])?$edit['order_no']:'';?>" placeholder="Enter Order No.">
								</div>
								<div class="col-md-12 mb-3">
									<label for="description">Display Short description</label>
									<textarea class="form-control" maxlength="100" name="description" id="description"><?php echo isset($edit['description'])?$edit['description']:'';?></textarea>
								</div>
								<div class="row col-md-12 mb-3 banner">
									<div class="col-md-6 mb-3">
										<label for="banner_img">Banner image* (1920*745)</label>
										<input class="form-control" id="banner_img" type="file" accept="image/jpeg,image/png,image/jpg" name="file" <?php echo isset($edit['image']) ? '':'required'?>>
									</div>
									<div class="col-md-6 mb-3">
										<label for="banner_img">Banner image alt text</label>
										<input class="form-control" type="text" name="image_alt" value="<?php echo isset($edit['image_alt'])?$edit['image_alt']:'';?>" placeholder="Enter image alt">
									</div>
								</div>
								<?php if (isset($edit['image']) && !empty($edit['image'])){?>
									<div class="col-md-12 mb-3 banner banner-img">
										<img  style="width:100px;height:auto;"  src="<?php echo base_url($edit['image']);?>" class="img-fluid"/>
									</div>
								<?php }?>                               
								<div class="col-md-2 mb-3 align-self-center">
									<div class="custom-control custom-switch">
										<input type="checkbox" class="custom-control-input" name="is_button" id="is_button" value="1" <?php echo isset($edit['is_button']) ? $edit['is_button'] == 1 ? 'checked':'':'';?>>
										<label class="custom-control-label" for="is_button">Button</label>
									</div>
								</div>
								<div class="col-md-2 mb-3 align-self-center">
									<div class="custom-control custom-switch">
										<input type="checkbox" class="custom-control-input" name="status" id="status" value="1" <?php echo isset($edit['status'])?$edit['status'] == 1 ? 'checked':'':'';?>>
										<label class="custom-control-label" for="status">Active/Inactive</label>
									</div>
								</div>
								<div class="col-md-8 mb-3" style="display: <?php echo isset($edit['is_button']) ? $edit['is_button'] == 1 ? 'block':'none':'none';?>" id="routing">
									<input class="form-control" type="url" name="routing_url" id="routing_url" value="<?php echo isset($edit['routing_url'])?$edit['routing_url']:'';?>" placeholder="Enter Routing URL">
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const fileInput = document.getElementById('banner_img');
    if (fileInput) {
        fileInput.addEventListener('change', function() {
            const file = fileInput.files[0];
						const validImageTypes = ['image/jpeg', 'image/png', 'image/jpg', 'image/webp'];
            const maxSize = 2 * 1024 * 1024; // 2MB

            if (file) {
                if (!validImageTypes.includes(file.type)) {
									toastr.error('Please upload a valid image (JPEG, PNG, JPG, WebP)', "Error");
                    fileInput.value = ''; // Clear the input
                } else if (file.size > maxSize) {
										toastr.error('File size must be less than 2MB', "Error");
                    fileInput.value = ''; // Clear the input
                }
            }
        });
    }
});
</script>
<!-- begin::main content -->
<main class="main-content">

	<div class="container">

		<!-- begin::page header -->
		<div class="page-header">
			<h3><?php echo $page_title;?></h3>
			<nav aria-label="breadcrumb">
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="<?php echo base_url('superadmin/administrator/index');?>">Dashboard</a></li>
					<li class="breadcrumb-item"><a href="<?php echo base_url('superadmin/administrator/Testimonial');?>">Testimonial</a></li>
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
									<label for="name">Brand*</label>
									<select name="brand" class="form-control select2" required>
									<option value="" disabled>Select Brand</option>
										<?php foreach ($brand as $value){?>
											<option value="<?php echo $value->name;?>" <?php echo isset($edit['brand'])?($edit['brand'] == $value->name ? 'selected' : ''):'';?>>
															<?php echo $value->name;?>
													</option>
										<?php }?>
									</select>
								</div>
								<div class="col-md-4 mb-3">
									<label for="name">Testimonial Category*</label>
									<select name="testti_cat_id[]" class="form-control select2" multiple required>
											<option value="" disabled>Select categories</option>
											<?php foreach ($Testimonial_category as $value): ?>
													<option value="<?php echo $value->id;?>" <?php echo (isset($selected_categories) && in_array($value->id, $selected_categories)) ? 'selected' : ''; ?>>
															<?php echo $value->name;?>
													</option>
											<?php endforeach; ?>
									</select>
								</div>
								<div class="col-md-4 mb-3">
									<label for="clientName">Client Name*</label>
									<input class="form-control" name="client_name" value="<?php echo isset($edit['client_name'])?$edit['client_name']:'';?>" placeholder="Enter Client Name" required>
								</div>
								<div class="col-md-4 mb-3">
									<label for="CompanyName">Company Name</label>
									<input class="form-control" name="company_name" value="<?php echo isset($edit['company_name'])?$edit['company_name']:'';?>" placeholder="Enter Company Name">
								</div>
								<div class="col-md-4 mb-3" id="video">
									<label for="video">Testimonial Video</label>
									<input class="form-control" type="url" name="video_url" id="video_url" value="<?php echo isset($edit['video_url'])?$edit['video_url']:'';?>" placeholder="Enter Youtube video url">
								</div>
								<div class="col-md-4 mb-3">
									<label for="video">Testimonial Video Thumbnail Image</label>
									<input type="file" class="form-control" name="file" id="cover_img" accept="image/*" placeholder="Select a image">
								</div>
								<?php if (isset($edit['video_thumbnail']) && !empty($edit['video_thumbnail'])){?>
									<div class="col-md-12 mb-3 banner banner-img">
										<img width="100" src="<?php echo base_url($edit['video_thumbnail']);?>" class="img-fluid"/>
									</div>
								<?php }?>  
								<div class="col-md-12 mb-3">
									<label for="description">Testimonial Text</label>
									<textarea class="form-control description"  maxlength="500" name="text" id="description"><?php echo isset($edit['text'])?$edit['text']:'';?></textarea>
								</div>
								<div class="col-md-12 mb-3">
									<h6 class="card-title mb-3 text-green">Page SEO</h6>
									<hr>
								</div>
								<div class="col-md-6 mb-3">
									<label for="meta_title">Page Title</label>
									<input class="form-control" name="meta_title" value="<?php echo isset($edit['meta_title'])?$edit['meta_title']:'';?>" >
								</div>
								<div class="col-md-6 mb-3">
									<label for="meta_keyword">Page Keyword</label>
									<input class="form-control" name="meta_keyword" value="<?php echo isset($edit['meta_keyword'])?$edit['meta_keyword']:'';?>" >
								</div>
								<div class="col-md-12 mb-3">
									<label for="meta_desc">Page Description</label>
									<input class="form-control" name="meta_desc" value="<?php echo isset($edit['meta_desc'])?$edit['meta_desc']:'';?>" >
								</div>
								<div class="col-md-2 mb-3">
									<label for="order">Order No.</label>
									<input class="form-control" type="number" min="0" name="order_no" id="order" value="<?php echo isset($edit['order_no'])?$edit['order_no']:'';?>" placeholder="Enter Order No.">
								</div>
								<div class="col-md-2 mb-3 align-self-end">
									<div class="custom-control custom-switch">
										<input type="checkbox" class="custom-control-input" name="status" id="status" value="1" <?php echo isset($edit['status'])?$edit['status'] == 1 ? 'checked':'':'';?>>
										<label class="custom-control-label" for="status">Active/Inactive</label>
									</div>
								</div>
								<div class="col-md-2 mb-3 align-self-end">
									<div class="custom-control custom-switch">
										<input type="checkbox" class="custom-control-input" name="home" id="home" value="1" <?php echo isset($edit['home'])?$edit['home'] == 1 ? 'checked':'':'';?>>
										<label class="custom-control-label" for="home">Home Page</label>
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
<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
	$('.select2').select2();
});
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const fileInput = document.getElementById('cover_img');
    if (fileInput) {
        fileInput.addEventListener('change', function() {
            const file = fileInput.files[0];
            const validImageTypes = ['image/jpeg', 'image/png', 'image/jpg', 'image/webp', 'image/gif'];
            const maxSize = 2 * 1024 * 1024; // 2MB

            if (file) {
                if (!validImageTypes.includes(file.type)) {
										toastr.error('Please upload a valid image (JPEG, PNG, JPG, gif, webp)', "Error");
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
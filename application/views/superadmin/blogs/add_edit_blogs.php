<!-- begin::main content -->
<main class="main-content">

	<div class="container">

		<!-- begin::page header -->
		<div class="page-header">
			<h3><?php echo $page_title;?></h3>
			<nav aria-label="breadcrumb">
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="<?php echo base_url('superadmin/administrator/index');?>">Dashboard</a></li>
					<li class="breadcrumb-item"><a href="<?php echo base_url('superadmin/administrator/BlogsCategory');?>">Blogs Category</a></li>
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
									<label for="name">Blogs Category*</label>
									<select name="blog_cat_id[]" class="form-control select2" multiple required>
											<option value="" disabled>Select categories</option>
											<?php foreach ($blogs_category as $value): ?>
													<option value="<?php echo $value->id;?>" <?php echo (isset($selected_categories) && in_array($value->id, $selected_categories)) ? 'selected' : ''; ?>>
															<?php echo $value->name;?>
													</option>
											<?php endforeach; ?>
									</select>
								</div>
								<div class="col-md-6 mb-3">
									<label for="blogtitle">Title*</label>
									<input class="form-control" name="title" value="<?php echo isset($edit['title'])?$edit['title']:'';?>" placeholder="Enter Blog title" required>
								</div>
								<div class="col-md-3 mb-3">
									<label for="blog_date">Date</label>
									<input class="form-control" name="blog_date" value="<?php echo isset($edit['blog_date'])?$edit['blog_date']:'';?>" type="date" required>
								</div>
								<div class="col-md-4 mb-3">
									<label for="author">Author*</label>
									<input class="form-control" name="author" value="<?php echo isset($edit['author'])?$edit['author']:'';?>" placeholder="Enter Author Name" required>
								</div>
								<div class="col-md-4 mb-3">
									<label for="img">Image</label>
									<input type="file" class="form-control" id="cover_img" name="file" accept="image/jpeg,image/png,image/jpg" placeholder="Select a image" <?php echo isset($edit['image']) ? '':'required'?>>
								</div>
								<div class="col-md-4 mb-3">
									<label for="image_alt">Image Alt</label>
									<input class="form-control" name="image_alt" value="<?php echo isset($edit['image_alt'])?$edit['image_alt']:'';?>" placeholder="Enter Image alt tag" required>
								</div>
								<?php if (isset($edit['image']) && !empty($edit['image'])){?>
									<div class="col-md-12 mb-3">
										<img src="<?php echo base_url($edit['image']);?>" class="img-fluid"/>
									</div>
								<?php }?>
								<div class="col-md-12 mb-3">
									<label for="editor">Content</label>
									<textarea class="form-control editor" name="content" id="editor" required><?php echo isset($edit['content'])?$edit['content']:'';?></textarea>
								</div>
								<div class="col-md-12 mb-3">
									<h6 class="card-title mb-3 text-green">Blogs SEO</h6>
									<hr>
								</div>
								<div class="col-md-6 mb-3">
									<label for="meta_title">Page Title</label>
									<input class="form-control" name="meta_title" value="<?php echo isset($edit['meta_title'])?$edit['meta_title']:'';?>" required>
								</div>
								<div class="col-md-6 mb-3">
									<label for="meta_keyword">Page Keyword</label>
									<input class="form-control" name="meta_keyword" value="<?php echo isset($edit['meta_keyword'])?$edit['meta_keyword']:'';?>" required>
								</div>
								<div class="col-md-12 mb-3">
									<label for="meta_desc">Page Description</label>
									<input class="form-control" name="meta_desc" value="<?php echo isset($edit['meta_desc'])?$edit['meta_desc']:'';?>" required>
								</div>
								<div class="col-md-2 mb-3">
									<label for="order">Order No.*</label>
									<input class="form-control" type="number" min="0" name="order_no" id="order" value="<?php echo isset($edit['order_no'])?$edit['order_no']:'';?>" placeholder="Enter Order No." required>
								</div>
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
<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
	
	$('.select2').select2({});
});
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const fileInput = document.getElementById('cover_img');
    if (fileInput) {
        fileInput.addEventListener('change', function() {
            const file = fileInput.files[0];
            const validImageTypes = ['image/jpeg', 'image/png', 'image/jpg'];
            const maxSize = 2 * 1024 * 1024; // 2MB

            if (file) {
                if (!validImageTypes.includes(file.type)) {
										toastr.error('Please upload a valid image (JPEG, PNG, JPG)', "Error");
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
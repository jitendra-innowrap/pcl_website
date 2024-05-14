<!-- begin::main content -->
<main class="main-content">

	<div class="container">

		<!-- begin::page header -->
		<div class="page-header">
			<h3><?php echo $page_title; ?></h3>
			<nav aria-label="breadcrumb">
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="<?php echo base_url('superadmin/administrator/index'); ?>">Dashboard</a>
					</li>
					<li class="breadcrumb-item"><a
								href="<?php echo base_url('superadmin/administrator/BlogsCategory'); ?>">Blogs
							Category</a></li>
					<li class="breadcrumb-item active" aria-current="page"><?php echo $page_title; ?></li>
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
								<div class="col-md-12 mb-3">
									<label for="Title">Title*</label>
									<input class="form-control" name="title"
										   value="<?php echo isset($edit['title']) ? $edit['title'] : ''; ?>"
										   placeholder="Enter Webinar title" required>
								</div>
								<div class="col-md-4 mb-3">
									<label for="webinar_date">Date</label>
									<input class="form-control" name="webinar_date"
										   value="<?php echo isset($edit['date']) ? $edit['date'] : ''; ?>" type="date"
										   required>
								</div>
								<div class="col-md-2 mb-3">
									<label for="author">From Time*</label>
									<input class="form-control" type="time" name="from_time"
										   value="<?php echo isset($edit['from_time']) ? $edit['from_time'] : ''; ?>"
										   placeholder="Select from time" required>
								</div>
								<div class="col-md-2 mb-3">
									<label for="author">To Time*</label>
									<input class="form-control" type="time" name="to_time"
										   value="<?php echo isset($edit['to_time']) ? $edit['to_time'] : ''; ?>"
										   placeholder="Select to time" required>
								</div>
								<div class="col-md-4 mb-3">
									<label for="name">Speakers*</label>
									<select name="speakers[]" class="form-control speakers" required multiple>
										<option value="" disabled>Select speakers</option>
										<?php foreach ($speakers as $key => $speaker) { ?>
											<option value="<?php echo $speaker->id; ?>"
													<?php if (isset($webinar_speaker)) {
														foreach ($webinar_speaker as $item) {
															echo isset($item->speaker_id) ? $item->speaker_id == $speaker->id ? 'selected' : '' : '';
														}
													} ?>><?php echo $speaker->name; ?></option>
										<?php } ?>
									</select>
								</div>
								<div class="col-md-12 mb-3">
									<label for="youtube">Youtube URL*</label>
									<input class="form-control" name="video_url"
										   value="<?php echo isset($edit['video_url']) ? $edit['video_url'] : ''; ?>"
										   placeholder="Enter valid youtube url" required>
								</div>
								<div class="col-md-4 mb-3">
									<label for="img">Image</label>
									<input type="file" class="form-control" name="file" accept="image/jpeg,image/png,image/jpg" placeholder="Select a image" <?php echo isset($edit['image']) ? '':'required'?>>
								</div>
								<?php if (isset($edit['image_medium']) && !empty($edit['image_medium'])){?>
									<div class="col-md-12 mb-3">
										<img src="<?php echo base_url($edit['image_medium']);?>" style="max-height: 150px" class="img-fluid"/>
									</div>
								<?php }?>
								<div class="col-md-12 mb-3">
									<label for="editor">Content</label>
									<textarea class="form-control editor" name="content" id="editor"
											  required><?php echo isset($edit['description']) ? $edit['description'] : ''; ?></textarea>
								</div>
								<div class="col-md-12 mb-3">
									<h6 class="card-title mb-3 text-green">Page SEO</h6>
									<hr>
								</div>
								<div class="col-md-6 mb-3">
									<label for="meta_title">Page Title</label>
									<input class="form-control" name="meta_title"
										   value="<?php echo isset($edit['meta_title']) ? $edit['meta_title'] : ''; ?>"
										   required>
								</div>
								<div class="col-md-6 mb-3">
									<label for="meta_keyword">Page Keyword</label>
									<input class="form-control" name="meta_keyword"
										   value="<?php echo isset($edit['meta_keyword']) ? $edit['meta_keyword'] : ''; ?>"
										   required>
								</div>
								<div class="col-md-12 mb-3">
									<label for="meta_desc">Page Description</label>
									<input class="form-control" name="meta_desc"
										   value="<?php echo isset($edit['meta_description']) ? $edit['meta_description'] : ''; ?>"
										   required>
								</div>
								<div class="col-md-2 mb-3">
									<label for="order">Order No.*</label>
									<input class="form-control" type="number" min="0" name="order_no" id="order"
										   value="<?php echo isset($edit['order_no']) ? $edit['order_no'] : ''; ?>"
										   placeholder="Enter Order No." required>
								</div>
								<div class="col-md-2 mb-3 align-self-end">
									<div class="custom-control custom-switch">
										<input type="checkbox" class="custom-control-input" name="status" id="status"
											   value="1" <?php echo isset($edit['status']) ? $edit['status'] == 1 ? 'checked' : '' : ''; ?>>
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

<link href="<?php echo base_url()?>/assets/multi-photo/css/main.css" rel="stylesheet" type="text/css">
<style>
	.delete-image{
		background: transparent;
    border: none;
    color: red;
    cursor: pointer;
	}
	.preview-image{
		width: 100%;
		height:auto;
		max-height:90px;
		min-height:90px;
	}
	.video-preview-image{
		width: 100%;
		max-width: 60px;
		height:auto;
		max-height:60px;
		min-height:60px;
		margin-right:10px;
		margin-top:5px;
	}
</style>
<!-- begin::main content -->
<main class="main-content">

	<div class="container">

		<!-- begin::page header -->
		<div class="page-header">
			<h3><?php echo $page_title;?></h3>
			<nav aria-label="breadcrumb">
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="<?php echo base_url('superadmin/administrator/index');?>">Dashboard</a></li>
					<li class="breadcrumb-item"><a href="<?php echo base_url('superadmin/administrator/SuccessStory');?>">Success Story</a></li>
					<li class="breadcrumb-item active" aria-current="page"><?php echo $page_title;?></li>
				</ol>
			</nav>
		</div>
		<!-- end::page header -->

		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-body">
						<form method="post" class="needs-validation" novalidate="" id="my-form" enctype="multipart/form-data">
							<div class="form-row">
								<div class="col-md-4 mb-3">
									<label for="name">Brand*</label>
									<select name="brand" class="form-control select2" required>
										<option value="" disabled>Select categories</option>
										<option value="House_of_Vivaah" 	<?php echo isset($edit['brand'])?($edit['brand'] == 'House_of_Vivaah' ? 'selected' : ''):'';?>>House of Vivaah</option>
										<option value="Vows_Vachan" 	<?php echo isset($edit['brand'])?($edit['brand'] == 'Vows_Vachan' ? 'selected' : ''):'';?> >Vows Vachan</option>
										<option value="Event_Factory" 	<?php echo isset($edit['brand'])?($edit['brand'] == 'Event_Factory' ? 'selected' : ''):'';?> >Event Factory</option>
										<option value="Live_Space" 	<?php echo isset($edit['brand'])?($edit['brand'] == 'Live_Space' ? 'selected' : ''):'';?> >Live Space</option>
									</select>
								</div>
								<div class="col-md-4 mb-3">
									<label for="name">Success Story Category*</label>
									<select name="case_s_id[]" class="form-control select2" multiple required>
										<option value="" disabled>Select categories</option>
										<?php foreach ($casestudies_category as $value){?>
											<option value="<?php echo $value->id;?>" <?php echo (isset($selected_categories) && in_array($value->id, $selected_categories)) ? 'selected' : ''; ?>>
															<?php echo $value->name;?>
													</option>
										<?php }?>
									</select>
								</div>
								<?php if (isset($testimonial_video)){ ?>
									<div class="col-md-4 mb-3">
											<label for="testimonial_video">Select Testimonial Video</label>
											<select name="testimonial_video" class="form-control select2">
													<option value="" selected>Select Testimonial Video</option>
													<?php foreach ($testimonial_video as $testimonial) { 
															$brand = str_replace('_', ' ', $testimonial['brand']);
															$optionText = $testimonial['client_name'] . ' | ' . $brand . ' | ' . $testimonial['categories'];
													?>
															<option value="<?php echo $testimonial['id']; ?>" <?php echo isset($edit['testimonial'])?($edit['testimonial'] == $testimonial['id'] ? 'selected' : ''):'';?>>
																	<?php echo $optionText; ?>
															</option>
													<?php } ?>
											</select>
									</div>
								<?php } ?>
								<div class="col-md-4 mb-3">
									<label for="client_name">Client Name*</label>
									<input class="form-control" name="client_name" value="<?php echo isset($edit['client_name'])?$edit['client_name']:'';?>" placeholder="Enter Client Name" required>
								</div>
								<div class="col-md-4 mb-3">
									<label for="img">Cover Photo</label>
									<input type="file" class="form-control" name="cover_photo" accept="image/jpeg,image/png,image/jpg" placeholder="Select a cover photo" <?php echo isset($edit['image']) ? '':'required'?>>
								</div>
								<div class="col-md-4 mb-3">
									<label for="image_alt">Cover Photo Alt</label>
									<input class="form-control" name="image_alt" value="<?php echo isset($edit['image_alt'])?$edit['image_alt']:'';?>" placeholder="Enter Image alt tag">
								</div>
								<?php if (isset($edit['image']) && !empty($edit['image'])){?>
									<div class="col-md-12 mb-3">
										<img style="max-width:100px;height:auto;" src="<?php echo base_url($edit['image']);?>" class="img-fluid"/>
									</div>
								<?php }?>
								<div class="col-md-12 mb-3">
									<label for="editor">Description</label>
									<textarea class="form-control editor" name="content" id="editor" required><?php echo isset($edit['content'])?$edit['content']:'';?></textarea>
								</div>
								<div class="col-md-12 mb-3">
									<label for="editor">Photos</label>
									<div class="multiple-uploader" id="multiple-uploader">
										<div class="mup-msg">
												<span class="mup-main-msg">click to upload images.</span>
												<span class="mup-msg" id="max-upload-number">Upload up to 25 images</span>
												<span class="mup-msg">Only images files are allowed for upload</span>
										</div>
									</div>
								</div>
								<?php if (isset($existing_images) && !empty($existing_images)){?>
									<div class="row col-md-12 mb-3">
										<?php foreach ($existing_images as $index => $image){ ?>
											<div class="col-md-2" id="delete-box-<?php echo $image['id']; ?>">
												<img src="<?php echo base_url($image['photo']);?>" class="img-fluid preview-image"/></br>
												<button class="delete-image" data-id="<?php echo $image['id']; ?>">Delete</button>
											</div>
										<?php } ?>
									</div>
								<?php }?>
								<div class="col-md-12 mb-3">
									<label for="editor">Videos</label><button type="button" class="btn btn-success add-more-btn mb-2 ml-3">Add</button>
									<div id="video-rows">
										<?php if (isset($existing_videos)){
										foreach ($existing_videos as $index => $video){ ?>
											<div class="row mt-2" id="delete-viedo-box-<?php echo $video['id']; ?>">
													<div class="col-md-4">
															<label for="youtube_url_edit-<?php echo $index; ?>">YouTube URL</label>
															<input type="url" class="form-control" data-id="<?php echo $video['id']; ?>" value="<?php echo isset($video['video_url'])?$video['video_url']:'';?>" id="youtube_url_edit-<?php echo $index; ?>" name="youtube_url_edit[]" placeholder="Enter YouTube URL" required>
													</div>
													<div class="col-md-4">
															<label for="thumbnail_edit-<?php echo $index; ?>">Video Thumbnail</label>
															<input type="file" class="form-control" data-id="<?php echo $video['id']; ?>" id="thumbnail_edit-<?php echo $index; ?>" name="thumbnail_edit[]" accept="image/*">
													</div>
													<div class="col-md-4">
														<input type="hidden" value="<?php echo $video['id']; ?>" name="videos_edit_id[]" >
														<img src="<?php echo base_url($video['video_thumbnail_url']);?>" class="img-fluid video-preview-image"/>
															<button type="button" data-id="<?php echo $video['id']; ?>" class="btn btn-danger delete-video mt-4">Delete</button>
													</div>
											</div>
										<?php } } ?>
									</div>
								</div>
								<div class="col-md-12 mb-3">
									<h6 class="card-title mb-3 text-green">Page SEO</h6>
									<hr>
								</div>
								<div class="col-md-6 mb-3">
									<label for="meta_title">Page Title</label>
									<input class="form-control" name="meta_title" value="<?php echo isset($edit['meta_title'])?$edit['meta_title']:'';?>">
								</div>
								<div class="col-md-6 mb-3">
									<label for="meta_keyword">Page Keyword</label>
									<input class="form-control" name="meta_keyword" value="<?php echo isset($edit['meta_keyword'])?$edit['meta_keyword']:'';?>">
								</div>
								<div class="col-md-12 mb-3">
									<label for="meta_desc">Page Description</label>
									<input class="form-control" name="meta_desc" value="<?php echo isset($edit['meta_desc'])?$edit['meta_desc']:'';?>" >
								</div>
								<div class="col-md-2 mb-3">
									<label for="order">Order No.*</label>
									<input class="form-control" type="number" min="0" name="order_no" id="order" value="<?php echo isset($edit['order_no'])?$edit['order_no']:'';?>" placeholder="Enter Order No." >
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
<script src="<?php echo base_url()?>assets/multi-photo/js/multiple-uploader.js"></script>
<script>
	 var existing_images_count = <?php echo isset($existing_images) && !empty($existing_images) ? count($existing_images) : 0; ?>;
    let multipleUploader = new MultipleUploader('#multiple-uploader').init({
        maxUpload : 25 - existing_images_count , // maximum number of uploaded images
        maxSize:2, // in size in mb
        filesInpName:'images', // input name sent to backend
        formSelector: '#my-form', // form selector
    });
</script>
<script>
$(document).ready(function() {
	$('.select2').select2();
	var existing_video_count = <?php echo isset($existing_videos) && !empty($existing_videos) ? count($existing_videos) : 0; ?>;
    var maxRows = 10;
    var rowCount = 0 + existing_video_count;

    function updateRowIndices() {
        $('#video-rows .row-container').each(function(index) {
            $(this).find('input[type="url"]').attr('id', 'youtube_url-' + index).attr('name', 'youtube_url[]');
            $(this).find('input[type="file"]').attr('id', 'thumbnail-' + index).attr('name', 'thumbnail[]');
        });
    }

    $('.add-more-btn').on('click', function() {
        if (rowCount < maxRows) {
            var newRow = `
            <div class="row row-container">
                <div class="col-md-4">
                    <label for="youtube_url-${rowCount}">YouTube URL</label>
                    <input type="url" class="form-control" id="youtube_url-${rowCount}" name="youtube_url[]" placeholder="Enter YouTube URL" required>
                </div>
                <div class="col-md-4">
                    <label for="thumbnail-${rowCount}">Video Thumbnail</label>
                    <input type="file" class="form-control" id="thumbnail-${rowCount}" name="thumbnail[]" accept="image/*" required>
                </div>
                <div class="col-md-2">
                    <button type="button" class="btn btn-danger remove-btn mt-4">Delete</button>
                </div>
            </div>`;
            $('#video-rows').append(newRow);
            rowCount++;
            updateRowIndices();
        } else {
						toastr.error('You can only add up to ' + maxRows + ' rows.', "Error");
        }
    });

    $('#video-rows').on('click', '.remove-btn', function() {
        $(this).closest('.row-container').remove();
        rowCount--;
        updateRowIndices();
    });
		
		$('.delete-image').click(function() {
			event.preventDefault();
			
        var imageId = $(this).data('id');
        var deleteBox = $('#delete-box-' + imageId);

        $.ajax({
            url: '<?php echo base_url("superadmin/administrator/delete_image"); ?>',
            type: 'POST',
            data: { imageId: imageId }, // Send the imageId as an object
            dataType: 'json', // Expect a JSON response
            success: function(response) {
                // Handle success response
                if (response.code === 1) { // Adjusted to check for 'code' instead of 'success'
                    deleteBox.fadeOut('slow', function() {
                        $(this).remove();
                    });
                } else {
										toastr.error('Error deleting image', "Error");
                }
            },
            error: function(xhr, status, error) {
                // Handle error response
								toastr.error('Error deleting image', "Error");
            }
        });
    });
		
		$('.delete-video').click(function() {
			event.preventDefault();
			
        var videoId = $(this).data('id');
        var deleteBox = $('#delete-viedo-box-' + videoId);

        $.ajax({
            url: '<?php echo base_url("superadmin/administrator/delete_video"); ?>',
            type: 'POST',
            data: { videoId: videoId }, // Send the videoId as an object
            dataType: 'json', // Expect a JSON response
            success: function(response) {
                // Handle success response
                if (response.code === 1) { // Adjusted to check for 'code' instead of 'success'
                    deleteBox.fadeOut('slow', function() {
                        $(this).remove();
                    });
                } else {
									toastr.error('Error deleting image', "Error");
                }
            },
            error: function(xhr, status, error) {
                // Handle error response
								toastr.error('Error deleting image', "Error");
            }
        });
    });
	
});
</script>

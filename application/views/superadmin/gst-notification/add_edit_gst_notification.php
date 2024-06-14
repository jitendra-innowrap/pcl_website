<!-- begin::main content -->
<main class="main-content">

	<div class="container-fluid">

		<!-- begin::page header -->
		<div class="page-header">
			<h3><?php echo $page_title;?></h3>
			<nav aria-label="breadcrumb">
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="<?php echo base_url('superadmin/administrator/index');?>">Dashboard</a></li>
					<li class="breadcrumb-item"><a href="<?php echo base_url('superadmin/administrator/manage_report_policies');?>">Report And Policies</a></li>
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
										<label for="name">Type*</label>
										<select name="type" class="form-control type_select2"  required>
												<option value="">Select Type</option>
												<option value="1">Company Internal Policy</option>
												<option value="2">Investor Relation</option>
										</select>
								</div>
								<div class="col-md-4 mb-3 div-investor-relation d-none">
										<label for="name">Category</label>
										<select name="category" class="form-control category category_select2" id="category-select">
												<option value="">Select Category</option>
										</select>
								</div>
								<div class="col-md-4 mb-3 div-investor-relation-sub d-none">
										<label for="name">Sub Category</label>
										<select name="sub_category" class="form-control sub_category sub_category_select2" id="sub_category-select">
												<option value="">Select Sub Category</option>
										</select>
								</div>
								<div class="col-md-4 mb-3 div-investor-relation-sub d-none">
										<label for="name">Sub Category 2</label>
										<select name="sub_category_2" class="form-control sub_category_2 sub_category_2_select2" id="sub_category_2-select">
												<option value="">Select Sub Category 2</option>
										</select>
								</div>
								<div class="col-md-4 mb-3 div-investor-relation-sub d-none">
									<label for="">Table Label Column Title</label>
									<input class="form-control" name="label_title" value="<?php echo isset($edit['label_title'])?$edit['label_title']:'';?>" placeholder="Enter Table Label Column Title">
								</div>
								<div class="col-md-4 mb-3 div-investor-relation-sub d-none">
									<label for="">Table Link Column Title</label>
									<input class="form-control" name="link_title" value="<?php echo isset($edit['link_title'])?$edit['link_title']:'';?>" placeholder="Enter Table Link Column Title">
								</div>
								<div class="col-md-4 mb-3">
									<label for="">Document Name*</label>
									<input class="form-control" name="document_name" value="<?php echo isset($edit['document_name'])?$edit['document_name']:'';?>" placeholder="Enter Document Name" required>
								</div>
								<div class="col-md-4 mb-3">
									<label for=""> Document Date</label>
									<input class="form-control" name="document_date" value="<?php echo isset($edit['document_date'])?$edit['document_date']:'';?>" type="date">
								</div>
								<div class="col-md-4 mb-3">
									<label for="img"> Upload Document file*</label>
									<input type="file" class="form-control" id="pdf_file" name="file"  accept="application/pdf" placeholder="Select a PDF Document" <?php echo isset($edit['pdf']) ? '':'required'?>>
								</div>
								<?php if (isset($edit['pdf']) && !empty($edit['pdf'])){?>
									<div class="col-md-12 mb-3">
										<a class='btn btn-sm btn-danger' target='_blank' href='<?php echo base_url($edit['pdf']);?>'>pdf</a>
									</div>
								<?php }?>
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
									<input class="form-control" type="number" min="1" name="order_no" id="order" value="<?php echo isset($edit['order_no'])?$edit['order_no']:'';?>" placeholder="Enter Order No.">
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
	
	$('.type_select2').on('change', function() {
		var type = $(this).val();
		if (type === "2") {  // Ensure type is compared as a string
				$('.div-investor-relation').removeClass('d-none');
		} else {
				$('.div-investor-relation').addClass('d-none');
				$('.div-investor-relation-sub').addClass('d-none');
		}
	});
	
	$('#category-select').on('change', function() {
		var cateory = $(this).val();
		if (cateory === "1") {  // Ensure type is compared as a string
				$('.div-investor-relation-sub').removeClass('d-none');
		} else {
				$('.div-investor-relation-sub').addClass('d-none');
		}
	});
	
	$('.type_select2').select2({});
	
	function fetchCategories(type_id, selectedCategory) {
			$.ajax({
					type: 'POST',
					url: '<?php echo base_url("superadmin/administrator/get_categories"); ?>',
					dataType: 'html',
					data: {'type_id': type_id},
					success: function(data) {
							if (data) {
									$(".category_select2").html('');
									$(".category_select2").html(data);
									if (selectedCategory) {
											$(".category_select2").val(selectedCategory).trigger('change');
									}
							}
					}
			});
	}
	
	function fetchSubCategories(type_id,category_id, selectedSubCategory) {
			$.ajax({
					type: 'POST',
					url: '<?php echo base_url("superadmin/administrator/get_sub_categories"); ?>',
					dataType: 'html',
					data: {
							'type_id': type_id,
							'category_id': category_id
					},
					success: function(data) {
							if (data) {
								$(".sub_category_select2").html('');
								$(".sub_category_select2").html(data);
									if (selectedSubCategory) {
											$(".sub_category_select2").val(selectedSubCategory).trigger('change');
									}
							}
					}
			});
	}
	
	function fetchSubCategories2(type_id,category_id, sub_category_id, selectedSubCategory2) {
			$.ajax({
					type: 'POST',
					url: '<?php echo base_url("superadmin/administrator/get_sub_categories_2"); ?>',
					dataType: 'html',
					data: {
							'type_id': type_id,
							'category_id': category_id,
							'sub_category_id': sub_category_id
					},
					success: function(data) {
							if (data) {
								$(".sub_category_2_select2").html('');
								$(".sub_category_2_select2").html(data);
									if (selectedSubCategory2) {
											$(".sub_category_2_select2").val(selectedSubCategory2).trigger('change');
									}
							}
					}
			});
	}
	
	$(document).on("change", ".type_select2", function () {
		var type_id = $(this).val();
		if(type_id)
		{
			<?php if (isset($edit['category'])): ?>
					var selectedCategoryId = "<?php echo $edit['category']; ?>";
					fetchCategories(type_id, selectedCategoryId);
			<?php else: ?>
				fetchCategories(type_id, null);
			<?php endif; ?>
		}
	});
	
	$('.category_select2').select2({
			language: {
					// noResults: function() {
					// 		return '<div class="select2-link d-grid gap-2"><a href="javascript:void(0);" class="btn btn-outline-success add_category_btn">Add New</a></div>';
					// }
			},
			escapeMarkup: function(markup) {
					return markup;
			}
	});
	
	$(document).on("click", ".add_category_btn", function () {
			var type_id = $(".type_select2").val();
			if (!type_id) {
					toastr.error("Please select a type first.", "Error");
					setTimeout(function() {
							$('.category_select2').select2('close');
					}, 100);
					return;
			}

			var newCategoryName = $(".category").data("select2").dropdown.$search.val();
			if (newCategoryName) {
				$.ajax({
						type: 'POST',
						url: '<?php echo base_url("superadmin/administrator/add_category"); ?>',
						data: {
								'type_id': type_id,
								'name': newCategoryName
						},
						success: function(response) {
								var result = JSON.parse(response);
								if (result.status) {
									var newOption = new Option(result.name, result.id, false, false);
									$(".category_select2").append(newOption).trigger('change');
									toastr.success("Successfully saved", "Success");
									$(".category_select2").val(result.id).trigger('change');
									setTimeout(function() {
											$('.category_select2').select2('close');
									}, 100);
								} else {
										toastr.error(result.message, "Error");
								}
						},
						error: function(xhr, status, error) {
								toastr.error("Error adding category", "Error");
						}
				});
			}
	});
	
	$(document).on("change", ".category", function () {
		var type_id = $(".type_select2").val();
		var category_id = $(this).val();
		if(type_id || category_id)
		{
			<?php if (isset($edit['sub_category'])): ?>
				var selectedSubCategoryId = "<?php echo $edit['sub_category']; ?>";
				fetchSubCategories(type_id, category_id, selectedSubCategoryId);
			<?php else: ?>
				fetchSubCategories(type_id, category_id, null);
			<?php endif; ?>
		}
	});
	
	$('.sub_category_select2').select2({
			language: {
					noResults: function() {
							return '<div class="select2-link d-grid gap-2"><a href="javascript:void(0);" class="btn btn-outline-success add_sub_category_btn">Add New</a></div>';
					}
			},
			escapeMarkup: function(markup) {
					return markup;
			}
	});
	
	$(document).on("click", ".add_sub_category_btn", function () {
		var type_id = $(".type_select2").val();
		if (!type_id) {
				toastr.error("Please select a type first.", "Error");
				setTimeout(function() {
						$('.sub_category_select2').select2('close');
				}, 100);
				return;
		}
		
		var category_id = $(".category").val();
		if (!category_id) {
				toastr.error("Please select a category first.", "Error");
				setTimeout(function() {
						$('.sub_category_select2').select2('close');
				}, 100);
				return;
		}

		var newCategoryName = $(".sub_category").data("select2").dropdown.$search.val();
		if (newCategoryName) {
			$.ajax({
					type: 'POST',
					url: '<?php echo base_url("superadmin/administrator/add_sub_category"); ?>',
					data: {
							'type_id': type_id,
							'category_id': category_id,
							'name': newCategoryName
					},
					success: function(response) {
							var result = JSON.parse(response);
							if (result.status) {
								var newOption = new Option(result.name, result.id, false, false);
								$(".sub_category_select2").append(newOption).trigger('change');
								toastr.success("Successfully saved", "Success");
								$(".sub_category_select2").val(result.id).trigger('change');
								setTimeout(function() {
										$('.sub_category_select2').select2('close');
								}, 100);
							} else {
									toastr.error(result.message, "Error");
							}
					},
					error: function(xhr, status, error) {
							toastr.error("Error adding category", "Error");
					}
			});
		}
	});
	
	$(document).on("change", ".sub_category", function () {
		var type_id = $(".type_select2").val();
		var category_id = $(".category").val();
		var sub_category_id = $(this).val();
		if(type_id || category_id || sub_category_id)
		{
			<?php if (isset($edit['sub_category_2'])): ?>
				var selectedSubCategoryId2 = "<?php echo $edit['sub_category_2']; ?>";
				fetchSubCategories2(type_id, category_id, sub_category_id, selectedSubCategoryId2);
			<?php else: ?>
				fetchSubCategories2(type_id, category_id, sub_category_id, null);
			<?php endif; ?>
		}
	});
	
	$('.sub_category_2_select2').select2({
			language: {
					noResults: function() {
							return '<div class="select2-link d-grid gap-2"><a href="javascript:void(0);" class="btn btn-outline-success add_sub_category_2_btn">Add New</a></div>';
					}
			},
			escapeMarkup: function(markup) {
					return markup;
			}
	});
	
	$(document).on("click", ".add_sub_category_2_btn", function () {
		var type_id = $(".type_select2").val();
		if (!type_id) {
				toastr.error("Please select a type first.", "Error");
				setTimeout(function() {
						$('.sub_category_2_select2').select2('close');
				}, 100);
				return;
		}
		
		var category_id = $(".category").val();
		if (!category_id) {
				toastr.error("Please select a category first.", "Error");
				setTimeout(function() {
						$('.sub_category_2_select2').select2('close');
				}, 100);
				return;
		}
		
		var sub_category_id = $(".sub_category").val();
		if (!sub_category_id) {
				toastr.error("Please select a sub category first.", "Error");
				setTimeout(function() {
						$('.sub_category_2_select2').select2('close');
				}, 100);
				return;
		}

		var newCategoryName = $(".sub_category_2").data("select2").dropdown.$search.val();
		if (newCategoryName) {
			$.ajax({
					type: 'POST',
					url: '<?php echo base_url("superadmin/administrator/add_sub_category_2"); ?>',
					data: {
							'type_id': type_id,
							'category_id': category_id,
							'sub_category_id': sub_category_id,
							'name': newCategoryName
					},
					success: function(response) {
							var result = JSON.parse(response);
							if (result.status) {
								var newOption = new Option(result.name, result.id, false, false);
								$(".sub_category_2_select2").append(newOption).trigger('change');
								toastr.success("Successfully saved", "Success");
								$(".sub_category_2_select2").val(result.id).trigger('change');
								setTimeout(function() {
										$('.sub_category_2_select2').select2('close');
								}, 100);
							} else {
									toastr.error(result.message, "Error");
							}
					},
					error: function(xhr, status, error) {
							toastr.error("Error adding category", "Error");
					}
			});
		}
	});
	
	<?php if (isset($edit['type'])): ?>
      var selectedTypeId = "<?php echo $edit['type']; ?>";
			$(".type_select2").val(selectedTypeId).trigger('change');
	<?php endif; ?>

});

</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const fileInput = document.getElementById('pdf_file');
    if (fileInput) {
        fileInput.addEventListener('change', function() {
            const file = fileInput.files[0];
            const validImageTypes = 'application/pdf';

            if (file) {
                if (!validImageTypes.includes(file.type)) {
										toastr.error('Please upload a valid file (PDF)', "Error");
                    fileInput.value = ''; // Clear the input
                }
            }
        });
    }
});
</script>
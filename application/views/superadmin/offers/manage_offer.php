<!-- begin::main content -->
<main class="main-content">

	<div class="container">

		<!-- begin::page header -->
		<div class="page-header d-md-flex align-items-center justify-content-between">
			<div>
				<h3><?php echo $page_title;?></h3>
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="<?php echo base_url('superadmin/administrator/index');?>">Dashboard</a></li>
						<li class="breadcrumb-item"><a href="<?php echo base_url('superadmin/administrator/offers');?>">Offers</a></li>
						<li class="breadcrumb-item active" aria-current="page"><?php echo $page_title;?></li>
					</ol>
				</nav>
			</div>
		</div>
		<!-- end::page header -->

		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-body">
						<form method="post" class="needs-validation" novalidate="" enctype="multipart/form-data">
							<div class="form-row">
								<div class="col-md-3 mb-3">
									<label for="name">Offers Category*</label>
									<select name="offers_categories_id" class="form-control" required>
										<option value="" disabled>Select a category</option>
										<?php foreach ($categories as $category){?>
											<option value="<?php echo $category['id'];?>" <?php echo isset($edit['offers_categories_id']) ? $edit['offers_categories_id'] == $category['id'] ? 'selected':'':'';?>><?php echo $category['category_name'];?></option>
										<?php }?>
									</select>
								</div>
								<div class="col-md-9 mb-3">
									<label for="offer_title">Offer Title*</label>
									<input class="form-control" id="offer_title" name="offer_title" value="<?php echo isset($edit['offer_title'])?$edit['offer_title']:'';?>" placeholder="Enter Offer title" required>
								</div>
								<div class="col-md-12 mb-3">
									<label for="offer_desc">Offer Description</label>
									<textarea name="offer_desc" id="offer_desc" rows="5" class="form-control"><?php echo isset($edit['offer_desc'])?$edit['offer_desc']:'';?></textarea>
								</div>
								<div class="col-md-6 mb-3">
									<label for="img">Offer Image</label>
									<input type="file" class="form-control" name="file" accept="image/jpeg,image/png,image/jpg" placeholder="Select a image" <?php echo isset($edit['offer_image']) ? '':'required'?>>
								</div>
								<div class="col-md-6 mb-3">
									<label for="offer_image_alt">Image alt</label>
									<input class="form-control" type="text" id="offer_image_alt" name="offer_image_alt" value="<?php echo isset($edit['offer_image_alt'])?$edit['offer_image_alt']:'';?>" placeholder="Enter image alt" required>
								</div>
								<div class="col-md-4 mb-3">
									<label for="route_url">Route URL</label>
									<input class="form-control" type="url" id="route_url" name="route_url" value="<?php echo isset($edit['route_url'])?$edit['route_url']:'';?>" placeholder="Enter Routing URL">
								</div>
								<div class="col-md-2 mb-3">
									<label for="order">Order No.*</label>
									<input class="form-control" type="number" min="0" name="order_no" id="order" value="<?php echo isset($edit['order_no'])?$edit['order_no']:'';?>" placeholder="Enter Order No." required>
								</div>
								<div class="col-md-auto mb-3 align-self-end d-none">
									<div class="custom-control custom-switch">
										<input type="checkbox" class="custom-control-input" name="show_on_home" id="show_on_home" value="1" <?php echo isset($edit['show_on_home'])?$edit['is_active'] == 1 ? 'checked':'':'';?>>
										<label class="custom-control-label" for="show_on_home">Home page on active/inactive</label>
									</div>
								</div>
								<div class="col-md-2 mb-3 align-self-end">
									<div class="custom-control custom-switch">
										<input type="checkbox" class="custom-control-input" name="is_active" id="is_active" value="1" <?php echo isset($edit['is_active'])?$edit['is_active'] == 1 ? 'checked':'':'';?>>
										<label class="custom-control-label" for="is_active">Active/Inactive</label>
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

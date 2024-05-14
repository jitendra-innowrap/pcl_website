<!-- begin::main content -->
<main class="main-content">

	<div class="container">

		<!-- begin::page header -->
		<div class="page-header">
			<h3><?php echo $page_title;?></h3>
			<nav aria-label="breadcrumb">
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="<?php echo base_url('superadmin/administrator/index');?>">Dashboard</a></li>
					<li class="breadcrumb-item"><a href="<?php echo base_url('superadmin/administrator/banner');?>">Ricoh Slider</a></li>
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
								<div class="col-md-10 mb-3">
									<label for="title">Banner Title</label>
									<input class="form-control" name="title" placeholder="Enter Banner Title" value="<?php echo isset($edit['title']) ? $edit['title'] :'';?>" id="title">
								</div>
								<div class="col-md-2 mb-3">
									<label for="order">Order No.*</label>
									<input class="form-control" type="number" min="0" name="order_no" id="order" value="<?php echo isset($edit['order_no'])?$edit['order_no']:'';?>" placeholder="Enter Order No." required>
								</div>
								<div class="col-md-12 mb-3">
									<label for="banner_img">Banner image*</label>
									<input class="form-control" type="file" accept="image/jpeg,image/png,image/jpg" name="file" <?php echo isset($edit['image']) ? '':'required'?>>
								</div>
								<?php if (isset($edit['image']) && !empty($edit['image'])){?>
									<div class="col-md-12 mb-3 banner banner-img">
										<img src="<?php echo base_url($edit['image']);?>" class="img-fluid" style="max-height: 200px"/>
									</div>
								<?php }?>
								<div class="col-md-4 mb-3">
									<input class="form-control" type="text" name="image_alt" value="<?php echo isset($edit['image_alt'])?$edit['image_alt']:'';?>" placeholder="Enter image alt">
								</div>
								<div class="col-md-8 mb-3" id="routing">
									<input class="form-control" type="url" name="routing_url" id="routing_url" value="<?php echo isset($edit['routing_url'])?$edit['routing_url']:'';?>" placeholder="Enter Route URL">
								</div>
								<div class="col-md-4 mb-3">
									<label for="dropdown">Form Select Dropdown</label>
									<select name="form_dropdown" class="form-control">
										<option value="" selected disabled>Select a option</option>
										<?php foreach ($form_dropdown as $item):?>
										<option value="<?= $item['id']?>" <?php echo isset($edit['form_dropdown'])?($edit['form_dropdown'] == $item['id'] ? 'selected':''):'';?>><?= $item['title']?></option>
										<?php endforeach;?>
									</select>
								</div>
								<div class="col-md-2 mb-3 align-self-center">
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

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
					<li class="breadcrumb-item"><a href="<?php echo base_url('superadmin/administrator/clientele'); ?>">Clientele</a>
					</li>
					<li class="breadcrumb-item active" aria-current="page"><?php echo $page_title; ?></li>
				</ol>
			</nav>
		</div>
		<!-- end::page header -->
		<?php
		$pages = array(
				'SaaS' => array(
						'Document Management',
						'Workflow Automation',
						'Employee records management',
						'Management of Change',
						'Procure to pay',
						'WeP GST Solution',
						'eWay Bill/eInvoice',
				),
				'SERVICES' => array(
						'Managed Print Services',
						'Managed GST Filing Services',
				),
				'PaaS' => array(
						'Low code development',
				),
				'Ricoh Products' => array(
						'Ricoh',
				)
			);
		?>
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-body">
						<form method="post" class="needs-validation" novalidate="" enctype="multipart/form-data">
							<div class="form-row">
								<div class="col-md-8 mb-3">
									<label for="name">Client Name*</label>
									<input class="form-control" name="name" placeholder="Enter client name"
										   value="<?php echo isset($edit['name']) ? $edit['name'] : ''; ?>" id="name"
										   required>
								</div>
								<div class="col-md-4 mb-3">
									<label for="logo_alt">Image alt</label>
									<input class="form-control" name="logo_alt" id="logo_alt"
										   value="<?php echo isset($edit['logo_alt']) ? $edit['logo_alt'] : ''; ?>"/>
								</div>
								<div class="col-md-4 mb-3">
									<label for="banner_img">Client logo*</label>
									<input class="form-control" type="file" accept="image/jpeg,image/png,image/jpg"
										   name="file" <?php echo isset($edit['logo']) ? '' : 'required' ?>>
								</div>
								<div class="col-md-4 mb-3 align-self-center">
									<div class="custom-control custom-switch">
										<input type="checkbox" class="custom-control-input" name="home_page"
											   id="home_page"
											   value="1" <?php echo isset($edit['home_page']) ? $edit['home_page'] == 1 ? 'checked' : '' : ''; ?>>
										<label class="custom-control-label" for="home_page">Home page in
											enabled/disabled</label>
									</div>
								</div>
								<div class="col-md-4 mb-3 align-self-center">
									<label for="h_order_no">Home page in order no.*</label>
									<input class="form-control" type="number" min="1" name="h_order_no" id="h_order_no"
										   value="<?php echo isset($edit['h_order_no']) ? $edit['h_order_no'] : ''; ?>"
										   placeholder="Enter Order No.">
								</div>
							</div>
							<div class="form-row">
								<div class="col-md-4 mb-3">
									<label for="name">Product Page*</label>
									<select name="product_page_list[]"
											class="form-control clientele" <?php echo isset($product_clientele['product_page']) ? $product_clientele['product_page'] == '' ? '' : '' : ''; ?>
											multiple>
										<?php foreach ($pages as $key => $page){
											echo '<optgroup label="'.$key.'">';
											foreach ($page as $item){ ?>
												<option value='<?php echo $item;?>' <?php if (isset($product_clientele)){ foreach ($product_clientele as $value){ echo $value->product_page == $item ? 'selected':'';} }?>><?php echo $item;?></option>
											<?php }
											echo '</optgroup>';
										}?>
									</select>
								</div>
								<div class="col-md-4 mb-3">
									<label for="order">Product page in order no.*</label>
									<input class="form-control" type="number" min="0" name="order_no" id="order"
										   value="<?php echo isset($product_clientele[0]->order_no) ? $product_clientele[0]->order_no : ''; ?>"
										   placeholder="Enter Order No.">
								</div>
								<div class="col-md-4 mb-3 align-self-center">
									<div class="custom-control custom-switch">
										<input type="checkbox" class="custom-control-input" name="product_page"
											   id="product_page"
											   value="1" <?php echo isset($is_product) ? $is_product != 0 ? 'checked' : '' : ''; ?>>
										<label class="custom-control-label" for="product_page">Product page in
											enabled/disabled</label>
									</div>
								</div>
								<?php if (isset($edit['logo']) && !empty($edit['logo'])) { ?>
									<div class="col-md-4 mb-3">
										<img src="<?php echo base_url($edit['logo']); ?>" style="max-height: 60px"
											 class="img-fluid"/>
									</div>
								<?php } ?>
							</div>
							<button type="submit" name="submit" class="btn btn-primary">Submit</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>

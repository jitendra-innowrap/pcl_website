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
									<label for="name">Investors Category*</label>
									<select name="category_id" class="form-control" required>
										<option value="" disabled>Select a category</option>
										<?php foreach ($investors_category as $value){?>
											<option value="<?php echo $value->id;?>" <?php echo isset($edit['category_id']) ? $edit['category_id'] == $value->id ? 'selected':'':'';?>><?php echo $value->name;?></option>
										<?php }?>
									</select>
								</div>
								<div class="col-md-8 mb-3">
									<label for="title">Title*</label>
									<input class="form-control" name="title" value="<?php echo isset($edit['title'])?$edit['title']:'';?>" placeholder="Enter investors title" required>
								</div>
								<div class="col-md-4 mb-3">
									<label for="img">File (PDF/JPG/PNG)</label>
									<input type="file" class="form-control" name="file" accept="image/jpeg,image/png,image/jpg,application/pdf" placeholder="Select a file" <?php echo isset($edit['image']) ?( $edit['image'] == ''?'required':''):''?>>
								</div>
								<div class="col-md-4 mb-3">
									<label for="created_date">Date</label>
									<input class="form-control" type="datetime-local" min="0" name="created_date" id="created_date" value="<?php echo isset($edit['created_date'])?date('Y-m-d',strtotime($edit['created_date'])) ."T". date('H:i:s',strtotime($edit['created_date'])) :'';?>" placeholder="Select date time" required>
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

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
					<li class="breadcrumb-item"><a href="<?php echo base_url('superadmin/administrator/BlogsCategory');?>">Blogs Category</a></li>
					<li class="breadcrumb-item active" aria-current="page"><?php echo $page_title;?></li>
				</ol>
			</nav>
			</div>
			<div>
				<?php if (!isset($_GET['id'])){?>
				<button id="add-more" class="btn btn-info btn-uppercase waves-effect waves-button waves-light">
					<i class="fa fa-plus m-r-5"></i> Add More
				</button>
				<?php }?>
			</div>
		</div>
		<!-- end::page header -->

		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-body">
						<form method="post" class="needs-validation" novalidate="" enctype="multipart/form-data">
							<div class="form-row">
								<div class="col-md-12 mb-3">
									<label for="name">FAQ Category*</label>
									<select name="faq_id" class="form-control" required>
										<option value="" disabled>Select a category</option>
										<?php foreach ($faq_category as $faq){?>
											<option value="<?php echo $faq->id;?>" <?php echo isset($edit['faq_id']) ? $edit['faq_id'] == $faq->id ? 'selected':'':'';?>><?php echo $faq->name;?></option>
										<?php }?>
									</select>
								</div>
								<div class="col-md-10 mb-3">
									<label for="question">Question*</label>
									<input class="form-control" id="question" name="question<?php echo isset($edit['question'])?'':'[]';?>" value="<?php echo isset($edit['question'])?$edit['question']:'';?>" placeholder="Enter question title" required>
								</div>
								<div class="col-md-2 mb-3">
									<label for="order">Order No.*</label>
									<input class="form-control" type="number" min="0" name="order_no<?php echo isset($edit['question'])?'':'[]';?>" id="order" value="<?php echo isset($edit['order_no'])?$edit['order_no']:'';?>" placeholder="Enter Order No." required>
								</div>
								<div class="col-md-12 mb-3" id="first-parent">
									<label for="faqanswer">Answers*</label>
									<textarea class="form-control" name="answer<?php echo isset($edit['question'])?'':'[]';?>" id="faqanswer" placeholder="Enter answer" required><?php echo isset($edit['answer'])?$edit['answer']:'';?></textarea>
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

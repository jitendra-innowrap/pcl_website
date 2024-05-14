<!-- begin::main content -->
<main class="main-content">

	<div class="container-fluid">

		<!-- begin::page header -->
		<div class="page-header">
			<h3><?php echo $page_title;?></h3>
			<nav aria-label="breadcrumb">
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="<?php echo base_url('superadmin/administrator/index');?>">Dashboard</a></li>
					<li class="breadcrumb-item"><a href="<?php echo base_url('superadmin/administrator/newroom');?>">Newsroom</a></li>
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
								<div class="col-md-6 mb-3">
									<label for="blogtitle">Title*</label>
									<input class="form-control" name="title" value="<?php echo isset($edit['title'])?$edit['title']:'';?>" placeholder="Enter title" required>
								</div>
								<div class="col-md-3 mb-3">
									<label for="blog_date">Date</label>
									<input class="form-control" name="news_date" value="<?php echo isset($edit['news_date'])?$edit['news_date']:'';?>" type="date" required>
								</div>
								<div class="col-md-3 mb-3">
									<label for="author">Author*</label>
									<input class="form-control" name="author" value="<?php echo isset($edit['author'])?$edit['author']:'';?>" placeholder="Enter Author Name" required>
								</div>
								<div class="col-md-4 mb-3">
									<label for="img">Image</label>
									<input type="file" class="form-control" name="file" accept="image/jpeg,image/png,image/jpg" placeholder="Select a image" <?php echo isset($edit['image']) ? '':'required'?>>
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
                                <div class="col-md-2 mb-3 align-self-end">
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input" name="is_url_route" id="is_url_route" value="1" <?php echo isset($edit['is_url_route'])?$edit['is_url_route'] == 1 ? 'checked':'':'';?>>
                                        <label class="custom-control-label" for="is_url_route">URL Route</label>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3 <?php echo isset($edit['is_url_route'])?$edit['is_url_route'] == 0 ? 'd-none':'':'d-none';?>" id="url_route">
                                    <label for="meta_title">Route URL</label>
                                    <input class="form-control" type="url" name="route_url" value="<?php echo isset($edit['route_url'])?$edit['route_url']:'';?>" <?php echo isset($edit['is_url_route'])?$edit['is_url_route'] == 0 ? '':'required':'';?>>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="sort_desc">Sort Description</label>
                                    <textarea class="form-control" name="sort_description" required><?php echo isset($edit['sort_description'])?$edit['sort_description']:'';?></textarea>
                                </div>
								<div class="col-md-12 mb-3" id="content" <?php echo isset($edit['is_url_route'])?$edit['is_url_route'] == 1 ? 'style="display:none"':'':'';?>>
									<label for="editor">Content</label>
									<textarea class="form-control editor" name="content" id="editor" <?php echo isset($edit['is_url_route'])?$edit['is_url_route'] == 1 ? '':'required':'required';?>><?php echo isset($edit['content'])?$edit['content']:'';?></textarea>
								</div>
								<div class="col-md-12 mb-3">
									<h6 class="card-title mb-3 text-green">Page SEO</h6>
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
									<input class="form-control" type="number" min="1" name="order_no" id="order" value="<?php echo isset($edit['order_no'])?$edit['order_no']:'';?>" placeholder="Enter Order No." required>
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

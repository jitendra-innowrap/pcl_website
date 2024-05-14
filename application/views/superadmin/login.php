<?php
$CI=&get_instance();
$query = $CI->db->get('site_config');
$ret = $query->row();
$siteName = $ret->site_title;
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title><?php echo $siteName;?> - <?php echo $page_title;?></title>

	<!-- begin::global styles -->
	<link rel="stylesheet" href="<?php echo base_url();?>adminassets/vendors/bundle.css" type="text/css">
	<!-- end::global styles -->

	<!-- begin::custom styles -->
	<link rel="stylesheet" href="<?php echo base_url();?>adminassets/css/app.min.css" type="text/css">
	<!-- end::custom styles -->

</head>
<body class="bg-white h-100-vh p-t-0">

<!-- begin::page loader-->
<div class="page-loader">
	<div class="spinner-border"></div>
	<span>Loading</span>
</div>
<!-- end::page loader -->

<div class="p-b-50 d-block d-lg-none"></div>

<div class="container h-100-vh">
	<div class="row align-items-md-center h-100-vh">
		<div class="col-lg-6 d-none d-lg-block">
			<img class="img-fluid" src="<?php echo base_url();?>adminassets/media/svg/login.svg" alt="...">
		</div>
		<div class="col-lg-4 offset-lg-1">
			<div class="m-b-20">
				<img src="<?php echo base_url($ret->logo_img);?>" class="m-r-15" height="55" alt="">
			</div>
			<p>Sign in to continue.</p>
			<?php if($this->session->flashdata('success')): ?>
				<?php echo '<div class="alert alert-success icons-alert">
                                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                            <i class="icofont icofont-close-line-circled"></i>
                                                        </button>
                                                        <p><strong>Success! &nbsp;&nbsp;</strong>'.$this->session->flashdata('success').'</p></div>'; ?>
			<?php endif; ?>
			<?php if($this->session->flashdata('danger')): ?>
				<?php echo '<div class="alert alert-danger icons-alert">
                                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                            <i class="icofont icofont-close-line-circled"></i>
                                                        </button>
                                                        <p><strong>Error! &nbsp;&nbsp;</strong>'.$this->session->flashdata('danger').'</p></div>'; ?>
			<?php endif; ?>

			<?php if(validation_errors() != null): ?>
				<?php echo '<div class="alert alert-warning icons-alert">
                                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                            <i class="icofont icofont-close-line-circled"></i>
                                                        </button>
                                                        <p><strong>Alert! &nbsp;&nbsp;</strong>'.validation_errors().'</p></div>'; ?>
			<?php endif; ?>
			<form action="" method="post" enctype="multipart/form-data">
				<div class="form-group mb-4">
					<input type="email" class="form-control form-control-lg" id="exampleInputEmail1" name="email" autofocus placeholder="Email">
				</div>
				<div class="form-group mb-4">
					<input type="password" class="form-control form-control-lg" id="exampleInputPassword1" name="password" placeholder="Password">
				</div>
				<button type="submit" name="btn_signin" class="btn btn-primary btn-lg btn-block btn-uppercase mb-4">Sign In</button>
				<div class="d-flex justify-content-between align-items-center mb-4">
<!--					<div class="custom-control custom-checkbox">-->
<!--						<input type="checkbox" class="custom-control-input" id="customCheck">-->
<!--						<label class="custom-control-label" for="customCheck">Keep me signed in</label>-->
<!--					</div>-->
<!--					<a href="#" class="auth-link text-black">Forgot password?</a>-->
				</div>
			</form>
		</div>
	</div>
</div>

<!-- begin::global scripts -->
<script src="<?php echo base_url();?>adminassets/vendors/bundle.js"></script>
<!-- end::global scripts -->

<!-- begin::custom scripts -->
<script src="<?php echo base_url();?>adminassets/js/borderless.min.js"></script>
<!-- end::custom scripts -->

</body>
</html>

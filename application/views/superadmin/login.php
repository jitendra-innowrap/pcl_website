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

  <link rel="icon" href="<?php echo base_url();?>assets/images/pcl_favicon.png" type="image/x-icon">
  <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url();?>assets/images/pcl_favicon.png">

  <!-- begin::global styles -->
  <link rel="stylesheet" href="<?php echo base_url();?>adminassets/vendors/bundle.css" type="text/css">
  <!-- end::global styles -->

  <!-- begin::custom styles -->
  <link rel="stylesheet" href="<?php echo base_url();?>adminassets/css/app.min.css" type="text/css">
  <!-- end::custom styles -->

</head>

<body class="bg-white h-100-vh p-t-0">
  <style>
  .ezy__signin11 {
    /* Bootstrap variables */
    --bs-body-color: #333b7b;
    --bs-body-bg: rgb(255, 255, 255);

    /* Easy Frontend variables */
    --ezy-theme-color: rgb(13, 110, 253);
    --ezy-theme-color-rgb: 13, 110, 253;
    --ezy-form-card-bg: #ffffff;
    --ezy-form-card-shadow: 6px 0px 118px rgba(0, 0, 0, 0.08);

    background-color: var(--bs-body-bg);
    padding: 60px 0;
  }

  @media (min-width: 991px) {
    .ezy__signin11 {
      padding: 0px 0;
    }
  }
	
	@media (max-width: 991px) {
		.tyty{
			display:none !important;
		}
  }

  /* Gray Block Style */
  .gray .ezy__signin11,
  .ezy__signin11.gray {
    /* Bootstrap variables */
    --bs-body-bg: rgb(246, 246, 246);

    /* Easy Frontend variables */
    --ezy-form-card-bg: #f6f6f6;
    --ezy-form-card-shadow: 6px 0px 118px rgba(20, 20, 20, 0.08);
  }

  /* Dark Gray Block Style */
  .dark-gray .ezy__signin11,
  .ezy__signin11.dark-gray {
    /* Bootstrap variables */
    --bs-body-color: #ffffff;
    --bs-body-bg: rgb(30, 39, 53);
    --bs-dark-rgb: 255, 255, 255;

    /* Easy Frontend variables */
    --ezy-form-card-bg: #2c3745;
    --ezy-form-card-shadow: none;
  }

  /* Dark Block Style */
  .dark .ezy__signin11,
  .ezy__signin11.dark {
    /* Bootstrap variables */
    --bs-body-color: #ffffff;
    --bs-body-bg: rgb(11, 23, 39);
    --bs-dark-rgb: 255, 255, 255;

    /* Easy Frontend variables */
    --ezy-form-card-bg: #162231;
    --ezy-form-card-shadow: none;
  }

  .ezy__signin11 .container {
    min-height: 100vh;
  }

  .ezy__signin11-heading {
    font-weight: bold;
    font-size: 25px;
    line-height: 25px;
    color: var(--bs-body-color);
  }

  .ezy__signin11-bg-holder {
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    min-height: 150px;
    width: 100%;
  }

  .ezy__signin11-form-card {
    background-color: var(--ezy-form-card-bg);
    border: none;
    box-shadow: var(--ezy-form-card-shadow);
    border-radius: 15px;
  }

  .ezy__signin11-form-card * {
    color: var(--bs-body-color);
  }

  .ezy__signin11 .form-control {
    min-height: 48px;
    line-height: 40px;
    border-color: transparent;
    background: rgba(163, 190, 241, 0.14);
    border-radius: 10px;
    color: var(--bs-body-color);
  }

  .ezy__signin11 .form-control:focus {
    border-color: var(--ezy-theme-color);
    box-shadow: none;
  }

  .ezy__signin11-btn-submit {
    padding: 12px 30px;
    background-color: #333b7b;
    color: #ffffff;
  }

  .ezy__signin11-btn-submit:hover {
    color: #ffffff;
  }

  .ezy__signin11-btn {
    padding: 12px 30px;
  }

  .ezy__signin11-btn,
  .ezy__signin11-btn * {
    color: #ffffff;
  }

  .ezy__signin11-btn:hover {
    color: #ffffff;
  }

  .ezy__signin11-or-separator {
    position: relative;
  }

  .ezy__signin11-or-separator hr {
    border-color: var(--bs-body-color);
    opacity: 0.15;
  }

  .ezy__signin11-or-separator span {
    background-color: var(--ezy-form-card-bg);
    color: var(--bs-body-color);
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate3d(-50%, -50%, 0);
    opacity: 0.8;
  }
  </style>
  <section class="ezy__signin11 light d-flex" style="overflow:hidden;padding: 0px;">
    <div class="container" style="width: 100% !important;max-width: 100%;padding: 0px;">
      <div class="row justify-content-between" style="height: 100vh !important;">
        <div class="col-lg-6 tyty">
          <div class="ezy__signin11-bg-holder d-none d-md-block"
            style="background-image: url(<?php echo base_url();?>adminassets/login-side-img.jpg);height: 100vh !important;"></div>
        </div>
        <div class="col-lg-6 py-4" style="display: flex;align-items: center;justify-content: center;padding: 0px;">
          <div class="">
            <div class="card ezy__signin11-form-card">
              <div class="card-body p-md-5" style="max-width: 500px;">
                <div class="m-b-20" style="text-align: center;">
                  <img src="<?php echo base_url();?>assets/images/logo/PCL-logo.png" class="m-r-15" height="55" alt="">
                </div>
                <p style="text-align: center;font-size: 16px;">Hi, Welcome to PCL Admin Console, Please enter your login
                  credentials below</p>
                <?php if($this->session->flashdata('danger')): ?>
                <?php echo '<div class="alert alert-danger icons-alert">
                                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                            <i class="icofont icofont-close-line-circled"></i>
                                                        </button>
                                                        <p><strong>Error! &nbsp;&nbsp;</strong>'.$this->session->flashdata('danger').'</p></div>'; ?>
                <?php  $this->session->unset_userdata('danger'); endif; ?>

                <?php if(validation_errors() != null): ?>
                <?php echo '<div class="alert alert-warning icons-alert">
                                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                            <i class="icofont icofont-close-line-circled"></i>
                                                        </button>
                                                        <p><strong>Alert! &nbsp;&nbsp;</strong>'.validation_errors().'</p></div>'; ?>
                <?php endif; ?>
                <form action="" method="post" enctype="multipart/form-data">
                  <div class="form-group mb-4">
                    <label for="email">Email*</label>
                    <input type="email" class="form-control form-control-lg" required id="exampleInputEmail1"
                      name="email" autofocus placeholder="Email">
                  </div>
                  <div class="form-group mb-4">
                    <label for="password">Password*</label>
                    <input type="password" class="form-control form-control-lg" required id="exampleInputPassword1"
                      name="password" placeholder="Password">
                  </div>
                  <button type="submit" name="btn_signin"
                    class="btn btn-primary btn-lg btn-block btn-uppercase mb-4">Sign In</button>
                  <div class="d-flex justify-content-between align-items-center mb-4">
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- begin::global scripts -->
  <script src="<?php echo base_url();?>adminassets/vendors/bundle.js"></script>
  <!-- end::global scripts -->

  <!-- begin::custom scripts -->
  <script src="<?php echo base_url();?>adminassets/js/borderless.min.js"></script>
  <!-- end::custom scripts -->

</body>

</html>
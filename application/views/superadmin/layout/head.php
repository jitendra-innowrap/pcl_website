<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title><?php echo $page_title; ?> Admin Panel</title>
	<meta name="robots" content="index,follow" />
	<meta property="og:type" content="website" />
	<meta property="og:url" content="" />
	<meta property="og:image" content="" />
	<meta property="og:site_name" content="<?php echo $sitename;?>"/>
	<!-- FAVICONS ICON -->
	<link rel="icon" href="<?php echo base_url('assets/images/favicon.ico')?>" type="image/x-icon" />
	<link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url('assets/images/favicon.ico')?>" />
	<!-- begin::global styles -->
	<meta name="msapplication-TileColor" content="#ffffff">
	<meta name="msapplication-TileImage" content="<?php echo base_url('assets/images/favicon.ico')?>">
	<meta name="theme-color" content="#ffffff">

	<link rel="stylesheet" href="<?php echo base_url()?>adminassets/vendors/bundle.css" type="text/css">
	<!-- end::global styles -->

	<!-- begin::datepicker -->
	<link rel="stylesheet" href="<?php echo base_url()?>adminassets/vendors/datepicker/daterangepicker.css">
	<!-- begin::datepicker -->
	<!-- begin::select2 -->
	<link rel="stylesheet" href="<?php echo base_url()?>adminassets/vendors/select2/css/select2.min.css" type="text/css">
	<!-- end::select2 -->
	<!-- begin::vmap -->
	<link rel="stylesheet" href="<?php echo base_url()?>adminassets/vendors/vmap/jqvmap.min.css">
	<!-- begin::vmap -->

	<!-- begin::custom styles -->
	<link rel="stylesheet" href="<?php echo base_url()?>adminassets/css/app.min.css" type="text/css">
	<link rel="stylesheet" href="<?php echo base_url()?>adminassets/css/custom.css" type="text/css">
	<!-- end::custom styles -->

	<!-- begin::slick -->
	<link rel="stylesheet" href="<?php echo base_url()?>adminassets/vendors/slick/slick.css" type="text/css">
	<link rel="stylesheet" href="<?php echo base_url()?>adminassets/vendors/slick/slick-theme.css" type="text/css">
	<!-- end::slick -->
	<!-- begin::lightbox -->
	<link rel="stylesheet" href="<?php echo base_url()?>adminassets/vendors/lightbox/magnific-popup.css" type="text/css">
	<!-- end::lightbox -->

	<!-- begin::clockpicker -->
	<link rel="stylesheet" href="<?php echo base_url()?>/adminassets/vendors/clockpicker/bootstrap-clockpicker.min.css" type="text/css">
	<!-- end::clockpicker -->
	<!-- begin::tagsinput -->
	<link rel="stylesheet" href="<?php echo base_url()?>/adminassets/vendors/tagsinput/bootstrap-tagsinput.css" type="text/css">
	<link rel="stylesheet" href="<?php echo base_url()?>adminassets/js/trumbowyg-master/dist/ui/trumbowyg.min.css" type="text/css">
	<!-- end::tagsinput -->
	<style>
		.trumbowyg-editor ul{
			margin-left: 20px;
		}
		.trumbowyg-editor ul li {
			list-style-type: disc !IMPORTANT;
			text-indent: 0;
		}
	</style>
</head>


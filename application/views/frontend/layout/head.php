<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
		<title><?php echo $page_title;?></title>
		<meta name="description" content="<?php echo $meta_desc;?>" />
		<meta property="og:title" content="<?php echo $page_title;?>" />
		<meta property="og:description" content="<?php echo $meta_desc;?>" />
		<meta property="og:image" content="<?php echo $meta_image;?>" />
    <meta name="keywords" content="<?php echo $meta_keyword;?>">
    <meta name="robots" content="INDEX,FOLLOW">

    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Favicons - Place favicon.ico in the root directory -->
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo base_url();?>assets/images/pcl_favicon.png">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="<?php echo base_url();?>assets/images/pcl_favicon.png">
    <meta name="theme-color" content="#ffffff">

    <!--==============================
	  Google Fonts
	============================== -->
    <!-- <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=EB+Garamond:wght@400;500;600;700;800&family=Prompt:wght@100;200;300;400;500;600;700;800&display=swap" rel="stylesheet"> -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..900;1,400..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    

    <!--==============================
	    All CSS File
	============================== -->
    <!-- Bootstrap -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.min.css">
    <!-- Fontawesome Icon -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/all.min.css">
    <!-- Magnific Popup -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/magnific-popup.min.css">
    <!-- Slick Slider -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/slick.min.css">
    <!-- Odometer -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/odometer.css">
    <!-- Tag -->
    <link href="<?= base_url()?>assets/libs/tagify/tagify.css" rel="stylesheet" type="text/css" />
    <!-- Theme Custom CSS -->
     <?php if($active == 4){ ?>
      <link rel="stylesheet" href="<?php echo base_url();?>assets/css/house-of-vivaah.css">
    <?php }elseif($active == 5){ ?>
      <link rel="stylesheet" href="<?php echo base_url();?>assets/css/vows-vachan.css">
    <?php }elseif($active == 6){ ?>
      <link rel="stylesheet" href="<?php echo base_url();?>assets/css/event-factory.css">
    <?php }elseif($active == 7){ ?>
      <link rel="stylesheet" href="<?php echo base_url();?>assets/css/live-space.css">
    <?php }elseif($active == 8){ ?>
      <link rel="stylesheet" href="<?php echo base_url();?>assets/css/venue-affairs.css">
    <?php }elseif($active == 9){ ?>
      <link rel="stylesheet" href="<?php echo base_url();?>assets/css/party-house.css">
    <?php }else{ ?>
      <link rel="stylesheet" href="<?php echo base_url();?>assets/css/pcl.css">
    <?php } ?>
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/style.css">
		 <!-- Custom CSS -->
		<link rel="stylesheet" href="<?php echo base_url();?>assets/css/custom.css">

</head>

<body>

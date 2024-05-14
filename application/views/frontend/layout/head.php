<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="keywords" content="<?php echo $meta_keyword;?>" />
	<meta name="author" content="" />
	<meta name="robots" content="" />
	<meta name="description" content="<?php echo $meta_desc;?>" />
	<meta property="og:title" content="<?php echo $page_title;?>" />
	<meta property="og:description" content="<?php echo $meta_desc;?>" />
	<meta property="og:image" content="<?php echo $meta_image;?>" />
	<meta name="format-detection" content="telephone=no">
	<?php if ($this->agent->is_robot()) {
		echo '<link rel="canonical" href="' . site_url( $this->uri->uri_string() ) .'" />';
	} else {
		echo '<link rel="canonical" href="' . site_url( $this->uri->uri_string() ) .'" />';
	}?>
	<!-- FAVICONS ICON -->
	<link rel="icon" href="<?php echo base_url('assets/images/favicon.ico')?>" type="image/x-icon" />
	<link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url('assets/images/favicon.ico')?>" />

	<!-- PAGE TITLE HERE -->
	<title><?php echo $page_title;?></title>

	<!-- MOBILE SPECIFIC -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- STYLESHEETS -->
	<link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css')?>">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
	<link rel="stylesheet" href="<?php echo base_url('assets/css/theme.min.css')?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/css/styles.min.css?ver=1.1')?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/bootstrap-icons/font/bootstrap-icons.min.css')?>">
	<!-- Google Tag Manager -->
<!--	<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':-->
<!--				new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],-->
<!--			j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=-->
<!--			'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);-->
<!--		})(window,document,'script','dataLayer','GTM-PLNH43S');</script>-->
	<!-- End Google Tag Manager -->
<!--	<script>!function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,document,'script','https://connect.facebook.net/en_US/fbevents.js');fbq('init', '2281154488687599'); fbq('track', 'PageView');</script><noscript><img height="1" width="1" src="https://www.facebook.com/tr?id=2281154488687599&ev=PageView&noscript=1"/></noscript>-->
	<script type="application/ld+json">
		{
			"@context": "https://schema.org",
			"@type": "Corporation",
			"name": "WeP Solutions Limited",
			"url": "https://www.wepdigital.com/",
			"logo": "https://www.wepdigital.com/assets/images/wep-logo-64.png",
			"contactPoint": [{
				"@type": "ContactPoint",
				"telephone": "1800-102-6010",
				"contactType": "sales",
				"contactOption": "TollFree",
				"availableLanguage": "en"
			},{
				"@type": "ContactPoint",
				"telephone": "1800-102-6010",
				"contactType": "technical support",
				"contactOption": "TollFree",
				"availableLanguage": "en"
			}],
			"sameAs": [
				"https://www.facebook.com/wepdigital",
				"https://twitter.com/wepdigital",
				"https://www.youtube.com/channel/UCKUQeVYGhrUDXfWVTHg3RDg",
				"https://www.linkedin.com/company/wep-digital/"
			]
		}
	</script>
	<script type="application/ld+json">
		{
			"@context": "https://schema.org",
			"@type": "LocalBusiness",
			"name": "WeP Digital Services Limited",
			"image": "https://wepdigital.com/assets/images/wep-logo-footer.png",
			"@id": "https://wepdigital.com/assets/images/wep-logo-footer.png",
			"url": "https://wepdigital.com/",
			"telephone": "1800-102-6010",
			"address": {
				"@type": "PostalAddress",
				"streetAddress": "40/1A, Basappa Complex, Lavelle Road",
				"addressLocality": "Bengaluru",
				"postalCode": "560001",
				"addressCountry": "IN"
			},
			"aggregateRating": {
				"@type": "AggregateRating",
				"ratingValue": "4.7",
				"reviewCount": "11"
			},
			"openingHoursSpecification": {
				"@type": "OpeningHoursSpecification",
				"dayOfWeek": [
					"Tuesday",
					"Monday",
					"Wednesday",
					"Thursday",
					"Friday"
				],
				"opens": "08:30",
				"closes": "19:00"
			},
			"contactPoint" : [
				{ "@type" : "ContactPoint",
					"telephone" : "+1800-102-6010",
					"contactType" : "Sales Info & Enquiries"
				}
			],
			"sameAs": [
				"https://www.facebook.com/wepdigital",
				"https://twitter.com/wepdigital",
				"https://www.youtube.com/channel/UCKUQeVYGhrUDXfWVTHg3RDg",
				"https://www.linkedin.com/company/wep-digital/"
			]
		}
	</script>
</head>
<body class="home page-template-page_staticacsstemplate page page-id-2547 loaded Mx(a) My(0) Bgc($color-white) C($color-blue-dark-1) Ff($new-font-family) Fz($base-font-size) Lh($line-height-default) Lts(0.6px) wsp-page-home">
<!-- Google Tag Manager (noscript) -->
<!--<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PLNH43S"-->
<!--				  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>-->
<!-- End Google Tag Manager (noscript) -->

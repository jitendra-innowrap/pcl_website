<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'Console';
$route['privacy-policy'] = 'Console/Privacy_Policy';
$route['contact-us'] = 'Console/contact';
$route['leadership'] = 'Console/leadership';
//---------------------
$route['webinars'] = 'Console/webinars';
$route['webinars-detail'] = 'Console/webinars_detail';
$route['everything-e-invoicing'] = 'Console/Everything_eInvoicing';
$route['customer-talks-e-invoicing'] = 'Console/Customer_Talks_eInvoicing';
$route['webinars-video'] = 'Console/webinars_video/$1';
//---------------------
$route['green-initiatives'] = 'Console/green_initiatives';
$route['ricoh'] = 'Console/ricoh';
$route['management-of-change-process'] = 'Console/moc';
//---------------------
$route['ebooks'] = 'Console/ebook';
$route['ebook-detail'] = 'Console/ebook_detail';
//---------------------
$route['faq'] = 'Console/faq';
$route['privacy-policy'] = 'Console/privacy_policy';
$route['terms-of-use'] = 'Console/terms_of_use';
// ---------------------
$route['blogs'] = 'Console/blogs';
$route['blogs-detail'] = 'Console/blogs_detail';
//----------------------
$route['case-studies'] = 'Console/case_studies';
$route['case-studies-detail'] = 'Console/case_studies_detail';
//----------------------
$route['gst-notification'] = 'Console/whitepaper';
$route['gst-notification-detail'] = 'Console/whitepaper_detail';
//----------------------
$route['services'] = 'Console/services';
//----------------------
$route['managed-print-services'] = 'Console/mps';
//----------------------
$route['document-management-services'] = 'Console/dms';
//----------------------
$route['workflow-automation-software'] = 'Console/workflow_automation';
//----------------------
$route['employee-records-management-system'] = 'Console/erm';
//----------------------
$route['low-code-development'] = 'Console/low_code_dev';
//----------------------
$route['investors'] = 'Console/investor';
//----------------------
$route['newsroom'] = 'Console/newsroom';
//----------------------
$route['careers'] = 'Console/careers';
//----------------------
$route['careers/careers-detail'] = 'Console/careers_detail';
//----------------------
$route['einvoice-software'] = 'Console/einvoice';
//----------------------
$route['procurement-to-pay'] = 'Console/p2p';
//----------------------
$route['best-gst-platform-for-return-filing'] = 'Console/gst';
//----------------------
//----------------------
$route['monthly-gst-returns-gst-reports'] = 'Console/gst_filling';
$route['offers'] = 'Console/offers';
//----------------------
$route['terms-of-use'] = 'Console/Terms_of_Use';
$route['careers'] = 'Console/careers';
$route['career_apply'] = 'Console/career_apply';
$route['our-story'] = 'Console/about';
$route['404_override'] = 'Welcome/error';
$route['translate_uri_dashes'] = FALSE;
//---------------------------------
define('EXT', '.php');
require_once( BASEPATH .'database/DB'. EXT );
$db =& DB();
$query = $db->get( 'blogs' );
$result = $query->result();
foreach( $result as $row )
{
    $route[ 'blogs/'.$row->slug ] = 'Console/blogs_detail/$1';
}
//-----------------------------------
$query = $db->get( 'case_studies' );
$case_studies = $query->result();
foreach( $case_studies as $case_study )
{
    $route[ 'case-studies/'.$case_study->slug ] = 'Console/case_studies_detail/$1';
}
//-----------------------------------
$query = $db->get( 'newsroom' );
$newsrooms = $query->result();
foreach( $newsrooms as $newsroom )
{
    $route[ 'newsroom/'.$newsroom->slug ] = 'Console/newsroom_detail/$1';
}
//----------------------------------
$query = $db->get( 'webinar' );
$webinars = $query->result();
foreach( $webinars as $webinar )
{
	$route[ 'webinars/'.$webinar->slug ] = 'Console/webinars_detail/$1';
	$route['webinars-video/'.$webinar->slug] = 'Console/webinars_video/$1';
}
$query = $db->get( 'gst_notification' );
$gst_notification = $query->result();
foreach( $gst_notification as $notification )
{
	$route['gst-notification/'.$notification->slug] = 'Console/whitepaper_detail/$1';
}
//----------------------------------
$query = $db->get( 'careers' );
$careers = $query->result();
foreach( $careers as $career )
{
	$route[ 'careers/'.$career->slug ] = 'Console/careers_detail/$1';
}
$query = $db->get( 'gst_notification' );
$gst_notification = $query->result();
foreach( $gst_notification as $notification )
{
	$route['gst-notification/'.$notification->slug] = 'Console/whitepaper_detail/$1';
}
//----------------------------------
//admin panel url-------------------
$route['superadmin'] = 'superadmin/login';
$route['forget-password/(:any)'] = 'console/forget_password';

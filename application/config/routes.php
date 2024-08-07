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
$route['blogs'] = 'Console/blogs';
$route['blog-details'] = 'Console/blog_details';
$route['contact'] = 'Console/contact';
$route['house-of-vivaah'] = 'Console/house_of_vivaah';
$route['vows-vachan'] = 'Console/vows_vachan';
$route['event-factory'] = 'Console/event_factory';
$route['live-space'] = 'Console/live_space';
$route['venue-affairs'] = 'Console/venue_affairs';
$route['party-house'] = 'Console/party_house';
$route['about-us'] = 'Console/about_us';
$route['404_override'] = 'Welcome/error';
$route['superadmin'] = 'superadmin/login';
$route['forget-password/(:any)'] = 'console/forget_password/$1';
$route['success-story'] = 'Console/success_story';
$route['testimonials'] = 'Console/testimonials';
$route['investor-relation'] = 'Console/investor_relation';
$route['manage-policy'] = 'Console/manage_policy';
$route['company-internal-policy'] = 'Console/company_internal_policy';
$route['company-policies'] = 'Console/company_policies';
$route['disclosures-under-regulation-46-of-the-lODR'] = 'Console/disclosures_under_regulation_46_of_the_lODR';
$route['privacy-policy'] = 'Console/privacy_policy';
$route['franchise'] = 'Console/franchise';
$route['entrepreneur-program'] = 'Console/entrepreneur_program';
$route['collabration-and-association'] = 'Console/collabration_and_association';
$route['partnership-entrepreneurship-program'] = 'Console/pep';
$route['brand-ambassador'] = 'Console/brand_ambassador';
$route['career'] = 'Console/career';
$route['media'] = 'Console/media';
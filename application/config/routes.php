<?php
defined('BASEPATH') or exit('No direct script access allowed');

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
$route['default_controller'] = 'Home/index';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['contact'] = 'frontend/Contact';

/*Blog*/
// $route['lien-he'] = 'frontend/Contact';
// $route['lien-he-nhanh'] = 'frontend/Contact/quickContact';


//$route['ContentServices'] = 'frontend/About/ContentServices';
//$route['PrivacyPolicy'] = 'frontend/About/PrivacyPolicy';

$route['view_post/(:num)'] = 'frontend/Detail2/index/$1';



// $route['hashtags'] = "frontend/Tags/hashtag";
// $route['tags'] = 'frontend/Tags/index';
// $route['search'] = "frontend/search/index";
//login
$route['admin'] = 'backend/auth';
//register
//$route['dang-ky'] = 'frontend/Register';
//logoutm
$route['thoat'] = 'frontend/Login/logout';
$route['terms'] = 'Home/terms';
$route['sitemap2.xml'] = 'Sitemap';

$route['thong-bao'] = 'frontend/Notification';
$route['posts/download/(:num)'] = 'frontend/Blog/download/$1';
$route['posts/print/(:num)'] = 'frontend/Blog/print/$1';

$route['([a-zA-Z0-9_-]+)-id-(:num).html'] = "frontend/Category/index/$1/$2"; //category link
$route['([a-zA-Z0-9_-]+)-bv-(:num).html'] = 'frontend/Blog/detail/$1/$2';
// $route['([a-zA-Z0-9_-]+)-sp-(:num).html'] = "frontend/Detail/product/$1/$2";

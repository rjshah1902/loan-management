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
|	https://codeigniter.com/userguide3/general/routing.html
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
$route['default_controller'] = 'Login';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['register'] = 'Register';


/* All Routes For The User */
$route['user/dashboard'] = 'user/UserDashboard';
$route['user/loan-request'] = 'user/LoanRequest/applyForLoan';
$route['user/request-list'] = 'user/LoanRequest/list';
$route['user/request-details'] = 'user/LoanRequest/details';
$route['user/mark-as-paid/(:any)'] = 'user/LoanRequest/markAsPaid/$1';


/* All Routes For The Admin */
$route['admin/dashboard'] = 'admin/AdminDashboard';

$route['admin/loan-request'] = 'admin/LoanRequest';
$route['admin/loan-request/edit/(:any)'] = 'admin/LoanRequest/edit/$1';
$route['admin/loan-request/update/(:any)'] = 'admin/LoanRequest/update/$1';
$route['admin/loan-request/delete/(:any)'] = 'admin/LoanRequest/delete/$1';

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
$route['default_controller'] = 'Home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route[''] = 'Home';
$route['blank'] = 'Home/blank';
$route['import-1'] = 'Import/index';
$route['import-2'] = 'Import2/index';
$route['import-smart-monitor'] = 'ImportSmartMonitor/index';

include('web/auth.php');
include('web/wires.php');
include('web/packages.php');
include('web/fields.php');
include('web/wells.php');
include('web/drums.php');
include('web/companies.php');
include('web/job-types.php');
include('web/users.php');
include('web/roles.php');
include('web/broadcasts.php');
include('web/api.php');

$route['(:any)/login'] = 'General/login/$1';
$route['(:any)/unlock'] = 'General/unlock/$1';
$route['(:any)/dashboard'] = 'General/dashboard/$1';
$route['(:any)/material-certifications'] = 'General/materialCertifications/$1';
$route['(:any)/other-reports'] = 'General/otherReports/$1';
$route['(:any)/third-party-data'] = 'General/thirdPartyData/$1';
$route['(:any)/third-party-data/(:any)'] = 'General/thirdPartyData/$1/$2';
$route['(:any)/tech-sheets'] = 'General/techSheet/$1';

//testing routes
$route['test'] = 'Home/test';
$route['php-info'] = 'Home/phpInfo';

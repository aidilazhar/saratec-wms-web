<?php
$route['companies/(:any)/users'] = 'CompanyUser/index/$1';
$route['companies/(:any)/users/create'] = 'CompanyUser/create/$1';
$route['companies/(:any)/users/store'] = 'CompanyUser/store/$1';
$route['companies/(:any)/users/(:any)'] = 'CompanyUser/show/$1/$2';
$route['companies/(:any)/users/edit/(:any)'] = 'CompanyUser/edit/$1/$2';
$route['companies/(:any)/users/update/(:any)'] = 'CompanyUser/update/$1/$2';
$route['companies/(:any)/users/delete/(:any)'] = 'CompanyUser/delete/$1/$2';

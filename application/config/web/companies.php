<?php
$route['companies'] = 'Company/index';
$route['companies/create'] = 'Company/create';
$route['companies/store'] = 'Company/store';
$route['companies/(:any)'] = 'Company/show/$1';
$route['companies/edit/(:any)'] = 'Company/edit/$1';
$route['companies/update/(:any)'] = 'Company/update/$1';
$route['companies/delete/(:any)'] = 'Company/delete/$1';

include('companies/clients.php');
include('companies/users.php');

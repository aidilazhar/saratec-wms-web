<?php
$route['roles'] = 'Role/index';
$route['roles/create'] = 'Role/create';
$route['roles/store'] = 'Role/store';
$route['roles/(:any)'] = 'Role/show/$1';
$route['roles/edit/(:any)'] = 'Role/edit/$1';
$route['roles/update/(:any)'] = 'Role/update/$1';
$route['roles/delete/(:any)'] = 'Role/delete/$1';

$route['roles/(:any)/permission-update'] = 'Role/permissionUpdate/$1';

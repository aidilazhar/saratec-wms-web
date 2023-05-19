<?php
$route['fields'] = 'Field/index';
$route['fields/create'] = 'Field/create';
$route['fields/store'] = 'Field/store';
$route['fields/(:any)'] = 'Field/show/$1';
$route['fields/edit/(:any)'] = 'Field/edit/$1';
$route['fields/update/(:any)'] = 'Field/update/$1';
$route['fields/delete/(:any)'] = 'Field/delete/$1';

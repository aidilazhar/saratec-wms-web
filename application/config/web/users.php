<?php
$route['users'] = 'User/index';
$route['users/create'] = 'User/create';
$route['users/store'] = 'User/store';
$route['users/(:any)'] = 'User/show/$1';
$route['users/edit/(:any)'] = 'User/edit/$1';
$route['users/update/(:any)'] = 'User/update/$1';
$route['users/delete/(:any)'] = 'User/delete/$1';

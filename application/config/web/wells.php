<?php
$route['wells'] = 'Well/index';
$route['wells/create'] = 'Well/create';
$route['wells/store'] = 'Well/store';
$route['wells/(:any)'] = 'Well/show/$1';
$route['wells/edit/(:any)'] = 'Well/edit/$1';
$route['wells/update/(:any)'] = 'Well/update/$1';
$route['wells/delete/(:any)'] = 'Well/delete/$1';

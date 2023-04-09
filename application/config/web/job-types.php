<?php
$route['job-types'] = 'JobType/index';
$route['job-types/create'] = 'JobType/create';
$route['job-types/store'] = 'JobType/store';
$route['job-types/(:any)'] = 'JobType/show/$1';
$route['job-types/edit/(:any)'] = 'JobType/edit/$1';
$route['job-types/update/(:any)'] = 'JobType/update/$1';
$route['job-types/delete/(:any)'] = 'JobType/delete/$1';

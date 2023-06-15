<?php
$route['wires'] = 'Wire/index';
$route['wires/create'] = 'Wire/create';
$route['wires/store'] = 'Wire/store';
$route['wires/(:any)'] = 'Wire/show/$1';
$route['wires/edit/(:any)'] = 'Wire/edit/$1';
$route['wires/update/(:any)'] = 'Wire/update/$1';
$route['wires/delete/(:any)'] = 'Wire/delete/$1';
$route['wires/dashboard/(:any)'] = 'Wire/dashboard/$1';
$route['wires/dashboard/material-certifications/(:any)'] = 'Wire/materialCertifications/$1';
$route['wires/dashboard/other-reports/(:any)'] = 'Wire/otherReports/$1';
$route['wires/dashboard/third-party-data/(:any)'] = 'Wire/thirdPartyData/$1';
$route['wires/dashboard/tech-sheets/(:any)'] = 'Wire/techSheet/$1';

$route['wires/(:any)/trials'] = 'Trial/index/$1';
$route['wires/(:any)/trials/create'] = 'Trial/create/$1';
$route['wires/(:any)/trials/store'] = 'Trial/store/$1';
$route['wires/(:any)/trials/(:any)'] = 'Trial/show/$1/$2';
$route['wires/(:any)/trials/edit/(:any)'] = 'Trial/edit/$1/$2';
$route['wires/(:any)/trials/update/(:any)'] = 'Trial/update/$1/$2';
$route['wires/(:any)/trials/delete/(:any)'] = 'Trial/delete/$1/$2';

$route['trials/ajax/(:any)'] = 'Trial/ajax/$1';

$route['wires/(:any)/reports'] = 'Report/index/$1';
$route['wires/(:any)/reports/create'] = 'Report/create/$1';
$route['wires/(:any)/reports/store'] = 'Report/store/$1';
$route['wires/(:any)/reports/(:any)'] = 'Report/show/$1/$2';
$route['wires/(:any)/reports/edit/(:any)'] = 'Report/edit/$1/$2';
$route['wires/(:any)/reports/update/(:any)'] = 'Report/update/$1/$2';
$route['wires/(:any)/reports/delete/(:any)'] = 'Report/delete/$1/$2';

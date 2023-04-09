<?php
$route['clients'] = 'Client/index';
$route['clients/create'] = 'Client/create';
$route['clients/store'] = 'Client/store';
$route['clients/(:any)'] = 'Client/show/$1';
$route['clients/edit/(:any)'] = 'Client/edit/$1';
$route['clients/update/(:any)'] = 'Client/update/$1';
$route['clients/delete/(:any)'] = 'Client/delete/$1';

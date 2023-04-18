<?php
$route['companies/(:any)/clients'] = 'Client/index/$1';
$route['companies/(:any)/clients/create'] = 'Client/create/$1';
$route['companies/(:any)/clients/store'] = 'Client/store/$1';
$route['companies/(:any)/clients/(:any)'] = 'Client/show/$1/$2';
$route['companies/(:any)/clients/edit/(:any)'] = 'Client/edit/$1/$2';
$route['companies/(:any)/clients/update/(:any)'] = 'Client/update/$1/$2';
$route['companies/(:any)/clients/delete/(:any)'] = 'Client/delete/$1/$2';

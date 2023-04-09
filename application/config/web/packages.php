<?php
$route['packages'] = 'Package/index';
$route['packages/create'] = 'Package/create';
$route['packages/store'] = 'Package/store';
$route['packages/(:any)'] = 'Package/show/$1';
$route['packages/edit/(:any)'] = 'Package/edit/$1';
$route['packages/update/(:any)'] = 'Package/update/$1';
$route['packages/delete/(:any)'] = 'Package/delete/$1';

<?php

$route['broadcasts'] = 'Broadcast/index';
$route['broadcasts/create'] = 'Broadcast/create';
$route['broadcasts/store'] = 'Broadcast/store';
$route['broadcasts/(:any)'] = 'Broadcast/show/$1';
$route['broadcasts/edit/(:any)'] = 'Broadcast/edit/$1';
$route['broadcasts/update/(:any)'] = 'Broadcast/update/$1';
$route['broadcasts/delete/(:any)'] = 'Broadcast/delete/$1';

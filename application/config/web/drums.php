<?php
$route['drums'] = 'Drum/index';
$route['drums/create'] = 'Drum/create';
$route['drums/store'] = 'Drum/store';
$route['drums/(:any)'] = 'Drum/show/$1';
$route['drums/edit/(:any)'] = 'Drum/edit/$1';
$route['drums/update/(:any)'] = 'Drum/update/$1';
$route['drums/delete/(:any)'] = 'Drum/delete/$1';

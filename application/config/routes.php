<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'Dashboard';

$route['principal'] = 'Pagina';
$route['principal'] = 'Signin';
$route['login'] = 'Signin';
/*Punto de inicio del sistema*/
/*$route['login'] = 'Pagina';*/


$route['cerrarsesion'] = 'Signin/logout';

$route['categorias'] = 'category/Main';
$route['nuevo-categoria'] = 'category/Add';
$route['nuevo-categoria/save'] = 'category/Add/save';
$route['categoria/(:num)'] = 'category/Edit/index/$1';
$route['categoria/update/(:num)'] = 'category/Edit/update/$1';
$route['categoria/delete/(:num)'] = 'category/Main/delete/$1';


$route['productos'] = 'product/Main';
$route['nuevo-producto'] = 'product/Add';
$route['nuevo-producto/save'] = 'product/Add/save';
$route['nuevo-producto/upload'] = 'product/Add/upload';
$route['producto/(:num)'] = 'product/Edit/index/$1';
$route['producto/update/(:num)'] = 'product/Edit/update/$1';
$route['producto/delete/(:num)'] = 'product/Main/delete/$1';

$route['clientes'] = 'client/Main';
$route['nuevo-cliente'] = 'client/Add';
$route['nuevo-cliente/save'] = 'client/Add/save';
$route['cliente/(:num)'] = 'client/Edit/index/$1';
$route['cliente/update/(:num)'] = 'client/Edit/update/$1';
$route['cliente/delete/(:num)'] = 'client/Main/delete/$1';

$route['usuarios'] = 'user/Main';
$route['nuevo-usuario'] = 'user/Add';
$route['nuevo-usuario/save'] = 'user/Add/save';
$route['nuevo-usuario/upload'] = 'user/Add/upload';
$route['usuario/(:num)'] = 'user/Edit/index/$1';
$route['usuario/update/(:num)'] = 'user/Edit/update/$1';
$route['usuario/delete/(:num)'] = 'user/Main/delete/$1';

$route['ventas'] = 'sale/Main';
$route['nuevo-venta'] = 'sale/Add';
$route['nuevo-venta/save'] = 'sale/Add/save';
$route['ventas/(:num)'] = 'sale/Detail/index/$1';


$route['reclamos'] = 'claim/Main';
$route['nuevo-reclamo'] = 'claim/Add';
$route['nuevo-reclamo/save'] = 'claim/Add/save';
$route['reclamo/(:num)'] = 'claim/Edit/index/$1';
$route['reclamo/update/(:num)'] = 'claim/Edit/update/$1';
$route['reclamo/delete/(:num)'] = 'claim/Main/delete/$1';

$route['ordenes'] = 'order/Main';
$route['nuevo-orden'] = 'order/Add';
$route['nuevo-orden/save'] = 'order/Add/save';
$route['orden/(:num)'] = 'order/Edit/index/$1';
$route['orden/update/(:num)'] = 'order/Edit/update/$1';
$route['orden/delete/(:num)'] = 'order/Main/delete/$1';





$route['perfil'] = 'Profile';
$route['perfil/save'] = 'Profile/save';
$route['perfil/upload'] = 'Profile/upload';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
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
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/
$route['imagem/editar/(:any)'] = 'imagem/editar/item/$1';
$route['imagem/excluir/(:any)'] = 'imagem/excluir/item/$1';
//$route['imagem/(:any)'] = 'imagem/editar/$1';
$route['imagem/lista'] = 'imagem/lista';

$route['categoria/editar/(:any)'] = 'categoria/editar/item/$1';
$route['categoria/excluir/(:any)'] = 'categoria/excluir/item/$1';
//$route['categoria/(:any)'] = 'categoria/editar/$1';
$route['categoria/lista'] = 'categoria/lista';

$route['produto/editar/(:any)'] = 'produto/editar/item/$1';
$route['produto/excluir/(:any)'] = 'produto/excluir/item/$1';
//$route['produto/(:any)'] = 'produto/editar/$1';
$route['produto/lista'] = 'produto/lista';
$route['ajax'] = 'ajax';
$route['default_controller'] = "welcome";
$route['404_override'] = '';


/* End of file routes.php */
/* Location: ./application/config/routes.php */
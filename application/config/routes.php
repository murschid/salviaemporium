<?php

defined('BASEPATH') OR exit('No direct script access allowed');

$route['index'] = 'home/index';
$route['about'] = 'home/about';
$route['services'] = 'home/services';
$route['projects'] = 'home/projects';
$route['contact'] = 'home/contact';
$route['project-detail/(:any)'] = 'home/project_detail/$1';

$route['default_controller'] = 'ecommerce';
$route['404_override'] = 'errors/index';
$route['translate_uri_dashes'] = FALSE;

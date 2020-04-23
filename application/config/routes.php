<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'Auth';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

//api

$route['api/get-property']['POST'] 	= 'api/C_property/getAll';
$route['api/update-status']['POST'] = 'api/C_property/updateStatus';

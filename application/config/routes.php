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
$route['logout'] = 'auth/logout';
$route['reset'] = 'auth/reset';
$route['login_user'] = 'auth/login_user';
$route['auth'] = 'auth';
$route['fleet_data'] = 'charts/fleet_data';
$route['reports/(:any)'] = 'reports';
$route['update_frequencies'] = 'maintenance/update_frequencies';
$route['delete_frequency'] = 'maintenance/delete_frequency';
$route['update_task'] = 'maintenance/update_task';
$route['view_task/$'] = 'maintenance/view_task/$';
$route['cs_search_by_task_cat'] = 'maintenance/cs_search_by_task_cat';
$route['cs_search_by_schedule_type'] = 'maintenance/cs_search_by_schedule_type';
$route['cs_search_by_schedule_cat'] = 'maintenance/cs_search_by_schedule_cat';
$route['cs_search_by_inpection_type'] = 'maintenance/cs_search_by_inspection_type';
$route['cs_search_by_comp_cat'] = 'maintenance/cs_search_by_comp_cat';
$route['cs_search_by_ata'] = 'maintenance/cs_search_by_ata';
$route['search_by_aircraft'] = 'maintenance/cs_search_by_aircraft';
$route['tasks_search_by_aircraft'] = 'maintenance/tasks_search_by_aircraft';
$route['search_tasks'] = 'maintenance/search_tasks';
$route['add_task'] = 'maintenance/add_task';
$route['maintenance'] = 'maintenance';
$route['update_trends'] = 'flights/update_trends';
$route['delete_trend'] = 'flights/delete_trend';
$route['delete_defect'] = 'flights/delete_defect';
$route['update_defects'] = 'flights/update_defects';
$route['update_logs'] = 'flights/update_logs';
$route['delete_log'] = 'flights/delete_log';
$route['view_flight/$'] = 'flights/view_flight/$';
$route['defects'] = 'flights/defects';
$route['flights'] = 'flights';
$route['get_defects_by_defer_category'] = 'flights/get_defects_by_defer_category';
$route['get_defects_by_date'] = 'flights/get_defects_by_date';
$route['get_defects_by_status'] = 'flights/get_defects_by_status';
$route['get_defects_by_ata'] = 'flights/get_defects_by_ata';
$route['get_defects_by_aircraft'] = 'flights/get_defects_by_aircraft';
$route['fleet'] = 'welcome/fleet';
$route['aircraft_models'] = 'welcome/aircraft_models';
$route['add_flight'] = 'welcome/add_flight';
$route['add_aircraft'] = 'welcome/add_aircraft';
$route['messages'] = 'welcome/messages';
$route['admin'] = 'welcome/admin';
$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

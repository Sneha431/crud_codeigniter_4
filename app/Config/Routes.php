<?php

use CodeIgniter\Router\RouteCollection;
//domain.com/index.php/controller/func_or_method
/**
 * @var RouteCollection $routes
 */
$routes->get('welcome', 'Home::index');
$routes->get('/', 'Crud::index');
// $routes->get('/insert', 'Crud::insert');
// $routes->post('/insert', 'Crud::insert');
$routes->match(["get", "post"], "insert", "Crud::insert");
$routes->get('delete/(:any)', 'Crud::deleteUser/$1');
//(:any) is a route placeholder that matches any segment of the URL after delete/. It acts as a wildcard and captures whatever follows delete/ in the URL. This could be a number, string, or anything else.
// The (:any) part will then be passed as a parameter to the controller method.
//$1 refers to the first placeholder captured from the route, which in this case is the value matched by (:any) in the URL.
// So, if the URL was delete/12345, the method deleteUser would receive 12345 as an argument.
$routes->match(["get", "post"], "update/(:any)", "Crud::insert/$1");

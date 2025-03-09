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
<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/register', 'Register::index');
$routes->post('/register/save','Register::save');
$routes->get('/login','Login::show');
$routes->post('/login/auth','Login::auth');
$routes->get('/logout','Login::logout');

$routes->group('',['filter' => 'adminauth'], function($routes){
	$routes->get('/', 'Home::index');
	$routes->get('/books','Book::index');
	$routes->get('/books/create','Book::create');
	$routes->post('/books/create','Book::create');
	$routes->get('/books/edit/(:num)','Book::edit/$1');
	$routes->post('/books/edit/(:num)','Book::edit/$1');
	$routes->get('/books/delete/(:num)','Book::delete/$1');
});

// $routes->get('/', 'Home::index',['filter' => 'adminauth']);
// $routes->get('/books','Book::index',['filter' => 'adminauth']);
// $routes->get('/books/create','Book::create',['filter' => 'adminauth']);
// $routes->post('/books/create','Book::create',['filter' => 'adminauth']);
// $routes->get('/books/edit/(:num)','Book::edit/$1',['filter' => 'adminauth']);
// $routes->post('/books/edit/(:num)','Book::edit/$1',['filter' => 'adminauth']);
// $routes->get('/books/delete/(:num)','Book::delete/$1',['filter' => 'adminauth']);

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}

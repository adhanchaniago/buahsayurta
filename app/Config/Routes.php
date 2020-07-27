<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
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

/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->get('/Produk/orderanku', 'Produk::orderanku');
$routes->delete('/Produk/sure/(:any)', 'Produk::delete/$1');
$routes->delete('/Penjual/sure/(:any)', 'Penjual::delete/$1');
$routes->get('/Produk/produk/checkout', 'Produk::checkout');
$routes->get('/Produk/(:any)', 'Produk::single/$1');
$routes->get('/Produk/(:any)', 'Penjual::single/$1');
$routes->get('/penjual/edit/(:segment)', 'Penjual::editproduk/$1');
$routes->get('/penjual/detail/(:segment)', 'Penjual::detail/$1');
$routes->get('/produk/detail/(:segment)', 'Produk::detail/$1');
$routes->get('/produk/komentar/(:segment)', 'Produk::komentar/$1');
$routes->get('/penjual/review/(:segment)', 'Penjual::review/$1');
$routes->get('/produk/review/(:segment)', 'Produk::review/$1');

/**
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need to it be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}

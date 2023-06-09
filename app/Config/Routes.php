<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get("/Admin/Delete/(:num)", "Admin::deleted/$1", ["filter" => "role:Admin"]);
$routes->post("/users/edit/(:num)", "ProfileController::index/$1", ["filter" =>
"login"]);
$routes->get("/Cart/Delete/(:num)", "Home::deleted/$1", ["filter" => "login"]);


$routes->get('/', 'Home::index');
$routes->get('/Produk', 'Home::produk');
$routes->get('/Settings', 'Home::settings');
$routes->get('/Settings/akun', 'Home::akun', ["filter" => "login"]);
$routes->get('/Detail/(:segment)', 'Home::detail/$1');
$routes->get('/Cart/(:segment)', 'Home::cart/$1', ["filter" => "login"]);
$routes->post('/addCart/(:segment)', 'Home::addCart/$1', ["filter" => "login"]);
$routes->get("/Settings/akun", 'Home::akun', ["filter" => "login"]);
$routes->post("/Settings/editAkun/(:segment)", 'Home::editAkun/$1', ["filter" => "login"]);

$routes->get("/Admin", "Admin::index", ["filter" => "role:Admin"]);
$routes->get("/Admin/tambah", "Admin::tambah", ["filter" => "role:Admin"]);
$routes->post("/Admin/add", "Admin::add", ["filter" => "role:Admin"]);
$routes->get("/Admin/edit/(:any)", "Admin::edit/$1", ["filter" => "role:Admin"]);
$routes->post("/Admin/editData/(:segment)", "Admin::editData/$1", ["filter" => "role:Admin"]);
$routes->get("/Admin/Dashboard", "Admin::dashboard", ["filter" => "role:Admin"]);
$routes->get("/Admin/userList", "Admin::users", ["filter" => "role:Admin"]);
$routes->get("/Admin/produkList", "Admin::produk", ["filter" => "role:Admin"]);
$routes->get("/Admin/Settings", "Admin::settings", ["filter" => "role:Admin"]);

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
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
  require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
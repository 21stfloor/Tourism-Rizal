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

/*
 * --------------------------------------------------------------------
 * public routes
 * --------------------------------------------------------------------
 */
$routes->get('/', 'Home::index');
$routes->get('/home', 'Home::index');
$routes->get('/attractions', 'Attractions::index');
$routes->get('views/attractions', 'Attractions::index/attractions');
$routes->get('/food', 'FoodController::thumbnail');
$routes->get('/aboutus', 'AboutUsController::index');
$routes->get('views/aboutus', 'AboutUsController::index');

$routes->get('upload', 'Upload::index');
$routes->post('upload/upload', 'Upload::upload');



/*
 * --------------------------------------------------------------------
 *  routes
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we dondirectories't have to scan .

$routes->get('/attractions', 'Attractions::index');
$routes->get('views/attractions', 'Attractions::index/attractions');
$routes->get('/attractions/daranakfalls', 'Attractions::daranakfalls');
$routes->get('views/attractions/daranakfalls', 'Attractions::index/daranakfalls');
$routes->get('/food', 'Food::index');
$routes->get('views/food', 'Food::index');
$routes->get('/aboutus', 'AboutUs::index');
$routes->get('views/aboutus', 'AboutUs::index');
$routes->get('logout', 'LogoutController::index');
$routes->get('/logout', 'LogoutController::index/welcome_message');
$routes->get('/logout', 'LogoutController::index');
$routes->get('views/admin/logout.php', 'LogoutController::index');
$routes->get('/logout', 'LogoutController::index');
$routes->get('views/admin/logout', 'LogoutController::index');


$routes->get('views/signin', 'SigninController::index');
$routes->get('attractions/views/signin', 'SigninController::index');
// $routes->get('/profile', 'ProfileController::index',['filter' => 'authGuard']);
$routes->get('/', 'SignupController::index');
$routes->get('/signup', 'SignupController::index');
$routes->match(['get', 'post'], 'SignupController/store', 'SignupController::store');
$routes->match(['get', 'post'], 'SigninController/loginAuth', 'SigninController::loginAuth');
$routes->get('/signin', 'SigninController::index');
// $routes->get('/profile', 'ProfileController::index',['filter' => 'authGuard']);
// $routes->match(['get','post'], 'views/admin/dataManagement.php', 'UserController::index', ['filter' => 'authGuard']);











/*
 * --------------------------------------------------------------------
 * Admin Route Definitions
 * --------------------------------------------------------------------
 */


// $routes->match(['get','post'],'views/admin/attractionsManagement.php', 'AttractionsManagement::index');
// $routes->match(['get','post'],'views/admin/foodManagement.php', 'FoodManagement::index');
// $routes->match(['get','post'],'views/admin/newsManagement.php', 'NewsManagement::index');
// $routes->match(['get','post'],'views/admin/dataManagement.php', 'DataManagement::index');
$routes->match(['get', 'post'], 'views/admin/dataManagement.php', 'UserController::index', ['filter' => 'authGuard']);
$routes->match(['get', 'post'], 'views/admin/attractionsManagement.php', 'TouristCentreController::index', ['filter' => 'authGuard']);
$routes->match(['get', 'post'], 'views/admin/foodManagement.php', 'FoodController::index', ['filter' => 'authGuard']);
$routes->match(['get', 'post'], 'views/admin/newsManagement.php', 'NewsController::index', ['filter' => 'authGuard']);

$routes->get('tourist-centre', 'TouristCentreController::create', ['filter' => 'authGuard']);
$routes->get('tourist-centre/create', 'TouristCentreController::create', ['filter' => 'authGuard']);
$routes->post('tourist-centre/store', 'TouristCentreController::store', ['filter' => 'authGuard']);
$routes->post('tourist-centre/delete/(:num)', 'TouristCentreController::delete/$1', ['filter' => 'authGuard']);
$routes->get('tourist-centre/edit/(:num)', 'TouristCentreController::edit/$1', ['filter' => 'authGuard']);


$routes->match(['get', 'post'], 'views/admin/foodManagement.php', 'FoodController::index');
$routes->get('food-tourism/create', 'FoodController::create', ['filter' => 'authGuard']);
$routes->post('food-tourism/store', 'FoodController::store', ['filter' => 'authGuard']);
$routes->post('food-tourism/delete/(:num)', 'FoodController::delete/$1', ['filter' => 'authGuard']);
$routes->get('food-tourism/edit/(:num)', 'FoodController::edit/$1', ['filter' => 'authGuard']);


$routes->match(['get', 'post'], 'views/admin/newsManagement.php', 'NewsController::index', ['filter' => 'authGuard']);
$routes->get('news/create', 'NewsController::create', ['filter' => 'authGuard']);
$routes->post('news/store', 'NewsController::store', ['filter' => 'authGuard']);
$routes->post('news/delete/(:num)', 'NewsController::delete/$1', ['filter' => 'authGuard']);
$routes->get('news/edit/(:num)', 'NewsController::edit/$1', ['filter' => 'authGuard']);

$routes->post('aboutus/store', 'AboutUsController::store', ['filter' => 'authGuard']);
$routes->get('aboutus/edit', 'AboutUsController::edit', ['filter' => 'authGuard']);
$routes->post('about/update', 'AboutUsController::update', ['filter' => 'authGuard']);

// $routes->post('about/store', 'About::store');
// $routes->get('about/edit', 'About::edit');



$routes->get('tourist_centre/view/(:num)', 'Attractions::view/$1');
$routes->get('news/view/(:num)', 'Home::view/$1');
$routes->get('foods/view/(:num)', 'FoodController::view/$1');

$routes->get('search/results', 'SearchController::results');


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
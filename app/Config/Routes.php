<?php namespace Config;

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

/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');

//admin profile
$routes->match(['get','post'],'/admin/profile', 'Dashboard::profile',['filter' =>'auth']);

//admin Posts routes
$routes->get('admin', 'Post_a::index',['filter' =>'auth']);
$routes->match(['get','post'],'admin/edit-post', 'Post_a::edit_post',['filter' =>'auth']);
$routes->match(['get','post'],'admin/add-post', 'Post_a::add_post',['filter' =>'auth']);
$routes->match(['get','post'],'admin/delete-post', 'Post_a::delete_post',['filter' =>'auth']);

//category routes
$routes->get('admin/category', 'Category_a::index');
$routes->match(['get','post'],'admin/add-category', 'Category_a::add_category',['filter' =>'auth']);
$routes->match(['get','post'],'admin/edit-category', 'Category_a::edit_category',['filter' =>'auth']);
$routes->match(['get','post'],'admin/delete-category', 'Category_a::delete_category',['filter' =>'auth']);

//File is_uploaded_file$routes->get('admin/category', 'Category_a::index');
$routes->get('admin/upload', 'File::index');
$routes->match(['get','post'],'admin/add-upload', 'File::add_upload',['filter' =>'auth']);
$routes->match(['get','post'],'admin/edit-category', 'Category_a::edit_category',['filter' =>'auth']);
$routes->match(['get','post'],'admin/delete-category', 'Category_a::delete_category',['filter' =>'auth']);

//featured routes
$routes->get('admin/featured', 'Admin::index');
$routes->match(['get','post'],'admin/add-featured', 'Category_a::add_featured',['filter' =>'auth']);
$routes->match(['get','post'],'admin/edit-featured', 'Category_a::edit_featured',['filter' =>'auth']);

//authentication routes
$routes->get('admin/logout', 'Users::logout');
$routes->match(['get','post'],'/admin/login', 'Users::login',['filter' =>'noauth']);
$routes->match(['get','post'],'/admin/register', 'Users::register',['filter' =>'noauth']);


//category routes
$routes->get('date/(:any)', 'Taxonomy');
$routes->get('category/(:any)', 'Taxonomy');
$routes->match(['get'],'/search', 'Search');

//single roiutes

$routes->get('(:any)', 'Posts::singlePost');



/**
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

<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// $routes->get('/', 'Home::index');
// Auth
$routes->get('/login', 'LoginController::index');
$routes->post('/auth-processLogin', 'LoginController::processLogin');
$routes->get('/forgot-password', 'LoginController::forgotPassword');
$routes->get('/logout', 'LoginController::logout');

$routes->get('/', 'DashboardController::index', ['filter' => 'auth']);

// Produk
// $routes->get('/produk', 'ProdukController::indexTable');
// $routes->get('/produk-gallery-view', 'ProdukController::indexGallery');
// $routes->get('/produk-add', 'ProdukController::create');

// Users
// $routes->get('/users', 'UsersController::index');

$routes->get('/transaksi', 'TransaksiController::index');

// Bahan Baku
$routes->get('/bahan-baku-masuk', 'BahanBakuController::masuk');
$routes->get('/bahan-baku-keluar', 'BahanBakuController::keluar');

$routes->get('/maintenance', 'MaintenanceController::index');
$routes->get('/upgrade', 'MaintenanceController::upgarde');


$routes->group('produk', function ($routes) {
    $routes->get('produk-table', 'ProdukController::indexTable');
    $routes->get('produk-gallery', 'ProdukController::indexGallery');
    $routes->get('create', 'ProdukController::create');
    $routes->post('store', 'ProdukController::store');
    $routes->get('edit/(:num)', 'ProdukController::edit/$1');
    $routes->post('update/(:num)', 'ProdukController::update/$1');
    $routes->get('delete/(:num)', 'ProdukController::delete/$1');
});

$routes->group('employees', function ($routes) {
    $routes->get('/', 'EmployeesController::index');
    $routes->get('create', 'EmployeesController::create');
    $routes->post('store', 'EmployeesController::store');
    $routes->get('edit/(:num)', 'EmployeesController::edit/$1');
    $routes->post('update/(:num)', 'EmployeesController::update/$1');
    $routes->get('delete/(:num)', 'EmployeesController::delete/$1');
});

$routes->group('transaksi', function ($routes) {
    $routes->get('/', 'TransaksiController::index');
    $routes->get('create', 'TransaksiController::create');
    $routes->post('store', 'TransaksiController::store');
    $routes->get('edit/(:num)', 'TransaksiController::edit/$1');
    $routes->post('update/(:num)', 'TransaksiController::update/$1');
    $routes->get('delete/(:num)', 'TransaksiController::delete/$1');
});

$routes->group('alat-produksi', function ($routes) {
    $routes->get('/', 'AlatProduksiController::index');
    $routes->get('create', 'AlatProduksiController::create');
    $routes->post('store', 'AlatProduksiController::store');
    $routes->get('edit/(:num)', 'AlatProduksiController::edit/$1');
    $routes->post('update/(:num)', 'AlatProduksiController::update/$1');
    $routes->get('delete/(:num)', 'AlatProduksiController::delete/$1');
});

$routes->group('bahan-penunjang', function ($routes) {
    $routes->get('/', 'BahanPenunjangController::index');
    $routes->get('create', 'BahanPenunjangController::create');
    $routes->post('store', 'BahanPenunjangController::store');
    $routes->get('edit/(:num)', 'BahanPenunjangController::edit/$1');
    $routes->post('update/(:num)', 'BahanPenunjangController::update/$1');
    $routes->get('delete/(:num)', 'BahanPenunjangController::delete/$1');
});

$routes->group('customers', function ($routes) {
    $routes->get('/', 'CustomersController::index');
    $routes->post('store', 'CustomersController::store');
    $routes->get('edit/(:num)', 'CustomersController::edit/$1');
    $routes->post('update/(:num)', 'CustomersController::update/$1');
    $routes->get('delete/(:num)', 'CustomersController::delete/$1');
});

$routes->group('users', function ($routes) {
    $routes->get('/', 'UsersController::index');
    $routes->get('create', 'UsersController::create');
    $routes->post('store', 'UsersController::store');
    $routes->get('edit/(:num)', 'UsersController::edit/$1');
    $routes->post('update/(:num)', 'UsersController::update/$1');
    $routes->get('delete/(:num)', 'UsersController::delete/$1');
});

$routes->group('salary', function ($routes) {
    $routes->get('/', 'SalaryController::index');
    $routes->get('create', 'SalaryController::create');
    $routes->post('store', 'SalaryController::store');
    $routes->get('filter', 'SalaryController::filter');
    $routes->post('filter', 'SalaryController::filter_proses');
    $routes->get('filter-pdf', 'SalaryController::filter_pdf_index');
    $routes->get('print-pdf/(:num)', 'SalaryController::print_pdf/$1');
    $routes->post('filter-pdf', 'SalaryController::filter_pdf');
    $routes->post('update/(:num)', 'SalaryController::update/$1');
    $routes->get('delete/(:num)', 'SalaryController::delete/$1');
});
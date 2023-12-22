<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/login', 'LoginController::index');
$routes->get('/forgot-password', 'LoginController::forgotPassword');
$routes->get('/dashboard', 'DashboardController::index');
// Produk
// $routes->get('/produk', 'ProdukController::indexTable');
// $routes->get('/produk-gallery-view', 'ProdukController::indexGallery');
// $routes->get('/produk-add', 'ProdukController::create');


$routes->get('/transaksi', 'TransaksiController::index');

// Bahan Baku
$routes->get('/bahan-baku-masuk', 'BahanBakuController::masuk');
$routes->get('/bahan-baku-keluar', 'BahanBakuController::keluar');

// Bahan Penunjang
$routes->get('/bahan-penunjang', 'InventoryController::bahanPenunjang');
$routes->get('/bahan-penunjang-add', 'InventoryController::bahanPenunjangInsert');
$routes->get('/alat-produksi', 'InventoryController::alatProduksi');
$routes->get('/alat-produksi-add', 'InventoryController::alatProduksiInsert');

// SDM
$routes->get('/data-karyawan', 'SdmController::index');
$routes->get('/data-karyawan-add', 'SdmController::insert');
$routes->get('/gaji', 'SdmController::gaji');

$routes->get('/maintenance', 'MaintenanceController::index');
$routes->get('/upgrade', 'MaintenanceController::upgarde');


$routes->group('produk', function($routes) {
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
    $routes->post('update/(:num)', 'AlatProduksiController::update/$1');
    $routes->get('delete/(:num)', 'AlatProduksiController::delete/$1');
});

$routes->group('bahan-penunjang', function ($routes) {
    $routes->get('/', 'BahanPenunjangController::index');
    $routes->get('create', 'BahanPenunjangController::create');
    $routes->post('store', 'BahanPenunjangController::store');
    $routes->post('update/(:num)', 'BahanPenunjangController::update/$1');
    $routes->get('delete/(:num)', 'BahanPenunjangController::delete/$1');
});


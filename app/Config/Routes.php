<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
// Auth
$routes->get('/login', 'LoginController::index');
$routes->get('/forgot-password', 'LoginController::forgotPassword');
$routes->get('/dashboard', 'DashboardController::index');

// Produk
$routes->get('/produk', 'ProdukController::indexTable');
$routes->get('/produk-gallery-view', 'ProdukController::indexGallery');
$routes->get('/produk-add', 'ProdukController::insert');

// Users
$routes->get('/users', 'UsersController::index');

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

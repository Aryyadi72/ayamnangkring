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
$routes->get('/transaksi-produk/(:num)', 'TransaksiController::indexGallery/$1');
$routes->post('/transaksi-keranjang', 'TransaksiController::storeToCart');
$routes->post('/transaksi-simpan', 'TransaksiController::updateCart');
$routes->get('/transaksi-filter', 'TransaksiController::showFilteredData');


$routes->get('/transaksi-hapus-item/(:num)', 'TransaksiController::deleteFromCart/$1');
$routes->get('/payment-detail/(:num)', 'TransaksiController::payment_process/$1');
$routes->post('/checkout', 'TransaksiController::checkout');
$routes->get('/invoice/(:num)', 'TransaksiController::invoice_view/$1');
$routes->get('/print/(:num)', 'TransaksiController::print_view/$1');

// $routes->get('TransactionController/indexGallery/', );

// Bahan Baku
// $routes->get('/bahan-baku-masuk', 'BahanBakuController::masuk');
// $routes->get('/bahan-baku-keluar', 'BahanBakuController::keluar');

// $routes->get('/maintenance', 'MaintenanceController::index');
// $routes->get('/upgrade', 'MaintenanceController::upgarde');


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
    $routes->get('filter', 'TransaksiController::filter');
    $routes->post('filter', 'TransaksiController::filter_proses');
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

$routes->group('pengadaan-masuk', function ($routes) {
    $routes->get('/', 'PengadaanMasukController::index');
    $routes->get('create', 'PengadaanMasukController::create');
    $routes->post('store', 'PengadaanMasukController::store');
    $routes->get('edit/(:num)', 'PengadaanMasukController::edit/$1');
    $routes->post('update/(:num)', 'PengadaanMasukController::update/$1');
    $routes->get('delete/(:num)', 'PengadaanMasukController::delete/$1');
    $routes->get('filter', 'PengadaanMasukController::filter');
    $routes->post('filter', 'PengadaanMasukController::filter_proses');
});

$routes->group('pengadaan-keluar', function ($routes) {
    $routes->get('/', 'PengadaanKeluarController::index');
    $routes->get('create/(:num)', 'PengadaanKeluarController::create/$1');
    $routes->post('store', 'PengadaanKeluarController::store');
    $routes->get('edit/(:num)', 'PengadaanKeluarController::edit/$1');
    $routes->post('update/(:num)', 'PengadaanKeluarController::update/$1');
    $routes->get('delete/(:num)', 'PengadaanKeluarController::delete/$1');
    $routes->get('filter', 'PengadaanKeluarController::filter');
    $routes->post('filter', 'PengadaanKeluarController::filter_proses');
});

$routes->group('pemeliharaan', function ($routes) {
    $routes->get('/', 'PemeliharaanController::index');
    $routes->get('create', 'PemeliharaanController::create');
    $routes->post('store', 'PemeliharaanController::store');
    $routes->get('edit/(:num)', 'PemeliharaanController::edit/$1');
    $routes->post('update/(:num)', 'PemeliharaanController::update/$1');
    $routes->get('delete/(:num)', 'PemeliharaanController::delete/$1');
    $routes->get('filter', 'PemeliharaanController::filter');
    $routes->post('filter', 'PemeliharaanController::filter_proses');
});

$routes->group('upgrade', function ($routes) {
    $routes->get('/', 'UpgradeController::index');
    $routes->get('create', 'UpgradeController::create');
    $routes->post('store', 'UpgradeController::store');
    $routes->get('edit/(:num)', 'UpgradeController::edit/$1');
    $routes->post('update/(:num)', 'UpgradeController::update/$1');
    $routes->get('delete/(:num)', 'UpgradeController::delete/$1');
    $routes->get('filter', 'UpgradeController::filter');
    $routes->post('filter', 'UpgradeController::filter_proses');
});

$routes->group('summary-harian', function ($routes) {
    $routes->get('/', 'SummaryRekapController::index');
    $routes->get('before_create', 'SummaryRekapController::before_create');
    $routes->post('create', 'SummaryRekapController::create');
    $routes->post('store', 'SummaryRekapController::store');
    $routes->get('detail/(:num)', 'SummaryRekapController::detail/$1');
    $routes->get('filter', 'SummaryRekapController::filter');
    $routes->post('filter', 'SummaryRekapController::filter_proses');
});
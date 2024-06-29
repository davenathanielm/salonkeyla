<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

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
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Auth::indexlogin');
$routes->get('/Home', 'Home::index', ['filter' => 'auth']);
$routes->post('/chart-Transaksi', 'Home::showChartTransaksi');
$routes->post('/chart-Pelanggan', 'Home::showChartPelanggan');
$routes->post('/chart-Pembelian', 'Home::showChartPembelian');


$routes->get('/Gambar', 'Home::cobaGambar');

// Login
$routes->get('/login', 'Auth::indexlogin');
$routes->post('/login/auth', 'Auth::auth');
$routes->get('/login/register', 'Auth::indexregister');
$routes->post('/login/save', 'Auth::saveRegister');
$routes->get('/logout', 'Auth::logout');

// Routes User
$routes->group('users', function ($r) {
    $r->get('/', 'Users::index');
    $r->get('index', 'Users::index');
    $r->get('create', 'Users::create');
    $r->post('create', 'Users::save');
    $r->get('edit/(:num)', 'Users::edit/$1');
    $r->post('edit/(:num)', 'Users::update/$1');
    $r->delete('(:num)', 'Users::delete/$1');
});

$routes->group('pelanggan', function ($r) {
    $r->get('/', 'Pelanggan::index');
    $r->get('index', 'Pelanggan::index');
    $r->get('create', 'Pelanggan::create');
    $r->post('create', 'Pelanggan::save');
    $r->get('edit/(:num)', 'Pelanggan::edit/$1');
    $r->post('edit/(:num)', 'Pelanggan::update/$1');
    $r->delete('(:num)', 'Pelanggan::delete/$1');
});

$routes->group('layanan', function ($r) {
    $r->get('/', 'Layanan::index');
    $r->get('index', 'Layanan::index');
    $r->get('create', 'Layanan::create');
    $r->post('create', 'Layanan::save');
    $r->get('edit/(:num)', 'Layanan::edit/$1');
    $r->post('edit/(:num)', 'Layanan::update/$1');
    $r->delete('(:num)', 'Layanan::delete/$1');
});

$routes->group('stok', function ($r) {
    $r->get('/', 'Stok::index');
    $r->get('index', 'Stok::index');
    $r->get('create', 'Stok::create');
    $r->post('create', 'Stok::save');
    $r->get('edit/(:num)', 'Stok::edit/$1');
    $r->post('edit/(:num)', 'Stok::update/$1');
    $r->delete('(:num)', 'Stok::delete/$1');
});

$routes->post('/jual/addCart', 'Penjualan::addCart');
$routes->delete('/jual/deleteCart/(:any)', 'Penjualan::deleteCart/$1');

$routes->group('jual', function ($r) {
    $r->get('/', 'Penjualan::index');
    $r->get('load', 'Penjualan::loadCart');
    // $r->post('/addCart', 'Penjualan::addCart');
    $r->post('update', 'Penjualan::updateCart');
    $r->get('getTotal', 'Penjualan::getTotal');
    $r->post('bayar', 'Penjualan::pembayaran');
    $r->get('laporan', 'Penjualan::report');
    $r->post('laporan/filter', 'Penjualan::filter');
    $r->get('exportpdf', 'Penjualan::exportPDF');
    $r->get('exportexcel', 'Penjualan::exportExcel');
    // $r->get('(:any)', 'Penjualan::deleteCart/$1');
});

$routes->post('/beli/addCart', 'Pembelian::addCart');
$routes->delete('/beli/deleteCart/(:any)', 'Pembelian::deleteCart/$1');
$routes->post('/beli/updateCart', 'Pembelian::updateCart');

$routes->group('beli', ['filter' => 'auth'], function ($r) {
    $r->get('/', 'Pembelian::index');
    $r->get('load', 'Pembelian::loadCart');
    // $r->post('/', 'Pembelian::addCart');
    // $r->post('update', 'Pembelian::updateCart');
    $r->get('getTotal', 'Pembelian::getTotal');
    $r->post('bayar', 'Pembelian::pembayaran');
    $r->get('laporan', 'Pembelian::report');
    $r->post('laporan/filter', 'Pembelian::filter');
    $r->get('exportpdf', 'Pembelian::exportPDF');
    $r->get('exportexcel', 'Pembelian::exportExcel');
    $r->post('import', 'Komik::importData');
    // $r->delete('(:any)', 'Pembelian::deleteCart/$1');
});




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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}

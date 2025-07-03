<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Login::index');
$routes->get('home', 'Home::index');
$routes->get('dashboard', 'Dashboard::index');
$routes->get('kategori', 'Kategori::index');
$routes->get('barang', 'Barang::index');
$routes->get('order', 'Order::index');
$routes->get('user', 'User::list');
$routes->get('/login', 'Login::index');
$routes->post('/login/auth', 'Login::auth');
$routes->get('/logout', 'Login::logout');
$routes->get('/register', 'Register::index');
$routes->post('/register/save', 'Register::save');

$routes->get('tambah-kategori', 'Kategori::tambah');
$routes->post('tambah-kategori', 'Kategori::tambah');
$routes->get('tambah-barang', 'Barang::tambah');
$routes->post('tambah-barang', 'Barang::tambah');
$routes->get('tambah-order', 'Order::tambah');
$routes->post('tambah-order', 'Order::tambah');

//user
$routes->get('produk', 'Barang::produk');
$routes->get('beranda', 'User::index');
$routes->get('keranjang', 'Keranjang::index');
$routes->get('pemesanan', 'Pemesanan::index');


$routes->get('tambah-keranjang/(:any)', 'Keranjang::tambah/$1');
$routes->post('tambah-keranjang/(:any)', 'Keranjang::tambah/$1');
$routes->get('delete-keranjang/(:any)', 'Keranjang::delete/$1');
$routes->get('edit-keranjang/(:any)', 'Keranjang::edit/$1');
$routes->post('edit-keranjang/(:any)', 'Keranjang::edit/$1');

$routes->get('edit-pemesanan/(:any)', 'Pemesanan::edit/$1');
$routes->post('edit-pemesanan/(:any)', 'Pemesanan::edit/$1');
$routes->get('edit-pemesanan-admin/(:any)', 'Pemesanan::editAdmin/$1');
$routes->post('edit-pemesanan-admin/(:any)', 'Pemesanan::editAdmin/$1');
$routes->get('tambah-pemesanan', 'Pemesanan::tambah');
$routes->post('tambah-pemesanan', 'Pemesanan::tambah');
$routes->get('delete-pemesanan/(:any)', 'Pemesanan::delete/$1');

$routes->get('edit-kategori/(:num)', 'Kategori::edit/$1');
$routes->post('edit-kategori/(:num)', 'Kategori::edit/$1');
$routes->get('delete-kategori/(:num)', 'Kategori::delete/$1');

$routes->get('edit-barang/(:any)', 'Barang::edit/$1');
$routes->post('edit-barang/(:any)', 'Barang::edit/$1');
$routes->get('delete-barang/(:any)', 'Barang::delete/$1');

$routes->get('edit-order/(:any)', 'Order::edit/$1');
$routes->post('edit-order/(:any)', 'Order::edit/$1');
$routes->get('delete-order/(:any)', 'Order::delete/$1');

$routes->get('edit-user/(:any)', 'User::edit/$1');
$routes->post('edit-user/(:any)', 'User::edit/$1');
$routes->get('delete-user/(:any)', 'User::delete/$1');
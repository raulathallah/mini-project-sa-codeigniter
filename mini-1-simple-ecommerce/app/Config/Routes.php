<?php

use App\Controllers\Pesanan;
use App\Controllers\Produk;
use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// --- PRODUK ---
//produk list
$routes->get('/', [Produk::class, 'index']);

//create
$routes->get('produk/add', [Produk::class, 'on_create']);
$routes->post('produk/save_add', [Produk::class, 'create']);

//delete
$routes->get('produk/delete/(:num)', [Produk::class, 'delete']);

//detail
$routes->get('produk/detail/(:num)', [Produk::class, 'detail']);

//edit
$routes->get('produk/edit/(:num)', [Produk::class, 'on_update']);
$routes->post('produk/save_update', [Produk::class, 'update']);

//stok routes
$routes->post('produk/kurang/(:num)', [Produk::class, 'kurang_stok']);
$routes->post('produk/tambah/(:num)', [Produk::class, 'tambah_stok']);

// --- ORDER ---
//order list
$routes->get('/order', [Pesanan::class, 'index']);

//create
$routes->get('order/add', [Pesanan::class, 'on_create']);
$routes->post('order/save_add', [Pesanan::class, 'create']);

//delete
$routes->get('order/delete/(:num)', [Pesanan::class, 'delete']);
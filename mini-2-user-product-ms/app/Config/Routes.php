<?php

use App\Controllers\Home;
use App\Controllers\Pesanan;
use App\Controllers\Produk;
use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */


$routes->get('/', [Home::class, 'index']);
$routes->get('/about', [Home::class, 'about']);


// --- PRODUK
$routes->resource('product');

/* 
$routes->group('produk', function($routes){
  $routes->get('', [Produk::class, 'index']);
  $routes->get('add', [Produk::class, 'on_create']);
  $routes->post('save_add', [Produk::class, 'create']);
});

$routes->get('produk/delete/(:num)', [Produk::class, 'delete']);

$routes->get('produk/detail/(:num)', [Produk::class, 'detail']);

$routes->get('produk/edit/(:num)', [Produk::class, 'on_update']);
$routes->post('produk/save_update/(:num)', [Produk::class, 'update']);

$routes->post('produk/kurang/(:num)', [Produk::class, 'kurang_stok']);
$routes->post('produk/tambah/(:num)', [Produk::class, 'tambah_stok']);

*/




// --- ORDER ---
//order list
$routes->get('/order', [Pesanan::class, 'index']);

//create
$routes->get('order/add', [Pesanan::class, 'on_create']);
$routes->post('order/save_add', [Pesanan::class, 'create']);

//delete
$routes->get('order/delete/(:num)', [Pesanan::class, 'delete']);

//update status
$routes->get('order/update_status/(:num)', [Pesanan::class, 'on_update_status']);
$routes->post('order/save_update_status/(:num)', [Pesanan::class, 'update_status']);
<?php

use App\Controllers\Admin\Dashboard;
use App\Controllers\Admin\Users;
use App\Controllers\Home;
use App\Controllers\Pesanan;
use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */


if(ENVIRONMENT == "development"){
  $routes->get('/', [Home::class, 'development']);
}else{
  $routes->get('/', [Home::class, 'index']);
}

$routes->get('/about', [Home::class, 'about']);

$routes->get('/health-check', function(){
  return "Server is running";
});

// --- PRODUK
$routes->resource('product');

// --- USER
$routes->group('admin', ['namespace' => 'App\Controllers\Admin'], function($routes){
  $routes->get('dashboard', [Dashboard::class, 'index'], ['filter'=> \App\Filters\AuthFilter::class]);  
  //$routes->get('dashboard', [Dashboard::class, 'index']);  
  $routes->group('users', function($routes){
    $routes->get('', [Users::class, 'getIndex'], ['as' => 'user_dashboard']);
    $routes->get('new', [Users::class, 'getNew']);
    $routes->post('create', [Users::class, 'postCreate'], ['as' => 'user_create']);
    $routes->get('detail/(:segment)', [Users::class, 'getDetail'], ['as' => 'user_detail']);
    $routes->get('show/(:segment)', [Users::class, 'getShow'], ['as' => 'user_edit']);
    $routes->post('update/(:segment)', [Users::class, 'postUpdate'], ['as' => 'user_update']);
    $routes->delete('delete/(:segment)', [Users::class, 'deleteRemove'], ['as' => 'user_delete']);
  });
});

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